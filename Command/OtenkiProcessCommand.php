<?php
    $err_count = 0;
	$chek_flag = FALSE;
	
	#WISclient停止
	#sleep(10);
	
	#天気を獲得できたかチェック
	if(file_exists('../Command/log.txt')){
		$text = file_get_contents('../Command/log.txt');
		if($text == ''){
			exec('php OtenkiGetCommand.php');
			echo "false";
		}else{
			exec('php ../OtenkiProcess/otenkiprocess.php >> sample.txt' );
			echo "hoge";
		}
	}
	
	
?>