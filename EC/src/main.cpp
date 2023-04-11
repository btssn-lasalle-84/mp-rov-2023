/*
*    - Mesurer la température
*    - Mesure l'humidité
*    - Se déplacer : Avancer, reculer, tourner à gauche, tourner à droite, s'arrêter
*    - Déplacer la caméra : Pivoter, s'incliner
*/


#include <Arduino.h>          //inclusion de la librairie Arduino.h
#include <Servo.h>            //inclusion de la librairie Servo.h
#include <Adafruit_Sensor.h>  //inclusion de la librairie Adafruit_Sensor.h
#include <DHT.h>              //inclusion de la librairie DHT.h
#include  "rovChenille.h"     //inclusion du repertoire rovChenille.h
   
Servo moteurCameraPan;  
Servo moteurCameraTilt;
DHT hygrometre(DHTPIN, DHTTYPE);


void setup()
{
  moteurCameraPan.attach(PIN_MOTEUR_PAN);         //On assigne un port au moteur
  moteurCameraTilt.attach(PIN_MOTEUR_TILT);       //On assigne un port au deuxiemme moteur
  moteurCameraPan.write(POSITION_INITIALE_PAN);   //On indique la position initiale du moteur panoramique
  moteurCameraTilt.write(POSITION_INITIALE_TILT); //On indique la position initiale du moteur vertical
  Serial.begin(VITESSE_TRANSFERT);                //On paramètre à la vitesse à : VITESSE_TRANSFERT qui vaut : 9600 bauds
  hygrometre.begin();
  pinMode(BORNE_ENA, OUTPUT);                     //On associe la borne "ENA" du L298N à la pin D10 de l'arduino
  pinMode(BORNE_IN1, OUTPUT);                     //On associe la borne "IN1" du L298N à la pin D9 de l'arduino
  pinMode(BORNE_IN2, OUTPUT);                     //On associe la borne "IN2" du L298N à la pin D8 de l'arduino
  pinMode(BORNE_IN3, OUTPUT);                     //On associe la borne "IN3" du L298N à la pin D7 de l'arduino
  pinMode(BORNE_IN4, OUTPUT);                     //On associe la borne "IN4" du L298N à la pin D6 de l'arduino
  pinMode(BORNE_ENB, OUTPUT);                     //On associe la borne "ENB" du L298N à la pin D5 de l'arduino
  pinMode(pinBoutonChaines , INPUT_PULLUP);       //On active la résistance pull up
}

// Fonction pour arrêter les moteurs du robot
void arret()
{
  digitalWrite(BORNE_ENA, LOW); // Désactive le signal de commande du moteur A
  digitalWrite(BORNE_ENB, LOW); // Désactive le signal de commande du moteur B
}

// Fonction pour faire reculer le robot
void reculer()
{
  digitalWrite(BORNE_ENA, HIGH);  
  digitalWrite(BORNE_ENB, HIGH);  
  digitalWrite(BORNE_IN1, LOW);   
  digitalWrite(BORNE_IN2, HIGH);  
  digitalWrite(BORNE_IN3, LOW);   
  digitalWrite(BORNE_IN4, HIGH);  
}

// Fonction pour faire avancer le robot
void avancer()
{
  digitalWrite(BORNE_ENA, HIGH);  
  digitalWrite(BORNE_ENB, HIGH);  
  digitalWrite(BORNE_IN1, HIGH);  
  digitalWrite(BORNE_IN2, LOW);   
  digitalWrite(BORNE_IN3, HIGH);  
  digitalWrite(BORNE_IN4, LOW);   
}



void arret()
{
  digitalWrite(BORNE_ENA, LOW);      
  digitalWrite(BORNE_ENB, LOW);
}

void reculer()
{
  digitalWrite(BORNE_ENA, HIGH);  // Active le signal de commande du moteur A
  digitalWrite(BORNE_ENB, HIGH);  // Active le signal de commande du moteur B
  digitalWrite(BORNE_IN1, LOW);   // Met la borne IN1 du moteur A à 0 (sens inverse)
  digitalWrite(BORNE_IN2, HIGH);  // Met la borne IN2 du moteur A à 1 (sens inverse)
  digitalWrite(BORNE_IN3, LOW);   // Met la borne IN3 du moteur B à 0 (sens inverse)
  digitalWrite(BORNE_IN4, HIGH);  // Met la borne IN4 du moteur B à 1 (sens inverse)
}

void avancer()
{
  digitalWrite(BORNE_ENA, HIGH);  // Active le signal de commande du moteur A
  digitalWrite(BORNE_ENB, HIGH);  // Active le signal de commande du moteur B
  digitalWrite(BORNE_IN1, HIGH);  // Met la borne IN1 du moteur A à 1 (sens normal)
  digitalWrite(BORNE_IN2, LOW);   // Met la borne IN2 du moteur A à 0 (sens normal)
  digitalWrite(BORNE_IN3, HIGH);  // Met la borne IN3 du moteur B à 1 (sens normal)
  digitalWrite(BORNE_IN4, LOW);   // Met la borne IN4 du moteur B à 0 (sens normal)
}

void rotationDroite()
{
  digitalWrite(BORNE_ENA, HIGH);   // Active la roue droite   
  digitalWrite(BORNE_ENB, HIGH);   // Active la roue gauche 
  digitalWrite(BORNE_IN1, HIGH);   // Tourne la roue droite vers l'avant
  digitalWrite(BORNE_IN2, LOW);    // Tourne la roue droite vers l'avant
  digitalWrite(BORNE_IN3, LOW);    // Met la borne IN3 du moteur B à 0 (sens inverse)
  digitalWrite(BORNE_IN4, HIGH);   // Met la borne IN4 du moteur B à 1 (sens inverse)
}

void rotationGauche()
{
  digitalWrite(BORNE_ENA, HIGH);   // Active la roue droite
  digitalWrite(BORNE_ENB, HIGH);   // Active la roue gauche 
  digitalWrite(BORNE_IN1, LOW);    // Tourne la roue droite vers l'arrière
  digitalWrite(BORNE_IN2, HIGH);   // Tourne la roue droite vers l'arrière
  digitalWrite(BORNE_IN3, HIGH);   // Tourne la roue gauche vers l'avant
  digitalWrite(BORNE_IN4, LOW);    // Tourne la roue gauche vers l'avant
}



void angleCameraPanGauche()
{
  anglePan = anglePan+VALEUR_SENSIBILITE_CAMERA;
  moteurCameraPan.write(anglePan);
  delay(DELAY_CAMERA);  
}

void angleCameraPanDroite()
{  
  anglePan = anglePan-VALEUR_SENSIBILITE_CAMERA;
  moteurCameraPan.write(anglePan);
  delay(DELAY_CAMERA);
}

void angleCameraTiltHaut()
{
  angleTilt = angleTilt-VALEUR_SENSIBILITE_CAMERA;
  moteurCameraTilt.write(angleTilt);
  delay(DELAY_CAMERA);
}

void angleCameraTiltBas()
{
  angleTilt = angleTilt+VALEUR_SENSIBILITE_CAMERA;
  moteurCameraTilt.write(angleTilt);
  delay(DELAY_CAMERA);
}

void recentrerCamera()
{
  angleTilt = ANGLE_RECENTRER_TILT;
  anglePan = ANGLE_RECENTRER_PAN;
  moteurCameraTilt.write(angleTilt);
  moteurCameraPan.write(anglePan);
  delay(DELAY_CAMERA);
}

void limiteAngle()
{
  if (anglePan <ANGLE_MINIMUM_PAN_CAMERA)
  {
    anglePan = ANGLE_MINIMUM_PAN_CAMERA;
  }

  if (anglePan > ANGLE_MAXIMUM_PAN_CAMERA)
  {
    anglePan = ANGLE_MAXIMUM_PAN_CAMERA;
  }
 
  if (angleTilt < ANGLE_MINIMUM_TILT_CAMERA)
  {
    angleTilt = ANGLE_MINIMUM_TILT_CAMERA;
  }

  if (angleTilt > ANGLE_MAXIMUM_TILT_CAMERA)
  {
    angleTilt = ANGLE_MAXIMUM_TILT_CAMERA;
  }
}

void fonctionHygrometre()
{
  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= interval)        // Vérification si l'intervalle de temps est écoulé
  {
    previousMillis = currentMillis;                      // Mise à jour de l'heure de la dernière mise à jour de millis()

    float temperature = hygrometre.readTemperature();    // Lecture des valeurs de température et d'humidité
    float humidity = hygrometre.readHumidity();

    // Envoi des valeurs à la console série
    Serial.print("$");
    Serial.print(temperature);
    Serial.print(";");
    Serial.print(humidity);
    Serial.println("#");
    //Methode alternative :
    //Serial.print("$" + String(hygrometre.readTemperature())+";");
    //Serial.println(String(hygrometre.readHumidity())+"#");
  
  }
}

void joystickChaines()
{
  int valeurAngleJoystickXChaines = VALEUR_INITIALE_JOYSTICK;
  int valeurAngleJoystickYChaines = VALEUR_INITIALE_JOYSTICK;
  bool etatBoutonJoystickChaines;
  valeurAngleJoystickXChaines = analogRead(pinXChaines);
  valeurAngleJoystickYChaines = analogRead(pinYChaines);
  etatBoutonJoystickChaines = digitalRead(pinBoutonChaines);

  if(valeurAngleJoystickXChaines < VALEUR_DETECTION_JOYSTICK_CHAINES_AVANCER)
    {
      avancer();
    }

  if(valeurAngleJoystickXChaines  > VALEUR_DETECTION_JOYSTICK_CHAINES_RECULER)
    {
      reculer();
    }

  if(valeurAngleJoystickYChaines > VALEUR_DETECTION_JOYSTICK_CHAINES_ROTATION_DROITE)
    {
      rotationGauche();
    }

  if(valeurAngleJoystickYChaines < VALEUR_DETECTION_JOYSTICK_CHAINES_ROTATION_GAUCHE)
    {
      rotationDroite();
    }

  if(etatBoutonJoystickChaines == false)
    {
      fonctionHygrometre();
      recentrerCamera();
    }

  if(valeurAngleJoystickXChaines == ETAT_NEUTRE_1)
    {
      arret();
    }
  if(valeurAngleJoystickXChaines == ETAT_NEUTRE_2)
    {
      arret();
    }
}

void joystickCamera()
{
  int valeurAngleJoystickXCamera = VALEUR_INITIALE_JOYSTICK;
  int valeurAngleJoystickYCamera = VALEUR_INITIALE_JOYSTICK;
  valeurAngleJoystickXCamera = analogRead(pinXCamera);
  valeurAngleJoystickYCamera = analogRead(pinYCamera);
  etatBoutonJoystickCamera = digitalRead(pinBoutonCamera);

  //Définition d'une direction dans laquelle les moteurs inclinerons la caméra en fonction de l'état du joystick
  if(valeurAngleJoystickXCamera < VALEUR_DETECTION_JOYSTICK_CAMERA_HAUT) //La position du joystick est-elle détéctée ? Si oui : Appel d'une fonction 
    {
      angleCameraTiltHaut();  //Appel de la fonction inclinant la caméra vers le haut
    }
  if(valeurAngleJoystickXCamera > VALEUR_DETECTION_JOYSTICK_CAMERA_BAS) //La position du joystick est-elle détéctée ? Si oui : Appel d'une fonction 
    {
      angleCameraTiltBas(); //Appel de la fonction inclinant la caméra vers le bas
    }
  if(valeurAngleJoystickYCamera < VALEUR_DETECTION_JOYSTICK_CAMERA_DROTIE) //La position du joystick est-elle détéctée ? Si oui : Appel d'une fonction 
    {
      angleCameraPanDroite(); //Appel de la fonction inclinant la caméra vers la droite
    }
  if(valeurAngleJoystickYCamera > VALEUR_DETECTION_JOYSTICK_CAMERA_GAUCHE) //La position du joystick est-elle détéctée ? Si oui : Appel d'une fonction 
    {
      angleCameraPanGauche(); //Appel de la fonction inclinant la caméra vers la gauche
    }
}

void loop()
{
  joystickChaines();  //Appel d'une fonction
  joystickCamera();   //Appel d'une fonction
  limiteAngle();      //Appel d'une fonction
} 

//Serial.println(anglePan);   // afficher l'angle panoramique
//Serial.println(angleTilt);  // afficher l'angle vertical
 
///////////////////////////////////////// TOUCHES CLAVIER ///////////////////////////////////////
//  if (Serial.available())                                                                    //
//  {                                                                                          //
//    commandesRov = Serial.read();                                                            //
//    //Serial.println(commandesRov);                                                          //
//  }                                                                                          //
//  switch (commandesRov)                                                                      //
//  {                                                                                          //
//  case TOUCHE_4:                                                                             //
//     moteurCameraPan.write(POSITION_GAUCHE);                                                 //
//    break;                                                                                   //
//  case TOUCHE_6:                                                                             //
//     moteurCameraPan.write(POSITION_DROITE);                                                 //
//    break;                                                                                   //
//  case TOUCHE_8:                                                                             //
//     moteurCameraTilt.write(POSITION_HAUTE);                                                 //
//    break;                                                                                   //
//  case TOUCHE_2:                                                                             //
//     moteurCameraTilt.write(POSITION_BASSE);                                                 //
//    break;                                                                                   //
//  case TOUCHE_5:                                                                             //
//    moteurCameraPan.write(POSITION_INITIALE_PAN);                                            //
//    moteurCameraTilt.write(POSITION_INITIALE_TILT);                                          //
//    break;                                                                                   //
//  case TOUCHE_0:                                                                             //
//    Serial.println("-----------------------");                                               //
//    Serial.println("Temperature = " + String(hygrometre.readTemperature())+" °C");           //
//    Serial.println("Humidite = " + String(hygrometre.readHumidity())+" %");                  //
//    Serial.println("-----------------------");                                               //
//    commandesRov = RECENTER_CAMERA;                                                          //
//    break;                                                                                   //
//  case TOUCHE_Z:                                                                             //
//          avancer();                                                                         //
//    break;                                                                                   //
//  case TOUCHE_S:                                                                             //
//          reculer();                                                                         //
//    break;                                                                                   //
//  case TOUCHE_D:                                                                             //
//          rotationDroite();                                                                  //
//    break;                                                                                   //
//  case TOUCHE_Q:                                                                             //
//          rotationGauche();                                                                  //
//    break;                                                                                   //
//  case TOUCHE_ESPACE:                                                                        //
//          arret();                                                                           //
//  default:                                                                                   //
//    break;                                                                                   //
//  }                                                                                          //
///////////////////////////////////////// TOUCHES CLAVIER /////////////////////////////////////// 