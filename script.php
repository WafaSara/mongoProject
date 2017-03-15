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
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        // $getfield = '?q=%23DonaldTrump';

        $requestMethod = 'GET';
        $min = 0;

        for ($i=0; $i<40; $i++){
            if ($i==0){
                $getfield = '?q=benzema&count=100&lang=fr';
            } else {
                $getfield = '?q=benzema&count=100&lang=fr&max_id='.$min;
            }
            $twitter = new TwitterAPIExchange($this->settings);
            $result =  $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

            //file_put_contents("result.json", $result, FILE_APPEND);

            $decode = json_decode($result);
            $min = $decode->statuses[0]->id;
            foreach ($decode->statuses as $status){
                file_put_contents("result.json", json_encode($status), FILE_APPEND);
                if ($status->id < $min){
                    $min = $status->id;
                }
            }

        }


    }

}
$getTweets = new GetTweets();
$getTweets->run();