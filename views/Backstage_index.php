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
     
     <script>
          $(document).ready(function(){
               // $( "#account_click" ).click(function(){
                 get_account_list();
               // });
          })
          
          function get_account_list(){
               $.post("get_account_list",function(d){
                    var i=0;
                    $.each(d.date,function(){
                         $("#account").append('<input name = "account[]" type="checkbox" value="'+d.date[i].pa_id+'">'+d.date[i].pa_name+'&nbsp;&nbsp;&nbsp;');
                         i++;
                    });
                    
               },'json');
          }
          function check_all(obj,cName){ 
              var checkboxs = document.getElementsByName(cName); 
              for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
          } 
     </script>
     <?php
         if(!empty($data)){
             
             if($data['isTrue']){
                 echo "<script>
                         $(document).ready(function(){
                           BootstrapDialog.show({
                             title: '執行操作成功!',
                             message: '".$data['mesg']."'
                           }).setType(BootstrapDialog.TYPE_SUCCESS);
                         });
                       </script>
                       ";
             }else{
                 echo "<script>
                         $(document).ready(function(){
                             BootstrapDialog.show({
                               title: 'Oops 系統發生錯誤!',
                               message: '".$data['mesg']."'
                             }).setType(BootstrapDialog.TYPE_DANGER);
                         });
                       </script>
                       ";
             }
         }
     ?>

</head>
<body>
     <div class="header"><?php require_once('views/header.html');?></div>
     <div class = "row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
          <!----------內容位置-------------->
               <h2 class="form-signin-heading" style= "text-align : center;font-family: DFKai-sb;">新增活動</h2>
               <form class="form-horizontal" role="form" action="create_sign" method="post">
                    <div class="form-group">
                         <label for="rule_title" class="col-sm-2 control-label">活動名稱</label>
                         <div class="col-sm-10">
                              <input type="text"  name = "rule_title" class="form-control" id="rule_title" placeholder="請輸入活動名稱">
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
                              <input type="datetime-local"  name = "rule_start_time" class="form-control" id="rule_start_time" >
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_end_time" class="col-sm-2 control-label">報名時間</label>
                         <div class="col-sm-10">
                              <input type="datetime-local"  name = "rule_end_time" class="form-control" id="rule_end_time" >
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_content" class="col-sm-2 control-label">活動內容</label>
                         <div class="col-sm-10">
                              <input type="textarea"  name = "rule_content" class="form-control" id="rule_content" >
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="rule_content" class="col-sm-2 control-label" id="account_click">可參予人員
                              <input type="checkbox" name="all" onclick="check_all(this,'account[]')" />
                         </label>
                         <div class="col-sm-10">
                             <div id=account>
                                <div class="checkbox" ><label></label></div>
                              </div>
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