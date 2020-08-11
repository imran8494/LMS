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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="row">
            <?php

            $books = mysqli_query($conn, "SELECT * FROM `books`");
            $total_books = mysqli_num_rows($books);

            $books_qty = mysqli_query($conn, "SELECT SUM(`book_qty`) as total FROM `books`");
            $total_books_qty = mysqli_fetch_assoc($books_qty);

            $availabe_qty = mysqli_query($conn, "SELECT SUM(`availabe_qty`) as total FROM `books`");
            $total_availabe_qty = mysqli_fetch_assoc($availabe_qty);

            ?>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="manage_books.php">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?= $total_books.'('.$total_books_qty['total'].' - '.$total_availabe_qty['total'].')' ?> </h1>
                            <h4 class="subtitle">Total Books</h4>
                        </div>
                    </a>
                </div>
            </div>
            <?php

            $students = mysqli_query($conn, "SELECT * FROM `students`");

            $total_students = mysqli_num_rows($students);

            ?>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="students.php">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?= $total_students ?> </h1>
                            <h4 class="subtitle">Total Students</h4>
                        </div>
                    </a>
                </div>
            </div>
            <?php

            $librarian = mysqli_query($conn, "SELECT * FROM `librarian`");

            $total_librarian = mysqli_num_rows($librarian);

            ?>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_librarian ?> </h1>
                            <h4 class="subtitle color-darker-1">Total Librarian</h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<?php

require_once 'footer.php';

?>