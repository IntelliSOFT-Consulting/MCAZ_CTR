<?php
 

require 'web_functions.php';
require 'Slim/Slim.php';
 
\Slim\Slim::registerAutoloader();
 
$app = new \Slim\Slim();
 
// Login / Request SMS
$app->post('/user/login', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('name', 'email','mobile'));
 
    // reading post params
    $name = $app->request->post('name');
    $email = $app->request->post('email');
	$mobile = $app->request->post('mobile');
 
    // validating email address
    validateEmail($email);
	
	//Randomly generate OTP
	$otp = rand(100000, 999999);
	
    $res = createUser($name, $email, $mobile, $otp);
	
		if ($res == USER_CREATED_SUCCESSFULLY) {
			 
			// send sms
			sendSms($mobile,$otp);
            mail_welcome_client($name,$email,$otp);
			 
			$response["error"] = false;
			$response["message"] = "SMS request is initiated! You will be receiving it shortly.";
		} else if ($res == USER_CREATE_FAILED) {
			$response["error"] = true;
			$response["message"] = "Sorry! Error occurred in registration.";
		} else if ($res == USER_ALREADY_EXISTED) {
			$response["error"] = true;
			$response["message"] = "Mobile number already existed!";
		}
 
    // echo json response
    echoRespnse(200, $response);
});
 
/* * *
 * Updating user
 *  we use this url to update user's fcm registration id
 */
$app->post('/user/:id', function($user_id) use ($app) {
    global $app;
 
    verifyRequiredParams(array('firebase_id'));
 
    $firebase_id = $app->request->put('firebase_id');

	$response = updateFcmID($user_id, $firebase_id);
 
    echoRespnse(200, $response);
});
 
/* * *
 * fetching all offers
 */
$app->get('/offers', function() {
    $response = array();
 
    // fetching all offers
    $response = getAllOffers();
 
     
    echoRespnse(200, $response);
});
 
/* * *
 * fetching all redeemable offers
 */
$app->get('/rewards', function() {
    $response = array();
 
    // fetching all redeemable offers
    $response = getAllRewards();
 
     
    echoRespnse(200, $response);
}); 
 
 /* * *
 * fetching all businesses
 */
$app->get('/business', function() {
    $response = array();
 
    // fetching all businesses
    $response = getAllBusiness();
 
     
    echoRespnse(200, $response);
});


 /* * *
 * fetching all branches
 */
$app->get('/branch', function() {
    $response = array();
 
    // fetching all businesses
    $response = getAllBranch();
 
     
    echoRespnse(200, $response);
});

 
 /* * *
 * fetching all events
 */
$app->get('/events', function() {
    $response = array();
 
    // fetching all events
    $response = getAllEvents();
 
     
    echoRespnse(200, $response);
});

 /* * *
 * fetching all history
 */
$app->post('/history', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('mobile'));
	// reading post params
    $mobile = $app->request->post('mobile');
	$user_id = isUserID($mobile);
 
    // fetching all history
    $response = getAllHistory($user_id);
 
     
    echoRespnse(200, $response);
});

 /* * *
 * fetching all history for cashier
 */
$app->post('/merchant_history', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('business_id','shop_id'));
	// reading post params
	$business_id = $app->request->post('business_id');
    $shop_id = $app->request->post('shop_id');
 
    // fetching all history
    $response = getShopHistory($business_id,$shop_id);
     
    echoRespnse(200, $response);
});

 /* * *
 * fetching all user business
 */
$app->post('/user_business', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('mobile'));
	// reading post params
    $mobile = $app->request->post('mobile');
	$user_id = isUserID($mobile);
 
    // fetching all user business
    $response = getUserBusiness($user_id);
 
     
    echoRespnse(200, $response);
});

// Posting favourite
$app->post('/favourite', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('mobile','status','business_id'));
 
    // reading post params
    $mobile = $app->request->post('mobile');
	$status = $app->request->post('status');
    $business_id = $app->request->post('business_id');
	
	$user_id = isUserID($mobile);
	
    $res = userPoints("favourite",$user_id,$business_id,"0","0",$status,"0");
	$response["error"] = false;
	
	if($res==1){
		$response["message"] = "Business added to favourite!";
	}else if ($res==0){
		$response["message"] = "Business removed from favourite!";
	}else{
		$response["error"] = true;
		$response["message"] = "There was an error changing the status!";	
	}
	 
    // echo json response
    echoRespnse(200, $response);
});

// Posting product views
$app->post('/product_view', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('user_id', 'offer_id'));
 
    // reading post params
    $user_id = $app->request->post('user_id');
    $offer_id = $app->request->post('offer_id');
	
	$response["error"] = false;
	
	if($res==1){
		$response["message"] = "Business added to favourite!";
	}else if ($res==0){
		$response["message"] = "Business removed from favourite!";
	}else{
		$response["error"] = true;
		$response["message"] = "There was an error changing the status!";
		
	}
	 
    // echo json response
    echoRespnse(200, $response);
});

// Update FCM
$app->post('/update_fcm', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('mobile', 'fcmID'));
 
    // reading post params
    $mobile = $app->request->post('mobile');
    $fcmID = $app->request->post('fcmID');
	
    $res = updateFCM($mobile,$fcmID);
	$response["error"] = false;
	
	if($res==1){
		$response["message"] = "FCM updated!";
	}else if ($res==0){
		$response["message"] = "FCM was not updated!";
	}else{
		$response["error"] = true;
		$response["message"] = "There was an error changing the FCM!";		
	}
	 
    // echo json response
    echoRespnse(200, $response);
});

// Award or Redeem Points
$app->post('/award_redeem', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('offer_id','business_id','mobile','push_type','amount'));
 
    	// reading post params
    	$mobile = $app->request->post('mobile');
    	$offer_id = $app->request->post('offer_id');
	$business_id = $app->request->post('business_id');
	$push_type = $app->request->post('push_type');
	$points = $app->request->post('amount');
	$quantity = $app->request->post('quantity');
	$shop_id = 0;
	
	$check_user = searchUser($mobile);
				
		if($check_user!=0){			
			$id_user = $check_user[0]['id'];
			// userPoints($type,$id,$business_id,$shop_id,$offer_id,$points,$quantity)
			$response["error"] = false;
			$response["message"] = userPoints($push_type,$id_user,$business_id,$shop_id,$offer_id,$points,$quantity);
			$response["name"] = substr($response["message"], 0, strpos($response["message"], ':'));
			if ($response["name"]==null) {
				$response["error"] = true;
			}
	
		}else{
			$response["error"] = true;
			$response["message"] = "The user does not exist in the system.";	
		}
	
    
	 
    // echo json response
    echoRespnse(200, $response);
});

// Merchant Login
$app->post('/merchant_login', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('email','password'));
 
    // reading post params
    $email = $app->request->post('email');
    $password = $app->request->post('password');
	
	$check_login = login($email,$password);
				
		if($check_login==1){					
			$response["error"] = false;
			$response["business_id"] = $_SESSION["business_id"];
			$response["shop_id"] = $_SESSION["shop_id"];
			$response["user_id"] = $_SESSION["user_id"];
			$response["message"] = "Login Successful";
	
		}else{
			$response["error"] = true;
			$response["business_id"] = "0";
			$response["shop_id"] = "0";
			$response["user_id"] = "0";
			$response["message"] = "Invalid Email/Password.";	
		}
	
    // echo json response
    echoRespnse(200, $response);
});

/**
 * Messaging to a topic
 * Will send push notification using Topic Messaging
 *  */
$app->post('/chat_rooms/:id/message', function($chat_room_id) {
    global $app;
    $db = new DbHandler();
 
    verifyRequiredParams(array('user_id', 'message'));
 
    $user_id = $app->request->post('user_id');
    $message = $app->request->post('message');
 
    $response = $db->addMessage($user_id, $chat_room_id, $message);
 
    if ($response['error'] == false) {
        require_once __DIR__ . '/../libs/gcm/gcm.php';
        require_once __DIR__ . '/../libs/gcm/push.php';
        $gcm = new GCM();
        $push = new Push();
 
        // get the user using userid
        $user = $db->getUser($user_id);
 
        $data = array();
        $data['user'] = $user;
        $data['message'] = $response['message'];
        $data['chat_room_id'] = $chat_room_id;
 
        $push->setTitle("Google Cloud Messaging");
        $push->setIsBackground(FALSE);
        $push->setFlag(PUSH_FLAG_CHATROOM);
        $push->setData($data);
         
        // echo json_encode($push->getPush());exit;
 
        // sending push message to a topic
        $gcm->sendToTopic('topic_' . $chat_room_id, $push->getPush());
 
        $response['user'] = $user;
        $response['error'] = false;
    }
 
    echoRespnse(200, $response);
});
 
 
/**
 * Sending push notification to a single user
 * We use user's gcm registration id to send the message
 * * */
$app->post('/users/:id/message', function($to_user_id) {
    global $app;
    $db = new DbHandler();
 
    verifyRequiredParams(array('message'));
 
    $from_user_id = $app->request->post('user_id');
    $message = $app->request->post('message');
 
    $response = $db->addMessage($from_user_id, $to_user_id, $message);
 
    if ($response['error'] == false) {
        require_once __DIR__ . '/../libs/gcm/gcm.php';
        require_once __DIR__ . '/../libs/gcm/push.php';
        $gcm = new GCM();
        $push = new Push();
 
        $user = $db->getUser($to_user_id);
 
        $data = array();
        $data['user'] = $user;
        $data['message'] = $response['message'];
        $data['image'] = '';
 
        $push->setTitle("Google Cloud Messaging");
        $push->setIsBackground(FALSE);
        $push->setFlag(PUSH_FLAG_USER);
        $push->setData($data);
 
        // sending push message to single user
        $gcm->send($user['gcm_registration_id'], $push->getPush());
 
        $response['user'] = $user;
        $response['error'] = false;
    }
 
    echoRespnse(200, $response);
});
 
 
/**
 * Sending push notification to multiple users
 * We use gcm registration ids to send notification message
 * At max you can send message to 1000 recipients
 * * */
$app->post('/users/message', function() use ($app) {
 
    $response = array();
    verifyRequiredParams(array('user_id', 'to', 'message'));
 
    require_once __DIR__ . '/../libs/gcm/gcm.php';
    require_once __DIR__ . '/../libs/gcm/push.php';
 
    $db = new DbHandler();
 
    $user_id = $app->request->post('user_id');
    $to_user_ids = array_filter(explode(',', $app->request->post('to')));
    $message = $app->request->post('message');
 
    $user = $db->getUser($user_id);
    $users = $db->getUsers($to_user_ids);
 
    $registration_ids = array();
 
    // preparing gcm registration ids array
    foreach ($users as $u) {
        array_push($registration_ids, $u['gcm_registration_id']);
    }
 
    // insert messages in db
    // send push to multiple users
    $gcm = new GCM();
    $push = new Push();
 
    // creating tmp message, skipping database insertion
    $msg = array();
    $msg['message'] = $message;
    $msg['message_id'] = '';
    $msg['chat_room_id'] = '';
    $msg['created_at'] = date('Y-m-d G:i:s');
 
    $data = array();
    $data['user'] = $user;
    $data['message'] = $msg;
    $data['image'] = '';
 
    $push->setTitle("Google Cloud Messaging");
    $push->setIsBackground(FALSE);
    $push->setFlag(PUSH_FLAG_USER);
    $push->setData($data);
 
    // sending push message to multiple users
    $gcm->sendMultiple($registration_ids, $push->getPush());
 
    $response['error'] = false;
 
    echoRespnse(200, $response);
});
 
$app->post('/users/send_to_all', function() use ($app) {
 
    $response = array();
    verifyRequiredParams(array('user_id', 'message'));
 
    require_once __DIR__ . '/../libs/gcm/gcm.php';
    require_once __DIR__ . '/../libs/gcm/push.php';
 
    $db = new DbHandler();
 
    $user_id = $app->request->post('user_id');
    $message = $app->request->post('message');
 
    require_once __DIR__ . '/../libs/gcm/gcm.php';
    require_once __DIR__ . '/../libs/gcm/push.php';
    $gcm = new GCM();
    $push = new Push();
 
    // get the user using userid
    $user = $db->getUser($user_id);
     
    // creating tmp message, skipping database insertion
    $msg = array();
    $msg['message'] = $message;
    $msg['message_id'] = '';
    $msg['chat_room_id'] = '';
    $msg['created_at'] = date('Y-m-d G:i:s');
 
    $data = array();
    $data['user'] = $user;
    $data['message'] = $msg;
    $data['image'] = 'http://www.androidhive.info/wp-content/uploads/2016/01/Air-1.png';
 
    $push->setTitle("Google Cloud Messaging");
    $push->setIsBackground(FALSE);
    $push->setFlag(PUSH_FLAG_USER);
    $push->setData($data);
 
    // sending message to topic `global`
    // On the device every user should subscribe to `global` topic
    $gcm->sendToTopic('global', $push->getPush());
 
    $response['user'] = $user;
    $response['error'] = false;
 
    echoRespnse(200, $response);
});
 
/**
 * Fetching single chat room including all the chat messages
 *  */
$app->get('/chat_rooms/:id', function($chat_room_id) {
    global $app;
    $db = new DbHandler();
 
    $result = $db->getChatRoom($chat_room_id);
 
    $response["error"] = false;
    $response["messages"] = array();
    $response['chat_room'] = array();
 
    $i = 0;
    // looping through result and preparing tasks array
    while ($chat_room = $result->fetch_assoc()) {
        // adding chat room node
        if ($i == 0) {
            $tmp = array();
            $tmp["chat_room_id"] = $chat_room["chat_room_id"];
            $tmp["name"] = $chat_room["name"];
            $tmp["created_at"] = $chat_room["chat_room_created_at"];
            $response['chat_room'] = $tmp;
        }
 
        if ($chat_room['user_id'] != NULL) {
            // message node
            $cmt = array();
            $cmt["message"] = $chat_room["message"];
            $cmt["message_id"] = $chat_room["message_id"];
            $cmt["created_at"] = $chat_room["created_at"];
 
            // user node
            $user = array();
            $user['user_id'] = $chat_room['user_id'];
            $user['username'] = $chat_room['username'];
            $cmt['user'] = $user;
 
            array_push($response["messages"], $cmt);
        }
    }
 
    echoRespnse(200, $response);
});
 
/**
 * Verifying required params posted or not
 */
function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    // Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
 
    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echoRespnse(400, $response);
        $app->stop();
    }
}
 
/**
 * Validating email address
 */
function validateEmail($email) {
    $app = \Slim\Slim::getInstance();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        $response["message"] = 'Email address is not valid';
        echoRespnse(400, $response);
        $app->stop();
    }
}
 
function IsNullOrEmptyString($str) {
    return (!isset($str) || trim($str) === '');
}
 
/**
 * Echoing json response to client
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}
 
$app->run();
?>