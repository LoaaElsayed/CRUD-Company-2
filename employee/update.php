<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';


$arrayerror=[];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectupsate = "SELECT * from `employees` WHERE id = $id";
    $seupdate = mysqli_query($connection, $selectupsate);
    $row = mysqli_fetch_assoc($seupdate) ;
        // upload image //
    if(empty($_FILES['image']['name'])){
        $image_name = $row['image'];
    }else{
        $image_name = time() . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $location = "./upload/$image_name";
        move_uploaded_file($image_tmp , $location);
        // val image by size //
        if(($image_size/1024)/1024 > 1){
            $arrayerror[]= "please entar file less than 1MB";
        }
        // val image by type //
        if($image_type == 'image/webp' || $image_type == 'image/jpg' || $image_type == 'image/png' || $image_type == 'image/jpeg'){
            move_uploaded_file($image_tmp , $location);
        }
        else{
            $arrayerror[] = "please enter file webp/jpg/png/jepg";
        }

    }
    // update employee //
    if (isset($_POST['update'])) {
        $Name = $_POST['name'];
        $email = $_POST['email'];
        $depID = $_POST['depID'];
        if(trim($Name) == ""){
            $arrayerror[]= "please entar name";
        }
        // val  specail char name //
        $lenname = strlen (strip_tags($_POST['name'])) ;
        if ($lenname !=strlen($Name)) {
            $arrayerror[]= "can't enter name include special char";
        }
        // val email //
        if(trim($email)==""){
            $arrayerror[]= "please entar email";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $arrayerror[]= "please entar correct email";
        };
        


        if(empty($arrayerror)){
            $update="UPDATE `employees` SET `name`='$Name',`email`='$email',`image`='$location' ,`depID`='$depID' WHERE id =$id";
            $up = mysqli_query($connection, $update);
            path('employee/list.php');
        }
        

        

    }
}

$select = "SELECT * FROM `depaetments`";
$departments = mysqli_query($connection, $select);


auth(1,2);

?>
<section>
    <h1 class="text-center m-5">Welcome In Add Employee : <?= $row['name'] ?> </h1>
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
        <div class="card mt-2">
            <div class="card-body">
                <form class="p-1" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Employee Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Image : <img src="/web2/employee/<?= $row['image'] ?>" width="20"></label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="">Department :</label>
                        <select class="form-control" name="depID">
                        <?php foreach ($departments as $date) { ?>
                                <option value="<?php echo $date['id'] ?>">
                                    <?php echo $date['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <button  class="btn btn-secondary col-3 mt-2" name="update">
                        update
                    </button>
                </form>
            </div>
        </div>
    </div>
</section> 


<?php
include '../shared/footer.php';
?> 