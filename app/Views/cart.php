
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
 -->
<?php
 $page_session = \Config\Services::session(); 
foreach ($room as $cart) {?>
<div class="container">
  <?php if($page_session->getTempdata('success')): ?>
                    <div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>
                  <?php  endif; ?>

                   <?php if($page_session->getTempdata('error')): ?>
                    <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
                  <?php  endif; ?>
	<h1>Room Cart</h1>
<table class="table" style="border: 2px solid black;">
	<tr>
	<th>Room Type</th>
	<th>Room No.</th>
	<th>Price</th>
</tr>
	<tr>
		<form method="post" action="<?php echo base_url('home/savebookinfo'); ?>">
			<td><input type="hidden" name="room_id" value="<?php echo $cart->id; ?>">
  <h5 class="card-title"> <?php echo $cart->room_type; ?></h5><input type="hidden" name="room_type" value="<?php echo $cart->room_type; ?>"></td>
   <td><h5 class="card-title"> <?php echo $cart->room_no; ?></h5><input type="hidden" name="room_no" value="<?php echo $cart->room_no; ?>"></td>
  <td> <h5 class="card-title"> <?='₹' . $realprice = $cart->price * $days;?></h5><input type="hidden" name="realprice" value="<?php echo $realprice; ?>"></td>
</tr>
</tr>
	<tr>

<td></td>
<td>Total Amt</td>
  <td colspan="2"> <h5 class="card-title">  <?='₹' . $realprice;?></h5></td>
</tr>
   </table>
 <?php
}
?>

  <div class="row">
  	<h4>Personal Details</h4>
    <div class="col-md-6">
    	<label>First Name</label>
      <input type="text" class="form-control"  placeholder="Enter First Name" name="firstname">
    </div>
      <div class="col-md-6">
    	<label>Last Name</label>
      <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname">
    </div>
    </div>
     <div class="row">
      <div class="col-md-6">
    	<label>Email</label>

      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
   <div class="col-md-6">
    	<label>Phone number</label>

      <input type="number" class="form-control" placeholder="Enter Number" name="phone">
    </div>
    </div>
 <div class="row">
      <div class="col-md-6">
    	<label>Select Payment method</label>

     <select name="payment" class="form-select" aria-label="Default select example">
 
  <option name="payment" value="Debit Card">Debit Card</option>
  <option name="payment" value="Cash">Cash</option>
  <option name="payment" value="Credit Card">Credit Card</option>
</select>
    </div>
    <div class="col-md-6">
      <label>Address</label>

      <textarea type="text" class="form-control"  placeholder="Enter Address" name="address" rows="5"></textarea>
    </div>

    </div><br>
    <button type="submit" class="btn btn-primary">Proceeed to Payment</button>

  </div>
</form>

</div>