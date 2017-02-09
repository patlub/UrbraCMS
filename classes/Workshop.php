<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class Workshop
{
    protected $title;
    protected $date;
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

    public function get_date()
    {
        return $this->date;
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

    public function set_date($date)
    {
        $this->date = $date;
    }

    public function set_description($description)
    {
        $this->description = $description;
    }

    public function set_attachment($attachment)
    {
        $this->attachment = $attachment;
    }

    public static function new_workshop($title, $date, $description, $attachment, $tmp_dir, $size)
    {
        $instance = new self();
        $instance->load_new_workshop($title, $date, $description, $attachment, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_workshop($title, $date, $description, $attachment, $tmp_dir, $size)
    {
        $this->title = $title;
        $this->date = $date;
        $this->description = $description;
        $this->attachment = $attachment;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_workshop()
    {
        $return_code = false;
        $workshop_id = null;

        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO workshops VALUES (:id, :title, :description, :_date)');
        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':_date', $this->date);
        $stmt->bindParam(':description', $this->description);
        $result = $stmt->execute();

        if ($result) {
            $statementHandler = $dbh->prepare('SELECT LAST_INSERT_ID()');
            $statementHandler->execute();
            $LastRow = $statementHandler->fetch(PDO::FETCH_ASSOC);
            $workshop_id = $LastRow['LAST_INSERT_ID()'];
        }

        $doc = null;
        error_reporting(~E_NOTICE); // avoid notice

        $upload_dir = '../docs/'; // upload directory

        // valid image extensions
        $valid_extensions = array('pdf', 'doc', 'docx'); // valid extensions

        $count = count($this->attachment);

        for ($i = 0; $i < $count; $i++) {
            $fileExt = strtolower(pathinfo($this->attachment[$i], PATHINFO_EXTENSION)); // get image extension

            // rename uploading image
            $doc = rand(1000, 1000000) . "." . $fileExt;

            // allow valid image file formats
            if (in_array($fileExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($this->size[$i] < 5000000) {

                    move_uploaded_file($this->tmp_dir[$i], $upload_dir . $doc);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if (!isset($errMSG)) {
                $stmt = $dbh->prepare('INSERT INTO workshop_docs VALUES (:id, :doc, :workshop_id)');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':doc', $doc);
                $stmt->bindParam(':workshop_id', $workshop_id);
                $return_code = $stmt->execute();
            }
        }

        // if no error occured, continue ....
        return $return_code;
    }

    public function edit_workshop($id)
    {
        $return_code = false;

        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE workshops SET title  = :title, dateheld = :_date, `desc` = :description WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':_date', $this->date);
        $stmt->bindParam(':description', $this->description);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        // if no error occured, continue ....
        return $return_code;
    }

    public function del_workshop($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM workshops WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function fetch_workshop($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM workshops WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $workshop = $sth->fetch(PDO::FETCH_ASSOC);
            return $workshop;
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