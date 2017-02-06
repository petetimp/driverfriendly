<?php
    include_once 'includes/login_check.php';
    include_once 'includes/friendly_check.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php
        include_once 'includes/favicons.php';
    ?>
    <link type="text/css" rel="stylesheet" href="http://cdn-na.infragistics.com/jquery/20141/latest/css/themes/infragistics/infragistics.theme.css">
    <link type="text/css" rel="stylesheet" href="http://cdn-na.infragistics.com/jquery/20141/latest/css/structure/infragistics.css">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
</head>

<body>
    <div>
        <?php
            if (login_check($mysqli) == true){
                echo "<div class='containerbox1' id='containerbox1'>
                        <span><a href='http://104.236.221.43/DriverFriendly/'>DriverFriend.ly</a>     <a href='http://104.236.221.43/DriverFriendly/find.php'>Find</a>     <a href='http://104.236.221.43/DriverFriendly/add.php'>Add</a>     <a href='http://104.236.221.43/DriverFriendly/includes/logout.php'> Logout</a></span>
                     </div>";
                echo "<div class='containerbox1' id='containerbox11'>
                        <span>Welcome " . $_SESSION['username'] . "&nbsp;&nbsp;&nbsp; <a href='http://104.236.221.43/DriverFriendly/account.php'>My Account</a></span>
                     </div>";
        ?>
            <div id="add_submitted">
                <h1>Nice!</h1>
                <div class="icon2">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" preserveaspectratio="none" viewbox="0 0 26 26">
                        <path stroke-width="0" d="M 7 14 L 7 15 L 19 15 L 19 14 L 7 14 ZM 6 13 L 13 13 L 20 13 L 20 16.0342 C 18.375 18.5342 15.998 19.8555 13 19.8555 C 10.002 19.8555 7.6338 18.248 6.0308 15.9688 C 6.0308 14.3887 6 13 6 13 ZM 17 7 C 18.1035 7 19 7.895 19 9 C 19 10.104 18.1035 11 17 11 C 15.8965 11 15 10.104 15 9 C 15 7.895 15.8965 7 17 7 ZM 9 7 C 10.104 7 11 7.895 11 9 C 11 10.104 10.104 11 9 11 C 7.897 11 7 10.104 7 9 C 7 7.895 7.897 7 9 7 ZM 13 2.187 C 7.0381 2.187 2.188 7.0381 2.188 13 C 2.188 18.9619 7.0381 23.8125 13 23.8125 C 18.9619 23.8125 23.8125 18.9619 23.8125 13 C 23.8125 7.0381 18.9619 2.187 13 2.187 ZM 13 0.187 C 20.0762 0.188 25.8125 5.9238 25.8125 13 C 25.8125 20.0762 20.0762 25.8125 13 25.8125 C 5.9238 25.8125 0.188 20.0762 0.188 13 C 0.188 5.9238 5.9238 0.188 13 0.187 Z"></path>
                    </svg>
                </div> 
                <p>You have now submitted your listing.  Please wait 4-6 hours for your listing to be approved.
                   If your listing is approved, you will be rewarded 1 reward point.  10 reward points get
                   you a <strong>$10 Amazon gift card!</strong> Please see our <a class='log_link' href="http://104.236.221.43/DriverFriendly/faq.php"><strong>FAQ</strong></a>
                   section for more details.
                </p>
                <img id="amazon_gift_card" src="http://3.bp.blogspot.com/-sQ0DxlY_Q10/VMye0Cv293I/AAAAAAAAHCM/eC9ZG5OBkpI/s1600/amazonGiftCard10.png"/>
                <input type="button" id="button5" value="Home" onclick="location.href='http://104.236.221.43/DriverFriendly/'" class="button1"/>
            </div>
            <div class="icon2" id="icon3">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" preserveaspectratio="none" viewbox="0 0 26 26">
                        <path stroke-width="0" d="M 7 14 L 7 15 L 19 15 L 19 14 L 7 14 ZM 6 13 L 13 13 L 20 13 L 20 16.0342 C 18.375 18.5342 15.998 19.8555 13 19.8555 C 10.002 19.8555 7.6338 18.248 6.0308 15.9688 C 6.0308 14.3887 6 13 6 13 ZM 17 7 C 18.1035 7 19 7.895 19 9 C 19 10.104 18.1035 11 17 11 C 15.8965 11 15 10.104 15 9 C 15 7.895 15.8965 7 17 7 ZM 9 7 C 10.104 7 11 7.895 11 9 C 11 10.104 10.104 11 9 11 C 7.897 11 7 10.104 7 9 C 7 7.895 7.897 7 9 7 ZM 13 2.187 C 7.0381 2.187 2.188 7.0381 2.188 13 C 2.188 18.9619 7.0381 23.8125 13 23.8125 C 18.9619 23.8125 23.8125 18.9619 23.8125 13 C 23.8125 7.0381 18.9619 2.187 13 2.187 ZM 13 0.187 C 20.0762 0.188 25.8125 5.9238 25.8125 13 C 25.8125 20.0762 20.0762 25.8125 13 25.8125 C 5.9238 25.8125 0.188 20.0762 0.188 13 C 0.188 5.9238 5.9238 0.188 13 0.187 Z"></path>
                    </svg>
            </div> 
            <div id="loadingtext">

            </div>

            <div id="add_listing">

                <div class="df_page_title">
                    <span>Add</span>
                </div>
                <div class="icon2">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" preserveaspectratio="none" viewbox="0 0 26 26">
                        <path stroke-width="0" d="M 7 14 L 7 15 L 19 15 L 19 14 L 7 14 ZM 6 13 L 13 13 L 20 13 L 20 16.0342 C 18.375 18.5342 15.998 19.8555 13 19.8555 C 10.002 19.8555 7.6338 18.248 6.0308 15.9688 C 6.0308 14.3887 6 13 6 13 ZM 17 7 C 18.1035 7 19 7.895 19 9 C 19 10.104 18.1035 11 17 11 C 15.8965 11 15 10.104 15 9 C 15 7.895 15.8965 7 17 7 ZM 9 7 C 10.104 7 11 7.895 11 9 C 11 10.104 10.104 11 9 11 C 7.897 11 7 10.104 7 9 C 7 7.895 7.897 7 9 7 ZM 13 2.187 C 7.0381 2.187 2.188 7.0381 2.188 13 C 2.188 18.9619 7.0381 23.8125 13 23.8125 C 18.9619 23.8125 23.8125 18.9619 23.8125 13 C 23.8125 7.0381 18.9619 2.187 13 2.187 ZM 13 0.187 C 20.0762 0.188 25.8125 5.9238 25.8125 13 C 25.8125 20.0762 20.0762 25.8125 13 25.8125 C 5.9238 25.8125 0.188 20.0762 0.188 13 C 0.188 5.9238 5.9238 0.188 13 0.187 Z"></path>
                    </svg>
                </div> 
                <div>
                    <span class="label4" id="label4">Fill out the Information Below</span>
                </div>
                <form id="add_form" onSubmit="return false">
                    <table id="add_page_table">
                        <tbody>
                            <tr>
                                <td>Title of Listing*</td>
                                <td><input type="text" id="textbox12" placeholder="Title" class="textbox1"></td>
                            </tr>
                            <tr>
                                <td>Pick a Town or City*</td>
                                <td>
                                    <select id="add_select">
                                        <option id="add_select_city">Town/City</option>
                                        <option id="add_select_nb">New Brunswick</option>
                                        <option id="add_select_piscataway">Piscataway</option>
                                    </select>
                                </td>                            
                            </tr>
                            <tr>
                                <td>Start Date*</td>
                                <td><input type="text" id="textbox2" placeholder="Start Date" class="textbox1"></td>  
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td><input type="text" id="textbox2a" placeholder="End Date" class="textbox1"></td>  
                            </tr>
                            <tr>
                                <td>Address of Event</td>
                                <td><input type="text" id="textbox3" placeholder="Address" class="textbox1"></td>
                            </tr>
                            <tr>
                                <td>Road Affected*</td>
                                <td><input type="text" id="textbox4" placeholder="Highway/Street*" class="textbox1"></td>
                            </tr>
                        </tbody>
                    </table>
                    <label class="add_page_label">Provide a Website for More Information
                        <input type="text" id="textbox5" placeholder="Website for More Information" class="textbox1">
                    </label><input type="hidden" id="886221" value="<?php echo $_SESSION['username']?>"/>
                    <div class="df_a_heading"><span>Event Type*</span></div>
                    <div id="df_a_checkboxContainer">
                    	<select id="event_select">
                            <option id="event_select_zero">--Event Type--</option>
                            <option id="event_select_road">Road Closure</option>
                            <option id="event_select_lane">Lane Closure</option>
                            <option id="event_select_accident">Accident</option>
                            <option id="event_select_flood">Flood</option>
                            <option id="event_select_outage">Power Outage</option>
                            <option id="event_select_weather">Weather-Related</option>
                            <option id="event_select_other">Other</option>
                        </select>
                        <!--<label id="checkbox1" class="checkbox1">
                            <input id="checkbox1a" type="checkbox">Road Closure
                        </label>
                        <label id="checkbox3" class="checkbox1">
                            <input id="checkbox3a" type="checkbox">Lane Closure
                        </label>
                        <label id="checkbox2" class="checkbox1">
                            <input id="checkbox2a" type="checkbox">Other
                        </label>-->
                    </div>
                    <div id="desc_e">Describe The Event Here*</div><br/>
                        <textarea class="textbox1" id="textarea1" placeholder="Briefly describe the event here*"></textarea>

                    <span class="label5" id="label5">*Required</span>
                    <input type="submit" id="button4" value="Add" class="button1"/>
                </form>
            </div>
            <div class="containerbox2" id="containerbox4">
                <span>&copy; 2015 NJDOT | <a href="http://104.236.221.43/DriverFriendly/about.php">About Us</a> | <a href="http://104.236.221.43/DriverFriendly/contact.php">Contact Us</a> | <a href="http://104.236.221.43/DriverFriendly/faq.php">FAQ</a> | <a href="http://104.236.221.43/phpmyadmin"> Admin</a></span>
            </div>
        </div>
        <?php
            }else{
                echo "<div class='containerbox1' id='containerbox1'>
                        <span><a href='http://104.236.221.43/DriverFriendly/'>DriverFriend.ly</a>     <a href='http://104.236.221.43/DriverFriendly/find.php'>Find</a>     <a href='http://104.236.221.43/DriverFriendly/add.php'>Add</a>     <a href='http://104.236.221.43/DriverFriendly/login.php'> Login</a></span>
                     </div>";
                echo "<div class='containerbox1' id='containerbox11'>
                        <span>Welcome Guest! &nbsp;&nbsp;&nbsp; <a href='http://104.236.221.43/DriverFriendly/register.php'>Create an Account</a></span>
                     </div>";
            ?>
            <div class="df_page_title">
                <span>No Access</span>
            </div>
            <div class='add_nologin'>
                <span class="label4" id="label4">Please <a class="log_link" href='http://104.236.221.43/DriverFriendly/login.php'>Login</a> or <a class='log_link' href='http://104.236.221.43/DriverFriendly/register.php'>Create an Account</a></span>
            </div>
            <div class="containerbox2" id="containerbox14">
                <span>&copy; 2015 NJDOT | <a href="http://104.236.221.43/DriverFriendly/about.php">About Us</a> | <a href="http://104.236.221.43/DriverFriendly/contact.php">Contact Us</a> | <a href="http://104.236.221.43/DriverFriendly/faq.php">FAQ</a> | <a href="http://104.236.221.43/phpmyadmin"> Admin</a></span>
            </div>
        </div>
    
        <?php
            }
        ?>
        
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.core.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.lob.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.dv.js"></script>
        <script src="includes/formProcesses.js"></script>
        <script src="includes/lib.js"></script>
        <script type="text/javascript">
        
            function addingScreen(title, selected_option, startDate, endDate, address, highway, website, selected_event, description){
                $('#add_listing').css("display","none");
                $('#loadingtext').css("display","block");
                $('#containerbox4').css("top","-135px");
                $('#icon3').css("display","block");
                
                var username=document.getElementById('886221').value;
                
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("post","http://104.236.221.43/DriverFriendly/includes/processAddForm.php",true);
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        contactResults(xmlhttp); 
                    }else{
                       
                    }
                }
                   
                xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
                xmlhttp.send("title=" + title + "&selected_option=" + selected_option + "&startDate=" + startDate + "&endDate=" + endDate + "&address=" + address + "&highway=" + highway + "&website=" + website + "&selected_event=" + selected_event + "&description=" + description + "&created_by=" + username);
                 
            }
            function contactResults(xmlhttp) {
                var str = xmlhttp.responseText;
                var patt = /Error:/i;
                var res = patt.test(str);
	        if(res){
                    alert(xmlhttp.responseText);
                    location.href="http://104.236.221.43/DriverFriendly/";
                }else{
                    subtractingDots2();
                }
            }
    
            observeEvent(window,"load",function() {
                var addForm = document.getElementById("add_form");
                    observeEvent(addForm,"submit",function() {
                        validate(this);
                     });					
                });	
    
            var i=1;
            function subtractingDots2(){
                
                var loadingText= document.getElementById("loadingtext");
		loadingText.innerHTML = "Just a Moment......";
                $('#containerbox4').css("top","-167px");
                var subtractPeriod=setInterval(
                    function(){
			var length=loadingText.innerHTML.length;	
			loadingText.innerHTML = loadingText.innerHTML.substring(0,length-1);
			if (loadingText.innerHTML.indexOf(".") == -1){
			    clearInterval(subtractPeriod);
		  	    i++;
                            if(i<8){ 
                                subtractingDots2();
                            }else{
                                $('#loadingtext').css("display","none");
                                $('#icon3').css("display","none");
                                $('#add_submitted').css("display","block");
                                $('#containerbox4').css("top","-113px");
                            }
			}
		    }
                ,100);
            }
        </script>
    </div>
</body>

</html>