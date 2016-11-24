<?php
include '../Facebook/MyCurlFacebook.php';
$MCF = new MyCurlFacebook();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>LBW-dapet-A</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/lbw.css">
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

          $url = "https://api.twitter.com/1.1/followers/ids.json";
          $usedParam = "screen_name";
          $valueParam = "maghfirare";
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

             $base_info = buildBaseString($url, 'GET', $oauth);
             $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
             $oauth['oauth_signature'] = $oauth_signature;

             $header = array(buildAuthorizationHeader($oauth), 'Expect:');
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

    <?php
      echo $MCF->get("1597591840496775","")->name;
    ?>

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

          if (property_exists($curPost, 'likes')) {
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
