<?php include "templates/header.php"; ?>

<h2>Rationale</h2>
<h4>Initial Aims & Requirements</h4>
<p><strong>Timeline</strong>: Due by midnight on the 4th of September. Roughly 16 hours available time.</p>
<p><strong>Task</strong>: Create a recipes app</p>
<p><strong>Functionality</strong>: The user must be able to:
<ul>
    <li>Create, view, edit, and delete recipes.</li>
    <li>Register a user account, login, and logout.</li>
    <li>Have an online web interface.</li>
    <li>List recipes in a card like table/list on the homepage.</li>
    <li>Display with an image.</li>
    <li>Display ingredients as a list of items.</li>
</ul>
<h4>Development Cycle</h4>
<p>
    With a very limited amount of time, the ground works are imperative to get in place. From the past modules learnt in Backend Web Development the baseline for 
    connecting to, creating, retrieving, and displaying data from, a database.
</p>
<p>
    The database variables and inputs were defined for the database as:
    <ul>
        <li><em>id</em> as an integer and primary key.</li>
        <li><em>recipe</em> as a 30 variable character for the recipe name.</li>
        <li><em>recipe_description</em> as a 100 variable character for a description.</li>
        <li><em>recipe_method</em> as a 500 variable character for the method used to cook the recipe.</li>
        <li><em>protein</em> as an input limited 30 variable character for the main protein used in the recipe.</li>
        <li><em>ingredients</em> as a 500 variable character for a list of ingredients used in the recipe.</li>
        <li>And a set of user details for the users table to allow for registration, logging in, and logging out.</li>
    </ul>
</p>
<p>
    The framework for the requirements were set up. The index page and the view page are setup to retrieve data from the database. Index retrieves a list of all items, while view is limited to an individual item.<br>
    The create page defines the variables, and when data is submitted will insert it into the database and refresh the page for another recipe to be added.<br>
    The login page checks the inputted username and password against the database.<br>
    The register link on the login page allows for a username and password to be created in the database after checking if the username exists.<br>
    Once logged in the user has the option to log out or reset their password by overwriting the password data for the user's id.<br>
    The update work page is linked with the delete option. When the save button is pressed it will update the table for the id, while the delete button deletes the row. 
</p>

<h4>Issues</h4>
<p>
    Due to time restrictions and my knowledge on the subject, the issues were numerous and have left the project feel incomplete. This is not however from lack of trying.<br>
    The index page is lacking images for the recipes as I was unable to correctly display a mediumblob as an image. I was unable to devise a way to implement the text transformation of capitalize to the retrieve data from the database<br>
    On the create page, the sizing of the boxes did not change with css for the textarea input types.<br>
    On the update-work page, I was unable to set the value of the protein to match what was in the database. Additionally, despite a metric butt tonne of Googling, I was unable to nest a second delete button to confirm deletion and have the page still function.<br>
    While changing the coding of the update-word page, noticed a dependency for the ID where the HTML form input was required for the SQL update to function. Subsequently, reinstated the form input and hide from the user.<br>
    I was unaware of a way to import the ingredients as an array that would be displayed and formatted properly, as a result they are listed in a continuous section.<br>
</p>

<h4>Redefining Aims & Requirements</h4>
<p>
    To ensure the project was completed in the required time the following changes were instated:
    <ul>
        <li>Images have been removed from the SQL setup script and pages.</li>
        <li>The select values for the protein have been capitalized on the backend to display the same thing on the front end.</li>
        <li>On the create and update works page, the labels and input fields have been put inline to provide a more aesthetic view. This would be updated to allow for a larger text area for the method and ingredients.</li>
        <li>Ingredients are to be displayed as basic text.</li>
    </ul>
</p>

<h4>Results</h4>
<p>
    The website sets out to do exactly what was required; create, view, edit, and delete recipes; and register a user account, login, and logout.<br>
    Some of my design aspirations were reached, but improvements could be made with additional time.<br>
    As part of the design I have also added a navigation bar from another project. This allows for quick and easy access to all the important sections of the website.
<p>
    Overall, I'm very happy with this website. It may be very basic but the experience using PHP calls and SQL variables and connections was important.<br>
    I'm looking forwards to using a CMS where I can call the PHP directly and avoid the SQL coding as much as possible.
</p>

<?php include "templates/footer.php" ?>