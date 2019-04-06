<?php

    session_start();
        if($_SESSION["user"]!="verified")
        {
            header('Location: index.php');
        }
    $con=new mysqli("localhost","root","","plugin");
    $id=$_SESSION["nm"];
    $sql="SELECT * FROM `login` WHERE Name='$id'";
    $res=$con->query($sql);
    $row=$res->fetch_assoc();
    $nm=$_SESSION["nm"];

?>


<html>

    <head>
    
        <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Offside" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


        
        <title>Profile Page</title>
        
        <style>
        
            
            /* Style the tab */
            .tab {
              overflow: hidden;
              border-bottom: 1px solid black;
            }

            /* Style the buttons inside the tab */
            .tab button {
              background-color: inherit;
              float: left;
              border: none;
              outline: none;
              cursor: pointer;
              padding: 14px 16px;
              transition: 0.3s;
              font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
              background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
              background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
              display: none;
              padding: 6px 12px;
            }
            .foo
            {
                font-family: 'Concert One', cursive;
                font-size: 120%;
            }
            
            
            
            
            
            
            
            
            
            #topbar{
                background-color: #000000;
                height:60;
                border-bottom: 1px solid white;
            }
            body{
                margin:0;
                padding: 0;
            }
        
            #det{
                margin-left: 600;
                position: relative;
                bottom:160;
                height:300;
                width: 800;
            }
            .tt{
                font-family: 'Offside', cursive;
                font-weight: bold;
                padding-right: 20px;
            }
            .dd{font-family: 'Abel', sans-serif;}
            det{
                font-size: 130%;
            }
            #side{
                height:300;
                width: 300;
                position:absolute;
                top:600;
                width: 400;
                left: 90;
            }
            ft
            {
                font-family: 'Ubuntu', sans-serif;
                font-size: 140%;
                padding-left: 10;
            }
            a{
                text-decoration: none;
                color: black;
            }
            
        </style>
        
        <script>
        
            function opn(evt, Name) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(Name).style.display = "block";
              evt.currentTarget.className += " active";
            }
            
            function op(evt,op)
            {
                
            }
        
        </script>
        
    </head>

    <body>
    
        <div id="topbar">
        
            <img src="photos/logo.jpeg" height="60">
            <a href="index.php"><sd style="position:absolute;right:30;top:40;color:white;font-family: 'Bitter', serif;">Log Out</sd></a>
        </div>
        
        <div id="cover">
            
            <img src="<?php echo $row["cover"]?>" width="1536" height="300">
            <img src="<?php echo $row["prof"]?>" style="border-radius:50%;position:relative; left:120;bottom:100;" height='200' width="200">
            <sd style="position:absolute;left:160;top:480;font-family: 'Acme', sans-serif;font-size:200%"><?php echo $row["Name"]?></sd>
        </div>
        
        
        <div id="det">
        
            <sd style="font-family: 'Lilita One', cursive; font-size:200%"><?php echo $row["Name"]?> &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-map-marker" style="font-size:50%">&nbsp;&nbsp;India</span></sd>
            
            <br><br><br><br>
            <div class="tab">
              <button class="tablinks" onclick="opn(event, 'abt')"><img src="photos/abt.jpg" height="15">About</button>
              <button class="tablinks" onclick="opn(event, 'hst')"><img src="photos/clock.png" height="15">History</button>
              
            </div>
            
            <div id="abt" class="tabcontent">
                <br><br>
                <smg style="color:#bec0c4"><i>General Details</i></smg>
                <br><br><br>
                <det><span class="tt">Name</span><span class="dd"><?php echo $row["Name"] ?></span></det><br><br>
                <det><span class="tt">Nick</span><span class="dd"><?php echo $row["NICK"] ?></span></det><br><br>
                <det><span class="tt">Gender</span><span class="dd"><?php echo $row["GENDER"] ?></span></det>
                <br><br>
                
                
                <br><br><br><br><br>
                <smg style="color:#bec0c4"><i>Contact Details</i></smg>
                <br><br><br>
                <det><span class="tt">Phone</span><span class="dd">9831788273</span></det><br><br>
                <det><span class="tt">Address</span><span class="dd"><?php echo $row["AD"] ?></span></det><br><br>
                <det><span class="tt">Email</span><span class="dd"><?php echo $row["Email"] ?></span></det>
                
                <br><br><br><br><br>
                <smg style="color:#bec0c4"><i>Basic Details</i></smg>
                <br><br><br>
                <det><span class="tt">Birthday</span><span class="dd">1 May 1999</span></det><br><br>
                <det><span class="tt">Profession</span><span class="dd">Student</span></det>
                
            </div>

            <div id="hst" class="tabcontent">
                <center>
                <?php 
                    $s="SELECT * FROM ht WHERE Name='$nm'";
                    $res=$con->query($s);
                    if($res->num_rows==0)
                    {
                ?>
                    <img src="photos/error.jpg">
                    <h2>Send something to show in history</h2>
                <?php
                    }
                    else
                    {
                        ?>
                        
                    <table border="1">
                        
                        <tr>
                            <th>Serial Number</th>
                            <th>Sent to</th>
                            <th>File</th>
                        </tr>
                        <?php
                        $ct=1;
                        while($row=$res->fetch_assoc())
                        { ?> 
                        
                            <tr>
                                <td><?php echo $ct;$ct+=1;?></td>
                                <td><?php echo $row["to_em"]?></td>
                                <td><a href="<?php echo $row["fid"] ?>"><u>Click Here to View</u></a></td>
                            </tr>
                               
                        <?php
                        }
                        ?>
                    </table>
                    
                    <?php
                    }
                ?>
                
                </center>
                
            </div>
        </div>
        
        
        <div id="side">
        
            <a href="#"><img src="photos/hand-pointing-right-sign-vector-22414922.jpeg" height="30" style="position:relative;top:5;"><ft>About Me</ft></a>
            <br><br>
            <a href="sd.php"><img src="photos/hand-pointing-right-sign-vector-22414922.jpeg" height="30" style="position:relative;top:5;"><ft>Send to E-Mail</ft></a>
            <br><br>
            <a href="sdd.php"><img src="photos/hand-pointing-right-sign-vector-22414922.jpeg" height="30" style="position:relative;top:5;"><ft>Send to Account</ft></a>
            <br><br>
            <a href="rc.php"><img src="photos/hand-pointing-right-sign-vector-22414922.jpeg" height="30" style="position:relative;top:5;"><ft>Receive</ft></a>
            <br><br>
            <a href="set.php"><img src="photos/hand-pointing-right-sign-vector-22414922.jpeg" height="30" style="position:relative;top:5;"><ft>Settings</ft></a>
        </div>
        
        
    </body>

</html>