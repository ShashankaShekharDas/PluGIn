<?php
$n=0;

session_start();
error_reporting(0);
ini_set('display_errors', 0);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (file_exists($target_file)) {
     echo "<script>alert('There was an error uploading the file');</script>";
}
else
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $conn=new mysqli("localhost","root","","plugin");
        $nm=$_SESSION["nm"];
        $em=$_POST["em"];
        $_SESSION["em"]=$em;
        $sql="INSERT INTO `rec` (frm,link,too) VALUES ('$nm','$target_file','$em') ";
        $conn->query($sql);
        $sql="INSERT INTO `ht` (Name,to_em,fid) VALUES ('$nm','$em','$target_file')";
        $conn->query($sql);
        $_SESSION["file"]=$target_file;

        header("Location: scc2.php");

    } 
    else {
        
        echo "<script>alert('There was an error uploading the file');</script>";
        
    }
}




if($_GET)
{
    header("Location: sd.php");
}
if($_POST)
{
    if(isset($_POST["b"]))
    {
        header("Location: index.php");
    }
}
?>

<html>

    <head>
        <title>Invalid</title>
        
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
        </style>
        
    </head>
    
    <body>
    
        <div id="bx">
        <br>
            <div id="top">
                <div id="ttop">
                <br>   
                    <span style="color:#f79191">____________________________<span style="color:#c42d2d;font-size:200%">Error!</span>____________________________</span><br>
                    <img src="photos/error.jpg" style="position:relative;left:250;top:20;" height="70">
                    
                </div>
                
                <div style="padding-left: 100;font-family: 'Lobster', cursive;font-size:200%;position:relative;top:15;">
                <br>
                    Your file could not be succesfully sent.
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