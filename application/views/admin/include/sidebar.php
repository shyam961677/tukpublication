<style type="text/css">
  .nav-treeview{
    padding-left: 15px !important;
    background-color: #000 !important;
  }

  table {
      width: 100%; 
      border-collapse: collapse;
      table-layout: auto; 
  }

  td, th {
      padding: 8px; 
      word-wrap: break-word; 
      white-space: nowrap;
  }
  .sidebar-wrapper .sidebar-menu > .nav-item.menu-open > .nav-link, .sidebar-wrapper .sidebar-menu > .nav-item:hover > .nav-link, .sidebar-wrapper .sidebar-menu > .nav-item > .nav-link:focus {
    color: var(--lte-sidebar-hover-color);
    background-color: rgb(13 110 253 / 90%);

}
</style>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="<?= base_url('admin-dashboard') ?>" class="brand-link">
      <!-- <img
        src="../../dist/assets/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow"
      /> -->
 
      <span class="brand-text fw-light">The Ultimate Knowlwdge</span>
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
        <li class="nav-item <?php echo ($this->uri->segment(1) == 'admin-dashboard') ? 'menu-open' : ''; ?>">
          <a href="<?php echo base_url('admin-dashboard') ?>" class="nav-link ">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Dashboard
            </p>
          </a>                
        </li>
    
        <?php if (check_permission('Admin', ucfirst('list'))) {
          $adminArr  =['admin-list','create-admin','store-admin','edit-admin','delete-admin','show-admin'];
        ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$adminArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-person"></i>
            <p>
              Admin
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin-list') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <?php if (check_permission('admins', ucfirst('add'))) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('create-admin') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Create</p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>
      <?php } if (check_permission('Users', ucfirst('list'))) {
          $userArr  =['user-list','create-user','store-user','edit-user','delete-user','show-user','import-user'];
        ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$userArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-people"></i>
            <p>
              Users
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('user-list') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <?php if (check_permission('Users', ucfirst('add'))) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('create-user') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Create</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('import-user') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Import</p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>
      <?php }  if (check_permission('Articles', ucfirst('list'))) {
          $articlesArr  =['articles-list','articles-create','edit-articles'];
        ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$articlesArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-basket-fill"></i>
            <p>
              Articles
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('articles-list') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <?php if (check_permission('Articles', ucfirst('add'))) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('articles-create') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Create</p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>              
      <li class="nav-header">MASTERS</li>
        <?php if (check_permission('Role', ucfirst('list'))) {  
          $roleArr  =['user-role','create-role','store-role','edit-role','delete-role','update-role'];
        ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$roleArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-menu-button"></i>
            <p>
              Role
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('user-role') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <?php if (check_permission('Role', ucfirst('add'))) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('create-role') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Create</p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>
      <?php }  $modulesArr  =['modules-list','create-modules','store-modules','edit-modules','delete-modules','update-modules'];
        ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$modulesArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-menu-button"></i>
            <p>
              Modules
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('modules-list') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('create-modules') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li>
        <?php 
          $permissionArr  =['action-list','create-action','store-action','edit-action','delete-action','update-action'];
        ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$permissionArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link ">
            <i class="nav-icon bi bi-menu-button"></i>
            <p>
              Actions
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('action-list') ?>" class="nav-link ">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('create-action') ?>" class="nav-link ">
                <i class="nav-icon bi bi-circle"></i>
                <p>
                  Create 
                </p>
              </a>                    
            </li>                  
          </ul>
        </li>
        <?php  $categoryArr  =['category-list','category-create']; ?>
        <li class="nav-item <?php echo (!empty($this->uri->segment(1)) && in_array($this->uri->segment(1),$categoryArr) ) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-menu-button"></i>
            <p>
              Category
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('category-list') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('category-create') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?php echo ($this->uri->segment(2) == 'logout') ? 'menu-open' : ''; ?>">
          <a href="<?php echo base_url('admin-logout') ?>" class="nav-link ">
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