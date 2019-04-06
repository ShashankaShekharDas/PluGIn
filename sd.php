<?php

    session_start();
    
    if (isset($_SESSION["user"]) and $_SESSION["user"]=='verified') 
    {
        if($_POST)
        {
            
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
        <title>Upload</title>
        
        <style>
            body
            {
                margin: 0;
                padding:0;
                padding-bottom: 50;
                padding-top: 50;
               background-color: rebeccapurple;
            }
        #upload
            {
                height: 600;
                width: 600;
                background-color: white;
                border-radius:3%;
            }
            #up2{
                position: relative;
                top:100;
                height: 400;
                width: 400;
                border-style: inset;
                border-radius: 3%;
            }
            #fileToUpload
            {
                background-color: #4CAF50; /* Green */
                  border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  width:300;
            }
        
            #sbb{
                background-color: burlywood;
                border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  width: 300;
            }
            #txt{
                width: 300;
                height: 50;
            }
            input{
                text-align: center;
            }
        </style>
    </head>
    
<body>
<center>
        <div id="upload">
            <div id="up2">
                <form method="post" enctype="multipart/form-data" action="upload.php">
                    <sd style="font-family: 'Lobster', cursive;font-size:200%;">Upload File</sd><br><br><br><br><br><br>
                    <input type="text" placeholder="Enter the email to whom to send.(Seperate by a semicolon to add more meails)" id="txt" name="em" required>
                    <input type="file" name="fileToUpload" id="fileToUpload"/><br>
                    <input type="submit" value="Upload Image" name="submit" id="sbb">
                </form>
            </div>
        </div>
        </center>
</body>
</html>