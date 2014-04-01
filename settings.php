<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define('HOSTNAME', 'localhost');
//define('DATABASE', 'namvie5_nvinfo');
define('DATABASE', 'namvie5_nvinfo');
//define('DBUSER', 'namvie5_nvinfo');
define('DBUSER', 'root');
//define('DBPASS', 'mnJTi=^+&OpZ');
define('DBPASS', '');
define('DBPREFIX', 'gl_');
define('APPLICATION_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/golive');
define('DOMAIN_NAME', $_SERVER['HTTP_HOST'] . '/');
define('RUN_ON_DEVELOPMENT', FALSE);


/*
 * Config sent mail SMTP
 */


define('SMTP_USER','neihn88@gmail.com');
define('SMTP_PASS','vannhien');
define('MAIL_FROM','neihn88@gmail.com');

/*
 * Define key encript
 */

define('KEY_ENCRIPT','nhien');

/*define uploadpath*/
define('UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].'/golive/uploads/');

?>