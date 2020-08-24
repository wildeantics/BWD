<?php
// include the config file that we created before
require "../config.php"; 
// Connects to db and establishes variables
try {
    $connection = new PDO($dsn, $username, $password, $options);
    $new_work = array( 
        "artist"    => $_POST['artist'], 
        "song"     => $_POST['song'],
        "releasedate"      => $_POST['releasedate'],
        "genre"      => $_POST['genre'], 
    );
    $sql = "INSERT INTO works (
        artist,
        song,
        releasedate,
        genre
    ) VALUES (
        :artist,
        :song,
        :releasedate,
        :genre
    )";  
    $statement = $connection->prepare($sql);
    $statement->execute($new_work);
    } 
// If it fails it shows an error
    catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
include "templates/header.php";
?>

<h2>Add a Song</h2>
<!-- If it works it'll display -->
<?php if (isset($_POST['submit']) && $statement) { ?>
    <p>Work successfully added.</p>
<?php } ?>

<!-- Form to insert data -->
<form method="post">
<label for="artist">Artist Name</label> 
<input type="text" name="artist" id="artist"> 
<label for="song">Work Title</label> 
<input type="text" name="song" id="song"> 
<label for="releasedate">Work Date</label> 
<input type="date" name="releasedate" id="releasedate"> 
<label for="genre">Work Type</label> 
<input type="text" name="genre" id="genre"> 
<input type="submit" name="submit" value="Submit">
</form>

<?php include "templates/footer.php"; ?>