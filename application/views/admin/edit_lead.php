

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Lead</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Lead</li>
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
             <form action="<?php echo base_url('Admin/edit_lead/').$res->id ?>" enctype="multipart/form-data" method="post" id="contact-form">
                
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Customer Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $res->name?>">
                       <input type="hidden" name="lead_id" class="form-control" placeholder="Name" value="<?php echo $res->id?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" value="<?php echo $res->mobile_no?>">
                </div>
              </div>
          
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email@gmail.com" value="<?php echo $res->email?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Other Contact No*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="other_no" class="form-control" placeholder="Other Contact No" value="<?php echo $res->other_no?>">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Enquiry Details*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-details">D</i></span>
                  </div>
                 <input type="text" name="enquiry" class="form-control" placeholder="Enquiry" value="<?php echo $res->enquiry?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Location</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-location">L</i></span>
                  </div>
                   <input type="text" name="location" class="form-control" placeholder="Location" value="<?php echo $res->location?>">
                   <input type="hidden" name="today_date" class="form-control" placeholder="Date" readonly="" value="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
          
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Follow Up Date*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="Date" name="follow_up_date" class="form-control" placeholder="Date" value="<?php echo $res->follow_up_date ?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Budget</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-budget">B</i></span>
                  </div>
                  <input type="text" name="budget" class="form-control" placeholder="Budget" value="<?php echo $res->budget?>">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Reference  By*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                 <input type="text" name="refer_by" class="form-control" placeholder="Reference " value="<?php echo $res->refer_by?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Stage</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-Stage">S</i></span>
                  </div>
            <select name="stage" class="form-control" required="" >
            <option value="">Select stage</option>
             <option value="Meeting Done">Meeting Done</option>
              <option value="Sale Done">Sale Done</option>
              <option value="Not Interested">Not Interested</option>
              <option value="Follow Up">Follow Up</option>
              <option value="Other requirement">Other requirement</option>
              <option value="Not Contact">Not Contact</option>
                  </select><br>
                </div>
              </div>
          
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Remarks</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-note">N</i></span>
                  </div>
                  <textarea class="form-control" name="remarks" rows="1"><?php echo $res->remarks?></textarea>
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
  