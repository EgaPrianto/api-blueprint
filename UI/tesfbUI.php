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

    a:hover {
      color: default;

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
      background-color: rgb(221, 221, 221);
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
  font: bold 14px/18px Helvetica, Arial, sans-serif;
      color: white;
      padding: 30px 50px;
      margin: 2px;
      border-radius: 5px;
      background-color: #55ACEE;
    }
    .facebook-like {
      font-family: 'Arial Black';
      color: white;
      padding: 30px 50px;
      margin: 2px;
      border-radius: 5px;
      background-color: rgb(59, 89, 152);
    }
    .tagppl-div {
      color: rgb(128, 128, 128);
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
  </style>
</head>

<body>
  <div class="header-div col-md-12">
    <div class="profileandlikes-div">
      <img src="
<?php 
        echo $MCF->generateURL("1597591840496775/picture","width=100");
      ?>" class="pp-div">
      <a class="twitter-follow">
        Follower

      </a>
      <a class="facebook-like">
      <?php 
        $countLikes = $MCF->get("1597591840496775","fields=fan_count")->fan_count;
        if($countLikes < 1000){
            $countLikes;
        }
        else if($countLikes >= 1000 && $countLikes < 1000000){
            echo sprintf("%d K", $countLikes/1000);
        }
        else{
            echo sprintf("%d M", $countLikes/1000000);

        }
      ?>

        Likes 

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

    </div>
  </div>
  <div class = "facebook-feed col-md-6 col-sm-6">
    <h2 id="facebook-banner">facebook</h2>
    <?php
       $post = $MCF->get("1597591840496775/feed","")->data;
       for($i = 0 ; $i<sizeof($post);$i++){
          $curPost =  $post[$i];
          echo "<div class = 'facebook-post col-md-11 col-sm-11 pull-right'>";
          echo "<div class = 'facebook-post-message col-md-12 col-sm-12'>";
          if(property_exists($curPost, 'message')){
            echo $curPost->message.'<br>';
          }else if(property_exists($curPost, 'story')){
            echo $curPost->story.'<br>';
          }
          echo "</div>";
          echo "<img src = '";
          if (property_exists($curPost, 'id')) {
             $curPicture = $MCF->get($curPost->id,"fields=full_picture")->full_picture;
             echo $curPicture;
          }
          echo "' class = 'col-md-12 col-sm-12'>";

          echo "<div class = 'facebook-post-time pull-right col-md-6 col-sm-6'>";
          if(property_exists($curPost, 'created_time')){
            echo substr($curPost->created_time, 0,10).' pukul '.substr($curPost->created_time, 11,5).'<br>';
          }
          echo"</div>";
          echo"</div>";
       }
    ?>

  </div>
</body>

</html>