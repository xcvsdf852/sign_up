<?php
session_start();
require_once("package/Database.php");

class account_list{
    function get_list(){
        $db = new Database();
        $sql = "SELECT * FROM `sign_participant`";
        
        $ary_return['date'] = $db->select($sql);
        $ary_return['isTrue'] = true;
        return json_encode($ary_return);

    }
}

// $a = new acount_list;
// echo $a->get_list();
?>