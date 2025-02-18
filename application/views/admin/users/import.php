
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Import User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Import User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <?php 
          if (!empty($this->session->flashdata('success'))) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$this->session->flashdata('success').'  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
          
          if (!empty($this->session->flashdata('error'))) {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$this->session->flashdata('error').'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
          
          ?>
        <div class="col-md-12">
          <div class="card card-info card-outline mb-4">
            <div class="card-header">
           <div class="card-title float-end">
              <a class="btn btn-sm btn-warning " href="<?= base_url('uploads/import-users.csv') ?>" download><i class="bi bi-file-earmark-spreadsheet"></i> </i>Download sample</a>
          </div>
            </div>
            <form action="<?php echo base_url('import-store'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="row g-3">                 
                      <div class="col-md-12">
                          <label for="csv_file" class="form-label">Import CSV <span class="text-danger"><small>(Only CSV files are accepted)</small></span></label>
                          <input type="file" name="csv_file" id="csv_file" accept=".csv" required class="form-control">
                      </div>
                  </div>
              </div>
              <div class="card-footer">
                  <button class="btn btn-info" type="submit">Submit</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


