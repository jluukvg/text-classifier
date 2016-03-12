<?php
/**
 * @file
 */

include "settings.php";
include 'libraries/twitter/TwitterApiExchange.php';

$url = 'https://api.twitter.com/1.1/lists/statuses.json';
$getfield = '?slug=breakingnews&owner_screen_name=palafo';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($twitter_settings);
$json_string = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
$json = json_decode($json_string);
foreach ($json as $key => $tweet) {
  echo "<div>" . $tweet->text . "</div>";
}
