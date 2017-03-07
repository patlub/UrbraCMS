<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class Vacancy
{
    protected $title;
    protected $start_date;
    protected $end_date;
    protected $description;
    protected $attachment;
    protected $tmp_dir;
    protected $size;

    public function __construct()
    {

    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_start_date()
    {
        return $this->start_date;
    }

    public function get_end_date()
    {
        return $this->start_date;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_attachment()
    {
        return $this->attachment;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function set_start_date($start_date)
    {
        $this->start_date = $start_date;
    }

    public function set_end_date($end_date)
    {
        $this->start_date = $end_date;
    }

    public function set_description($description)
    {
        $this->description = $description;
    }

    public function set_attachment($attachment)
    {
        $this->attachment = $attachment;
    }

    public static function new_vacancy($title, $start_date, $end_date, $description, $attachment, $tmp_dir, $size)
    {
        $instance = new self();
        $instance->load_new_vacancy($title, $start_date, $end_date, $description, $attachment, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_vacancy($title, $start_date, $end_date, $description, $attachment, $tmp_dir, $size)
    {
        $this->title = $title;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->description = $description;
        $this->attachment = $attachment;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_vacancy()
    {
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../docs/'; // upload directory

        $fileExt = strtolower(pathinfo($this->attachment, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('pdf'); // valid extensions

        // rename uploading image
        $doc = rand(1000, 1000000) . "." . $fileExt;

        // allow valid image file formats
        if (in_array($fileExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($this->size < 5000000) {

                move_uploaded_file($this->tmp_dir, $upload_dir . $doc);
            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        if (!isset($errMSG)) {
            $dbh = $this->connectDB();
            $stmt = $dbh->prepare('INSERT INTO vacancies VALUES (:id, :title, :start_date, :end_date, :description, :filename)');
            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':start_date', $this->start_date);
            $stmt->bindParam(':end_date', $this->end_date);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':filename', $doc);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }

        // if no error occured, continue ....
        return $return_code;
    }

    public function edit_vacancy($id)
    {
        $return_code = false;
        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../docs/'; // upload directory

        if ($this->attachment == null) {
            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE vacancies SET title = :title, start_date = :start_date, end_date = :end_date,
                                        description = :description WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':start_date', $this->start_date);
                $stmt->bindParam(':end_date', $this->end_date);
                $stmt->bindParam(':description', $this->description);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        } else {
            $fileExt = strtolower(pathinfo($this->attachment, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('pdf'); // valid extensions

            // rename uploading image
            $doc = rand(1000, 1000000) . "." . $fileExt;

            // allow valid image file formats
            if (in_array($fileExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($this->size < 5000000) {

                    move_uploaded_file($this->tmp_dir, $upload_dir . $doc);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if (!isset($errMSG)) {
                $dbh = $this->connectDB();
                $stmt = $dbh->prepare('UPDATE vacancies SET title = :title, start_date = :start_date, end_date = :end_date, description = :description, attachment = :filename WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':start_date', $this->start_date);
                $stmt->bindParam(':end_date', $this->end_date);
                $stmt->bindParam(':description', $this->description);
                $stmt->bindParam(':filename', $doc);
                $result = $stmt->execute();

                if ($result) {
                    $return_code = true;
                }
            }
        }
        // if no error occured, continue ....
        return $return_code;
    }

    public function del_vacancy($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM vacancies WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function fetch_vacancy($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM vacancies WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $vacancy = $sth->fetch(PDO::FETCH_ASSOC);
            return $vacancy;
        }
        return null;
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