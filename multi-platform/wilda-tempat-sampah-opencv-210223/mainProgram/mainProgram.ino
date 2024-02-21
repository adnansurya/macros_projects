#include <Servo.h>

Servo servo1;  // Servo pertama
Servo servo2;  // Servo kedua

int plastic = 0;  // Posisi servo untuk plastik
int metal = 180;  // Posisi servo untuk logam

int object = 0;
int lastobject = 0;
unsigned long timer;

void setup() {
  Serial.begin(9600);
  Serial.setTimeout(20);
  
  servo1.attach(9);
  servo2.attach(10);
  
  servo1.write(90);  // Posisi awal servo1 (tengah-tengah)
  servo2.write(90);  // Posisi awal servo2 (tengah-tengah)
  
  pinMode(LED_BUILTIN, OUTPUT);
}

void loop() {
  if (Serial.available() > 0) {
    String detect = Serial.readStringUntil("\n");
    digitalWrite(LED_BUILTIN, HIGH);
    Serial.println(detect);
    if (detect == String("plastic\n")) {
      object = 2;
    } else if (detect == String("can\n")) {
      object = 3;
    } else {
      Serial.println("Not Detected");
      servo1.write(90);
      servo2.write(90);
    }
  }

  if (lastobject != object) {
    timer = millis();
    switch (object) {
      case 2:
        Serial.println("Plastic");
        // Posisi servo untuk plastik
        servo1.write(plastic);
        servo2.write(metal);
        break;
      case 3:
        Serial.println("Can");
        // Posisi servo untuk kaleng
        servo1.write(metal);
        servo2.write(plastic);
        break;
      default:
        // Posisi awal untuk tidak ada objek terdeteksi
        servo1.write(90);
        servo2.write(90);
        digitalWrite(LED_BUILTIN, LOW);
        break;
    }
    lastobject = object;
  } else {
    if (millis() - timer >= 5000) {
      // Setelah 5 detik tanpa perubahan, kembalikan servo ke posisi tengah
      servo1.write(90);
      servo2.write(90);
      digitalWrite(LED_BUILTIN, LOW);
    }
  }
  
  // Debugging: Mencetak nilai variabel ke monitor serial
  Serial.print("object: ");
  Serial.println(object);
  Serial.print("lastobject: ");
  Serial.println(lastobject);
  Serial.print("timer: ");
  Serial.println(timer);
}
