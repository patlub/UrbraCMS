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
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $i = 1;
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
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }


    public function get_users()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM users");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($scheme = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $scheme['id'];
                $fname = $scheme['firstName'];
                $lname = $scheme['lastName'];
                $email = $scheme['email'];

                ?>
                <tr>

                    <td align="center">
                        <label><input type="checkbox" name="users[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $fname; ?>
                    </td>
                    <td>
                        <?php echo $lname; ?>
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>

                    <td align="center">
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $i = 1;
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
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>
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
            $i = 1;
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
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_faqs()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM faqs");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($faq = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $faq['id'];
                $question = $faq['question'];
                $answer = $faq['answer'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="faqs[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $question; ?>
                    </td>
                    <td>
                        <?php echo $answer ?>
                    </td>

                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $department = $statementHandler->fetch(PDO::FETCH_ASSOC);
                $id = $department['id'];
                $image = $department['image'];

                ?>
                <tr>
                    <td align="center" width="10">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>
                    <td>
                        <img src="<?php echo 'img/'.$image; ?>" class="img-responsive">
                    </td>
                </tr>
            <?php

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
            $i = 1;
            while ($BoD = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $BoD['id'];
                $name = $BoD['name'];
                $details = $BoD['details'];
                $image = $BoD['image'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="BoDs[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $details; ?>
                    </td>
                    <td>
                        <img src="<?php echo "img/" . $image; ?>" height="100" width="100">
                    </td>

                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $i = 1;
            while ($admin = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $admin['id'];
                $name = $admin['name'];
                $category = $admin['category'];
                $address = $admin['address'];
                $web_link = $admin['web_link'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="administrators[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $i = 1;
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
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $i = 1;
            while ($tender = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $tender['id'];
                $ref_no = $tender['ref_no'];
                $desc = $tender['desc'];
                $category = $tender['category'];
                $deadline = $tender['deadline'];
                $date_pub = $tender['date_pub'];
                $date_awarded = $tender['date_awarded'];
                $attachment = $tender['attachment'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="tenders[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

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
            $i = 1;
            while ($vacancy = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $vacancy['id'];
                $title = $vacancy['title'];
                $start_date = $vacancy['start_date'];
                $end_date = $vacancy['end_date'];
                $description = $vacancy['description'];
                $attachment = $vacancy['attachment'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="vacancies[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
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
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_reports()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM reports");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($report = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $report['id'];
                $title = $report['title'];
                $date = $report['date_realesed'];
                $description = $report['desc'];
                $attachment = $report['attachment'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="reports[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $date; ?>
                    </td>
                    <td>
                        <?php echo $description; ?>
                    </td>
                    <td>
                        <a href="<?php echo 'docs/' . $attachment ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }


    public function get_workshops()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM workshops");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($workshops = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $workshops['id'];
                $title = $workshops['title'];
                $date = $workshops['dateheld'];
                $description = $workshops['desc'];



                $sth = $dbh->prepare("SELECT * FROM workshop_docs WHERE workshop_id = :id ");
                $sth->bindParam(':id', $id);
                $sth->execute();

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="workshops[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $date; ?>
                    </td>
                    <td>
                        <?php echo $description; ?>
                    </td>
                    <td>
                        <?php
                        while($workshop_docs = $sth->fetch(PDO::FETCH_ASSOC)){
                            $attachment = $workshop_docs['attachment'];
                            ?>
                            <a href="<?php echo 'docs/' . $attachment ?>" target="_blank"><img src="img/pdf.png"></a>
                        <?php
                        }
                        ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>
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
            $i = 1;
            while ($article = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $article['id'];
                $title = $article['title'];
                $details = $article['article'];
                $date = $article['date'];
                $pdf = $article['resource'];
                $expiry = $article['expiry'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="articles[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
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
                    <td>
                        <?php echo $expiry; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>

                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    public function get_resources()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM resources");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($resource = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $resource['id'];
                $title = $resource['name'];
                $pdf = $resource['pdf'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" name="resources[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <a href="<?php echo 'docs/' . $pdf ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit" ></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete" ></span>

                    </td>

                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    public function get_pages()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM pages");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($page = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $page['id'];
                $name = $page['name'];

                ?>

                <div class="form-group">
                    <div class="col-md-3" style="padding-top: 2%;"><label for="pages"><?php echo $name;?></label></div>
                    <div class="col-md-3"><input type="checkbox" value="<?php echo $id; ?>" id="pages" name="pages[]"
                                                 class="form-control"></div>
                </div>

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

    public function del_resources($resources)
    {
        $result = false;
        $dbh = $this->connectDB();
        $length = count($resources);
        $sth = $dbh->prepare('DELETE FROM resources WHERE id = :ids');

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $resources[$i]);
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

    public function del($ids, $path)
    {
        $sth = null;
        $result = false;
        $dbh = $this->connectDB();
        $length = count($ids);
        if($path == 'trustees') {
            $sth = $dbh->prepare('DELETE FROM trustees WHERE id = :ids');
        }elseif($path == 'custodians'){
            $sth = $dbh->prepare('DELETE FROM custodians WHERE id = :ids');
        }elseif($path == 'schemes'){
            $sth = $dbh->prepare('DELETE FROM rbs WHERE id = :ids');
        }elseif($path == 'custodians'){
            $sth = $dbh->prepare('DELETE FROM custodians WHERE id = :ids');
        }elseif($path == 'administrators'){
            $sth = $dbh->prepare('DELETE FROM administrators WHERE id = :ids');
        }elseif($path == 'fund_managers'){
            $sth = $dbh->prepare('DELETE FROM fund_managers WHERE id = :ids');
        }elseif($path == 'vacancies'){
            $sth = $dbh->prepare('DELETE FROM vacancies WHERE id = :ids');
        }elseif($path == 'tenders'){
            $sth = $dbh->prepare('DELETE FROM tenders WHERE id = :ids');
        }elseif($path == 'articles'){
            $sth = $dbh->prepare('DELETE FROM articles WHERE id = :ids');
        }elseif($path == 'resources'){
            $sth = $dbh->prepare('DELETE FROM resources WHERE id = :ids');
        }elseif($path == 'BoDs'){
            $sth = $dbh->prepare('DELETE FROM bod WHERE id = :ids');
        }elseif($path == 'departments'){
            $sth = $dbh->prepare('DELETE FROM departments WHERE id = :ids');
        }elseif($path == 'reports'){
            $sth = $dbh->prepare('DELETE FROM reports WHERE id = :ids');
        }elseif($path == 'workshops'){
            $sth = $dbh->prepare('DELETE FROM workshops WHERE id = :ids');
        }elseif($path == 'faqs'){
            $sth = $dbh->prepare('DELETE FROM faqs WHERE id = :ids');
        }elseif($path == 'users'){
            $sth = $dbh->prepare('DELETE FROM users WHERE id = :ids');
        }elseif($path == 'index'){
            $sth = $dbh->prepare('DELETE FROM slideshow WHERE id = :ids');
        }

        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $ids[$i]);
            $result = $sth->execute();
        }
        return $result;
    }

    public function remove_page_allocs($ids){
        $result = false;
        $length = count($ids);
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('DELETE FROM page_alloc WHERE uid = :ids');
        for ($i = 0; $i < $length; $i++) {
            $sth->bindParam(':ids', $ids[$i]);
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