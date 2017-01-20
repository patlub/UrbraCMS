<style type="text/css">
    #sub-heading {
        margin-top: 2%;
        margin-bottom: 1%;
        font-size: 130%;
        border: 1px solid black;
        text-transform: uppercase;
        padding-top: 0.5%;
        padding-bottom: 0.5%;
    }
</style>
<div class="row">
    <div id="logo-box" class="row">
        <div class="col-md-4" align="center">
            <div id="value1" class="values">Innovativeness</div>
            <div id="value2" class="values">Protection</div>
        </div>
        <div class="col-md-4" align="center"><img src="img/logo_urbra.png"></div>
        <div class="col-md-4" align="center">
            <div id="value3" class="values">Transparency</div>
            <div id="value4" class="values">Integrity</div>
        </div>
    </div>
    <div id="sub-heading" class="col-md-12 col-sm-12" align="center">URBRA Admin Panel</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // run the fade() function every 2 seconds
        setInterval(function(){
            fade();
        },100);


        // toggle between fadeIn and fadeOut with 0.3s fade duration.
        function fade(){
            $('#value1').fadeToggle(4000);
            $('#value2').fadeToggle(3200);
            $('#value3').fadeToggle(2400);
            $('#value4').fadeToggle(1600);
        }
    });
</script>