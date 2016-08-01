<!DOCTYPE HTML>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?= Config::$projectName ?></title>
     
     <link href="<?= Config::$cssRoot ?>jquery-ui.min.css" rel="stylesheet" />
     <link href="<?= Config::$cssRoot ?>main.css" rel="stylesheet" />

     <script>
          var root = '<?= Config::$root ?>';
          var cssRoot = '<?= Config::$cssRoot ?>';
          var imgRoot = '<?= Config::$imgRoot ?>';
     </script>
     <script src="<?= Config::$jsRoot ?>jquery.js"></script>
     <script src="<?= Config::$jsRoot ?>jquery-ui.min.js"></script>
     <script src="<?= Config::$jsRoot ?>main.js"></script>
     <script src="<?= Config::$jsRoot ?>resetCssUrl.js"></script>
</head>
<body>
     <div class="header">活動報名系統</div>
     <div class="content">
          <div id="btn_createActive">建立活動</div>
          <div id="btn_bookActive">報名活動</div>
     </div>
     <div class="footer">
          @ Copyright 2016 Max Sherlock. All rights reserved.
     </div>
</body>
</html>