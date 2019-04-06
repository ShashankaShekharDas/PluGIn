<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    session_start();


    require 'C:/Users/Sasanka/vendor/autoload.php';

    $mail = new PHPMailer(true);
                                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'gudurajasekarreddy@gmail.com';        
    $mail->Password   = '6a1d10eas';                           
    $mail->SMTPSecure = 'tls';  
    $mail->Port       = 587;    

    $emaill=explode(";",$_SESSION["em"]);

    for($i=0;$i<sizeof($emaill);$i++)
    {
    
    $mail->setFrom('mailer@plugin.com', 'Mailer');
    $mail->addAddress($emaill[$i], 'User');     
    $mail->addReplyTo('noreply@plugin.com', 'No Reply'); 

    $mail->addAttachment($_SESSION["file"]);
    $mail->isHTML(true);                
    $mail->Subject = 'Attachment';
    $mail->Body    = $_SESSION["nm"]." is Sending you a file. Check the attachments";

    $mail->send();

    }
        
    if(isset($_SESSION["user"]) and $_SESSION["user"]=="verified")
    {
        if($_GET)
        {
            header("Location: sd.php");
        }
        if($_POST)
        {
            header("Location: index.php");
        }
    }
    else
    {
        header("Location: index.php");
    }


?>


<html>

    <head>
        
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Basic" rel="stylesheet">
        
        <title>Success</title>
        
        <style>
            
            body{
                background-color: #F4F4F4;
            }
            
            #bx{
                margin:40 auto;
                background-color:  white;
                height: 650;
                width: 1200;
                border-radius: 4%;
                
            }
            #top{
                border: 2px solid #F4F4F4;
                border-top: 0px solid #F4F4F4;
                width: 700;
                margin: 0 auto;
                position: relative;
                top:15;
                height: 300;
            }
            #ttop{
               padding-left: 50;
            }
            #bd{
                padding-left: 120;
                font-family: 'Basic', sans-serif;
                font-size:150%;
            }
        
            .btt{
                background-color:#B6A742;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
                
            }
            a{
                text-decoration: none;
            }
        </style>
        
    </head>

    <body>
        
                <a href="profile.php" style="text-decoration:none;position:absolute;right:0;top:0;">Home</a>
    
        <div id="bx">
        <br>
            <div id="top">
                <div id="ttop">
                <br>   
                    <span style="color:#cee2d1">____________________________<span style="color:#68c474;font-size:200%">Success!</span>____________________________</span><br>
                    <img src="photos/check.png" style="position:relative;left:250;top:20;" height="70">
                    
                </div>
                
                <div style="padding-left: 100;font-family: 'Lobster', cursive;font-size:200%;position:relative;top:15;">
                <br>
                    Your file has been succesfully sent.
                </div>
            </div><br><br><br>
            <div id="bd">

                What do you want to do?
                <form method="get">
                    <button class="btt" style="position:relative;top:45;" value="1" name="a">Send another file</button>
                </form>
                <form method="post">
                    <button class="btt" style="position:relative;bottom:35;left:200;" value="2" name="b">Log Out</button>
                </form>

            </div>
            
        </div>
        
        
    </body>
    
    
</html>