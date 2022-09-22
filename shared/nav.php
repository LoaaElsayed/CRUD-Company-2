<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
}

?>

<header class="bg-dark">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark col-lg-12">
                <a class="navbar-brand" href="/web2">COMPANY</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Employee
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/web2/employee/list.php">List</a>
                                    <a class="dropdown-item" href="/web2/employee/add.php">Add</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Department
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/web2/department/list.php">List</a>
                                    <a class="dropdown-item" href="/web2/department/add.php">Add</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto ">
                            <li class="nav-item active">
                                <a href="/web2/admin/add.php" class="btn btn-secondary mr-2  my-2" type="submit">Add Admin</a>
                            </li>
                            <li class="nav-item active">
                                <a href="/web2/admin/list.php" class="btn btn-secondary mr-2  my-2" type="submit">List Admin</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <form class="form-inline my-2 my-lg-0 ">
                            <button name="logout" class="btn btn-secondary my-2 mr-2 my-sm-0" type="submit">LogOut</button>
                        </form>
                    <?php else : ?>
                        <a href="/web2/admin/login.php" class="btn btn-secondary  my-2" type="submit">LogIn</a>
                    <?php endif; ?>
                    </div>
            </nav>
        </div>
    </div>
</header>