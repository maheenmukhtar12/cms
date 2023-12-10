<?php
function fetchAllCategories()
{
    global $connection;
    // Query to get all categories from the database.
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_id = $row['cat_id'];
        $cat_title =  $row['cat_title'];
        echo "<tr>
                                    <td>" . $cat_id . "</td>
                                    <td>" . $cat_title . "</td>
                                    <td><a href='categories.php?delete={$cat_id}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                  </svg>
                                  </a>
                                  </td>
                                  <td><a href='update_category.php?update={$cat_title}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                </svg></a></td>
                                </tr>";
    }
}
function insertCategory(){
    global $connection;
    if (isset($_POST['submit'])) {
        $category_title = $_POST['cat_title'];
        if ($category_title == "" || empty($category_title)) {
            echo 'This field is required';
        } else {
            $selectQuery = "Select * from categories where cat_title = '{$category_title}'";
            $runQuery = mysqli_query($connection, $selectQuery);
            $result = mysqli_num_rows($runQuery);
            if($result >0){
                echo "This category already exists";
            }else{
                $insertQuery = "INSERT into categories (cat_title) VALUE ('{$category_title}') ";
                $query = mysqli_query($connection, $insertQuery);
                if ($query) {
                    echo 'Data Inserted';
                    header("Location: categories.php");
                } else {
                    echo 'Data not Inserted';
                }
            }
            
        }
    }
}
function deleteCategory(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $deleteQuery = "DELETE FROM categories where cat_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if(!$deleteSQL)  {
            die("QUERY FAILED" . mysqli_error($connection));
        }else{
           header("Location:categories.php");
        }
    }
}
