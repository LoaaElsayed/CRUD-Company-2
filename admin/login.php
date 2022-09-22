<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';
$message='';

if(isset($_POST['login'])){
    $email = $_POST['emailadmin'];
    $pass = $_POST['passadmin'];
    $newpasslog = sha1($pass);
    $selectadmin="SELECT * FROM `admin` WHERE `Email`= '$email' and `password`= '$newpasslog '";
    $sadmin = mysqli_query($connection, $selectadmin) ;
    $numRows = mysqli_num_rows($sadmin);
    if($numRows > 0){
        $_SESSION['admin'] = $email;
        path('/');
    }
    else{
        $message ="You is Not Admin";
    }
}
if(isset($_SESSION['admin'])){
    path('/');
}
?>
<section class="home_1">
    <h3 class="text-center">Welcome Admin </h3>
    <h3 class="text-center"><?= $message?> </h3>
    <div class="container col-5">
        <div class="card">
            <div class="card-body">
                <form class="p-2" method="POST">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="emailadmin">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="passadmin">
                    </div>
                    <button class="btn btn-secondary col-3 mt-2" name="login">LogIn</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include '../shared/footer.php';
?>