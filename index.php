<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./source/process/login.php');
    exit;
}
require_once('./source/con.php');

$id = $_SESSION['id'];
$sql = "select * from students where id_students='$id'";
$stmt = $con->prepare($sql);
if ($stmt->execute()) {
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

require_once "./source/templates/_head.php";
?>
<div class="container">
    <h2>Hai <?= $student['name']; ?></h2>
</div>
<?php require_once "./source/templates/_foot.php";
?>