<?php

class Request {

    public $url; // URL appellé par l'utilisateur
    public $page = 1;
    public $prefix = false;
    public $data = false;

    function __construct() {

        $this->url = isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '/';
       
        if (isset($_GET['page'])) {
            if (is_numeric($_GET['page'])) {
                if ($_GET['page'] > 0) {
                    $this->page = round($_GET['page']);
                }
            }
        }
        if (!empty($_POST)) {
            $this->date = new stdClass();
            foreach ($_POST as $k => $v) {
                $this->data->$k = $v;
            }
        }
    }

}

?>