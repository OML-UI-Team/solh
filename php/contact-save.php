<?php

$to = "";
$subject = "Received new contact query on solh for ".$_POST['subject'];

$message = "
<html>
<head>
    <title></title>
</head>
<body>
    <table>
        <tr>
            <td>Name : </td> 
            <td>".$_POST['name']."</td>
        </tr>
        <tr>
            <td>Email : </td>
            <td>".$_POST['email']."</td>
        </tr>
        <tr>
            <td>Phone : </td>
            <td>".$_POST['phone']."</td>
        </tr>
        <tr>
            <td>Subject : </td>
            <td>".$_POST['subject']."</td>
        </tr>
        <tr>
            <td>Message: </td>
            <td>".$_POST['message']."</td>
        </tr>
    </table>
</body>
</html>
";

// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// $headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

// if(mail($to,$subject,$message,$headers)){
//     $data['status'] = "success";
//     $data['message'] = 'Mail has been sent!';
// } else {
//     $data['status'] = "error";
//     $data['message'] = 'Somthing went wrong!';
// }

// $data['status'] = "success";
// $data['message'] = 'Mail has been sent!';

date_default_timezone_set('Etc/UTC');
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                                             // Enable verbose debug output

$mail->isSMTP();                                                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
// $mail->Host = 'smtp.hostinger.com';                                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                             // Enable SMTP authentication
$mail->Username = 'mail@omlogic.com';                       // SMTP username
$mail->Password = 'Manjeet@123';                                     // SMTP password
// $mail->Username = 'noreply@solhapp.com';                       // SMTP username
// $mail->Password = 't3riKhKLung@';                                     // SMTP password
$mail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                                  // TCP port to connect to

$mail->addAddress('info@solhapp.com', 'SolhApp');      // Add a recipient
// $mail->addAddress('pankaj.kumar@omlogic.co.in', 'SolhApp');      // Add a recipient
// $mail->addAddress('ellen@example.com');                          // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
$mail->addBCC('manjeet.kumar@omlogic.com');

$mail->setfrom($_POST['email'], $_POST['name']);
$mail->WordWrap = 50;                                               // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');                    // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');               // Optional name
$mail->isHTML(true);                                                // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $data['status'] = "error";
    $data['message'] = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $data['status'] = "success";
    $data['message'] = 'Thank you for contact with us. We will get back to you soon!';
}

$file_data = date('Y/m/d').','.$_POST['name'].','.$_POST['email'].','.$_POST['phone'].','.$_POST['subject'].','.$_POST['message']."\n";
$fileName = "contact-leads.csv";
    
if (file_exists($fileName)) {
    file_put_contents($fileName, $file_data, FILE_APPEND);
}

echo json_encode($data); exit;

// header('location:../contact.php?saved');

?>
