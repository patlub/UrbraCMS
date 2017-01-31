$(document).ready(function (e) {
    var slides_changed = false;
    var slides_img_url = 'img/slideshowimgs/';
    var no_of_slides;
    del_tmp_slide_show();
    async_get_slide_show();
    async_get_sec_1();
    async_get_sec_2();
    async_get_sec_3();
    preview_slide();
    add('add-article-form', 'php/add_article.php');
    add('add-article-form', 'php/add_article.php');
    add('add-admin-form', 'php/add_administrator.php');
    add('add-custodian-form', 'php/add_custodian.php');
    add('add-fund-manager-form', 'php/add_fund_manager.php');
    add('add-scheme-form', 'php/add_scheme.php');
    add('add-tender-form', 'php/add_tender.php');
    add('add-trustee-form', 'php/add_trustee.php');
    add('add-vacancy-form', 'php/add_vacancy.php');
    add('add-department-form', 'php/add_department.php');
    add('add-resource-form', 'php/add_resource.php');
    add('add-BoD-form', 'php/add_bod.php');
    import_csv('import-dep-form', 'php/import_dep.php');
    import_csv('import-admin-form', 'php/import_admin.php');
    import_csv('import-trustee-form', 'php/import_trustee.php');
    import_csv('import-scheme-form', 'php/import_scheme.php');
    import_csv('import-custodian-form', 'php/import_custodian.php');
    import_csv('import-fund-manager-form', 'php/import_custodian.php');
    //del('slide-form', 'php/delete_slides.php');
    //del('articles-form', 'php/delete_articles.php');
    //del('admins-form', 'php/delete_admins.php');
    //del('custodians-form', 'php/delete_custodians.php');
    //del('fund_managers-form', 'php/delete_fund_managers.php');
    //del('schemes-form', 'php/delete_schemes.php');
    //del('tenders-form', 'php/delete_tenders.php');
    //del('trustees-form', 'php/delete_trustees.php');
    //del('vacancies-form', 'php/delete_vacancies.php');
    //del('departments-form', 'php/delete_departments.php');
    //del('BoD-form', 'php/delete_bods.php');
    //del('resource-form', 'php/delete_resources.php');

    tmp_muliti_del('trustee-form','php/tmp_trustees_del.php');
    edit('edit-admin-form', 'php/edit_admin.php');
    edit('edit-custodian-form', 'php/edit_custodian.php');
    edit('edit-fund-manager-form', 'php/edit_fund_manager.php');
    edit('edit-scheme-form', 'php/edit_scheme.php');
    edit('edit-trustee-form', 'php/edit_trustee.php');
    edit('edit-article-form', 'php/edit_article.php');
    edit('edit-vacancy-form', 'php/edit_vacancy.php');
    edit('edit-department-form', 'php/edit_department.php');
    edit('edit-tender-form', 'php/edit_tender.php');
    edit('edit-BoD-form', 'php/edit_bod.php');
    edit('edit-resource-form', 'php/edit_resource.php');
    edit('edit-slide-form', 'php/edit_slide.php');
    sign_in('sign-in-form', 'php/sign_in.php');
    update_serv_sec('update_serv_sec1', 'php/update_serv_sec1.php', async_get_sec_1());
    update_serv_sec('update_serv_sec2', 'php/update_serv_sec2.php', async_get_sec_2());
    update_serv_sec('update_serv_sec3', 'php/update_serv_sec3.php', async_get_sec_3());

    $(window).bind('beforeunload', function () {
        if (slides_changed) {
            return 'Are you sure you want to leave the page ?';
        }
    });

    $(window).bind('unload', function () {
        if (slides_changed) {
            del_tmp_slide_show();
        }
    });

    function del_tmp_slide_show() {
        $.ajax({
            url: "php/delete_tmp_slide.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false        // To send DOMDocument or non processed data file it is set to false

        });
    }

    $("#update-slide").on('click', (function (e) {
        e.preventDefault();
        $('.loader').show();
        slides_changed = false;
        $.ajax({
            url: "php/add_slide.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('.loader').hide();
                if (data == true) {
                    $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                    location.reload(true);
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            },
            error: function () {
                $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').hide();
            },
            complete: function () {
                $('.loader').hide();
            }
        });

    }));

    function add(form, url) {
        $("#" + form).on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: url, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('.loader').hide();
                    if (data == true) {
                        $('#success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                    } else {
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });

        }));
    }

    function sign_in(form, url) {
        $("#" + form).on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: url, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('.loader').hide();
                    if (data == true) {
                        location.href = 'index.php';
                    } else {
                        $('#login-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('network-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });

        }));
    }

    function import_csv(form, url) {
        $("#" + form).on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: url, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('.loader').hide();
                    if (data == true) {
                        location.reload();
                    } else {
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });

        }));
    }

    function edit(form, url) {
        $("#" + form).on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: url, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('.loader').hide();
                    if (data == true) {
                        $('#update-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                        location.reload();
                    } else {
                        $('#network-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });

        }));
    }

    //function del(form, url) {
    //    $("#" + form).on('submit', (function (e) {
    //        e.preventDefault();
    //        $('.loader').show();
    //
    //        $.ajax({
    //            url: url, // Url to which the request is send
    //            type: "POST",             // Type of request to be send, called as method
    //            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    //            contentType: false,       // The content type used when sending data to the server.
    //            cache: false,             // To unable request pages to be cached
    //            processData: false,        // To send DOMDocument or non processed data file it is set to false
    //            success: function (data)   // A function to be called if request succeeds
    //            {
    //                $('.loader').hide();
    //                if (data == true) {
    //                    $('#deleted-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
    //                    location.reload();
    //                } else {
    //                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
    //                }
    //            },
    //            error: function () {
    //                $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
    //                $('.loader').hide();
    //            },
    //            complete: function () {
    //                $('.loader').hide();
    //            }
    //        });
    //
    //    }));
    //}

    function update_serv_sec(form, url, async_get) {
        $("#" + form).on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: url, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('.loader').hide();
                    if (data == true) {
                        $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                        async_get();
                    } else {
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });

        }));
    }

    function async_get_slide_show() {
        $.ajax({
            type: "POST",
            url: "php/get_slide_show.php",
            success: function (data) {

                var json_obj = JSON.parse(data);
                set_up_slide_show(json_obj);
            }
        });
    }

    function set_up_slide_show(json) {
        no_of_slides = json.length;
        for (i = 0; i < no_of_slides; i++) {
            var image_name = slides_img_url + json[i].imagename;
            var link = json[i].link;
            var caption = json[i].caption;

            if (i == 0) {
                $('#indicators').append('<li data-target="#carousel-example-generic" data-slide-to="' + i + '" class="active"></li>');
            } else {
                $('#indicators').append('<li data-target="#carousel-example-generic" data-slide-to="' + i + '"></li>');
            }

            if (i == 0) {
                $('#carousel-inner').append('<div  class="item active">' +
                '<a href="' + link + '"><img src="' + image_name + '" alt="Slide image"></a>' +
                '<div class="carousel-caption">' +
                '<span class="caption-text">' + caption + '</span>' +
                '</div>' +
                '</div>');
            }
            else {

                $('#carousel-inner').append('<div class="item">' +
                '<a href="' + link + '"><img src="' + image_name + '" alt="slide image"></a>' +
                '<div class="carousel-caption">' +
                '<span class="caption-text">' + caption + '</span>' +
                '</div>' +
                '</div>');
            }
        }
    }

    function preview_slide() {
        $("#add-slide-form").on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            var caption = $('#caption').val();
            var link = $('#link').val();

            $.ajax({
                url: "php/tmp_add_slide.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    alert(data);
                    var img_url = slides_img_url + data;

                    if (data != false) {
                        //var i = parseInt(no_of_slides) + 1;
                        $('#indicators').append('<li data-target="#carousel-example-generic" data-slide-to=""></li>');

                        $('#carousel-inner').append('<div class="item">' +
                        '<a href="' + link + '"><img src="' + img_url + '" alt="slide image"></a>' +
                        '<div class="carousel-caption">' +
                        '<span class="caption-text">' + caption + '</span>' +
                        '</div>' +
                        '</div>');

                        $('.loader').hide();
                        $('#preview-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                        slides_changed = true;

                    } else {
                        $('.loader').hide();
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });

        }));
    }

    function async_get_sec_1() {
        $.ajax({
            type: "POST",
            url: "php/get_sec1.php",
            success: function (data) {

                data = data.split("-");
                var img_url = 'img/home_services/' + data[0];
                var heading = data[1];
                var text = data[2];

                $("#sec_head1").text(heading);
                $("#sec_text1").text(text);
                $("#sec_btn1").val(heading);
                $("#sub1").val(heading);
                $("#sub-text1").val(text);

                var $image = $("#sec_image1");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function () {
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_sec_2() {
        $.ajax({
            type: "POST",
            url: "php/get_sec2.php",
            success: function (data) {

                data = data.split("-");
                var img_url = 'img/home_services/' + data[0];
                var heading = data[1];
                var text = data[2];

                $("#sec_head2").text(heading);
                $("#sec_text2").text(text);
                $("#sec_btn2").val(heading);
                $("#sub2").val(heading);
                $("#sub-text2").val(text);

                var $image = $("#sec_image2");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function () {
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_sec_3() {
        $.ajax({
            type: "POST",
            url: "php/get_sec3.php",
            success: function (data) {

                data = data.split("-");
                var img_url = 'img/home_services/' + data[0];
                var heading = data[1];
                var text = data[2];

                $("#sec_head3").text(heading);
                $("#sec_text3").text(text);
                $("#sec_btn3").val(heading);
                $("#sub3").val(heading);
                $("#sub-text3").val(text);

                var $image = $("#sec_image3");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function () {
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            },
            error: function () {
                $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').hide();
            },
            complete: function () {
                $('.loader').hide();
            }
        });
    }

    $("td .edit").on('click', function () {

        $('.loader').show();
        var text = $(this).attr('id');
        var data = {id: text};
        var path = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
        var modal;
        var url = "php/fetch_custodian.php";
        if (path == "custodians.php") {
            url = "php/fetch_custodian.php";
            modal = "editCustodianModal";
        } else if (path == "administrators.php") {
            url = "php/fetch_admin.php";
            modal = "editAdminModal";
        } else if (path == "fund_managers.php") {
            url = "php/fetch_fund_manager.php";
            modal = "editFundManagerModal";
        } else if (path == "trustees.php") {
            url = "php/fetch_trustee.php";
            modal = "editTrusteeModal";
        } else if (path == "schemes.php") {
            url = "php/fetch_scheme.php";
            modal = "editSchemeModal";
        } else if (path == "articles.php") {
            url = "php/fetch_article.php";
            modal = "editArticleModal";
        } else if (path == "tenders.php") {
            url = "php/fetch_tender.php";
            modal = "editTenderModal";
        } else if (path == "vacancies.php") {
            url = "php/fetch_vacancy.php";
            modal = "editVacancyModal";
        } else if (path == "departments.php") {
            url = "php/fetch_department.php";
            modal = "editDepartmentModal";
        } else if (path == "BoDs.php") {
            url = "php/fetch_bod.php";
            modal = "editBoDModal";
        } else if (path == "resources.php") {
            url = "php/fetch_resource.php";
            modal = "editResourceModal";
        } else if (path == "index.php") {
            url = "php/fetch_slide.php";
            modal = "editSlideModal";
        }
        $.ajax({
            url: url, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,
            cache: false,             // To unable request pages to be cached
            success: function (data)   // A function to be called if request succeeds
            {
                if (path == "articles.php") {
                    set_up_article(data);
                }
                else if (path == "tenders.php") {
                    set_up_tender(data);
                }
                else if (path == "vacancies.php") {
                    set_up_vacancy(data);
                }
                else if (path == "departments.php") {
                    set_up_department(data);
                }
                else if (path == "BoDs.php") {
                    set_up_BoD(data);
                } else if (path == "resources.php") {
                    set_up_resource(data);
                } else if (path == "index.php") {
                    set_up_slide(data);
                }
                else {
                    data = data.split('-');
                    var name = data[0];
                    var category = data[1];
                    var address = data[2];
                    var link = data[3];
                    var id = data[4];

                    $('#edit-name').val(name);
                    $('#edit-category').val(category);
                    $('#edit-address').val(address);
                    $('#edit-link').val(link);
                    $('#id').val(id);

                }
                $('#' + modal).modal('show');

            },
            error: function () {
                $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').hide();
            },
            complete: function () {
                $('.loader').hide();
            }
        });
        return false;
    });

    function set_up_article(data) {
        data = data.split('*');
        var title = data[0];
        var article = data[1];

        var date = adjust_date(data[2]);

        var expiry = data[4];
        var id = data[5];

        var expiry_array = expiry.split(' ');

        var expiry_date = expiry_array[0];
        expiry_date = adjust_date(expiry_array[0]);

        var expiry_time = expiry_array[1];
        adjust_article_time(expiry_time);

        $('#edit-datepicker').val(date);
        $('#edit-article').val(article);
        $('#edit-title').val(title);
        $('#edit-expiry').val(expiry_date);
        $('#id').val(id);
    }

    function set_up_tender(data) {
        data = data.split('*');
        var ref = data[0];
        var desc = data[1];
        var category = data[2];
        var deadline = adjust_date(data[3]);
        var date_pub = adjust_date(data[4]);
        var date_awarded = adjust_date(data[5]);
        var id = data[7];

        $('#edit-ref_no').val(ref);
        $('#edit-desc').val(desc);
        $('#edit-category').val(category);
        $('#edit-deadline').val(deadline);
        $('#edit-date_awarded').val(date_awarded);
        $('#edit-dop').val(date_pub);
        $('#id').val(id);
    }

    function set_up_resource(data) {
        data = data.split('*');
        var name = data[0];
        var expiry = adjust_date(data[1]);
        var category = data[2];
        var id = data[4];

        $('#edit-title').val(name);
        $('#edit-datepicker').val(expiry);
        $('#edit-category').val(category);
        $('#id').val(id);
    }

    function set_up_department(data) {
        data = data.split('*');
        var name = data[0];
        var title = data[1];
        var id = data[2];

        $('#edit-name').val(name);
        $('#edit-head').val(title);
        $('#id').val(id);
    }

    function set_up_BoD(data) {
        data = data.split('*');
        var name = data[0];
        var id = data[1];
        var details = data[2];

        $('#edit-name').val(name);
        $('#edit-details').val(details);
        $('#id').val(id);
    }

    function set_up_slide(data) {
        data = data.split('*');
        var imagename = data[0];
        var caption = data[1];
        var link = data[2];
        var id = data[3];

        $('#edit-link').val(link);
        $('#edit-caption').val(caption);
        $('#id').val(id);
    }

    function set_up_vacancy(data) {
        data = data.split('*');
        var title = data[0];
        var sdate = data[1];
        var edate = data[2];
        var desc = data[3];
        var attachment = data[4];
        var id = data[1];

        var date_array = sdate.split(' ');
        sdate = date_array[0];
        sdate = adjust_date(date_array[0]);

        var stime = date_array[1];
        adjust_vacancy_start_time(stime);

        date_array = edate.split(' ');
        edate = date_array[0];
        edate = adjust_date(date_array[0]);

        var etime = date_array[1];
        adjust_vacancy_end_time(etime);

        $('#edit-title').val(title);
        $('#edit-start_date').val(sdate);
        $('#edit-end_date').val(edate);
        $('#edit-description').val(desc);
        $('#id').val(id);
    }

    function adjust_date(raw_date) {
        var date_array = raw_date.split('-');
        raw_date = date_array[1] + '/' + date_array[2] + '/' + date_array[0];
        return raw_date;
    }

    function adjust_article_time(raw_time) {
        var time_array = raw_time.split(':');
        var hour = time_array[0];
        var minute = time_array[1];
        $('#edit-hour').val(hour);
        $('#edit-minutes').val(minute);
    }

    function adjust_vacancy_start_time(raw_time) {
        var time_array = raw_time.split(':');
        var hour = time_array[0];
        var minute = time_array[1];
        $('#edit-s-hour').val(hour);
        $('#edit-s-minute').val(minute);
    }

    function adjust_vacancy_end_time(raw_time) {
        var time_array = raw_time.split(':');
        var hour = time_array[0];
        var minute = time_array[1];
        $('#edit-e-hour').val(hour);
        $('#edit-e-minute').val(minute);
    }

    $(".edit, .delete").on('mouseover', function () {
        $(this).css('cursor', 'pointer');
    });

    $(".delete").on('click', function (e) {
        var id = $(this).attr('id');
        var td = this.parentNode;
        var tr = td.parentNode;
        var path = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
        path = path.split('.')['0'];
        var data = {id: id, path: path};

        $('.loader').show();
        $.ajax({
            url: "php/tmp_del.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,
            success: function (data)   // A function to be called if request succeeds
            {
                $('.loader').hide();
                if (data == true) {
                    tr.style.display = 'none';
                } else {
                    $('#network-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            },
            error: function () {
                $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').hide();
            },
            complete: function () {
                $('.loader').hide();
            }
        });
    });

    $("#publish").on('click', function () {

        var path = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
        path = path.split('.')['0'];
        var data = {path: path};

        $('.loader').show();
        $.ajax({
            url: "php/del.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,
            success: function (data)   // A function to be called if request succeeds
            {
                $('.loader').hide();
                if (data == true) {
                    location.reload();
                }
            },
            error: function () {
                $('#network-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').hide();
            },
            complete: function () {
                $('.loader').hide();
            }
        });

        $.ajax({
            url: "php/multi_del.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,
            success: function (data)   // A function to be called if request succeeds
            {
                $('.loader').hide();
                if (data == true) {
                    location.reload();
                }
            },
            error: function () {
                $('#network-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').hide();
            },
            complete: function () {
                $('.loader').hide();
            }
        });

    });

    function tmp_muliti_del(form, url){
        $("#"+form).on('submit', function (e) {
            e.preventDefault();

            $('.loader').show();
            $.ajax({
                url: url, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('.loader').hide();
                    if (data == true) {
                        deleteRows();
                    } else {
                        $('#network-error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                },
                error: function () {
                    $('#error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('.loader').hide();
                },
                complete: function () {
                    $('.loader').hide();
                }
            });
        });
    }

    function deleteRows(){
        var table = document.getElementById("table");
        var tr = table.getElementsByTagName("tr");
        var td;

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                var chkbox = td.getElementsByTagName('input')[0];
                if('checkbox' == chkbox.type && true == chkbox.checked) {
                    tr[i].style.display = "none";
                }
            }
        }
    }
});
