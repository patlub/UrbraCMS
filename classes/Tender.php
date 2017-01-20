<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class Tender
{
    protected $ref_no;
    protected $desc;
    protected $category;
    protected $deadline;
    protected $date_published;
    protected $date_of_award;
    protected $pdf;
    protected $tmp_dir;
    protected $size;

    public function __construct()
    {

    }

    public function get_refno()
    {
        return $this->ref_no;
    }

    public function get_desc()
    {
        return $this->desc;
    }

    public function get_category()
    {
        return $this->category;
    }

    public function get_deadline()
    {
        return $this->deadline;
    }

    public function get_date_published()
    {
        return $this->date_published;
    }

    public function get_date_of_award()
    {
        return $this->date_of_award;
    }

    public function get_pdf()
    {
        return $this->pdf;
    }

    public function set_refno($name)
    {
        $this->ref_no = $name;
    }

    public function set_desc($desc)
    {
        $this->desc = $desc;
    }

    public function set_category($category)
    {
        $this->category = $category;
    }

    public function set_deadline($deadline)
    {
        $this->deadline = $deadline;
    }

    public function set_date_published($date_published)
    {
        $this->date_published = $date_published;
    }

    public function set_date_of_award($date_of_award)
    {
        $this->date_of_award = $date_of_award;
    }

    public function set_pdf($pdf)
    {
        $this->pdf = $pdf;
    }

    public static function new_tender($ref_no, $desc, $category, $deadline, $date_published, $date_of_award, $pdf, $tmp_dir, $size)
    {
        $instance = new self();
        $instance->load_new_tender($ref_no, $desc, $category, $deadline, $date_published, $date_of_award, $pdf, $tmp_dir, $size);
        return $instance;
    }

    public function load_new_tender($ref_no, $desc, $category, $deadline, $date_published, $date_of_award, $pdf, $tmp_dir, $size)
    {
        $this->ref_no = $ref_no;
        $this->desc = $desc;
        $this->category = $category;
        $this->deadline = $deadline;
        $this->date_published = $date_published;
        $this->date_of_award = $date_of_award;
        $this->pdf = $pdf;
        $this->tmp_dir = $tmp_dir;
        $this->size = $size;
    }

    public function add_tender()
    {
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
            $stmt = $dbh->prepare('INSERT INTO tenders VALUES (:id, :ref_no, :desc, :category, :deadline, :date_published, :date_awarded, :attachment)');
            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ref_no', $this->ref_no);
            $stmt->bindParam(':desc', $this->desc);
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam(':deadline', $this->deadline);
            $stmt->bindParam(':date_published', $this->date_published);
            $stmt->bindParam(':date_awarded', $this->date_published);
            $stmt->bindParam(':attachment', $doc);
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