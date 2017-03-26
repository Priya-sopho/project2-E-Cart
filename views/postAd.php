<form action="postAd.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <div>
            Category: <select name="category" onchange="chk(this.value)">
            <option value="0" selected disabled>Select Category</option>
            <?php 
            $row = mysql_query('Select * from Category');
            while($r=mysql_fetch_assoc($row))
                {
                    $name = $r["Cname"];
                    $value = $r["Ca_id"];
                    echo "<option value= $value>".$name."</option>";
                }
            ?>      
            </select><br><br>
        </div>
        <div class="form-group">
            Item Title: <input  autofocus class="form-control" name="title" placeholder="item title" type="text"/>
        </div>
        <div class="form-group">
            Description: <textarea type="text" autofocus class="form-control" name="description" placeholder="description" maxlength="200"></textarea>
        </div>
        <div class="form-group">
            contact: <textarea type="text" autofocus class="form-control" name="contact" placeholder="contact"></textarea>
        </div>
        <div>
           <input type="radio" name="choice" value="donate" checked> donate <input type="radio" name="choice" value="sell" /> sell<br><br>
        </div>
        <div class="form-group">
             <input type="text" name="price" placeholder="Your Price (In Rs.)"><br>
        </div>
        <div class="form-group">
            <center><input type="file" name="image" id="image" /></center>
            <button id="upload">Upload</button>
    
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Submit
            </button>
        </div>
    </fieldset>
</form>
