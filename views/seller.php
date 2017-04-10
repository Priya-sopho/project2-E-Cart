<?php
 //Just to check
 //print_r(mysql_fetch_assoc($rows));
?> 
   <div class="container">
    <table style="margin-left:auto; margin-right:auto; color: #333; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse:collapse; border-spacing: 0;" >
            <tr>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Image</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Title</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Description</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Price</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">College</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Category</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Contact Seller</th>
            </tr>    
            
            <?php while ($r = mysql_fetch_assoc($rows)): ?>
              <?php
                  $uid = $r["Uid"];
                  $ca_id = $r["Ca_id"];
                  $id = $r["I_id"];
                  $query1="Select Name FROM College where Cid = ( SELECT Cid from Account where UID = '$uid')";
                  $query2= "Select Cname FROM Category where Ca_id = $ca_id";
                  ?>
                   <tr>
                    <td style="border: 1px solid #CCC;"><?= "<img src=\"".$r["Image"]."\" width=100px height=50px >" ?> </td>
                    <td style="border: 1px solid #CCC;"><?= $r["Title"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= $r["Description"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= $r["Price"] ?></td>
                    <td style="border: 1px solid #CCC;"><?php $name = mysql_query($query1); 
                      $clg= mysql_fetch_assoc($name);
                      echo $clg["Name"];
                      ?></td>
                    <td style="border: 1px solid #CCC;"><?php $name = mysql_query($query2); 
                      $ctg= mysql_fetch_assoc($name);
                      echo $ctg["Cname"];
                      ?></td>
                    <td style="border: 1px solid #CCC;"><?= $r["Contact"] ?></td>
                </tr>
            <?php endwhile ?>
    </table>
</div>

