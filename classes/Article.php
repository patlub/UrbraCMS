<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Article {
    protected $head;
    protected $article;
    protected $date;

    public function __construct(){

    }

    public function get_head(){
        return $this->head;
    }
    public function get_article(){
        return $this->article;
    }
    public function get_date(){
        return $this->date;
    }

    public function set_head($name){
        $this->head = $name;
    }

    public function set_article($category){
        $this->article = $category;
    }

    public function set_date($address){
        $this->date = $address;
    }

    public static function new_article($head, $article, $date){
        $instance = new self();
        $instance->load_new_article($head, $article, $date);
        return $instance;
    }

    public function load_new_article($head, $article, $date){
        $this->head = $head;
        $this->article = $article;
        $this->date = $date;
    }

    public function add_article(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO news VALUES(:id, :head, :article, :date)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':head', $this->head);
        $stmt->bindParam(':article', $this->article);
        $stmt->bindParam(':date', $this->date);
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