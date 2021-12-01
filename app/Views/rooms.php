<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="container">
<center><h1>Rooms Booking</h1></center>
<?php
foreach ($user as $detail) {
    ?>
<div class="card mb-3" >
  <div class="row no-gutters">
    <div class="col-md-4">

      <img src="<?php echo base_url('public/assets/img/' . $detail->id . '/' . $detail->img); ?>" class="card-img-top" alt="...">

      <!-- <img src="<?php echo base_url('public/assets/img/roomimg.jpeg'); ?>" class="card-img-top" alt="..."> -->
    </div>
    <div class="col-md-8">
      <div class="card-body">
      	<form method="post" action="<?php echo base_url('home/cart'); ?>">
        <h5 class="card-title">Room Type : <?php echo $detail->room_type; ?></h5>
        <input type="hidden" name="days"  value="<?php echo $days; ?>">
        <h5 class="card-title">Room No: <?php echo $detail->room_no; ?></h5>
        <p class="card-text">Room Price: <?='₹' . $go = $detail->price * $days;?></p>
        <p class="card-text">Room Status: <?php if ($detail->status == 1) {
        echo "Booked";
    } else {
        echo "Available";
    }

    ?></p>
        <p class="card-text"><small class="text-muted"><i class="bi-wifi" style="font-size: 2rem; color: black;"></i> <i class="bi-tv" style="font-size: 2rem; color: black;"></i></small></p>
        <?php if ($detail->status == 1) {
        $disable = "disabled";
    } else {
        $disable = "";
    }
    ?>
    <button type="submit" class="btn btn-primary" id="cool" name="id" value="<?php echo $detail->id; ?>"  <?php echo $disable; ?>>Book Now </button>

      </div>
    </div>
  </div>
</div><?php }?></form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() {
  //var checkoutdate = $('#checkoutdate').getDate();
   //$('.btn').click(function() {
  // var roomtype = $('#cool').val();
   //var checkindate = new Date($('#checkindate').val());

   alert(roomtype);


  });
// });
</script>
