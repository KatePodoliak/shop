<?php 

class Application
{
    protected $router;
    private static $db;
    public static $userSession;

    public function __construct(){
        $this->router = null;
        self::$db = MyDB::connect();
        self::$userSession = new UserSessions();
    }

    public function run(){
        $this->router = new Route();
        $this->router->route();
    }

    public static function getDb()
    {
        return self::$db;
    }

    public static function getUserSession(){
        return self::$userSession;
    }

    public static function getVariable($v, $def){
        $var = $def;
        if (isset($_POST[$v]))
            $var = $_POST[$v];
        else if (isset($_GET[$v]))
            $var = $_GET[$v];
        return $var;
    }

    public static function error404(){
        header("HTTP/1.0 404 Not Found");
        echo "<h1>Page not found!</h1>";
        exit();
    }
}

?>