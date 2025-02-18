<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">User Form</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Form</li>
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
            <form action="<?php echo base_url('store-user'); ?>" method="post" >
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="stdName" class="form-label">Student Name <span class="text-danger">*</span>  </label>
                    <input type="text" class="form-control" id="stdName" name="stdName" value="<?php echo set_value('stdName'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('stdName'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="schoolName" class="form-label">School Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="schoolName" name="schoolName" value="<?php echo set_value('schoolName'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('schoolName'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                    <select class="form-control" id="country" name="country" required onchange="getStates(this.value)">
                        <option value="">--select--</option>
                        <?php if (!empty($country)) {
                            foreach ($country as $country) {
                                $selected = (set_value('country') == $country->id) ? 'selected' : '';
                                echo '<option value="'.$country->id.'" '.$selected.'>'.$country->name.'</option>';
                            }
                        } ?>
                    </select>
                    <div class="text-danger"><?php echo form_error('country'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                      <select class="form-control" id="state" name="state" required onchange="getCities(this.value)">
                        <option value="">--select--</option>
                        <?php if (!empty($states)) {
                            foreach ($states as $state) {
                                $selected = (set_value('state') == $state->id) ? 'selected' : '';
                                echo '<option value="'.$state->id.'" '.$selected.'>'.$state->name.'</option>';
                            }
                        } ?>                     
                    </select>
                    <div class="text-danger"><?php echo form_error('state'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">--select--</option>
                        <?php if (!empty($cities)) {
                            foreach ($cities as $city) {
                                $selected = (set_value('city') == $city->id) ? 'selected' : '';
                                echo '<option value="'.$city->id.'" '.$selected.'>'.$city->name.'</option>';
                            }
                        } ?>
                    </select>
                    <div class="text-danger"><?php echo form_error('city'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="branch" class="form-label">Branch <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="branch" name="branch" value="<?php echo set_value('branch'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('branch'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="class" class="form-label">Class <span class="text-danger">*</span></label>
                    <select class="form-control" id="class" name="class" required>
                        <option value="">--select--</option>
                        <option value="1" <?= set_select('class', '1'); ?>>Class 1</option>
                        <option value="2" <?= set_select('class', '2'); ?>>Class 2</option>
                        <option value="3" <?= set_select('class', '3'); ?>>Class 3</option>
                        <option value="4" <?= set_select('class', '4'); ?>>Class 4</option>
                        <option value="5" <?= set_select('class', '5'); ?>>Class 5</option>
                        <option value="6" <?= set_select('class', '6'); ?>>Class 6</option>
                        <option value="7" <?= set_select('class', '7'); ?>>Class 7</option>
                        <option value="8" <?= set_select('class', '8'); ?>>Class 8</option>
                        <option value="9" <?= set_select('class', '9'); ?>>Class 9</option>
                        <option value="10" <?= set_select('class', '10'); ?>>Class 10</option>
                    </select>

                    <div class="text-danger"><?= form_error('class'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="section" class="form-label">Section <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="section" name="section" value="<?php echo set_value('section'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('name'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="userId" class="form-label">User Id <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="userId" name="userId" value="<?php echo set_value('userId'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('userId'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('password'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="mobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mobileNo" name="mobileNo"  value="<?php echo set_value('mobileNo'); ?>" pattern="\d{10}" maxlength="10" minlength="10" title="Mobile number must be exactly 10 digits"  required/>
                    <div class="text-danger"><?php echo form_error('mobileNo'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"  value="<?php echo set_value('email'); ?>" required/>
                    <div class="text-danger"><?php echo form_error('email'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="ageGroup" class="form-label">Age Group <span class="text-danger">*</span></label>
                    <select class="form-control" id="ageGroup" name="ageGroup" required>
                      <option value="">--select--</option>              
                      <option value="CLASS 3-5" <?php echo set_select('ageGroup', 'CLASS 3-5'); ?>>CLASS 3-5 </option>
                      <option value="CLASS 6-8" <?php echo set_select('ageGroup', 'CLASS 6-8'); ?>>CLASS 6-8 </option>
                    </select>

                    <div class="text-danger"><?php echo form_error('ageGroup'); ?></div>
                  </div>
                  <div class="col-md-6">
                      <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                      <select class="form-control" id="status" name="status" required>
                          <option value="">-- Select Status --</option>
                          <option value="1" <?php echo set_select('status', '1'); ?>>Active</option>
                          <option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
                      </select>
                      <div class="text-danger"><?php echo form_error('status'); ?></div>
                  </div>

                  <div class="col-md-12">
                    <label for="remark" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remark" name="remark"><?php echo set_value('remark'); ?></textarea>
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
<link rel="stylesheet" type="text/css"  href="<?= base_url('assets/admin/js/select2.min.css') ?>">
<script src="<?= base_url('assets/admin/js/select2.min.js') ?>"></script>
<script>
  $(document).ready(function() {
      $('#country').select2({
         width: '100%'
      });
  });

  document.getElementById('mobileNo').addEventListener('input', function (e) {
      const value = e.target.value;
      e.target.value = value.replace(/[^0-9]/g, '');
  });


</script>
<script>
  function getStates(countryId) {
      if (countryId) {
          $.ajax({
              url: "<?php echo base_url('get-states'); ?>", 
              type: "POST",
              data: { country_id: countryId },
              success: function(response) {
                  var states = JSON.parse(response);
                  var stateDropdown = $("#state");
                  stateDropdown.empty();
                  stateDropdown.append('<option value="">-- Select State --</option>');

                  $.each(states, function(index, state) {
                      stateDropdown.append('<option value="'+state.id+'">'+state.name+'</option>');
                  });
                  stateDropdown.select2({
                    width: '100%'
                  });
                  $("#city").empty().append('<option value="">-- Select City --</option>');
              }
          });
      }
  }

  function getCities(stateId) {
      if (stateId) {
          $.ajax({
              url: "<?php echo base_url('get-cities'); ?>",
              type: "POST",
              data: { state_id: stateId },
              success: function(response) {
                  var cities = JSON.parse(response);
                  var cityDropdown = $("#city");
                  cityDropdown.empty();
                  cityDropdown.append('<option value="">-- Select City --</option>');

                  $.each(cities, function(index, city) {
                      cityDropdown.append('<option value="'+city.id+'">'+city.name+'</option>');
                  });
                  cityDropdown.select2({
                    width: '100%' // Keep consistent width
                  });
              }
          });
      }
  }
</script>
