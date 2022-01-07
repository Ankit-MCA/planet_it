

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance </li>
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
                <h3 class="card-title">Attendance Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
                       <form action="<?=base_url()?>User/add_attendance" enctype="multipart/form-data" method="post" id="contact-form">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Employee Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <select name="name" class="form-control" required="" id="category" >
                      <option value="">Select Employee</option>
                  <?php foreach ($employee as $row){  ?>
                <option value="<?php echo $row->name;?>"> <?php echo $row->name; ?>
                         <?php  } ?>   
                     </option>
                 </select>
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Date</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-co"></i></span>
                  </div>
                  <input type="date" name="today_date" id="theDate" class="form-control" placeholder="" required="">
                </div>
              </div>
          
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">In Time</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-time"></i></span>
                  </div>
                 <input type="time" name="in_time" class="form-control" placeholder="In Time" value="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Out Time</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-time"></i></span>
                  </div>
                 <input type="time" name="out_time" class="form-control" placeholder="Out Time" maxlength="10" value="">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Leave</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                <select name="leave" class="form-control" id="category" >
                      <option value="">Select </option>
                       <option value="Half">Half Day</option>
                        <option value="Full">Full day</option>
                 </select>
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

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Today Attendance</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Sr No.</th>
                    <th>Employee Name</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                      <th>Leave</th>
                    <th>Date</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php if (!empty($data)):?>
                    <?php $i=1; 
                          foreach ($data as $key => $value): ?>
                      <tr>
                        <td><?=$i++?></td>
            
                         <td><?=ucfirst($value->name)?></td>
                         <!--<td><?=$value->in_time?></td>-->
                         
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
                            elseif (!empty($value->in_time=='' && $value->day=='Sunday')) 
                           {
                               ?>
                            <h6 style="color: red">Sunday</h6>
                            <?php
                           }
                           elseif (!empty($value->in_time=='' && $value->day=='Saturday')) 
                           {
                               ?>
                            <h6 style="color: red">Saturday</h6>
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
                        
                        <td><?=$value->out_time?></td>
                          <td><?=$value->leave?></td>
                         <td><?=$value->date?></td>
                              
                <td>
            

                   
                    <span class="btn btn-flat btn-success rounded-circle" data-toggle="modal" data-target="#packageModel1<?= $value->id ?>" id="status"style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></span>
</td>
                     

                      
                      </tr>
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
                     <input type="date" name="today_date" class="form-control" placeholder="" value="<?php echo $res->date?>">
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
                      

                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr No.</th>
                   
                    <th>Employee Name</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                      <th>Leave</th>
                    <th>Date</th>
                     <th>Action</th>
                  </tr>
                  </tfoot>
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
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
      var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;


document.getElementById('theDate').value = today;
  </script>
  