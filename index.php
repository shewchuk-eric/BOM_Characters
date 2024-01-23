<?php // This is the main views controller

session_start(); // create or access a session - required at the top of ALL controllers

require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/main-model.php';


// $classifications = getClassList(); // get classifications from functions.php
// $navList = buildList($classifications); // Build the navigation list using results from getClassifications()


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 if(isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 }

 switch ($action){
    case 'addChar':
        $charName = trim(filter_input(INPUT_POST, 'charName', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // get form values and make sure they're clean
        $charType = trim(filter_input(INPUT_POST, 'charType', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $firstSeen = trim(filter_input(INPUT_POST, 'firstSeen', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $verse = trim(filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $abstract = trim(filter_input(INPUT_POST, 'abstract', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 

        if(empty($charName) || empty($charType) || empty($firstSeen) || empty($verse)) { // check for any empty lines in form
            $message = "<p>Please provide information for all empty form fields.</p>";
            include 'views/admin-add.php'; // empty field is found - show error message
            exit;
        }
        $regOutcome = addChar($charName, $charType, $firstSeen, $verse, $abstract); // all fields populated - send to insert function in 'main-model.php'
        if ($regOutcome == 1) {
            $_SESSION['message'] = "<p>$charName has been added to the database.</p>";
            header ("location: index.php"); // ? header ("location: ."); ?
            exit;
        } else {
            $message = "<p>$charName cannot be added at this time. Please try again.</p>";
            include 'views/admin-add.php';
            exit;
          }
        break; 

    case 'filter':
        $characters = getAllCharacters();
        $table = buildCharTable($characters);
        $books = getAllBooks();
        $bookList = buildBookList($books);
        $statType = statusList();
        include 'views/list-chars.php';
        break;

    case 'edit':
        $charId = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $character = getOneCharacter($charId);
        include 'views/edit-character.php';
        break;

    case 'editChar':
        $char_id = trim(filter_input(INPUT_POST, 'char_id', FILTER_SANITIZE_NUMBER_INT));
        $charName = trim(filter_input(INPUT_POST, 'charName', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 
        $charType = trim(filter_input(INPUT_POST, 'charType', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $firstSeen = trim(filter_input(INPUT_POST, 'firstSeen', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $verse = trim(filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $abstract = trim(filter_input(INPUT_POST, 'abstract', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 

        if(empty($char_id) || empty($charName) || empty($charType) || empty($firstSeen) || empty($verse)) { 
            $message = "<p>Please provide information for all empty form fields.</p>";
            include 'views/edit-character.php';
            exit;
        }
        $regOutcome = editChar($char_id, $charName, $charType, $firstSeen, $verse, $abstract);
        if ($regOutcome == 1) {
            $_SESSION['message'] = "<p>$charName has been updated in the database.</p>";
            header ("location: index.php?action=filter");
            exit;
        } else {
            $message = "<p>$charName cannot be updated at this time. Please try again.</p>";
            include 'views/edit-character.php';
            exit;
          }
        break;

    case 'applyFilter':
        $bookName = trim(filter_input(INPUT_POST, 'bookName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $status = trim(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        if(($bookName != 'false') && ($status != 'false')) {
            $characters = getFiltered($bookName, $status);
        } elseif ($bookName != 'false') {
            $characters = getByBook($bookName);
        } elseif ($status != 'false') {
            $characters = getByType($status);
        }
        $table = buildCharTable($characters);
        $books = getAllBooks();
        $bookList = buildBookList($books);
        $statType = statusList();
        include 'views/list-chars.php';
        break;

         
    default:
        include 'views/admin-add.php';
   }

 ?>