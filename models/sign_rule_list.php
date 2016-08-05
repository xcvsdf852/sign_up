<?php
session_start();
require_once("package/Database.php");


class sign_rule_list{
    #取得全部清單
    function get_all_rule_list(){
        $db = new Database();
        $sql ="SELECT `rule_id`,`rule_title`,`rule_limit`,`rule_accompany`,`rule_start_time`,`rule_end_time`,`rule_content`,`rule_url_id`
               FROM `sign_rule` 
               WHERE  `rule_IsEnable` =  '1' 
               ORDER BY `rule_create_time` DESC";
       $ary_return['date'] = $db->select($sql);
       $ary_return['isTrue'] = true;
       return json_encode($ary_return);
    }
    #取得活動開始清單
    function get_now_rule_list(){
        $db = new Database();
        $sql = "SELECT  `rule_id` ,  `rule_title` ,  `rule_limit` ,  `rule_accompany` ,  `rule_start_time` ,  `rule_end_time` ,  `rule_content` 
                FROM  `sign_rule` 
                WHERE  `rule_IsEnable` =  '1'
                AND  `rule_start_time` < NOW( ) 
                AND  `rule_end_time` > NOW( ) 
                ORDER BY  `rule_create_time` DESC";
        $ary_return['date'] = $db->select($sql);
        $ary_return['isTrue'] = true;
        return json_encode($ary_return);
    }
}

// $a = new sign_rule_list;
// echo $a->get_all_rule_list();
?>