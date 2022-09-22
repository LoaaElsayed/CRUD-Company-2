<?php
    include '../shared/header.php';
    include '../shared/nav.php';
    include '../general/connect.php';
    include '../general/function.php';


    
    $select = "SELECT * FROM `employees`";
    $se = mysqli_query($connection, $select);

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete ="DELETE FROM `employees` WHERE id = $id";
        $d = mysqli_query($connection , $delete) ;
        path('employee/list.php');
    }

    auth();

?>

    <section class="home_list"> 
            <h3 class="text-center">Welcome In List Employee </h3>
        <div class="container col-6">
            <div class="card m-2">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#ID</td>
                            <td>name</td>
                            <td>Action</td>
                        </tr>
                        <?php foreach($se as $data) { ?>
                            <tr>
                                <th>
                                    <?php echo $data['id'] ?>
                                </th>
                                <th>
                                    <?php echo $data['name'] ?>
                                </th>
                                <th>
                                    <a href="view.php?show=<?= $data['id']?>" class="mr-3"><i class="fa-solid fa-eye"></i></a>
                                    <a href="list.php?delete=<?= $data['id']?>" class="mr-3"><i class="fa-solid fa-trash"></i></a>
                                    <a href="update.php?edit=<?= $data['id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
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