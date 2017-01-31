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
    protected $expiry;
    protected $resource;
    protected $tmp_dir;
    protected $size;

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
    public function get_expiry(){
        return $this->expiry;
    }
    public function get_resource(){
        return $this->resource;
    }

    public function set_head($haed){
        $this->head = $haed;
    }

    public function set_article($article){
        $this->article = $article;
    }

    public function set_date($date){
        $this->date = $date;
    }

    public function set_expiry($expiry){
        $this->expiry = $expiry;
    }
    public function set_resource($resource){
        $this->resource = $resource;
    }

    public static function new_article($head, $article, $date, $expiry, $resource, $tmp_dir, $size){
        $instance = new self();
        $instance->load_new_article($head, $article, $date, $expiry, $resource, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_article($head, $article, $date, $expiry, $resource, $tmp_dir, $size){
        $this->head = $head;
        $this->article = $article;
        $this->date = $date;
        $this->expiry = $expiry;
        $this->resource = $resource;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_article(){
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../docs/'; // upload directory

        $fileExt = strtolower(pathinfo($this->resource, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('pdf', 'jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $doc = rand(1000, 1000000) . "." . $fileExt;

        // allow valid image file formats
        if (in_array($fileExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($this->size < 5000000) {

//                    $img = resize_image();
                move_uploaded_file($this->tmp_dir, $upload_dir . $doc);
            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }


        if (!isset($errMSG)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('INSERT INTO articles VALUES(:id, :head, :article, :date, :resource, :expiry)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':head', $this->head);
            $stmt->bindParam(':article', $this->article);
            $stmt->bindParam(':date', $this->date);
            $stmt->bindParam(':resource', $doc);
            $stmt->bindParam(':expiry', $this->expiry);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }

        return $return_code;
    }
    public function edit_article($id){
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../docs/'; // upload directory

        if ($this->resource == null) {
            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE articles SET title = :head, article = :article, date = :date, expiry = :expiry WHERE id = :id');

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':head', $this->head);
                $stmt->bindParam(':article', $this->article);
                $stmt->bindParam(':date', $this->date);
                $stmt->bindParam(':expiry', $this->expiry);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        }
        else {

            $fileExt = strtolower(pathinfo($this->resource, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('pdf', 'jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $doc = rand(1000, 1000000) . "." . $fileExt;

            // allow valid image file formats
            if (in_array($fileExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($this->size < 5000000) {

//                    $img = resize_image();
                    move_uploaded_file($this->tmp_dir, $upload_dir . $doc);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }


            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE articles SET title = :head, article = :article, date = :date, resource = :resource, expiry = :expiry WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':head', $this->head);
                $stmt->bindParam(':article', $this->article);
                $stmt->bindParam(':date', $this->date);
                $stmt->bindParam(':resource', $doc);
                $stmt->bindParam(':expiry', $this->expiry);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        }
        return $return_code;
    }

    public function fetch_article($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM articles WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if($sth->rowCount() == 1){
            $article = $sth->fetch(PDO::FETCH_ASSOC);
            return $article;
        }
        return null;
    }

    public function del_article($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM articles WHERE id = :ids');
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