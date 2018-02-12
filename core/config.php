<?php

if(!isset($_SESSION)){
    session_start();
}

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__) . DS."..".DS));
define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);
define("CLS", ".class");
define("EXT", ".php");


$path = [
  'pages_dir' => 'pages',
  'template_dir' => 'template',
  'views_dir' => 'views',
  'classes_dir' => 'classes',
  'core_dir' => 'core',
  'style_dir' => 'style'
];

foreach ($path as $item => $value) {
    define(strtoupper($item), $value);
}

$GLOBALS['config'] = [
  'mysql' => [
      'host' => '127.0.0.1',
      'username' => 'root',
      'password' => '',
      'name' => 'city0corporation'
  ],
  'session' => [
      'session_name' => 'user',
      'session_token' => 'corp'
  ],
  'cookie' => [
      'cookie_name' => 'cook',
      'cookie_expiry' => 604840
  ]
];