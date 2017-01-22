<?php

/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/12/2017
 * Time: 1:12 AM
 */
class DatabaseHelper
{
    public function get_slides()
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
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="delete_disciple.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_schemes()
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
                    <td align="center">
                        <label><input type="checkbox" name="schemes[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <a href="<?php echo $id; ?>" id="edit-scheme[]" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_scheme.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_trustees()
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
                    <td align="center">
                        <label><input type="checkbox" name="trustees[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_trustee.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_custodians()
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
                    <td align="center">
                        <label><input type="checkbox" name="custodians[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <a href="php/remove_custodian.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove icon-delete"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_departments()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM departments");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($custodian = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $custodian['id'];
                $name = $custodian['name'];
                $head = $custodian['head'];


                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="departments[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $head; ?>
                    </td>

                    <td align="center">
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_department.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_BoDs()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM bod");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($custodian = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $custodian['id'];
                $name = $custodian['name'];
                $image = $custodian['image'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="BoDs[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <img src="<?php echo "imgs/" . $image; ?>" height="100" width="100">
                    </td>

                    <td align="center">
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_bod.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_administrators()
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
                    <td align="center">
                        <label><input type="checkbox" name="administrators[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_admin.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_fund_managers()
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
                    <td align="center">
                        <label><input type="checkbox" name="fund_managers[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_fund_manager.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_tenders()
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
                    <td align="center">
                        <label><input type="checkbox" name="tenders[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_tender.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_vacancies()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM vacancies");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            while ($article = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $article['id'];
                $title = $article['title'];
                $start_date = $article['start_date'];
                $end_date = $article['end_date'];
                $description = $article['description'];
                $attachment = $article['attachment'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="vacancies[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $start_date; ?>
                    </td>
                    <td>
                        <?php echo $end_date; ?>
                    </td>
                    <td>
                        <?php echo $description; ?>
                    </td>
                    <td>
                        <a href="<?php echo 'docs/' . $attachment ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_vacancy.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_articles()
    {
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
                    <td align="center">
                        <label><input type="checkbox" name="articles[]" value="<?php echo $id; ?>"></label>
                    </td>
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
                        <a href="edit_disciple.php?id=<?php echo $id; ?>" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="php/remove_article.php?id=<?php echo $id; ?>" onclick="return(confirm('Are you sure you want to delete this item'))"><span
                                class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    public function load_hours()
    {
        for ($i = 0; $i < 24; $i++) {
            if ($i < 10) {
                $i = '0' . $i;
            }
            echo '<option value="' . $i . '">' . $i . '</option>';
        }
    }

    public function load_minutes()
    {
        for ($i = 0; $i < 60; $i++) {
            if ($i < 10) {
                $i = '0' . $i;
            }
            echo '<option value="' . $i . '">' . $i . '</option>';
        }
    }

    public function del_administrator($administrators)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($administrators);
        $sth = $dbh->prepare('DELETE FROM administrators WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $administrators[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_articles($articles)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($articles);
        $sth = $dbh->prepare('DELETE FROM articles WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $articles[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_custodians($custodians)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($custodians);
        $sth = $dbh->prepare('DELETE FROM custodians WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $custodians[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_fund_managers($fund_managers)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($fund_managers);
        $sth = $dbh->prepare('DELETE FROM fund_managers WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $fund_managers[$i]);
            $result = $sth->execute();
        }
        return $result;

    }

    public function del_schemes($schemes)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($schemes);
        $sth = $dbh->prepare('DELETE FROM rbs WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $schemes[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_slides($slides)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($slides);
        $sth = $dbh->prepare('DELETE FROM slideshow WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $slides[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_tenders($tenders)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($tenders);
        $sth = $dbh->prepare('DELETE FROM tenders WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $tenders[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_trustees($trustees)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($trustees);
        $sth = $dbh->prepare('DELETE FROM trustees WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $trustees[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_vacancies($vacancies)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($vacancies);
        $sth = $dbh->prepare('DELETE FROM vacancies WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $vacancies[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_departments($departments)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($departments);
        $sth = $dbh->prepare('DELETE FROM departments WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $departments[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function del_BoDs($bods)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($bods);
        $sth = $dbh->prepare('DELETE FROM bod WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $bods[$i]);
            $result = $sth->execute();
        }
        return $result;
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