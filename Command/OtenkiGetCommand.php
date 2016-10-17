<?php

    if(file_exists('../Command/log.txt')){
        echo exec('rm ../OtenkiGet/log.txt');
    }
    echo exec('java -jar ../OtenkiGet/WISclient.jar');
?>
