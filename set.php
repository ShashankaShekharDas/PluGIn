<?php

    session_start();
    $conn=new mysqli("localhost","root","","plugin");
    $nm=$_SESSION["nm"];
    $sql="SELECT * FROM `login` where Name='$nm'";
    $res=$conn->query($sql);
    $res=$res->fetch_assoc();

    if($_GET)
    {
        $nmo=$_GET["nm"];
        $nc=$_GET["nck"];
        $gd=$_GET["gd"];
        $ad=$_GET["ad"];
        $em=$_GET["em"];
        $pf=$_GET["pf"];
        $_SESSION["nm"]=$nmo;
        
        $qr="UPDATE `login` SET Name='$nmo', Email='$em', GENDER='$gd', NICK='$nc', AD='$ad' WHERE Name='$nm'";
        
        $conn->query($qr);
        
        
        header("Location: set.php");
    }

    if($_POST)
    {
        $target_dir = "photos/";
        $_FILES["fileToUpload"]["name"]=$nm;
        
            if($_POST["submit"]=="Upload Profile Pic")
            {
                $_FILES["fileToUpload"]["name"]=$nm."pr";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                
                $sql="UPDATE `login` SET prof='$target_file' WHERE Name='$nm'";
            }
            else
            {
                $_FILES["fileToUpload"]["name"]=$nm."cr";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                $sql="UPDATE `login` SET cover='$target_file' WHERE Name='$nm'";
            }
        $conn->query($sql);
        
    }
?>

<html>

    <head>
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

        <title>Settings</title>
        <style>
            body{
                margin: 0 auto;
                background-image: url(photos/cv.jpg);
                font-family: 'Lobster', cursive;
                color: white;

            }
            #top{
                background-color: black;
                opacity: 0.6;
            }
            pre
            {
                position: absolute;
                top:28;
                right: 10;
            }
            #mid{
                width: 1000;
                border-radius: 6%;
                opacity: 0.1;
                transition: 0.9s;
            }
            #mid:hover{
                opacity:1;
            }
            input{
                width: 300;
            }
        </style>
    </head>
    
    <body>
    
        <div id="top">
            <img src="photos/logo.jpeg" height="60">
            <pre><a href="profile.php" style="text-decoration:none;color:white;">Home</a>     <a href="index.php" style="text-decoration:none;color:white">Log Out</a></pre>
        </div>
        
        <center>
            <div id="mid">
                <h1 style="font-family: 'Germania One', cursive;">Change Profile Details</h1>
                <br><br>
                
                <form method="get">
                
                    Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $res['Name']?>" name="nm" required><br><br>    
                    Nick:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $res['NICK']?>" name="nck" required><br><br>
                    Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $res['GENDER']?>" name="gd" required><br><br>
                    Address:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $res['AD']?>" name="ad" required><br><br>
                    Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $res['Email']?>" name="em" required><br><br>
                    Profession:<input type="text" value="<?php echo $res['prof']?>" name="pf" required><br><br>
                    
                    <button>Press Me to Submit</button>
                    
                </form>
                
                <br><br>
                <h2 style="font-family: 'Germania One', cursive;">Upload New Profile Picture</h2>
                
                <form method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                <input type="submit" value="Upload Profile Pic" name="submit" id="sbb">
                </form>
                
                <br><br>
                
                <h2 style="font-family: 'Germania One', cursive;">Upload New Cover Picture</h2>
                <form method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                <input type="submit" value="Upload Cover" name="submit" id="sbb">
                </form>
                
            </div>
        </center>
        
    
    </body>

</html>