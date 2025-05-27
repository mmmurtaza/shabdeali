<?php

include 'defines.php';

// $conn = mysqli_connect('localhost', 'root', '', 'masakin_1443' );
// $conn = mysqli_connect("localhost", "mdb53", "mdb+53", "masakin_1443");
$conn = connectTo();

if (!$conn) {
    die('Could not connect.' . mysqli_error($conn));
};

// $sqlarabi = "SET NAMES 'utf8'";
// db_execute($sqlarabi);
// $sqlarabi2 = 'SET CHARACTER SET utf8';
// db_execute($sqlarabi2);


function db_query_one($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row;
}

function db_execute($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    return $result;
}

function db_query_all($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_free_result($result);
    if (count($rows) < 1) {
        $rows = false;
    }
    return $rows;
}

function sanitize($data)
{
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}
