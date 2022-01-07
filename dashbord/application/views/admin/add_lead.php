

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Lead</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Lead</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



<script type="text/javascript">
  $(document).ready(function () {
      
    $("#myBtn").click(function(){
         $('#myModal').modal('show');
    });
});
</script>
       <section class="content-header">
      <ol class="breadcrumb">
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Upload Lead Excel File</h4>

            </div>
      <form action="<?php echo base_url();?>import/importFile" method="post" enctype="multipart/form-data">
        <div class="col-md-6 form-group">
                      
                     <input type="file" name="uploadFile" class="form-control" value="">
                     <br>
                     <br>
                    <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Upload" />
                     </div>
     
    <!-- <input type="file"  name="uploadFile" value="" /><br><br> -->
    <!-- <input type="submit" name="submit" value="Upload" />
 -->
            <div class="modal-footer">
                
                
            </div>
            </form>
        </div>
    </div>
</div>
<button id="myBtn" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Upload Leads Excel File</button>
      </ol>
    </section>
    <br>

    <!-- Main content -->
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
             <form action="<?=base_url()?>Admin/add_lead" enctype="multipart/form-data" method="post" id="contact-form">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Customer Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="name" required="" class="form-control" placeholder="Name">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="mobile_no" required="" class="form-control" placeholder="Mobile no">
                </div>
              </div>
            </div>
            <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="email" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Other Contact No*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="other_no" required="" class="form-control" placeholder="">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Enquiry Details*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-details">D</i></span>
                  </div>
                  <input type="text" name="enquiry" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Location</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-location">L</i></span>
                  </div>
                  <input type="text" name="location" required="" class="form-control" placeholder="">
                   <input type="hidden" name="today_date" class="form-control" placeholder="Date" readonly="" value="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
            </div>     


             <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Follow Up Date*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" name="follow_up_date" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Budget</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-budget">B</i></span>
                  </div>
                  <input type="text" name="budget" required="" class="form-control" placeholder="">
                </div>
              </div>
            </div>     

             <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Reference  By*</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="refer_by" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Stage</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-Stage">S</i></span>
                  </div>
                  <input type="text" name="stage" required="" class="form-control" placeholder="">
                </div>
              </div>
            </div>     

            <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Remarks</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-note">N</i></span>
                  </div>
                  <input type="text" name="remarks" required="" class="form-control" placeholder="">
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
            <h4>Lead List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lead List</li>
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
               <div class="row"> 
              <div class="col-lg-4">
              </div>
            <div class="col-lg-2">
              <form action="<?=base_url("Admin/assign_lead")?>" method="post">

           <div class="form-group">
                    <!-- <label>Employee</label> -->
                   <select name="user_id" class="form-control" required="" id="category" >
                      <option value="">Select Employee</option>
                  <?php foreach ($employee as $row){  ?>
                <option value="<?php echo $row->id;?>"> <?php echo $row->name; ?>
                         <?php  } ?>   
                     </option>
                 </select>
                </div>
                        </div>
                      
                        <div class="col-lg-2">
                          <button type="submit" class="btn btn-success">Assign</button> 
                        </div>  
                    </div>
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
                     <th>Select </th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                 
                    <th>Enquiry Details</th>
                    <th>Location</th>
                    <th>Follow Up Date</th>
                    <th>Budget</th>
                    <th>Reference By</th>
                    <th>Stage</th>
                    <th>Remarks</th>
                    <th>Update Lead</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($data)):?>
                    <?php $i=1; 
                          foreach ($data as $key => $value): ?>
                      <tr>
                        <td><?=$i++?></td>
                         <td>
            <input type="checkbox" class="select_update" name="lead_id[]" value="<?php echo $value->id; ?>">
                     </td>
                     
                         <td><?=ucfirst($value->name)?></td>
                         <td><?=$value->email?></td>
                         <td><a target="_blank" href="tel:<?=$value->mobile_no ?>"><?=$value->mobile_no ?></a></td>
                         <td><?=$value->enquiry?></td>
                         <td><?=$value->location?></td>
                         <td><?=$value->follow_up_date?></td>
                         <td><?=$value->budget?></td>
                         <td><?=$value->refer_by?></td>
                        <td><?=$value->stage?></td>
                        <td><?=$value->remarks?></td>
                              <td>
                              </form>

            <form action="<?php echo base_url('admin/change_status/') ?>" enctype="multipart/form-data" method="post">
          <input type="hidden" name="lead_id" value="<?=$value->id?>">
           <select name="lead_status" class="form-control" >
            <option value="0">Select</option>
              <option value="Meeting Done">Meeting Done</option>
              <option value="Sale Done">Sale Done</option>
              <option value="Not Interested">Not Interested</option>
              <option value="Follow Up">Follow Up</option>
              <option value="Other requirement">Other requirement</option>
              <option value="Not Contact">Not Contact</option>
                  </select><br>
                  <button type="submit" class="btn btn-flat btn-success accept" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;">Update</button>
                  </form></td>
                       <td>
                     <a href="<?php echo base_url('Admin/edit_lead/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('Admin/delete_lead/').$value->id ?>" class="btn btn-flat btn-danger rounded-circle" style="background-color:#CC0000; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-trash"></i></a>
                      <span class="btn btn-flat btn-success rounded-circle" data-toggle="modal" data-target="#packageModel1<?= $value->id ?>" id="status"style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-plus"></i></span>

                   

                      <span class="btn btn-flat btn-success rounded-circle" data-toggle="modal" data-target="#myModal<?= $value->id ?>" id="status"style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-eye"></i></span>

                      <!--  <span class="btn btn-flat btn-success rounded-circle" data-toggle="modal" data-target="#addModal<?= $value->id ?>" id="status"style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-user">Assign</i></span> -->
                      <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Assign</button>
                      
                      </tr>
                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                 <th>Sr No.</th>
                     <th>Select </th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                 
                    <th>Enquiry Details</th>
                    <th>Location</th>
                    <th>Follow Up Date</th>
                    <th>Budget</th>
                    <th>Reference By</th>
                    <th>Stage</th>
                    <th>Remarks</th>
                    <th>Update Lead</th>
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
  