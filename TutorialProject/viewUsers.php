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
                <h1 class="text-center">USER'S TABLE</h1>
                <hr style="height: 1px; color: black; background-color: black">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Mobile</td>
                            <td>Address</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            include('Controllers/Procedures.php');
                            $proc = new Procedures();
                            $data = $proc->getUsers();
                            $i = 0;
                            if($data != null){
                                foreach($data as $row){
                                    $i++;
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $id = $row['id'];
                                    echo "
                                    <tr>
                                            
                                            <td>$i</td>
                                            <td>{$name}</td>
                                            <td>{$email}</td>
                                            <td>{$mobile}</td>
                                            <td>{$address}</td>
                                            <td>
                                                <a href='viewUser.php?id={$id}' class='badge badge-info'>Read</a>
                                                <a href='deleteUser.php?id={$id}' class='badge badge-danger'>Delete</a>
                                                <a href='editUser.php?id={$id}' class='badge badge-success'>Edit</a>
                                            </td>
                                    </tr>
                                    ";
                                }
                            } else{
                                echo "No Data Found";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>