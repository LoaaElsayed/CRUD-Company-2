<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';


if (isset($_POST['send'])) {
    $name = $_POST['depname'];
    $mangername = $_POST['manname'];
    $numdep = $_POST['numemp'];
    $insert = "INSERT INTO `depaetments`VALUES (null,'$name','$mangername',$numdep)";
    $dep_ins = mysqli_query($connection, $insert);
}
auth();


?>

<section class="home_1">
    <h3 class="text-center">Welcome In Add Department </h3>
        <?php if((!empty($m))):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $m ?>
        </div>
        <?php endif;?> 
    <div class="container col-5">
        <div class="card ">
            <div class="card-body">
                <form class="p-2" method="POST">
                    <div class="form-group">
                        <label for="">Department Name</label>
                        <input type="text" class="form-control" name="depname">
                    </div>
                    <div class="form-group">
                        <label for="">Manger Name</label>
                        <input type="text" class="form-control" name="manname">
                    </div>
                    <div class="form-group">
                        <label for="">Number OF Employees</label>
                        <input type="text" class="form-control" name="numemp">
                    </div>
                    <button class="btn btn-secondary col-3 mt-2" name="send">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>



<?php
include '../shared/footer.php';
?>