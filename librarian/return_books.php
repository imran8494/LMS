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
            <h4 class="section-subtitle"><b>Searching, ordering and paging</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Phone</th>
                                    <th>Book Name</th>
                                    <th>Book Image</th>
                                    <th>Book Issue Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $result = mysqli_query($conn, "SELECT `issue_books`.`id`,`issue_books`.`book_id`,`issue_books`.`book_issue_date`, `students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`,`books`.`book_image`
                                FROM `issue_books`
                                INNER JOIN `students` ON `students`.`id`=`issue_books`.`student_id`
                                INNER JOIN `books` ON `books`.`id`=`issue_books`.`book_id`
                                WHERE `issue_books`.`book_return_date`=''");

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo ucwords($row['fname'] . ' ' . $row['lname']); ?></td>
                                        <td><?php echo $row['roll']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['book_name']; ?></td>
                                        <td><img width="80px" src="../images/books/<?php echo $row['book_image']; ?>" alt=""></td>
                                        <td><?php echo $row['book_issue_date']; ?></td>
                                        <td><a href="return_books.php?id=<?php echo base64_encode($row['id']); ?>&book_id=<?php echo base64_encode($row['book_id']); ?>">Return Books</a></td>
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
    if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        $book_id = base64_decode($_GET['book_id']);

        $date = date('d-m-y');
        $result = mysqli_query($conn, "UPDATE `issue_books` SET `book_return_date`='$date' WHERE `id`='$id'");

        if ($result) {
            mysqli_query($conn, "UPDATE `books` SET `availabe_qty`=`availabe_qty`+1 WHERE `id`='$book_id'");
    ?>
            <script>
                alert('Book return Successfully!');
                javascript: history.go(-1);
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Sonething Wrong!');
            </script>
    <?php
        }
    }
    require_once 'footer.php';

    ?>