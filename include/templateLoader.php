<?php
    function loadTemplate($fileName,$tempVars){
        extract($tempVars);
        ob_start();
        require($fileName);
        $content = ob_get_clean();
        return $content;
    }

?>