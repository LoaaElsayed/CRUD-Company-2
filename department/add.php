<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';

$arrayerror=[];
if (isset($_POST['send'])) {
    $name = $_POST['depname'];
    $mangername = $_POST['manname'];
    if(trim($name)==""){
        $arrayerror[]="please enter name department";
    }
    $depname =strlen(strip_tags($name));
    if ($depname != strlen($name)){
        $arrayerror[] = "can't enter name include >,<,/ or any specail char";
    }
    if(trim($mangername)==""){
        $arrayerror[]="please enter manger name";
    }
    $mangname=strlen(strip_tags($mangername));
    if ($mangname != strlen($mangername)){
        $arrayerror[] = "can't enter name include >,<,/ or any specail char";
    }
    if(empty($arrayerror)){
        $insert = "INSERT INTO `depaetments`VALUES (null,'$name','$mangername')";
        $dep_ins = mysqli_query($connection, $insert);
        path("department/list.php");
    }
    
}
auth(1);


?>

<section class="home_1">
    <h3 class="text-center">Welcome In Add Department </h3>
        <?php if(!empty($arrayerror)):?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($arrayerror as $dateerror) :?>
                        <li><?= $dateerror?></li>
                    <?php endforeach;?>
                </ul>
                
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
                    <!-- <div class="form-group">
                        <label for="">Number OF Employees</label>
                        <input type="text" class="form-control" name="numemp">
                    </div> -->
                    <button class="btn btn-secondary col-3 mt-2" name="send">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>



<?php
include '../shared/footer.php';
?>