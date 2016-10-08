<?php
// ("whoami" コマンドをパスに有するシステム上で)
// 実行中のphp/httpdプロセスを所有するユーザーの名前を出力
echo exec('ls -l');
echo exec('rm log.txt');
echo exec('java -jar WISclient.jar');
echo exec('telnet localhost 9001');
?>
