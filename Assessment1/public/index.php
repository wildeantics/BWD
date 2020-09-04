<?php
include "templates/header.php";
    require "../config.php";
    // this is called a try/catch statement
    try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
        // SECOND: Create the SQL
        $sql = "SELECT * FROM recipes";
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        // if there is an error, tell us what it is
        echo $sql . "<br>" . $error->getMessage();
    }
?>

<h2>Recipes</h2>
<?php
    
    // This is a loop, which will loop through each result in the array
    foreach($result as $row) {
        ?>
        <p class="cards">
        <?php echo $row['recipe']; ?><br>
        <?php echo $row['recipe_description']; ?><br>
        Protein: <?php echo $row['protein']; ?><br>
        Ingredients: <?php echo $row['ingredients']; ?><br>
        Method: <?php echo $row['recipe_method']; ?><br>
        <a href='update-work.php?id=<?php echo $row['id']; ?>'>Edit</a> | 
        <a href='view.php?id=<?php echo $row['id']; ?>'>View</a>
        </p>
        <?php
    };
?>

</div>
<?php include "templates/footer.php"; ?>