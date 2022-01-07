
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Maintenance Payment</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Maintenance Payment</li>
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
                    <th>Maintenance cost</th>
                    <th>Payment Received</th>
                    <th>Balance</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php if (!empty($customer)):?>
                    <?php $i=1; 
                          foreach ($customer as $key => $value): ?>
                      <tr>
                        <td><?=$i++?></td>

                         <td><?=ucfirst($value->name)?></td>

                         <td><?=$value->project_type?></td>

                         <td><?=$value->mobile_no?></td>
                         
          <?php   $userid = $this->am->selectrow('maintenance_costumers',array('user_id'=>$value->id)); ?>
                     <?php if(!empty($userid->maintenance_cost))
                           {
                               ?>
                               <td><?=$userid->maintenance_cost?></td>
                               <?php
                                 }
                               else
                               {
                                   ?>
                                    <td></td>
                                    <?php 
                               }
                        if(!empty($userid->payment_received))
                           {
                               ?>
                            <?php 
                            $this->db->select_sum('payment_received');
                            $this->db->from('maintenance_costumers');
                            $this->db->where('user_id',$value->user_id);
                            $query=$this->db->get();
                            $paye=$query->row()->payment_received;
                             ?>
                               <td><?php echo $paye ?></td>
                               <?php
                                 }
                               else
                               {
                                   ?>
                                    <td></td>
                                    <?php 
                               }
                               ?>
                              
                              
                              
                         <?php if(!empty($userid->balance))
                           {
                               ?>
                           <?php 
                            $this->db->select_sum('payment_received');
                            $this->db->from('maintenance_costumers');
                            $this->db->where('user_id',$value->user_id);
                            $query=$this->db->get();
                            $paye=$query->row()->payment_received;
                            
                            $this->db->select_sum('maintenance_cost');
                            $this->db->from('maintenance_costumers');
                            $this->db->where('user_id',$value->user_id);
                            $query=$this->db->get();
                            $total_pending_balnce=$query->row()->maintenance_cost;
        
                            
                             //$total=$userid->maintenance_cost;
                             
                             $total_balance=$total_pending_balnce-$paye;
                             ?>
                               <td><?php echo $total_balance; ?> </td>
                               <?php
                                 }
                               else
                               {
                                   ?>
                                    <td></td>
                                    <?php 
                               }
                               ?>
                              
               
                      
                             
                              <td>
                   
                      <a href="<?php echo base_url('Admin/maintenance_costumers_list/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-eye"></i></a>
                  
                </tr>
                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Sr No.</th>
                    <th>Customer Name</th>
                    <th>Project Name</th>
                    <th>Mobile No</th>
                    <th>Maintenance cost</th>
                    <th>Payment Received</th>
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

