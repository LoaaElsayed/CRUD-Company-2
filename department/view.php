<?php
    include '../shared/header.php';
    include '../shared/nav.php';
    include '../general/connect.php';
    include '../general/function.php';

    if(isset($_GET['show'])){
        $id =$_GET['show'];
        $selectview="SELECT * FROM `emp_dep` WHERE `depid`=$id";
        $depview = mysqli_query($connection,$selectview);
        $row = mysqli_fetch_assoc($depview) ;
    }

    auth(1,2,3);

?>

    <section class="home_view"> 
        <h3 class="text-center">Welcome In view Department : <?= $row['dep_name']?> </h3>
        <div class="container col-4 mt-5 mb-5">
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="card-title text-center"><?= $row['dep_name']?>:
                    <?php 
                        numemploy($id, $connection)
                    ?>
                </h4>
                <table class="table">
                    <tr>
                        <td>names</td>
                        <td>Emails</td>
                    </tr>
                    <?php foreach($depview as $data) { ?>
                        <tr>
                            <th>
                                <?php echo $data['emp_name'] ?>
                            </th>
                            <th>
                                <?php echo $data['emp_email'] ?>
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