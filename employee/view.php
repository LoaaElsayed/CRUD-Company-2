<?php
    include '../shared/header.php';
    include '../shared/nav.php';
    include '../general/connect.php';
    include '../general/function.php';


    if(isset($_GET['show'])){
        $id = $_GET['show'];
        $select = "SELECT * FROM `emp_dep` where emp_id = $id";
        $se = mysqli_query($connection, $select);
        $row = mysqli_fetch_assoc($se) ;
    }
    auth();

?>

    <section class="home_view"> 
        <h3 class="text-center">Welcome In List Employee : <?= $row['emp_name'] ?> </h3>


    <div class="container col-4 ">
        <div class="card">
            <img src="/web2/employee/upload/<?= $row['emp_image']?>" class="card-img-top">
            <div class="card-body">
                <h4 class="text-center mb-3"> <?= $row['emp_name']?></h4>
                <h4><?= $row['emp_email']?></h4>
                <h4> <?= $row['dep_name']?></h4>
            </div>
        </div>
    </div>
    </section>
    

<?php
    include '../shared/footer.php';
?>