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
                <li><a href="jabascript:avoid(0)">Manage Books</a></li>
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
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Book Image</th>
                                    <th>Book Author Name</th>
                                    <th>Book Publication Name</th>
                                    <th>Book Purchase Date</th>
                                    <th>Book Price</th>
                                    <th>Book Quantity</th>
                                    <th>Available Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $result = mysqli_query($conn, "SELECT * FROM `books` ");

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo $row['book_name']; ?></td>
                                        <td><img width="70%" src="../images/books/<?php echo $row['book_image']; ?>" alt=""></td>
                                        <td><?php echo $row['book_author_name']; ?></td>
                                        <td><?php echo $row['book_publication_name']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row['book_purchase_date'])); ?></td>
                                        <td><?php echo $row['book_price']; ?></td>
                                        <td><?php echo $row['book_qty']; ?></td>
                                        <td><?php echo $row['availabe_qty']; ?></td>
                                        <td>

                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#books-<?php echo $row['id']; ?>" href="javascript:avoid(0)"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update-books-<?php echo $row['id']; ?>" href="javascript:avoid(0)"><i class="fa fa-pencil"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm" href="delete.php?bookdelete=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-trash"></i></a>

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
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<?php

$result = mysqli_query($conn, "SELECT * FROM `books`");

while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="modal fade" id="books-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th>Book Name</th>
                            <td><?php echo $row['book_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Book Image</th>
                            <td><img width="20%" src="../images/books/<?php echo $row['book_image']; ?>" alt=""></td>
                        </tr>
                        <tr>
                            <th>Book Author Name</th>
                            <td><?php echo $row['book_author_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Book Publication Name</th>
                            <td><?php echo $row['book_publication_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Book Purchase Date</th>
                            <td><?php echo date('d-M-Y', strtotime($row['book_purchase_date'])); ?></td>
                        </tr>
                        <tr>
                            <th>Book Price</th>
                            <td><?php echo $row['book_price']; ?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity</th>
                            <td><?php echo $row['book_qty']; ?></td>
                        </tr>
                        <tr>
                            <th>Available Quantity</th>
                            <td><?php echo $row['availabe_qty']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>
<?php

$result = mysqli_query($conn, "SELECT * FROM `books`");

while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $book_info = mysqli_query($conn, "SELECT * FROM `books` WHERE `id`= '$id'");
    $book_info_row = mysqli_fetch_assoc($book_info);
?>
    <div class="modal fade" id="update-books-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" enctype="multipart/form-data">
                                        <h5 class="mb-md ">Update Books!</h5>
                                        <div class="form-group">
                                            <label for="book_name">Book Name</label>

                                            <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Name" required value="<?= $book_info_row['book_name'] ?>">
                                            <input type="hidden" class="form-control" name="id" required value="<?= $book_info_row['id'] ?>">


                                        </div>

                                        <div class="form-group">
                                            <label for="book_image">Book Image</label>
                                           
                                                <input type="file" name="book_image" id="book_image" required>
                                                <img width="40px" src="../images/books/<?=$book_info_row['book_image']?>" alt="">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name">Book Author Name</label>

                                            <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book Author Name" required value="<?= $book_info_row['book_author_name'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name">Book Publication Name</label>

                                            <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book Publication Name" required value="<?= $book_info_row['book_publication_name'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date">Book Purchase Date</label>

                                            <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date" placeholder="Book Purchase Date" required value="<?= $book_info_row['book_purchase_date'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_price">Book Price</label>

                                            <input type="text" class="form-control" name="book_price" id="book_price" placeholder="Book Price" required value="<?= $book_info_row['book_price'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty">Book Quantity</label>

                                            <input type="number" class="form-control" name="book_qty" id="book_qty" placeholder="Book Quantity" required value="<?= $book_info_row['book_qty'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="availabe_qty">Available Quantity</label>

                                            <input type="number" class="form-control" name="availabe_qty" id="availabe_qty" placeholder="Available Quantity" required value="<?= $book_info_row['availabe_qty'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i> Update Books</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
if (isset($_POST['update_book'])) {

    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $availabe_qty = $_POST['availabe_qty'];

    $librarian_username = $_SESSION['librarian_username'];

    $image = explode('.', $_FILES['book_image']['name']);

    $image_extension = end($image);

    $book_image = date('ymdtis') . '.' . $image_extension;

    $insert_book = mysqli_query($conn, "UPDATE `books` SET `book_name`='$book_name',`book_image`='$book_image',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`availabe_qty`='$availabe_qty',`librarian_username`='$librarian_username' WHERE `id`='$id'");

    if ($insert_book) {
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/' . $book_image);
        ?>
        <script>
            alert('Book updated successfully!');            
            javascript:history.go(-1);
        </script>
        <?php
    } else {
        
        ?>
        <script>
            alert('Book not issued!');
        </script>
        <?php
    }
}

?>
<?php

require_once 'footer.php';

?>