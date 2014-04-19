<?php


class trackBot extends Twitterbot {
	public function __construct($screen_name, $apiKey, $apiSecret, $accessToken, $accessTokenSecret) {
		$this->screen_name = $screen_name;
		parent::__construct($apiKey, $apiSecret, $accessToken, $accessTokenSecret);
	}

	public function getUser($screen_name) {

		 return parent::getUser(array("screen_name" => $screen_name));
	}

	public function trackName() {

		$user = $this->getUser($this->screen_name);
		$current_name = $user->name;
		$past_name = $this->user->status->text;

		if(!empty($current_name) && !empty($past_name) &&  $current_name != $past_name) {
			$this->tweet($current_name);
		} else {
			$this->log('No screen_name change: '.$current_name);
		}
	}

	public function trackProfileImage() {}
	public function trackFollowers() {}
}
