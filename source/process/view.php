<?php
session_start();
if (!isset($_SESSION['id'])) {
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
            <table class=" table table-responsive-lg">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Nis</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php foreach ($siswa as $students) : ?>
                        <tr>
                            <td class="col-md-1 text-center"><?= $students['nis']; ?></td>
                            <td class="col-md-4 text-center"><?= $students['name']; ?></td>
                            <td class="col-md-1 text-center">
                                <a href="./detail.php?id=<?= $students['id_students']; ?>" class="link-items btn btn-warning">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </table>

        </div>
    </div>

    <?php require_once('./../templates/_foot.php') ?>