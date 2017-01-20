<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/12/2017
 * Time: 1:12 AM
 */
class DatabaseHelper
{
    function get_slides()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM slideshow");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($scheme = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $scheme['id'];
                $caption = $scheme['caption'];
                $link = $scheme['link'];
                $image_name = $scheme['imagename'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="slides[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $caption; ?></td>
                    <td>
                        <?php echo $link; ?>
                    </td>
                    <td width="120">
                        <img src="<?php echo "img/slideshowimgs/" . $image_name; ?>" height="70" width="100">
                    </td>
                    <td align="center">
                        <a href="edit_slide.php?id=<?php echo $id; ?>" class="btn btn-success ">Edit</a>
                        <a href="delete_slide.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_schemes()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM rbs");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($scheme = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $scheme['id'];
                $name = $scheme['name'];
                $category = $scheme['category'];
                $address = $scheme['address'];
                $web_link = $scheme['web_link'];

                ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $category; ?></td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_trustees()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM trustees");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($trustee = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $trustee['id'];
                $name = $trustee['name'];
                $category = $trustee['category'];
                $address = $trustee['address'];
                $web_link = $trustee['web_link'];

                ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $category; ?></td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_custodians()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM custodians");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($custodian = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $custodian['id'];
                $name = $custodian['name'];
                $category = $custodian['category'];
                $address = $custodian['address'];
                $web_link = $custodian['web_link'];

                ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $category; ?></td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_administrators()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM administrators");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($custodian = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $custodian['id'];
                $name = $custodian['name'];
                $category = $custodian['category'];
                $address = $custodian['address'];
                $web_link = $custodian['web_link'];

                ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $category; ?></td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_fund_managers()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM fund_managers");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($fund_managers = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $fund_managers['id'];
                $name = $fund_managers['name'];
                $category = $fund_managers['category'];
                $address = $fund_managers['address'];
                $web_link = $fund_managers['web_link'];

                ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $category; ?></td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_tenders()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM tenders");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($article = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $article['id'];
                $ref_no = $article['ref_no'];
                $desc = $article['desc'];
                $category = $article['category'];
                $deadline = $article['deadline'];
                $date_pub = $article['date_pub'];
                $date_awarded = $article['date_awarded'];
                $attachment = $article['attachment'];

                ?>
                <tr>
                    <td>
                        <?php echo $ref_no; ?>
                    </td>
                    <td>
                        <?php echo $desc; ?>
                    </td>
                    <td>
                        <?php echo $category; ?>
                    </td>
                    <td>
                        <?php echo $deadline; ?>
                    </td>
                    <td>
                        <?php echo $date_pub; ?>
                    </td>
                    <td>
                        <?php echo $date_awarded; ?>
                    </td>
                    <td>
                        <a href="<?php echo 'docs/' . $attachment ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_vacancies()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM vacancies");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($article = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $article['id'];
                $name = $article['name'];
                $details = $article['details'];
                $end_date = $article['end-date'];
                $pdf = $article['pdf'];

                ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $end_date; ?></td>
                    <td>
                    <td>
                        <?php echo $details; ?></td>
                    <td>
                        <a href="<?php echo 'docs/' . $pdf ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    function get_articles(){
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM articles");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($article = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $article['id'];
                $title = $article['title'];
                $details = $article['article'];
                $date = $article['date'];
                $pdf = $article['resource'];

                ?>
                <tr>
                    <td>
                        <?php echo $date; ?></td>
                    <td>
                        <?php echo $title; ?>
                    </td>

                    <td>
                        <?php echo $details; ?></td>
                    <td>
                        <a href="<?php echo 'docs/' . $pdf ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    function load_hours(){
        for($i = 0; $i < 24;$i++){
            if($i < 10){
                $i = '0'.$i;
            }
            echo'<option value="'.$i.'">'.$i.'</option>';
        }
    }

    function load_minutes(){
        for($i = 0; $i < 60;$i++){
            if($i < 10){
                $i = '0'.$i;
            }
            echo'<option value="'.$i.'">'.$i.'</option>';
        }
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