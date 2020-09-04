<?php
include "templates/header.php";
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
    require "../config.php"; 
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_work = array( 
            "recipe"    => $_POST['recipe'], 
            "recipe_description"     => $_POST['recipe_description'],
            "recipe_method"      => $_POST['recipe_method'],
            "ingredients"      => $_POST['ingredients'],  
            "protein"      => $_POST['protein']
        );
        $sql = "INSERT INTO recipes (
            recipe,
            recipe_description,
            recipe_method,
            protein,
            ingredients
        ) VALUES (
            :recipe,
            :recipe_description,
            :recipe_method,
            :protein,
            :ingredients
        )";  
        $statement = $connection->prepare($sql);
        $statement->execute($new_work);
        } 
    catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<h2>Add a Recipe</h2>

<form method="post">
    <label class="inline-label" class="inline-label" for="recipe">Recipe Name</label> 
    <input class="inline-input" type="text" name="recipe" id="recipe"> 
    <br>
    <label class="inline-label" for="recipe_description">Recipe Description</label> 
    <input class="inline-input" type="text" name="recipe_description" id="recipe_description"> 
    <br>
    <label class="inline-label" for="recipe_method">Method</label> 
    <input class="inline-input" type="textarea" name="recipe_method" id="recipe_method">
    <br>
    <label class="inline-label" for="protein">Protein</label>
    <select class="inline-input" name="protein" id="protein">
        <option value="Beef">Beef</option>
        <option value="Pork">Pork</option>
        <option value="Poultry">Poultry</option>
        <option value="Dairy">Dairy</option>
        <option value="Vegetables">Vegetables</option>
    </select>
    <br>
    <label class="inline-label" for="ingredients">Ingredients</label> 
    <input class="inline-input" type="textarea" name="ingredients" id="ingredients">
    <br><br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <p>Work successfully added.</p>
<?php } ?>

<?php include "templates/footer.php"; ?>