<?php

use php\lib\Database;

require_once("../php/bootstrap.php");

$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['search']['value'];
$orderColumnIndex = @$_POST['order'][0]['column'];
$orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
$orderDirection = @$_POST['order'][0]['dir'];

$sql = "SELECT *,null as password from users where (not email = :email) ";
if (!empty($searchValue)) {
    $sql .= " AND (fullname like '%$searchValue%' OR email like '%$searchValue%' OR role like '%$searchValue%' )";
}
if(!empty($orderColumnName)){
    $sql .= " order by $orderColumnName $orderDirection";
    $sql .= " limit $start, $length";
}

$db = new Database;
$db->query($sql);
$db->bind(":email", $_SESSION[APP]->email);
$data = $db->resultSet();
$db->query("select count(email) as total from users where not email=:email");
$db->bind(":email", $_SESSION[APP]->email);
$total = $db->single()->total;
echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
