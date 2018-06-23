<?php 

require_once '././model/modelAuth.php';

// echo $hash . '<br>';
// echo $_POST['passw'] . '<br>';

if(!empty($_REQUEST['doLogin'])) {

    // var_dump($_REQUEST['login']);
    $logins = array_map(function($item) {
        return $item['login'];
    },$logins);

    $hash = getHash($authModel, $_REQUEST['login']['login']);
    echo $hash . '<br>';
    echo $_REQUEST['login']['login'] . '<br>';
    echo '<pre>';
    var_dump($logins);
    echo '</pre>';

    echo in_array($_REQUEST['login']['login'], $logins) ? 'yeap' : 'noupe';

    if(in_array($_REQUEST['login']['login'], $logins) && password_verify($_REQUEST['login']['passw'], $hash)) {
        // session_start();    
        Session::start();
        Session::write('login', 'true');
        Session::write('user', $_REQUEST['login']['login']);

        header('Location: http://localhost');
        exit();
    }
}

?>