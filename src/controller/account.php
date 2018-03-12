<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>This is the account.php file</title>
    </head>
    <body>
        <?php
        $displayAccountId = $_GET['id'] ?? null;
        
        if (! $displayAccountId || ! is_numeric($displayAccountId)) {
            ?> 
        		<div>
        			<p>To be displayed, this page need a valid numeric id as query</p>
        		</div>
        <?php
        } else {
            try {
                $connection = new PDO('mysql:host=localhost;dbname=warehousedb', 'root');
            } catch (PDOException $exception) {
                http_response_code(500);
                echo 'A problem occured, please contact support';
                exit(10);
            }
                      
            $sql = 'SELECT * FROM user WHERE username = :username';
            $statement = $connection->prepare($sql);
            
            $statement->bindParam('username', $displayAccountUsername, PDO::PARAM_STR);
            
            $statement->execute();
            
            $results = $statement->fetchAll();
            if (empty($results)) {
                echo "This ID doesn't exist!";
            }
            foreach ($results as $current) {
                ?>
                    <p>Username: <?php
                
echo $current["username"]?> </p>
                    <p>Password: <?php
                
echo $current["password"]?> </p>
                    <?php
            }
        }
        ?> 
    </body>
</html>
