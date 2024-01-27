<?php

// set page title and call header
    $pageTitle = "Edit A Character"; 
    $description = "Edit a selected character from the Book of Mormon. Includes all information previously submitted.";
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
<h1>Edit Information For <?php if(isset($character)) {echo $character['charName'];} else { if(isset($charName)) echo $charName; } ?></h1>
<form id="editChar" method="post" action="index.php">
        <fieldset><legend>Character Details</legend>
        <div class="form-field input-right">
            <label for="charName">Character's Name</label><br>
            <input name="charName" id="charName" type="text" <?php if (isset($character)) { echo "value='$character[charName]'";} else { if(isset($charName)) echo "value='$charName'"; } ?> required>
        </div>
        <div class="form-field input-right">
            <h5>Type Of Character</h5>
            <label for="hero">Hero</label>
            <input name="charType" id="hero" type="radio" value="Hero" <?php if (isset($character) && $character['charType'] == 'Hero') { echo "checked";} else { if(isset($charType) && $charType == 'Hero') { echo "checked"; } }?>>
            <label for="charType">Zero</label>
            <input name="charType" id="zero" type="radio" value="Zero" <?php if (isset($character) && $character['charType'] == 'Zero') { echo "checked";} else { if(isset($charType) && $charType == 'Zero') { echo "checked"; } }?>>
        </div>
        <div class="form-field input-right">
            <label for="firstSeen">What Chapter Is Character First Seen In?</label><br>
            <input name="firstSeen" id="firstSeen" type="text" <?php if (isset($character)) { echo "value='$character[firstSeen]'";} else { if(isset($firstSeen)) echo "value='$firstSeen'"; } ?> required>
        </div>
        <div class="form-field input-right">
            <label for="verse">What Verse?</label><br>
            <input name="verse" id="verse" type="text" <?php if (isset($character)) { echo "value='$character[verse]'";} ?> required>
        </div>
        <div class="form-field input-right">
            <label for="abstract">Comments</label><br>
            <textarea name="abstract" id="abstract"><?php if (isset($character)) { echo $character['abstract']; } else { if(isset($abstract)) echo $abstract; } ?></textarea>
        </div>
        <div class="form-field submit-field">
            <input type="hidden" name="char_id" value="<?php if (isset($character['char_id'])) { echo $character['char_id'];} else { if(isset($char_id)) echo $char_id; } ?>">
            <input type="submit" value="Update Character">
            <input type="hidden" name="action" value="editChar">
        </div>
        </fieldset>
    </form>

<?php if(isset($reviewMessage)) {echo "<span class='message'>$reviewMessage</span>";} ?>

</section>

<?php unset($_SESSION['message']); ?>
<?php include_once 'footer.php'; ?>