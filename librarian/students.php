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
                <li><a href="javascript:avoid(0)">Students</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="pull-left"><h4 class="section-subtitle"><b>All Students</b></h4></div>
            <div><a class="btn btn-primary pull-right" href="print_all_students.php" target="_blank"><i class="fa fa-print" ></i> Print</a></div>
            <div class="clearfix"></div>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Reg.</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $result = mysqli_query($conn, "SELECT * FROM `students` ");

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <tr>
                                        <td><?php echo ucwords($row['fname'] . ' ' . $row['lname']); ?></td>
                                        <td><?php echo $row['roll']; ?></td>
                                        <td><?php echo $row['reg']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['photo']; ?></td>
                                        <td><?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                            ?>
                                                <a class="btn btn-primary btn-xs" href="status_inactive.php?id=<?php echo base64_encode($row['id']) ;?>"><i class="fa fa-arrow-up"></i></a>

                                            <?php
                                            } else {
                                            ?>
                                                <a class="btn btn-warning btn-xs" href="status_active.php?id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-arrow-down"></i></a>

                                            <?php
                                            }

                                            ?>

                                        </td>

                                    </tr>



                            <?php
                            }
                            
                            ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
    <?php

    require_once 'footer.php';

    ?>