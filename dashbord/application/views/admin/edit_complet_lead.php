

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Lead Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Complet Lead</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lead Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
     <form action="<?php echo base_url('Admin/edit_complet_lead/'.$data->id) ?>" enctype="multipart/form-data" method="post" id="contact-form">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Customer Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data->name ?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                   <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" value="<?php echo $data->mobile_no ?>">
                </div>
              </div>
           
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email@gmail.com" value="<?php echo $data->email ?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Project Type*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-type">T</i></span>
                  </div>
                <input type="text" name="project_type" class="form-control" placeholder="Project Type" value="<?php echo $data->project_type ?>">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Project Cost*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-details">D</i></span>
                  </div>
                <input type="text" name="project_cost" class="form-control" placeholder="Project Cost" value="<?php echo $data->project_cost ?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Server Cost</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-location">S</i></span>
                  </div>
                   <input type="text" name="server_cost" class="form-control" placeholder="Server" value="<?php echo $data->server_cost ?>">
                </div>
              </div>

                <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Server Time</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-location">ST</i></span>
                  </div>
                 <select name="server_time" class="form-control" required="" value="<?php echo $data->server_time ?>">
                     <option value="">Select </option>
                      <option value="Monthly">Monthly </option>
                      <option value="Yearly">Yearly </option>
                      
                    </select>
                </div>
              </div>
            
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Maintinace Cost</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="text" name="maintinace" class="form-control" placeholder="Maintinace" value="<?php echo $data->maintinace ?>">
                </div>
              </div>
              </div>     

             <div class="row">
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Maintinace Time*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-budget">B</i></span>
                  </div>
                 <select name="maintinace_time" class="form-control" required="" value="<?php echo $data->maintinace_time ?>">
                     <option value="">Select </option>
                      <option value="Monthly">Monthly </option>
                      <option value="Yearly">Yearly </option>
                      
                    </select>
                </div>
              </div>
            
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Domain Cost*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="domain_cost" class="form-control" placeholder="Domain" value="<?php echo $data->domain ?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Domain Time</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-Stage">S</i></span>
                  </div>
                <select name="domain_time" class="form-control" required="" value="<?php echo $data->domain_time ?>">
                      <option value="">Select </option>
                       <option value="1 Year">1 Year </option>
                        <option value="2 Year">2 Year </option>
                    </select>
                </div>
              </div>
           
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">SMS Cost*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-note">N</i></span>
                  </div>
                   <input type="text" name="sms_cost" class="form-control" placeholder="SMS Cost " value="<?php echo $data->sms_cost ?>">
                </div>
              </div>
          </div>  
               <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Third Party(3rd) Cost*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="third_party" class="form-control" placeholder="3rd Party" value="<?php echo $data->third_party ?>">
                </div>
              </div>
                
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Domain Time</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-Stage">S</i></span>
                  </div>
                <select name="domain_time" class="form-control" required="" value="<?php echo $data->domain_time ?>">
                      <option value="">Select </option>
                       <option value="1 Year">1 Year </option>
                        <option value="2 Year">2 Year </option>
                    </select>
                </div>
              </div>

              <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">SSL</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-Stage">S</i></span>
                  </div>
                 <input type="text" name="web_ssl" class="form-control" placeholder="" value="<?php echo $data->web_ssl ?>">
                </div>
              </div>

            </div>      
        </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  