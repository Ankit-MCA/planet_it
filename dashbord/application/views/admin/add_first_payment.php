

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment Details</h1>
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
      <form action="<?php echo base_url('Admin/edit_payment_details/'.$data->id) ?>" enctype="multipart/form-data" method="post">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Customer Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                 <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data->name?>">
                     <input type="hidden" name="user_id" class="form-control" placeholder="Name" value="<?php echo $data->id?>">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                 <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" value="<?php echo $data->mobile_no?>">
                </div>
              </div>
            </div>
            <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Project Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file"></i></span>
                  </div>
                  <input type="text" name="project_type" class="form-control" placeholder="Project name" value="<?php echo $data->project_type?>">
                </div>
              </div>
              <?php $p_cost=$data->project_cost;
                         
                                if(!empty($p_cost))
                               {
                                   $project_cost=$p_cost;
                               }
                               else{
                                   $project_cost=0;
                               }
                         
                               $m_cost=$data->maintinace;
                                if(!empty($m_cost))
                               {
                                   $maintinace_cost=$m_cost;
                               }
                               else{
                                   $maintinace_cost=0;
                               }
                               
                               $d_cost=$data->domain;
                                if(!empty($d_cost))
                               {
                                   $domain_cost=$d_cost;
                               }
                               else{
                                   $domain_cost=0;
                               }
                               $s_cost=$data->server_cost;
                                if(!empty($s_cost))
                               {
                                   $server_cost=$s_cost;
                               }
                               else{
                                   $server_cost=0;
                               }
                               $e_cost=$data->email_cost;
                                if(!empty($e_cost))
                               {
                                   $email_cost=$e_cost;
                               }
                               else{
                                   $email_cost=0;
                               }
                
                               $sms_cost=$data->sms_cost;
                                if(!empty($sms_cost))
                               {
                                   $sms=$sms_cost;
                               }
                               else{
                                   $sms=0;
                               }
                               $t_cost=$data->third_party;
                               if(!empty($t_cost))
                               {
                                   $third_party=$t_cost;
                               }
                               else{
                                   $third_party=0;
                               }     
                  $total_cost=$project_cost + $maintinace_cost + $domain_cost + $server_cost + $email_cost + $sms + $third_party;

                         ?>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Total Payment*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
              
                    <?php $pay = $this->am->selectrow('payment_details',array('user_id'=>$data->id)); 
                          
                              ?>
                    <input type="text" name="total_payment" class="form-control" placeholder="Total Payment" value="<?php echo $total_cost?>">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Payment Received*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-details">D</i></span>
                  </div>
                  <?php if(!empty($pay->payment_received))
                   {
                       ?>
                    <input type="text" name="payment_received" class="form-control" placeholder="" value="<?php echo $pay->payment_received?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="text" name="payment_received" class="form-control" placeholder="" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Payment date</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <?php if(!empty($pay->payment_date))
                   {
                       ?>
                    <input type="date" name="payment_date" class="form-control" placeholder="" value="<?php echo $pay->payment_date?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="date" name="payment_date" class="form-control" placeholder="" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
            </div>     


             <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Payment Mode*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <?php if(!empty($pay->payment_mode))
                   {
                       ?>
                    <input type="text" name="payment_mode" class="form-control" placeholder="" value="<?php echo $pay->payment_mode?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="text" name="payment_mode" class="form-control" placeholder="" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Transection no.*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-budget">T</i></span>
                  </div>
                  <?php if(!empty($pay->transection_no))
                   {
                       ?>
                    <input type="text" name="transection_no" class="form-control" placeholder="" value="<?php echo $pay->transection_no?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="text" name="transection_no" class="form-control" placeholder="" value="">
                         <?php
                   }
                   ?>
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Balance</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                  </div>
                 <?php if(!empty($pay->balance))
                   {
                       ?>
                    <input type="text" name="balance" class="form-control" placeholder="t" value="<?php echo $pay->balance ?>">
                        <?php 
                   }
                   else{
                       ?>
                         <input type="text" name="balance" class="form-control" placeholder="" value="">
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
  