<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';

$depselect = " SELECT * FROM `depaetments`";
$dep_se = mysqli_query($connection, $depselect);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $depdelete = "DELETE FROM `depaetments` WHERE id=$id ";
    mysqli_query($connection, $depdelete);
    path("department/list.php");
}

auth(1,2,3);


?>

<section class="home_list">
    <h3 class="text-center">Welcome In List Department </h3>
    <div class="container col-6">
        <div class="card m-2">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>#ID</td>
                        <td>name</td>
                        <td>Manger Name</td>
                        <td>Num Employees</td>
                        <td>Action</td>
                    </tr>
                    <?php foreach ($dep_se as $data) { ?>
                        <tr>
                            <th>
                                <?php
                                $idData =  $data['id'];
                                echo $data['id'] ?>
                            </th>
                            <th>
                                <?php echo $data['name'] ?>
                            </th>
                            <th>
                                <?php echo $data['manger_name'] ?>
                            </th>
                            <th>
                                <?php
                                    numemploy($idData, $connection)
                                ?>
                            </th>
                            <th>
                                <a href="view.php?show=<?= $data['id'] ?>" class="mr-3"><i class="fa-solid fa-eye"></i></a>
                                <a href="list.php?delete=<?= $data['id'] ?>" class="mr-3"><i class="fa-solid fa-trash"></i></a>
                                <a href="update.php?edit=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>


<?php
include '../shared/footer.php';
?>