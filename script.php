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
            'oauth_access_token' => "2809980819-JkR9qlKZCjdQxejYogvOWkAlBpXjEoSOM6Tav0b",
            'oauth_access_token_secret' => "bKu4FqJXGTo0hLKwB3Wo0huJq76P7Ars97OOJQAn9Ze9R",
            'consumer_key' => "PfGsd5HmE97aTQ16LJeMbivuL",
            'consumer_secret' => "GBASyaABU5BFK3Y5QZOZpUim0o5oaTchltJt9sEHG023Jeu7L4"
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