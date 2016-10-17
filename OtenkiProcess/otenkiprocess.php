<?php
   //ファイルの読み込み用
   $fileName = "../Command/log.txt";
   $fileData = file($fileName);

   //XMLの読み込み用
   $fileDataSize = count($fileData);
   $xmlLink = "nil";
   $html = "nil";

   //お天気情報の取得用
   $forcast = "nil";

   //ファイルからxmlリンクを抽出
   if(preg_match_all('(https?://[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]+)', $fileData[count($fileData)-2], $result) !== false){
           //var_dump($result);
           $xmlLink = $result[0][0];
    }
   $html = file_get_contents($xmlLink);
   $forcast = new SimpleXMLElement($html);

   //xmlリンクから明日の天気を取得
   $forcasts = array();
   $tom_forcast = array();
   $i =0;
   foreach ($forcast->Body->MeteorologicalInfos->TimeSeriesInfo->Item->Kind->Property->DetailForecast->WeatherForecastPart
    as $value) {
       $forcasts[$i] = $value;
       $i++;
   }
   $i=0;

    $sent_data = $forcasts[1]->Sentence;

    //天気の判別
    if(preg_match('/くもり/',$sent_data) || preg_match('/雨/',$sent_data) || preg_match('/雪/',$sent_data) )
    {
        print "0";
    }else if(preg_match('/晴れ/',$result)){
        print "1";
    }else{
        print "-1";
    }
    echo exec('telnet localhost 9001');

?>
