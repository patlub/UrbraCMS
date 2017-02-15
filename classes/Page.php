<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/13/2017
 * Time: 3:42 AM
 */
class Page
{
    protected $_name;
    protected $_content;

    function __construct()
    {

    }

    public function get_name()
    {
        return $this->_name;
    }

    public function get_content()
    {
        return $this->_content;
    }

    public static function newPage($name, $content)
    {
        $instance = new self();
        $instance->loadNewPage($name, $content);
        return $instance;
    }

    private function loadNewPage($name, $content)
    {
        $this->_name = $name;
        $this->_content = $content;
    }

    public function set_name($name)
    {
        $this->_name = $name;
    }

    public function set_content($content)
    {
        $this->_content = $content;
    }

    public function add_page()
    {
        $page_id = null;
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('INSERT INTO pages VALUES (:id, :pagename, :type)');
        $result = $sth->execute(array('id' => '', 'pagename' => $this->_name, 'type' => 'custom'));

        if ($result) {
            $statementHandler = $dbh->prepare('SELECT LAST_INSERT_ID()');
            $statementHandler->execute();
            $LastRow = $statementHandler->fetch(PDO::FETCH_ASSOC);
            $page_id = $LastRow['LAST_INSERT_ID()'];

            $sth = $dbh->prepare('INSERT INTO content VALUES (:id, :content, :page_id)');
            $result = $sth->execute(array('id' => '', 'content' => $this->_content, 'page_id' => $page_id));
            return $result;
        }
        return false;
    }

    public function update_page($id)
    {
        $page_id = null;
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('UPDATE pages SET name = :page_name WHERE id = :id');
        $result = $sth->execute(array('pagename' => $this->_name, 'id' => $id));

        if ($result) {

            $sth = $dbh->prepare('UPDATE content SET content = :content WHERE page_id = :id');
            $result = $sth->execute(array('content' => $this->_content, 'page_id' => $id));
            return $result;
        }
        return false;
    }

    public function load_custom_pages_list()
    {
        $type = 'custom';
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM pages WHERE type = :type");
        $statementHandler->bindParam(':type', $type);
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($page = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $page['id'];
                $name = $page['name'];
                ?>
                <li class="active" onclick="location.href = '<?php echo 'edit_page.php?id=' . $id; ?>'"><a
                        href="#"><?php echo $name; ?></a></li>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_page($id)
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT pages.name AS pname, content.content AS content FROM pages INNER JOIN
                                              content ON pages.id = content.page_id WHERE pages.id = :id ");
        $statementHandler->bindParam(':id', $id);
        $result = $statementHandler->execute();

        if($result){
            $page = $statementHandler->fetch(PDO::FETCH_ASSOC);

            $this->_name = $page['pname'];
            $this->_content = $page['content'];
            return $result;
        }
        return false;
    }

    public function connectDB()
    {
        $DB_HOST = "localhost";
        $DB_NAME = "urbra";
        $DB_USER = "root";
        $DB_PASSWORD = "";
        try {
            return new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }
} 