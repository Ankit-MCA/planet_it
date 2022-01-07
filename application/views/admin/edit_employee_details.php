

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
                        <form action="<?php echo base_url('Admin/edit_employee_detaild/'.$data->id) ?>" enctype="multipart/form-data" method="post"> 
                <div class="card-body">
                   <div class="row">
                     <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Employee No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-no">N</i></span>
                  </div>
                  <input type="text" name="employee_no" required="" value="<?php echo $data->employee_no ?>"class="form-control" placeholder="">
                </div>
              </div>
                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="name" required="" class="form-control" value="<?php echo $data->name ?>" placeholder="Name">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="mobile_no" required="" value="<?php echo $data->mobile_no ?>" class="form-control" placeholder="Mobile no">
                </div>
              </div>
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Other Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="other_no" required="" value="<?php echo $data->other_no ?>" class="form-control" placeholder="Email">
                </div>
              </div>
              
            </div>   


            
            
            
             <div class="row">
                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">DOB*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="text" name="dob" value="<?php echo $data->dob ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Father's Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-address">N</i></span>
                  </div>
                  <input type="text" name="father_name" value="<?php echo $data->father_name ?>" required="" class="form-control" placeholder="">
                </div>
              </div>

                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Mother's Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="mother_name" required="" value="<?php echo $data->mother_name ?>" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Correspondence Address</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-bank">A</i></span>
                  </div>
                  <input type="text" name="address2" value="<?php echo $data->address2 ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
            </div>
            



             <div class="row">
                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Permanent Address*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">D</i></span>
                  </div>
                  <input type="text" name="address" value="<?php echo $data->address ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Qualification</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-address">A</i></span>
                  </div>
                  <input type="text" name="qulification" value="<?php echo $data->qulification ?>" required="" class="form-control" placeholder="">
                </div>
              </div>

                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Date Of Joining</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" name="date_of_joining" required="" value="<?php echo $data->date_of_joining ?>" class="form-control" placeholder="">
                </div>
              </div>
              
               <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Designation*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">D</i></span>
                  </div>
                  <input type="text" name="designation" value="<?php echo $data->designation ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
            </div>
            
            
            
            
            
            

             <div class="row">
                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Pan No*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">P.N</i></span>
                  </div>
                  <input type="text" name="pan_no" value="<?php echo $data->pan_no ?>"  class="form-control" placeholder="">
                </div>
              </div>
           
                   <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Aadhar No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="aadhar_no"  value="<?php echo $data->aadhar_no ?>" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Bank Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-bank">B</i></span>
                  </div>
                  <input type="text" name="bank_name" value="<?php echo $data->bank_name ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Account No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="account_no"  value="<?php echo $data->account_no ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
            </div>

             <div class="row">
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">IFSC Code</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-no">C</i></span>
                  </div>
                  <input type="text" name="ifsc_code" value="<?php echo $data->ifsc_code ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
                     <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Salary</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">s</i></span>
                  </div>
                  <input type="text" name="salary" value="<?php echo $data->salary ?>" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Salary Increment</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="text" name="incriment" value="<?php echo $data->incriment ?>"  class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Date Of Increment</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" name="date_incriment" value="<?php echo $data->date_incriment ?>"  class="form-control" placeholder="">
                </div>
              </div>
            </div>  





             <div class="row">
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="email" required="" value="<?php echo $data->email ?>" class="form-control" placeholder="Email">
                </div>
              </div>
                     <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Password</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="text" name="password" value="<?php echo $data->password ?>" required="" class="form-control" placeholder="Mobile no">
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
  