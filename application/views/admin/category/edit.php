<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Category Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category Form</li>
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
                            <div class="card-title"></div>
                        </div>
                       
                        <form action="<?php echo base_url('category-update'); ?>" method="post">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" value="<?php echo !empty($results->name)?$results->name:''; ?>" required/>
                                        <div class="text-danger"><?php echo form_error('category'); ?></div>
                                    </div> 

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" ><?php echo !empty($results->description)?$results->description:''; ?></textarea>
                                        <div class="text-danger"><?php echo form_error('description'); ?></div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-footer ">
                                <input type="hidden" name="id" value="<?php echo !empty($results->id)?$results->id:''; ?>">
                                <button class="btn btn-info " type="submit">Submit</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
