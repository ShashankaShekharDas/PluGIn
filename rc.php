<?php

    session_start();
    $conn=new mysqli("localhost","root","","plugin");
    $nm=$_SESSION["nm"];
    $sql="SELECT * FROM `rec` WHERE too='$nm'";
    $res=$conn->query($sql);
    if($res->num_rows>0)
    {
        ?>
        
            <table border="3">

                <tr>
                        <th>From</th>
                        <th>File</th>
                </tr>
                <?php
        
                while($row=$res->fetch_assoc())
                {
                    ?>
                    <tr>

                        <td><?php echo $row["frm"]?></td>
                        <td><a href="<?php echo $row["link"];?>">Click to view Attachment</a></td>

                    </tr>
                <?php
                }?>

            </table>
    <?php
        
    }

?>