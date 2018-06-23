<?php 

class BooksRepository {

    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }  

    function getStartItemIdx($page, $perPage) {
        return $page * $perPage - $perPage;
    }

    function getItemsPerPage($page, $perPage) {
        $stmt = $this->pdo->prepare("SELECT id, imgUrl, title, author, category 
                               FROM books 
                               WHERE id >= ? 
                               LIMIT " . $perPage
                             );
    
        $stmt->execute([$this->getStartItemIdx($page, $perPage)]);
    
     
        return $stmt->fetchAll();
    }

}