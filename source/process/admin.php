<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./login.php');
    exit;
}
$title = "All Siswa";
require_once './../templates/_head.php';

require_once('./../con.php');

$sql = "select * from students";
$stmt = $con->prepare($sql);
if ($stmt->execute()) {
    $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<div class="container-md">
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="text-center">All Student are Enrolled</h2>
        </div>
        <div class="card-body">
            <table class="table-responsive-md">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Nis</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php foreach ($siswa as $students) : ?>
                        <tr>
                            <td class="col-md-1 text-center"><?= $students['nis']; ?></td>
                            <td class="col-md-6 text-center"><?= $students['name']; ?></td>
                            <td class="d-flex justify-content-around">
                                <a href="./update.php?id=<?= $students['id_students']; ?>" class="btn btn-info">Update</a>
                                <a href="./delete.php?id=<?= $students['id_students']; ?>" onclick="confirm('Are you Sure?')" class="btn btn-danger">Delete</a>
                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                                    <a href="#?id=<?= $students['id_students']; ?>" class="nav-link">Detail</a>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </table>

        </div>
    </div>
    <?php
    $id = $_GET['id'];
    if (isset($id)) {
        $sql = "select * from student where id_students='$id'";
        $stmt = $con->prepare($sql);
        if ($stmt->execute()) {
            $students = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Detail <?= $students['name']; ?></h5>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nis : <?= $students['nis']; ?></li>
                        <li class="list-group-item">Name : <?= $students['name']; ?></li>
                        <li class="list-group-item">Address : <?= $students['address']; ?></li>
                        <li class="list-group-item">Date of Birth : <?= $students['dateOfBirth']; ?></li>
                        <li class="list-group-item">Gender : <?= $students['gender']; ?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('./../templates/_foot.php') ?>