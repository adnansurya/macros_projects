#include <WiFi.h>
#include <HTTPClient.h>

#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);  // Alamat I2C dan ukuran layar LCD (16 kolom dan 2 baris)



const char* ssid = "REPLACE_WITH_YOUR_SSID";
const char* password = "REPLACE_WITH_YOUR_PASSWORD";

String serverName = "http://172.20.10.4/tugasakhir/tugasakhir/input_angin.php";

void setup() {

  Serial.begin(9600);  // Inisialisasi komunikasi serial pada baud rate 9600
  
  lcd.init();
  // lcd.begin();
  lcd.backlight();

  WiFi.begin(ssid, password);
  Serial.println("Connecting");

  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Connecting");

  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    lcd.print(".");
  }

  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Connected to:");
  lcd.setCursor(0,1);
  lcd.print(ssid);

  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

  delay(1000);
}

void loop() {
  // Membaca data dari Arduino Uno yang dikirimkan melalui komunikasi serial

  if (Serial.available() > 0) {

    String terimaData = Serial.readStringUntil('\n');
    terimaData.trim();

    Serial.println("Data Sensor Dari Arduino: " + terimaData);
  
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Kecepatan Angin:");
    lcd.setCursor(0, 1);
    lcd.print("->");
    lcd.print(terimaData);

    float kecepatan_angin = terimaData.toFloat();

    sendData(kecepatan_angin);
    
  }


  // delay(1000);
}

void sendData(float wind_speed) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;

    String serverPath = serverName + "?kecepatan=" + String(wind_speed);

    // Your Domain name with URL path or IP address with path
    http.begin(serverPath.c_str());

    // If you need Node-RED/server authentication, insert user and password below
    //http.setAuthorization("REPLACE_WITH_SERVER_USERNAME", "REPLACE_WITH_SERVER_PASSWORD");

    // Send HTTP GET request
    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      String payload = http.getString();
      Serial.println(payload);
    } else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  } else {
    Serial.println("WiFi Disconnected");
  }
}
