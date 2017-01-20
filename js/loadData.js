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
    del_slides();

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

    function del_slides() {
        $("#slide-form").on('submit', (function (e) {
            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: "php/delete_slides.php", // Url to which the request is send
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

    $("#update_serv_sec1").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/update_serv_sec1.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                //alert(data);
                $('.loader').hide();
                if (data == true) {
                    $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                    async_get_sec_1();
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });
    }));

    $("#update_serv_sec2").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/update_serv_sec2.php", // Url to which the request is send
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
                    async_get_sec_2();
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });
    }));

    $("#update_serv_sec3").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/update_serv_sec3.php", // Url to which the request is send
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
                    async_get_sec_3();
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });
    }));

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

    $("#add-custodian-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_custodian.php", // Url to which the request is send
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

    $("#add-admin-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_administrator.php", // Url to which the request is send
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

    $("#add-fund-manager-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_fund_manager.php", // Url to which the request is send
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

    $("#add-trustee-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_trustee.php", // Url to which the request is send
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

    $("#add-scheme-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_scheme.php", // Url to which the request is send
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

    $("#add-tender-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_tender.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                alert(data);
                $('.loader').hide();
                if (data == true) {
                    $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });

    }));

    $("#add-vacancy-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_vacancy.php", // Url to which the request is send
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

    $("#add-article-form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/add_article.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('.loader').hide();
                alert(data);
                if (data == true) {
                    $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });

    }));



});
