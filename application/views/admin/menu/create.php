<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Create Menu</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Menu</li>
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
                       
                        <form action="<?php echo base_url('store-menu'); ?>" method="post">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title'); ?>" required/>
                                        <div class="text-danger"><?php echo form_error('title'); ?></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="url" class="form-label">URL</label>
                                        <input type="text" class="form-control" id="url" name="url" value="<?php echo set_value('url'); ?>" required/>
                                        <div class="text-danger"><?php echo form_error('url'); ?></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="parent_id" class="form-label">Parent Menu</label>
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option value="">--select--</option>
                                            <?php if (!empty($menus)): ?>
                                                <?php foreach ($menus as $key): ?>
                                                    <option value="<?php echo $key->id; ?>" 
                                                        <?php echo set_select('parent_id', $key->id, set_value('parent_id') == $key->id ? TRUE : FALSE); ?>>
                                                        <?php echo !empty($key->title)?$key->title:''; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option value="" disabled>No Parent Menu Available</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?php echo set_value('icon'); ?>" required/>
                                        <div class="text-danger"><?php echo form_error('icon'); ?></div>
                                    </div>

                                <div class="col-md-12">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="number" class="form-control" id="position" name="position" value="<?php echo set_value('position'); ?>" required />
                                    <div class="text-danger"><?php echo form_error('position'); ?></div>
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