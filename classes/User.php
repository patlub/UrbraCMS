<?php

class User
{

    protected $_user;
    protected $_firstName;
    protected $_lastName;
    protected $_email;
    protected $_password;

    public function __construct()
    {

    }

    /*
     * Helper method for existing user(registering user)
     * @return Returns the existing user object
     *
     * */
    public static function existingUser($email, $password)
    {
        $instance = new self();
        $instance->loadExistingUser($email, $password);
        return $instance;
    }

    /*
     * Helper method for new user(registering user)
     * @return Returns the new user object
     * */
    public static function newUser($firstName, $lastName, $email, $password)
    {
        $instance = new self();
        $instance->loadNewUser($firstName, $lastName, $email, $password);
        return $instance;
    }

    /*
     * @return returns the _firstName field
     * */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /*
     * @return returns the _lastName field
     * */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /*
     * @return returns the _email field
     * */
    public function getEmail()
    {
        return $this->_email;
    }

    /*
     * @return returns the _user object
     * */
    public function getUser()
    {
        return $this->_user;
    }

    /* Sets the First name*/
    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    /*Sets the Last name*/
    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    /*Sets the Email*/
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /*Sets the Password*/
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /*
     * Sets the fields for a new user who may be registering
     * @param $firstName is new user's first name
     * @param $lastName is  new user's last name
     * @param $userType is new user's account type(normal or admin)
     *
     * */
    private function loadNewUser($firstName, $lastName, $email, $password)
    {
        $this->_email = $email;
        $this->_password = $password;
        $this->_firstName = $firstName;
        $this->_lastName = $lastName;

    }

    /*
     * Sets the fields of an existing user in the Database who may be logging in
     * @param $email, Existing User's email
     * @param $password, Existing User's password
     *
     * */
    private function loadExistingUser($email, $password)
    {
        $this->_email = $email;
        $this->_password = $password;
        $_SESSION['host'] = 'localhost';
        $_SESSION['db'] = 'urbra';
        $_SESSION['uname'] = 'root';
        $_SESSION['pword'] = '';
    }

    /*
     * Logs in the user with right credentials
     *
     * @return boolean true for success and boolean false for failure
     *
     * */
    public function login()
    {
        $user = $this->checkCredentials();
        if ($user) {
            $this->_user = $user;
            $_SESSION['user'] = $user;
            $_SESSION['loggedIn'] = true;
            $_SESSION['del_ids'] = null;
            $_SESSION['del_multi_ids'] = null;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $this->_email;
            $_SESSION['password'] = $user['password'];
            return true;
        }
        return false;
    }

    /*
     * Checks for user validity from the database
     * @return returns the user Object
     *
     */
    protected function checkCredentials()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('SELECT * FROM users WHERE email = :email');
        $statementHandler->bindParam(':email', $this->_email, PDO::PARAM_STR);
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $user = $statementHandler->fetch(PDO::FETCH_ASSOC);
            if (md5($this->_password) == $user['password']) {
                return $user;
            }
        }
        return false;
    }

    /*
     * Logs out a user
     *
     * @return boolean true for success
     * */
    public function logout()
    {
        session_start();
        session_destroy();
        header("location: ../signIn.html");
    }

    /*
     * Inserts new user's values into the database
     *
     * @return Returns boolean(true on success and false on failure)
     * */
    public function register()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('INSERT INTO users  VALUES (:id, :firstname, :lastname, :email, :pword)');
        $id = '';
        $statementHandler->bindParam(':id', $id);
        $statementHandler->bindParam(':firstname', $this->_firstName);
        $statementHandler->bindParam(':lastname', $this->_lastName);
        $statementHandler->bindParam(':email', $this->_email);
        $statementHandler->bindParam(':pword', md5($this->_password));
        $result = $statementHandler->execute();
        if ($result) {
            $statementHandler = $dbh->prepare('SELECT LAST_INSERT_ID()');
            $statementHandler->execute();
            $LastRow = $statementHandler->fetch(PDO::FETCH_ASSOC);

            $_SESSION['loggedIn'] = true;
            $_SESSION['user_id'] = $LastRow['LAST_INSERT_ID()'];
            $_SESSION['user_email'] = $this->_email;

            return $result;
        }
        return false;
    }

    public function permissions($pages)
    {
        $result = false;
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('INSERT INTO page_alloc VALUES (:id, :page_id, :uid)');
        $id = '';

        for ($i = 0; $i < count($pages); $i++) {
            $statementHandler->bindParam(':id', $id);
            $statementHandler->bindParam(':page_id', $pages[$i]);
            $statementHandler->bindParam(':uid', $_SESSION['user_id']);
            $result = $statementHandler->execute();
        }

        return $result;
    }

    public function get_permissions()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('SELECT pages.name AS page_name FROM pages INNER JOIN page_alloc ON pages.id = page_alloc.page_id WHERE page_alloc.uid = :uid');
        $statementHandler->bindParam(':uid', $_SESSION['user_id']);
        $result = $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 0;
            while ($page_id = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                if ($i == 0) {
                    $_SESSION['page_ids'] = $page_id['page_name'];
                } else {
                    $_SESSION['page_ids'] = $_SESSION['page_ids'] . ' ' . $page_id['page_name'];
                }
                $i++;
            }
            $_SESSION['page_ids'] = explode(' ', $_SESSION['page_ids']);
        }
        return $result;
    }

    public function changePassword($oldPassword, $newPassword)
    {
        if(md5($oldPassword) == $_SESSION['password']) {
            $newPassword = md5($newPassword);
            $dbh = $this->connectDB();
            $statementHandler = $dbh->prepare('UPDATE users SET `password` = :new_password WHERE id = :id');
            $statementHandler->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
            $statementHandler->bindParam(':new_password', $newPassword, PDO::PARAM_STR);
            $result = $statementHandler->execute();
            if ($result) {
                $_SESSION['password'] = $newPassword;
            }
            return $result;
        }
        return false;
    }

    /*
     * connects to the database using PDO
     * @return Returns a database handler to a new PDO object
     *
     */
    public function connectDB()
    {
        $DB_HOST = 'localhost';
        $DB_NAME = 'urbra';
        $DB_USER = 'root';
        $DB_PASSWORD = '';

        try {
            return new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }
}

?>
