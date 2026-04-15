<?php 

include('functions/userfunctions.php');
include('includes/header.php');

include('authenticate.php');

?>

<!-- remove underline -->
<style>
   a {
      text-decoration: none;
   }
</style>

<div class="py-3 bg-primary">
   <div class="container">
      <h6 class="text-white">
         <a href="index.php" class="text-white">
            Home / 
         </a>
         <a href="my-orders.php" class="text-white">
            My Orders
         </a>
      </h6>
   </div>
</div>

<div class="py-5">
    <div class="container">
      <div class="">
        <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th>ID</th>
                        <th>Tracking No</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>View</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $orders = getOrders();

                        if(mysqli_num_rows($orders) > 0)
                        {
                           foreach ($orders as $item) {
                           ?>
                              <tr>
                                 <td class="text-center"><?= $item['id']; ?></td>
                                 <td><?= $item['tracking_no']; ?></td>
                                 <td>RS.<?= $item['total_price']; ?></td>
                                 <td class="text-center"><?= $item['created_at']; ?></td>
                                 <td class="text-center">
                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Details</a>
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
   