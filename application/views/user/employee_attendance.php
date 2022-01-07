
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Employee  List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
       <section class="content-header">
      <div class="container-fluid">
            <div class="col-md-12 " >
                
                 <?php   $emp_id=$this->uri->segment(3);?>
        <ul class="nav nav-pills">
            <li style="color: green">Attendance</li>
          <?php if (!empty($data1)):?>
            <?php foreach ($data1 as $key => $value): ?>
            <?php $month= $value->month; ?>
          <li class="nav-item">
           <h6><b> <a href="<?php echo base_url('User/monthly_data/'.$emp_id.'/'.$month.'') ?>" class="pull-right btn btn-info btn-xs" style="margin: 8px;"><i class="fa fa-mail-reply"></i><?php echo $value->name ?></a></b></h6>
          </li>
           <?php endforeach ?>
                <?php endif ?>
        </ul>
      </div>
      </div>
    </section>
    
    <!--   <section class="content-header">-->
    <!--  <div class="container-fluid">-->
    <!--       <div class="col-md-12 " >-->
             
    <!--    <ul class="nav nav-pills">-->
    <!--        <li style="color: green">Salary Info</li>-->
    <!--      <?php   $emp_id=$this->uri->segment(3);?>-->
    <!--    <ul class="nav nav-pills">-->
    <!--      <?php if (!empty($data1)):?>-->
    <!--        <?php foreach ($data1 as $key => $value): ?>-->
    <!--        <?php $month= $value->month; ?>-->
    <!--      <li class="nav-item">-->
    <!--       <h6><b> <a href="<?php echo base_url('USer/salaey_detials/'.$emp_id.'/'.$month.'') ?>" class="pull-right btn btn-info btn-xs" style="margin: 8px;"><i class="fa fa-mail-reply"></i><?php echo $value->name ?></a></b></h6>-->
    <!--      </li>-->
    <!--       <?php endforeach ?>-->
    <!--              <?php endif ?>-->
    <!--    </ul>-->
    <!--  </div>-->
    <!--  </div>-->
    <!--</section>-->
    
     <section class="content-header">
      <div class="container-fluid">
            <div class="col-md-12 " >
             
        <ul class="nav nav-pills">
            <li style="color: green">Salary slip</li>
          <?php   $emp_id=$this->uri->segment(3);?>
        <ul class="nav nav-pills">
          <?php if (!empty($data1)):?>
            <?php foreach ($data1 as $key => $value): ?>
            <?php $month= $value->month; ?>
          <li class="nav-item">
           <h6><b> <a href="<?php echo base_url('User/salary_slip/'.$emp_id.'/'.$month.'') ?>" class="pull-right btn btn-info btn-xs" style="margin: 8px;"><i class="fa fa-mail-reply"></i><?php echo $value->name ?></a></b></h6>
          </li>
           <?php endforeach ?>
                  <?php endif ?>
        </ul>
      </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Sr No.</th>
                      <th>Name</th>
                     <th>Date</th>
                    <th>Day</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Leave</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($data)):?>
                    <?php $i=1; 
                          foreach ($data as $key => $value): ?>
                      <tr>
                        <td><?=$i++?></td>
            
                         <td style="color: blue"><?=ucfirst($value->name)?></td>
                          <td><?=$value->date?></td>
                           <td style="color: green"><?=$value->day?></td>
                          <td>
                           <?php if($value->in_time!='')
                           {
                               echo $value->in_time;
                               
                               if($value->in_time > '10:30')
                               {
                               echo "<h6 style='color: red'> (Half)" ; 
                               }
                                elseif ($value->in_time > '10:15' && $value->date>'2021-09-12' && $value->date<'2021-12-23')
                               {
                                echo "<h6 style='color: red'> (Half)"; 
                               }
                                elseif ($value->in_time > '10:30' && $value->date>'2021-12-23')
                               {
                                echo "<h6 style='color: red'> (Half)"; 
                               }
                              }
                           
                           elseif (!empty($value->in_time=='' && $value->out_time=='' && $value->leave=='')) 
                           {
                               ?>
                            <h6 style="color: red">holiday</h6>
                            <?php
                           }
                            elseif (!empty($value->in_time=='' && $value->out_time=='' && $value->leave!='')) 
                           {
                               ?>
                            <h6 style="color: red">Leave</h6>
                            <?php
                           }
                           ?>
                           </td>
                           
                           
                           
                           
                           
                           
                       
                           <td>
                           <?php if($value->out_time!='')
                           {
                               echo $value->out_time;
                           }
                           
                          elseif (!empty($value->in_time=='' && $value->out_time=='' && $value->leave=='')) 
                           {
                              ?>
                            <h6 style="color: red">holiday</h6>
                            <?php
                           }
                            elseif (!empty($value->in_time=='' && $value->out_time=='' && $value->leave!='')) 
                           {
                               ?>
                            <h6 style="color: red">Leave</h6>
                            <?php
                           }
                           ?>
                           </td>
                           
                           
                           
                       <td>
                           <?php 
                          
                            if (!empty($value->out_time=='' && $value->day=='Saturday' && $value->leave=='Full')) 
                           {
                               ?>
                            <h6 style="color: red"><?php echo $value->leave ?></h6>
                            <?php
                           }
                            elseif (!empty($value->in_time=='' && $value->out_time=='' && $value->leave=='')) 
                           {
                              ?>
                            <h6 style="color: red">holiday</h6>
                            <?php
                           }
                            elseif($value->leave=='')
                           {
                               ?>
                              
                             <h6 style="color: blue">p</h6>
                             <?php 
                           }
                           elseif (!empty($value->leave)) 
                           {
                               ?>
                            <h6 style="color: green"><?php echo $value->leave ?></h6>
                            <?php
                           }
                           
                           else
                           {
                               ?>
                            <h6 style="color: red">A</h6>
                            <?php
                           }
                           ?>
                           </td>

                        
                              
<td>

                    <span class="btn btn-flat btn-success rounded-circle" data-toggle="modal" data-target="#packageModel1<?= $value->id ?>" id="status"style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></span>
              
                    
                    <div class="modal fade booking-journey" id="packageModel1<?= $value->id ?>" role="dialog"aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Update Box</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                             <div class="modal-body">
                              <div class="form-group">
                              <input type="hidden" name="uid" id="uid" value="<?=$value->id?>">
                              <?php $res = $this->am->selectrow('attendance',array('id'=>$value->id)); 
                             // print_r($res);
                              ?>
           <form action="<?=base_url()?>User/edit_attendance" enctype="multipart/form-data" method="post" id="contact-form">
              <div class="box-body" style="margin: 20px">
                <div class="row">
                     <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Employee Name*</label>
                     <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $res->name?>">
                     <input type="hidden" name="employee_id" id="uid" value="<?=$value->id?>">
                     </div>
                      <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Date*</label>
                     <input type="text" name="today_date" class="form-control" placeholder="" value="<?php echo $res->date?>">
                     </div>
                        <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">In Time*</label>
                     <input type="text" name="in_time" class="form-control" placeholder="" value="<?php echo $res->in_time?>">
                     </div>
                     <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Out Time*</label>
                     <input type="text" name="out_time" class="form-control" placeholder="" value="<?php echo $res->out_time?>">
                     </div>
                     
                      <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Leave*</label>
                      <select name="leave" class="form-control" id="category" >
                      <option value="">Select </option>
                       <option value="Half">Half Day</option>
                        <option value="Full">Full day</option>
                 </select>
            
                     </div>
                    
                     
                     <br>
                     <br>
           
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary declinebutton">Submit</button>
                        </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div> 
                       

                      
                      </tr>
                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

