<?php
session_start();

define("APP_TITLE", "Tour");

define("PRES_DANGER",'<pre class="bg-danger">');
define("pres_danger",'<pre class="bg-danger">');

define("PRES_WARNING",'<pre class="bg-warning">');
define("pres_warning",'<pre class="bg-warning">');

define("PRES",'<pre>');
define("pres",'<pre>');

define("PREE","</pre>");
define("pree","</pre>");

define("hr","<hr />");
define("HR","<hr />");

define("br","<br />");
define("BR","<br />");

define("br2","<br /><br />");
define("BR2","<br /><br />");

define("sp2","&nbsp;&nbsp;");
define("sp3","&nbsp;&nbsp;&nbsp;");
define("sp6","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");

define( "CLEARFIX", '<div class="row"><div class="col-sm-12">&nbsp;</div></div>' );

define( "DEBUG", "false" );
//define( "DEBUG", "true" );

/* db connection */
if (strtoupper($_SERVER['HTTP_HOST']) == 'LOCALHOST'){
	define("dbname","db_tours");
	define("dbuser","root");
	define("dbpass","");
	define("dbhost","127.0.0.1");
}else{
	define("dbname","");
	define("dbuser","");
	define("dbpass","");
	define("dbhost","");
}
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database'); 
include_once( "functions.php" ); 
?>