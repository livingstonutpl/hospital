1. CREAR UNA BASE DE DATOS CON LOS SIGUIENTES DATOS

  DB_HOST: localhost
  DB_NAME: dbhospital
  DB_USERNAME: root
  DB_PASSWORD: ""

2. CREAR LA CARPETA C:\xampp\htdocs\hospital

3. PEGAR EL PROYECTO EN C:\xampp\htdocs\hospital

4. LANZAR EL PROYECTO CON localhost/hospital

5. UTILIZAR ESTAS CREDENCIALES DE ADMINISTRADOR

  USUARIO: admin
  PASSWORD: 123456

--------------------------------------------
https://github.com/livingstonutpl/hospital/

GITHUB
USER: livingstonutpl
PASS: Tadeo282828
--------------------------------------------

********************************************
PENDIENTES

CREAR MEDICO UNIENDO VARIAS TABLAS

EN HISTORIA CLINICA CREATE SELECCIONAR AUTOMATICAMENTE MEDICO LOGEADO

CITAS MEDICAS / EXAMENES / RECETAS / DIAGNOSTICOS
  - ADMIN   REPORTAR POR MEDICO
  - CLIENTE REPORTAR SOLO DE SUS PROPIOS PACIENTES
  - MEDICO  REPORTAR SOLO DE SUS PROPIOS PACIENTES
********************************************


min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>"