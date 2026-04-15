<?php 

include('../middleware/adminmiddleware.php');
include('includes/header.php');

?>

<style>
/* Table Styling */
.table {
   border: 1px solid #ddd;
}

.table th, .table td {
   border: 1px solid #ddd;
   text-align: center;
   vertical-align: middle;
}

.table th {
   background-color: #EB8317;
   color: #F4F6FF;
   font-weight: bold;
}

/* Edit Button Styling */
.btn-edit{
   background-color: #EB8317;
   color: #F4F6FF;
   border: none;
   transition: all 0.3s ease;
}

.btn-edit:hover {
   background-color: #F4F6FF;
   color: #EB8317;
   border: 1px solid #EB8317;
}

/* Delete Button Styling */
.delete_category_btn {
   background-color: #A32D25;
   color: #F4F6FF;
   border: none;
   transition: all 0.3s ease;
}

.delete_category_btn:hover {
   background-color: #F4F6FF;
   color: #EB8317;
   border: 1px solid #A32D25;
}
</style>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <a href="index.php" class="btn btn-edit">Back</a>
               <h4>Categories</h4>
            </div>
            <div class="card-body" id="category_table">
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $category = getAll('categories');

                        if(mysqli_num_rows($category) > 0)
                        {
                           foreach($category as $item)
                           {
                              ?>
                                 <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td>
                                       <img src="../uploads/<?= $item['image']; ?>"  height="100px" alt="<?= $item['name']; ?>">
                                    </td>
                                    <td>
                                       <?= $item['status'] == '0' ? "Visible" : "Hidden" ?>
                                    </td>
                                    <td>
                                       <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-edit">Edit</a>
                                       <button type="button" class="btn delete_category_btn" value="<?= $item['id']; ?>">Delete</button>
                                    </td>
                                 </tr>
                              <?php
                           }
                        }
                        else
                        {
                           echo "<tr><td colspan='5'>No records found</td></tr>";
                        }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php'); ?>
