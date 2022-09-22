<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';
$note="";
// insert employee //
if (isset($_POST['send'])) {
    $Name = $_POST['name'];
    $email = $_POST['email'];
    $depID = $_POST['depID'];
        // upload image //
    $image_name = time(). $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    if(move_uploaded_file($image_tmp , $location . $image_name)){
        $note = 'ok upload';
    };
    $insert = "INSERT INTO `employees`  VALUES (null , '$Name' , '$email','$image_name' ,$depID)";
    $in = mysqli_query($connection, $insert);
    // $m= test($in, 'insert');

}

// select dep_id  //
$select = "SELECT * FROM `depaetments`";
$departments = mysqli_query($connection, $select);
// $m = test($s , 'select conn');

auth();

?>

<section class="home_1">
    <h3 class="text-center">Welcome In Add Employee </h3>
    <h6 class="text-center"><?= $note?> </h6>
    <?php if((!empty($m))):?>
    <div class="alert alert-danger" role="alert">
        <?php echo $m?>
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