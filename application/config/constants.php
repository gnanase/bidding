<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
define('SITE_NAME', 'Bidding');
define('INVALID_CREDENTIALS', 'Invalid credentials');
define('PRODUCT_IMAGE_PATH', 'uploads/products/');
define('PROJECT_PATH', '/home/innoppl/public_html/bidding/');
define('ACCOUNT_DEACTIVE', 'Your account has been deactivated');
//user management
define('USER_EMAIL_ALREADY_EXIST','Email already exist');
define('INVALID_EMAIL', 'Invalid mail id');
define('USERS_CREATED_SUS', 'User has been create successfully');
define('USERS_UPDATED_SUS', 'User has been updated successfully');
define('USER_DELETE_SUS', 'User has been deleted successfully');
//product management
define('IMG_REQUIRED', 'Image field is Required');
define('PRODUCT_CODE_ALREADY_EXIST', 'Product code already exist');
define('PRODUCT_ADDED_SUS', 'Product has been Added successfully');
define('PRODUCT_UPDATED_SUS', 'Product has been updated successfully');
define('PRODUCT_DELETE_SUS', 'Product has been deleted successfully');
define('PRODUCT_DELETE_UNSUS', 'Unfourtunatly product could not be delete');