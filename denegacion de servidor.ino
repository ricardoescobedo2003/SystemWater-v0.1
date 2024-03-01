#include <Servo.h>

Servo myservo;  // create servo object to control a servo

String dataString = "";    
bool dataComplete = false;
int data = 0;


void setup() {
  Serial.begin(9600);
  myservo.attach(9);  // attaches the servo on pin 9 to the servo object
}

void loop() {
  
 if (dataComplete) {
    data = dataString.toInt();
    
    /////////Tarea a realizar /////////////
    task();
    //////////////////////////////////////
    
    dataString = "";
    dataComplete = false;
  }

}

void serialEvent() {
  while (Serial.available()) {
    char inChar = (char)Serial.read();
    dataString += inChar;
    if (inChar == '\n') {
      dataComplete = true;
    }
  }
}

void task(){
  myservo.write(data);
}
