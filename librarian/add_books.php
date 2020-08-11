<?php
require_once 'header.php';







?>
<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">


    <?php
    if (isset($_POST['add_books'])) {

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

        $book_image = date('ymdtis').'.'.$image_extension;

        $insert_book = mysqli_query($conn, "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `availabe_qty`, `librarian_username`) VALUES ('$book_name','$book_image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$availabe_qty','$librarian_username')");

        if($insert_book){
            move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$book_image);
            $success = "Data saved successfully!";
        }else{
            $error = "Data not saved!";
        }
    }






    ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="jabascript:avoid(0)">Add Books</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">

        <div class="col-sm-6 col-sm-offset-3">
            <?php
            if (isset($success)) {
            ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $success; ?>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($error)) {
            ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error; ?>
                </div>
            <?php
            }
            ?>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <h5 class="mb-lg">Add Books!</h5>
                                <div class="form-group">
                                    <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="book_image" id="book_image" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book Author Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_publication_name" class="col-sm-4 control-label">Book Publication Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book Publication Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date" placeholder="Book Purchase Date" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_price" id="book_price" placeholder="Book Price" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="book_qty" id="book_qty" placeholder="Book Quantity" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="availabe_qty" class="col-sm-4 control-label">Available Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="availabe_qty" id="availabe_qty" placeholder="Available Quantity" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" name="add_books" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<?php

require_once 'footer.php';

?>