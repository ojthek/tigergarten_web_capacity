<?php
    function printChecked($checked) {
        if ($checked == 1) {
            return "<img src=\"resources/checked.svg\" />";
        }else {
            return "<img src=\"resources/unchecked.svg\" />";
        }    
    }
?>