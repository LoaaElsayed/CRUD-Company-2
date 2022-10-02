<?php
    include '../shared/header.php';
    include '../shared/nav.php';
    include '../general/connect.php';
    include '../general/function.php';

    if(isset($_GET['show'])){
        $id =$_GET['show'];
        $selectview="SELECT * FROM `details` WHERE depart_id=$id";
        $depview = mysqli_query($connection,$selectview);
        $row = mysqli_fetch_assoc($depview) ;
    }

    auth(1,2,3);

?>

    <section class="home_view"> 
        <h3 class="text-center">Welcome In view Department : <?= $row['depart_name']?> </h3>
        <div class="container col-4 mt-5 mb-5">
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="card-title text-center"><?= $row['depart_name']?>:
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
                                <?php echo $data['name_employee'] ?>
                            </th>
                            <th>
                                <?php echo $data['email_employee'] ?>
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