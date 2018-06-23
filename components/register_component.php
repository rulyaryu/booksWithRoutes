<?php

require_once '././model/modelAuth.php';


if(!empty($_REQUEST['doRegist'])) {

    $regData['login'] = Validate::clean($_REQUEST['registration']['login']);
    $regData['email'] = Validate::email($_REQUEST['registration']['email']);
    $regData['passw'] = password_hash($_REQUEST['registration']['passw'], PASSWORD_DEFAULT);
    var_dump(loginExist($authModel,$regData['login']));



    if(loginExist($authModel, $regData['login'])) {
        if (createUser($authModel, $regData)) 
            echo "user added to DB with such fields login =" . $regData['login'] . ", email = " .$regData['email'];
    } else {
        echo 'login alredy exist';
    }
}