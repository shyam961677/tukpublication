
<main class="app-main">
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Users List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                        <table id="dataTable" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Age Group</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>School</th>
                                    <th>Class</th>
                                    <th>Section</th>                                    
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php if (!empty($results) && is_array($results)) : ?>
                                    <?php foreach ($results as $key) : ?>
                                        <tr>
                                            <td><?= $key->fullname; ?></td>
                                            <td><?= $key->userid; ?></td>
                                            <td><?= $key->ageGroup; ?></td>
                                            <td><?= $key->email; ?></td>
                                            <td><?= $key->mob; ?></td>
                                            <td><?= $key->sclname; ?></td>
                                            <td><?= $key->class_id; ?></td>
                                            <td><?= $key->section; ?></td>
                                            
                                            <td>
                                                <?php echo ($key->status == 1) 
                                                    ? '<span class="badge bg-success">Active</span>' 
                                                    : '<span class="badge bg-danger">Inactive</span>'; 
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php if (check_permission('Users', ucfirst('view'))) { ?>
                                                    <a href="<?php echo base_url('show-user/' . $key->id); ?>" class=" badge bg-primary" title="Show"><i class="bi bi-eye"></i></a>

                                                <?php } if (check_permission('Users', ucfirst('Edit'))){ ?>
                                                    <a href="<?php echo base_url('edit-user/' . $key->id); ?>" class=" badge bg-warning" title="Edit"><i class="bi bi-pencil"></i></a>

                                                <?php } if (check_permission('Users', ucfirst('delete'))){ ?>
                                                    <a href="<?php echo base_url('delete-user/' . $key->id); ?>" class=" badge bg-danger" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete"><i class="bi bi-trash"></i></a>
                                               <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                             
                                <?php endif; ?>
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