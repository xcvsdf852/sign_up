<?php
require_once("package/Database.php");
require_once("package/str_sql_replace.php");
class check_action{
    // public $id;
    #檢查該筆活動，是否已經開始報名
    function check_date($id){
        
        #檢查id 資料格式
        if(!isset($id) || empty($id)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 2;
            $arry_result["mesg"] = "資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $id= str_SQL_replace($id);
        if(!filter_var($id,  FILTER_VALIDATE_INT)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 3;
            $arry_result["mesg"] = "資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        
        $sql = "SELECT COUNT(`rule_id`) as c, `rule_id` ,  `rule_title` ,  `rule_limit` ,  `rule_accompany` ,  `rule_start_time` ,  `rule_end_time` ,  `rule_content` 
                FROM  `sign_rule` 
                WHERE  `rule_IsEnable` =  '1'
                AND `rule_id` = '$id'
                AND  `rule_start_time` < NOW( ) 
                AND  `rule_end_time` > NOW( ) 
                ORDER BY  `rule_create_time` DESC";
        // echo $sql;
        // exit;
        $db = new Database();
        $row = $db->select($sql);
        // var_dump($row[0]);
        // exit;
        #回傳是否有該活動
        if($row[0]['c'] <= 0){
            // echo '查無該活動，或活動目前未開放報名!';
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 4;
            $arry_result["mesg"] = "查無該活動，或活動目前未開放報名!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }else{
            // echo '有活動';
            $arry_result["isTrue"] = true;
            $arry_result["errorCod"] = 1;
            $arry_result["mesg"] = $row[0];
            // $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        
    }
    #根據id取得報名剩餘數量
    function get_now_num($id){
        #檢查id 資料格式
        if(!isset($id) || empty($id)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 2;
            $arry_result["mesg"] = "資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $id= str_SQL_replace($id);
        if(!filter_var($id,  FILTER_VALIDATE_INT)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 3;
            $arry_result["mesg"] = "資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        
        $sql = "SELECT  `rule_limit` 
                FROM  `sign_rule` 
                WHERE  `rule_id` =  '$id' 
                ";
        $db = new Database();
        $row = $db->select($sql);
        return $row[0]['rule_limit'];
    }
    
}
?>