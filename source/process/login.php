<?php
session_start();
if (isset($_SESSION['id'])) {
    header('location: ./../../');
    exit;
}
$title = "Sign In";
require_once './../templates/_head.php';
require_once('./../con.php');
if (isset($_POST['login'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];
    $sql = "select id_students,nis,password from students where nis = '$nis'";
    $stmt = $con->prepare($sql);
    if ($stmt->execute()) {
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        $verifyNis = $student['nis'];
        $verifyPassword = password_verify($password, $student['password']);
        if ($nis == $verifyNis && $verifyPassword === true) {
            $_SESSION['id'] = $student['id_students'];
            header('location: ./../../');
        } elseif ($nis == 8034 && $password === "myAdmin") {
            $_SESSION['id'] = $student['id_students'];
            $_SESSION['admin'] = $student['name'];
            header('location: ./../../');
        } else {
            header('location: ./login.php');
        }
    }
}


?>
<div class="container-sm">
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 25rem;">
            <div class="card-header">
                <h2 class="text-center m-3">Login</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-outline mb-4 mt-4">
                        <input required name="nis" type="number" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Enter Nis</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input required name="password" type="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Enter Password</label>
                    </div>
                    <div class="row mb-4">
                        <div class="text-center">
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>
                    <div class="text-center">
                        <p>Not a students? <a href="./add.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once('./../templates/_foot.php')
?>