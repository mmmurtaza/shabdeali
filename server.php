<?php
require_once 'db_setup.php';

$cmd = "";
@$cmd = $_GET['cmd'];

if ($cmd == 'save') {
    // print_r($_POST);
    $id = $_POST['id'];
    $mawad = $_POST['Mawad'];
    $sql = "UPDATE nazamo set mawad ='$mawad',last_updated=NOW() where id='$id'";
    $ret = db_execute($sql);
    echo $ret;
} 
elseif($cmd == 'get') {
    $id = $_POST['nid'];
    
    $sql = "SELECT * FROM `nazamo` where id='$id';";
    $res = db_query_one($sql);

    echo json_encode($res);
}
elseif($cmd == 'getLSD') {

    // pageNumber=2&pageSize=10

    @$page_number = $_GET['pageNumber'];
    if(!$page_number) $page_number = 1;
    @$page_size = $_GET['pageSize'];
    $offset = ($page_number * $page_size) -($page_size-1);
    $sql = "SELECT * FROM `nazamo` where lang='LSD' LIMIT $page_size offset $offset;";
    $res = db_query_all($sql);

    echo json_encode($res);
}
elseif($cmd == 'getAll') {

    // pageNumber=2&pageSize=10

    // @$page_number = $_GET['pageNumber'];
    // if(!$page_number) $page_number = 1;
    // @$page_size = $_GET['pageSize'];
    // $offset = ($page_number * $page_size) -($page_size-1);
    $sql = "SELECT Head FROM `nazamo`;";
    $res = db_query_all($sql);
    
    $heads = [];
    for ($i=0; $i < count($res); $i++) { 
        $heads[$i] = $res[$i]['Head'];
    }

    echo json_encode($heads);
}