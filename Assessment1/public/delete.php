
<?php
    // include the config file that we created before
    require "../config.php";
    function escape($html) { return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8"); }

    // this code will only execute after the submit button is clicked
    if (isset($_POST['submit'])) {

        // this is called a try/catch statement
        try {
            // FIRST: Connect to the database
            $connection = new PDO($dsn, $username, $password, $options);
            // SECOND: Create the SQL
            $sql = "SELECT * FROM works";
            // THIRD: Prepare the SQL
            $statement = $connection->prepare($sql);
            $statement->execute();
            // FOURTH: Put it into a $result object that we can access in the page
            $result = $statement->fetchAll();
        } catch(PDOException $error) {
            // if there is an error, tell us what it is
            echo $sql . "<br>" . $error->getMessage();
        }
    }

include "templates/header.php";

if (isset($_POST['submit'])) {
    //if there are some results
    if ($result && $statement->rowCount() > 0) {
?>
<h2>Results</h2>
<?php
    foreach($result as $row) {
?>
<p>
ID:
<?php echo $row["id"]; ?><br> Artist Name:
<?php echo $row['artist']; ?><br> Work Title:
<?php echo $row['song']; ?><br> Work Date:
<?php echo $row['releasedate']; ?><br> Work type:
<?php echo $row['genre']; ?><br>
</p>
<?php
// this willoutput all the data from the array
//echo '<pre>'; var_dump($row);
?>
<hr>
<?php }; //close the foreach
};
};
?>
<form method="post">
<input type="submit" name="submit" value="View all">
</form>
<?php include "templates/footer.php"; ?>