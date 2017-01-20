<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class BoD {
    protected $image;
    protected $name;

    public function __construct(){

    }

    public function get_image(){
        return $this->image;
    }
    public function get_name(){
        return $this->name;
    }

    public function set_image($name){
        $this->image = $name;
    }

    public function set_name($name){
        $this->name = $name;
    }



    public static function BoD($name, $image){
        $instance = new self();
        $instance->load_new_BoD($name, $image);
        return $instance;
    }

    public function load_new_BoD($name, $image){
        $this->name = $name;
        $this->image = $image;

    }

    public function add_Bod(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO bod VALUES(:id, :name, :head)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':head', $this->image);
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