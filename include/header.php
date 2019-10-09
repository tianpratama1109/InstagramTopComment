<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trusted Social Media Marketing comes from Indonesia. All prices in us can compete with other SMM sites.">
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/social-icons-33/128/Instagram-128.png" type="image/x-icon" />
    <meta name="author" content="Luxurysite">

    <title>SANGATEZ.COM</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="include/adblok.css" rel="stylesheet">
    <link href="assets/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4940708557337763",
          enable_page_level_ads: true
     });
</script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<background="blue">

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><i class="fa fa-flag"></i>SANGATEZ.COM</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
               if(isset($_SESSION['usernameam'])) {
               ?>
                <ul class="nav navbar-nav">
                    <li <? if(preg_match('#index.php#', $_SERVER['SCRIPT_NAME'])>0) print ' class="active"';?>><a href="index"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li <? if(preg_match('#history.php#', $_SERVER['SCRIPT_NAME'])>0) print ' class="active"';?>><a href="history"><i class="fa fa-list"></i> Submit History</a></li>
                    
                </ul>
                <?php } else {?>
                <ul class="nav navbar-nav">
                    
                    </ul>
               <?php
                }
               if(!isset($_SESSION['usernameam'])) {
               ?>
                <ul class="nav navbar-nav navbar-right">
                    <li <? if(preg_match('#login.php#', $_SERVER['SCRIPT_NAME'])>0) print ' class="active"';?>><a href="login"><i class="fa fa-sign-in"></i> Sign in </a></li>
                </ul><?php } else { ?><ul class="nav navbar-nav navbar-right">
                    <li><a href="ganti_password"><i class="fa fa-lock"></i> Change Password </a></li>
                    <li><a href="logout"><i class="fa fa-sign-out"></i> Logout </a></li>
                </ul><?php } ?>
        </div>
    </div>
</nav>