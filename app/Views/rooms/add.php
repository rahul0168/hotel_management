<?php 

if(empty($session->user_name =='')){
    ?>

 <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                      HMS
                    </a>
                </div>
                <ul class="nav">
                     <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>/Dashboard">
                            <i class="fa fa-plus-square-o"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>/Dashboard/add">
                            <i class="fa fa-plus-square-o"></i>
                            <p>Add Room</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo base_url(); ?>/Dashboard/roomlist">
                            <i class="fa fa-navicon"></i>
                            <p>Room List </p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Add Room</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('login/logout'); ?>">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">


    <span class="d-none alert alert-success mb-3" id="res_message"></span>

    <div class="row">
      <div class="col-md-9">
      	 <?php if ($detail == null) {?>
        <form action="<?php echo base_url('home/save'); ?>" enctype="multipart/form-data" name="room"  method="post" >
<?php } else {?>
        <form action="<?php echo base_url("home/save/$detail->id"); ?>" enctype="multipart/form-data" name="room"  method="post" >
<?php }?>

  <?php echo form_input('name', isset($detail) ? $detail->id : set_value('name'), array('class' => 'form-control', 'required' => 'required', 'id' => 'name'), 'hidden'); ?>

          <div class="form-group">
            <label for="title">Room Type</label>

             <?php echo form_input('room_type', isset($detail) ? $detail->room_type : set_value('room_type'), array('class' => 'form-control', 'required' => 'required', 'id' => 'room_type')); ?>

          </div>
          <div class="form-group">
            <label for="title">Room No</label>

            <?php echo form_input('room_no', isset($detail) ? $detail->room_no : set_value('room_no'), array('class' => 'form-control', 'required' => 'required', 'id' => 'room_no')); ?>

          </div>


          <div class="form-group">
            <label for="email">Price</label>

              <?php echo form_input('price', isset($detail) ? $detail->price : set_value('price'), array('class' => 'form-control', 'required' => 'required', 'id' => 'price')); ?>

          </div>
           <div class="form-group">
            <label for="email">Room Image Upload</label>
            <?php if (isset($detail) && ($detail->img != '')) {
        $required = "";
    } else {
        $required = "required";
    }
    ?>
             <?php echo form_input('roomimg', isset($detail) ? $detail->img : set_value('roomimg'), array('class' => 'form-control', $required => $required, 'id' => 'roomimg'), 'file'); ?>
             <?php if (isset($detail) && ($detail->img != '')) {?>
                        <a href = "<?php echo base_url('public/assets/img/' . $detail->id . '/' . $detail->img); ?>" target="_blank" class="btn btn-link"><?php echo $detail->img; ?></a>
                        <?php }?>

                    </div>
                  <br>
                     <div class="form-group">
                   <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                   </div>

                      </form>
                    </div>

                   </div>

                    </div>
                  </div>
<?php 
       }else{
    echo "you are not authorise to access or Login again ";

    ?> <a href="<?php echo base_url('login'); ?>">Login</a> <?php
}