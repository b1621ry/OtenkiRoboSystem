// シリアルライブラリを取り入れる
import processing.serial.*;

// myPort（任意名）というインスタンスを用意
Serial myPort;

int on = 0;
Table wether;
byte i;

void setup(){
  // 画面サイズ
  size(128, 128);

  // シリアルポートの設定
  myPort = new Serial(this, "COM6", 9600);
  myPort.write(0);
  aa();
  
  exit();
}



void draw() {
  if(on == 1) {
    // 背景色を白に設定
    background(255);
  }
  else {
    // 背景色を黒に設定
    background(0);
  }
}

void aa(){
  delay(5000);
  wether = loadTable("wether.csv");
  if(wether.getFloat(0,0) == 1) {
    on = 1;
  } else {
    on = 0;;
  }
  myPort.write(on);
  
  delay(65000);
}