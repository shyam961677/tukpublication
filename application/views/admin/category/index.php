<main class="app-main">
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Category</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Description</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!empty($results)) {
                                      foreach ($results as $key) { ?>
                                <tr>
                                    <td><?php echo $key->name ?></td>
                                    <td><?php echo $key->description ?></td>
                                   
                                    <td>
                                       
                                        <a href="<?php echo base_url('edit-category/' . $key->id); ?>" class=" badge bg-warning" title="Edit"><i class="bi bi-pencil"></i></a>
                                        <a href="<?php echo base_url('delete-category/' . $key->id); ?>" 
                                           class=" badge bg-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                <?php  } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/admin/js/dataTables.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/dataTables.bootstrap5.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/dataTables.buttons.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/buttons.html5.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/js/dataTables.bootstrap5.css') ?>">
<script type="text/javascript">
    new DataTable('#dataTable', {
      layout: {
          topStart: {
              buttons: ['csv', 'excel']
          }
      }
    });
</script>