<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>dashboard" class="brand-link">
      <img src="<?=base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MLT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">OneThing</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url() ?>dashboard" class="nav-link <?php if($menu_active=="dashboard"){?>active<?php }?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
            
          </li>

          <li class="nav-header">Organization</li>
          <li class="nav-item <?php if($menu_open=="employees"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Order Details
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>org/orderdetails" class="nav-link <?php if($menu_active=="orderdetails"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Details</p>
                </a>
              </li>
</ul>
</li>

          
          <li class="nav-item <?php if($menu_open=="employees"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employees
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>org/employee-directory" class="nav-link <?php if($menu_active=="employee-directory"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Directory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>org/employee-onboarding" class="nav-link <?php if($menu_active=="employee-onboarding"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Onboarding</p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="<?php echo base_url() ?>org/employee-settings" class="nav-link <?php if($menu_active=="employee-settings"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Settings</p>
                </a>
              </li>
             
              <!-- <li class="nav-item">
                <a href="<?php echo base_url() ?>org/employee-assets" class="nav-link <?php if($menu_active=="employee-assets"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assets</p>
                </a>
              </li> -->
              
            </ul>
          </li>
          <li class="nav-item <?php if($menu_open=="employees"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
            Customer Details
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>org/viewcustomer" class="nav-link <?php if($menu_active=="viewcustomers"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer Details</p>
                </a>
              </li>
</ul>
</li>





          
          <li class="nav-header">Item Management</li>
          
           <li class="nav-item <?php if($menu_open=="items"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Items
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>items/item-list" class="nav-link <?php if($menu_active=="item-list"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>items/item-onboarding" class="nav-link <?php if($menu_active=="item-onboarding"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Onboarding</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url() ?>items/item-settings" class="nav-link <?php if($menu_active=="item-settings"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Settings</p>
                </a>
              </li>
            </ul>



            <li class="nav-header">Settings</li>
          
           <li class="nav-item <?php if($menu_open=="couponR"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Coupons
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!--
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/coupons" class="nav-link <?php if($menu_active=="coupons"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupons</p>
                </a>
              </li>
-->
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/coupon" class="nav-link <?php if($menu_active=="coupon"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupon</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/viewcoupon" class="nav-link <?php if($menu_active=="viewcoupon"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Coupon</p>
                </a>
              </li>
              </ul>
          
              <li class="nav-item <?php if($menu_open=="timing"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Time Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            

              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/timeslots" class="nav-link <?php if($menu_active=="timeslots"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Time Slots</p>
                </a>
              </li>
              
              
              </ul>
              <li class="nav-item <?php if($menu_open=="packages"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Package
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/package" class="nav-link <?php if($menu_active=="package"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/viewpackage" class="nav-link <?php if($menu_active=="viewpackage"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Package</p>
                </a>
              </li>
              
              </ul>


              <li class="nav-item <?php if($menu_open=="menu"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
            <!--  <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/orderdetails" class="nav-link <?php if($menu_active=="orderdetails"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Details</p>
                </a>
              </li>-->
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/giftacart" class="nav-link <?php if($menu_active=="giftacart"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gift A Cart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/corporate" class="nav-link <?php if($menu_active=="corporate"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Corporate Tie Up List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/party" class="nav-link <?php if($menu_active=="party"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Party Time Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/ratingdetails" class="nav-link <?php if($menu_active=="ratingdetails"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rating Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/win" class="nav-link <?php if($menu_active=="win"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Win</p>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/subscription" class="nav-link <?php if($menu_active=="subscription"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subscription</p>
                </a>
              </li>
             
              </ul>
              <li class="nav-item <?php if($menu_open=="testnominals"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Testimonials
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/customer" class="nav-link <?php if($menu_active=="customer"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/viewtestimonials" class="nav-link <?php if($menu_active=="viewtestimonials"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Testimonials</p>
                </a>
              </li>
              
              </ul>
              <li class="nav-item <?php if($menu_open=="testnominals"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              FAQ'S
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/faq1" class="nav-link <?php if($menu_active=="faq"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ'S</p>
                </a>
              </li>
</ul>
<li class="nav-item <?php if($menu_open=="testnominals"){?>menu-open<?php }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Refund Information
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/refund" class="nav-link <?php if($menu_active=="refund"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Refund</p>
                </a>
              </li>
</ul>
<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/viewrefund" class="nav-link <?php if($menu_active=="viewrefund"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Refund</p>
                </a>
              </li>
</ul>
              <li class="nav-item">
            <a href="<?php echo base_url() ?>settings/vehicle" class="nav-link <?php if($menu_active=="vehicles"){?>active<?php }?>">
              <i class="nav-icon far fa-image"></i>
              <p>
                Vehicles
              </p>
            </a>
          </li>
          <!-- <li class="nav-item <?php if($menu_open=="testnominals"){?>menu-open<?php }?>"> -->
            <!-- <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Testimonials
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/customer" class="nav-link <?php if($menu_active=="customer"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>settings/viewtestimonials" class="nav-link <?php if($menu_active=="viewtestimonials"){?>active<?php }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Testimonials</p>
                </a>
              </li>
              
              </ul> -->
          
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>