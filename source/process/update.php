<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
    exit;
}
$title = "Update Siswa";
require_once './../templates/_head.php';
?>
<?php
require_once('./../con.php');
$id = $_GET['id'];
$sql = "select * from students where id_students=$id";

$stmt = $con->prepare($sql);
if ($stmt->execute()) {
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $nis = $_POST['nis'];
    $address = $_POST['address'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $verifyPassword = password_verify($password, $student['password']);

    if ($verifyPassword === true) {
        $sql = "update students set nis ='$nis',name ='$name', address ='$address', dateOfBirth ='$dateOfBirth', gender ='$gender' where id_students ='$id'";
        $stmt = $con->prepare($sql);
        if ($stmt->execute()) {
            header('location: ./view.php');
        }
    } else {
        echo "<script>alert('Password not Matching')</script>";
    }
}

?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Data <?= $student['name']; ?></h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="nis">Nis</label>
                    <input value="<?= $student['nis']; ?>" required name="nis" type="number" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input value="<?= $student['name']; ?>" required name="name" type="text" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="address">Address</label>
                    <input value="<?= $student['address']; ?>" required name="address" type="text" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="dateOfBirth">Date of Birth</label>
                    <input value="<?= $student['dateOfBirth']; ?>" required name="dateOfBirth" type="date" class="form-control">
                </div>
                <div class="form-group mt-3" style="gap: 15px;">
                    <p>Gender</p>
                    <label for="pria"><input required type="radio" name="gender" id="pria" value="Laki-laki">Laki-laki</label>
                    <label for="wanita"><input required type="radio" name="gender" id="wanita" value="Perempuan">Perempuan</label>
                </div>
                <div class="form-group mt-3">
                    <label for="confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="update" value="Save Changes" class="btn btn-primary mt-3">
                    <a href="./detail.php?id=<?= $student['id_students']; ?>" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>

    <?php require_once('./../templates/_foot.php') ?>