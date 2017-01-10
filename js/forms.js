$(document).ready(function (e) {

    async_get_slide_1();
    async_get_slide_2();
    async_get_slide_3();
    async_get_sec_1();
    async_get_sec_2();
    async_get_sec_3();

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
                    async_get_slide_2();
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
                    async_get_slide_3();
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

    function async_get_slide_1(){
        $.ajax({
            type: "POST",
            url: "php/get_slide1.php",
            success: function (data) {

                data = data.split(" ");
                //alert(data);
                var img_url = 'img/slideshowimgs/'+data[0];
                var caption = data[1];

                $("#slide_caption1").text(caption);
                $("#caption1").val(caption);

                var $image = $("#slide_image1");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_slide_2(){
        $.ajax({
            type: "POST",
            url: "php/get_slide2.php",
            success: function (data) {

                data = data.split(" ");
                var img_url = 'img/slideshowimgs/'+data[0];
                var caption = data[1];

                $("#slide_caption2").text(caption);
                $("#caption2").val(caption);

                var $image = $("#slide_image2");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_slide_3(){
        $.ajax({
            type: "POST",
            url: "php/get_slide3.php",
            success: function (data) {

                data = data.split(" ");
                //alert(data);
                var img_url = 'img/slideshowimgs/'+data[0];
                var caption = data[1];

                $("#slide_caption3").text(caption);
                $("#caption3").val(caption);

                var $image = $("#slide_image3");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_sec_1(){
        $.ajax({
            type: "POST",
            url: "php/get_sec1.php",
            success: function (data) {

                data = data.split(" ");
                //alert(data);
                var img_url = 'img/home_services/'+data[0];
                var heading = data[1];
                var text = data[2];

                $("#sec_head1").text(heading);
                $("#sec_text1").text(text);
                $("#sec_btn1").val(heading);

                var $image = $("#sec_image1");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_sec_2(){
        $.ajax({
            type: "POST",
            url: "php/get_sec2.php",
            success: function (data) {

                data = data.split(" ");
                //alert(data);
                var img_url = 'img/home_services/'+data[0];
                var heading = data[1];
                var text = data[2];

                $("#sec_head2").text(heading);
                $("#sec_text2").text(text);
                $("#sec_btn2").val(heading);

                var $image = $("#sec_image2");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }

    function async_get_sec_3(){
        $.ajax({
            type: "POST",
            url: "php/get_sec3.php",
            success: function (data) {

                data = data.split(" ");
                //alert(data);
                var img_url = 'img/home_services/'+data[0];
                var heading = data[1];
                var text = data[2];

                $("#sec_head3").text(heading);
                $("#sec_text3").text(text);
                $("#sec_btn3").val(heading);

                var $image = $("#sec_image3");
                var $downloadingImage = $("<img>");
                $downloadingImage.load(function(){
                    $image.attr("src", $(this).attr("src"));
                });
                $downloadingImage.attr("src", img_url);
            }
        });
    }
});
