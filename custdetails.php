<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include ("header.php");
session_start();
if(isset($_SESSION['username']))
{
?>
<!DOCTYPE html>
<html>
<head>

    <title>CUSTOMER DEATILS</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Dazzling Multi Forms Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="css/custstyle.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property=""/>
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body>
<div class="main">

    <div class="w3_agile_main_grids">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="agileits_w3layouts_main_grid">
                            <h3>Customer Enquiry Form</h3>
                            <form action="custdb.php" method="post">
									<span>
										<label>name</label>
										<input name="Name" type="text" placeholder="Customer Name" required>
									</span>
                                <span>
										<label>Address</label>
										<input name="Address" type="text" placeholder="Your Address" required>
									</span>
                                <span>
										<label>Mobile</label>
										<input name="Mobile" type="text" placeholder="Customer Mobile Number" required>
									</span>

                                <span>
										<label>Customer id</label>
										<input name="Id" type="text" placeholder="Customer id" required>
									</span>
                                <span>
										<label>Table id</label>
										<input name="tabid" type="text" placeholder="Table id" required>
									</span>
                                <span>
										<label>Worker id</label>
										<input name="workerid" type="text" placeholder="Worker id" required>
									</span>
                                <div class="w3_agileits_submit">
                                    <input type="submit" value="submit">
                                    <input type="reset" value="reset">
                                </div>
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </section>
    </div>

</div>
<!-- password -->
<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- password -->
<!-- flexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //flexSlider -->

</body>
</html>
    <?php
}
else
{
    ?>
    <script>
        document.location="index.php";
    </script>
    <?php
}
?>