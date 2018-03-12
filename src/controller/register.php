<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'] ?? null;
    $password1 = $_POST['password1'] ?? null;
    $password2 = $_POST['password2'] ?? null;
    
    echo 'You have been signed up correctly' . "<br>";
    
    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = ($password1 === $password2 && strlen($password1) > 7);
    
    if ($usernameSuccess && $passwordSuccess) {
        try {
            $connection = Service\DBConnector::getConnection();
        } catch (PDOException $exception) {
            http_response_code(500);
            echo 'A problem occured, please contact support';
            exit(10);
        }
        
        $sql = "INSERT INTO user(username, password) VALUES (\"$username\",\"$password1\") ";
        $affected = $connection->exec($sql);
        
        if (! $affected) {
            echo implode(", ", $connection->errorInfo());
        }
        
        $id = $connection->lastInsertId();
        
        echo 'Store data';
        return;
    }
    ;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My personal Warehouse registration</title>
    </head>
    <body>
    	<div>
    		 <form action="/index.php/register" method= "POST">
        		<h1>Sign-up</h1>
            	<label for ="username">Your username:</label><?php if(! ($usernameSuccess ?? true)) {?>
           				 <div>
            				<p style="color:red">You have an error in your username</p>
          				 </div>
               			 <?php 
                                };
                            ?>
                    
                    <input type="text" name="username" value=" <?php echo htmlentities($username ?? "");?>"/>
                
                    <br/>
                
                    <label for = "password">Your password:</label>
                    <input type="password" name="password1"/>
                
                    <br/>
                
                    <label for = "password2">Retype your password:</label>
                    <input type="password" name="password2"/>
                        <?php
                        
                        if (! ($passwordSuccess ?? true)) {
                            ?>
                            <div>
                            	<p style="color:red" >Your password has an error</p>
                            </div>
                        <?php
                        }
                        ?>
                
                    <br/>
                    
                    <button type="submit">Submit</button>
                </form>
        	</div>
    </body>
</html>

