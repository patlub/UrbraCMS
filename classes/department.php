<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class Department
{
    protected $image;
    protected $tmp_dir;
    protected $size;

    public function __construct()
    {

    }

    public function get_image()
    {
        return $this->image;
    }

    public function set_image($name)
    {
        $this->image = $name;
    }


    public static function new_dep($image, $tmp_dir, $size)
    {
        $instance = new self();
        $instance->load_new_dep($image, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_dep($image, $tmp_dir, $size)
    {
        $this->image = $image;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_dep()
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../img/'; // upload directory

        $fileExt = strtolower(pathinfo($this->image, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $image = rand(1000, 1000000) . "." . $fileExt;

        // allow valid image file formats
        if (in_array($fileExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($this->size < 5000000) {

                $img = $this->resize_image($this->tmp_dir, 1000, 600);
                imagejpeg($img,$upload_dir . $image);

            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }


        if (!isset($errMSG)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('INSERT INTO departments VALUES(:id, :image)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':image', $image);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
            return $return_code;
        }
        return $return_code;
    }

    public function edit_dep($id)
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../img/'; // upload directory

            $fileExt = strtolower(pathinfo($this->image, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $image = rand(1000, 1000000) . "." . $fileExt;

            // allow valid image file formats
            if (in_array($fileExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($this->size < 5000000) {

                    $img = $this->resize_image($this->tmp_dir, 1000, 600);
                    imagejpeg($img,$upload_dir . $image);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }


            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE departments SET image = :image WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':image', $image);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
                return $return_code;
            }
        return $return_code;
    }

    public function fetch_dep($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM departments WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if($sth->rowCount() == 1){
            $bod = $sth->fetch(PDO::FETCH_ASSOC);
            return $bod;
        }
        return null;
    }
    public function del_bod($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM departments WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    function resize_image($file, $w, $h, $crop = FALSE)
    {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }
        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
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