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
                <li><i class="" aria-hidden="true"></i><a href="#">Librarian Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <div class="row animated fadeInUp">
        <div class="col-sm-12">

            <div class="col-sm-8 col-sm-offset-2">
                <div>
                    <h4 class="section-subtitle pull-left"><b>Librarian Profile</b></h4>
                </div>
                <div><a class="btn btn-primary pull-right" data-toggle="modal" data-target="#primary-modal-<?= $info['id'] ?>" href="students_update.php"><i class="fa fa-pencil"></i> Edit</a></div>
                <div class="clearfix"></div>
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Librarian Id</th>
                                    <td><?= $info['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Librarian Name</th>
                                    <td><?= ucwords($info['firstname'] . ' ' . $info['lastname']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $info['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $info['username']; ?></td>
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
<div class="modal fade" id="primary-modal-<?= $info['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i>Update Librarian</h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_POST['update_librarian'])) {

                    $id = $_POST['id'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];

                    $update_librarian = mysqli_query($conn, "UPDATE `librarian` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`username`='$username' WHERE `id`='$id'");
                    if ($update_librarian) {
                        session_destroy();
                        header('location:sign_in.php');
                ?>

                        <script>
                            alert('Librarian data updated successfully, Please Login again!');
                        </script>

                    <?php
                    } else {
                    ?>

                        <script>
                            alert('Librarian data not!');
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

                                    <h5 class="mb-md ">Update Librarian!</h5>
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>

                                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required value="<?= $info['firstname']; ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>

                                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required value="<?= $info['lastname']; ?>">
                                        <input type="hidden" class="form-control" name="id" required value="<?= $info['id'] ?>">


                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>

                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required value="<?= $info['email'] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>

                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="<?= $info['username'] ?>">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="update_librarian" class="btn btn-primary"><i class="fa fa-save"></i> Update Librarian</button>
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