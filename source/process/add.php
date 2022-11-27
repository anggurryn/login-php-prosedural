<?php
$title = "Sign Up";
require_once './../templates/_head.php';

require_once './../con.php';
if (isset($_POST['signUp'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password === $confirmPassword) {
        $name = $_POST['name'];
        $nis = $_POST['nis'];
        $address = $_POST['address'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $gender = $_POST['gender'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql =  "select * from students where nis='$nis'";
        $stmt = $con->prepare($sql);
        if ($stmt->execute()) {
            $student = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($nis != $student['nis']) {
                $sql = "insert into students(name,nis,address,dateOfBirth,gender,password)
            values('$name','$nis','$address','$dateOfBirth','$gender','$password')";

                $statement = $con->prepare($sql);
                if ($statement->execute()) {
                    header('location: ./login.php');
                }
            } else {
                echo "<script>alert(`Account has been created!!`)</script>";
            }
        }
    } else {
        echo "<script>alert(`password don't match!!`)</script>";
    }
}

?>

<div class="container">
    <div class="card mt-5 ">
        <div class="card-header d-flex justify-content-center">
            <h2 class="flex-items">Register</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="nis">Nis</label>
                    <input required name="nis" type="number" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input required name="name" type="text" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="address">Address</label>
                    <input required name="address" type="text" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="dateOfBirth">Date of Birth</label>
                    <input required name="dateOfBirth" type="date" class="form-control">
                </div>
                <div class="form-group mt-3" style="gap: 15px;">
                    <p>Gender</p>
                    <label for="pria"><input required type="radio" name="gender" id="pria" value="Laki-laki">Laki-laki</label>
                    <label for="wanita"><input required type="radio" name="gender" id="wanita" value="Perempuan">Perempuan</label>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input required name="password" type="password" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="pass">Confirm Password</label>
                    <input required name="confirmPassword" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="signUp" value="Sign up" class="btn btn-primary mt-3">
                    <button type="dissble" class="btn btn-info"><a href="./login.php" class="nav-link">Sign In</a></button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once './../templates/_foot.php' ?>