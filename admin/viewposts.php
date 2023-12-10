<?php
include "include/header.php";
?>
<?php include "../includes/db.php"; ?>
<?php
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $deleteQuery = "DELETE FROM posts where post_id = ('{$delete_id}')";
    $deleteSQL = mysqli_query($connection, $deleteQuery);
    if(!$deleteSQL)  {
        die("QUERY FAILED" . mysqli_error($connection));
    }else{
    //    header("Location:view_posts.php");
    }
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
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id =  $row['post_id'];
                   $post_title =  $row['post_title'];
                   $post_cat= $row['post_category'];
                   $post_author =  $row['post_author'];
                   $post_date =  $row['post_date'];
                   $post_content =  $row['post_content'];
                   $post_image=$row['post_image'];
                   $post_status=$row['post_status'];
                   $post_tags=$row['post_tag'];
                   $post_comments=$row['post_comment_count'];
                ?>

                    <tr>
                        <td><?php echo $post_id?></td>
                        <td><?php echo $post_author?></td>
                        <td><?php echo $post_title?></td>
                        <td><?php echo $post_cat?></td>
                        <td><?php echo $post_content?></td>
                        <td><?php echo $post_status?></td>
                       
                        
                        <td><img width=100 src="../images/<?php echo $post_image?>"></td>
                        
                        <td><?php echo $post_tags?></td>
                        <td><?php echo $post_comments?></td>
                        <td><?php echo $post_date?></td>
                        <td><?php echo "<a href='viewposts.php?delete={$post_id}'>"  ?>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                  </svg>
                                  </a>
                                  </td>
                                  <td><?php echo "<a href='update_post.php?update={$post_id}'>"  ?><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                </svg></a></td>

                    </tr>


<?php }?>
                        </tbody>
                    </table>
                    
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