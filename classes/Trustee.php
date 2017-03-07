<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class Trustee
{
    protected $name;
    protected $scheme;
    protected $address;
    protected $web_link;
    protected $tel;

    public function __construct()
    {

    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_scheme()
    {
        return $this->scheme;
    }

    public function get_address()
    {
        return $this->address;
    }

    public function get_web_link()
    {
        return $this->web_link;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_scheme($scheme)
    {
        $this->scheme = $scheme;
    }

    public function set_address($address)
    {
        $this->address = $address;
    }

    public function set_web_link($web_link)
    {
        $this->web_link = $web_link;
    }

    public static function new_corporate_trustee($name, $address, $web_link, $tel)
    {
        $instance = new self();
        $instance->load_new_corporate_trustee($name, $address, $web_link, $tel);
        return $instance;
    }

    public static function new_individual_trustee($name, $scheme, $tel)
    {
        $instance = new self();
        $instance->load_new_individual_trustee($name, $scheme, $tel);
        return $instance;
    }

    public function load_new_corporate_trustee($name, $address, $web_link, $tel)
    {
        $this->name = $name;
        $this->address = $address;
        $this->web_link = $web_link;
        $this->tel = $tel;
    }

    public function load_new_individual_trustee($name, $scheme, $tel)
    {
        $this->name = $name;
        $this->scheme = $scheme;
        $this->tel = $tel;
    }

    public function add_corporate_trustee()
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO corporate_trustees VALUES(:id, :name, :address, :web_link, :tel)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':web_link', $this->web_link);
        $stmt->bindParam(':tel', $this->tel);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function add_individual_trustee()
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO individual_trustees VALUES(:id, :name, :scheme, :tel)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':scheme', $this->scheme);
        $stmt->bindParam(':tel', $this->tel);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function fetch_corporate_trustee($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM corporate_trustees WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $trustee = $sth->fetch(PDO::FETCH_ASSOC);
            return $trustee;
        }
        return null;
    }

    public function fetch_individual_trustee($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM individual_trustees WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $trustee = $sth->fetch(PDO::FETCH_ASSOC);
            return $trustee;
        }
        return null;
    }

    public function del_trustee($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM trustees WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function edit_corporate_trustee($id)
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE corporate_trustees SET name =  :name, address = :address, web_link = :web_link, tel = :tel WHERE id = :id');

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':web_link', $this->web_link);
        $stmt->bindParam(':tel', $this->tel);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function edit_individual_trustee($id)
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE individual_trustees SET name =  :name, scheme = :scheme, tel = :tel WHERE id = :id');

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':scheme', $this->scheme);
        $stmt->bindParam(':tel', $this->tel);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function corporate_trustee_import($file)
    {
        $return_code = false;
        $handle = fopen($file, "r");
        $dbh = $this->connectDB();

        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $name = $filesop[0];
            $address = $filesop[1];
            $web_link = $filesop[2];
            $tel = $filesop[3];

            $stmt = $dbh->prepare('INSERT INTO corporate_trustees VALUES (:id, :name, :address, :web_link, :tel)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':web_link', $web_link);
            $stmt->bindParam(':tel', $tel);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }
        return $return_code;
    }

    public function individual_trustee_import($file)
    {
        $return_code = false;
        $handle = fopen($file, "r");
        $dbh = $this->connectDB();

        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $name = $filesop[0];
            $scheme = $filesop[1];
            $tel = $filesop[2];

            $stmt = $dbh->prepare('INSERT INTO individual_trustees VALUES (:id, :name, :scheme, :tel)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':scheme', $scheme);
            $stmt->bindParam(':tel', $tel);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }
        return $return_code;
    }

    public function update_trustee_law($tabs, $details)
    {
        $result = null;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('DELETE FROM trustee_law');
        $result = $stmt->execute();
        if ($result) {
            $id = '';
            for ($i = 0; $i < count($tabs); $i++) {
                $stmt = $dbh->prepare('INSERT INTO trustee_law VALUES(:id, :tab, :details)');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':tab', $tabs[$i]);
                $stmt->bindParam(':details', $details[$i]);
                $result = $stmt->execute();
            }
            return $result;
        }
    }

    public function add_trustee_law_item($title, $details)
    {
        $result = null;
        $dbh = $this->connectDB();

        $stmt = $dbh->prepare('INSERT INTO trustee_law VALUES(:id, :tab, :details)');
        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tab', $title);
        $stmt->bindParam(':details', $details);
        $result = $stmt->execute();
        return $result;

    }

    public function fetch_trustee_law()
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('SELECT * FROM trustee_law');
        $stmt->execute();
        while ($law = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="form-group col-md-12">
                <input type="text" id="tab" name="tabs[]" value="<?php echo $law['tab']; ?>" class="form-control"
                       style="font-weight: bold;" placeholder="">
            </div>
            <div class="form-group col-md-12">
                <textarea
                    id="detail" name="details[]"
                    class="form-control ckeditor" placeholder=""><?php echo $law['details']; ?></textarea>
            </div>
        <?php

        }
    }

    public function fetch_trustee_items()
    {
        {
            $dbh = $this->connectDB();
            $statementHandler = $dbh->prepare("SELECT * FROM trustee_law");
            $statementHandler->execute();
            if ($statementHandler->rowCount() > 0) {
                $i = 1;
                while ($item = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                    $id = $item['id'];
                    $tab = $item['tab'];
                    ?>
                    <tr>

                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $tab; ?>
                        </td>
                        <td align="center">
                            <a href="php/delete_trustee_item.php?id=<?php echo $id; ?>" <span id=""
                                                                                              class="delete glyphicon glyphicon-remove icon-delete"></span>
                        </td>
                    </tr>
                <?php
                }
            } else {
                echo false;
            }
        }
    }

    public function delete_trustee_item($id)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('DELETE FROM trustee_law WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        return $result;
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

    /**
     * @return mixed
     */
    public function get_tel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function set_tel($tel)
    {
        $this->tel = $tel;
    }

} 