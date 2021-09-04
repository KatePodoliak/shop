<?php

class Sessions
{
    private $ses_id;

    public function __construct($path = ''){
        session_start();
        $this->ses_id = session_id();
    }

    public function getIdSession(){
        return $this->ses_id;
    }
}

?>