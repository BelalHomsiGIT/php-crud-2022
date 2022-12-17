<?php
  // session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP-CRUD</title>
  </head>
  <body>
  <div class="container mt-5">
      <div class="row mt-5">
        <?php 
          include 'message.php';   //it has session_start();
        ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header text-center">
              <h4>Students Details
                <a href="student-create.php" class="btn btn-primary float-end">Add Student</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Action</th>
                  </tr>
                  <tbody>
                    <?php
                      require 'dbconn.php';
                      $queryAll = mysqli_query($conn, "SELECT * FROM students");
                      if(mysqli_num_rows($queryAll) > 0){
                        foreach($queryAll as $student){
                    ?>
                          <tr>
                          <td><?=$student['id'] ?></td>
                          <td><?=$student['name'] ?></td>
                          <td><?=$student['email'] ?></td>
                          <td><?=$student['phone'] ?></td>
                          <td><?=$student['course'] ?></td>
                          <td class="text-center">
                            <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="code.php?id=<?=$student['id']?> & del='ok'" class="btn btn-danger btn-sm">Del</a>
                          </td>
                          </tr>
                    <?php
                        }
                      }else{
                        echo "<h5>No Data Staudents</h5>";
                      }
                    ?>

                  </tbody>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>