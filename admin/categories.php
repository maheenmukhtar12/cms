<?php
include "include/header.php";
include "include/functions.php";
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
                    <!-- Add category -->
                    <?php insertCategory(); ?>
                    <!-- End add category -->
                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Add Category" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                    <!-- Show Categories -->
                    <div class="col-xs-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php fetchAllCategories(); ?>

                                <?php deleteCategory(); ?>

                            </tbody>
                        </table>
                    </div>

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