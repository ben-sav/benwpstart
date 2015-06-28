<?php

/**
* Bennition Factory Twitter call class
*/
class BenTwitter extends TwitterOAuth
{

	private	$cacheFile;
	private $tweets;

	public function __construct($options)
	{
		$consumer_key = $options['consumer_key'];
		$consumer_secret = $options['consumer_secret'];
		$oauth_token = $options['oauth_token'];
		$oauth_token_secret = $options['oauth_token_secret'];
		parent::__construct($consumer_key,$consumer_secret,$oauth_token,$oauth_token_secret);
		$this->cacheFile = get_stylesheet_directory() . '/core/twitter/twcache.tmp';
	}

	public function getTweets($nbr, $cacheTime)
	{
		return $this->getCachedTweets($nbr, $cacheTime);
	}

	private function fetchTweets($nbr)
	{
		$tweetsRaw = parent::get('statuses/user_timeline', array('count' => $nbr));
		if (isset($tweetsRaw)) {
			$tweets = array();
			foreach ($tweetsRaw as $tweet) {
				$tweets[$tweet->id]['text'] = $tweet->text;
				$tweets[$tweet->id]['date'] = $tweet->created_at;
				$tweets[$tweet->id]['user'] = $tweet->user->name;
				$tweets[$tweet->id]['image'] = $tweet->user->profile_background_image_url;
			}
			
			return $tweets;
		} else {
			return '';
		}
	}
	
	private function getCachedTweets($nbr, $cacheTime)
	{
		if (time() - filemtime($this->cacheFile) > $cacheTime) {

			$tweets = $this->fetchTweets($nbr);
			if ($tweets !== '') {
				file_put_contents($this->cacheFile, serialize($tweets));
			} else {
				$tweets = unserialize(file_get_contents($this->cacheFile));
			}

		} else {

			$tweets = unserialize(file_get_contents($this->cacheFile));
		
		}

		return $tweets;
	}

}

?>