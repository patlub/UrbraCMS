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
    add('add-admin-form', 'php/add_administrator.php');
    add('add-custodian-form', 'php/add_custodian.php');
    add('add-fund-manager-form', 'php/add_fund_manager.php');
    add('add-scheme-form', 'php/add_scheme.php');
    add('add-tender-form', 'php/add_tender.php');
    add('add-trustee-form', 'php/add_trustee.php');
    add('add-vacancy-form', 'php/add_vacancy.php');
    add('add-department-form', 'php/add_department.php');
    add('add-BoD-form', 'php/add_bod.php');
    del('slide-form', 'php/delete_slides.php');
    del('articles-form', 'php/delete_articles.php');
    del('admins-form', 'php/delete_admins.php');
    del('custodians-form', 'php/delete_custodians.php');
    del('fund_managers-form', 'php/delete_fund_managers.php');
    del('schemes-form', 'php/delete_schemes.php');
    del('tenders-form', 'php/delete_tenders.php');
    del('trustees-form', 'php/delete_trustees.php');
    del('vacancies-form', 'php/delete_vacancies.php');
    del('departments-form', 'php/delete_departments.php');
    del('BoD-form', 'php/delete_bods.php');
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
                        $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                    } else {
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                }
            });

        }));
    }

    function del(form, url) {
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
                        $('#deleted-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                        location.reload();
                    } else {
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    }
                }
            });

        }));
    }


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
            }
        });
    }

    $("td .edit").on('click', function(){
        //e.preventDefault();
        //e.stopImmediatePropagation();
        //$('.loader').show();
        var text = $(this).attr('id');
        alert(text);
        return false;

    });

    $(".edit").on('mouseover', function(){
        $(this).css('cursor', 'pointer');
    });

    //$('#addCustodianModal').modal('show');

});
