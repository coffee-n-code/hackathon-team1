<?php
define('root_dir', dir(__FILE__));

error_reporting(E_ALL);
ini_set("display_errors", 1);

$action = $_REQUEST['action'];
if(empty($action)) {
    // action is empty. return error.
    http_response_code(400);
    exit;
}

include('includes/backend.php');

$backend = new Backend;
$backend->setAction($action);

$response = $backend->getResponse(true); // get response as json.

header('Content-Type: application/json');
echo $response;
?>
