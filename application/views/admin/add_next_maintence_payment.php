

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Maintenance Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Payment</li>
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
                <h3 class="card-title">Payment Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
       <form action="<?=base_url()?>Admin/add_maintenance_costumers" enctype="multipart/form-data" method="post" id="contact-form">
            <div class="modal-body">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Customer Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                 <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data->name?>">
                     <input type="hidden" name="user_id" class="form-control" placeholder="Name" value="<?php echo $data->id?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                 <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" value="<?php echo $data->mobile_no?>">
                </div>
              </div>
           
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Project Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file"></i></span>
                  </div>
                  <input type="text" name="project_type" class="form-control" placeholder="Project name" value="<?php echo $data->project_type?>">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Maintenance cost*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
              
                    <?php $pay = $this->am->selectrow('maintenance_costumers',array('user_id'=>$data->id)); 
                             // print_r($res);
                              ?>
                   <?php if(!empty($pay->maintenance_cost))
                   {
                       ?>
                    <input type="text" name="maintenance_cost" class="form-control" placeholder="Total Payment" value="<?php echo $pay->maintenance_cost?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="text" name="maintenance_cost" class="form-control" placeholder="Total Payment" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Payment Received*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-details">D</i></span>
                  </div>
                  <?php if(!empty($pay->payment_received))
                   {
                       ?>
                    <input type="text" name="payment_received" class="form-control" placeholder="Total Payment" value="<?php echo $pay->payment_received?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="text" name="payment_received" class="form-control" placeholder="Total Payment" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Payment date</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                   <?php if(!empty($pay->payment_date))
                   {
                       ?>
                    <input type="date" name="payment_date" class="form-control" placeholder="Total Payment" value="<?php echo $pay->payment_date?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="date" name="payment_date" class="form-control" placeholder="Total Payment" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
            
                   <div class="col-md-3 form-group">
                     <!-- <label for="exampleInputPassword1">Balance</label> -->
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <!-- <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span> -->
                  </div>
                 <?php if(!empty($pay->balance))
                   {
                       ?>
                    <input type="hidden" name="balance" class="form-control" placeholder="t" value="<?php echo $pay->balance ?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="hidden" name="balance" class="form-control" placeholder="" value="">
                         <?php
                   }
                   ?>
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
  