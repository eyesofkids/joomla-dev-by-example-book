<?php
//建立新的資料庫實例，連接資料庫
$mysqli = new mysqli("localhost", "my_user", "my_password", "users");

//檢查連線
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//查詢敘述
$query = "SELECT id, name FROM aq6a8_users WHERE block=0 ORDER by id ASC";

//進行查詢
$users=array();
if ($result = $mysqli->query($query)) {

    //獲取物件陣列
    while ($obj = $result->fetch_object()) {
        $users[]=$obj;
    }

    //釋放result set
    $result->close();
}

//關閉資料庫連線
$mysqli->close();