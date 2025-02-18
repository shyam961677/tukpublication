<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Update Role</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Role</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row g-4">
        <?php 
          if (!empty($this->session->flashdata('error'))) {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$this->session->flashdata('error').'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
          
          ?>
        <div class="col-md-12">
          <div class="card card-info card-outline mb-4">
            <div class="card-header">
              <div class="card-title"></div>
            </div>
            <form action="<?php echo base_url('update-role'); ?>" method="post" >
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role" 
                      value="<?php echo !empty($results->role) ? $results->role : ''; ?>" required />
                    <div class="text-danger"><?php echo form_error('role'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <div class="form-control">
                      <div class="form-check d-inline-block">
                        <input class="form-check-input" type="radio" name="status" id="active" value="1" <?= (!empty($results->status) && $results->status == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="active">Active</label>
                      </div>
                      &emsp;
                      <div class="form-check d-inline-block ml-3">
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?= (($results->status !='') && $results->status == 0) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="inactive">Inactive</label>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="card-footer">
                <input type="hidden" name="id" value="<?php echo !empty($results->id) ? $results->id : ''; ?>">
                <button class="btn btn-info" type="submit">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

