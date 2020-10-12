
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
            <img class="img-circle" src="upload/users/noimage.png" name="image" width="150" /> 
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('adminName');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Site Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="themes.php"><i class="fa fa-circle-o"></i> Themes</a></li>
            <li><a href="titleslogan.php"><i class="fa fa-circle-o"></i> Title & Slogan</a></li>
            <li><a href="social.php"><i class="fa fa-circle-o"></i> Social Media</a></li>
            <li><a href="copyright.php"><i class="fa fa-circle-o"></i> Copyright</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addpage.php"><i class="fa fa-circle-o"></i> Add New Page</a></li>
            <li><a href="page.php?pageid="><i class="fa fa-circle-o"></i></a></li>


          </ul> 
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i>
            <span>Slider Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addslider.php"><i class="fa fa-circle-o"></i> Add Slider</a></li>
            <li><a href="sliderlist.php"><i class="fa fa-circle-o"></i> View Slider</a></li>
          </ul> 
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Catagory Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addcategory.php"><i class="fa fa-plus"></i> Add Category</a></li>
            <li><a href="viewcategory.php"><i class="fa fa-square"></i> View Categories</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Brand Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addbrand.php"><i class="fa fa-plus"></i> Add Brand</a></li>
            <li><a href="viewbrands.php"><i class="fa fa-square"></i> View Brands</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Post Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addpost.php"><i class="fa fa-plus"></i> Add Post</a></li>
            <li><a href="viewpost.php"><i class="fa fa-square"></i> View Posts</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>User Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- Only admin can add new user start -->
            <li><a href="adduser.php"><i class="fa fa-plus"></i> Add User</a></li>
            <li><a href="viewusers.php"><i class="fa fa-square"></i> View Users</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>