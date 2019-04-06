<?php

    session_start();
    $_SESSION["user"]="Not Verfied";
    if($_POST)
    {
        
        $us=$_POST["us"];
        $pw=$_POST["pw"];
        
        if(isset($_POST["em"])) #for registerrrr
        {
            $em=$_POST["em"];
            $nk=$_POST["nick"];
            $gd=$_POST["gd"];
            $ad=$_POST["ad"];
            #email validation
            
            if(preg_match("/[^@]+@[^@]+[.][^@]+/",$em))
            {
                $conn=new mysqli("localhost","root","","plugin");
                
                $sql="INSERT INTO `login`(Name,Email,Password,NICK,GENDER,AD,prof,cover) VALUES ('$us','$em','$pw','$nk','$gd','$ad','photos/Prof.jpg','photos/cover.jpg')";
                if($conn->query($sql)==TRUE)
                {
                    echo "<script type='text/javascript'>alert('Successfully Registered');</script>";       
                }
            }
            else
            {
                echo "<script type='text/javascript'>alert('Invalid Email');</script>";

            }
        }
        else #for login
        {
            $conn=new mysqli("localhost","root","","plugin");
            $sql="select * from login where Name='$us'";
            $res=$conn->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                    if($row["Password"]==$pw)
                    {
                        $_SESSION["user"]="verified";
                        $_SESSION["nm"]=$us;
                       header('Location: profile.php');
                    }
                }
            } 
            echo "<script type='text/javascript'>alert('Invalid UserName/ Password combination');</script>";
            
        }
    }

    if($_GET)
    {
        $nm=$_GET["us"];
        $em=$_GET["em"];
        $cm=$_GET["com"];
        
        $conn=new mysqli("localhost","root","","plugin");
                
        $sql="INSERT INTO `comment`(Name,Email,Comment) VALUES ('$nm','$em','$cm')";
        if($conn->query($sql)==TRUE)
        {
            echo "<script type='text/javascript'>alert('Comment Registered Succesfully');</script>"; 
        }
        
    }
?>


<html>

    <head>
    
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Stylish" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nova+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link rel="stylesheet" href="lg.css">
        
        <title>PlugIn your life</title>
        
        <style>
        
            body{
                margin:0;
                padding:0;
                margin:0 auto;
            }
            
            #top{
                background-color: #000000;
                height:600;
            }
            
            #topbar{
                height:70;
                width:120;
                padding: 10px;
                font-size: 120%;
                font-family: 'Open Sans Condensed', sans-serif;
            }
        
            .topfont{
                
            }
            
            #midtop{
                padding-top:30px;
                padding-left: 200px;
                font-family: 'Stylish', sans-serif;

            }
            
            
            #mid
            {
                padding-left: 100;
            } 
            figcaption{
                font-family: 'Permanent Marker', cursive;
            }
            figure{
                float: left;
            }
            
            
            .overlay {
              position: fixed;
              top: 0;
              bottom: 0;
              left: 0;
              right: 0;
              background: rgba(0, 0, 0, 0.7);
              transition: opacity 500ms;
              visibility: hidden;
              opacity: 0;
            }
            .overlay:target {
              visibility: visible;
              opacity: 1;
            }
            .popup {
              margin: 70px auto;
              padding: 20px;
              border-radius: 5px;
              width: 30%;
              position: relative;
              transition: all 5s ease-in-out;
            }
            .popup .close {
              position: absolute;
              top: 20px;
              right: 30px;
              transition: all 200ms;
              font-size: 30px;
              font-weight: bold;
              text-decoration: none;
              color: #333;
            }
            .popup .close:hover {
              color: #06D85F;
            }
            .popup .content {
            max-height: 30%;
            overflow: auto;
            }
            @media screen and (max-width: 700px){
              .box{
                width: 70%;
              }
              .popup{
                width: 70%;
              }
            }
        </style>
        
        
        <script>
        
            
            
        </script>
    
    </head>
    
    <body>
    
        <div id="top">
        
            <div id="topbar">
                <img src="photos/logo.jpeg" height="120" width="224">
                <a href="#popup3"><p style="color:white; position:absolute;right:224;top:48;"><u>T</u>alk with Us!</p></a>
                <a href="#popup2"><p style="color:white; position:absolute;right:132;top:48;">Register</p></a>
                <a href="#popup1"><p style="color:white; position:absolute;right:60;top:48;">Login</p></a>
            </div>
            <br>
            
            <div id="midtop">
            
                <p style="color:#cc2314; font-size:156%;">This &nbsp;&nbsp;is&nbsp;&nbsp; PlugIn</p><br>
                
                <sd style="font-family: 'Nova Round', cursive;font-size:274%;color:white;position:relative;left:40;">AN INITIATIVE FOR VITIANS</sd><br>
                <sd style="font-family: 'Nova Round', cursive; font-size:274%;color:white;position:relative;left:40;">BY VITIANS</sd>
                <br><br>
                <sd style="color:#b7b7b7;position:relative;left:90;">A web created to share files among users</sd><br><br><br>
                <a href=""><sd style="color:#b7b7b7;position:relative;left:90;">Click Here to Know more...</sd></a>
                <iframe src="https://giphy.com/embed/l0Iyb2pEevoDThkFW" width="500" height="300" frameBorder="0" class="giphy-embed" allowFullScreen style="position:absolute;right:100;top:200;"></iframe>
            
            </div>
        
        </div>
        
        <div id="mid">
        <br><br>
            <p style="font-family: 'Fjalla One', sans-serif;font-size:300%;">Salient Features</p>
            <br><br><br>
            
            <figure style="position:relative;left:80">
                <img src="photos/phone-pc-file-transfer.jpg" height="200" width="350"><br><br><br>
                <figcaption>Seamless File Transfer. Unbeatable speed</figcaption>
            </figure>
                
            
            <figure style="position:relative;left:100">
                <img src="photos/a.jpg"><br>
                <figcaption>Old devices OUT&nbsp;&nbsp;<img src="photos/red%20cross.jpg" height="30">&nbsp;&nbsp;, PlugIn IN<img src="photos/green-tick.png" height="30"></figcaption>
            </figure>
            
            <figure style="position:relative;left:100">
                <img src="photos/grosse-dateien-uerbertragen-big.png"><br>
                <figcaption>Unbeatable Security</figcaption>
            </figure>
        </div>
    
        <!-- Login popup-->
        
        <div id="popup1" class="overlay">
            <div class="popup">
                <div class="content">
                    <form class="boxl" method="post">
                      <h1>Login</h1>
                        <a class="close" href="#">&times;</a>
                      <input type="text" name="us" placeholder="Username" required>
                      <input type="password" name="pw" placeholder="Password" required>
                      <input type="submit" name="" value="Login" onclick="window.location.href='#'">
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div id="popup2" class="overlay">
            <div class="popup">
                <div class="content">
                    <form class="boxl" method="post">
                      <h1>Register</h1>
                        <a class="close" href="#">&times;</a>
                      <input type="text" name="us" placeholder="Username" required>
                      <input type="text" name ="nick" placeholder="NickName" required>
                        <span style="color:white;"><br>Male<input type="radio" name="gd" value="M" checked>Female<input type="radio" name="gd" value="F"></span>
                      <input type="text" name="ad" placeholder="Address">
                      <input type="email" name="em" placeholder="Email" required>
                      <input type="password" name="pw" placeholder="Password" required>
                      <input type="submit" name="" value="Register" onclick="window.location.href='#'">
                    </form>
                </div>
            </div>
        </div>
        
        <div id="popup3" class="overlay">
            <div class="popup">
                <div class="content">
                    <form class="boxl" method="get">
                      <h2 style="color:white;">Write your Query/suggestion and we will get back to you</h2>
                        <a class="close" href="#">&times;</a>
                      <input type="text" name="us" placeholder="Name" required>
                      <input type="email" name="em" placeholder="Email" required>
                      <textarea rows="4" cols="20" required name="com"></textarea>
                      <input type="submit" name="" value="Login" onclick="window.location.href='#'">
                           
                    </form>
                </div>
            </div>
        </div>
    </body>
    
</html>