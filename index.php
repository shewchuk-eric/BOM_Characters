<?php // This is the main views controller

session_start(); // create or access a session - required at the top of ALL controllers

require_once 'library/connections.php';
require_once 'library/functions.php';


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
        $abstract = trim(filter_input(INPUT_POST, 'abstract', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 

        if(empty($charName) || empty($charType) || empty($firstSeen)) { // check for any empty lines in form
            $message = "<p>Please provide information for all empty form fields.</p>";
            include 'views/admin-add.php'; // empty field is found - show error message
            exit;
        }
        $regOutcome = addChar($charName, $charType, $firstSeen, $abstract); // all fields populated - send to insert function in 'main-model.php'
        if ($regOutcome == 1) {
            $message = "<p>$charName has been added to the database.</p>";
            header ("location: index.php"); // ? header ("location: ."); ?
            exit;
        } else {
            $message = "<p>$charName cannot be added at this time. Please try again.</p>";
            include 'views/vehicles-add-new.php';
            exit;
          }
        break;   
    default:
        include 'views/admin_add.php';
   }

 ?>