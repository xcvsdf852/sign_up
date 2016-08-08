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
             $.post("get_all_sign_rule",function(d){
    		  // console.log(d);
      		  if(d.isTrue){
                var i=0;
                $("#content").html("");
                $.each(d.date,function(){
                    $("#content").append(
                        '<tr id = "row_'+d.date[i].rule_id+'">'
                              +'<th scope="row"></th>'
                              +'<td id = "title_'+d.date[i].rule_id+'">'+d.date[i].rule_title+'</td>'
                              +'<td id = "url_'+d.date[i].rule_id+'">https://lab-eric3998.c9users.io/sign_up/Regist/index/'+d.date[i].rule_url_id+'</td>'
                              +'<td id = "num_'+d.date[i].rule_id+'">'+d.date[i].rule_limit+'</td>'
                              +'<td><button class = "btn btn-danger" onclick = "window_open('+d.date[i].rule_id+')">報名清單</button></td>'
                         +'</tr>'
                    );
                    i++;
                });
      		  }else{
          		    BootstrapDialog.show({
                        title: 'Oops 系統發生錯誤!',
                        message: d.mesg
                    }).setType(BootstrapDialog.TYPE_DANGER);;
                  return false;
      		  }
        		  
          		//   $("#P").val(P);
          		//   $("#P_number").val(P_number);
          		//   var c=d.page_num;
          		//   $("#tage").load('/homework0721_MVC/models/package/Tage.php?P='+P+'&P_number='+P_number+'&count_num='+c+'&function=list_load');
          		// refreshCount();
          		setInterval(refreshCount, 5000);
	      },"json");
        });
        
        function refreshCount(){
            $.post("get_all_sign_rule",function(d){
    		  // console.log(d);
      		  if(d.isTrue){
                var i=0;
                $.each(d.date,function(){
                    $('#num_'+d.date[i].rule_id).text(d.date[i].rule_limit);
                    i++;
                });
      		  }else{
          		    BootstrapDialog.show({
                        title: 'Oops 系統發生錯誤!',
                        message: d.mesg
                    }).setType(BootstrapDialog.TYPE_DANGER);
                  return false;
      		  }
        		  
          		//   $("#P").val(P);
          		//   $("#P_number").val(P_number);
          		//   var c=d.page_num;
          		//   $("#tage").load('/homework0721_MVC/models/package/Tage.php?P='+P+'&P_number='+P_number+'&count_num='+c+'&function=list_load');
          		
          		// setInterval(refreshCount, 5000);
	      },"json");
        }
        
        //取得該活動目前報名狀況
        function window_open(id){
            window.open('get_participant_list/'+id, 'participant list', config='height=500,width=500,location=no,scrollbars=yes,menubar=no,left = 150,top= 150');
        }
        
        
    </script>
</head>
<body>
     <div class="header"><?php require_once('views/header.html');?></div>
     <div class = "row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
          <!----------內容位置-------------->
               
               <table class="table table-hover">
                  <thead class="thead-inverse">
                    <tr>
                      <th onclick ="get_num()">#</th>
                      <th>名稱</th>
                      <th>網址</th>
                      <th>剩餘名額</th>
                      <th>報名清單</th>
                    </tr>
                  </thead>
                  <tbody id="content">


                  </tbody>              
                </table>
                <input type="hidden" id="count" value="">
                <div class="pagination" id="tage" align="center" style="width:100%;">
                
                </div>

<!----------內容位置結束-------------->
          </div>
          <div class="col-md-2">
          </div>
     </div>

</body>
</html>