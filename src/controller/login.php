<?php
if (session_id() == '') {
    // session has not started
    session_start();
};

var_dump("session-key= " . session_id());


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My personal  login</title>
    </head>
    <body>
    	<div>
    		 <form action="/index.php/login" method= "GET">
        		<h1>Log-In</h1>
            	<label for ="username">Your username:</label>
            	                    
                    <input type="text" name="username" placeholder="username" value="<?php echo htmlentities($username ?? "");?>"/>
                    <br/>
                
                    <label for = "password">Your password:</label>
                    <input type="password" name="password1"/>
                
                    <br/>
                    
                    <button type="submit">Submit</button>
               	</form>
        	</div>
    </body>
</html>

