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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                $address = $scheme['address'];
                $web_link = $scheme['web_link'];
                $tel = $scheme['tel'];

                ?>
                <tr>

                    <td align="center">
                        <label><input type="checkbox" id="schemes[]" name="schemes[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td>
                        <?php echo $tel; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_time_stamps()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM time_stamps");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($time_stamp = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $time_stamp['id'];
                $last_updated = $time_stamp['last_updated'];
                $license = $time_stamp['licences'];

                ?>
                <tr>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $last_updated; ?>
                    </td>
                    <td>
                        <?php echo $license; ?></td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
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
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_corporate_trustees()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM corporate_trustees");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($trustee = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $trustee['id'];
                $name = $trustee['name'];
                $address = $trustee['address'];
                $web_link = $trustee['web_link'];
                $tel = $trustee['tel'];

                ?>
                <tr>

                    <td align="center">
                        <label><input type="checkbox" id="corporate-trustees[]" name="corporate-trustees[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td>
                        <?php echo $tel; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_individual_trustees()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM individual_trustees");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($trustee = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $trustee['id'];
                $name = $trustee['name'];
                $scheme = $trustee['scheme'];
                $tel = $trustee['tel'];

                ?>
                <tr>

                    <td align="center">
                        <label><input type="checkbox" id="individual-trustees[]" name="individual-trustees[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $scheme; ?>
                    </td>
                    <td>
                        <?php echo $tel; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>
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
                $address = $custodian['address'];
                $web_link = $custodian['web_link'];
                $tel = $custodian['tel'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="custodians[]" name="custodians[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td>
                        <?php echo $tel; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                        <label><input type="checkbox" id="faqs[]" name="faqs[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                    <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

                </td>
                <td>
                    <img src="<?php echo 'img/' . $image; ?>" class="img-responsive">
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
                        <label><input type="checkbox" id="BoDs[]" name="BoDs[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                $address = $admin['address'];
                $web_link = $admin['web_link'];
                $tel = $admin['tel'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="administrators[]" name="administrators[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td>
                        <?php echo $tel; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                $address = $fund_managers['address'];
                $web_link = $fund_managers['web_link'];
                $tel = $fund_managers['tel'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="fund_managers[]" name="fund_managers[]" value="<?php echo $id; ?>"></label>
                    </td>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $web_link; ?>
                    </td>
                    <td>
                        <?php echo $tel; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                        <label><input type="checkbox" id="tenders[]" name="tenders[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                        <label><input type="checkbox" id="vacancies[]" name="vacancies[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                        <label><input type="checkbox" id="reports[]" name="reports[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_i_media()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM internal_media");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($media = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $media['id'];
                $title = $media['title'];
                $date = $media['date_realesed'];
                $source = $media['source'];
                $attachment = $media['attachment'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="media[]" name="media[]" value="<?php echo $id; ?>"></label>
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
                        <?php echo $source; ?>
                    </td>
                    <td>
                        <a href="<?php echo 'docs/' . $attachment ?>" target="_blank"><img src="img/pdf.png"></a>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }
    }

    public function get_e_media()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM external_media");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($media = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $media['id'];
                $title = $media['title'];
                $date = $media['date_realesed'];
                $source = $media['source'];
                $link = $media['link'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="media[]" name="media[]" value="<?php echo $id; ?>"></label>
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
                        <?php echo $source; ?>
                    </td>
                    <td>
                        <?php echo $link; ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>
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
                        <label><input type="checkbox" id="workshops[]" name="workshops[]" value="<?php echo $id; ?>"></label>
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
                        while ($workshop_docs = $sth->fetch(PDO::FETCH_ASSOC)) {
                            $attachment = $workshop_docs['attachment'];
                            ?>
                            <a href="<?php echo 'docs/' . $attachment ?>" target="_blank"><img src="img/pdf.png"></a>
                        <?php
                        }
                        ?>
                    </td>
                    <td align="center">
                        <span id="<?php echo $id; ?>" class="edit" style="margin-right: 10%;"><span
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>
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
                $pdf = $article['attachment'];
                $expiry = $article['expiry'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="articles[]" name="articles[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
                $pdf = $resource['attachment'];

                ?>
                <tr>
                    <td align="center">
                        <label><input type="checkbox" id="resources[]" name="resources[]" value="<?php echo $id; ?>"></label>
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
                                class="glyphicon glyphicon-pencil icon-edit"></span></span>
                        <span id="<?php echo $id; ?>" class="delete glyphicon glyphicon-remove icon-delete"></span>

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
        $statementHandler = $dbh->prepare("SELECT * FROM pages WHERE type = :type");
        $type = 'normal';
        $statementHandler->bindParam(':type', $type);
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($page = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $page['id'];
                $name = $page['name'];

                ?>

                <div class="form-group">
                    <div class="col-md-3" style="padding-top: 2%;"><label for="pages"><?php echo $name; ?></label></div>
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


//        $result = false;
//        $dbh = $this->connectDB();
//        $length = count($slides);
//        $statementHandler = $dbh->prepare('SELECT * FROM slideshow WHERE id = :ids');
//        $sth = $dbh->prepare('DELETE FROM slideshow WHERE id = :ids');
//
//        for ($i = 0; $i < $length; $i++) {
//            $result = $statementHandler->execute(array('ids' => $slides[$i]));
//            if ($result) {
//                $files = $statementHandler->fetch(PDO::FETCH_ASSOC);
//                $file_path = realpath('../img/slideshowimgs/' . $files['imagename']);
//                if (is_writable($file_path)) {
//                    if (unlink($file_path)) {
//                        $sth->bindParam(':ids', $slides[$i]);
//                        $result = $sth->execute();
//                    }
//                }
//            }
//        }
//        return $result;

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
        $statementHandler = null;
        $result = false;
        $dbh = $this->connectDB();
        $length = count($ids);
        if ($path == 'index') {
            $sth = $dbh->prepare('DELETE FROM slideshow WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM slideshow WHERE id = :ids');

            for ($i = 0; $i < $length; $i++) {
                $result = $statementHandler->execute(array('ids' => $ids[$i]));
                if ($result) {
                    $files = $statementHandler->fetch(PDO::FETCH_ASSOC);
                    $file_path = realpath('../img/slideshowimgs/' . $files['imagename']);
                    if (is_writable($file_path)) {
                        if (unlink($file_path)) {
                            $sth->bindParam(':ids', $ids[$i]);
                            $result = $sth->execute();
                        }
                    }
                }
            }

        } elseif ($path == 'workshops') {
            $sth = $dbh->prepare('DELETE FROM workshops WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM workshops INNER JOIN workshop_docs
                                                ON workshops.id = workshop_docs.workshop_id WHERE workshops.id = :ids');
            for ($i = 0; $i < $length; $i++) {
                $result = $statementHandler->execute(array('ids' => $ids[$i]));
                if ($result) {
                    $num_of_rows = $statementHandler->rowCount();
                    for($j = 0;$j < $num_of_rows;$j++) {
                        $files = $statementHandler->fetch(PDO::FETCH_ASSOC);
                        $file_path = realpath('../docs/' . $files['attachment']);
                        if (is_writable($file_path)) {
                            if (unlink($file_path)) {
                                $sth->bindParam(':ids', $ids[$i]);
                                $result = $sth->execute();
                            }
                        }
                    }
                }
            }
        }

        elseif ($path == 'corporate_trustees') {
            $sth = $dbh->prepare('DELETE FROM corporate_trustees WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM corporate_trustees WHERE id = :ids');
        } elseif ($path == 'individual_trustees') {
            $sth = $dbh->prepare('DELETE FROM individual_trustees WHERE id = :ids');
        } elseif ($path == 'custodians') {
            $sth = $dbh->prepare('DELETE FROM custodians WHERE id = :ids');
        } elseif ($path == 'schemes') {
            $sth = $dbh->prepare('DELETE FROM rbs WHERE id = :ids');
        } elseif ($path == 'administrators') {
            $sth = $dbh->prepare('DELETE FROM administrators WHERE id = :ids');
        } elseif ($path == 'fund_managers') {
            $sth = $dbh->prepare('DELETE FROM fund_managers WHERE id = :ids');
        } elseif ($path == 'vacancies') {
            $sth = $dbh->prepare('DELETE FROM vacancies WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM vacancies WHERE id = :ids');
        } elseif ($path == 'tenders') {
            $sth = $dbh->prepare('DELETE FROM tenders WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM tenders WHERE id = :ids');
        } elseif ($path == 'articles') {
            $sth = $dbh->prepare('DELETE FROM articles WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM articles WHERE id = :ids');
        } elseif ($path == 'resources') {
            $sth = $dbh->prepare('DELETE FROM resources WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM resources WHERE id = :ids');
        } elseif ($path == 'BoDs') {
            $sth = $dbh->prepare('DELETE FROM bod WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM bod WHERE id = :ids');
        } elseif ($path == 'departments') {
            $sth = $dbh->prepare('DELETE FROM departments WHERE id = :ids');
        } elseif ($path == 'reports') {
            $sth = $dbh->prepare('DELETE FROM reports WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM reports WHERE id = :ids');
        } elseif ($path == 'faqs') {
            $sth = $dbh->prepare('DELETE FROM faqs WHERE id = :ids');
        } elseif ($path == 'imedia') {
            $sth = $dbh->prepare('DELETE FROM internal_media WHERE id = :ids');
            $statementHandler = $dbh->prepare('SELECT * FROM internal_media WHERE id = :ids');
        } elseif ($path == 'emedia') {
            $sth = $dbh->prepare('DELETE FROM external_media WHERE id = :ids');
        } elseif ($path == 'users') {
            $sth = $dbh->prepare('DELETE FROM users WHERE id = :ids');
        }

        if ($path == 'vacancies' || $path == 'tenders' || $path == 'resources' || $path == 'articles' || $path == 'reports' || $path == 'imedia') {
            for ($i = 0; $i < $length; $i++) {
                $result = $statementHandler->execute(array('ids' => $ids[$i]));
                if ($result) {
                    $files = $statementHandler->fetch(PDO::FETCH_ASSOC);
                    $file_path = realpath('../docs/' . $files['attachment']);
                    if (is_writable($file_path)) {
                        if (unlink($file_path)) {
                            $sth->bindParam(':ids', $ids[$i]);
                            $result = $sth->execute();
                        }
                    }
                }
            }
        } elseif ($path == 'BoDs') {
            for ($i = 0; $i < $length; $i++) {
                $result = $statementHandler->execute(array('ids' => $ids[$i]));
                if ($result) {
                    $files = $statementHandler->fetch(PDO::FETCH_ASSOC);
                    $file_path = realpath('../img/' . $files['image']);
                    if (is_writable($file_path)) {
                        if (unlink($file_path)) {
                            $sth->bindParam(':ids', $ids[$i]);
                            $result = $sth->execute();
                        }
                    }
                }
            }

        } else {
            for ($i = 0; $i < $length; $i++) {
                $sth->bindParam(':ids', $ids[$i]);
                $result = $sth->execute();
            }
        }
        return $result;
    }

    public function remove_page_allocs($ids)
    {
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

    public function fetch_functions_items()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM functions");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($item = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $item['id'];
                $tab = $item['tab'];
                ?>
                <tr>

                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $tab; ?>
                    </td>
                    <td align="center">
                        <a href="php/delete_function_item.php?id=<?php echo $id; ?>" <span id=""
                                                                                           class="delete glyphicon glyphicon-remove icon-delete"></span>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    public function fetch_pages()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM pages WHERE type = 'custom'");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($item = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $item['id'];
                $name = $item['name'];
                ?>
                <tr>

                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td align="center">
                        <a href="php/delete_page.php?id=<?php echo $id; ?>" <span id=""
                                                                                  class="delete glyphicon glyphicon-remove icon-delete"></span>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    public function fetch_time_stamp($id)
    {
        $dbh = $this->connectDB();
        $sth = $dbh->prepare('SELECT * FROM time_stamps WHERE id = :ids');
        $sth->bindParam(':ids', $id);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $time_stamp = $sth->fetch(PDO::FETCH_ASSOC);
            return $time_stamp;
        }
        return null;
    }

    public function fetch_who_we_are_items()
    {
        $dbh = $this->connectDB();
        $statementHandler = $dbh->prepare("SELECT * FROM who_we_are");
        $statementHandler->execute();
        if ($statementHandler->rowCount() > 0) {
            $i = 1;
            while ($item = $statementHandler->fetch(PDO::FETCH_ASSOC)) {
                $id = $item['id'];
                $tab = $item['tab'];
                ?>
                <tr>

                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $tab; ?>
                    </td>
                    <td align="center">
                        <a href="php/delete_who_we_are_item.php?id=<?php echo $id; ?>" <span id=""
                                                                                             class="delete glyphicon glyphicon-remove icon-delete"></span>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo false;
        }

    }

    public function fetch_functions()
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('SELECT * FROM functions');
        $stmt->execute();
        while ($law = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="form-group col-md-12">
                <input type="text" id="tab" name="tabs[]" value="<?php echo $law['tab']; ?>" class="form-control"
                       style="font-weight: bold;" placeholder="">
            </div>
            <div class="form-group col-md-12">
                <textarea
                    id="detail" name="details[]"
                    class="form-control ckeditor" placeholder=""><?php echo $law['details']; ?></textarea>
            </div>
        <?php

        }
    }

    public function fetch_who_we_are()
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('SELECT * FROM who_we_are');
        $stmt->execute();
        while ($law = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="form-group col-md-12">
                <input type="text" id="tab" name="tabs[]" value="<?php echo $law['tab']; ?>" class="form-control"
                       style="font-weight: bold;" placeholder="">
            </div>
            <div class="form-group col-md-12">
                <textarea
                    id="detail" name="details[]"
                    class="form-control ckeditor" placeholder=""><?php echo $law['details']; ?></textarea>
            </div>
        <?php

        }
    }

    public function update_who_we_are($tabs, $details)
    {
        $result = null;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('DELETE FROM who_we_are');
        $result = $stmt->execute();
        if ($result) {
            $id = '';
            for ($i = 0; $i < count($tabs); $i++) {
                $stmt = $dbh->prepare('INSERT INTO who_we_are VALUES(:id, :tab, :details)');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':tab', $tabs[$i]);
                $stmt->bindParam(':details', $details[$i]);
                $result = $stmt->execute();
            }
            return $result;
        }
    }

    public function update_functions($tabs, $details)
    {
        $result = null;
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('DELETE FROM functions');
        $result = $stmt->execute();
        if ($result) {
            $id = '';
            for ($i = 0; $i < count($tabs); $i++) {
                $stmt = $dbh->prepare('INSERT INTO functions VALUES(:id, :tab, :details)');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':tab', $tabs[$i]);
                $stmt->bindParam(':details', $details[$i]);
                $result = $stmt->execute();
            }
            return $result;
        }
    }

    public function delete_function_item($id)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('DELETE FROM functions WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        return $result;
    }

    public function delete_page($id)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('SELECT * FROM pages WHERE id = :id');
        $result = $stmt->execute(array('id' => $id));
        if ($result) {
            $name = $stmt->fetch(PDO::FETCH_ASSOC);
            $file_path = realpath('../img/slideshowimgs/' . $name['name']);
            if (is_writable($file_path)) {
                if (unlink($file_path)) {
                    $stmt = $dbh->prepare('DELETE FROM pages WHERE id = :id');
                    $stmt->bindParam(':id', $id);
                    $result = $stmt->execute();
                    if ($result) {
                        $stmt = $dbh->prepare('DELETE FROM content WHERE page_id = :id');
                        $stmt->bindParam(':id', $id);
                        $result = $stmt->execute();
                    }
                    return $result;
                }
            }
            return false;
        }
        return false;
    }

    public function delete_who_we_are_item($id)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('DELETE FROM who_we_are WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        return $result;
    }

    public function edit_time_stamp($id, $time_stamp)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE time_stamps SET last_updated = :time_stamp WHERE id = :id');
        $result = $stmt->execute(array('time_stamp' => $time_stamp, 'id' => $id));
        return $result;
    }

    public function get_you_tube()
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('SELECT * FROM youtube');
        $result = $stmt->execute();
        if($result){
            $you_tube = $stmt->fetch(PDO::FETCH_ASSOC);
            $link = $you_tube['link'];
            return $link;
        }
        return false;
    }

    public function update_you_tube_link($link)
    {
        $dbh = $this->connectDB();
        $stmt = $dbh->prepare('UPDATE youtube SET link = :link');
        $result = $stmt->execute(array('link' => $link));
        if($result){
            return true;
        }
        return false;
    }
}