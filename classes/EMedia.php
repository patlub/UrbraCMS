<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */
class EMedia
{
    protected $title;
    protected $date;
    protected $source;
    protected $link;

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

    public function get_source()
    {
        return $this->source;
    }

    public function get_link()
    {
        return $this->link;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function set_date($date)
    {
        $this->date = $date;
    }

    public function set_source($source)
    {
        $this->source = $source;
    }

    public function set_link($link)
    {
        $this->link = $link;
    }

    public static function new_media($title, $date, $description, $link)
    {
        $instance = new self();
        $instance->load_new_media($title, $date, $description, $link);
        return $instance;
    }

    public function load_new_media($title, $date, $description, $link)
    {
        $this->title = $title;
        $this->date = $date;
        $this->source = $description;
        $this->link = $link;
    }

    public function add_media()
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO external_media VALUES (:id, :title, :_date, :description, :link)');
        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':_date', $this->date);
        $stmt->bindParam(':description', $this->source);
        $stmt->bindParam(':link', $this->link);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        // if no error occured, continue ....
        return $return_code;
    }

    public function edit_media($id)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE external_media SET title = :title, date_realesed = :_date, source = :description, link = :link WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':_date', $this->date);
        $stmt->bindParam(':description', $this->source);
        $stmt->bindParam(':link', $this->link);
        $result = $stmt->execute();
        return $result;
    }

    public function del_media($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM external_media WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function fetch_media($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM external_media WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $media = $sth->fetch(PDO::FETCH_ASSOC);
            return $media;
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