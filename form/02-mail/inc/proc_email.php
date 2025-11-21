<?php
    //enlazando libreria
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    include('../PHPMailer-master/src/PHPMailer.php');
    include('../PHPMailer-master/src/SMTP.php');
    include('../PHPMailer-master/src/Exception.php');


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

        $miCorreo = new PHPMailer(); //creado un objeto

        //$miCorreo->PluginDir = '../PHPMailer-master/src';
        $miCorreo->setLanguage('es','../PHPMailer-master/language');
        $miCorreo->CharSet='UTF-8';
        $miCorreo->Timeout =30; //en segundos
        $miCorreo->IsHTML(true); //Indica si utilizamos correo de tipo texto o true
        $miCorreo->Mailer = 'smtp'; //Establece el protocolo de envío SMTP
        $miCorreo->SMTPSecure = 'ssl'; //Establece el sistema de seguridad SSL para los correos electrónicos
        $miCorreo->SMTPAuth = true;

        $miCorreo->Host='mail.technicalelearning.com';
        $miCorreo->Port=465; //o 25 (por cosas suyas idk)
        $miCorreo->Username ='cpwalmassera@technicalelearning.com';
        $miCorreo->Password=/* 'contraseña' */;


        //PASO 4 --- rellenar campos correo

        $miCorreo->setFrom($emailTo, $nombre);

        $miCorreo->Subject =$asunto;
        $miCorreo->addAddress('cpwalmassera@technicalelearning.com');//de haber mas de una cuenta se puede copiar las que hagan falta.
        //$miCorreo->AddCC($emailTo); //una copia
        //$miCorreo->AddBCC($emailTo); //copia oculta

        if($adjuntar['error'] === UPLOAD_ERR_OK){
            $miCorreo->addAttachment($adjuntar['tmp_name'],$adjuntar['name']);
        } //adjuntar archivos

        //haciendo que el body incluya los datos del telefono
        $contenidoFinal ='';
        $contenidoFinal .= '
        <strong>Teléfono: </strong>' .$tlf.'<br>';
        $contenidoFinal .= '
        <strong>De: </strong>' .$emailTo.'<br>';$contenidoFinal .= '
        <strong>Contenido</strong>' .$contenido.'<br>';


        $miCorreo->Body = $contenidoFinal;

        $miCorreo->addReplyTo($emailTo, $nombre); //Para cuando responda la persona que le llegue finalmente. 

        //PASO 5 --- config sello de confirmacion de envio o no

        if ($miCorreo->send()) {
            echo(' <p> Su correo ha sido enmviado </p>');
        } else {
            echo $miCorreo->ErrorInfo; //mandando el error
        }
        


    } else{
        echo'<p>El Teléfonono NO es correcto</p>';
    }

?>
