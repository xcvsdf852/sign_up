<?PHP
require_once("package/Database.php");
require_once("package/str_sql_replace.php");

class Regist_participant{
    public $POST_data;
    public $list_pa_id;
    public $list_name;
    #先檢查是否有報名資格
    function check_qualifications(){
        #檢查報名規則id 
        if(!isset($this->POST_data['rule_id']) || empty($this->POST_data['rule_id'])){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 7;
            $arry_result["mesg"] = "資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_id= str_SQL_replace($this->POST_data['rule_id']);
        if(!filter_var($rule_id,  FILTER_VALIDATE_INT)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 8;
            $arry_result["mesg"] = "資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #檢查參加者的id 資料格式 預設員工編號
        if(!isset($this->POST_data['list_pa_id']) || empty($this->POST_data['list_pa_id'])){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 2;
            $arry_result["mesg"] = "資料傳輸失敗!";
            $arry_result['id'] = $rule_id;
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $list_pa_id= str_SQL_replace($this->POST_data['list_pa_id']);
        if(!filter_var($list_pa_id,  FILTER_VALIDATE_INT)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 3;
            $arry_result["mesg"] = "資料格式有誤!";
            $arry_result['id'] = $rule_id;
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #檢查參加者的名稱 資料格式
        if(!isset($this->POST_data['list_name']) || empty($this->POST_data['list_name'])){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 4;
            $arry_result["mesg"] = "資料傳輸失敗!";
            $arry_result['id'] = $rule_id;
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $list_name= str_SQL_replace($this->POST_data['list_name']);
        if(!filter_var($list_name,  FILTER_SANITIZE_STRING)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 5;
            $arry_result["mesg"] = "資料格式有誤!";
            $arry_result['id'] = $rule_id;
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #檢查攜伴人數 資料格式
        if(!isset($this->POST_data['list_num']) || empty($this->POST_data['list_num'])){
              $this->POST_data['list_num'] = 0;
        }
        $list_num= str_SQL_replace($this->POST_data['list_num']);
       
        
        #檢查內容資格
        $sql = "SELECT `rule_participant`
                FROM  `sign_rule` 
                WHERE  `rule_IsEnable` =  '1'
                AND `rule_id` = '$rule_id'";
        echo $sql;
        exit;
        $db = new Database();
        $row = $db->select($sql);
        // var_dump($row);
        
        #取得參加資格的名單轉成陣列
        $arry_participant = explode(',',$row[0]['rule_participant']);
        // var_dump($arry_participant);
        // exit;
        if(!in_array($list_pa_id,$arry_participant)){
            // echo '無參加資格';
            $arry_result["isTrue"] = false;
            $arry_result['id'] = $rule_id;
            $arry_result["mesg"] = "無參加資格!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        // else{
            
        //     // echo '有資格參加';
        //     $arry_result["isTrue"] = true;
        //     $this->list_pa_id = $list_pa_id;
        //     $this->list_name = $list_name;
        //     return $arry_result;
        // }
        
        
        
    }
    
    
}
?>