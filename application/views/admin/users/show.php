<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">User Profile</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                                            <th>Full Name</th>
                                            <td><?= $results->fullname ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>User ID</th>
                                            <td><?= $results->userid ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $results->email ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td><?= $results->mob ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>School Name</th>
                                            <td><?= $results->sclname ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Branch</th>
                                            <td><?= $results->branch ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Class</th>
                                            <td><?= $results->class_id ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Section</th>
                                            <td><?= $results->section ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td><?= !empty(get_country_id($results->country)->name)?get_country_id($results->country)->name:''; ?></td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td><?= !empty(get_state_id($results->state)->name)?get_state_id($results->state)->name:''; ?></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td><?= !empty(get_city_id($results->city)->name)?get_city_id($results->city)->name:''; ?></td>
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
                                            <td><?php echo ($results->created_date ?? ''); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Activated By</th>
                                            <td><?= !empty(get_admin_id($results->activated_by)->name)?get_admin_id($results->activated_by)->name:''; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Remarks</th>
                                            <td><?= $results->remarks ; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"><a class="btn btn-warning" href="<?= base_url('user-list') ?>">Back</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>

</script>