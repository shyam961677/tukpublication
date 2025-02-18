<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Admin Profile</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <?php 
        $disable = '';
        if(!empty($this->uri->segment(1))){
            $disable = 'disabled';
        }
    ?>
    <div class="app-content">
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">             
               
                <div class="col-md-12">
              
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title"></div>
                        </div>
                       
                        <div class="card-body">
                            <div class="row g-3">
                               <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <td><?= $results->name ; ?></td>
                                    </tr>
                                  
                                    <tr>
                                        <th>Email</th>
                                        <td><?= $results->email ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td><?= $results->phone ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td><?= $results->user_type ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Login</th>
                                        <td><?= $results->LastLoggedIn ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <?php echo ($results->status == 1) 
                                                ? '<span class="badge bg-success">Active</span>' 
                                                : '<span class="badge bg-danger">Inactive</span>'; 
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created Date</th>
                                        <td><?= $results->created_at ?></td>
                                    </tr>
                                   

                                    <tr>
                                        <td colspan="2"><a class="btn btn-warning" href="<?= base_url('admin-list') ?>">Back</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
