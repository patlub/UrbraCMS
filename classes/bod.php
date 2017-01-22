<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class BoD
{
    protected $image;
    protected $name;
    protected $tmp_dir;
    protected $size;

    public function __construct()
    {

    }

    public function get_image()
    {
        return $this->image;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_image($name)
    {
        $this->image = $name;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }


    public static function new_BoD($name, $image, $tmp_dir, $size)
    {
        $instance = new self();
        $instance->load_new_BoD($name, $image, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_BoD($name, $image, $tmp_dir, $size)
    {
        $this->name = $name;
        $this->image = $image;
        $this->resource = $image;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;

    }

    public function add_Bod()
    {
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../imgs/'; // upload directory

        $fileExt = strtolower(pathinfo($this->image, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

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
            $stmt = $dbh->prepare('INSERT INTO bod VALUES(:id, :name, :image)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':image', $doc);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
            return $return_code;
        }
        return $return_code;
    }

    public function del_bod($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM bod WHERE id = :ids');
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