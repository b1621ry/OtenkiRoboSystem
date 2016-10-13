<?php
$fileName = "../Command/result.txt";

$otenki_types = ["くもり","晴れ","雨","雪"];

//天気結果の読み込み
$result =file_get_contents($fileName);

//天気の判別
if(preg_match('/くもり/',$result) || preg_match('/雨/',$result) || preg_match('/雪/',$result) )
{
    echo exec('say te ru te ru ki doooo');
}else if(preg_match('晴れ',$result)){
    echo exec('say ama go i ki doooo');
}

?>
