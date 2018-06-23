<?php
// require_once '../classes/PDOhelper.class.php';
// require_once '../init/init.php';

$pdo = PDOhelper::createDb($DB_INIT);

function getItemsPerPage($pdo, $pageObj) {
    $stmt = $pdo->prepare("SELECT id, imgUrl, title, author, category 
                           FROM books 
                           WHERE id >= ? 
                           LIMIT " . $pageObj->getPerpage()
                         );

    $stmt->execute([$pageObj->getStartItemIdx()]);

 
 return $stmt->fetchAll();
}

// $stmt = $pdo->prepare("SELECT id, imgUrl, title, author, category 
//                        FROM books 
//                        WHERE id >= ? 
//                        LIMIT " . $pageObj->getPerpage()
//                     );

// $stmt->execute([$pageObj->getStartItemIdx()]);


// $booksArr = $stmt->fetchAll();

$maxStmt = $pdo->prepare('SELECT MAX(id) as max FROM books');
$maxStmt->execute();

$max = $maxStmt->fetch()['max'];



