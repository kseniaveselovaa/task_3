<?php
$db = new SQLite3("test.db");
//============================
if ($_POST['type'] == 'select')
{
    $q = $_POST['query'];
    $results = $db->query($q);
    $arr = [];
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) 
    {
        array_push($arr, $row);
    }
    echo json_encode($arr);
}
else if ($_POST['type'] == 'inbase') 
{
    $lg = $_POST['login'];
    $ps = $_POST['pass'];
    $results = $db->query("SELECT id FROM users WHERE login = '$lg' AND pass = '$ps'"); 
    $row = $results->fetchArray(SQLITE3_ASSOC);
    echo json_encode($row);
}
else if ($_POST['type'] == 'insert')
{
    $lg = $_POST['login'];
    $txt = $_POST['text'];
    $cmt = $_POST['cmt'];

    $results = $db->query("SELECT id FROM users WHERE login = '$lg'");
    $row = $results->fetchArray(SQLITE3_ASSOC);  
    $id = $row['id'];
    //-----------------
    $results = $db->query("SELECT MAX(id) FROM att");
    $row = $results->fetchArray(SQLITE3_ASSOC);
    $maxid = $row['MAX(id)'] + 1;  
    //----------------
    $q = "INSERT INTO att VALUES ($maxid,$id,'$txt','$cmt')";
    $result = $db->exec($q);
    echo $result;
} 
//==========================
$db->close();
?>