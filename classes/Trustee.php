<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/11/2017
 * Time: 5:14 PM
 */

class Trustee {
    protected $name;
    protected $category;
    protected $address;
    protected $web_link;

    public function __construct(){

    }

    public function get_name(){
        return $this->name;
    }
    public function get_category(){
        return $this->category;
    }
    public function get_address(){
        return $this->address;
    }
    public function get_web_link(){
        return $this->web_link;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_category($category){
        $this->category = $category;
    }

    public function set_address($address){
        $this->address = $address;
    }

    public function set_web_link($web_link){
        $this->web_link = $web_link;
    }

    public static function new_trustee($name, $category, $address, $web_link){
        $instance = new self();
        $instance->load_new_trustee($name, $category, $address, $web_link);
        return $instance;
    }

    public function load_new_trustee($name, $category, $address, $web_link){
        $this->name = $name;
        $this->category = $category;
        $this->address = $address;
        $this->web_link = $web_link;
    }

    public function add_trustee(){
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('INSERT INTO trustees VALUES(:id, :name, :category, :address, :web_link)');

        $id = '';
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':web_link', $this->web_link);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function fetch_trustee($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM trustees WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if($sth->rowCount() == 1){
            $trustee = $sth->fetch(PDO::FETCH_ASSOC);
            return $trustee;
        }
        return null;
    }

    public function del_trustee($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM trustees WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $result = $sth->execute();
        return $result;
    }

    public function edit_trustee($id)
    {
        $return_code = false;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE trustees SET name =  :name, category = :category, address = :address, web_link = :web_link WHERE id = :id');

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':web_link', $this->web_link);
        $result = $stmt->execute();

        if ($result) {
            $return_code = true;
        }
        return $return_code;
    }

    public function trustee_import($file)
    {
        $return_code = false;
        $handle = fopen($file, "r");
        $dbh = $this->connectDB();

        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $name = $filesop[0];
            $category = $filesop[1];
            $address = $filesop[2];
            $web_link = $filesop[3];

            $stmt = $dbh->prepare('INSERT INTO trustees VALUES (:id, :name, :category, :address, :web_link)');

            $id = '';
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':web_link', $web_link);
            $result = $stmt->execute();

            if ($result) {
                $return_code = true;
            }
        }
        return $return_code;
    }

    public function update_trustee_law($app, $refusal, $restrict, $validity, $revocation, $function){
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE laws SET application =  :app, refusal = :refusal, restriction = :restriction,
                                validity = :validity, revocation = :revocation, `function` = :functions WHERE provider = :provider');

        $provider = 'trustee';
        $stmt->bindParam(':app', $app);
        $stmt->bindParam(':refusal', $refusal);
        $stmt->bindParam(':restriction', $restrict);
        $stmt->bindParam(':validity', $validity);
        $stmt->bindParam(':revocation', $revocation);
        $stmt->bindParam(':functions', $function);
        $stmt->bindParam(':provider', $provider);

        $result = $stmt->execute();
        return $result;
    }

    public function fetch_trustee_law(){
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('SELECT * FROM laws WHERE provider = :provider');
        $provider = 'trustee';
        $stmt->bindParam(':provider',$provider);
        $stmt->execute();
        $law = $stmt->fetch(PDO::FETCH_ASSOC);
        return $law;
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