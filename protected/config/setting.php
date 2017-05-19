<?php
return array(
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'bpad_diy@yahoo.com',
		'primaryLang' => 'id',
		'translateLangs' => array(
			'en_us' => 'en_us',
			'id' => 'id',
		),
		
		// timthumb replace url
		'timthumb_url_replace' => 0,		
		'timthumb_url_replace_website' => 'http://bpad.jogjaprov.go.id',	//default http
		// access system *from product
		'product_access_system' => 'bpad.jogjaprov.go.id/coe',
	
		// debug parameter
		'debug' => array(
			'send_email' => array(
				'status' => true,								// boolean
				'content' => 'file_put_contents',				// file_put_contents, send_email
				'email'	=> 'putra.sudaryanto@gmail.com',
			),
		),
		
		'Analytics' => array(
			'gserviceaccount'		=> 'ga-coe@bpadjogja-ga-20170512.iam.gserviceaccount.com',
			'gservicecertificate'	=> 'bpadjogja-ga-20170512-31dcdf722eea.p12',
		),
		
		'server_options' => array(
			'localhost'=> array(
				//production
				'http://192.168.30.100',		//localhost (network)
				'http://localhost',				//localhost
				'http://127.0.0.1',				//localhost
				//development
				'http://192.168.3.13',			//localhost (ommu network)				
			),
			'bpad'=> array(
				//production
				'http://bpadjogja.info',		//live
				'http://103.255.15.100',		//ip static
				'http://192.168.30.100',		//localhost (network)
				'http://localhost',				//localhost
				'http://127.0.0.1',				//localhost
				//development
				'http://192.168.3.13',			//localhost (ommu network)				
			),
		),
		'oauth_server_options' => array(
			//'http://ommu.co',
			//'https://ommu.co',
			'http://localhost/_product_ommu.co',
		),
		'sso_server_options' => array(
			//'http://103.255.15.77/sso',
			'http://localhost',
			'http://192.168.3.13',
		),
		'inlis_address' => 'http://103.255.15.77',
		'inlis_sso_address' => 'http://103.255.15.77/sso',
		'Mikrotik' => array(
			'address' => '192.168.3.254',
			'port'    => '8728',
			'username' => 'wishnu',
			'password' => 'Vicko#21',
		),
	),
);
?>