<?php
include 'MyCurlFacebook.php';

$MCF = new MyCurlFacebook('189062984870016|7MBHU8Zl7IIEaahMbN-VZZxNrpM');

echo $MCF->get("1597591840496775","fields=id,name").'<br>';
echo $MCF->get("1597591840496775/likes","fields=id,name&amp;limit=1").'<br>Likes<br>';
echo $MCF->get("1597591840496775","fields=fan_count").'<br>';
echo $MCF->get("1597591840496775/events","fields=id,name&amp;limit=2").'<br>events<br>';
echo $MCF->get("/1597591840496775/feed",null).'<br>events<br>';

/**
 * Generate some requests and then send them in a batch request.
 */
/*
// Get the name of the logged in user
$requestUserName = $fb->request('GET', '/1597591840496775?fields=id,name');

// Get user likes
$requestUserLikes = $fb->request('GET', '/1597591840496775/likes?fields=id,name&amp;limit=1');

// Get count likes
$requestCountLikes = $fb->request('GET', '/1597591840496775/?fields=fan_count');

// Get user events
$requestUserEvents = $fb->request('GET', '/1597591840496775/events?fields=id,name&amp;limit=2');

// Post a status update with reference to the user's name
$message = 'My name is {result=user-profile:$.name}.' . "\n\n";
$message .= 'I like this page: {result=user-likes:$.data.0.name}.' . "\n\n";
$message .= 'My next 2 events are {result=user-events:$.data.*.name}.';
$statusUpdate = ['message' => $message];
// $requestPostToFeed = $fb->request('POST', '/1597591840496775/feed', $statusUpdate);
 $requestGetFeed = $fb->request('GET', '/1597591840496775/feed');

// Get user photos
$requestUserPhotos = $fb->request('GET', '/1597591840496775/photos?fields=id,source,name&amp;limit=2');

$batch = [
    'user-profile' => $requestUserName,
    'user-count-likes' => $requestCountLikes,
    'user-likes' => $requestUserLikes,
    'get-feed' => $requestGetFeed,
    'user-events' => $requestUserEvents,
    'user-photos' => $requestUserPhotos,
    ];

echo '<h1>Make a batch request</h1>' . "\n\n";

try {
  $responses = $fb->sendBatchRequest($batch);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

foreach ($responses as $key => $response) {
  if ($response->isError()) {
    $e = $response->getThrownException();
    echo '<p>Error! Facebook SDK Said: ' . $e->getMessage() . "\n\n";
    echo '<p>Graph Said: ' . "\n\n";
    var_dump($e->getResponse());
  } else {
    echo "<p>(" . $key . ") HTTP status code: " . $response->getHttpStatusCode() . "<br />\n";
    echo "Response: " . $response->getBody() . "</p>\n\n";
    if ($key === 'user-count-likes') {
      $body = $response->getDecodedBody();
      echo '<p>only likes = '.$body['fan_count'].'<br></p>';
      echo "masuk";
    }
    echo "<hr />\n\n";
  }
}*/