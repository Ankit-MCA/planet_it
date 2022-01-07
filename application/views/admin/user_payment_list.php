
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Complet Lead List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Complet List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                    <th>Customer Name</th>
                    <th>Project Name</th>
                    <th>Mobile No</th>
                    <th>Total payment</th>
                    <th>Payment Received</th>
                    <th>Payment Date</th>
                    <th>Payment Mode</th>
                    <th>Transection no</th>
                    <th>Balance</th>
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
                         <td><?=$value->project_type?></td>
                         <td><?=$value->mobile_no?></td>
                              <td><?=$value->total_payment?></td>
                              <td><?=$value->payment_received?></td>
                               <td><?=$value->payment_date?></td>
                               <td><?=$value->payment_mode?></td>
                              <td><?=$value->transection_no?></td>
                              <td><?=$value->balance?></td>
                       <td>
                    <span class="btn btn-flat btn-success rounded-circle" data-toggle="modal" data-target="#packageModel<?= $value->id ?>" id="status"style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></span>
                     <a href="<?php echo base_url('Admin/invoice/').$value->id ?>" class="btn btn-flat btn-denger rounded-circle" style="background-color:#dc3545; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-file-invoice">P.I</i></a>

                       <a href="<?php echo base_url('Admin/ady_invoice/').$value->id ?>" class="btn btn-flat btn-denger rounded-circle" style="background-color:#6610f2; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-file-invoice">A.I</i></a>
                     
                      </tr>
                      <div class="modal fade" id="packageModel<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="uid" id="uid" value="<?=$value->id?>">
     <?php $res = $this->am->selectrow('payment_details',array('id'=>$value->id));  ?>
          <form action="<?php echo base_url('Admin/edit_user_amount/'.$value->id) ?>" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                
                  <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Customer Name*</label>
                      
                   <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $res->name?>">
                    <input type="hidden" name="user_id" class="form-control" placeholder="Name" value="<?php echo $res->user_id?>">
                       
                   
                     <!--<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $res->name?>">-->
                    
                     </div>
                        <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Project Name*</label>
                     <input type="text" name="project_type" class="form-control" placeholder="Project name" value="<?php echo $res->project_type?>">
                     
                     
                     </div>
                     <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Mobile No*</label>
                     <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" value="<?php echo $res->mobile_no?>">
                    
                     </div>
                     <div class="col-md-6 form-group">
                <label for="exampleInputPassword1">Total payment* </label>
                 
                   <input type="text" name="total_payment" class="form-control" placeholder="Name" value="<?php echo $res->total_payment?>">
                       
                     <!--<input type="text" name="total_payment" class="form-control" placeholder="Total Payment" value="<?php echo $res->total_payment?>">-->
                     </div>
                     <div class="col-md-6 form-group">
                   <label for="exampleInputPassword1">Payment Received*</label>
                    <input type="text" name="payment_received" id="received" class="form-control" placeholder="Payment Received" value="<?php echo $res->payment_received?>">
                     </div>
                     <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Payment Date*</label>
                     <input type="date" name="payment_date" class="form-control" placeholder="Payment Date" value="<?php echo $res->payment_date?>">
                     </div>
                      <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Payment Mode*</label>
                     <input type="text" name="payment_mode" class="form-control" placeholder="Payment mode" value="<?php echo $res->payment_mode?>">
                     </div>
                     <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Transection no.*</label>
                     <input type="text" name="transection_no" class="form-control" placeholder="Transection no" value="<?php echo $res->transection_no?>">
                     </div>

                    <?php 
                    $this->db->select_sum('payment_received');
                    $this->db->from('payment_details');
                    $this->db->where('user_id',$res->user_id);
                    $query=$this->db->get();
                    $pay=$query->row()->payment_received;

                     ?>
                      <?php $val=$res->total_payment-$pay ?>
                    
                     <div class="col-md-6 form-group">
                      <label for="exampleInputPassword1">Balance*</label>
                     <input type="text" name="balance" class="form-control" placeholder="Balance" value="<?php echo $res->balance?>">
                     
                     </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Sr No.</th>
                    <th>Customer Name</th>
                    <th>Project Name</th>
                    <th>Mobile No</th>
                    <th>Total payment</th>
                    <th>Payment Received</th>
                    <th>Payment Date</th>
                    <th>Payment Mode</th>
                    <th>Transection no</th>
                    <th>Balance</th>
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

