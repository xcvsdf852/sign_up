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
    <?php 
        // var_dump($data);
        if(empty($data)){
                // echo "<script>alert('目前尚未有人報名');window.close()</script>";
                echo "<script>
                        $(document).ready(function(){
                                BootstrapDialog.show({
                                    message: '目前尚未有人報名!',
                                    buttons: [{
                                        label: 'Close',
                                        action: function(dialogItself){
                                            window.close();
                                        }
                                    }]
                                })
                        });
                    </script>";
        }
    ?>
</head>
<body>
     <div class = "row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
          <!----------內容位置-------------->
               
               <table class="table table-hover">
                  <thead class="thead-inverse">
                    <tr>
                      <th>#</th>
                      <th>員工編號</th>
                      <th>員工名稱</th>
                      <th>攜伴人數</th>
                    </tr>
                  </thead>
                  <tbody id="content">
                    <?php
                        foreach ($data as $value) {
                        //   var_dump($value);
                             echo "<tr id = 'row_".$value['list_id']."'>
                                      <th scope='row'></th>
                                      <td id = 'pa_id_".$value['list_id']."'>".$value['list_pa_id']."</td>
                                      <td id = 'name_".$value['list_id']."'>".$value['list_name']."</td>
                                      <td id = 'num_".$value['list_id']."'>".$value['list_num']."</td>
                                    </tr>";
                        }
                    
                    ?>
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