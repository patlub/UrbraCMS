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

    public function tmp_add_slideshow($imgFile, $caption, $link, $tmp_dir, $imgSize)
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

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

                $img = $this->resize_image($tmp_dir, 1196, 662);
                imagejpeg($img,$upload_dir . $image);

            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        if (!isset($errMSG)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('INSERT INTO tmp_slideshow VALUES(:id, :imagename, :caption, :link)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':imagename', $image);
            $stmt->bindParam(':caption', $caption);
            $stmt->bindParam(':link', $link);
            $result = $stmt->execute();

            if ($result) {
                return $image;
            }

        }
        // if no error occured, continue ....
        return $return_code;
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

    public function fetch_slide($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM slideshow WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $slide = $sth->fetch(PDO::FETCH_ASSOC);
            return $slide;
        }
        return null;
    }

    public function edit_slideshow($imgFile, $caption, $link, $tmp_dir, $imgSize, $id)
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../img/slideshowimgs/'; // upload directory

        if ($imgFile == null) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('UPDATE slideshow SET caption = :caption, link = :link WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':caption', $caption);
            $stmt->bindParam(':link', $link);
            $result = $stmt->execute();

            if ($result) {
                return $image;
            }
        } else {

            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $image = rand(1000, 1000000) . "." . $imgExt;

            // allow valid image file formats
            if (in_array($imgExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($imgSize < 5000000) {

                    $img = $this->resize_image($tmp_dir, 1196, 662);
                    imagejpeg($img,$upload_dir . $image);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE slideshow SET imagename = :imagename, caption = :caption, link = :link WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':imagename', $image);
                $stmt->bindParam(':caption', $caption);
                $stmt->bindParam(':link', $link);
                $result = $stmt->execute();

                if ($result) {
                    return $image;
                }

            }
        }
        // if no error occured, continue ....
        return $return_code;
    }

    public function add_slideshow()
    {
        $result = false;
        $id = '';
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM tmp_slideshow');
        $sth->execute();
        $statement_handler = $dbh->prepare('INSERT INTO slideshow VALUES(:id, :imagename, :caption, :link)');

        if ($sth->rowCount() > 0) {
            while ($slide = $sth->fetch(PDO::FETCH_ASSOC)) {
                $img_name = $slide['imagename'];
                $caption = $slide['caption'];
                $link = $slide['link'];

                $statement_handler->bindParam(':id', $id);
                $statement_handler->bindParam(':imagename', $img_name);
                $statement_handler->bindParam(':caption', $caption);
                $statement_handler->bindParam(':link', $link);
                $result = $statement_handler->execute();
            }
            if ($result) {
                $sth = $dbh->prepare('DELETE FROM tmp_slideshow');
                $sth->execute();
            }
            return $result;
        }
        return $result;
    }

    public function del_tmp_slideshow()
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM tmp_slideshow');
        $result = $sth->execute();
        return $result;
    }


    public function update_serv_sec($imgFile, $heading, $text, $position, $tmp_dir, $imgSize)
    {
        $return_code = false;
        $image = null;
        error_reporting(~E_NOTICE); // avoid notice

        if (empty($imgFile)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('UPDATE home_services SET heading=:heading, text=:text  WHERE position=:position');
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

                    $img = $this->resize_image($tmp_dir, 650, 417);
                    imagejpeg($img,$upload_dir . $image);

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

    public function async_get_slide_show()
    {
        $result = array();
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare('SELECT * FROM slideshow');
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($slides = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                array_push($result, $slides);
            }
            return $result;
        }
        return false;
    }

    public function async_get_section($position)
    {
        $image_det = $this->fetch_section($position);
        return $image_det;
    }

    public function get_section($position)
    {
        $sec_det = $this->fetch_section($position);
        $this->_sec_image_name = $sec_det['imagename'];
        $this->_sec_heading = $sec_det['heading'];
        $this->_sec_text = $sec_det['text'];

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