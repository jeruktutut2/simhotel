<?php
    class Routing{
        public function __construct(){
            $url = $this->parseUrl();
            if (file_exists("controller/".$url[0].".php")) {
                require_once "controller/".$url[0].".php";
                unset($url[0]);
            } else {
                require_once "view/error/404.php";
            }
        }
        public function parseUrl(){
            if (isset($_GET['url'])) {
                return explode('/',filter_var(trim($_GET['url'],'/'),FILTER_SANITIZE_URL));
            }
        }
    }

?>
