<?php

// set page title and call header
    $pageTitle = "Display Characters"; 
    $description = "Display names and associated data for characters from the Book of Mormon.";
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
<h1>Display Book of Mormon Characters</h1>
<form id="filter" method="post" action="index.php">
        <fieldset><legend>Filter Results</legend>
        <div class="form-field input-right">
            <label for="book">Filter By Book</label><br>
            <select name="bookName" id="bookName"><?php if(isset($bookList)){echo $bookList;}?></select>
        </div>
        <div class="form-field input-right">
            <label for="status">Character Status</label><br>
            <select name="status" id="status"><?php if(isset($statType)){echo $statType;}?></select>
        </div>
        <div class="form-field submit-field">
            <input type="submit" value="Filter Results">
            <input type="hidden" name="action" value="applyFilter">
        </div>
        </fieldset>
    </form>

<?php if(isset($table)) { echo $table; } ?>

</section>

<?php unset($_SESSION['message']); ?>
<?php include_once 'footer.php'; ?>