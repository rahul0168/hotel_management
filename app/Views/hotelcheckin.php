<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js" integrity="sha512-pBoUgBw+mK85IYWlMTSeBQ0Djx3u23anXFNQfBiIm2D8MbVT9lr+IxUccP8AMMQ6LCvgnlhUCK3ZCThaBCr8Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	$(document).ready(function(){
/*$(function(){*/

    <?php if(session()->has("success")) { ?>
        $.bootstrapGrowl('<?= session("success") ?>',{
            type: 'success',
            delay: 4000,
        });
    <?php } ?>

    <?php if(session()->has("info")) { ?>
        $.bootstrapGrowl('<?= session("info") ?>',{
            type: 'info',
            delay: 4000,
        });
    <?php } ?>

    <?php if(session()->has("error")) { ?>
        $.bootstrapGrowl('<?= session("error") ?>',{
            type: 'danger',
            delay: 4000,
        });
    <?php } ?>

    <?php if(session()->has("warning")) { ?>
        $.bootstrapGrowl('<?= session("warning") ?>',{
            type: 'warning',
            delay: 4000,
        });
    <?php } ?>
});
/*});*/
</script>
<style type="text/css">

	body{
		background-image: url(http://localhost/hm/public/assets/img/bgimg.jpg);
		background-repeat: no-repeat;
  background-size: cover;
	}
</style>
<div class="container p-3 my-3 border back">

<div class="card" >

  <div class="card-body">
  	<h1>Room Booking</h1>
		<form method="post" action="<?php echo base_url('home/room'); ?>">
			<div class="row">
				<div class="form-group col-md-6">
			<label>Check In Date</label>
			<input type="date" class="form-control" name="checkindate" id="checkindate" value="<?php echo date('Y-m-d'); ?>">
		      </div>
		      <div class="form-group col-md-6">

			<label>Check Out Date</label>
			<input type="date" id="checkoutdate" class="form-control"  name="checkoutdate" value="<?php echo date('Y-m-d'); ?>">
		</div>
			<input type="hidden" id="price" name="price" >
			<input type="hidden" id="days" name="days" >
			<div class="form-group col-md-6">
			<label for="adult">Select adult:</label>

             <select name="adult" id="adult" class="form-select" >
             	<option selected>Select adult</option>
              <option value="1">1</option>
               <option value="2">2</option>

              </select>
              </div>
	<div class="form-group col-md-6">
              <label for="Children">Select Children:</label>

             <select name="children" class="form-select" id="Children" >
             	<option selected>Select Children</option>
              <option value="0">0</option>
              <option value="1">1</option>
               <option value="2">2</option>

              </select><br>

              </div>
             </div>

			<button class="btn btn-primary">Check Availability</button>

		</form>

</div>
</div>
</div>



<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->



<!-- -->
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script> -->

<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.5.1.min.js'); ?>"></script>