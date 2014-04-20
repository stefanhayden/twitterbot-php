<?php


class trackBot extends Twitterbot {

	public $current_name;
	public $past_name;

	public function __construct($screen_name, $apiKey, $apiSecret, $accessToken, $accessTokenSecret) {
		$this->screen_name = $screen_name;
		parent::__construct($apiKey, $apiSecret, $accessToken, $accessTokenSecret);
		
		$this->trackUser = $this->getUser($this->screen_name);
		$this->getCurrentName();	
		$this->getPastName();	
	}

	public function getUser($screen_name) {

		 return parent::getUser(array("screen_name" => $screen_name));
	}

	public function getCurrentName() {
		return $this->current_name = $this->trackUser->name;
	}

	public function getPastName() {
		return $this->past_name = $this->user->status->text; 
	}

	public function trackName() {

		if(!empty($this->current_name) && !empty($this->past_name) && $this->current_name != $this->past_name) {
			$this->tweet($this->current_name);
		} else {
			$this->log('No screen_name change: '.$this->current_name);
		}
	}

	public function trackProfileImage() {}
	public function trackFollowers() {}
}
