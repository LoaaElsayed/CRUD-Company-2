<?php
    include '../shared/header.php';
    include '../shared/nav.php';
    include '../general/connect.php';
    include '../general/function.php';
if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $selectup="SELECT * FROM `depaetments` WHERE id = $id";
    $depup=mysqli_query($connection , $selectup);
    $row = mysqli_fetch_assoc($depup) ;
    if(isset($_POST['update'])){
        $name = $_POST['depname'];
        $mangerName = $_POST['manname'];
        $numEmployees = $_POST['numemp'];
        $dep_update="UPDATE `depaetments` SET `name`='$name',`manger_name`='$mangerName',`num_of_emp`=$numEmployees WHERE id =$id";
        $deup = mysqli_query($connection, $dep_update) ;
        path('department/list.php');
    }
}
auth();

?>
    <section class="home_1"> 
        <h1 class="text-center m-5">Welcome In update Department : <?= $row['name']?> </h1>
        <div class="container col-5">
        <div class="card mb-2">
            <div class="card-body">
                <form class="p-2" method="POST">
                    <div class="form-group">
                        <label for="">Department Name</label>
                        <input type="text" class="form-control" name="depname" value="<?= $row['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Manger Name</label>
                        <input type="text" class="form-control" name="manname" value="<?= $row['manger_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Number OF Employees</label>
                        <input type="text" class="form-control" name="numemp" value="<?= $row['num_of_emp']?>">
                    </div>
                    <button class="btn btn-secondary col-3 mt-2" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>

    </section>
    

    <?php
        include '../shared/footer.php';
    ?>