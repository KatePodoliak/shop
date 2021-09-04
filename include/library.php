<?php
	function getVariable($v, $def) 
    {
        $var = $def;
        if (isset($_POST[$v]))
            $var = $_POST[$v];
        else if (isset($_GET[$v]))
            $var = $_GET[$v];
        return $var;
    }
?>