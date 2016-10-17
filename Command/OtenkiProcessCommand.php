<?php
    $err_count = 0;
    $chek_flag = FALSE;


    #天気を獲得できたかチェック
    if(file_exists('../Command/log.txt')){
        $text = file_get_contents('../Command/log.txt');
        if($text == ''){
            exec('php OtenkiGetCommand.php');
            echo "false";
        }else{
            exec('php ../OtenkiProcess/otenkiprocess.php >> result.csv' );
            echo "Success!";
        }
    }


?>
