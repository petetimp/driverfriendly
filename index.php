<?php
    include_once 'includes/login_check.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php
        include_once 'includes/favicons.php';
    ?>
    <link type="text/css" rel="stylesheet" href="http://cdn-na.infragistics.com/jquery/20141/latest/css/themes/infragistics/infragistics.theme.css">
    <link type="text/css" rel="stylesheet" href="http://cdn-na.infragistics.com/jquery/20141/latest/css/structure/infragistics.css">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body id="df_home">         
    <div>
        <?php
            if (login_check($mysqli) == true){
                echo "<div class='containerbox1' id='containerbox11'>
                        <span>Welcome " . $_SESSION['username'] . "&nbsp;&nbsp;&nbsp; <a href='http://104.236.221.43/DriverFriendly/account.php'>My Account</a></span>
                     </div>";
        
            }else{
                echo "<div class='containerbox1' id='containerbox11'>
                        <span>Welcome Guest! &nbsp;&nbsp;&nbsp; <a href='http://104.236.221.43/DriverFriendly/register.php'>Create an Account</a></span>
                     </div>";
            }
        ?>
        <h1 class="title1" id="title1">DriverFriend.ly</h1>
        <div class="label1" id="label1">
            <span>Your NJ Road Information Companion</span>
        </div>
        <div class="icon1" id="icon1">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" preserveaspectratio="none" viewbox="0 0 26 26">
                <path stroke-width="0" d="M 7 14 L 7 15 L 19 15 L 19 14 L 7 14 ZM 6 13 L 13 13 L 20 13 L 20 16.0342 C 18.375 18.5342 15.998 19.8555 13 19.8555 C 10.002 19.8555 7.6338 18.248 6.0308 15.9688 C 6.0308 14.3887 6 13 6 13 ZM 17 7 C 18.1035 7 19 7.895 19 9 C 19 10.104 18.1035 11 17 11 C 15.8965 11 15 10.104 15 9 C 15 7.895 15.8965 7 17 7 ZM 9 7 C 10.104 7 11 7.895 11 9 C 11 10.104 10.104 11 9 11 C 7.897 11 7 10.104 7 9 C 7 7.895 7.897 7 9 7 ZM 13 2.187 C 7.0381 2.187 2.188 7.0381 2.188 13 C 2.188 18.9619 7.0381 23.8125 13 23.8125 C 18.9619 23.8125 23.8125 18.9619 23.8125 13 C 23.8125 7.0381 18.9619 2.187 13 2.187 ZM 13 0.187 C 20.0762 0.188 25.8125 5.9238 25.8125 13 C 25.8125 20.0762 20.0762 25.8125 13 25.8125 C 5.9238 25.8125 0.188 20.0762 0.188 13 C 0.188 5.9238 5.9238 0.188 13 0.187 Z"></path>
            </svg>
        </div>
        
        <div class="df_button_labels">
            <span class="label2" id="label2">Find Road Info for Your Town or City</span>
            <span class="label2" id="label3">Add New Road Info for Your Town or City</span>
        </div>
        <div class="df_button_div">
            <input style="visibility:hidden;" type="button" id="button1" value="Find" class="button1">
            <input style="visibility:hidden;" type="button" id="button2" value="Add" class="button2">
        </div>
        <input style="visibility:hidden;" type="button" id="button7" value="" onclick="location.href='http://104.236.221.43/DriverFriendly/login.php'" class="button1"/><br/>
        
        <?php
            if (login_check($mysqli) == true){
                echo "<script type='text/javascript'>
                         $('#button7').attr('onclick','location.href=\"http://104.236.221.43/DriverFriendly/includes/logout.php\"');
                         document.getElementById('button7').value='Logout';                          
                     </script>";
            }else{
                echo "<script>document.getElementById('button7').value='Login';</script>";
            }
        ?>
        <img src="images/roadclosed.jpg" alt="Construction Listing App" id="image1">
        <div class="containerbox2" id="containerbox2">
            <span>&copy; 2015 NJDOT | <a href="http://104.236.221.43/DriverFriendly/about.php">About Us</a> | <a href="http://104.236.221.43/DriverFriendly/contact.php">Contact Us</a> | <a href="http://104.236.221.43/DriverFriendly/faq.php">FAQ</a> | <a href="http://104.236.221.43/phpmyadmin"> Admin</a></span>
        </div>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.core.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.lob.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.dv.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#button1').button().click(
                    function(){
                        location.href="http://104.236.221.43/DriverFriendly/find.php";
                    }
                );
                $('#button2').button().click(
                    function(){
                        location.href="http://104.236.221.43/DriverFriendly/add.php";
                    }
                );
            });
            
            $(document).ready(
                function(){
                    $('#button1, #button2, #button7').css("visibility","visible");
                }
            );
        
        </script>
    </div>
</body>

</html>