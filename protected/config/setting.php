<?php
/**
 * Basic parameters information
 *
 * Modules:
 *	params
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/Core
 * @contact (+62)856-299-4114
 *
 */
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
			'status'=>false,
			'oauth'=> array(
				//production
				'default_host' => 'http://bpad.jogjaprov.go.id',
				'bpad.jogjaprov.go.id' => 'http://bpad.jogjaprov.go.id',
				'103.255.15.100' => 'http://bpad.jogjaprov.go.id',
				'192.168.30.100' => 'http://192.168.30.100/bpadportal',
				'localhost' => 'http://192.168.30.100/bpadportal',
				'127.0.0.1' => 'http://192.168.30.100/bpadportal',
				//development
				'http://192.168.3.13',			//localhost (ommu network)	
			),
			'bpad'=> array(
				//production
				'default_host' => 'http://bpad.jogjaprov.go.id',
				'bpad.jogjaprov.go.id' => 'http://bpad.jogjaprov.go.id',
				'103.255.15.100' => 'http://bpad.jogjaprov.go.id',
				'192.168.30.100' => 'http://192.168.30.100/bpadportal',
				'localhost' => 'http://192.168.30.100/bpadportal',
				'127.0.0.1' => 'http://192.168.30.100/bpadportal',
				//development
				'http://192.168.3.13',			//localhost (ommu network)	
			),
		),
	),
);
?>