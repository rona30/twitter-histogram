<?php
require_once('TwitterAPIExchange.php');
// Set access tokens
$settings = array(
'oauth_access_token' => "	918975920962072577-VjEe76BkTnVW6uPsedbSDP0DGrmV1So",
'oauth_access_token_secret' => "5yvAbnctdtMYUy7pz20FutUoZGGiPBJpZXMoQLpaBYQR6",
'consumer_key' => "YOUR_CONSUMER_KEY",
'consumer_secret' => "YOUR_CONSUMER_SECRET"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
$getfield = '?screen_name=imronajss&count=50';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
echo "<pre>";
print_r($string);
echo "</pre>";
?>
