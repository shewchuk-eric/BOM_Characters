<?php // this is the character manager model


// ADD NEW CHARACTER TO DATABASE
function addChar($charName, $charType, $firstSeen, $abstract) {
    $db = charConnect(); // Create a connection object
    $sql = 'INSERT INTO characters (charName, charType, firstSeen, abstract) VALUES (:charName, :charType, :firstSeen, :abstract)'; // The SQL query with placeholders for insert values
    $stmt = $db->prepare($sql); // Prepare the statement
    $stmt->bindValue(':charName', $charName, PDO::PARAM_STR); // Tells database what type of information is being sent
    $stmt->bindValue(':charType', $charType, PDO::PARAM_STR);
    $stmt->bindValue(':firstSeen', $firstSeen, PDO::PARAM_STR);
    $stmt->bindValue(':abstract', $abstract, PDO::PARAM_STR);
    $stmt->execute(); // Run the query
    $rowsChanged = $stmt->rowCount(); // Ask how many rows were affected by query
    $stmt->closeCursor();
    return $rowsChanged;
}

// // GET CLIENT DATA IN RESPONSE TO LOGIN - USES EMAIL/USERNAME TO LOCATE
// function getClient($clientEmail) {
//     $db = charConnect(); // Create a connection object
//     $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
//     $stmt = $db->prepare($sql); // Prepare the statement
//     $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
//     $stmt->execute(); // Run the query
//     $clientData = $stmt->fetch(PDO::FETCH_ASSOC); // Get any row that qualifies and return an associative array as the result
//     $stmt->closeCursor();
//     return $clientData;
// }

// function updateClient($clientFirstname, $clientLastname, $clientEmail, $userId) {
//     $db = charConnect(); // Create a connection object
//     $sql = 'UPDATE clients SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail WHERE clientId = :clientId'; // The SQL query with placeholders for insert values
//     $stmt = $db->prepare($sql); // Prepare the statement
//     $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR); // Tells database what type of information is being sent
//     $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
//     $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
//     $stmt->bindValue(':clientId', $userId, PDO::PARAM_INT);
//     $stmt->execute(); // Run the query
//     $rowsChanged = $stmt->rowCount(); // Ask how many rows were affected by query
//     $stmt->closeCursor();
//     return $rowsChanged;
// }

// function updatePass($clientId, $clientPassword) {
//     $db = charConnect(); // Create a connection object
//     $sql = 'UPDATE clients SET clientPassword = :clientPassword WHERE clientId = :clientId'; // The SQL query with placeholders for insert values
//     $stmt = $db->prepare($sql); // Prepare the statement
//     $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
//     $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
//     $stmt->execute(); // Run the query
//     $rowsChanged = $stmt->rowCount(); // Ask how many rows were affected by query
//     $stmt->closeCursor();
//     return $rowsChanged;
// }

?>