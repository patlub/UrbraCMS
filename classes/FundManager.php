<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class FundManager {
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

    public static function new_fund_manager($name, $category, $address, $web_link){
        $instance = new self();
        $instance->load_fund_manager($name, $category, $address, $web_link);
        return $instance;
    }

    public function load_fund_manager($name, $category, $address, $web_link){
        $this->name = $name;
        $this->category = $category;
        $this->address = $address;
        $this->web_link = $web_link;
    }

    public function add_fund_manager(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO fund_managers VALUES(:id, :name, :category, :address, :web_link)');

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