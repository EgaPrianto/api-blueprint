<?php 


class MyCurlFacebook {


    const GRAPH_VERSION = 'v2.8';

    private $hostname = 'https://graph.facebook.com/';
    private $access_token = 'access_token=';
    private $curl;

    public function __construct(){
        $this->curl = curl_init();
        $execQuery = 'https://graph.facebook.com/v2.8/oauth/access_token?client_id=189062984870016&client_secret=46aa26be20511e7e76179da35790b2fe&grant_type=client_credentials';
        curl_setopt($this->curl, CURLOPT_URL, $execQuery);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        $obj = json_decode($response);
        $this->access_token = $this->access_token.$obj->{'access_token'};
    }


    public function get($path, $query){
        $execQuery = $this->hostname.static::GRAPH_VERSION."/".$path."?".$this->access_token;
        $this->curl = curl_init();
        if ($query !== null && $query !== "" ) {
            $execQuery .= "&".$query;
        }
       // echo $execQuery;
        curl_setopt($this->curl, CURLOPT_URL, $execQuery);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($this->curl);
        curl_close($this->curl);
        return $result;
    }
}
/*
require_once __DIR__ . '/vendor/autoload.php';  
if(!session_id()) {
    session_start();
}
$fb = new Facebook\Facebook([
  'app_id' => '189062984870016', // Replace {app-id} with your app id
  'app_secret' => '46aa26be20511e7e76179da35790b2fe',
  'default_graph_version' => 'v2.8',
  ]);
// Since all the requests will be sent on behalf of the same user,
// we'll set the default fallback access token here.
$fb->setDefaultAccessToken('189062984870016|7MBHU8Zl7IIEaahMbN-VZZxNrpM');

  $response = $fb->get('/1597591840496775');


echo "<p> HTTP status code: " . $response->getHttpStatusCode() . "<br />\n";
echo "Response: " . $response->getBody() . "</p>\n\n";
echo "<hr />\n\n";
*/