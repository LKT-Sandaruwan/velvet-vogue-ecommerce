<?php 

include('../middleware/adminmiddleware.php');
include('includes/header.php');


?>

<style>
   .hisBtn:hover{
      background-color: black;
      color: white;
   }
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
</style>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header headbg">
               <a href="index.php" class="btn btn-edit">Back</a>
               <a href="order-history.php" class="btn float-end btn-edit">Order History</a>
               <h4>Orders</h4>
            </div>
            <div class="card-body" id="">
               <table class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Tracking No</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>View</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $orders = getAllOrders();

                        if(mysqli_num_rows($orders) > 0)
                        {
                           foreach ($orders as $item) {
                           ?>
                              <tr>
                                 <td class="text-center"><?= $item['id']; ?></td>
                                 <td><?= $item['name']; ?></td>
                                 <td><?= $item['tracking_no']; ?></td>
                                 <td>RS.<?= $item['total_price']; ?></td>
                                 <td class="text-center"><?= $item['created_at']; ?></td>
                                 <td class="text-center">
                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-edit">View Details</a>
                                 </td>
                              </tr>
                           <?php
                           }
                        }
                        else
                        {
                           ?>
                              <tr>
                                 <td colspan="5">No orders yet</td>
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
</div>
    

<?php include('includes/footer.php'); ?>
   