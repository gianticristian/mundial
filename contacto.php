<?php
 
if($_POST) {
    $destino = "gianticristian@gmail.com";
    $nombre = "";
    $email = "";
    $email_title = "";
    $visitor_message = "";
    $email_body = "<div>";
     
    if(isset($_POST['nombre'])) {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $email_body .= "<div> 
            <label><b>Nombre:</b></label>&nbsp;<span>".$nombre."</span> 
        </div>";
    }
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div> 
            <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span> 
        </div>";
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div> 
<label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span> 
</div>";
    }
        
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div> 
<label><b>Visitor Message:</b></label> 
<div>".$visitor_message."</div> 
</div>";
    }
     



     
    $email_body .= "</div>";
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}

?>