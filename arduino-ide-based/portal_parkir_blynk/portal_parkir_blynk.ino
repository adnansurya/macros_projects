#define BLYNK_TEMPLATE_ID "TMPL6HCaZ-JPk"
#define BLYNK_TEMPLATE_NAME "Quickstart Template"
#define BLYNK_AUTH_TOKEN "1iHrBJznt5Kj_-DhPOF_Yx_otcakx6tG"

#include <Servo.h>
#include <NewPing.h>
#include <WiFi.h>
#include <WiFiClient.h>
#include <BlynkSimpleEsp32.h>

#define BLYNK_PRINT Serial

#define infra1Pin 4
#define infra2Pin 5
#define ldrPin 35
#define servoPin 23

#define trig1Pin 32
#define trig2Pin 25
#define echo1Pin 33
#define echo2Pin 26

char ssid[] = "Cafe Tulus";
char pass[] = "PesanDulu";

BlynkTimer timer;

const int maxJarak = 200;
const int batasJarak = 10;

Servo myservo = Servo();
NewPing sonar1(trig1Pin, echo1Pin, maxJarak);
NewPing sonar2(trig2Pin, echo2Pin, maxJarak);

const int sudutBuka = 0;
const int sudutTutup = 90;

bool mobilMasuk = false;
bool mobilKeluar = false;

int infra1Val, infra2Val, ldrVal;
int lastInfra1, lastInfra2;
int ultra1Val, ultra2Val;


void setup() {
  Serial.begin(115200);
  Blynk.begin(BLYNK_AUTH_TOKEN, ssid, pass);

  pinMode(infra1Pin, INPUT);
  pinMode(infra2Pin, INPUT);

  myservo.write(servoPin, sudutTutup);

  infra1Val = !digitalRead(infra1Pin);
  infra2Val = !digitalRead(infra2Pin);
  lastInfra1 = infra1Val;
  lastInfra2 = infra2Val;

  timer.setInterval(500L, myTimerEvent);
}

void myTimerEvent() {

  infra1Val = !digitalRead(infra1Pin);
  infra2Val = !digitalRead(infra2Pin);

  ldrVal = !digitalRead(ldrPin);

  ultra1Val = sonar1.ping_cm();
  ultra2Val = sonar2.ping_cm();

  debugSensor();

  Blynk.virtualWrite(V1, ultra1Val);
  Blynk.virtualWrite(V2, ultra2Val);

  if (ultra1Val < batasJarak) {
    Blynk.virtualWrite(V3, "Ada Mobil");
  } else {
    Blynk.virtualWrite(V3, "Kosong");
  }

  if (ultra2Val < batasJarak) {
    Blynk.virtualWrite(V4, "Ada Mobil");
  } else {
    Blynk.virtualWrite(V4, "Kosong");
  }

  if ((infra1Val != lastInfra1) || (infra2Val != lastInfra2)) {
    if (infra1Val == 1 || infra2Val == 1) {
      Blynk.virtualWrite(V0, 1);
      myservo.write(servoPin, sudutBuka);
      Serial.println("BUKA PORTAL");
    }

    if (infra1Val == 0 && infra2Val == 0) {
      Blynk.virtualWrite(V0, 0);
      myservo.write(servoPin, sudutTutup);
      Serial.println("TUTUP PORTAL");
    }
  }

  lastInfra1 = infra1Val;
  lastInfra2 = infra2Val;
}

BLYNK_WRITE(V0) {
  // Set incoming value from pin V0 to a variable
  int value = param.asInt();

  // Update state
  // Blynk.virtualWrite(V0, value);
  if (value == 1) {
    myservo.write(servoPin, sudutBuka);
    Serial.println("BUKA PORTAL");
  } else {
    myservo.write(servoPin, sudutTutup);
    Serial.println("TUTUP PORTAL");
  }
}

void loop() {
  Blynk.run();
  timer.run();
}

void debugSensor() {
  Serial.print("infra1Val: ");
  Serial.print(infra1Val);
  Serial.print("\tinfra2Val: ");
  Serial.print(infra2Val);
  Serial.print("\tldrVal: ");
  Serial.print(ldrVal);
  Serial.print("\tultra1Val: ");
  Serial.print(ultra1Val);
  Serial.print("\tultra2Val: ");
  Serial.print(ultra2Val);
  Serial.println();
}
