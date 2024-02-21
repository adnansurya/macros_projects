#include <Servo.h>
#include <SoftwareSerial.h>

#define servo1Pin 5
#define servo2Pin 6

Servo servo1, servo2;
SoftwareSerial mySerial(10, 11); // RX, TX

void setup() {

  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }
  mySerial.begin(9600);
  
  servo1.attach(servo1Pin);
  servo2.attach(servo2Pin);

  servo1.write(90);
  servo2.write(90);

}

void loop() {
  
  if(mySerial.available() > 0){
    String dataTerima = mySerial.readStringUntil('\n');
    Serial.print("DATA TERIMA : ");
    Serial.println(dataTerima);
  }

}
