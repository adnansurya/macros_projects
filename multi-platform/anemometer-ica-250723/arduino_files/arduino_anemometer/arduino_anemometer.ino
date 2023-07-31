#include <SoftwareSerial.h>

#define rxPin 10
#define txPin 11

#define READ_TIME 1000 //ms
#define WIND_SENSOR_PIN 2 //wind sensor pin
#define WIND_SPEED_20_PULSE_SECOND 1.75  //in m/s this value depend on the sensor type
#define ONE_ROTATION_SENSOR 20.0


SoftwareSerial mySerial(rxPin, txPin); // RX, TX
volatile unsigned long Rotations; //Cup rotation counter used in interrupt routine

float WindSpeed; //Speed meter per second

unsigned long gulStart_Read_Timer = 0;

void setup(){
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }
  mySerial.begin(9600);
  pinMode(WIND_SENSOR_PIN,INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(WIND_SENSOR_PIN),isr_rotation, CHANGE); //Set up the interrupt

  //Serial.println("Rotations\tm/s");
  sei(); //Enables interrupts
  gulStart_Read_Timer - millis();
}

void loop()
{
  if((millis() - gulStart_Read_Timer) >= READ_TIME)
  {
    cli(); //Disable interrupts
   
    //convert rotation to wind speed in m/s
    WindSpeed = WIND_SPEED_20_PULSE_SECOND/ONE_ROTATION_SENSOR*(float)Rotations;
    //Serial.print("\t\t");
    //Serial.print(Rotations); 
    Serial.print("Speed : "); 
    Serial.print(WindSpeed); 
    Serial.println(" m/s");

    mySerial.println(WindSpeed);
    sei(); //Enables interrupts

    Rotations = 0; //Set Rotations count to 0 ready for calculations
    gulStart_Read_Timer = millis();
  }
}

// This is the function that the interrupt calls to increment the rotation count
void isr_rotation()
{
    Rotations++;
}
