<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Edit User</h1>
                <hr style="height: 1px; color: black; background-color: black">
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 mx-auto">
                <?php 
                    require_once("Controllers/Procedures.php");
                    if(!isset($_REQUEST['id'])){
                        echo "<script>document.location = 'viewUsers.php';</script>";
                    }

                    $proc = new Procedures();
                    $user = new User();
                    $id = $_REQUEST['id'];
                    $data = $proc->getUser($id);

                    $user->setName($data['name']);
                    $user->setId($data['id']);
                    $user->setEmail($data['email']);
                    $user->setMobile($data['mobile']);
                    $user->setAddress($data['address']);

                    function editUser(){
                        $proc = new Procedures();
                        $user = new User();
                        if(!isset($_POST["submit"])){
                            if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["mobile"]) && isset($_POST["address"])){
                                if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
                                    $user->setId($_REQUEST['id']);
                                    $id = $user->getId();
                                    $user->setName($_POST["name"]);
                                    $user->setMobile($_POST["mobile"]);
                                    $user->setEmail($_POST["email"]);
                                    $user->setAddress($_POST['address']);
                                    
                                    $result = $proc->editUser($user);
                                    if($result == "1"){
                                        echo "<script>alert('Edited Successfully'); window.locaton.href = 'viewUsers.php';</script>";
                                    }
                                    else{
                                        echo "<script>alert('Could not be added at this time'); document.locaton = 'editUsers.php?id=$id';</script>";
                                    }
                                }else{
                                    echo "<script>
                                            alert('Please fill all Feilds');
                                        </script>
                                    ";
                                }
                            }
                        }
                    }

                    editUser();
                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user->getName();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user->getEmail();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Mobile no.</label>
                        <input type="text" name="mobile" class="form-control" value="<?php echo $user->getMobile();?>">
                    </div><div class="form-group">
                        <label for="">Address</label>
                        <textarea type="text" name="address" class="form-control"><?php echo $user->getAddress();?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>
</html>