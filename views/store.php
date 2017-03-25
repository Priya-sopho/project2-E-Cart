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
    $row = mysql_query("SELECT * FROM Category");
    while($r=mysql_fetch_assoc($row))
    {
    $name = $r["Cname"];
    echo "<a href= 'store.php' name='Category'>".$name."</a> | ";
    }
  ?>      
 <select name="College" onchange="chk(this.value)">
  <option value="0" selected disabled>Select College</option>
    <?php 
      $row = mysql_query('Select * from College');
      while($r=mysql_fetch_assoc($row))
      {
        $name = $r["Name"];
        echo "<option value= '$name'>".$name."</option>";
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
            
            <?php foreach ($row as $r): ?>
                <tr>
                    <td style="border: 1px solid #CCC;"><?= $r["Image"] ?> </td>
                    <td style="border: 1px solid #CCC;"><?= $r["Title"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= $r["Price"] ?></td>
                    <td style="border: 1px solid #CCC;"><?php $id=$r["Uid"]; $name = mysql_query("SELECT Name FROM College WHERE Cid=$id"); 
                      $clg= mysql_fetch_assoc($name);
                      echo $clg["Name"];
                      ?></td>
                    <td style="border: 1px solid #CCC;"><?php $id=$r["Ca_id"]; $name = mysql_query("SELECT Cname FROM Category WHERE Ca_id=$id"); 
                      $ctg= mysql_fetch_assoc($name);
                      echo $ctg["Name"];
                      ?></td>
                    <td style="border: 1px solid #CCC;"><?= "<a href='seller.php'>Contact Seller</a>" ?></td>
                </tr>
            <?php endforeach ?>
    </table>
</div>
 
 