<?php
include "include/header.php";
$cat_title = $_GET['update'];

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php
    include "include/navigation.php";
    ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin Portal
                        <small>Author</small>
                    </h1>
                    <!-- Update category -->
                    <?php
                    if (isset($_POST['submit'])) {
                        $category_title = $_POST['cat_title'];
                        if ($category_title == "" || empty($category_title)) {
                            echo 'This field is required';
                        } else {
                            $updateQuery = "Update categories SET cat_title = '{$category_title}' where cat_title = '{$cat_title}'";
                            $query = mysqli_query($connection, $updateQuery);
                            if ($query) {
                                header("Location: categories.php");
                            } else {
                                echo 'Data not Updated';
                            }
                        }
                    }

                    ?>
                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Update Category</label>
                                <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title;  ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Update Category" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                    <!-- Show Categories -->
                   

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include "include/footer.php";
?>