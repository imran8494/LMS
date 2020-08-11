<?php
require_once 'header.php';


?>
<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><i class="fa fa-profile" aria-hidden="true"></i><a href="#">Students Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <div class="row animated fadeInUp">
        <div class="col-sm-12">

            <div class="col-sm-8 col-sm-offset-2">
                <div>
                    <h4 class="section-subtitle pull-left"><b>Students Profile</b></h4>
                </div>
                <div><a class="btn btn-primary pull-right" data-toggle="modal" data-target="#primary-modal-<?= $row['id'] ?>" href="students_update.php"><i class="fa fa-pencil"></i> Edit</a></div>
                <div class="clearfix"></div>
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Students Id</th>
                                    <td><?= $row['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Students Name</th>
                                    <td><?= ucwords($row['fname'] . ' ' . $row['lname']); ?></td>
                                </tr>
                                <tr>
                                    <th>Roll</th>
                                    <td><?= $row['roll']; ?></td>
                                </tr>
                                <tr>
                                    <th>Reg. no.</th>
                                    <td><?= $row['reg']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?= $row['phone']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<!-- Modal -->
<div class="modal fade" id="primary-modal-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i>Update Students</h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_POST['update_students'])) {

                    $id = $_POST['id'];
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $phone = $_POST['phone'];

                    $update_students = mysqli_query($conn, "UPDATE `students` SET `fname`='$fname',`lname`='$lname',`email`='$email',`username`='$username',`phone`='$phone' WHERE `id`='$id'");
                    if ($update_students) {
                        session_destroy();
                        header('location:sign_in.php');
                ?>

                        <script>
                            alert('Students data updated successfully, Please Login again!');
                        </script>

                    <?php
                    } else {
                    ?>

                        <script>
                            alert('Students data not!');
                        </script>

                <?php

                    }
                }


                ?>
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" enctype="multipart/form-data">

                                    <h5 class="mb-md ">Update Students!</h5>
                                    <div class="form-group">
                                        <label for="fname">First Name</label>

                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required value="<?= $row['fname']; ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>

                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required value="<?= $row['lname']; ?>">
                                        <input type="hidden" class="form-control" name="id" required value="<?= $row['id'] ?>">


                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>

                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required value="<?= $row['email'] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>

                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="<?= $row['username'] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>

                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required value="<?= $row['phone'] ?>">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="update_students" class="btn btn-primary"><i class="fa fa-save"></i> Update Students</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

require_once 'footer.php';

?>