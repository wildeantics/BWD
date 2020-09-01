<?php
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
    // include the config file that we created before
    require "../config.php"; 
    // Connects to db and establishes variables
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_work = array( 
            "recipe"    => $_POST['recipe'], 
            "recipe_description"     => $_POST['recipe_description'],
            "recipe_method"      => $_POST['recipe_method'],
            "ingredients"      => $_POST['ingredients'],  
            "protien"      => $_POST['protien'], 
        );
        $sql = "INSERT INTO recipies (
            recipe,
            recipe_description,
            recipe_method,
            protien,
            ingredients
        ) VALUES (
            :recipe,
            :recipe_description,
            :recipe_method,
            :protien,
            :ingredients
        )";  
        $statement = $connection->prepare($sql);
        $statement->execute($new_work);
        } 
    // If it fails it shows an error
    catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
include "templates/header.php";
?>

<h2>Add a Recipe</h2>
<!-- If it works it'll display -->
<?php if (isset($_POST['submit']) && $statement) { ?>
    <p>Work successfully added.</p>
<?php } ?>

<!-- Form to insert data -->
<form method="post">
<label for="recipe">Recipe Name</label> 
<input type="text" name="recipe" id="recipe"> 
<br>
<label for="recipe_description">Recipe Description</label> 
<input type="text" name="recipe_description" id="recipe_description"> 
<br>
<label for="recipe_method">Method</label> 
<input type="textarea" name="recipe_method" id="recipe_method">
<br>
<label for="protien">Protien</label>
<select name="protien" id="protien">
    <option value="beef">Beef</option>
    <option value="pork">Pork</option>
    <option value="poultry">Poultry</option>
    <option value="dairy">Dairy</option>
    <option value="vegetables">Vegetables</option>
</select>
<br>
<label for="ingredients">Ingredients</label> 
<input type="textarea" name="ingredients" id="ingredients">
<br>
<input type="submit" name="submit" value="Submit">
</form>

<?php include "templates/footer.php"; ?>