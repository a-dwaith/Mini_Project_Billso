#include <ESP8266WiFi.h>
#include <SPI.h>
#include <MFRC522.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

const char* ssid = "Phobi";                   //network SSID
const char* password = "97479088211";          //network password

const int D3 = 0; // GPIO0
const int D4 = 2; // GPIO2

ESP8266WebServer server(80);
constexpr uint8_t RST_PIN = 5;     // Configurable, see typical pin layout above
constexpr uint8_t SS_PIN = 4;     // Configurable, see typical pin layout above
String page = "";
MFRC522 rfid(SS_PIN, RST_PIN); // Instance of the class

MFRC522::MIFARE_Key key;

// Init array that will store new NUID
byte nuidPICC[4];
unsigned int storedValue = 0; // Variable to store the array value
int a;
double total = 0;
int count_prod = 0;
int count = 0;
int p1=0,p2=0,p3=0,p4=0;
int c1=0,c2=0,c3=0,c4=0;

void setup() {
  Serial.begin(115200);
  delay(10);

  // Connect to Wi-Fi
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  server.begin();
  
  // initialize the LCD
  lcd.begin();

  // Turn on the blacklight and print a message.
  lcd.backlight();
  lcd.setCursor(0, 0);
  lcd.print("   Smart Shop");
  lcd.setCursor(0, 1);
  lcd.print("   By team 8");
  delay(2000);
  //lcd.clear();
  //lcd.setCursor(0, 0);
  //lcd.print("   Add Items");
  //lcd.clear();
  pinMode(D3,INPUT_PULLUP);
  pinMode(D4,OUTPUT);
  Serial.begin(115200);
  SPI.begin(); // Init SPI bus
  rfid.PCD_Init(); // Init MFRC522

  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }
  server.on("/", []()
  {
    String page = "<html><head><title>E Cart using IoT</title></head><style type=\"text/css\">";
    page += "table{border-collapse: collapse;}th {background-color:  #3498db ;color: white;}table,td {border: 4px solid black;font-size: x-large;";
    page += "text-align:center;border-style: groove;border-color: rgb(255,0,0);}</style><body><center>";
    page += "<h1>Smart Shopping Cart using IoT</h1><br><br><table style=\"width: 1200px;height: 450px;\"><tr>";
    page += "<th>ITEMS</th><th>QUANTITY</th><th>COST</th></tr><tr><td>Biscuit</td><td>"+String(p1)+"</td><td>"+String(c1)+"</td></tr>";
    page += "<tr><td>Soap</td><td>"+String(p2)+"</td><td>"+String(c2)+"</td></tr><tr><td>Rice(1KG)</td><td>"+String(p3)+"</td><td>"+String(c3)+"</td>";
    page += "</tr><tr><td>Tea(50g)</td><td>"+String(p4)+"</td><td>"+String(c4)+"</td></tr><tr><th>Grand Total</th><th>"+String(count_prod)+"</th><th>"+String(total)+"</th>";
    page += "</tr></table><br><input type=\"button\" name=\"Pay Now\" value=\"Pay Now\" style=\"width: 200px;height: 50px\"></center></body></html>";
    server.send(200, "text/html", page);
  });
  
  server.begin();
  }

void loop() {
  int a=digitalRead(D3);
  
  // Look for new cards
  if (!rfid.PICC_IsNewCardPresent())
    return;

  // Verify if the NUID has been read
  if (!rfid.PICC_ReadCardSerial())
    return;

  // Store NUID into nuidPICC array
  for (byte i = 0; i < 4; i++) {
    nuidPICC[i] = rfid.uid.uidByte[i];
  }

  // Convert array value to an integer
  storedValue = (nuidPICC[0] << 24) | (nuidPICC[1] << 16) | (nuidPICC[2] << 8) | nuidPICC[3];
      
  if (storedValue == 3619192644 && a==1)
      {
        //lcd.begin();

        // Turn on the blacklight and print a message.
        //lcd.backlight();
        //lcd.setCursor(0, 0);
        //lcd.print("Biscuit added");
        //lcd.setCursor(0, 1);
        //lcd.print("Price 35");
        //Serial.print("Hi");
        digitalWrite(D4,HIGH);
        delay(500);
        Serial.println("");
        Serial.println("Biscuit Added       ");
        Serial.println("Price(Rs):35.00      ");
        total = total + 35.00;
        p1++;
        Serial.print("Total :");
        Serial.print(total);
        count_prod++;
        digitalWrite(D4,LOW);
        //lcd.clear();
      }
  else if (storedValue == 3619192644 && a==0)
      {
        if(p1>0) 
        {
            digitalWrite(D4,HIGH);
            delay(500);
            Serial.println("");
            Serial.println("Biscuit Removed       ");
            Serial.println("Price(Rs):-35.00      ");
            p1--;
            total = total - 35.00;
            Serial.print("Total :");
            Serial.print(total);
            count_prod--;
            digitalWrite(D4,LOW);
        }
        else
        {
            Serial.println("");
            Serial.println("Not in cart!!!        ");
            digitalWrite(D4,HIGH);
            delay(500);
            digitalWrite(D4,LOW);
        }
      }
  else if (storedValue == 139918923 && a == 1 )
      {
        //lcd.begin();

        // Turn on the blacklight and print a message.
        //lcd.backlight();
        //lcd.setCursor(0, 0);
        //lcd.print("Milk added");
        //lcd.setCursor(0, 1);
        //lcd.print("Price 35");
        //lcd.clear();
        digitalWrite(D4,HIGH);
        delay(500);
        Serial.println("");
        Serial.println("Milk       ");
        Serial.println("Price(Rs):25.00      ");
        total = total + 25.00;
        p2++;
        Serial.print("Total :");
        Serial.print(total);
        count_prod++;
        digitalWrite(D4,LOW);
      }
  else if (storedValue == 139918923 && a==0)
      {
        if(p2>0) 
        {
            digitalWrite(D4,HIGH);
            delay(500);
            Serial.println("");
            Serial.println("Milk Removed       ");
            Serial.println("Price(Rs):-25.00      ");
            p2--;
            total = total - 25.00;
            Serial.print("Total :");
            Serial.print(total);
            count_prod--;
            digitalWrite(D4,LOW);
        }
        else
        {
            Serial.println("");
            Serial.println("Not in cart!!!        ");
            digitalWrite(D4,HIGH);
            delay(500);
            digitalWrite(D4,LOW);
        }
      }
  // Halt PICC
  rfid.PICC_HaltA();
  // Stop encryption on PCD
  rfid.PCD_StopCrypto1();
  server.handleClient();
}
