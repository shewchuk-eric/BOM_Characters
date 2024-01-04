<?php

// set page title and call header
    $pageTitle = "Add Characters"; 
    $description = "Add characters from the Book of Mormon and information about into a searchable database.";
    include_once 'header.php'; ?>

<?php
    if(isset($_SESSION['message'])) {
        $message = "<span class='message'>";
        $message .= $_SESSION['message'];
        $message .="</span>";
        echo $message;
    }
?>

<section>
<h1>Add Book of Mormon Characters</h1>
<h2>New Character</h2>
<form id="addChar" method="post" action="index.php">
        <fieldset><legend>Character Details</legend>
        <div class="form-field input-right">
            <label for="charName">Character's Name</label>
            <input name="charName" id="charName" type="text" <?php if (isset($charName)) { echo "value='$charName'";} ?> required>
        </div>
        <div class="form-field input-right">
            <h3>Type Of Character</h3>
            <label for="hero">Hero</label>
            <input name="charType" id="hero" type="radio" value="Hero" <?php if (isset($charType) && $charType == 'Hero') { echo "checked";} ?>>
            <label for="charType">Zero</label>
            <input name="status" id="zero" type="radio" value="Zero" <?php if (isset($charType) && $charType == 'Zero') { echo "checked";} ?>>
        </div>
        <div class="form-field input-right">
            <label for="firstSeen">Where Is Character First Seen?</label>
            <input name="firstSeen" id="firstSeen" type="text" <?php if (isset($firstSeen)) { echo "value='$firstSeen'";} ?> required>
        </div>
        <div class="form-field input-right">
            <label for="abstract">Comments</label>
            <textarea name="abstract" id="abstract"></textarea>
        </div>
        <div class="form-field submit-field">
            <input type="submit" value="Add New Character">
            <input type="hidden" name="action" value="addChar"> <!-- add name/value pair for action value -->
        </div>
        </fieldset>
    </form>

<?php if(isset($reviewMessage)) {echo "<span class='message'>$reviewMessage</span>";} ?>
<?php


?>


</section>

<?php unset($_SESSION['message']); ?>
<?php include_once 'footer.php'; ?>