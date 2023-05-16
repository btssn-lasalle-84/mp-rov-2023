#ifndef ROVCHENILLE_H
#define ROVCHENILLE_H

//setup de la carte et des pins
#define DHTTYPE DHT22             // Définition du type de capteur hygromètre
#define VITESSE_TRANSFERT 9600    // On paramètre à la vitesse : 9600 bauds
#define pinXChaines       A0      // On associe la variable à la pin A0 de l'arduino
#define pinYChaines       A1      // On associe la variable à la pin A1 de l'arduino
#define pinXCamera        A2      // On associe la variable à la pin A2 de l'arduino
#define pinYCamera        A3      // On associe la variable à la pin A3 de l'arduino
#define pinBoutonChaines  2       // On associe la variable à la pin 2 de l'arduino
#define pinBoutonCamera   12      // On associe la variable à la pin 12 de l'arduino
#define BORNE_ENA         10      // On associe la borne "ENA" du L298N à la pin D10 de l'arduino
#define BORNE_IN1         9       // On associe la borne "IN1" du L298N à la pin D9 de l'arduino
#define BORNE_IN2         8       // On associe la borne "IN2" du L298N à la pin D8 de l'arduino
#define BORNE_IN3         7       // On associe la borne "IN3" du L298N à la pin D7 de l'arduino
#define BORNE_IN4         6       // On associe la borne "IN4" du L298N à la pin D6 de l'arduino
#define BORNE_ENB         5       // On associe la borne "ENB" du L298N à la pin D5 de l'arduino
#define DHTPIN            4       // On associe la variable à la pin 4 de l'arduino
#define PIN_MOTEUR_PAN    11      // On associe la variable à la pin 11 de l'arduino
#define PIN_MOTEUR_TILT   3       // On associe la variable à la pin 3 de l'arduino


//Valeur initiale des deux joysticks
#define VALEUR_INITIALE_JOYSTICK 0


//Options Chaines
#define ETAT_NEUTRE_1 512
#define ETAT_NEUTRE_2 513
#define VALEUR_DETECTION_JOYSTICK_CHAINES_AVANCER 100
#define VALEUR_DETECTION_JOYSTICK_CHAINES_RECULER 800
#define VALEUR_DETECTION_JOYSTICK_CHAINES_ROTATION_DROITE 800
#define VALEUR_DETECTION_JOYSTICK_CHAINES_ROTATION_GAUCHE 100


//Options Hygromètre
unsigned long previousMillis = 0;  // Variable pour stocker la dernière mise à jour de millis()
const long interval = 2000;        // Intervalle entre les envois de données


//Options Caméra
#define VALEUR_DETECTION_JOYSTICK_CAMERA_HAUT 100
#define VALEUR_DETECTION_JOYSTICK_CAMERA_BAS 600
#define VALEUR_DETECTION_JOYSTICK_CAMERA_DROTIE 300
#define VALEUR_DETECTION_JOYSTICK_CAMERA_GAUCHE 900
#define POSITION_INITIALE_PAN  95     
#define POSITION_INITIALE_TILT 150
#define ANGLE_MINIMUM_PAN_CAMERA 18
#define ANGLE_MAXIMUM_PAN_CAMERA 180
#define ANGLE_MINIMUM_TILT_CAMERA 60
#define ANGLE_MAXIMUM_TILT_CAMERA 180
#define ANGLE_RECENTRER_TILT 150
#define ANGLE_RECENTRER_PAN 90
#define VALEUR_SENSIBILITE_CAMERA 2 // Modifier cette valeur permettra de jouer avec la vitesse de rotation de la caméra
#define DELAY_CAMERA 30


//Position caméra avec les touches clavier
#define POSITION_HAUTE  60    
#define POSITION_BASSE  175
#define POSITION_DROITE 180
#define POSITION_GAUCHE 30
#define RECENTER_CAMERA TOUCHE_5
//Code ascii des touches renvoyé par le clavier (La Carte arduino doit etre reboot après utilisation de ces inputs si l'on souhaite utiliser les joysticks)
#define TOUCHE_4 52      
#define TOUCHE_5 53
#define TOUCHE_6 54
#define TOUCHE_8 56
#define TOUCHE_2 50
#define TOUCHE_0 48
#define TOUCHE_Z 122
#define TOUCHE_S 115
#define TOUCHE_Q 113
#define TOUCHE_D 100
#define TOUCHE_ESPACE 32

int commandesRov;
int anglePan = 90;
int angleTilt = 150;


#endif