<!-- tester -->

<?php

function test($conn, $message)
{
    $retmassage = "";
    if (isset($conn)) {
        $retmassage = "TRUE $message";
    } else {
        $retmassage = "FALSE $message";
    }
    return $retmassage;
}



function path($go)
{
    echo 
    "<script>
        window.location.replace('/web2/$go/')
    </script>";
}

function auth(){
    if(!isset($_SESSION['admin'])){
        path('admin/login.php'); 
    }
}

?>