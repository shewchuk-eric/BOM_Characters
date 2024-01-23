<?php // this is the character manager model


// ADD NEW CHARACTER TO DATABASE
function addChar($charName, $charType, $firstSeen, $verse, $abstract) {
    $db = charConnect(); // Create a connection object
    $sql = 'INSERT INTO characters (charName, charType, firstSeen, abstract) VALUES (:charName, :charType, :firstSeen, :abstract)'; // The SQL query with placeholders for insert values
    $stmt = $db->prepare($sql); // Prepare the statement
    $stmt->bindValue(':charName', $charName, PDO::PARAM_STR); // Tells database what type of information is being sent
    $stmt->bindValue(':charType', $charType, PDO::PARAM_STR);
    $stmt->bindValue(':firstSeen', $firstSeen, PDO::PARAM_STR);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_STR);
    $stmt->bindValue(':abstract', $abstract, PDO::PARAM_STR);
    $stmt->execute(); // Run the query
    $rowsChanged = $stmt->rowCount(); // Ask how many rows were affected by query
    $stmt->closeCursor();
    return $rowsChanged;
}

// GET ALL CHARACTERS AND THEIR ASSOCIATED DATA
function getAllCharacters() {
    $db = charConnect();
    $sql = 'SELECT * FROM characters ORDER BY char_id ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $characterData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $characterData;
}

// GET SINGLE CHARACTERS AND THEIR ASSOCIATED DATA
function getOneCharacter($char_id) {
    $db = charConnect();
    $sql = 'SELECT * FROM characters WHERE char_id = :char_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':char_id', $char_id, PDO::PARAM_INT);
    $stmt->execute(); // Run the query
    $characterData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $characterData;
}

// GET INFORMATION ON A SINGLE CHARACTER AS REQUESTED FOR EDITING BY USER
function editChar($char_id, $charName, $charType, $firstSeen, $verse, $abstract) {
    $db = charConnect();
    $sql = 'UPDATE characters SET charName = :charName, charType = :charType, firstSeen = :firstSeen, verse = :verse, abstract = :abstract WHERE char_id = :char_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue('char_id',$char_id, PDO::PARAM_INT);
    $stmt->bindValue(':charName', $charName, PDO::PARAM_STR);
    $stmt->bindValue(':charType', $charType, PDO::PARAM_STR);
    $stmt->bindValue('firstSeen',$firstSeen, PDO::PARAM_STR);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_STR);
    $stmt->bindValue('abstract',$abstract, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// GET LIST OF ALL BOOKS THAT EXIST IN THE DATABASE - FOR FOR FILTERING CHARACTER DISPLAY 
function getAllBooks() {
    $db = charConnect();
    $sql = 'SELECT DISTINCT firstSeen FROM characters';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $books;
}

// GET FILTERED RESULTS USING TWO CRITERIA
function getFiltered($bookName, $status) {
        $db = charConnect();
        $sql = 'SELECT * FROM characters WHERE firstSeen = :bookName AND charType = :charType';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':bookName', $bookName, PDO::PARAM_STR);
        $stmt->bindValue(':charType', $status, PDO::PARAM_STR);
        $stmt->execute();
        $characterData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $characterData;
}

// GET FILTERED BY BOOK NAME
function getByBook($bookName) {
        $db = charConnect();
        $sql = 'SELECT * FROM characters WHERE firstSeen = :bookName';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':bookName', $bookName, PDO::PARAM_STR);
        $stmt->execute();
        $characterData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $characterData;
}

// GET FILTERED BY CHARACTER TYPE
function getByType($status) {
        $db = charConnect();
        $sql = 'SELECT * FROM characters WHERE charType = :charType';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':charType', $status, PDO::PARAM_STR);
        $stmt->execute();
        $characterData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $characterData;
}

?>