<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Tender {
    protected $name;
    protected $date;
    protected $pdf;
    protected $tmp_dir;
    protected $size;

    public function __construct(){

    }

    public function get_name(){
        return $this->name;
    }

    public function get_date(){
        return $this->date;
    }
    public function get_pdf(){
        return $this->pdf;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_date($address){
        $this->date = $address;
    }

    public function set_pdf($pdf){
        $this->pdf = $pdf;
    }

    public static function new_tender($name, $date, $pdf, $tmp_dir, $size){
        $instance = new self();
        $instance->load_new_tender($name, $date, $pdf, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_tender($name, $date, $pdf, $tmp_dir, $size){
        $this->name = $name;
        $this->date = $date;
        $this->pdf = $pdf;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_tender(){
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

            $upload_dir = '../docs/'; // upload directory

            $fileExt = strtolower(pathinfo($this->pdf, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('pdf'); // valid extensions

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
                $stmt = $dbh->prepare('INSERT INTO tenders VALUES (:id, :name, :date, :filename)');
                $id = '';
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':date', $this->date);
                $stmt->bindParam(':filename', $doc);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        // if no error occured, continue ....
        return $return_code;
//        return $this->name.' '.$this->date.' '.$doc;
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