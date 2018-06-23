<?php

spl_autoload_register(function($class) {
    include 'classes/'.$class.'.class.php';
});

Session::start();

Session::dump();
// echo '</br>';
// echo $_SERVER['REQUEST_METHOD'];
// echo '</br>';


$render = function($template, $variables = []) {
        extract($variables);
        ob_start();
        include $template;
        return ob_get_clean();
} ;
////////////////////////


echo Session::read('login');

$username = (Session::read('user')) ?? 'Anon';

echo $username;
var_dump(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// $current = $_GET['limit'] ?? $_GET['prev'] ?? $_GET['next'] ?? 1;

require_once './init/init.php';
require_once './model/model.php';
require_once './model/modelAuth.php';
// require_once './components/content_component.php';

require_once './view/head.php';
require_once './view/header.php';

// if(isset($_GET['page']) && $_GET['page'] === 'login') 
//     require_once './view/login.php';
// else
//     require_once './view/content.php';

// 
// $login = render('./view/login.php', []);
// $registration = render('./view/registration.php', []);
// $main = render('./view/content.php', ['booksArr' => $booksArr, 'max' => $max, 'chunkedBooks' => $chunkedBooks]);
// 

// routes //////////////

$routes = [
    // ['/', $main],
    // ['/login', $login],
    // ['/registration', $registration]
];


$app = new Application();

$pdo = PDOhelper::createDb($DB_INIT);

$booksRepo = new BooksRepository($pdo);

// $app->get('/', $main);
// $app->get('/login', $login);
// $app->get('/registration', $registration);
$app->get('/page/(?P<id>\d+)', function($params, $id) use ($booksRepo, $render) {
    echo $id['id'];
    $pageObj = new Pagination(30, $id['id'], 0);
    $booksArr = $booksRepo->getItemsPerPage($id['id'], 30);
    // var_dump($booksArr);
    $chunkedBooks = array_chunk($booksArr, 3);
    return $render('./view/content.php', ['booksArr' => $booksArr, 'chunkedBooks' => $chunkedBooks]);
});

$app->run();


// require_once './view/registration.php';


// if(Session::read('login') === 'true') {
//     require_once './view/content.php';
// } else {
//     require_once './view/login.php';
// }


require_once './view/pagination.php';
require_once './view/foot.php';



?>