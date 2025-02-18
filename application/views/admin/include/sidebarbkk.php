      <?php 

        $permissions ='';$user_role ='';
          if (!empty($this->session->userdata('logged_in'))) {
            $user_role =   $this->session->userdata('user_role');
            $permissions = get_role_permissions_by_id($user_role);
          }


          if (!empty($permissions)) {
            $permissions = explode(',', $permissions->permission_id);
          }
      ?>
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="<?php echo base_url('home') ?>" class="brand-link">
            <img
              src="<?php echo base_url('assets/admin/dist/assets/img/AdminLTELogo.png')?>"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light" title="The Ultimate Knowledge (TUK)">TUK</span>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item <?php echo ($this->uri->segment(1) == 'home') ? 'menu-open' : ''; ?>">
                <a href="<?php echo base_url('home') ?>" class="nav-link ">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  </p>
                </a>                
              </li>

              <?php if (($user_role==1) || (!empty($permissions) && in_array(4, $permissions))) {
                $userArr  =['user-list','create-user','store-user','edit-user','delete-user','show-user'];
              ?>
              <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$userArr) ) ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link ">
                  <i class="nav-icon bi bi-person"></i>
                  <p>
                    Users
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('user-list') ?>" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('create-user') ?>" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>
                        Create
                      </p>
                    </a>                    
                  </li>
                  
                </ul>
              </li>
              <?php  } ?>

              <li class="nav-header">MASTERS</li>              
              <?php if (($user_role==1) || (!empty($permissions) && in_array(8, $permissions))) { 
                $roleArr  =['user-type','create-user-type','store-user-type','edit-user-type','delete-user-type','update-user-type'];
              ?>
              <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$roleArr) ) ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle-fill"></i>
                  <p>
                    Role
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('user-type') ?>" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('create-user-type') ?>" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>
                        Create 
                      </p>
                    </a>                    
                  </li>
                  
                </ul>
              </li>
            <?php } if (($user_role==1) || (!empty($permissions) && in_array(11, $permissions))) { 
              $permissionArr  =['permissions-list','create-permissions','store-permissions','edit-permission','delete-permission','update-permission'];
            ?>
              <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$permissionArr) ) ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link ">
                  <i class="nav-icon bi bi-circle-fill"></i>
                  <p>
                    Modules
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('permissions-list') ?>" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('create-permissions') ?>" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>
                        Create 
                      </p>
                    </a>                    
                  </li>                  
                </ul>
              </li>
            <?php } ?>
              <li class="nav-item <?php echo ($this->uri->segment(2) == 'logout') ? 'menu-open' : ''; ?>">
                <a href="<?php echo base_url('login/logout') ?>" class="nav-link ">
                  <i class="nav-icon bi bi-box-arrow-right"></i>
                  <p>
                    Logout
                  </p>
                </a>                
              </li>

            </ul>
          </nav>
        </div>
      </aside>
