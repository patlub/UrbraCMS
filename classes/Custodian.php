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

    public function add_custodian($name, $category, $address, $weblink){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO custodians VALUES(:id, :name, :category, :address, :web_link)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':web_link', $weblink);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
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