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

function auth($num1,$num2=null,$num3=null)
{
    if (isset($_SESSION['admin'])) {
        if($_SESSION['admin']['role'] ==$num1 || $_SESSION['admin']['role'] ==$num2 || $_SESSION['admin']['role'] ==$num3){
        }
        else{
            path('error404.php');
        }
    }
    else{
        path('admin/login.php');
    }
}
// function val($x){
//     $v="";
//     if(trim($x) ==""){
//         $arrayerror[] =$v;
//     }
    
// }

function numemploy($idData,$connection)
{
    $selectnum = "SELECT COUNT(*) FROM `employees`WHERE depID =$idData";
    $snum = mysqli_query($connection, $selectnum);
    $row =   mysqli_fetch_assoc($snum);
    echo $row['COUNT(*)'];
}

?>