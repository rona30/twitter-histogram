<?php
/*
GET statuses / user_timeline - Returns a collection of the most recent Tweets posted by the user indicated by the screen_name or user_id parameters.

Goal: Get the user's last 500 tweets to analyze his most active hours
*/
require_once('TwitterAPIExchange.php');
// Set access tokens
$settings = array(
'oauth_access_token' => "918975920962072577-VjEe76BkTnVW6uPsedbSDP0DGrmV1So",
'oauth_access_token_secret' => "5yvAbnctdtMYUy7pz20FutUoZGGiPBJpZXMoQLpaBYQR6",
'consumer_key' => "7NL3foKJ5FMzQDGq2Nqe54aFE",
'consumer_secret' => "1cllXAkGF6y4z8cP8KStDQybFQmbXwPMyzf9x8ufHVmp0CDWhE"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";  

if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "imronajss";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 500;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
   
//get 24-hour format of an hour with leading zeros
$tweettime = array();       
foreach($string as $items)
{         
  $tweettime[] = date("H", strtotime($items['created_at'])).':00';    
}  

sort($tweettime);    
$tweettime = implode(',',$tweettime);
echo($tweettime);
?>
