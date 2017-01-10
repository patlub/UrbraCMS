<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:01 PM
 */
class HomePage
{
    protected $_slide_image_name;
    protected $_slide_image_caption;
    protected $_sec_image_name;
    protected $_sec_heading;
    protected $_sec_text;


    public function get_slide_image_name()
    {
        return $this->_slide_image_name;
    }

    public function get_slide_image_caption()
    {
        return $this->_slide_image_caption;
    }

    public function get_sec_image_name()
    {
        return $this->_sec_image_name;
    }

    public function get_sec_heading()
    {
        return $this->_sec_heading;
    }

    public function get_sec_text()
    {
        return $this->_sec_text;
    }

    public function update_slideshow($imgFile, $caption, $position, $tmp_dir, $imgSize)
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

        if (empty($imgFile)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('UPDATE slideshow SET caption=:caption WHERE position=:position');
            $stmt->bindParam(':caption', $caption);
            $stmt->bindParam(':position', $position);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        } else {
            $upload_dir = '../img/slideshowimgs/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $image = rand(1000, 1000000) . "." . $imgExt;

            // allow valid image file formats
            if (in_array($imgExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($imgSize < 5000000) {
                    move_uploaded_file($tmp_dir, $upload_dir . $image);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE slideshow SET imagename=:imagename,caption=:caption WHERE position=:position');
                $stmt->bindParam(':imagename', $image);
                $stmt->bindParam(':caption', $caption);
                $stmt->bindParam(':position', $position);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        }

        // if no error occured, continue ....
        return $return_code;
    }

    public function update_serv_sec($imgFile, $heading, $text, $position, $tmp_dir, $imgSize)
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

        if (empty($imgFile)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('UPDATE home_services SET heading=:heading, text=:text  WHERE position=:position');
            $stmt->bindParam(':imagename', $image);
            $stmt->bindParam(':heading', $heading);
            $stmt->bindParam(':text', $text);
            $stmt->bindParam(':position', $position);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        } else {
            $upload_dir = '../img/home_services/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $image = rand(1000, 1000000) . "." . $imgExt;

            // allow valid image file formats
            if (in_array($imgExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($imgSize < 5000000) {
                    move_uploaded_file($tmp_dir, $upload_dir . $image);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE home_services SET imagename=:imagename,heading=:heading, text=:text  WHERE position=:position');
                $stmt->bindParam(':imagename', $image);
                $stmt->bindParam(':heading', $heading);
                $stmt->bindParam(':text', $text);
                $stmt->bindParam(':position', $position);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        }

        // if no error occured, continue ....
        return $return_code;
    }

    public function get_slide_image($position)
    {
        $image_det = $this->fetch_slide_image($position);
        $this->_slide_image_name = $image_det['imagename'];
        $this->_slide_image_caption = $image_det['caption'];

    }

    public function async_get_slide_image($position)
    {
        $image_det = $this->fetch_slide_image($position);
        return $image_det;

    }

    public function get_section($position)
    {
        $sec_det = $this->fetch_section($position);
        $this->_sec_image_name = $sec_det['imagename'];
        $this->_sec_heading = $sec_det['heading'];
        $this->_sec_text = $sec_det['text'];

    }

    public function fetch_slide_image($position)
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('SELECT * FROM slideshow WHERE position = :position');
        $statementHandler->bindParam(':position', $position, PDO::PARAM_STR);
        $statementHandler->execute();
        if ($statementHandler->rowCount() == 1) {
            $image_det = $statementHandler->fetch(PDO::FETCH_ASSOC);
            return $image_det;
        }
        return false;
    }

    public function fetch_section($position)
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('SELECT * FROM home_services WHERE position = :position');
        $statementHandler->bindParam(':position', $position, PDO::PARAM_STR);
        $statementHandler->execute();
        if ($statementHandler->rowCount() == 1) {
            $section_det = $statementHandler->fetch(PDO::FETCH_ASSOC);
            return $section_det;
        }
        return false;
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