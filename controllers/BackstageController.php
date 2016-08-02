<?PHP

class BackstageController extends Controller{
     
     #新增報名活動頁
     function index(){
          $this->view('Backstage_index');
     }
     #活動報名列表
     function sign_list(){
          $this->view('Backstage_list');
     }
}
?>