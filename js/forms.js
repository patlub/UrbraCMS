$(document).ready(function (e) {

    async_get_slide_1();
    $("#update_slide1_form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/update_slide1.php", // Url to which the request is send
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
                    async_get_slide_1();
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });

    }));

    function async_get_slide_1(){
        $.ajax({
            type: "POST",
            url: "php/get_slide1.php",
            success: function (data) {
                //$('.networkError').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                $('.loader').fadeOut(200); //fade out after 3 seconds

                var img_url = 'img/slideshowimgs/'+data;
                var $image = $("#sec_image1");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);

                //document.getElementById("add-disciple-form").reset();
            }
        });
    }

    $("#update_slide2_form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/update_slide2.php", // Url to which the request is send
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

    $("#update_slide3_form").on('submit', (function (e) {
        e.preventDefault();
        $('.loader').show();
        $.ajax({
            url: "php/update_slide3.php", // Url to which the request is send
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
                $('.loader').hide();
                if (data == true) {
                    $('.success-alert').fadeIn(400).delay(3000).fadeOut(300); //fade out after 3 seconds
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
                } else {
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                }
            }
        });
    }));

});
