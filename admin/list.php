<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/connect.php';
include '../general/function.php';
$message = '';


    $selectlistsdmin = "SELECT * FROM `detail_admin`";
    $sad = mysqli_query($connection, $selectlistsdmin);


auth(1, 2, 3);
?>
<section class="home_list">
    <h3 class="text-center">Welcome List Admin Page </h3>
    <h3 class="text-center"><?= $message ?> </h3>
    <div class="container col-5">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#ID</td>
                            <td>Email</td>
                            <td>Roll</td>
                        </tr>
                        <?php foreach ($sad as $data) { ?>
                            <tr>
                                <th>
                                    <?= $data['admin_id'] ?>
                                </th>
                                <th>
                                    <?= $data['admin_email'] ?>
                                </th>
                                <th>
                                    <?= $data['role_info']?>
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include '../shared/footer.php';
?>