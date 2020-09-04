<?php
include "templates/header.php";
    require "../config.php";
    // this is called a try/catch statement
    try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
        // SECOND: Create the SQL
        $id = $_GET['id'];
        $sql = "SELECT * FROM recipes WHERE id = $id";
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
<?php foreach($result as $row) { ?>
    <h2><?php echo $row['recipe']; ?></h2>
    <?php echo $row['recipe_description']; ?><br>
    Protein: <?php echo $row['protein']; ?><br>
    Ingredients: <?php echo $row['ingredients']; ?><br>
    Method: <?php echo $row['recipe_method']; ?><br>
    <a href='update-work.php?id=<?php echo $row['id']; ?>'>Edit</a>
<?php 
}
include "templates/footer.php"; ?>