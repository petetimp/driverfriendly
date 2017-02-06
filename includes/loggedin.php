<?php
            if (login_check($mysqli) == true){
                echo "<div class='containerbox1' id='containerbox1'>
                        <span><a href='http://104.236.221.43/DriverFriendly/'>DriverFriend.ly</a>     <a href='http://104.236.221.43/DriverFriendly/find.php'>Find</a>     <a href='http://104.236.221.43/DriverFriendly/add.php'>Add</a>     <a href='http://104.236.221.43/DriverFriendly/includes/logout.php'> Logout</a></span>
                     </div>";
                echo "<div class='containerbox1' id='containerbox11'>
                        <span>Welcome " . $_SESSION['username'] . "&nbsp;&nbsp;&nbsp; <a href='http://104.236.221.43/DriverFriendly/account.php'>My Account</a></span>
                     </div>";
            }else{
                echo "<div class='containerbox1' id='containerbox1'>
                        <span><a href='http://104.236.221.43/DriverFriendly/'>DriverFriend.ly</a>     <a href='http://104.236.221.43/DriverFriendly/find.php'>Find</a>     <a href='http://104.236.221.43/DriverFriendly/add.php'>Add</a>     <a href='http://104.236.221.43/DriverFriendly/login.php'> Login</a></span>
                     </div>";
                echo "<div class='containerbox1' id='containerbox11'>
                        <span>Welcome Guest! &nbsp;&nbsp;&nbsp; <a href='http://104.236.221.43/DriverFriendly/register.php'>Create an Account</a></span>
                     </div>";
            }
?>