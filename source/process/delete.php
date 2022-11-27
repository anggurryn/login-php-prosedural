<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
    exit;
}
require_once('./../templates/_head.php');
require_once('./../con.php');
$id = $_GET['id'];
$sql = "select nis,name,password from students where id_students='$id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['delete'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];
    $verifyPassword = password_verify($password, $student['password']);
    if ($nis == $student['nis'] && $verifyPassword === true) {
        $sqlDelete = "delete from students where id_students='$id'";
        $stmtDelete = $con->prepare($sqlDelete);
        if ($stmtDelete->execute()) {
            header("location: ./view.php");
        }
    } else {
        echo "<script>alert(`Wrong Password and Nis!!`)</script>";
    }
}


?>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 23rem;">
            <div class="card-header">
                <h4>Confirm if you <?= $student['name']; ?> </h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-outline mb-4 mt-4">
                        <input required name="nis" type="number" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Enter Nis</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input required name="password" type="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Enter Password</label>
                    </div>
                    <input value="Delete" name="delete" type="submit" class="btn btn-danger">
                    <a href="./detail.php?id=<?= $id; ?>" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once('./../templates/_foot.php'); ?>