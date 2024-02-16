<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});
$router->get('list-student', [App\Controllers\StudentController::class, 'getStudent']);
// chức năng thêm
$router->get('add-student', [App\Controllers\StudentController::class, 'addStudent']);
$router->post('post-student', [App\Controllers\StudentController::class, 'postStudent']);
// chức năng sửa
$router->get('detail-student/{id}', [App\Controllers\StudentController::class, 'detailStudent']);
$router->post('edit-student/{id}', [App\Controllers\StudentController::class, 'editStudent']);
// chức năng xóa
$router->get('delete-student/{id}', [App\Controllers\StudentController::class, 'deleteStudent']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>