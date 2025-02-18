<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Articles Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Articles Form</li>
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
                       
                        <form action="<?php echo base_url('articles-store'); ?>" method="post" >
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title'); ?>" required/>
                                        <div class="text-danger"><?php echo form_error('title'); ?></div>
                                    </div> 

                                    <div class="col-md-12">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control" id="content" name="content" ><?php echo set_value('content'); ?></textarea>
                                        <div class="text-danger"><?php echo form_error('content'); ?></div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button class="btn btn-info " type="submit">Submit</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
