<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Resource {
    protected $head;
    protected $category;
    protected $resource;
    protected $tmp_dir;
    protected $size;

    public function __construct(){

    }

    public function get_head(){
        return $this->head;
    }

    public function get_resource(){
        return $this->resource;
    }
    public function get_category(){
        return $this->category;
    }

    public function set_head($haed){
        $this->head = $haed;
    }

    public function set_resource($resource){
        $this->resource = $resource;
    }
    public function set_category($category){
        $this->category = $category;
    }

    public static function new_resource($head, $category, $resource, $tmp_dir, $size){
        $instance = new self();
        $instance->load_new_resource($head, $category, $resource, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_resource($head, $category, $resource, $tmp_dir, $size){
        $this->head = $head;
        $this->category = $category;
        $this->resource = $resource;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_resource(){
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
            $stmt = $dbh->prepare('INSERT INTO resources VALUES(:id, :head, :category, :resource)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':head', $this->head);
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam(':resource', $doc);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }

        return $return_code;
    }

    public function edit_resource($id){
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../docs/'; // upload directory

        if ($this->resource == null) {
            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE resources SET name = :head, category = :category WHERE id = :id');

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':head', $this->head);
                $stmt->bindParam(':category', $this->category);
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
                $stmt = $dbh->prepare('UPDATE resources SET name = :head, category = :category, pdf = :resource WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':head', $this->head);
                $stmt->bindParam(':category', $this->category);
                $stmt->bindParam(':resource', $doc);
                $result = $stmt->execute();
                if ($result) {
                    $return_code = true;
                }
            }
        }
        return $return_code;
    }

    public function fetch_resource($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM resources WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if($sth->rowCount() == 1){
            $resource = $sth->fetch(PDO::FETCH_ASSOC);
            return $resource;
        }
        return null;
    }

    public function del_resource($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM resources WHERE id = :ids');
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