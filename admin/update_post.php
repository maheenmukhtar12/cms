<?php
include "include/header.php";
?>
<?php include "../includes/db.php"; 
$post_id=$_GET['update'];
$query = "SELECT * FROM posts where post_id= {$post_id}";
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id =  $row['post_id'];
                   $post_title =  $row['post_title'];
                   $post_cat= $row['post_category_id'];
                   $post_author =  $row['post_author'];
                   $post_date =  $row['post_date'];
                   $post_content =  $row['post_content'];
                   $post_image=$row['post_image'];
                   $post_status=$row['post_status'];
                   $post_tags=$row['post_tags'];
                   $post_comments=$row['post_comment_count'];
                }
                ?>

?>
<?php
if (isset($_POST['update'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    $post_date = date('d-m-y');
    $post_comment_count = 4;
    $post_cat_id = $_POST['post_category'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    move_uploaded_file($post_image_temp, "../images/" . $post_image);

    // $insertQuery = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`) VALUES ('{$post_cat_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}')";

    // $query = mysqli_query($connection, $insertQuery);
    // if ($query) {
    //     header("Location: viewposts.php");
    // } else {
    //     die("Failed" . mysqli_error($connection));
    // }
}

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


                    <h2>Update Post</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <select class="form-control" name="post_category" id="post_category">
                        <?php
                        $select_all_categories_query = "Select * from categories";
                        $runQuery = mysqli_query($connection, $select_all_categories_query);
                        while ($row = mysqli_fetch_assoc($runQuery)) {
                            $cat_id=$row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                        ?>
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="post_title">Post Title</label><br>
                            <input class="form-control" type="text" id="post_title" name="post_title" value="<?php echo $post_title  ?>"><br>
                        </div>
                        <div class="form-group">
                            <label for="post_author">Post Author</label><br>
                            <input class="form-control" type="text" id="post_author" name="post_author" value="<?php echo $post_author  ?>"><br>
                        </div>

                        <div class="form-group">
                            <label for="post_image">Post Image</label><br>
                            <img name="post_uploaded_image" src="../images/value="<?php echo $post_image  ?>"" alt="">
                            <input class="form-control" type="file" id="post_image" name="post_image" placeholder="Choose Another Image"><br>
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Post Tags</label><br>
                            <input class="form-control" type="text" id="post_tags" name="post_tags" placeholder="Add comma separated tags" value="<?php echo $post_tags  ?>"><br>
                        </div>
                        <div class="form-group">
                            <label for="post_content">Post Content</label><br>
                            <textarea class="form-control" type="text" id="post_content" name="post_content" cols="30" rows="10" value="<?php echo $post_content  ?>"></textarea><br>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update" value="Update Post">
                        </div>
                    </form>

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