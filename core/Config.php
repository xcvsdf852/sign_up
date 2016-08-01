<?PHP
class Config {
    
    public static $projectName;
    public static $root;
    public static $imgRoot;
    public static $cssRoot;
    public static $jsRoot;
    
    public static $db;
    
    public static $whiteList;
    
    static function getInstance(){
         /* 專案名稱 - <title> */
        self::$projectName = 'Max Booking';
        
        /* 專案目錄結構設定 */
        self::$root = '/Booking/';
        self::$imgRoot = self::$root . 'views/images/';
        self::$cssRoot = self::$root . 'views/css/';
        self::$jsRoot = self::$root . 'views/js/';

        /* 資料庫連線設定 */
        self::$db['host']       = 'localhost';
        self::$db['port']       = '3306';
        self::$db['username']   = 'max';
        self::$db['password']   = '123456';
        self::$db['dbname']     = 'maxbooking';
        
        
        /* 不需要經過 是否登入狀態 的 request */
        self::$whiteList = array(  "home",
                                );
    }
}
?>