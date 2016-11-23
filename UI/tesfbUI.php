<?php
include 'MyCurlFacebook.php';
$MCF = new MyCurlFacebook();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>LBW-dapet-A</title>
  <!--meta name="generator" content="Google Web Designer 1.6.4.1010"-->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!--style type="text/css" id="gwd-text-style">
    p {
      margin: 0px;
    }
    h1 {
      margin: 0px;
    }
    h2 {
      margin: 0px;
    }
    h3 {
      margin: 0px;
    }
  </style-->
  <style type="text/css">
    a {
      color: inherit;
    }

    a:link {
        text-decoration: none;
    }

    a:visited {
        text-decoration: none;
    }

    a:active {
        text-decoration: none;
    }

    html, body {
      width: 100%;
      height: 100%;
      margin: 0px;
    }
    body {
      transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
      transform-style: preserve-3d;
    }
    .pp-div {
      width: 100px;
      height: 100px;
      border-radius: 50px;
      display: inline-block;
      vertical-align: middle;
      margin-right: 20%;
    }
    .header-div {
      padding-top: 2%;
      padding-left: 15%;
      padding-bottom: 15px;
      background-color: white;
    }
    .profilename-div {
      font-family: calibri;
      width: 100%;
      height: 37px;
      left: 123px;
      display: inline-block;
      margin-bottom: 0px;
      top: 55px;
    }
    .profileandlikes-div {
      display: inline-block;
      width: 100%;
      left: -684px;
      top: 3296px;
    }
    .twitter-follow {
      font: bold 14px/18px  Helvetica, Arial Black, sans-serif;
      height: 80px;
      color: white;
      padding: 30px 50px;
      margin: 2px;
      border-radius: 5px;
      background-color: #55ACEE;
    }
    .twitter-follow:hover {
      color: white;
      text-decoration: none;
    }
    .facebook-like {
      font: bold 14px/18px  Arial Black;
      height: 80px;
      color: white;
      padding: 30px 50px;
      margin: 2px;
      border-radius: 5px;
      background-color: rgb(59, 89, 152);
    }
    .facebook-like:hover {
      color: white;
      text-decoration: none;
    }
    .tagppl-div {
      color: rgb(128, 128, 128);
    }
    .tagppl-div:hover {
      color: rgb(128, 128, 128);
      text-decoration: none;
    }
    .twitter-feed{
      padding-left: 5%;
      padding-right: 0px;
      padding-top: 0px;
      border-right: 2px solid;
      border-color: #ffffff;
      background-color: rgb(239, 239, 239);
    }
    .facebook-feed{
      padding-right: 5%;
      padding-left:0px;
      padding-top: 0px;
      border-left: 2px solid;
      border-color: #ffffff;
      background-color: rgb(239, 239, 239);
    }

    .facebook-post{
      margin-left: 2.5%;
      margin: 2%;
      padding:2%;
      background-color: white;
    }
    .facebook-post:hover{
      background-color: rgb(217, 230, 255);
    }
    .twitter-post{
      margin-right: 2.5%;
      background-color: white;
    }
    #twitter-banner {
      float: right;
      border-radius: 0% 0% 0% 100%;
      margin: 0px;
      padding:15px;
      padding-left: 35px;
      padding-bottom: 30px;
      font: bold 18px Helvetica, Arial, sans-serif;
      background-color:  #55ACEE;
      color:#f5f8fa;
    }
    #facebook-banner {
      float: left;
      border-radius: 0% 0% 100% 0%;
      margin: 0px;
      padding:15px;
      padding-right: 35px;
      padding-bottom: 30px;
      font: bold 18px Helvetica, Arial, sans-serif;
      background-color:  rgb(59, 89, 152);
      color:#f5f8fa;
    }
    .facebook-post-message{
      padding-top: 2%;
      padding-bottom: 3%;
    }
    .facebook-post-time{
      text-align: right;
      margin-top: 3%;
    }
    .facebook-post-like{
      margin-top: 3%;
      color: #999999;
    }

    .wrapper-twitter-link{
      margin-top:5px;
      margin-bottom:5px;
    }

    .wrapper-twitter-timeline{
      margin-top:5px;
      margin-bottom:5px;
    }
  </style>
</head>

<body>
  <div class="header-div col-md-12 col-sm-12">
    <div class="profileandlikes-div">
      <img src="
<?php
        echo $MCF->generateURL("1597591840496775/picture","width=100");
      ?>" class="pp-div">
      <a class="twitter-follow">
        <!-- CALC FOLLOWER HERE -->

        <!-- BEGIN IMPORTED FILE  -->

        <?php
          include ("../TWITTER/functions.php");
          include ("../TWITTER/auth.php") ;

          // echo "Hello Follower Result ! <br/>";
          $url = "https://api.twitter.com/1.1/followers/ids.json";
          // $url .='?'.$usedParam.'='.$valueParam;
          $usedParam = "screen_name";
          $valueParam = "maghfirare";
          // echo "URL : $url <br/>";
          // echo "Used Param : $usedParam <br/>";
          // echo "Value : $valueParam <br/>";
         ?>

           <?php
           $oauth = array(
             $usedParam => $valueParam,
             'oauth_consumer_key' => $consumer_key,
             'oauth_nonce' => time(),
             'oauth_signature_method' => 'HMAC-SHA1',
             'oauth_token' => $oauth_access_token,
             'oauth_timestamp' => time(),
             'oauth_version' => '1.0');
            //  console_log($oauth);
           $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);

             $base_info = buildBaseString($url, 'GET', $oauth);
            //  console_log("Base Info: ");
            //  console_log($base_info);
             $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
            //  console_log("Oauth Signature: ");
            //  console_log($oauth_signature);
             $oauth['oauth_signature'] = $oauth_signature;
            //  console_log("Oauth: ");
            //  console_log($oauth);

             $header = array(buildAuthorizationHeader($oauth), 'Expect:');
            //  console_log($header);
            // console_log("Header: ");
            // console_log($header);
            //  $additionalHeader = array(
            //    $usedParam => $valueParam
            //  );
            // echo 'URL Passed: '.$url.'?'.$usedParam.'='.$valueParam .'<br/><br/>';
             $options = array( CURLOPT_HTTPHEADER => $header,
                               CURLOPT_HEADER => false,
                               CURLOPT_URL => $url.'?'.$usedParam.'='.$valueParam,
                               CURLOPT_RETURNTRANSFER => true,
                               CURLOPT_SSL_VERIFYPEER => false);

             $feed = curl_init();
             curl_setopt_array($feed, $options);
             $json = curl_exec($feed);
             curl_close($feed);

             $twitter_data = json_decode($json);
            //  console_log("DATA : ");
            //  console_log($json);
            $followerCount = count($twitter_data->ids);
            if($followerCount < 1000){
                echo $followerCount." Followers";
            }
            else if($followerCount >= 1000 && $followerCount < 1000000){
                echo sprintf("%d K Followers", $followerCount/1000);
            }
            else{
                echo sprintf("%d M Followers", $followerCount/1000000);
            }
            //  echo "Data : <br/>";
            //  foreach ($twitter_data->ids as $key => $value) {
            //    # code...
            //    echo "$key : $value, <br/>";
            //  }

            ?>

        <!-- END OF IMPORTED FILE -->

      </a>
      <a class="facebook-like">
      <?php
        $countLikes = $MCF->get("1597591840496775","fields=fan_count")->fan_count;
        if($countLikes < 1000){
            echo $countLikes;
        }
        else if($countLikes >= 1000 && $countLikes < 1000000){
            echo sprintf("%d K", $countLikes/1000);
        }
        else{
            echo sprintf("%d M", $countLikes/1000000);

        }
      ?>

        Likes
        <img src="assets/picture/like_icon.png" style="height: 25px;  margin-bottom: 11px;">
      </a>
    </div>
    <h1 class="profilename-div">

     Adelia Maghfirare

    </h1>
    <a class="tagppl-div">

     @Maghfirare

    </a>
  </div>
  <div class = "twitter-feed col-md-6 col-sm-6">
    <h2 id="twitter-banner">twitter</h2>
    <div class = "twitter-post col-md-11 col-sm-11">
      <div class="row wrapper-twitter-link">
        <a class="twitter-timeline" data-width="100%" data-dnt="true" data-theme="dark" data-link-color="#2B7BB9" href="https://twitter.com/Maghfirare">
          Tweets by Maghfirare
        </a>
      </div>
      <!-- EMBEDED TIMELINE HERE -->
      <div class="row wrapper-twitter-timeline">
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
  </div>
  <div class = "facebook-feed col-md-6 col-sm-6">
    <h2 id="facebook-banner">facebook</h2>
    <?php
       $post = $MCF->get("1597591840496775/feed","fields=likes.limit(0).summary(true),message,story,created_time")->data;
       for($i = 0 ; $i<sizeof($post);$i++){
          $curPost =  $post[$i];
          echo "<div class = 'facebook-post col-md-11 col-sm-11 pull-right'>";
          if(property_exists($curPost, 'message')){
            echo "<div class = 'facebook-post-message col-md-12 col-sm-12'>";
            echo utf8_encode ( $curPost->message).'<br>';
            echo "</div>";
          }else if(property_exists($curPost, 'story')){
            echo "<div class = 'facebook-post-message col-md-12 col-sm-12'>";
            echo utf8_encode ( $curPost->story).'<br>';
            echo "</div>";
          }
          if (property_exists($curPost, 'id')) {
            echo "<img src = '";
            $curPicture = $MCF->get($curPost->id,"fields=full_picture")->full_picture;
            echo $curPicture;
            echo "' class = 'col-md-12 col-sm-12'>";
          }

          if (property_exists($curPost, 'id')) {
            echo "<div class = 'facebook-post-like pull-left col-md-6 col-sm-6'>";
            echo $curPost->likes->summary->total_count." likes";
            echo "</div>";
          }
          if(property_exists($curPost, 'created_time')){
            echo "<div class = 'facebook-post-time pull-right col-md-6 col-sm-6'>";
            echo substr($curPost->created_time, 0,10).' pukul '.substr($curPost->created_time, 11,5).'<br>';
            echo"</div>";
          }
          echo"</div>";
       }
    ?>

  </div>
</body>

</html>
