<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Custodian {
    protected $name;
    protected $category;
    protected $address;
    protected $web_link;

    public function __construct(){

    }

    public function get_name(){
        return $this->name;
    }
    public function get_category(){
        return $this->category;
    }
    public function get_address(){
        return $this->address;
    }
    public function get_web_link(){
        return $this->web_link;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_category($category){
        $this->category = $category;
    }

    public function set_address($address){
        $this->address = $address;
    }

    public function set_web_link($web_link){
        $this->web_link = $web_link;
    }

    public static function new_custodian($name, $category, $address, $web_link){
        $instance = new self();
        $instance->load_new_custodian($name, $category, $address, $web_link);
        return $instance;
    }

    public function load_new_custodian($name, $category, $address, $web_link){
        $this->name = $name;
        $this->category = $category;
        $this->address = $address;
        $this->web_link = $web_link;
    }

    public function add_custodian(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO custodians VALUES(:id, :name, :category, :address, :web_link)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':web_link', $this->web_link);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function del_custodian($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM custodians WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function fetch_custodian($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM custodians WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if($sth->rowCount() == 1){
            $custodian = $sth->fetch(PDO::FETCH_ASSOC);
            return $custodian;
        }
        return null;
    }

    public function edit_custodian($id)
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE custodians SET name =  :name, category = :category, address = :address, web_link = :web_link WHERE id = :id');

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':web_link', $this->web_link);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function custodian_import($file)
    {
        $return_code = false;
        $handle = fopen($file, "r");
        $dbh = $this->connectDB();

        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $name = $filesop[0];
            $category = $filesop[1];
            $address = $filesop[2];
            $web_link = $filesop[3];

            $stmt = $dbh->prepare('INSERT INTO custodians VALUES (:id, :name, :category, :address, :web_link)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':web_link', $web_link);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }
        return $return_code;
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