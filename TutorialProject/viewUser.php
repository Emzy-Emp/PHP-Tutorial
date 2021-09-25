<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>View User</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">View User</h1>
                <hr style="height: 1px; color: black; background-color: black">
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 mx-auto">
                <?php 
                    include("Controllers/Procedures.php");
                    $proc = new Procedures();
                    if(!isset($_REQUEST['id'])){
                        header('location: viewUsers.php');
                    }
                    $id = $_REQUEST['id'];
                    $data = $proc->getUser($id);
                    if(!empty($data)){
                ?>
                    <div class="card">
                        <div class="card-header">
                            Single User
                        </div>
                        <div class="card-body">
                            <p>Name: '<?php echo $data['name']?>'</p>
                            <p>Email: '<?php echo $data['email']?>'</p>
                            <p>Mobile No.: '<?php echo $data['mobile']?>'</p>
                            <p>Address: '<?php echo $data['address']?>'</p>
                        </div>
                    </div>
                <?php 
                    }else {
                ?>
                    <p><?php echo "No Data Found"?></p>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>