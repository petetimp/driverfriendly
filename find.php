<?php
    include_once 'includes/login_check.php';
    include_once 'includes/friendly_check.php';
    if (isset($_GET['city'])){
        $city=$_GET['city'];    
    }
    
    $show_listing=false;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Find</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php
        include_once 'includes/favicons.php';
    ?>
    <link type="text/css" rel="stylesheet" href="http://cdn-na.infragistics.com/jquery/20141/latest/css/themes/infragistics/infragistics.theme.css">
    <link type="text/css" rel="stylesheet" href="http://cdn-na.infragistics.com/jquery/20141/latest/css/structure/infragistics.css">
    <link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
    <?php                                    
        if(isset($_GET['city']) && $city=='-----Town/City-----'){
    ?>
    <script>
            alert("Please Choose a City.")
    </script>
    <?php
        }else if (isset($_GET['city'])) {
    ?>
    <style>
        #containerbox3{
            top: 13px;
        }
    </style>
    <?php
        }else{
                
        }
        
        if (isset($_GET['listing_id'])){
            $show_listing=true;
                                         
    ?>
    <style>
            form#find_listings{
                display:none;
            }
        
            #containerbox3 {
                top: 17px;
            }
    </style>
    <?php
        }
               
       
    ?>
</head>

<body>
    <div>
        <?php
            require_once 'includes/loggedin.php';
        ?>
        <div class="df_page_title">
            <span>Find</span>
        </div>
        <div class="icon2" id="icon2">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" preserveaspectratio="none" viewbox="0 0 26 26">
                <path stroke-width="0" d="M 7 14 L 7 15 L 19 15 L 19 14 L 7 14 ZM 6 13 L 13 13 L 20 13 L 20 16.0342 C 18.375 18.5342 15.998 19.8555 13 19.8555 C 10.002 19.8555 7.6338 18.248 6.0308 15.9688 C 6.0308 14.3887 6 13 6 13 ZM 17 7 C 18.1035 7 19 7.895 19 9 C 19 10.104 18.1035 11 17 11 C 15.8965 11 15 10.104 15 9 C 15 7.895 15.8965 7 17 7 ZM 9 7 C 10.104 7 11 7.895 11 9 C 11 10.104 10.104 11 9 11 C 7.897 11 7 10.104 7 9 C 7 7.895 7.897 7 9 7 ZM 13 2.187 C 7.0381 2.187 2.188 7.0381 2.188 13 C 2.188 18.9619 7.0381 23.8125 13 23.8125 C 18.9619 23.8125 23.8125 18.9619 23.8125 13 C 23.8125 7.0381 18.9619 2.187 13 2.187 ZM 13 0.187 C 20.0762 0.188 25.8125 5.9238 25.8125 13 C 25.8125 20.0762 20.0762 25.8125 13 25.8125 C 5.9238 25.8125 0.188 20.0762 0.188 13 C 0.188 5.9238 5.9238 0.188 13 0.187 Z"></path>
            </svg>
        </div>
        <form id="find_listings" class="find_page" method="get" action="http://104.236.221.43/DriverFriendly/find.php">
            <select id="combobox1" class="combobox1" name="city">
                <option>-----Town/City-----</option>
                <option>New Brunswick</option>
                <option>Piscataway</option>
            </select>
            <input type="submit" id="button3" value="Search" class="button3">
        </form>
        <?php
        if(isset($_GET['city']) && $city!=='-----Town/City-----'){
            if ($stmt = $mysqli2->prepare("SELECT listing_id, title, approved FROM roadwork_areas WHERE city=?")) {
                
                // Bind a variable to the parameter as a string. 
                $stmt->bind_param("s", $city);
 
                // Execute the statement.
                $stmt->execute();
 
                $stmt->store_result();
                
                // Get the variables from the query.
                $stmt->bind_result($listing_id, $title, $approved);
        ?>
                <div class="find_links">
                    <span class="df_page_title">Event Listings for <?php echo $city ?></span><span>(Please Click Below)</span><br/>
                    
        <?php
                while ($stmt->fetch()) {
                    if ($approved==1){
                        echo "<a class='listing_link' href='http://104.236.221.43/DriverFriendly/find.php?listing_id=". $listing_id ."'>".$title."</a><br/><br/>";
                    }
                }
                
        ?>
                </div>
        <?php
                $stmt->free_result();
                
                // Close the prepared statement.
                $stmt->close();
        
            }
        }
        
        if ($show_listing && $stmt = $mysqli2->prepare("SELECT title, city, highway, address, start_date, end_date, event_type, event_description, website, created, last_updated, created_by FROM roadwork_areas WHERE listing_id=?")) {
              
                // Bind a variable to the parameter as a string. 
                $stmt->bind_param("s", $_GET['listing_id']);
 
                // Execute the statement.
                $stmt->execute();
 
                $stmt->store_result();
                
                // Get the variables from the query.
                $stmt->bind_result($title, $city, $highway, $address, $startDate, $endDate, $event_name, $event_description, $website, $created, $last_updated, $created_by);    
                
                while ($stmt->fetch()) {
        ?>      
        <input type="button" id="button8" value="Go Back" class="button3" onclick="location.href='http://104.236.221.43/DriverFriendly/find.php?city=<?php echo $city ?>'">
                    <span class="df_page_title find_page"><?php echo $title ?></span><br/>
                    <div id="listing_container">
                        <table id="listing_details">
                            <tbody>
                                <tr>
                                  <td>City</td>
                                  <td id="table_city"><?php echo $city ?></td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Highway</td>
                                  <td><?php echo $highway ?></td> 
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Address</td>
                                  <td><?php echo $address ?></td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Start Date</td>
                                  <td><?php echo $startDate ?></td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>End Date</td>
                                  <td><?php echo $endDate ?></td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Event Type</td>
                                  <td>
                                      <?php
                                        switch ($event_name) {
                                            case 1:
                                                $event_name="Road Closure";
                                                break;
                                            case 2:
                                                $event_name="Lane Closure";
                                                break;
                                            case 3:
												$event_name="Accident";
												break;
											case 4:
												$event_name="Flood";
												break;
											case 5:
												$event_name="Power Outage";
												break;
											case 6:
												$event_name="Weather-Related";
												break;
											case 7:
												$event_name="Other";
												break;	    
										}
										    echo $event_name;
                                      ?>
                                  </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Event Description</td>
                                  <td><?php echo $event_description ?></td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Website</td>
                                  <td>
                                      <?php
                                        if(is_null($website)){
                                            $website="N/A";
                                        }
                                        echo $website;
                                      ?>
                                  </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Created</td>
                                  <td>
                                      <?php
                                          $created_date=date_create($created);
                                          echo date_format($created_date, 'm/d/y g:i A');
                                      ?>
                                  </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Last Updated</td>
                                  <td>
                                      <?php
                                          $updated_date=date_create($last_updated);
                                          echo date_format($updated_date, 'm/d/y g:i A');
                                      ?>
                                  </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Created By</td>
                                  <td><?php echo $created_by ?></td>
                                  <td>&nbsp;</td>
                                </tr>

                            </tbody>
                        </table>
                        <div><iframe src="http://104.236.221.43/DriverFriendly/nb_map.php"></iframe></div>
                    </div>
        <?php
                }
                $stmt->free_result();
                
                // Close the prepared statement.
                $stmt->close();
            }
        
        ?>
        <div class="containerbox2" id="containerbox3">
            <span>&copy; 2015 NJDOT | <a href="http://104.236.221.43/DriverFriendly/about.php">About Us</a> | <a href="http://104.236.221.43/DriverFriendly/contact.php">Contact Us</a> | <a href="http://104.236.221.43/DriverFriendly/faq.php">FAQ</a> | <a href="http://104.236.221.43/phpmyadmin"> Admin</a></span>
        </div>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.core.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.lob.js"></script>
        <script type="text/javascript" src="http://cdn-na.infragistics.com/jquery/20141/latest/js/infragistics.dv.js"></script>
    </div>
</body>

</html>