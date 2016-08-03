<?PHP

class RegistController extends Controller{
     
     #報名活動頁
     function index($id){
          if(!isset($id)){
               $arry_result['mesg'] = "活動報名網址有誤";
               $this->view('error',$arry_result);
          }
          $user=$this->model("check_action");
          #檢查該筆活動日期是否可以報名
          $arry_result = $user->check_date($id);
          // var_dump($arry_result);
          // exit;
          if($arry_result["isTrue"]){
               $this->view('Regist',$arry_result);
          }else{
               $this->view('error',$arry_result);
          }
          
     }
     #檢查報名資格check_qualifications
     function Regist_qualifications(){
          // var_dump($_POST);
          // exit;
          $user=$this->model("Regist_participant");
          $user->POST_data = $_POST;
          $arry_result = $user->check_qualifications();
          // var_dump($arry_result);
          // exit;
          if(!$arry_result['isTrue']){
               // header('Location: /sign_up/Regist/index/'.$arry_result['id'].'');
               $this->view('error',$arry_result);
          }
          
     }
     

     // 參與者列表
     // function participant_list($n){
     //      $this->view('Backstage_list',$n);
     // }
}
?>