<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            E-mail address: <input autocomplete="off" autofocus class="form-control" name="email" placeholder="E-mail address" type="text"/>
        </div>
        <div class="form-group">
            Username: <input autocomplete="off" autofocus class="form-control" name="name" placeholder="Username" type="text"/>
        </div>
        <div>
            College: <select name="college">
            <option value="all"> All </option>
            <?php 
            $row = mysql_query('Select * from College');
            while($r=mysql_fetch_assoc($row))
                {
                    $name = $r["Name"];
                    echo "<option value= '$name'>".$name."</option>";
                }
            ?>      
            </select>
        </div>
        <div class="form-group">
            Password: <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            Retype Password: <input class="form-control" name="confirm_password" placeholder="confirmation" type="password"/>
        </div>
        <div>
            Gender: <input type="radio" name="gender" value="male" checked> M  <input type="radio" name="gender" value="female"> F
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a> for an account
</div>
