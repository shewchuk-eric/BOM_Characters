<?php

// USE BUILT-IN FUNCTION TO TEST FOR VALID EMAIL STRUCTURE
function checkEmail($email) {
    $valEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// SEND THE USER MESSAGE FROM CONTACT FORM VIA EMAIL
function sendEmail($fname, $lname, $email, $sentmssg) {
    $address = 'temeculastoneworks@msn.com';
    $subj = "Message from $fname $lname";
    $text = "$email\n$sentmssg";
    mail($address,$subj,$text);
}

function buildCharTable($characters) {
    $table = "<table><tr><th>Name</th><th>Status</th><th>First Seen In Chapter</th><th>Verse<th>Highlights</th><th></th></tr>";
    foreach($characters as $char) {
        $table .= "<tr><td>$char[charName]</td><td>$char[charType]</td><td>$char[firstSeen]</td><td>$char[verse]</td><td>$char[abstract]</td><td><a href='./index.php?action=edit&id=$char[char_id]'>Edit</a></td></tr>";
    }
    $table .= "</table>";
    return $table;
}

function buildBookList($books) {
    $bookList = "<option value='false'>Select A Book</option>";
    foreach($books as $book) {
        $bookList .= "<option value='$book[firstSeen]'>$book[firstSeen]</option>";
    }
    return $bookList;
}

function statusList() {
    $status = "<option value='false'>Select An Option</option>";
    $status .= "<option value='Hero'>Hero</option>";
    $status .= "<option value='Zero'>Zero</option>";
    return $status;
}

?>