<?php
require_once("package/Database.php");
class participant_list{
    
    function now_participant_list($id){
        
        $db = new Database();
        $sql = "SELECT `list_id`, `list_pa_id`, `list_name`, `list_num` 
        FROM `sign_list` 
        WHERE `list_rule_id` = $id";
        // $ary_return['date'] = $db->select($sql);
        // $ary_return['isTrue'] = true;
        return $db->select($sql);
    }
}


?>