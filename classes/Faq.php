<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Faq {
    protected $question;
    protected $answer;

    public function __construct(){

    }

    public function get_question(){
        return $this->question;
    }
    public function get_answer(){
        return $this->answer;
    }

    public function set_question($question){
        $this->question = $question;
    }

    public function set_answer($answer){
        $this->answer = $answer;
    }

    public static function new_faq($question, $answer){
        $instance = new self();
        $instance->load_new_faq($question, $answer);
        return $instance;
    }

    public function load_new_faq($question, $answer){
        $this->question = $question;
        $this->answer = $answer;
    }

    public function add_faq(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO faqs VALUES(:id, :question, :answer)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':question', $this->question);
        $stmt->bindParam(':answer', $this->answer);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function del_faq($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM faqs WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function fetch_faq($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM faqs WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if($sth->rowCount() == 1){
            $faq = $sth->fetch(PDO::FETCH_ASSOC);
            return $faq;
        }
        return null;
    }

    public function edit_faq($id)
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE faqs SET question =  :question, answer = :answer WHERE id = :id');

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->question);
        $stmt->bindParam(':category', $this->answer);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
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