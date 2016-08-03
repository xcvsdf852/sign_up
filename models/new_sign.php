<?PHP
session_start();
require_once("package/Database.php");
require_once("package/str_sql_replace.php");
require_once("package/get_IP.php");
// { 'rule_title' => string(6) "吃飯"
// 'rule_limit' => string(2) "30"
// 'rule_accompany' => string(1) "0"
// 'rule_start_time' => string(10) "2016-08-02"
// 'rule_end_time' => string(10) "2016-08-24"
// 'rule_content' => string(6) "聚餐"
// 'account' => array(2) { [0] => string(10) "2016062002" [1] => string(10) "2016062004" } }
class new_sign{
    public $rule_title; #活動名稱
    public $rule_limit; #限制人數
    public $rule_accompany; #是否可以攜伴 1:是 0:否
    public $rule_start_time; #報名開始時間
    public $rule_end_time;  #報名截止時間
    public $rule_content; #活動內容
    public $account; #人員 陣列
    
    function insert_sign(){
        // echo $this->rule_accompany;
        // exit;
        #活動名稱
        if(!isset($this->rule_title) || empty($this->rule_title)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 2;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_title = str_SQL_replace($this->rule_title);
        if(!filter_var($rule_title,  FILTER_SANITIZE_STRING)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 3;
            $arry_result["mesg"] = "新增活動失敗，資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #限制人數
        if(!isset($this->rule_limit) || empty($this->rule_limit)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 4;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_limit = str_SQL_replace($this->rule_limit);
        if(!filter_var($rule_limit,  FILTER_VALIDATE_INT)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 5;
            $arry_result["mesg"] = "新增活動失敗，資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #是否可以攜伴 1:是 0:否
        if(!isset($this->rule_accompany) || $this->rule_accompany != '0' && $this->rule_accompany != '1'){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 6;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_accompany = str_SQL_replace($this->rule_accompany);
        
        #報名開始時間
        if(!isset($this->rule_start_time) || empty($this->rule_start_time)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 8;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_start_time = str_SQL_replace($this->rule_start_time);
        if(!filter_var($rule_start_time,  FILTER_SANITIZE_STRING)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 9;
            $arry_result["mesg"] = "新增活動失敗，資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #報名截止時間
        if(!isset($this->rule_end_time) || empty($this->rule_end_time)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 10;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_end_time = str_SQL_replace($this->rule_end_time);
        if(!filter_var($rule_end_time,  FILTER_SANITIZE_STRING)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 11;
            $arry_result["mesg"] = "新增活動失敗，資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #活動內容
        if(!isset($this->rule_content) || empty($this->rule_content)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 12;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        $rule_content = str_SQL_replace($this->rule_content);
        if(!filter_var($rule_content,  FILTER_SANITIZE_STRING)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 13;
            $arry_result["mesg"] = "新增活動失敗，資料格式有誤!";
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
        #人員 陣列
        if(!isset($this->account) || empty($this->account)){
            $arry_result["isTrue"] = false;
            $arry_result["errorCod"] = 14;
            $arry_result["mesg"] = "新增活動失敗，資料傳輸失敗!";
            $arry_result['error'] = $arry_result;
            return $arry_result;    
        }
        foreach($this->account as $val){
            if(!filter_var($val,  FILTER_SANITIZE_STRING)){
                $arry_result["isTrue"] = false;
                $arry_result["errorCod"] = 15;
                $arry_result["mesg"] = "新增活動失敗，資料格式有誤!";
                $arry_result['error'] = $arry_result;
                return $arry_result;
            }
        }
        $account = implode (',', $this->account);
        
        // echo $account;
        // exit;
        $IP = getIP();
        
        #連結資料庫
        $db = new Database();
        $sql = "INSERT INTO `sign_rule`(`rule_title`,`rule_limit`,`rule_accompany`,`rule_start_time`,`rule_end_time`,`rule_create_ip`,`rule_create_time`,`rule_participant`,`rule_content`)
                VALUES ('$rule_title','$rule_limit','$rule_accompany','$rule_start_time','$rule_end_time','$IP',NOW(),'$account','$rule_content')";
        // echo $sql;
        // exit;
        if($db->insert($sql)){
            $arry_result['isTrue'] = true;
            $arry_result['mesg'] = "新增活動成功!";
            $arry_result["errorCod"] = 1;
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }else{
            $arry_result['isTrue'] = false;
            $arry_result['mesg'] = "新增活動失敗，資料庫有誤";
            $arry_result["errorCod"] = 16;
            $arry_result['error'] = $arry_result;
            return $arry_result;
        }
    }
    
}
?>