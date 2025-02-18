
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Update User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update User</li>
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
            <form action="<?php echo base_url('update-user'); ?>" method="post" >
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="stdName" class="form-label">Student Name <span class="text-danger">*</span>  </label>
                    <input type="text" class="form-control" id="stdName" name="stdName" value="<?php echo  !empty('$results->fullname')?$results->fullname:'' ?>" required/>
                    <div class="text-danger"><?php echo form_error('stdName'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="schoolName" class="form-label">School Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="schoolName" name="schoolName" value="<?php echo  !empty('$results->sclname')?$results->sclname:'' ?>" required/>
                    <div class="text-danger"><?php echo form_error('schoolName'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                    <select class="form-control" id="country" name="country" required onchange="getStates(this.value)">
                        <option value="">--select--</option>
                        <?php if (!empty($countries)) {
                            foreach ($countries as $country) { ?>
                            <option value="<?= $country->id ?>" <?= set_select('country', $country->id, isset($results) && $results->country == $country->id); ?>>
                                <?= $country->name ?>
                            </option>
                        <?php } } ?>
                    </select>
                    <div class="text-danger"><?php echo form_error('country'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                      <select class="form-control" id="state" name="state" required onchange="getCities(this.value)">
                        <option value="">--select--</option>
                        <?php foreach ($states as $state) { ?>
                            <option value="<?= $state->id ?>" <?= set_select('state', $state->id, isset($results) && $results->state == $state->id); ?>>
                                <?= $state->name ?>
                            </option>
                        <?php } ?>                 
                    </select>
                    <div class="text-danger"><?php echo form_error('state'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">--select--</option>
                       <?php foreach ($cities as $city) { ?>
                            <option value="<?= $city->id ?>" <?= set_select('city', $city->id, isset($results) && $results->city == $city->id); ?>>
                                <?= $city->name ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div class="text-danger"><?php echo form_error('city'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="branch" class="form-label">Branch <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="branch" name="branch" value="<?php echo  !empty('$results->branch')?$results->branch:'' ?>" required/>
                    <div class="text-danger"><?php echo form_error('branch'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="class" class="form-label">Class <span class="text-danger">*</span></label>
                    <select class="form-control" id="class" name="class" required>
                        <option value="">--select--</option>
                        <option value="1" <?= (!empty('$results->class_id') && $results->class_id=='1'?'selected':'') ?>>Class 1</option>
                        <option value="2" <?= (!empty('$results->class_id') && $results->class_id=='2'?'selected':'') ?>>Class 2</option>
                        <option value="3" <?= (!empty('$results->class_id') && $results->class_id=='3'?'selected':'') ?>>Class 3</option>
                        <option value="4" <?= (!empty('$results->class_id') && $results->class_id=='4'?'selected':'') ?>>Class 4</option>
                        <option value="5" <?= (!empty('$results->class_id') && $results->class_id=='5'?'selected':'') ?>>Class 5</option>
                        <option value="6" <?= (!empty('$results->class_id') && $results->class_id=='6'?'selected':'') ?>>Class 6</option>
                        <option value="7" <?= (!empty('$results->class_id') && $results->class_id=='7'?'selected':'') ?>>Class 7</option>
                        <option value="8" <?= (!empty('$results->class_id') && $results->class_id=='8'?'selected':'') ?>>Class 8</option>
                        <option value="9" <?= (!empty('$results->class_id') && $results->class_id=='9'?'selected':'') ?>>Class 9</option>
                        <option value="10" <?= (!empty('$results->class_id') && $results->class_id=='10'?'selected':'') ?>>Class 10</option>
                    </select>

                    <div class="text-danger"><?= form_error('class'); ?></div>
                  </div>
                  <div class="col-md-4">
                    <label for="section" class="form-label">Section <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="section" name="section" value="<?php echo  !empty('$results->section')?$results->section:'' ?>" required/>
                    <div class="text-danger"><?php echo form_error('name'); ?></div>
                  </div>
               <!--    <div class="col-md-6">
                    <label for="userId" class="form-label">User Id <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="userId" name="userId" value="<?php //echo  !empty('$results->userid')?$results->userid:'' ?>" required/>
                    <div class="text-danger"><?php //echo form_error('userId'); ?></div>
                  </div> -->
                  
                  <div class="col-md-6">
                    <label for="mobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mobileNo" name="mobileNo"  value="<?php echo  !empty('$results->mob')?$results->mob:'' ?>" pattern="\d{10}" maxlength="10" minlength="10" title="Mobile number must be exactly 10 digits" required/>
                    <div class="text-danger"><?php echo form_error('mobileNo'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"  value="<?php echo  !empty('$results->email')?$results->email:'' ?>" required/>
                    <div class="text-danger"><?php echo form_error('email'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="ageGroup" class="form-label">Age Group <span class="text-danger">*</span></label>
                    <select class="form-control" id="ageGroup" name="ageGroup" required>
                      <option value="">--select--</option>                   
                      <option value="CLASS 3-5" <?= (!empty($results->ageGroup) && $results->ageGroup=='CLASS 3-5')?'selected':'' ?>>CLASS 3-5 </option>
                      <option value="CLASS 6-8" <?= (!empty($results->ageGroup) && $results->ageGroup=='CLASS 6-8')?'selected':'' ?>>CLASS 6-8 </option>
                    </select>

                    <div class="text-danger"><?php echo form_error('ageGroup'); ?></div>
                  </div>
                  <div class="col-md-6">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">-- Select Status --</option>
                        <option value="1" <?= (!empty($results->status) && $results->status=='1')?'selected':''  ?>>Active</option>
                        <option value="0" <?= (($results->status !='') && $results->status=='0')?'selected':''  ?>>Inactive</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="remark" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remark" name="remark"><?php echo  !empty('$results->remarks')?$results->remarks:'' ?></textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <input type="hidden" name="id" value="<?php echo  !empty('$results->id')?$results->id:'' ?>">
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
<script type="text/javascript">
  document.getElementById('mobileNo').addEventListener('input', function (e) {
      const value = e.target.value;
      e.target.value = value.replace(/[^0-9]/g, '');
  });


 $(document).ready(function() {
      $('#country,#state,#city').select2({
         width: '100%'
      });
  });

$(document).ready(function () {
    function getStates(countryId) {
        if (countryId) {
            $.ajax({
                url: "<?= base_url('get-states'); ?>",
                type: "POST",
                data: { country_id: countryId },
                success: function (response) {
                    var states = JSON.parse(response);
                    var stateDropdown = $("#state");
                    stateDropdown.empty().append('<option value="">-- Select State --</option>');

                    $.each(states, function (index, state) {
                        stateDropdown.append('<option value="' + state.id + '">' + state.name + '</option>');
                    });


                    $("#city").empty().append('<option value="">-- Select City --</option>');
                }
            });
        }
    }

    function getCities(stateId) {
        if (stateId) {
            $.ajax({
                url: "<?= base_url('get-cities'); ?>",
                type: "POST",
                data: { state_id: stateId },
                success: function (response) {
                    var cities = JSON.parse(response);
                    var cityDropdown = $("#city");
                    cityDropdown.empty().append('<option value="">-- Select City --</option>');

                    $.each(cities, function (index, city) {
                        cityDropdown.append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                }
            });
        }
    }

    $("#country").change(function () {
        getStates($(this).val());
    });

    $("#state").change(function () {
        getCities($(this).val());
    });

    // Preload states and cities if editing
    var selectedCountry = "<?= isset($user) ? $user->country : '' ?>";
    var selectedState = "<?= isset($user) ? $user->state : '' ?>";
    var selectedCity = "<?= isset($user) ? $user->city : '' ?>";

    if (selectedCountry) {
        getStates(selectedCountry);
        setTimeout(() => $("#state").val(selectedState).change(), 1000);
    }
    if (selectedState) {
        getCities(selectedState);
        setTimeout(() => $("#city").val(selectedCity), 1500);
    }
});
</script>
