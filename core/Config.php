<?PHP
class Config {
    
    public $projectName;
    public $root;
    public $imgRoot;
    public $cssRoot;
    public $jsRoot;
    
    public $db;
    
    public $whiteList;
    
    function __construct(){
         /* 專案名稱 - <title> */
        $this->projectName = 'MaxBooking';
        
        /* 專案目錄結構設定 */
        $this->root = '/Booking/';
        $this->imgRoot = $this->root . 'views/images/';
        $this->cssRoot = $this->root . 'views/css/';
        $this->jsRoot = $this->root . 'views/js/';

        /* 資料庫連線設定 */
        $this->db['host']       = 'localhost';
        $this->db['port']       = '3306';
        $this->db['username']   = 'max';
        $this->db['password']   = '123456';
        $this->db['dbname']     = 'maxbooking';
        
        
        /* 不需要經過 是否登入狀態 的 request */
        $this->whiteList = array(  "home",
                                );
    }
}
?>