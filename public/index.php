<?php
// index.php is the front controller
require_once __DIR__ . '/../vendor/autoload.php'; // require_one is used for SOURCE CODE
$configs = require __DIR__ . '/../config/app.conf.php'; // require is used for DATA
use Service\DBConnector;
DBConnector::setConfig($configs['db']);

// routing part : mapping between request and controller route
$map = [
    '/account' => __DIR__ . '/../src/controller/account.php',
    '/register' => __DIR__ . '/../src/controller/register.php',
    '/login' => __DIR__ . '/../src/controller/login.php'
];

$url = $_SERVER['REQUEST_URI'];

if (substr($url, 0, strlen('/index.php')) == '/index.php') {
    $url = substr($url, strlen('/index.php'));
}

if (array_key_exists($url, $map)) {
    include $map[$url];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My personal Warehouse</title>
<style type="text/css">
    *{
    transition: ease-in-out;
    }
    p{
        margin-bottom: 50px;

    }
    #signup, #login{
      background: #ee2a7b;
      background: radial-gradient(circle at 3% 100%, #FED373 4%, #F15245 30%, #D92E7F 62%, #9B36B7 85%, #515ECF);
      border-radius: 28px;
      text-shadow: 0px 0px 30px #666666;
      font-family: Arial;
      color: #ffffff;
      font-size: 20px;
      padding: 10px 20px 10px 20px;
      text-decoration: none;
    }
    
    #signup:hover, #login:hover{
      background: #f9ed32;
       background: radial-gradient(circle at 33% 100%, #515ECF 4%, #9B36B7 30%, #D92E7F 62%, #F15245 85%, #FED373);
      text-decoration: none;
    }


</style>
</head>
	<body>
		<div>
		   	<p><a id=signup href="http://localhost/index.php/register">Sign-up</a><p/>
    		<p><a id=login href="http://localhost/index.php/login">Log-in</a><p/>
    		
    	</div>

    </body>
</html>