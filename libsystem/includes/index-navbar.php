<header class="main-header" >
  <nav class="navbar navbar-static-top" style="background-color:black!important;border-bottom:3px solid red;">
    <div class="container">
      <div class="navbar-header"><img src="images/logo/logo.png" style="width:60px;height:60px;padding:7px;float:left;">
      <a href="#" class="navbar-brand"><b>NARC LIBRARY</b></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='dashboard.php'>HOME</a></li>
                <li><a href='transaction.php'>TRANSACTION</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#login" class="dropdown-toggle" data-toggle="modal">
            Login
          </a>
          
        </li>
        <li class="dropdown user user-menu">
          
          <a href='admin/index.php'>Admin Login</a>
          
        </li>
      </ul>
    </div>
      
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
<?php include 'includes/login_modal.php'; ?>
<?php include 'includes/profile_modal.php'; ?>