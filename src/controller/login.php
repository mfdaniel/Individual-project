
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My personal Warehouse login</title>
    </head>
    <body>
    	<div>
    		 <form action="/index.php/login" method= "POST">
        		<h1>Log-In</h1>
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

