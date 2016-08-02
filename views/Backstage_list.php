<!DOCTYPE HTML>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?= Config::$projectName ?></title>
     
     <link href="<?= Config::$cssRoot ?>jquery-ui.min.css" rel="stylesheet" />
     
     <link href="<?= Config::$cssRoot ?>bootstrap.min.css" rel="stylesheet">
     <link href="<?= Config::$cssRoot ?>bootstrap-dialog.min.css" rel="stylesheet">

     <script src="<?= Config::$jsRoot ?>jquery.js"></script>
     <script src="<?= Config::$jsRoot ?>jquery-ui.min.js"></script>
     <script src="<?= Config::$jsRoot ?>bootstrap.min.js"></script>
     <script src="<?= Config::$jsRoot ?>bootstrap-dialog.min.js"></script>

</head>
<body>
     <div class="header"><?php require_once('views/header.html');?></div>
     <div class = "row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
          <!----------內容位置-------------->
               
               <form class="form-horizontal" role="form">
                    <div class="form-group">
                         <label for="rule_title" class="col-sm-2 control-label">活動名稱</label>
                         <div class="col-sm-10">
                              <input type="email"  name = "rule_title" class="form-control" id="rule_title" placeholder="請輸入活動名稱">
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_limit" class="col-sm-2 control-label">活動人數</label>
                         <div class="col-sm-10">
                              <input type="text" name = "rule_limit" class="form-control" id="rule_limit" placeholder="請輸入活動人數">
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_accompany" class="col-sm-2 control-label">是否可攜伴參加</label> 
                         <label class="radio-inline">
                              <input type="radio" name="rule_accompany" id="rule_accompany" value="1"> 是
                         </label>
                         <label class="radio-inline">
                              <input type="radio" name="rule_accompany" id="rule_accompany" value="0"> 否
                         </label>
                    </div>
                    <div class="form-group">
                         <label for="rule_start_time" class="col-sm-2 control-label">報名時間</label>
                         <div class="col-sm-10">
                              <input type="date"  name = "rule_start_time" class="form-control" id="rule_start_time" >
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_end_time" class="col-sm-2 control-label">報名時間</label>
                         <div class="col-sm-10">
                              <input type="date"  name = "rule_end_time" class="form-control" id="rule_end_time" >
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_content" class="col-sm-2 control-label">活動內容</label>
                         <div class="col-sm-10">
                              <input type="textarea"  name = "rule_content" class="form-control" id="rule_content" >
                         </div>
                    </div>
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-info">送出</button>
                         </div>
                    </div>  
               </form>

<!----------內容位置結束-------------->
          </div>
          <div class="col-md-3">
          </div>
     </div>

</body>
</html>