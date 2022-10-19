<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';
$note="";

$arrayerror=[];

// insert employee //
if (isset($_POST['send'])) {
    $Name =$_POST['name'];
    $email = $_POST['email'];
    $depID = $_POST['depID'];
 // valdation input//
    if(trim($Name) ==""){
        $arrayerror[] = "please enter name";
    }
    if(trim($email) ==""){
        $arrayerror[] = "please enter email";
    }
    // val($Name,"please enter name");
  // val specail char //
    $lenname=strlen(strip_tags($Name));
    if($lenname != strlen($Name)){
        $arrayerror[] = "can't enter name include >,<,/ or any specail char";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $arrayerror[]= "please entar correct email";
    };
    

  // upload image //
    $image_name = time(). $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];
    $location = "./upload/$image_name";
  // validation image//
        // val by size //
    if(($image_size/1024)/1024 > 1){
        $arrayerror[] = "please enter file less than 1 MB";
    }
        // val by name //
    if(trim($_FILES['image']['name'])==""){
        $arrayerror[] = "please enter image";
    }
        // val by type //
    if($image_type == 'image/webp' || $image_type == 'image/jpg' || $image_type == 'image/png' || $image_type == 'image/jpeg'){
        move_uploaded_file($image_tmp , $location);
    }
    else{
        $arrayerror[] = "please enter file webp/jpg/png/jepg";
    }
  // insert name&email//
    if(empty($arrayerror)){
        $insert = "INSERT INTO `employees`  VALUES (null , '$Name' , '$email','$location' ,$depID)";
        $in = mysqli_query($connection, $insert);
        path("/employee/list.php");
    }
    
}
  // select dep_id  //
    $select = "SELECT * FROM `depaetments`";
    $departments = mysqli_query($connection, $select);

auth(1,2);

?>

<section class="home_1">
    <h3 class="text-center">Welcome In Add Employee </h3>
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
        <div class="card">
            <div class="card-body">
                <form class="p-2" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Employee Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="">Department</label>
                        <select  class="form-control" name="depID">
                            <?php foreach($departments as $date){?>
                            <option value="<?php echo $date['id']?>">
                                <?php echo $date['name']?>
                            </option>
                            <?php } ?>
                        </select>
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