<?php
require_once('./../templates/_head.php');
require_once('./../con.php');
$id = $_GET['id'];
$sql = "select * from students where id_students=$id";

$stmt = $con->prepare($sql);
if ($stmt->execute()) {
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Detail <?= $student['name']; ?></h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <td class="col-md-3">Nis</td>
                    <td>: <?= $student['nis']; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>: <?= $student['name']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>: <?= $student['address']; ?></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>: <?= $student['dateOfBirth']; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>: <?= $student['gender']; ?></td>
                </tr>
                <tr>
                </tr>
            </table>
        </div>
        <div class="m-4">
            <a href="./update.php?id=<?= $student['id_students']; ?>" class="btn btn-info">Update</a>
            <a href="./delete.php?id=<?= $student['id_students']; ?>" onclick="return confirm('Are you Sure?')" class="btn btn-danger">Delete</a>
            <a href="./view.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
<?php
require_once('./../templates/_head.php');
?>