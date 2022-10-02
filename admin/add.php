<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';
$message='';
$arrayerror=[];
if(isset($_POST['add'])){
    $email = $_POST['emailadmin'];
    $pass = $_POST['passadmin'];
    $newpass = sha1($pass);
    $role =$_POST['role'];
    if(trim($email)==""){
        $arrayerror[]="please enter correct email";
    }
    if(trim($pass)==""){
        $arrayerror[]="please enter correct password";
    }
    if(empty($arrayerror)){
        $insertadmin="INSERT INTO `admin` VALUES (null,'$email','$newpass',$role)";
        $iad = mysqli_query($connection,$insertadmin );
    }
    

}
$selectrole= "SELECT * FROM `role`";
$rolese = mysqli_query($connection,$selectrole );


auth(1);
?>
<section class="home_1">
    <h3 class="text-center">Welcome Add Admin Page </h3>
    <h3 class="text-center"><?= $message?> </h3>
    <div class="container col-5">
        <div class="card">
            <div class="card-body">
                <form class="p-2" method="POST">
                    <div class="form-group">
                        <label for="">Add Email</label>
                        <input type="text" class="form-control" name="emailadmin">
                    </div>
                    <div class="form-group">
                        <label for="">Add Password</label>
                        <input type="password" class="form-control" name="passadmin">
                    </div>
                    <div class="form-group">
                        <label for="">Add Role</label>
                        <select class="form-control" name="role">
                            <?php foreach($rolese as $daterole){?>
                            <option value="<?= $daterole['id']?>" ><?= $daterole['description']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button class="btn btn-secondary col-3 mt-2" name="add">Add Admin</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include '../shared/footer.php';
?>