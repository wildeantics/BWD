<?php 

    // include the config file that we created last week
    require "../config.php";
    function escape($html) { return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8"); }


    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
            $work =[
                "id"         => $_POST['id'],
                "recipe"    => $_POST['recipe'], 
                "recipe_description"     => $_POST['recipe_description'],
                "recipe_method"      => $_POST['recipe_method'],
                "ingredients"      => $_POST['ingredients'],  
                "protien"      => $_POST['protien'], 
            ];
            
            // create SQL statement
            $sql = "UPDATE `recipies` 
                    SET id = :id, 
                        recipe = :recipe, 
                        recipe_description = :recipe_description, 
                        recipe_method = :recipe_method, 
                        ingredients = :ingredients, 
                        protien = :protien 
                    WHERE id = :id";

            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($work);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    if (isset($_POST['delete'])) { ?>
        <p>Are you sure? This cannot be undone.</p>
        <input type="submit" name="delete-confirm" value="Delete Permanently">
    
    <?php }
    if (isset($_POST['delete-confirm'])) {
        if (isset($_GET["id"])) {
            // this is called a try/catch statement 
            try {
                // define database connection
                $connection = new PDO($dsn, $username, $password, $options);
                
                // set id variable
                $id = $_GET["id"];
                
                // Create the SQL 
                $sql = "DELETE FROM recipies WHERE id = :id";

                // Prepare the SQL
                $statement = $connection->prepare($sql);
                
                // bind the id to the PDO
                $statement->bindValue(':id', $id);
                
                // execute the statement
                $statement->execute();

                // Success message
                $success = "Work successfully deleted";

                header("Location: ./");

            } catch(PDOException $error) {
                // if there is an error, tell us what it is
                echo $sql . "<br>" . $error->getMessage();
            }
        };
    }
    // GET data from DB
    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM recipies WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };


?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>

<h2>Edit a work</h2>

<form method="post">
    <label for="recipe">Recipe</label>
    <input type="text" name="recipe" id="recipe" value="<?php echo escape($work['recipe']); ?>">
    <br>
    <label for="recipe_description">Recipe Description</label>
    <input type="text" name="recipe_description" id="recipe_description" value="<?php echo escape($work['recipe_description']); ?>">
    <br>
    <label for="recipe_method">Method</label>
    <input type="textarea" name="recipe_method" id="recipe_method" value="<?php echo escape($work['recipe_method']); ?>">
    <br>
    <label for="protien">Work Type</label>
    <select name="protien" id="protien" value="<?php echo escape($work['protien']); ?>">
        <option value="beef">Beef</option>
        <option value="pork">Pork</option>
        <option value="poultry">Poultry</option>
        <option value="dairy">Dairy</option>
        <option value="vegetables">Vegetables</option>
    </select>
    <br>
    <label for="ingredients">Ingredients</label>
    <input type="text" name="ingredients" id="ingredients" value="<?php echo escape($work['ingredients']); ?>">
    <br>
    <input type="submit" name="submit" value="Save">
    <input type="submit" name="delete" value="Delete">

</form>





<?php include "templates/footer.php"; ?>