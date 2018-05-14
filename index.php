<?php
#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AIzaSyAHWIJSJoaNf0weWbct5_QkfokFYwD7lxk' );
    $registrationIds = 'f4F0xYnWgv8:APA91bEuYFdNPndGEvGWoJaRbTSXb7GWOx2wc5vomerMwqZ5FI-DXOaNBSr-jkgf6ZDlmp4X6rG1lskjNhz8wd1Pee3Ahr4hezz-7Z8CsKuDIpkUUMe54AMDVhPM-Lm_Zjk-stiqWfrM';
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Your child in danger',
		'title'	=> 'Panic Alert ',
        'click_action' => 'com.pappayaed.TARGET_NOTIFICATION',
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );

     $data = array
          (
		'student_name' 	=> 'Hello ,Test',
		'lat'	=> 53.558,
             	'lng'	=> 9.927
          );

     //$message=array(
     
       //   'notification'	=> $msg,
        //                        'data'	=> $data
     //);
      
	$fields = array
			(
				'to'		=> $registrationIds,
			//	'notification'	=> $msg,
                                'data'	=> $data
			//	'message'   =>$message
       
			);
            
            $myJSON = json_encode($fields);

            echo 	$myJSON;
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
echo $result;
