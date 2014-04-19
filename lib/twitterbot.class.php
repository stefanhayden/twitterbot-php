<?php

// Currently Composer Autoload seems to break
//require_once("./vendor/autoload.php");

//require_once("vendor/natefanaro/twitteroauth/twitteroauth/OAuth.php");
require_once("vendor/natefanaro/twitteroauth/twitteroauth/twitteroauth.php");

Class Twitterbot {

	private $apiKey;
	private $apiSecret;
	private $accessToken;
	private $accessTokenSecret;
	
	public $logType = "console";
	public $testMode = false;

	public function __construct($apiKey, $apiSecret, $accessToken, $accessTokenSecret) {

		$this->apiKey($apiKey);
		$this->apiSecret($apiSecret);
		$this->accessToken($accessToken);
		$this->accessTokenSecret($accessTokenSecret);

		$this->connection = new \TwitterOAuth(
						$this->apiKey(), 
						$this->apiSecret(), 
						$this->accessToken(),
						$this->accessTokenSecret()
					);
		$this->log($this->connection);
		$this->user = $this->connection->get('account/verify_credentials');
		$this->log($this->user);
	}

	private function log($value) {
		
		if(($this->logType == "verbose" && !is_string($value)) || is_string($value)) {
			//error_log(print_r($value, true));
			print_r($value);
			echo "\r\n";

		}
	}

	public function tweet($text, $options=array()) {

		$options["status"] = $text;

		$this->log("Tweet: ".$text);

		if(!$this->testMode) {
			$responce = $this->connection->post('statuses/update', $options);
			return $responce;
		} else {
			return false;
		}
	}

	public function getUser($options) {
		if(empty($options["screen_name"]) &&  empty($options["user_id"])) {
			$this->log("Error: screen_name or user_id is required to get user info");
			return false;
		}
		$responce = $this->connection->get('users/show', $options);

		return $responce;
	}

	public function apiKey($value="") {
		if(!empty($value)) {
			$this->apiKey = $value;
			$this->log("Set apiKey to: ".$this->apiKey);
		}
		return $this->apiKey;
	}

	public function apiSecret($value="") {
		if(!empty($value)) {
			$this->apiSecret = $value;
			$this->log("Set apiSecret to: ".$this->apiSecret);
		}
		return $this->apiSecret;
	}

	public function accessToken($value="") {
		if(!empty($value)) {
			$this->accessToken = $value;
			$this->log("Set accessToken to: ".$this->accessToken);
		}
		return $this->accessToken;
	}

	public function accessTokenSecret($value="") {
		if(!empty($value)) {
			$this->accessTokenSecret = $value;
			$this->log("Set accessTokenSecret to: ".$this->accessTokenSecret);
		}
		return $this->accessTokenSecret;
	}
}
