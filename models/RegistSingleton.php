<?php
require_once("package/Database.php");
require_once("package/get_IP.php");
class RegistSingleton {

    private static $book = NULL;
    private static $isLoanedOut = FALSE;
    
    private function __construct() {
    }
    
    static function Sign_up() {
      if (FALSE == self::$isLoanedOut) {
        if (NULL == self::$book) {
           self::$book = new RegistSingleton();
        }
        self::$isLoanedOut = TRUE;
        return self::$book;
      } else {
        return NULL;
        // throw new Exception($error);
      }
    }
    
    function return_qualifications(RegistSingleton $qualificationsReturned) {
        self::$isLoanedOut = FALSE;
    }
    
    function Regist($list_pa_id,$list_name,$list_num,$rule_id){
      $IP = getIP();
      // echo $list_pa_id.'<br>';2016062001
      // echo $list_name.'<br>';路人甲
      // echo $list_num.'<br>';11
      // echo $rule_id.'<br>';4
      $db = new Database();
      try
      {
        
        $db->get_connection()->beginTransaction();
        $sql = "SELECT  `rule_limit` 
                  FROM  `sign_rule` 
                  WHERE  `rule_id` =  '$rule_id' 
                  FOR UPDATE";
        $row = $db->select($sql);
        #取得目前庫存，看是否可以扣除
        // sleep(5);
        // echo $row[0]['rule_limit'];
        // exit;
        if($row[0]['rule_limit'] >= $list_num){
           $sql ="UPDATE `sign_rule` 
                  SET `rule_limit` = `rule_limit`- $list_num 
                  WHERE `rule_id` = '$rule_id'";
          // echo $sql;
          // exit;
          $row = $db->update($sql);
          // var_dump($row);
          // exit;
          if(!$row){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 2;
            $arry_result["mesg"] = "報名失敗，系統錯誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
          }
          $sql_Regist = "INSERT INTO `sign_list`(`list_pa_id`,`list_name`,`list_num`,`list_create_ip`,`list_create_time`,`list_rule_id`)
                       VALUES ('$list_pa_id','$list_name','$list_num','$IP',NOW(),'$rule_id')";
          // echo $sql_Regist;
          // exit;
          $row__Regist = $db->update($sql_Regist);
          
          
          $db->get_connection()->commit();
          // var_dump($row__Regist);
          if(!$row__Regist){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 3;
            $arry_result["mesg"] = "報名失敗，系統錯誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
          }
          $arry_result["isTrue"] = true;
          $arry_result["errorCod"] = 1;
          $arry_result["mesg"] = "報名已成功，請關閉頁面!";
          $arry_result['error'] = $arry_result;
          return $arry_result;
          
        }else{
         throw new Exception($error);
        }
        
        
      }catch (Exception $err) {
      	$db->get_connection()->rollback();
      	//已超過報名人數
        // 	echo "Error: " . $err->getMessage();
        // 	exit();
        $arry_result["isTrue"] = false;
        $arry_result["errorCod"] = 4;
        $arry_result["mesg"] = "已超過報名人數!";
        $arry_result['error'] = $arry_result;
        return $arry_result;
      }
      
      
      
      
      
      
      
      
    }

}
?>