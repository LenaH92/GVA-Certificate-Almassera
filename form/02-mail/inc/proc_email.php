<?php
    //enlazando libreria
    include('../lib_php_mailer/class.phpmailer.php');


    //////////* 5 passos *////////////

    //PASO 1 --- recoger datos del form

    $nombre=$_POST['nombre'];
    $tlf=$_POST['tlf'];
    $emailTo=$_POST['emailTo'];
    $asunto=$_POST['asunto'];
    $adjuntar=$_FILES['adjuntar'];
    $contenido=$_POST['contenido'];
    $aceptar=$_POST['aceptar'];

                    ////-> Asignamos los valores que traen del from a variables

    //PASO 2 --- Validar datos
/* NO lo vamos a hacer, simplemente es para verificar que todo lo que nos envien está bien */

    function comprobarDatos(){
        global $tlf;
        return $tlf != '000 000 000';
    }

    if(comprobarDatos()){

        //PASO 3 --- config params serv

        $miCorreo = new phpmailer(); //creado un objeto

        $miCorreo->SetLanguage('es','../lib_php_mailer');
        $miCorreo->PluginDir = '../lib_php_mailer';
        $miCorreo->CharSet='utf-8';
        $miCorreo->Timeout ='30'; //en segundos
        $miCorreo->IsHTML(true);
        $miCorreo->Mailer='smtp';
        $miCorreo->SMTPSecure='ssl';
        $miCorreo->SMTPAuth = true;

        $miCorreo->Host='/* hostname */';
        $miCorreo->Port=465; //o 25 (por cosas suyas idk)
        $miCorreo->Username =/*' email '*/;
        $miCorreo->Password=/* 'password' */;


        $miCorreo->Fromname=$nombre;
        $miCorreo->AddAdress(/*' email '*/;);//de haber mas de una cuenta se puede copiar las que hagan falta.
        //$miCorreo->AddCC($emailTo); //una copia
        //$miCorreo->AddBCC($emailTo); //copia oculta

        $miCorreo->Subject =$asunto;

        //PASO 4 --- rellenar campos correo


        //PASO 5 --- config sello de confirmacion de envio o no



    } else{
        echo'<p>El Teléfonono NO es correcto</p>';
    }

    


?>
