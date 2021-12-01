<?php if(empty($session->user_name =='')){
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
                    <a class="navbar-brand" href="#pablo"> List Room</a>
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


<table class="table table-bordered table-hover"  id="product">
            <thead>
              <tr>
                <th>Room Type</th>
                <th>Room No.</th>

                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
if (!empty($details)) {
        foreach ($details as $item) {
            ?>
              <tr>
                <td><?php echo $item->room_type; ?></td>
                <td><?php echo $item->room_no; ?></td>

                <td><?php echo $item->price; ?></td>
                <td><?php echo $item->img; ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm edit" href="<?php echo base_url(); ?>/home/add/<?php echo $item->id; ?>"><i class="fa fa-edit"> Edit</i> </a> <a class="btn btn-danger btn-sm delete" type="button" href="<?php echo base_url(); ?>/home/delete/<?php echo $item->id; ?>"><i class=" fa fa-trash-o"> Delete</i></a>
                </td>
              </tr>
              <?php
}
    }
    ?>
            </tbody>
          </table>
        </div>
      </div>

      <?php  }else{
    echo "you are not authorise to access or Login again ";

    ?> <a href="<?php echo base_url('login'); ?>">Login</a> <?php
}