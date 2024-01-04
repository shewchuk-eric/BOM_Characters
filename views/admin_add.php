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

<section id='details'>
<h1>Add Book of Mormon Characters</h1>
<br><br>
<?php if(isset($detailsDisplay)) {echo $detailsDisplay;} ?>

<h2>Reviews</h2>

<?php if(isset($reviewMessage)) {echo "<span class='message'>$reviewMessage</span>";} ?>
<?php


?>


</section>

<?php unset($_SESSION['message']); ?>
<?php include_once 'footer.php'; ?>