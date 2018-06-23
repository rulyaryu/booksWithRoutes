<?php 
require_once '././classes/PDOhelper.class.php';
require_once '././init/init.php';

$authModel = PDOhelper::createDb($DB_INIT);

$loginStmt = $authModel->prepare('SELECT login FROM users');
$loginStmt->execute();

$logins = $loginStmt->fetchAll();

function getHash($pdo, $login) {
    $stmt = $pdo->prepare('SELECT passw FROM users WHERE login = ?');
    $stmt->execute([$login]);
    $hash = $stmt->fetch()['passw'];
    return $hash;
}

function isAdmin() {
    
}

function createUser($pdo, $regData) {
    $stmt = $pdo->prepare('INSERT IGNORE INTO users SET login = ?, email = ?,  passw = ?'
                         );
    return $stmt->execute([$regData['login'],  
                            $regData['email'],  
                            password_hash($regData['passw'], PASSWORD_DEFAULT)
                          ]);
}

function loginExist($pdo, $login) {
    $user = $pdo->prepare('SELECT login FROM users WHERE login = ?');
    $user->execute([$login]);
    return empty($user->fetch());
}