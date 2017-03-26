 <?php if (!empty($_SESSION["id"])): ?>
 <h1>Welcome, <a href="portfolio.php" >
    <?php $id = $_SESSION["id"]; $name = mysql_query("SELECT Name FROM Account WHERE Uid=$id"); 
    $user= mysql_fetch_assoc($name);
    echo $user["Name"];
    ?>
 </a>
 <br>
 </h1>
 <?php endif ?>
 <b>
 Cateories: &nbsp;
  <?php
    $record = mysql_query("SELECT * FROM Category");
    while($r=mysql_fetch_assoc($record))
    {
    $name = $r["Cname"];
    $cid = $r["Ca_id"];
    echo "<a href= 'store.php?q=$cid' name='Category'>".$name."</a> | ";
    }
  ?>      
 <select action = 'store.php' name="College" onchange="chk(this.value)">
  <option value="0"Selected disabled>Select College</option>
    <?php 
      $record = mysql_query('Select * from College');
      while($r=mysql_fetch_assoc($record))
      {
        $name = $r["Name"];
        $cid = $r["Cid"];  
        echo "<option value= '$cid'>".$name."</option>";
      }
    ?>      
  </select></b><br><br>
  
  <div class="container">
    <table style="margin-left:auto; margin-right:auto; color: #333; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse:collapse; border-spacing: 0;" >
            <tr>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Image</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Title</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Price</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">College</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Category</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Contact Seller</th>
            </tr>    
            
            <?php while ($r = mysql_fetch_assoc($rows)): ?>
              <?php
                  $uid = $r["Uid"];
                  $ca_id = $r["Ca_id"];
                  $query1="Select Name FROM College where Cid = ( SELECT Cid from Account where UID = '$uid')";
                  $query2= "Select Cname FROM Category where Ca_id = $ca_id";
                  ?>
                   <tr>
                    <td style="border: 1px solid #CCC;"><?= $r["Image"] ?> </td>
                    <td style="border: 1px solid #CCC;"><?= $r["Title"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= $r["Price"] ?></td>
                    <td style="border: 1px solid #CCC;"><?php $name = mysql_query($query1); 
                      $clg= mysql_fetch_assoc($name);
                      echo $clg["Name"];
                      ?></td>
                    <td style="border: 1px solid #CCC;"><?php $name = mysql_query($query2); 
                      $ctg= mysql_fetch_assoc($name);
                      echo $ctg["Cname"];
                      ?></td>
                    <td style="border: 1px solid #CCC;"><?= "<a href='seller.php'>Contact Seller</a>" ?></td>
                </tr>
            <?php endwhile ?>
    </table>
</div>
 
 
