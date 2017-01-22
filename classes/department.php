<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Department {
    protected $head;
    protected $name;

    public function __construct(){

    }

    public function get_head(){
        return $this->head;
    }
    public function get_name(){
        return $this->name;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_head($head){
        $this->head = $head;
    }

    public static function new_department($head, $name){
        $instance = new self();
        $instance->load_new_department($head, $name);
        return $instance;
    }

    public function load_new_department($head, $name){
        $this->head = $head;
        $this->name = $name;
    }

    public function add_department(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO departments VALUES(:id, :name, :head)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':head', $this->head);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function del_department($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM departments WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
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
} 