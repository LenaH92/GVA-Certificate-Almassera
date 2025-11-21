//La version de Carlos

<?php
    /** ENLAZAR LIBRERIAS **/
    include('../PHPMailer-master/src/PHPMailer.php');
    include('../PHPMailer-master/src/SMTP.php');
    include('../PHPMailer-master/src/Exception.php');
    use PHPMailer\PHPMailer\PHPMailer;

    /** PASO 1: RECOGER DATOS FORMULARIO */
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $fichero = $_FILES['fichero'];
    $contenido = $_POST['contenido'];
    $aceptar = $_POST['nombre'];

    /** PASO 2: VALIDAR LOS DATOS */
    function comprobarDatos() {
        global $telefono;
        return $telefono != '000 000 000';
    }

    if (comprobarDatos()) {
        /** PASO 3: CONFIGURAR LOS PARÁMETROS DEL SERVIDOR DE CORREO */
        $miCorreo = new PHPMailer(); // Crear un objeto tipo correo

        $miCorreo->SetLanguage('es','../PHPMailer-master/language/'); //Establece el idioma del correo
        $miCorreo->CharSet = 'utf8'; //Establece la codificación del correo
        $miCorreo->Timeout = 30; //Establece el tiempo de timeout para considerar error de envío
        $miCorreo->IsHTML(true); //Indica si utilizamos correo de tipo texto o true
        $miCorreo->Mailer = 'smtp'; //Establece el protocolo de envío SMTP
        $miCorreo->SMTPSecure = 'ssl'; //Establece el sistema de seguridad SSL para los correos electrónicos
        $miCorreo->SMTPAuth = true; //Indica que se requiere autentificación para abrir conexión

        $miCorreo->Host = 'mail.technicalelearning.com'; //Servidor de correo electrónico
        $miCorreo->Port = 465; //Puerto TCP/IP para SMTP
        $miCorreo->Username = 'cpwalmassera@technicalelearning.com'; //Usuario para abrir conexión en el servidor
        $miCorreo->Password = /* La contraseña entre ''  */; //Contraseña para abrir conexión en el servidor

        /** PASO 4: RELLENAR LOS CAMPOS DEL CORREO ELECTRÓNICO */
        $miCorreo->FromName = $nombre; //Nombre del usuario que envía el correo
        $miCorreo->From = 'cpwalmassera@technicalelearning.com'; //Correo desde el cual se envía el correo
        $miCorreo->addAddress('cpwalmassera@technicalelearning.com'); //Dirección destinatario del correo
        $miCorreo->addCC('crpdocente@gmail.com'); //Direcciones con copia del correo
        //$miCorreo->addBCC('curso@technicalelearning.com'); //Direcciones con copia confidencial
        $miCorreo->addReplyTo($email);

        $miCorreo->Subject = $asunto; //Rellenar asunto del correo
        if (count($fichero)>0) {
            $miCorreo->addAttachment($fichero['tmp_name'],$fichero['name']); //Adjuntar archivos
        }

        //$miCorreo->Body = $contenido; //Rellenar contenido del correo
        $body = '';
        $body .= '<strong>Teléfono:</strong> '.$telefono.'<br>';
        $body .= '<strong>Email:</strong> '.$email.'<br>';
        $body .= '<strong>Mensaje</strong><br>'.$contenido;

        $miCorreo->Body = $body;


        //PASO 5. ENVIAR
        if ($miCorreo->send()) {
            //El correo ha llegado al servidor de correo
            echo '<p>Su formulario ha sido enviado correctamente</p>';
        } else {
            //El correo no ha llegado al servidor de correo
            echo $miCorreo->ErrorInfo;
        }

    } else {
        echo '<p>El teléfono no es correcto</p>';
    }
?>
