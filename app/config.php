<?php

define('APPROOT', dirname(__FILE__,1));
define("APP","fn");
define('URLROOT', 'http://localhost/fn');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','fn');
define("TOKEN_EXPIRE",60);

define("STUDENT",0);
define("STAFF",1);
define("ADMIN",2);

define("UPLOAD_FILE_SIZE",200);
define("UPLOAD_FILE_PATH",'uploads/');
define("UPLOAD_RATIONALE_PATH",'test_rationale/');

define('EMAIL', 'admin@foreignnurseglobal.com');
// define('EMAIL', 'dev.sambenny@gmail.com');
define('NUMBER', '+234(0) 703 282 5450');
define('NUMBER_', '+2347032825450');

define('INFO_MAIL', 'info@foreignnurseglobal.com');
define('MAIL_USER', 'info@foreignnurseglobal.com');
define('MAIL_PASSWORD', 'Joyinyang1993.');
define('INFO_LOCATION', '');

define('DOMAIN', 'http://localhost');

define("STUDENT_COUNSELLOR_NAME","JOY WILLIAMS");
define("STUDENT_COUNSELLOR_EMAIL","admin@foreignnurseglobal.com");
define("STUDENT_COUNSELLOR_WHATSAPP","+234(0) 703 282 5450");

define("CLASSESS",[
    "fresher"=>"FRESHER CLASS",
    "foundation"=>"FOUNDATION CLASS",
    "mastery"=>"MASTERY CLASS",
    "ready"=>"READY TO TEST CLASS",
]);