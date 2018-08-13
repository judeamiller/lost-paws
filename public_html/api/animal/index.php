<?php

require_once dirname(__DIR__,3 . "/vendor/autoload.php");
require_once dirname(__DIR__, 3 . "php/classes/autoload.php");
require_once ("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once dirname(__DIR__, 3 . "php/lib/xsrf.php");
require_once  dirname(__DIR__, 3 ."php/lib/uuid.php");
//TODO: in example api has jwt and etc/apache2/...

use Jisbell347\LostPaws\{
	Profile,
	Animal,
	OAuth
};


/**
 * api for the Animal Class
 *
 * @author  Jude Baca-Miller <judeamiller@gmail.com>
 **/

//verify the session, start if inactive
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try{
	//grab the mySQL Connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/lostfuzzy.ini");

	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//sanitize input
	$animalId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$animalProfileId = filter_input(INPUT_GET, "animalProfileId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

}