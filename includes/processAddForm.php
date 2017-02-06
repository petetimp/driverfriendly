<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
 
    sec_session_start();
    include_once 'friendly_check.php';
    $approved=0;
    
    if ($stmt = $mysqli->prepare("SELECT listings_added_today FROM members WHERE username=?")) {
                
        // Bind a variable to the parameter as a string. 
        $stmt->bind_param("s", $_POST['created_by']);
 
        // Execute the statement.
        $stmt->execute();
 
        $stmt->store_result();
                
        // Get the variables from the query.
        $stmt->bind_result($listings_added_today);
        while ($stmt->fetch()){
            $added_today=$listings_added_today;
        }
        
        if($added_today=="five"){
            echo "Error: You have already added/updated 5 listings today.  Please try again tomorrow.";
            $stmt->free_result();
            // Close the prepared statement.
            $stmt->close();
            $mysqli->close();
        }else{
            $stmt->free_result();
                
            // Close the prepared statement.
            $stmt->close();
            
            switch ($added_today) {
                case "one":
                    $added_today="two";
                    break;
                case "two":
                    $added_today="three";
                    break;
                case "three":
                    $added_today="four";
                    break;
                case "four":
                    $added_today="five";
                    break;
                default:
                    $added_today="one";
            }
            
            $stmt2 = $mysqli->prepare("UPDATE members SET listings_added_today=? WHERE username=?");
            
            $stmt2->bind_param("ss", $added_today, $_POST['created_by']);
          
            $stmt2->execute();
            
            
            $stmt2->close();
            $mysqli->close();
            
            if ($_POST['selected_option']==1){
                $city="New Brunswick";
            }else{
                $city="Piscataway";
            }
			
            if($_POST['section']=='update'){
				
			     $stmt3 = $mysqli2->prepare("UPDATE roadwork_areas SET city=?, highway=?, address=?, start_date=?, end_date=?, event_description=?, event_type=?,"
                    . "last_updated=?, website=?, title=?, approved=? WHERE listing_id=?"); 
				 $stmt3->bind_param("ssssssisssii", $city, $_POST['highway'], $_POST['address'], $_POST['startDate'], $_POST['endDate'],
                                      $_POST['description'], $_POST['selected_event'], date('Y-m-d H:i:s'),
                                      $_POST['website'], $_POST['title'], $approved, $_POST['listing_id']);   
			}else{
                $stmt3 = $mysqli2->prepare("INSERT INTO roadwork_areas (city, highway, address, start_date, end_date, event_description, event_type,"
                    . " created, last_updated, website, title, created_by, approved) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		    
            $stmt3->bind_param("ssssssisssssi", $city, $_POST['highway'], $_POST['address'], $_POST['startDate'], $_POST['endDate'],
                                      $_POST['description'], $_POST['selected_event'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),
                                      $_POST['website'], $_POST['title'], $_POST['created_by'], $approved);
            }
            $stmt3->execute();
    
            $stmt3->close();
            $mysqli2->close();
        }
        
    }else{
        echo "failed";
    }