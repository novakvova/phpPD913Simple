<?php
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        echo "OK server ". $_POST["id"];
    }
?>