<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Update Module</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Module</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
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
                       
                        <form action="<?php echo base_url('update-modules'); ?>" method="post" >
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="module" class="form-label">Module Name </label>
                                        <input type="text" class="form-control" id="module" name="module" value="<?php echo !empty($results->module_name)?$results->module_name:''; ?>" required/>
                                        <div class="text-danger"><?php echo form_error('module') ?></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="action" class="form-label">Action</label>
                                        <div class="form-control">
                                            <?php 
                                            if (!empty($actions)) {
                                                $selected_actions = explode(',', $results->action); // Convert stored actions into an array
                                                foreach ($actions as $key) {
                                                    $checked = in_array($key->name, $selected_actions) ? 'checked' : ''; 
                                            ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="action" id="action_<?php echo $key->name; ?>" value="<?php echo $key->name; ?>" <?php echo $checked; ?>>
                                                        <label class="form-check-label" for="action_<?php echo $key->name; ?>">
                                                            <?php echo $key->name; ?>
                                                        </label>
                                                    </div>
                                            <?php 
                                                }
                                            } 
                                            ?>
                                        </div>
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