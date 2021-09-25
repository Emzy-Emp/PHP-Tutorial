<?php 
    include('Controllers/Procedures.php');
    $proc = new Procedures();
    $id = $_REQUEST['id'];
    $result = $proc->deleteUser($id);
    if($result == "1"){
        echo "<script>alert('Deleted SuccessFully')</script>";
    }else{
        echo "<script>alert('Cannot Delete User at this time')</script>";
    }
    echo "<script>document.location = 'viewUsers.php'</script>";
?>