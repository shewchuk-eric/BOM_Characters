<?php

// set page title and call header
    $pageTitle = "Add Characters"; 
    $description = "Add characters from the Book of Mormon and information about into a searchable database.";
    include_once 'header.php'; ?>

<?php
    if(isset($_SESSION['message']) || isset($message)) {
        if(isset($_SESSION['message'])) {
            $display = $_SESSION['message'];
        } else {
            $display = $message;
        }
        $displayMessage = "<span class='message'>";
        $displayMessage .= $display;
        $displayMessage .="</span>";
        echo $displayMessage;
    }
?>

<section>
<h1>Add Book of Mormon Characters</h1>
<form id="addChar" method="post" action="index.php">
        <fieldset><legend>Character Details</legend>
        <div class="form-field input-right">
            <label for="charName">Character's Name</label><br>
            <input name="charName" id="charName" type="text" <?php if (isset($charName)) { echo "value='$charName'";} ?> required>
        </div>
        <div class="form-field input-right">
            <h5>Type Of Character</h5>
            <label for="hero">Hero</label>
            <input name="charType" id="hero" type="radio" value="Hero" <?php if (isset($charType) && $charType == 'Hero') { echo "checked";} ?>>
            <label for="charType">Zero</label>
            <input name="charType" id="zero" type="radio" value="Zero" <?php if (isset($charType) && $charType == 'Zero') { echo "checked";} ?>>
        </div>
        <div class="form-field input-right">
            <label for="firstSeen">What Chapter Is Character First Seen In?</label><br>
            <input name="firstSeen" id="firstSeen" type="text" <?php if (isset($firstSeen)) { echo "value='$firstSeen'";} ?> required>
        </div>
        <div class="form-field input-right">
            <label for="verse">What Verse?</label><br>
            <input name="verse" id="verse" type="text" <?php if (isset($verse)) { echo "value='$verse'";} ?> required>
        </div>
        <div class="form-field input-right">
            <label for="abstract">Comments</label><br>
            <textarea name="abstract" id="abstract"></textarea>
        </div>
        <div class="form-field submit-field">
            <input type="submit" value="Add New Character">
            <input type="hidden" name="action" value="addChar">
        </div>
        </fieldset>
    </form>

<?php if(isset($reviewMessage)) {echo "<span class='message'>$reviewMessage</span>";} ?>
<?php


?>


</section>

<?php unset($_SESSION['message']); ?>
<?php include_once 'footer.php'; ?>