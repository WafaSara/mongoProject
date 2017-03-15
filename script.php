<?php
require_once ('TwitterApiExchange.php');

/**
 *  GetTweets class
 */
class GetTweets
{
    private $settings;
    /**
     *
     */
    function __construct(){
        $this->settings = array(
            'oauth_access_token' => "",
            'oauth_access_token_secret' => "",
            'consumer_key' => "",
            'consumer_secret' => ""
        );
    }

    /**
     *
     */
    public function run(){
        $url = 'https://api.twitter.com/1.1/followers/ids.json';
        $getfield = '?screen_name=J7mbo';
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($this->settings);
        echo $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();
    }

}
$getTweets = new GetTweets();
$getTweets->run();