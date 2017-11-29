<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

require 'include.php';
require 'mail.php';
require 'mail_client.php';
require 'resize_library.php';
require 'AfricasTalkingGateway.php';
require_once __DIR__ . '/firebase.php';
require_once __DIR__ . '/push.php';


date_default_timezone_set("Africa/Nairobi");


/* ------------- `users` table method ------------------ */
 
    /**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $mobile User mobile number
     * @param String $otp user verificaiton code
     */
	function createUser($name, $email, $mobile, $otp) {
		global $con;
        $response = array();
 
        // First check if user already existed in db
        if (!isUserExists($mobile,$name)) {
 
 	    if (!isUserPending($mobile)) {
	 	    // Generating API key
	            $api_key = generateApiKey();
	 
	            // insert query
	            $insertUser = mysqli_query($con,"INSERT INTO users(user_name, email, mobile, apikey, status) values('$name', '$email', '$mobile', '$api_key', 0)");
	      
	            $new_user_id = mysqli_insert_id($con);;
	 
	            // Check for successful insertion
	            if ($insertUser) {
	                $otp_result = createOtp($new_user_id, $otp);
	 
	                // User successfully inserted
	                return USER_CREATED_SUCCESSFULLY;
	            } else {
	                // Failed to create user
	                return USER_CREATE_FAILED;
	            }
					
		}elseif (isUserPending($mobile)) {	
			
				$new_user_id = isUserID($mobile);
				
                $otp_result = createOtp($new_user_id, $otp);
 
	                // User successfully inserted
	                return USER_CREATED_SUCCESSFULLY;
	            } else {
	                // Failed to create user
	                return USER_CREATE_FAILED;
	            }
			
           
        } else {
            // User with same email already existed in the db
            $user = isUserID($mobile);
			$updateStatus = mysqli_query($con,"UPDATE users SET status=0 AND user_name = '$name' WHERE id = '$user' ");		
				
			if ($updateStatus ) {			
				$otp_result = createOtp($user , $otp); 
				// User successfully inserted
				return USER_CREATED_SUCCESSFULLY;
			}else {
				// Failed to create user
				return USER_CREATE_FAILED;
			}
        }
 
        return $response;
    }
	
	// updating user FCM registration ID
    function updateFcmID($user_id, $firebase_id) {
		global $con;
		
        $response = array();
        $updateFCM = mysqli_query($con,"UPDATE users SET firebase_id = '$firebase_id' WHERE id = '$user_id' ");
 
        if ($updateFCM) {
            // User successfully updated
            $response["error"] = false;
            $response["message"] = 'FCM registration ID updated successfully';
        } else {
            // Failed to update user
            $response["error"] = true;
            $response["message"] = "Failed to update FCM registration ID";
        }
 
        return $response;
    }
 
    function createOtp($user_id, $otp) {
		global $con;
 
        // delete the old otp if exists
        $deleteOtp = mysqli_query($con,"DELETE FROM sms_codes where user_id = '$user_id'");
 
        $insertOtp = mysqli_query($con,"INSERT INTO sms_codes(user_id, code, status) values('$user_id', $otp, 0)");
 
		if($insertOtp){
			return true;
		}
        
    }
     
    /**
     * Checking for duplicate user by mobile number
     * @param String $email email to check in db
     * @return boolean
     */
    function isUserExists($mobile,$name) {
		global $con;
		
		$selectUsers = mysqli_query($con,"SELECT id from users WHERE mobile = '$mobile' and status = 1");
        $num_rows = mysqli_num_rows($selectUsers);
		
		if($num_rows > 0){
			$updateUser =mysqli_query($con,"UPDATE users SET user_name = '$name' WHERE mobile = '$mobile' AND status = 1 ");
		}
       
        return $num_rows > 0;
    }
    
    
    
    function isUserPending($mobile) {
		global $con;
	        
        $selectUsers = mysqli_query($con,"SELECT id from users WHERE mobile = '$mobile' and status = 0");
       
        $num_rows = mysqli_num_rows($selectUsers);
      
        return $num_rows > 0;
    }
    
    
    
    // fetching user_id
    function isUserID($mobile) {
		global $con;
		
        $selectUser = mysqli_query($con,"SELECT id FROM users WHERE mobile = '$mobile'");
		
        $user_id = null;
        if ($selectUser) {
            $rowCount = mysqli_num_rows($selectUser);
            if ($rowCount > 0) {
            	while ($row = mysqli_fetch_assoc($selectUser)){	
            		$user_id = $row['id'];
            	}
            }
        
            return $user_id;
        } 
    }
    
    
 
    function activateUser($otp) {
		global $con;
		
        $selectUser = mysqli_query($con,"SELECT u.id, u.user_name, u.email, u.mobile, u.apikey, u.status, u.date_added FROM users u, sms_codes WHERE sms_codes.code = '$otp' AND sms_codes.user_id = u.id");
 
        if ($selectUser) {
            $rowCount = mysqli_num_rows($selectUser);
            if ($rowCount > 0) {
                      
                $user = array();
				$id=null;
                while ($row = mysqli_fetch_assoc($selectUser)){	
                $id = $row['id'];
                $user["name"] = $row['user_name'];
                $user["email"] = $row['email'];
                $user["mobile"] = $row['mobile'];
                $user["apikey"] = $row['apikey'];
                $user["status"] = $row['status'];
                $user["created_at"] = $row['date_added'];
                 
                }
                 // activate the user
				activateUserStatus($id);
                return $user;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }
     
    function activateUserStatus($user_id){
		global $con;
		
        $updateStatus = mysqli_query($con,"UPDATE users set status = 1 where id = '$user_id'");
               
        $updateSMS = mysqli_query($con,"UPDATE sms_codes set status = 1 where user_id = '$user_id'");

    }
 
    /**
     * Generating random Unique MD5 String for user Api key
     */
    function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
    
	
	function sendSms($mobile,$otp) {
	
		$message    = "Hello, Welcome to Loyalty Club. Your Activation code is:".$otp;
		$headers=array();

		$headers[]="ApiKey:db7eacd7eec6498cb0f9d67a17765c92";
		$headers[]="Content-type:application/json";

		$dataObj=new stdClass();
		$dataObj->message = $message;
		$dataObj->recipients = $mobile;
		$json = json_encode($dataObj);

		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,"http://api.sematime.com/v1/1477482570516/messages");
		curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$json);

		$output=curl_exec($ch);
		curl_close($ch);
	
	
	}
	
	/* Pushing Information to Events,Offers and Places */
	// fetching all businesses
    function getAllBusiness() {
		global $con;
		
        $selectPlaces = mysqli_query($con,"SELECT * FROM business WHERE isActive='1' ");
        if ($selectPlaces) {
            $rowCount = mysqli_num_rows($selectPlaces);
            if ($rowCount > 0) {
                      
                $places_all = array();
                while ($row = mysqli_fetch_assoc($selectPlaces)){	
				$place = array();
                $place["business_id"] = $row['business_id'];
                $place["business_name"] = $row['business_name'];
                $place["location"] = $row['location'];
                $place["open_hours"] = $row['open_hours'];
                $place["info_place"] = $row['info_place'];
                $place["logo_place"] = $row['logo_place'];
				$place["number"] = $row['number'];
                $place["website"] = $row['website'];
                $place["latitude"] = $row['latitude'];
                $place["longitude"] = $row['longitude'];
                array_push($places_all, $place);
                }	
				
                return $places_all;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
		return NULL;
    }	
	
	function getAllBranch() {
		global $con;
		     
		$selectShop = mysqli_query($con,"SELECT s.*,number FROM shops s JOIN business b ON s.shop_business_id=b.business_id WHERE s.isActive='1' ");
        if ($selectShop) {
            $rowCount = mysqli_num_rows($selectShop);
                      
                $places_all = array();
					while ($row = mysqli_fetch_assoc($selectShop)){	
					$place = array();
					$place["branch_id"] = $row['shop_id'];
					$place["business_id"] = $row['shop_business_id'];
					$place["branch_name"] = $row['shop_name'];
					$place["location"] = $row['shop_location'];
					$place["open_hours"] = $row['shop_hours'];
					$place["info_branch"] = $row['shop_description'];
					$place["number"] = $row['number'];
					$place["latitude"] = $row['shop_lat'];
					$place["longitude"] = $row['shop_lng'];
					array_push($places_all, $place);
					}			
				
                return $places_all;          
        } else {
            return NULL;
        }
		return NULL;
    }	
	
	
	// fetching all offers
    function getAllOffers() {
		global $con;
		
        $selectOffers = mysqli_query($con,"SELECT * FROM offers o LEFT JOIN categories c ON o.category_id=c.category_id WHERE isActive='1' ");
        if ($selectOffers) {
            $rowCount = mysqli_num_rows($selectOffers);
            if ($rowCount > 0) {
                      
                $offers_all = array();
                while ($row = mysqli_fetch_assoc($selectOffers)){	
                			$offer_id = $row['offer_id'];
                			$query_redeem_count = "SELECT SUM(quantity) AS total_rewards FROM `redeem_points` WHERE `offer_id`='$offer_id' ";
					$selectCount = mysqli_query($con,$query_redeem_count);
					while($rowRewards = mysqli_fetch_assoc($selectCount)){
						$redeem_count = $rowRewards['total_rewards'];
					}
					
					$query_award_count = "SELECT SUM(quantity) AS total_rewards FROM `loyalty_points` WHERE `offer_id`='$offer_id' ";
					$selectAwardCount = mysqli_query($con,$query_award_count);
					while($rowAwards = mysqli_fetch_assoc($selectAwardCount)){
						$award_count = $rowAwards['total_rewards'];
					}
					$total_count = $redeem_count + $award_count;
					if(strtotime($row['expiration_date']) > time()){
						$offer = array();
						$offer["offer_id"] = $row['offer_id'];
						$offer["business_id"] = $row['business_id'];
						$offer["branch_id"] = $row['place_id'];
						$offer["category"] = $row['category'];
						$offer["offer_title"] = $row['offer_title'];
						$offer["message"] = $row['message'];
								
						$offer["monday"] = $row['monday'];
						$offer["tuesday"] = $row['tuesday'];
						$offer["wednesday"] = $row['wednesday'];
						$offer["thursday"] = $row['thursday'];
						$offer["friday"] = $row['friday'];
						$offer["saturday"] = $row['saturday'];
						$offer["sunday"] = $row['sunday'];
					
						$offer["redeem_count"] = "$total_count";
						$offer["price"] = $row['oprice'];
						$offer["discount"] = $row['dprice'];
						$offer["expire_date"] = $row['expiration_date'];
						$offer["redeem_points"] = $row['redeem_points'];
						$offer["offer_image"] = $row['offer_image'];
						$offer["timestamp"] = strtotime($row['expiration_date']);
						array_push($offers_all, $offer);
					}
                }
                return $offers_all;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
		return NULL;
    }
	
	// fetching all redeemable offers
    function getAllRewards() {
		global $con;
		
        $selectOffers = mysqli_query($con,"SELECT * FROM rewards o LEFT JOIN categories c ON o.category_id=c.category_id WHERE isActive='1' ");
        if ($selectOffers) {
            $rowCount = mysqli_num_rows($selectOffers);
            if ($rowCount > 0) {
                      
                $offers_all = array();
                while ($row = mysqli_fetch_assoc($selectOffers)){	
					$offer = array();
					$offer["reward_id"] = $row['reward_id'];
					$offer["business_id"] = $row['business_id'];
					$offer["shop_id"] = $row['place_id'];
					$offer["category"] = $row['category'];
					$offer["title"] = $row['title'];
					$offer["message"] = $row['message'];
					$offer["redeem_points"] = $row['redeem_points'];
					$offer["redeem_image"] = $row['redeem_image'];
					array_push($offers_all, $offer);					
                }
                return $offers_all;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
		return NULL;
    }

	// fetching all events
    function getAllEvents() {
		global $con;
		
        $selectEvent = mysqli_query($con,"SELECT * FROM events e LEFT JOIN categories c ON e.category_id=c.category_id WHERE e.isActive='1' ");
        if ($selectEvent) {
            $rowCount = mysqli_num_rows($selectEvent);
            if ($rowCount > 0) {
                      
                $event_all = array();
                while ($row = mysqli_fetch_assoc($selectEvent)){	
					if(strtotime($row['event_date']) > time()){
						$event = array();
						$event["event_id"] = $row['event_id'];
						$event["business_id"] = $row['business_id'];
						$event["category"] = $row['category'];
						$event["event_name"] = $row['event_name'];
						$event["event_date"] = $row['event_date'];
						$event["event_time"] = $row['start_time']."-".$row['end_time'];
						$event["event_location"] = $row['event_location'];
						$event["event_image"] = htmlentities($row['event_image']);
						$event["event_details"] = $row['event_details'];
						$event["charges"] = $row['charges'];
						$event["latitude"] = $row['latitude'];
						$event["longitude"] = $row['longitude'];
						$event["timestamp"] = strtotime($row['event_date']);
						array_push($event_all, $event);
					}
                }
                return $event_all;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }
	
	// fetching all transactions
    function getAllHistory($user_id) {
		global $con;
		$all_points = array();
			 
			$selectAward = mysqli_query($con,"SELECT * FROM loyalty_points WHERE `user_id` = '$user_id' ");
			if ($selectAward) {
				$rowCount = mysqli_num_rows($selectAward);
				if ($rowCount > 0) {
						  				   
					while ($row = mysqli_fetch_assoc($selectAward)){	
					$awards = array();
					$awards["business_id"] = $row['business_id'];
					$awards["points"] = $row['points_awarded'];
					$awards["date_added"] = $row['date_added'];
					$awards["push_type"] = 'award';
					array_push($all_points, $awards);
					}
					
					$selectRedeem = mysqli_query($con,"SELECT * FROM redeem_points WHERE `user_id` = '$user_id' ");
					if ($selectRedeem) {
						$redeemCount = mysqli_num_rows($selectRedeem);
						if ($redeemCount > 0) {
							while ($row = mysqli_fetch_assoc($selectRedeem)){
								$redeem = array();
								$redeem["business_id"] = $row['business_id'];
								$redeem["points"] = $row['points_redeemed'];
								$redeem["date_added"] = $row['date_added'];
								$redeem["push_type"] = 'redeem';
								array_push($all_points, $redeem);
							}
						}
					
					return $all_points;
				} else {
					return NULL;
				}
			} else {
				return NULL;
			}
		}else {
				return NULL;
			}
	}
	
	
	// fetching all transactions for a cashier
    function getShopHistory($business_id,$shop_id) {
		global $con;
		$all_points = array();
			 
			$selectAward = mysqli_query($con,"SELECT l.*,s.user_name FROM loyalty_points l JOIN users s ON l.user_id = s.id WHERE `business_id` = '$business_id' AND `shop_id` = '$shop_id' ");
			if ($selectAward) {
				$rowCount = mysqli_num_rows($selectAward);
				if ($rowCount > 0) {
						  				   
					while ($row = mysqli_fetch_assoc($selectAward)){	
					$awards = array();
					$awards["business_id"] = $row['business_id'];
					$awards["points"] = $row['points_awarded'];
					$awards["name"] = $row['user_name'];
					$awards["push_type"] = 'award';
					$awards["date_added"] = $row['date_added'];
					array_push($all_points, $awards);
					}
					
					$selectRedeem = mysqli_query($con,"SELECT * FROM redeem_points r JOIN users s ON r.user_id = s.id WHERE `business_id` = '$business_id' AND `shop_id` = '$shop_id' ");
					if ($selectRedeem) {
						$redeemCount = mysqli_num_rows($selectRedeem);
						if ($redeemCount > 0) {
							while ($row = mysqli_fetch_assoc($selectRedeem)){
								$redeem = array();
								$redeem["business_id"] = $row['business_id'];
								$redeem["points"] = $row['points_redeemed'];
								$redeem["name"] = $row['user_name'];
								$redeem["push_type"] = 'redeem';								
								$redeem["date_added"] = $row['date_added'];
								array_push($all_points, $redeem);
							}
						}
					
					return $all_points;
				} else {
					return NULL;
				}
			} else {
				return NULL;
			}
		}else {
				return NULL;
			}
	}
	
	
	// fetching all user business
    function getUserBusiness($user_id) {
		global $con;
		
        $selectUserBiz = mysqli_query($con,"SELECT * FROM user_business WHERE `user_id` = '$user_id'  ");
        if ($selectUserBiz) {
            $rowCount = mysqli_num_rows($selectUserBiz);
            if ($rowCount > 0) {
                      
                $userBiz_all = array();
                while ($row = mysqli_fetch_assoc($selectUserBiz)){	
				$biz = array();
                $biz["business_id"] = $row['business_id'];
				$biz["points"] = $row['points'];
                $biz["isFavourite"] = $row['isFavourite'];
                array_push($userBiz_all, $biz);
                }
                return $userBiz_all;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
		return NULL;
    }
    	
	/* Business Signup*/
	function createPlace($id){
		global $con;
		$response = null;
		$website = null;
		
		//for id  0 = create,1 =update, 2 =change password
		
		if(isset($_SESSION["user_id"])){
			$business_name = $_SESSION["business_name"];
			$business_id = $_SESSION['business_id'];
		}
		
			if(isset($_POST['business_name'])){
				$bname = mysqli_real_escape_string($con,$_POST['business_name']);
				$email = mysqli_real_escape_string($con,$_POST['email']);
				$location = mysqli_real_escape_string($con,$_POST['location']);
				$website = mysqli_real_escape_string($con,$_POST['website']);
				$info = mysqli_real_escape_string($con,$_POST['information']);
				$number = mysqli_real_escape_string($con,$_POST['number']);
				$open_hours = mysqli_real_escape_string($con,$_POST['open_hours']);
				$latitude = mysqli_real_escape_string($con,$_POST['lat']);
				$longitude = mysqli_real_escape_string($con,$_POST['lng']);
				
				if(isset($_POST['loyalty'])){
					$loyalty = mysqli_real_escape_string($con,$_POST['loyalty']);				
					$loyalty = $loyalty*10;
				}
				
				if(strlen($number) < 10){
				  return 'Sorry not a valid number<br>';
				}

				// Check if email is valid
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					return 'Your email is invalid. Please try another email address<br>';
				}
									
				if($id==0){
					// Check if email exist
					$emailRequest = mysqli_query($con,"SELECT * FROM business WHERE email='$email' LIMIT 1");	
					// Return the number of rows in result set
					$emailcount=mysqli_num_rows($emailRequest);	
						if($emailcount>0){
						return 'Your email is already registered<br>';
					}
				
						
					// Check if number exists
					$phoneRequest = mysqli_query($con,"SELECT * FROM business WHERE number='$number' LIMIT 1");	
					// Return the number of rows in result set
					$phonecount=mysqli_num_rows($phoneRequest);	
						if($phonecount>0){
						return 'Your number is already registered<br>';
					}
				}
			}
			
			if(isset($_POST['password'])){
				$password = mysqli_real_escape_string($con,$_POST['password']);
				$re_password = mysqli_real_escape_string($con,$_POST['re_password']);
				
				//check to see if the passwords match
				if($_POST['password'] != $_POST['re_password']){
					return 'Passwords don\'t match<br>';
				}
			
				if(strlen($password) < 8){
					return 'Password must be more than 8 characters<br>';
				}
				
				// If all fields are not empty, and the passwords match,
					// create a session, and session variables,
					$password = sha1(mysqli_real_escape_string($con,$_POST['password']));
				
				if($id==2){
					$query_cashier = "UPDATE `cashier` SET `pin`='$password' WHERE cashier_id='$user_id'";
					$result_user = mysqli_query($con,$query_cashier);
						if($result_user){
							return "Password was Updated Successfully!!";
						}else{
							return "Sorry, Password was not Updated";
						}
				}
				
			}
										
				
				if (isset($_FILES['uploadImage']['name'])&&($_FILES['uploadImage']['name']!=null)) {
					
					$image_info = getimagesize($_FILES["uploadImage"]["tmp_name"]);
					$image_width = $image_info[0];
					$image_height = $image_info[1];
					
					if(($image_width!=$image_height)){
						return "Dimension of image is Invalid, make sure";
					}
				
								
					// Path to uploaded files
					$filepath = null;
					$date = gmdate('Y-m-d H:i:s',time()+10800);
					$timestamp = time();
					$folderbusiness = str_replace(' ', '', $bname);
					// Create directory if it does not exist
						if(!is_dir(URL_UPLOADS."places/".$folderbusiness."/")) {
							mkdir(URL_UPLOADS."places/".$folderbusiness."/");
						}
					
					$extent = substr(strrchr(($_FILES["uploadImage"]["name"]), "."), 1);
					$newfilename = $timestamp.".".$extent;
					$filepath = "http://loyaltyclub.local//uploads/places/".$bname."/".$newfilename;
					$filepath = str_replace(' ', '', $filepath);
					$validextensions = array("jpeg", "jpg", "png","tiff",);  //Extensions which are allowed
					$image_ext = substr(strrchr(($_FILES["uploadImage"]["name"]), "."), 1);
							
							try {
								if (($_FILES["uploadImage"]["size"] < 3000000) //Approx. 3MB files can be uploaded.
									&& in_array($image_ext, $validextensions)) {	
									// Throws exception incase file is not being moved
									if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], URL_UPLOADS."places/".$folderbusiness ."/".$newfilename)) {
										// File successfully uploaded
										if($id==0){
											$query = "INSERT INTO `business` (`business_name`, `email`, `location`, `open_hours`, `info_place`, `logo_place`, `number`, `website`, `latitude`, `longitude`, `date_added`) 
														VALUES ('$bname', '$email',  '$location', '$open_hours', '$info', '$filepath', '$number', '$website', '$latitude', '$longitude', '$date')";			
										}else{
											$query = "UPDATE `business` SET `business_name`='$bname',`location`='$location',`open_hours`='$open_hours',`info_place`='$info',
														`logo_place`='$filepath',`number`='$number',`website`='$website',`latitude`='$latitude',`longitude`='$longitude',`loyalty`='$loyalty'
															WHERE business_id='$business_id'";
										}
									
										$result = mysqli_query($con, $query);
										
										if($result){
											if($id==0){
												//Business uploaded successfully!	
												$last_id = mysqli_insert_id($con);
												$query_cashier = "INSERT INTO `cashier` (`business_id`, `first_name`, `last_name`, `cashier_email`, `pin`) 
																	VALUES ('$last_id','Owner',NULL, '$email', '$password')";
												
												$result_user = mysqli_query($con,$query_cashier);
												
												if($result_user){
													return "Business Successfully added";
												}
											}else{
												unlink($_POST["hidden_file"]);
												return "Business was Updated Successfully!!";
											}
																						
										}else{
											return "There was an error adding your business, please try again";
										}
																					
									}else{
										// make error flag true
										return "Sorry, Could not upload the image file!";			        
									}
								}else{
									//error file type not recognised or file is larger than 3MB
									return "Error! file type not recognised or file is larger than 3MB";
									
								}
							} catch (Exception $e) {
								// Exception occurred. Make error flag true
								$e->getMessage();
								$response = $e;
							}
					} else {
						if(isset($_POST["hidden_file"])){
							
							$query = "UPDATE `business` SET `business_name`='$bname',`location`='$location',`open_hours`='$open_hours',`info_place`='$info',
												`number`='$number',`website`='$website',`latitude`='$latitude',`longitude`='$longitude',`loyalty`='$loyalty'
											WHERE business_id='$business_id'";
							$result = mysqli_query($con, $query) ;
							
							if($result){
								//File uploaded successfully!
								return "Business was Updated Successfully!!";
							}else{
								//File not uploaded!
								return "Error, Business was not updated!!";
							}
						}else{
							// File parameter is missing
							return "No file was received.";
						}
					}
	}
	
	function merchant(){
		global $con;
		$response = array();
		$response_all = array();
		
		$id = $_SESSION['business_id'];
				
		$query_business = "SELECT * FROM business WHERE business_id = '$id' LIMIT 1";
		$selectBusiness = mysqli_query($con,$query_business);
			
			if(mysqli_num_rows($selectBusiness) > 0){
				while($row = mysqli_fetch_assoc($selectBusiness)){
					$response["business"] = $row['business_name'];
					$response["email"] = $row['email'];
					$response["location"] = $row['location'];
					$response["open_hours"] = $row['open_hours'];
					$response["info_place"] = $row['info_place'];
					$response["logo_place"] = $row['logo_place'];
					$response["number"] = $row['number'];
					$response["website"] = $row['website'];
					$response["latitude"] = $row['latitude'];
					$response["longitude"] = $row['longitude'];
					$response["loyalty"] = $row['loyalty'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;
	}
	
	function login($email,$password){
		global $con;
				
		$email = mysqli_real_escape_string($con,$email);
		$password = sha1(mysqli_real_escape_string($con,$password));
		
		$query_inactive = "SELECT * FROM cashier c JOIN business b ON c.business_id=b.business_id 
						WHERE `cashier_email`='$email' AND pin='$password' AND c.isActive=1 AND b.isActive='0' LIMIT 1 ";
		$selectInactive = mysqli_query($con,$query_inactive);		
		if(mysqli_num_rows($selectInactive) > 0){
			return 3;
		}
		
		$query = "SELECT c.business_id,c.shop_id,first_name,last_name,cashier_email,cashier_id,business_name,logo_place,sms_balance,number,loyalty
					FROM cashier c JOIN business b ON c.business_id=b.business_id 
						WHERE `cashier_email`='$email' AND pin='$password' AND c.isActive=1 AND b.isActive='1' LIMIT 1 ";
		$selectUser = mysqli_query($con,$query);
			
			if(mysqli_num_rows($selectUser) > 0){
				while($row = mysqli_fetch_assoc($selectUser)){
					$business_id = $row['business_id'];
					$shop_id = $row['shop_id'];
					$username = $row['first_name'].' '.$row['last_name'];
					$firstname = $row['first_name'];
					$lastname = $row['last_name'];
					$email = $row['cashier_email'];
					$user_id = $row['cashier_id'];
					$business_name = $row['business_name'];
					$logo = $row['logo_place'];
					$balance = $row['sms_balance'];
					$number = $row['number'];
				}	
				$_SESSION["user_id"] = $user_id;
				$_SESSION["business_id"] = $business_id;
				$_SESSION["shop_id"] = $shop_id;
				$_SESSION["business_name"] = $business_name;
				$_SESSION["username"] = $username;
				$_SESSION["firstname"] = $firstname;
				$_SESSION["lastname"] = $lastname;
				$_SESSION["logo"] = $logo;
				$_SESSION["email"] = $email;
				$_SESSION["number"] = $number;
				$_SESSION["sms_balance"] = $balance;
				$_SESSION["logged"]= TRUE;
				return 1;
			}else{
				$queryAdmin = "SELECT * FROM admin WHERE `email`='$email' AND password='$password' LIMIT 1 ";
				$selectAdmin = mysqli_query($con,$queryAdmin);
				if(mysqli_num_rows($selectAdmin) > 0){
					$_SESSION["user_id"] = 0;
					$_SESSION["business_id"] = 0;
					$_SESSION["shop_id"] = 0 ;
					$_SESSION["business_name"] = "Loyalty Club";
					$_SESSION["username"] = "Admin";
					$_SESSION["email"] = $email;
					$_SESSION["logged"]= TRUE;
					
					header("Location: index_admin.php");
					exit;
				}else{
					return 0;
				}
			}
		
	}
	
	function addEvent($id){
		global $con;
		
		$id = mysqli_real_escape_string($con,$id);
		// Path to uploaded files
		$filepath = null;
			
		$event = mysqli_real_escape_string($con,$_POST["title"]);
		$event_date = mysqli_real_escape_string($con,$_POST["event_date"]);
		$start_time = mysqli_real_escape_string($con,$_POST["start_time"]);
		$end_time = mysqli_real_escape_string($con,$_POST["end_time"]);
		$location = mysqli_real_escape_string($con,$_POST["location"]);
		$event_details = mysqli_real_escape_string($con,$_POST["details"]);
		$charges = mysqli_real_escape_string($con,$_POST["charges"]);
		$lat = mysqli_real_escape_string($con,$_POST["lat"]);
		$lng = mysqli_real_escape_string($con,$_POST["lng"]);
		$category = mysqli_real_escape_string($con,$_POST["category"]);
		$date = gmdate('Y-m-d H:i:s',time()+10800);
		$timestamp = time();
		$user_id= $_SESSION["user_id"];
		$shop_id = $_SESSION["shop_id"];
		$business_id = $_SESSION["business_id"];
		
		$selectCategories = mysqli_query($con,"SELECT * FROM categories WHERE category_id='$category'");
		while($row = mysqli_fetch_assoc($selectCategories)){
			$category_name = $row['category'];
		}
			
		
		// Create directory if it does not exist
		if(!is_dir(URL_UPLOADS."events/".$user_id."/")) {
			mkdir(URL_UPLOADS."events/".$user_id."/");
		}
		
		$extent = substr(strrchr(($_FILES["upload_file"]["name"]), "."), 1);
		$newfilename = $timestamp.".png";
		$filepath ="http://loyaltyclub.local//uploads/events/".$user_id.'/'.$newfilename; //http://beta.loyaltyclub.co.ke/
		$filepath = trim($filepath," ");
		$validextensions = array("jpeg", "jpg", "png","tiff",);  //Extensions which are allowed
		$image_ext = substr(strrchr(($_FILES["upload_file"]["name"]), "."), 1);
		
		if (isset($_FILES['upload_file']['name'])) {
					
					try {
						if (($_FILES["upload_file"]["size"] < 3000000) //Approx. 3MB files can be uploaded.
							&& in_array($image_ext, $validextensions)) {	
							
							$image_info = getimagesize($_FILES["upload_file"]["tmp_name"]);
							$image_width = $image_info[0];
							$image_height = $image_info[1];

							// Throws exception incase file is not being moved
							if($image_info !== false) {
								//"File is an image - " . $check["mime"] . ".";
								$file = $_FILES["upload_file"]["tmp_name"];
								//indicate the path and name for the new resized file
								$resizedFile = URL_UPLOADS."events/".$user_id."/".$timestamp.'.png';

								  //call the function (when passing path to pic)
								  smart_resize_image($file , null, 960 , 720 , false , $resizedFile , false , false ,90 );
								  
								  // File successfully uploaded
									if($id==0){
										$query = "INSERT INTO `events` (`business_id`, `user_id`, `category_id`,`event_name`, `event_date`, `start_time`, `end_time`, `event_location`, `event_image`, `event_details`,`charges`, `latitude`, `longitude`, `date_added`) 
													VALUES ('$business_id','$user_id','$category','$event', '$event_date', '$start_time', '$end_time', '$location', '$filepath', '$event_details', '$charges', '$lat', '$lng' , '$date');";
										
									}else{		
										$query = "UPDATE `events` SET `category_id`='$category',`event_name`='$event',`event_date`='$event_date',`start_time`='$start_time',`end_time`='$end_time',
													`event_location`='$location',`event_image`='$filepath',`event_details`='$event_details',`charges`='$charges',`latitude`='$lat',`longitude`='$lng'
														WHERE event_id='$id'";	
									}
									$result = mysqli_query($con, $query) ;
								
									if($result){
										if($id==0){
											$last_id = mysqli_insert_id($con);
											$title = $event;
											$message = $event_details;
											$firebase_id = 'global';
											$payload = array();											
											$payload['id'] = $last_id;
											$payload['points'] = $charges;
											$payload['push_type'] = "event";
											$payload['category'] = $category_name;
											$payload['expire_date'] = $event_date;
											$payload['timestamp'] = strtotime($event_date);
											$payload['business_points'] = 0;
											
											$payload['monday'] = '0';
											$payload['tuesday'] = '0';
											$payload['wednesday'] = '0';
											$payload['thursday'] = '0';
											$payload['friday'] = '0';
											$payload['saturday'] = '0';
											$payload['sunday'] = '0';
											
											//offer specific
											$payload['price'] = '0';
											$payload['discount'] = '0';
											
											//Event specific
											$payload['location'] = $location;
											$payload['time'] = $start_time.'-'.$end_time;
											$payload['lat'] = $lat;
											$payload['lng'] = $lng;
											
											//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
											
											return "Event was Added successfully!";
										}else{
											return "Event was Updated Successfully!!";
										}
									}else{
										//File not uploaded!
										return "Error, Offer was not updated!!";
									}				
							} else {
								return "Unable to upload image.";
							}
						}else{
							if(isset($_POST["hidden_file"])){
								$query = "UPDATE `events` SET `category_id`='$category',`event_name`='$event',`event_date`='$event_date',`start_time`='$start_time',`end_time`='$end_time',
												`event_location`='$location',`event_details`='$event_details',`charges`='$charges',`latitude`='$lat',`longitude`='$lng'
													WHERE event_id='$id'";
								$result = mysqli_query($con, $query) ;
								
								if($result){
									//File uploaded successfully!
									return "Event was Updated Successfully!!";
								}else{
									//File not uploaded!
									return "Error, Offer was not updated!!";
								}
							}else{
								//error file type not recognised or file is larger than 5MB
								return "Error! file type not recognised or file is larger than 5MB";
							}
						}
					} catch (Exception $e) {
						// Exception occurred. Make error flag true
						// $e->getMessage();
					}
			} else {
				// File parameter is missing
				//No file was received.
				return "Error! No file was uploaded!";
			}
	}
	
	/* Get Single Event */
	function events($id){
		global $con;
		$response = array();
		$response_all = array();
		
		$id = mysqli_real_escape_string($con,$id);
		
		$query_event = "SELECT * FROM events WHERE event_id = '$id'";
		$selectEvent = mysqli_query($con,$query_event);
			
			if(mysqli_num_rows($selectEvent) > 0){
				while($row = mysqli_fetch_assoc($selectEvent)){
					$response["event"] = $row['event_name'];
					$response["category"] = $row['category_id'];
					$response["date"] = $row['event_date'];
					$response["start_time"] = $row['start_time'];
					$response["end_time"] = $row['end_time'];
					$response["location"] = $row['event_location'];
					$response["details"] = $row['event_details'];
					$response["charges"] = $row['charges'];
					$response["lat"] = $row['latitude'];
					$response["lng"] = $row['longitude'];
					$response["event_image"] = $row['event_image'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;
	}
	
	function addCashier($con,$business_id,$cashier_id){
		$response = null;
		
			$fname = mysqli_real_escape_string($con,$_POST['first_name']);
			$email = mysqli_real_escape_string($con,$_POST['email']);
			$lname = mysqli_real_escape_string($con,$_POST['last_name']);
			$branch = mysqli_real_escape_string($con,($_POST['branch']));
					
			if($cashier_id==0){
				
			$pin = mysqli_real_escape_string($con,sha1($_POST['password']));
			
				if(!ctype_digit($_POST['password'])){
					$response = "Pin is not a digit";
				}
							
				if(strlen($_POST['password']) < 4){
					$response = "Pin MUST be at least 4 digits";
				}
				
				$queryEmail = "SELECT cashier_email FROM cashier WHERE cashier_email='$email'";
				$selectEmail = mysqli_query($con,$queryEmail);
				if(mysqli_num_rows($selectEmail) > 0){
					$response = "Sorry, Email is already registered";
				}
			}
			
			if(strlen($fname) > 15){
				$response = "First Name is Invalid";
			}
	
			if(strlen($lname) > 15 ){
				$response = "Last Name is Invalid";
			}
						
			if($response==null){
				
				if($cashier_id==0){
					$query = "INSERT INTO `cashier` (`business_id`,`shop_id`, `first_name`, `last_name`, `cashier_email`, `pin`) VALUES ('$business_id','$branch', '$fname', '$lname', '$email', '$pin')";
				}else{
					$query = "UPDATE `cashier` SET `first_name`='$fname',`last_name`='$lname',`cashier_email`='$email',`shop_id`='$branch'
						WHERE cashier_id='$cashier_id'";
				}
				$insertCashier = mysqli_query($con,$query);
				
				if($insertCashier){
					if($cashier_id==0){
						$response = "Cashier Successfully Added";
					}else{
						$response = "Cashier Updated Successfully!";
					}
				}else{
					$response = "There was an error adding the Cashier";
				}
				
			}
			
			return $response;
	}
	
	
	function addOffer($id){
		global $con;
	
	$id = mysqli_real_escape_string($con,$id);
	// Path to uploaded files
	$filepath = $message = $reward = $check_reward = null;
	
	$category_id = strip_tags(mysqli_real_escape_string($con,$_POST["category"]));
	$title = strip_tags(mysqli_real_escape_string($con,$_POST["title"]));
	$exp_date = strip_tags(mysqli_real_escape_string($con,$_POST["expire_date"]));
	$points = strip_tags(mysqli_real_escape_string($con,$_POST["points"]));
	$message = strip_tags(mysqli_real_escape_string($con,$_POST["message"]));
	$start_date = strip_tags(mysqli_real_escape_string($con,$_POST["start_date"]));
	$oprice = strip_tags(mysqli_real_escape_string($con,$_POST["oprice"]));
	$dprice = strip_tags(mysqli_real_escape_string($con,$_POST["dprice"]));
	
	//$points = ($dprice/10);
	
	$selectCategories = mysqli_query($con,"SELECT * FROM categories WHERE category_id='$category_id'");
	while($row = mysqli_fetch_assoc($selectCategories)){
		$category_name = $row['category'];
	}
	
	$selectOffer = mysqli_query($con,"SELECT * FROM offers WHERE offer_id='$id'");
	while($row = mysqli_fetch_assoc($selectOffer)){
		$rewards = $row['rewards'];
	}
	
	if(isset($_POST["radio_reward"])){
		$check_reward = strip_tags(mysqli_real_escape_string($con,$_POST["radio_reward"]));
	}else{
		return "Select option for number of rewards";
	}
	
	if(isset($_POST["radio_days"])){
		$check_days = strip_tags(mysqli_real_escape_string($con,$_POST["radio_days"]));
	}else{
		return "Select option for days of the week";
	}
	
	$date = gmdate('Y-m-d H:i:s',time()+10800);
	$user_id= $_SESSION["user_id"];
	$shop_id = $_SESSION["shop_id"];
	$business_id = $_SESSION["business_id"];
	$timestamp = time();
		
	if ($check_reward == "limited") {          
		$reward = mysqli_real_escape_string($con,$_POST["reward"]);
	}elseif($check_reward == "unlimited")  {
		$reward = 0;
	}else{
		$reward = mysqli_real_escape_string($con,$_POST["alt_reward"]);
	}
	
	$_POST['monday'] = trim(isset($_POST['monday'])?$_POST['monday']:'')?:'0';
	$_POST['tuesday'] = trim(isset($_POST['tuesday'])?$_POST['tuesday']:'')?:'0';
	$_POST['wednesday'] = trim(isset($_POST['wednesday'])?$_POST['wednesday']:'')?:'0';
	$_POST['thursday'] = trim(isset($_POST['thursday'])?$_POST['thursday']:'')?:'0';
	$_POST['friday'] = trim(isset($_POST['friday'])?$_POST['friday']:'')?:'0';
	$_POST['saturday'] = trim(isset($_POST['saturday'])?$_POST['saturday']:'')?:'0';
	$_POST['sunday'] = trim(isset($_POST['sunday'])?$_POST['sunday']:'')?:'0';
	
	$monday = $_POST['monday'] ;
	$tuesday = $_POST['tuesday'];
	$wednesday = $_POST['wednesday'] ;
	$thursday = $_POST['thursday'] ;
	$friday = $_POST['friday'];
	$saturday = $_POST['saturday'];
	$sunday = $_POST['sunday'] ;
	
	if ($check_days == "all") { 
		$days = "'1','1','1','1','1','1','1'";
	}elseif($check_days == "select")  {
		$days = "'".$_POST['monday']."','".$_POST['tuesday']."','".$_POST['wednesday']."','".$_POST['thursday']."','".$_POST['friday']."','".$_POST['saturday']."','".$_POST['sunday']."'";      	
	}
	
	$days = strip_tags($days);
	$reward = strip_tags($reward);
		
	
	
	//sleep(3);
	if (isset($_FILES['upload_file']['name'])) {
				
			// Create directory if it does not exist
			if(!is_dir(URL_UPLOADS."offers/".$user_id."/")) {
				mkdir(URL_UPLOADS."offers/".$user_id."/");
			}
			
			$extent = substr(strrchr(($_FILES["upload_file"]["name"]), "."), 1);
			$newfilename = $timestamp.".png";
			$filepath = "http://loyaltyclub.local//uploads/offers/".$user_id.'/'.$newfilename;
			$filepath = trim($filepath," ");
			$validextensions = array("jpeg", "jpg", "png","tiff",);  //Extensions which are allowed
			$image_ext = substr(strrchr(($_FILES["upload_file"]["name"]), "."), 1);
				
			    try {
					if (($_FILES["upload_file"]["size"] < 5000000) //Approx. 5MB files can be uploaded.
						&& in_array($image_ext, $validextensions)) {	
						
						$image_info = getimagesize($_FILES["upload_file"]["tmp_name"]);
						$image_width = $image_info[0];
						$image_height = $image_info[1];
							
						// Throws exception incase file is not being moved
						if($image_info !== false) {
							
							$file = $_FILES["upload_file"]["tmp_name"];
							//indicate the path and name for the new resized file
							$resizedFile = URL_UPLOADS."offers/".$user_id."/".$timestamp.'.png';

							//call the function (when passing path to pic)
							smart_resize_image($file , null, 960 , 720 , false , $resizedFile , false , false ,90 );
							// File successfully uploaded
							if($id==0){
								$query = "INSERT INTO `offers` (`business_id`,`place_id`,`user_id`, `category_id`,`offer_title`, `message`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`,`start_date`, `expiration_date`, `redeem_points`, `rewards`, `offer_image`,`oprice`,`dprice`, `date_added`)
										VALUES ( '$business_id','$shop_id','$user_id', '$category_id', '$title', '$message',$days,'$start_date','$exp_date', '$points','$reward', '$filepath','$oprice','$dprice', '$date')";
							}else{		
								$query = "UPDATE `offers` SET `category_id`='$category_id', `offer_title`='$title', `message`='$message', `oprice`='$oprice',`dprice`='$dprice',`start_date`='$start_date', `expiration_date`='$exp_date', `redeem_points`='$points', `rewards`='$reward', `offer_image`='$filepath',`oprice`='$oprice',`dprice`='$dprice',`monday`='$monday', `tuesday`='$tuesday', `wednesday`='$wednesday', `thursday`='$thursday', `friday`='$friday', `saturday`='$saturday', `sunday`='$sunday'
												WHERE offer_id='$id'";	
							}
							
							$result = mysqli_query($con, $query) ;
							
							if($result){
								if($id==0){
									$last_id = mysqli_insert_id($con);
									$title = $title;
									$message = $message;
									$firebase_id='global';
									$payload = array();
									$payload['id'] = $last_id;									
									$payload['points'] = $points;
									$payload['push_type'] = "offer";
									$payload['category'] = $category_name;
									$payload['expire_date'] = $exp_date;
									$payload['timestamp'] = strtotime($exp_date);
									$payload['business_points'] = 0;
						
									//Offer Specific
									$payload['monday'] = trim(isset($_POST['monday'])?$_POST['monday']:'')?:'0';
									$payload['tuesday'] = trim(isset($_POST['tuesday'])?$_POST['tuesday']:'')?:'0';
									$payload['wednesday'] = trim(isset($_POST['wednesday'])?$_POST['wednesday']:'')?:'0';
									$payload['thursday'] = trim(isset($_POST['thursday'])?$_POST['thursday']:'')?:'0';
									$payload['friday'] = trim(isset($_POST['friday'])?$_POST['friday']:'')?:'0';
									$payload['saturday'] = trim(isset($_POST['saturday'])?$_POST['saturday']:'')?:'0';
									$payload['sunday'] = trim(isset($_POST['sunday'])?$_POST['sunday']:'')?:'0';
									
									//offer specific
									$payload['price'] = $oprice;
									$payload['discount'] = $dprice;
									
									//Event specific
									$payload['location'] = '0';
									$payload['time'] = '';
									$payload['lat'] = '0';
									$payload['lng'] = '0';
									
									//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
									
									return "Offer Added Successfully!";
								}else{
								
									return "Offer Updated Successfully!!";
								}
							}else{
								//File not uploaded!
								return "Error, Offer was not updated!!";
							}
								
						} else {
							return "Unable to upload image.";
						}
						
					}else{
						if(isset($_POST["hidden_file"])){
							$query = "UPDATE `offers` SET `category_id`='$category_id', `offer_title`='$title', `message`='$message', `start_date`='$start_date', 
												`expiration_date`='$exp_date', `redeem_points`='$points', `rewards`='$reward', `oprice`='$oprice',`dprice`='$dprice',`monday`='$monday', `tuesday`='$tuesday', `wednesday`='$wednesday', `thursday`='$thursday', `friday`='$friday', `saturday`='$saturday', `sunday`='$sunday'
													WHERE offer_id='$id'";
							$result = mysqli_query($con, $query) ;
							
							if($result){
								//File uploaded successfully!
								return "Offer Updated Successfully!!";
							}else{
								//File not uploaded!
								return "Error, Offer was not updated!!";
							}
						}else{
							//error file type not recognised or file is larger than 5MB
							return "Error! file type not recognised or file is larger than 5MB";
						}
					}
			    } catch (Exception $e) {
			        // Exception occurred. Make error flag true
			        // $e->getMessage();
			    }
		} else {
			// File parameter is missing
			return "Error! No file was uploaded!";
		}
	}
	
	
	/* Get Single Offer */
	function offers($id){
		global $con;
		$response = array();
		$response_all = array();
		
		$id = mysqli_real_escape_string($con,$id);
		
		$query_offer = "SELECT * FROM offers WHERE offer_id = '$id'";
		$selectOffer = mysqli_query($con,$query_offer);
			
			if(mysqli_num_rows($selectOffer) > 0){
				while($row = mysqli_fetch_assoc($selectOffer)){
					$response["business_id"] = $row['business_id'];
					$response["category_id"] = $row['category_id'];
					$response["offer"] = $row['offer_title'];
					$response["details"] = $row['message'];
					$response["start_date"] = $row['start_date'];
					$response["expiration_date"] = $row['expiration_date'];
					$response["redeem_points"] = $row['redeem_points'];
					$response["rewards"] = $row['rewards'];
					$response["price"] = $row['oprice'];
					$response["discount"] = $row['dprice'];
					$response["offer_image"] = $row['offer_image'];
					
					$response["monday"] = $row['monday'];
					$response["tuesday"] = $row['tuesday'];
					$response["wednesday"] = $row['wednesday'];
					$response["thursday"] = $row['thursday'];
					$response["friday"] = $row['friday'];
					$response["saturday"] = $row['saturday'];
					$response["sunday"] = $row['sunday'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;
	}
	
	
	function addReward($id){
	global $con;
	
	$id = mysqli_real_escape_string($con,$id);
	// Path to uploaded files
	$filepath = $message = $reward = $check_reward = null;
	
	$category_id = strip_tags(mysqli_real_escape_string($con,$_POST["category"]));
	$title = strip_tags(mysqli_real_escape_string($con,$_POST["title"]));
	$points = strip_tags(mysqli_real_escape_string($con,$_POST["points"]));
	$message = strip_tags(mysqli_real_escape_string($con,$_POST["message"]));
	$category_name = "None";
		
	$selectCategories = mysqli_query($con,"SELECT * FROM categories WHERE category_id='$category_id'");
	while($row = mysqli_fetch_assoc($selectCategories)){
		$category_name = $row['category'];
	}
		
	$date = gmdate('Y-m-d H:i:s',time()+10800);
	$user_id= $_SESSION["user_id"];
	$shop_id = $_SESSION["shop_id"];
	$business_id = $_SESSION["business_id"];
	$timestamp = time();
				

	//sleep(3);
	if (isset($_FILES['upload_file']['name'])) {
			
			// Create directory if it does not exist
			if(!is_dir(URL_UPLOADS."redeems/".$user_id."/")) {
				mkdir(URL_UPLOADS."redeems/".$user_id."/");
			}
			
			$extent = substr(strrchr(($_FILES["upload_file"]["name"]), "."), 1);
			$newfilename = $timestamp.".png";
			$filepath = "http://loyaltyclub.local//uploads/redeems/".$user_id.'/'.$newfilename;
			$filepath = trim($filepath," ");
			$validextensions = array("jpeg", "jpg", "png","tiff",);  //Extensions which are allowed
			$image_ext = substr(strrchr(($_FILES["upload_file"]["name"]), "."), 1);
				
			    try {
					if (($_FILES["upload_file"]["size"] < 5000000) //Approx. 5MB files can be uploaded.
						&& in_array($image_ext, $validextensions)) {	
						
						$image_info = getimagesize($_FILES["upload_file"]["tmp_name"]);
						$image_width = $image_info[0];
						$image_height = $image_info[1];
			
						// Throws exception incase file is not being moved
						if($image_info !== false) {
							$file = $_FILES["upload_file"]["tmp_name"];
							//indicate the path and name for the new resized file
							$resizedFile = URL_UPLOADS."redeems/".$user_id."/".$timestamp.'.png';

							//call the function (when passing path to pic)
							smart_resize_image($file , null, 960 , 720 , false , $resizedFile , false , false ,90 );
							// File successfully uploaded
							if($id==0){
								$query = "INSERT INTO `rewards` (`business_id`,`place_id`,`user_id`, `category_id`,`title`, `message`, `redeem_points`, `redeem_image`, `date_added`)
										VALUES ( '$business_id','$shop_id','$user_id', '$category_id', '$title', '$message', '$points', '$filepath', '$date')";
							}else{		
								$query = "UPDATE `rewards` SET `category_id`='$category_id', `title`='$title', `message`='$message', `redeem_points`='$points', `redeem_image`='$filepath',
											WHERE reward_id='$id'";	
							}
							$result = mysqli_query($con, $query) ;
							
							if($result){
								if($id==0){
									$last_id = mysqli_insert_id($con);
									$title = $title;
									$message = $message;
									$firebase_id='global';
									$payload = array();
									$payload['id'] = $last_id;									
									$payload['points'] = $points;
									$payload['push_type'] = "redeem_offer";
									$payload['category'] = $category_name;
									$payload['expire_date'] = '0';
									$payload['timestamp'] = strtotime($date);
									$payload['business_points'] = 0;
									
									//offer specific
									$payload['monday'] = '0';
									$payload['tuesday'] = '0';
									$payload['wednesday'] = '0';
									$payload['thursday'] = '0';
									$payload['friday'] = '0';
									$payload['saturday'] = '0';
									$payload['sunday'] = '0';
									
									//offer specific
									$payload['price'] = '0';
									$payload['discount'] = '0';
									
									//Event specific
									$payload['location'] = '0';
									$payload['time'] = '';
									$payload['lat'] = '0';
									$payload['lng'] = '0';
									
									//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
									
									return "Reward Added Successfully";
								}else{
									return "Reward Updated Successfully!!";
								}
							}else{
								//File not uploaded!
								return "Error, Reward was not updated!!";
							}
								
						} else {
							return "Unable to upload image.";
						}
						
					}else{
						if(isset($_POST["hidden_file"])){
							$query = "UPDATE `rewards` SET `category_id`='$category_id', `title`='$title', `message`='$message', `redeem_points`='$points'
										WHERE reward_id='$id'"; 
							$result = mysqli_query($con, $query) ;
							
							if($result){
								//File uploaded successfully!
								return "Reward Updated Successfully!!";
							}else{
								//File not uploaded!
								return "Error, Reward was not updated!!";
							}
						}else{
							//error file type not recognised or file is larger than 5MB
							return "Error! file type not recognised or file is larger than 5MB";
						}
					}
			    } catch (Exception $e) {
			        // Exception occurred. Make error flag true
			        // $e->getMessage();
			    }
		} else {
			// File parameter is missing
			return "Error! No file was uploaded!";
		}
	}
	
	/* Get Single Reward */
	function rewards($id){
		global $con;
		$response = array();
		$response_all = array();
		
		$id = mysqli_real_escape_string($con,$id);
		
		$query_offer = "SELECT * FROM rewards WHERE reward_id = '$id'";
		$selectOffer = mysqli_query($con,$query_offer);
			
			if(mysqli_num_rows($selectOffer) > 0){
				while($row = mysqli_fetch_assoc($selectOffer)){
					$response["category_id"] = $row['category_id'];
					$response["redeem"] = $row['title'];
					$response["details"] = $row['message'];
					$response["redeem_points"] = $row['redeem_points'];
					$response["redeem_image"] = $row['redeem_image'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;
	}
	
	function product_analysis($user_id,$offer_id){
		global $con;
		
	}
	
	function searchUser($search){
		global $con;
		$response = array();
		$response_all = array();
		
			$search = mysqli_real_escape_string($con,$search);
			$search = (int)$search;
			
			$query = "SELECT * FROM `users` WHERE `mobile` LIKE '%$search' LIMIT 1";
			$selectUser = mysqli_query($con,$query);
			
			if(mysqli_num_rows($selectUser) > 0){
				while($row = mysqli_fetch_assoc($selectUser)){
					$response["id"] = $row['id'];
					$response["username"] = $row['user_name'];
					$response["email"] = $row['email'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;	
	}
	
	
	function userPoints($type,$id,$business_id,$shop_id,$offer_id,$points,$quantity){
		global $con;
		
		$id = mysqli_real_escape_string($con,$id);
		$shop_id = mysqli_real_escape_string($con,$shop_id);
		$offer_id = mysqli_real_escape_string($con,$offer_id);
		$business_id = mysqli_real_escape_string($con,$business_id);
		$points = mysqli_real_escape_string($con,$points);		
		$quantity = mysqli_real_escape_string($con,$quantity);
		
		$date = gmdate('Y-m-d H:i:s',time()+10800);
		
		$business_name = null;
		
		$current_points;
		$firebase_id;
		$name;
				
		$query_business = "SELECT business_name FROM business WHERE business_id='$business_id' ";
		$selectBusiness = mysqli_query($con,$query_business);
		while($rowPoints = mysqli_fetch_assoc($selectBusiness)){
				$business_name = $rowPoints['business_name'];
			}
			
		$query_user = "SELECT firebase_id,user_name FROM users WHERE id='$id'";
		$selectUser = mysqli_query($con,$query_user);
		while($rowPoints = mysqli_fetch_assoc($selectUser)){
				$firebase_id = $rowPoints['firebase_id'];
				$name = $rowPoints['user_name'];
			}
			
		$query_points  ="SELECT points FROM user_business ub JOIN users u ON ub.user_id=u.id WHERE business_id='$business_id ' AND user_id='$id'  ";		
		$query_user_business = "INSERT INTO `user_business` (`user_id`, `business_id`, `date_added`) VALUES ( '$id', '$business_id', '$date')";
			
		$selectPoints = mysqli_query($con,$query_points);
		if(mysqli_num_rows($selectPoints) > 0){
			while($rowPoints = mysqli_fetch_assoc($selectPoints)){
				$current_points = $rowPoints['points'];				
			}
		}else{
			$insertUserBusiness  = mysqli_query($con,$query_user_business);
			$current_points = 0;
		}	
		

		$insertPoints;
		$updatePoints;
		$updateFavourite;
		$reward_count = 0;
		$redeem_count = 0;
		$award_count = 0;
                $check = 0;
				
		if($type=="redeem"){

			$query_check = "SELECT offer_id FROM offers WHERE offer_id = '$offer_id' AND business_id='$business_id' ";
			$selectCheck = mysqli_query($con,$query_check);
				while($rowPoints = mysqli_fetch_assoc($selectCheck)){
                                        $check = $rowPoints['offer_id'];
				}
			if($check<=0){
					return "Sorry, offer not available for redeeming under this account";
				}

			$query_reward = "SELECT offer_id,rewards FROM offers WHERE offer_id = '$offer_id' AND rewards>0  ";
			$selectReward = mysqli_query($con,$query_reward);
				while($rowPoints = mysqli_fetch_assoc($selectReward)){
					$reward_count = $rowPoints['rewards'];
				}
			$query_redeem_count = "SELECT SUM(quantity) AS total_rewards FROM `redeem_points` WHERE `offer_id`='$offer_id' ";
			$selectCount = mysqli_query($con,$query_redeem_count);
			while($rowRewards = mysqli_fetch_assoc($selectCount)){
				$redeem_count = $rowRewards['total_rewards'];
			}
			
			$query_award_count = "SELECT SUM(quantity) AS total_rewards FROM `loyalty_points` WHERE `offer_id`='$offer_id' ";
			$selectAwardCount = mysqli_query($con,$query_award_count);
			while($rowAwards = mysqli_fetch_assoc($selectAwardCount)){
				$award_count = $rowAwards['total_rewards'];
			}
			$total_count = $redeem_count + $award_count;
			
			if(($offer_id!==null)&&($reward_count>0)&&($total_count>=$reward_count)){
				$update_offer = "UPDATE `offers` SET isActive='0' WHERE `offer_id`='$offer_id' ";
				$updateStatus = mysqli_query($con,$update_offer);
				return "Sorry, no offers available fot redeeming";
			}
				
			
			if($current_points>$points){
				$current_points -=  $points;
				$query_update_points = "UPDATE `user_business` SET `points`='$current_points' WHERE business_id='$business_id ' AND user_id='$id'";
				
				$query_redeem  = "INSERT INTO `redeem_points` (`business_id`, `shop_id`, `offer_id`, `user_id`, `points_redeemed` ,`quantity`, `date_added`) VALUES ('$business_id', '$shop_id', '$offer_id', '$id', '$points', '$quantity', '$date')";
				$updatePoints = mysqli_query($con,$query_update_points);
				$insertPoints = mysqli_query($con,$query_redeem);
				
					if($insertPoints){
						$last_id = mysqli_insert_id($con);				
						$title = 'Redeemed Points:'.$business_name;
						$message = 'You have redeemed '.$points.' points from '.$business_name;
						$filepath = '';
						$payload = array();
						$payload['id'] = $last_id;
						$payload['points'] = $points;
						$payload['business_points'] = $current_points;
						$payload['push_type'] = "redeem";
						
						$payload['category'] = '0';
						$payload['expire_date'] = '0';
						$payload['timestamp'] = gmdate('Y-m-d H:i:s',time()+10800);;
						
						$payload['monday'] = '0';
						$payload['tuesday'] = '0';
						$payload['wednesday'] = '0';
						$payload['thursday'] = '0';
						$payload['friday'] = '0';
						$payload['saturday'] = '0';
						$payload['sunday'] = '0';
						
						//offer specific
						//$payload['total_redeem'] = $total_count;
						$payload['price'] = '0';
						$payload['discount'] = '0';
						$payload['total_count'] = $total_count;
						
						//Event specific
						$payload['location'] = '';
						$payload['time'] = '';
						$payload['lat'] = '0';
						$payload['lng'] = '0';
						
						//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
						
						return $name.": Successfully Redeemed ".$points." Points";
					}else{
						return "Sorry,Unable to Redeem points";
					}
			}else{
				return "Sorry, Insufficient points";
			}
		}elseif($type=="redeem_reward"){
						
			
			if($current_points>$points){
				$current_points -=  $points;
				$query_update_points = "UPDATE `user_business` SET `points`='$current_points' WHERE business_id='$business_id ' AND user_id='$id'";
				
				$query_redeem  = "INSERT INTO `redeem_points` (`business_id`, `shop_id`, `offer_id`, `user_id`, `points_redeemed`, `quantity`, `isReward`, `date_added`) VALUES ('$business_id', '$shop_id', '$offer_id', '$id', '$points', '$quantity' , '1', '$date')";
				$updatePoints = mysqli_query($con,$query_update_points);
				$insertPoints = mysqli_query($con,$query_redeem);
				
					if($insertPoints){
						$last_id = mysqli_insert_id($con);				
						$title = 'Redeemed Points:'.$business_name;
						$message = 'You have redeemed '.$points.' points from '.$business_name;
						$filepath = '';
						$payload = array();
						$payload['id'] = $last_id;
						$payload['points'] = $points;
						$payload['business_points'] = $current_points;
						$payload['push_type'] = "redeem";
						
						$payload['category'] = '0';
						$payload['expire_date'] = '0';
						$payload['timestamp'] = gmdate('Y-m-d H:i:s',time()+10800);;
						
						$payload['monday'] = '0';
						$payload['tuesday'] = '0';
						$payload['wednesday'] = '0';
						$payload['thursday'] = '0';
						$payload['friday'] = '0';
						$payload['saturday'] = '0';
						$payload['sunday'] = '0';
						
						//offer specific
						$payload['price'] = '0';
						$payload['discount'] = '0';
						
						//Event specific
						$payload['location'] = '';
						$payload['time'] = '';
						$payload['lat'] = '0';
						$payload['lng'] = '0';
						
						//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
						
						return $name.": Successfully Redeemed ".$points." Points";
					}else{
						return "Sorry,Unable to Redeem points";
					}
			}else{
				return "Sorry, Insufficient points";
			}
		}elseif($type=="award"){

		        $query_check = "SELECT offer_id FROM offers WHERE offer_id = '$offer_id' AND business_id='$business_id' ";
			$selectCheck = mysqli_query($con,$query_check);
				while($rowPoints = mysqli_fetch_assoc($selectCheck)){
                                        $check = $rowPoints['offer_id'];
				}
			if($check<0){
					return "Sorry, offer not available for awarding under this account";
				}

			$query_reward = "SELECT offer_id,rewards FROM offers WHERE offer_id = '$offer_id' AND rewards>0  ";
			$selectReward = mysqli_query($con,$query_reward);
				while($rowPoints = mysqli_fetch_assoc($selectReward)){
					$reward_count = $rowPoints['rewards'];
					}
			$query_redeem_count = "SELECT SUM(quantity) AS total_rewards FROM `redeem_points` WHERE `offer_id`='$offer_id' ";
			$selectCount = mysqli_query($con,$query_redeem_count);
			while($rowRewards = mysqli_fetch_assoc($selectCount)){
				$redeem_count = $rowRewards['total_rewards'];
			}
			
			$query_award_count = "SELECT SUM(quantity) AS total_rewards FROM `loyalty_points` WHERE `offer_id`='$offer_id' ";
			$selectAwardCount = mysqli_query($con,$query_award_count);
			while($rowAwards = mysqli_fetch_assoc($selectAwardCount)){
				$award_count = $rowAwards['total_rewards'];
			}
			$total_count = $redeem_count + $award_count;
			
			if(($offer_id!==null)&&($reward_count>0)&&($total_count>=$reward_count)){
				$update_offer = "UPDATE `offers` SET isActive='0' WHERE `offer_id`='$offer_id' ";
				$updateStatus = mysqli_query($con,$update_offer);
				return "Sorry, no offers available to award";
			}
			
			if($points!=0){
				$points = $points/10;
			}	
			$current_points += $points;
			$query_update_points = "UPDATE `user_business` SET `points`='$current_points' WHERE business_id='$business_id ' AND user_id='$id'";	
			
			$query_loyalty = "INSERT INTO `loyalty_points` (`business_id`,  `shop_id`, `offer_id`,`user_id`, `points_awarded` , `quantity`, `date_added`) VALUES ('$business_id','$shop_id','$offer_id', '$id', '$points', '$quantity', '$date')";
			$insertPoints = mysqli_query($con,$query_loyalty);
			$updatePoints = mysqli_query($con,$query_update_points);
				if($insertPoints){
					$last_id = mysqli_insert_id($con);
										
			
					$title = 'Awarded Points: '.$business_name;
					$message = 'You have been awarded '.$points.' points by '.$business_name;
					$filepath = '';
					$payload = array();
					$payload['id'] = $last_id;
					$payload['points'] = $points;
					$payload['business_points'] = $current_points;
					$payload['push_type'] = "award";
					
					$payload['category'] = '0';
					$payload['expire_date'] = '0';
					$payload['timestamp'] = gmdate('Y-m-d H:i:s',time()+10800);;
					
					$payload['monday'] = '0';
					$payload['tuesday'] = '0';
					$payload['wednesday'] = '0';
					$payload['thursday'] = '0';
					$payload['friday'] = '0';
					$payload['saturday'] = '0';
					$payload['sunday'] = '0';
					
					//offer specific
					$payload['total_count'] = $total_count;
					$payload['price'] = '0';
					$payload['discount'] = '0';
					
					//Event specific
					$payload['location'] = '';
					$payload['time'] = '';
					$payload['lat'] = '0';
					$payload['lng'] = '0';
					
					//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
										
					return $name.": Successfully Awarded ".$points." Points";
				}else{
					return "Sorry,Unable to Award points";
				}
		}elseif($type=="reward"){
			if($points!=0){
				$points = $points/10;
			}	
			$current_points += $points;
			$query_update_points = "UPDATE `user_business` SET `points`='$current_points' WHERE business_id='$business_id ' AND user_id='$id'";	
			
			$query_loyalty = "INSERT INTO `user_reward` (`business_id`,`shop_id`,`user_id`,`points`,`date_added`) VALUES ('$business_id','$shop_id', '$id', '$points', '$date')";
			$insertPoints = mysqli_query($con,$query_loyalty);
			$updatePoints = mysqli_query($con,$query_update_points);
				if($insertPoints){
					$last_id = mysqli_insert_id($con);
										
			
					$title = 'Rewarded Points: '.$business_name;
					$message = 'You have been rewarded '.$points.' points by '.$business_name;
					$filepath = '';
					$payload = array();
					$payload['id'] = $last_id;
					$payload['points'] = $points;
					$payload['business_points'] = $current_points;
					$payload['push_type'] = "reward";
					
					$payload['category'] = '0';
					$payload['expire_date'] = '0';
					$payload['timestamp'] = gmdate('Y-m-d H:i:s',time()+10800);;
					
					$payload['monday'] = '0';
					$payload['tuesday'] = '0';
					$payload['wednesday'] = '0';
					$payload['thursday'] = '0';
					$payload['friday'] = '0';
					$payload['saturday'] = '0';
					$payload['sunday'] = '0';
					
					//offer specific
					$payload['price'] = '0';
					$payload['discount'] = '0';
					
					//Event specific
					$payload['location'] = '';
					$payload['time'] = '';
					$payload['lat'] = '0';
					$payload['lng'] = '0';
					
					//firebase_push($shop_id,$business_id,$firebase_id,$title,$message,$filepath,$payload);
										
					return $name.": Successfully Rewarded ".$points." Points";
				}else{
					return "Sorry,Unable to Reward points";
				}
		}elseif($type=="favourite"){
			
			$query_update_favourite = "UPDATE `user_business` SET `isFavourite`='$points' WHERE business_id='$business_id ' AND user_id='$id'";
			$updateFavourite = mysqli_query($con,$query_update_favourite);
			if($updateFavourite){
				return $points;
			}
		}elseif($type=="check"){
			
			return $current_points;
		}
		
	}
	
	function firebase_push($branch_id,$business_id,$firebase_id,$title,$message,$filepath,$payload_data){
		$firebase = new Firebase();
		$push = new Push();
		
		// optional payload
		$payload = array();
		//Refers to points redeemed - 1,points awarded on offer- 2, points for a given offer - 3 , charges for an event - 4
		$payload['id'] = $payload_data['id'];
		$payload['points'] = $payload_data['points'];	//
		$payload['push_type'] = $payload_data['push_type'];
		$payload['business_id'] = $business_id;
		$payload['branch_id'] = $branch_id;
		$payload['business_points'] = $payload_data['business_points'];
		$payload['timestamp'] = 0;
		$payload['total_count'] = "0";
		
		
		if(isset($payload_data['total_count'])){
			$payload['total_count'] = $payload_data['total_count'];
		}
		if(isset($payload_data['expire_date'])){
			$payload['expire_date'] = $payload_data['expire_date'];
		}
		
		if(isset($payload_data['category'])){
			$payload['category'] = $payload_data['category'];
		}
		
		if(isset($payload_data['timestamp'])){
			$payload['timestamp'] = $payload_data['timestamp'];
		}
		
		if(isset($payload_data['monday'])){
			$payload['monday'] = $payload_data['monday'];
			$payload['tuesday'] = $payload_data['tuesday'];
			$payload['wednesday'] = $payload_data['wednesday'];
			$payload['thursday'] = $payload_data['thursday'];
			$payload['friday'] = $payload_data['friday'];
			$payload['saturday'] = $payload_data['saturday'];
			$payload['sunday'] = $payload_data['sunday'];
		}
		
		//offer specific
		$payload['price'] = $payload_data['price'];
		$payload['discount'] = $payload_data['discount'];
		
		//Event specific
		$payload['location'] = $payload_data['location'];
		$payload['time'] = $payload_data['time'];
		$payload['lat'] = $payload_data['lat'];
		$payload['lng'] = $payload_data['lng'];
		
        
        // push type - single user / topic
        $push_type = "individual";
        
        $push->setTitle($title);
        $push->setMessage($message);
		$push->setImage($filepath);
		
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);

        $json = '';
        $response = '';
   
		$json = $push->getPush();
		if(strlen($firebase_id) > 15){
			$response = $firebase->send($firebase_id, $json);   
		}else{
			$response = $firebase->sendToTopic('global', $json);
		}		
		
	}
		
	function updateFCM($mobile,$fcmID){
		global $con;
		$response = array();
		$response_all = array();
		
			$mobile = mysqli_real_escape_string($con,$mobile);
			$fcmID = mysqli_real_escape_string($con,$fcmID);
			
			$query = "UPDATE `users` SET `firebase_id`='$fcmID' WHERE `mobile` = '$mobile' LIMIT 1";
			$updateUser = mysqli_query($con,$query);
			
			if($updateUser){
				return 1;
			}else{
				return 0;
			}
		return null;	
	}
	
	function counting($table,$clause){
		global $con;
				
		$query = "SELECT * FROM $table $clause";
		$info_count = mysqli_query($con,$query);
		$query_count = mysqli_num_rows($info_count);
		
		return $query_count;
	}
	
	function timeline($con,$clause){
				
		$post_query = "SELECT SUM(points_redeemed) AS redeem_points, SUM(points_awarded) AS awarded_points, DATE_FORMAT((redeem_points.date_added),'%Y %b, %d') AS timeline 			FROM `redeem_points` 
								JOIN loyalty_points ON redeem_points.business_id=loyalty_points.business_id 
									$clause
									GROUP BY timeline";
		$select_post = mysqli_query($con,$post_query);
		$postCount = mysqli_num_rows($select_post);
		
		if($postCount>0){
			
				while ($row = mysqli_fetch_assoc($select_post)){		
				$date = $row['timeline'];		
				$redeem = $row['redeem_points'];
				$award = $row['awarded_points'];
					echo "['".$date."',".$award.",".$redeem."],\n";	
				}
			}	
		
	}
	
	function redeem_award_graph($con){
				
		$post_query = "SELECT SUM(points_redeemed) AS redeem_points, SUM(points_awarded) AS awarded_points,business_name 
							FROM `redeem_points` 
								JOIN business ON business.business_id=redeem_points.business_id 
								JOIN loyalty_points ON redeem_points.business_id=loyalty_points.business_id 
									GROUP BY business.business_id";
		$select_post = mysqli_query($con,$post_query);
		$postCount = mysqli_num_rows($select_post);
		
		if($postCount>0){
			
				while ($row = mysqli_fetch_assoc($select_post)){		
				$business = $row['business_name'];		
				$redeem = $row['redeem_points'];
				$award = $row['awarded_points'];
					echo "['".$business."',".$award.",".$redeem."],\n";	
				}
			}	
		
	}
	
	
	function addShop($con,$business_id,$shop_id){
		$shopname = mysqli_real_escape_string($con,$_POST['shop_name']);
		$hours = mysqli_real_escape_string($con,$_POST['shop_hours']);
		$location = mysqli_real_escape_string($con,$_POST['shop_location']);
		$description = mysqli_real_escape_string($con,$_POST['description']);
		$lat = mysqli_real_escape_string($con,$_POST['lat']);
		$lng = mysqli_real_escape_string($con,$_POST['lng']);
		$date = gmdate('Y-m-d H:i:s',time()+10800);
		
		if($shop_id==0){
			$query = "INSERT INTO `shops` (`shop_business_id`, `shop_name`, `shop_location` ,`shop_description`, `shop_hours`, `shop_lat`, `shop_lng`, `date_added`) VALUES ('$business_id', '$shopname', '$location','$description', '$hours', '$lat', '$lng', '$date')";			
		}else{
			$query = "UPDATE `shops` SET `shop_name`='$shopname',
			`shop_location`='$location',`shop_description`='$description',`shop_hours`='$hours',`shop_lat`='$lat',`shop_lng`='$lng'
				WHERE shop_id='$shop_id'";
		}
		$result = mysqli_query($con, $query);
		
		if($result){
			if($shop_id==0){
				//Business uploaded successfully!	
				return "Branch Successfully Added";
			}else{
				return "Branch was Updated Successfully!!";
			}													
		}	
	}
	
	
	/* Get Single Shop */
	function shop($con,$id){
		
		$response = array();
		$response_all = array();
		
		$id = mysqli_real_escape_string($con,$id);
		
		$query_shop = "SELECT * FROM shops WHERE shop_id = '$id'";
		$selectShop = mysqli_query($con,$query_shop);
			
			if(mysqli_num_rows($selectShop) > 0){
				while($row = mysqli_fetch_assoc($selectShop)){
					$response["shop_name"] = $row['shop_name'];
					$response["shop_location"] = $row['shop_location'];
					$response["shop_description"] = $row['shop_description'];
					$response["shop_hours"] = $row['shop_hours'];
					$response["lat"] = $row['shop_lat'];
					$response["lng"] = $row['shop_lng'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;
	}
	
	
	function cashier($con,$id){
		
		$response = array();
		$response_all = array();
		
		$id = mysqli_real_escape_string($con,$id);
		
		$query_cashier = "SELECT * FROM cashier WHERE cashier_id = '$id'";
		$selectCashier = mysqli_query($con,$query_cashier);
			
			if(mysqli_num_rows($selectCashier) > 0){
				while($row = mysqli_fetch_assoc($selectCashier)){
					$response["first_name"] = $row['first_name'];
					$response["last_name"] = $row['last_name'];
					$response["cashier_email"] = $row['cashier_email'];
					$response["branch"] = $row['shop_id'];
					array_push($response_all, $response);
				}				
				return $response_all;
			}else{
				return 0;
			}
		return null;
	}
	
	function statusBranch($con,$business_id,$branch_id,$status){
		$query = "UPDATE `shops` SET `isActive`='$status' WHERE shop_business_id='$business_id' AND shop_id='$branch_id'";
		$result = mysqli_query($con, $query);
		
		if($result){
			return "Branch Status was Updated Successfully!!";												
		}
	}
	
	function statusCashier($con,$business_id,$cashier_id,$status){
		$query = "UPDATE `cashier` SET `isActive`='$status' WHERE business_id='$business_id' AND cashier_id='$cashier_id'";
		$result = mysqli_query($con, $query);
		
		if($result){
			return "Cashier Status was Updated Successfully!!";												
		}
	}

function addSMSBalance($con){
		$query = "UPDATE `business` SET `sms_balance`='".$_POST['sms']."' WHERE business_id='".$_POST['business']."' ";
		$result = mysqli_query($con, $query);
		
		if($result){
			return "SMS Balance Updated Successfully! ".$_POST['sms']." topped up";												
		}
	}