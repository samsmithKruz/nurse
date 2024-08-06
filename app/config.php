<?php

define('APPROOT', dirname(__FILE__, 1));
define("APP", "fn");
define('URLROOT', 'http://localhost/fn');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fn');
define("TOKEN_EXPIRE", 60);

define("STUDENT", 0);
define("STAFF", 1);
define("ADMIN", 2);

define("UPLOAD_FILE_SIZE", 200);
define("UPLOAD_FILE_PATH", 'uploads/');
define("UPLOAD_RATIONALE_PATH", 'test_rationale/');

define('EMAIL', 'admin@foreignnurseglobal.com');
// define('EMAIL', 'dev.sambenny@gmail.com');
define('NUMBER', '+234(0) 703 282 5450');
define('NUMBER_', '+2347032825450');

define('INFO_MAIL', 'info@foreignnurseglobal.com');
define('MAIL_USER', 'info@foreignnurseglobal.com');
define('MAIL_PASSWORD', 'Joyinyang1993.');
define('INFO_LOCATION', '');

define('DOMAIN', 'http://localhost');

define("STUDENT_COUNSELLOR_NAME", "JOY WILLIAMS");
define("STUDENT_COUNSELLOR_EMAIL", "admin@foreignnurseglobal.com");
define("STUDENT_COUNSELLOR_WHATSAPP", "+234(0) 703 282 5450");

define("CLASSESS", [
    "fresher" => "FRESHER CLASS",
    "foundation" => "FOUNDATION CLASS",
    "mastery" => "MASTERY CLASS",
    "ready" => "READY TO TEST CLASS",
]);

define("REMARK", [
    0 => "<span style=\"color:var(--red)\">Do Better <br> </span> Do know we are constantly monitoring your progress and we are not impressed with this. This is a very poor performance and we advise you to re-take the {{class}} to help you get well-grounded in your content. We advise you register for the next session",
    36 => "<span style=\"color:var(--red)\">Do Better <br> </span> We have been monitoring your progress and we are concerned about your current performance. This is a poor performance, and we advise you to take re-take the {{class}} to build a stronger foundation.  We advise you register for the next session",
    45 => "<span style=\"color:var(--red)\">Do Better <br> </span> Do know we are constantly monitoring your progress and we are not impressed with this. This is an average performance, and we advise you to take re-take {{class}} to help you get well-grounded. We advise you register for the next session",
    60 => "<span style=\"color:var(--green)\">Do Better <br> </span> We have been monitoring your progress, and we are pleased with your performance. This is a good performance, but there is always room for improvement.",
]);
define("SESSION", "AUGUST");
define("PASS_MARK", 60);