
<div class="wrapper">
  <div class="content-wrapper">
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
      <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                 <form action="<?=base_url("Admin/assignlead")?>" method="post">
                      <div class="row">
                        <div class="col-md-2">
                         
                        </div>
                        <div class="col-md-2">
                         <label for="exampleInputPassword1">Assign Leads By Employee *</label>
                        </div>
                        <div class="col-md-2">
                          <select name="user_id"  required="" class="form-control selectpicker" id="my_select" data-show-subtext="true" data-live-search="true" required>
                           
                        <?php foreach ($employee as $u): ?>
                        <option value="<?php echo $u->id; ?>"><?php echo $u->name; ?></option>  
                        <?php endforeach ?>
                        
                      </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success">Assign</button>
                        </div>
                      </div>
            <!-- <div class="box-header"><h3 class="box-title col-md-3">List </h3></div> -->
            <!-- /.box-header -->
            
             <script type="text/javascript">  
            function selects(){  
                var ele=document.getElementsByName('lead[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelect(){  
                var ele=document.getElementsByName('lead');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
            }             
        </script>  

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
                    <th><input type="button" class="btn btn-flat btn-danger rounded-circle" onclick='selects()' value="S.All"/>  </th>
                    
                    <th>Customer Name</th>
                    <th>Assign By</th>
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
                      <td>  <input type="checkbox" name="lead[]" value="<?php  echo $value->id; ?>" ></td>
                        </form>
                         <td><?=ucfirst($value->name)?></td>
                         <?php $emp = $this->am->selectrow('employee',array("id"=>$value->assigned_to)); ?>
                         <?php if(!empty($emp))
                         {
                             ?>
                              <td><?=$emp->name?></td>
                              <?php
                         }
                         else
                         {
                             ?>
                              <td></td>
                              <?php
                         }
                         ?>
                        
                       <td><a target="_blank" href="tel:<?=$value->mobile_no ?>"><?=$value->mobile_no ?></a></td>
                         
                         <td><?=$value->enquiry?></td>
                         <td><?=$value->location?></td>
                         <td><?=$value->follow_up_date?></td>
                         <td><?=$value->budget?></td>
                         <td><?=$value->refer_by?></td>
                        <td><?=$value->stage?></td>
                        <td><?=$value->remarks?></td>
                              <td>
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

                  
                    <a href="<?php echo base_url('Admin/change_lead_remark/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-plus"></i></a>

                      <a href="<?php echo base_url('Admin/view_remark/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-eye"></i></a>
                      
                      </tr>


                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sr No.</th>
                    <th><input type="button" class="btn btn-flat btn-danger rounded-circle" onclick='selects()' value="S.All"/>  </th>
                    
                    <th>Customer Name</th>
                    <th>Assign By</th>
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

