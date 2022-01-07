
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
                         
                           <?php 
                         
                               $m_cost=$value->maintinace;
                                if(!empty($m_cost))
                               {
                                   $maintinace_cost=$m_cost;
                               }
                               else{
                                   $maintinace_cost=0;
                               }
                               
                               $d_cost=$value->domain;
                                if(!empty($d_cost))
                               {
                                   $domain_cost=$d_cost;
                               }
                               else{
                                   $domain_cost=0;
                               }
                               $s_cost=$value->server_cost;
                                if(!empty($s_cost))
                               {
                                   $server_cost=$s_cost;
                               }
                               else{
                                   $server_cost=0;
                               }
                               $e_cost=$value->email_cost;
                                if(!empty($e_cost))
                               {
                                   $email_cost=$e_cost;
                               }
                               else{
                                   $email_cost=0;
                               }
                
                               $sms_cost=$value->sms_cost;
                                if(!empty($sms_cost))
                               {
                                   $sms=$sms_cost;
                               }
                               else{
                                   $sms=0;
                               }
                               $t_cost=$value->third_party;
                               if(!empty($t_cost))
                               {
                                   $third_party=$t_cost;
                               }
                               else{
                                   $third_party=0;
                               }
                               
                               $total_cost= $maintinace_cost + $domain_cost + $server_cost + $email_cost + $sms + $third_party;
                                
                                $total_cost1 = $e_cost;
                                ?>
                         
                         <td><?php echo $total_cost ?> (<?=ucfirst($value->maintinace_time)?>)</td>
          <?php   $userid = $this->am->selectrow('maintenance_costumers',array('user_id'=>$value->id)); ?>
                    
                                    <?php 
                               
                            $this->db->select_sum('payment_received');
                            $this->db->from('maintenance_costumers');
                            $this->db->where('user_id',$value->user_id);
                            $query=$this->db->get();
                            $paye=$query->row()->payment_received;
                             ?>
                             <?php
                             if(!empty($paye))
                             {
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
                    <?php
                   $userid = $this->am->selectrow('maintenance_costumers',array('user_id'=>$value->id));
                         
                         if(empty($userid))
                         {
                          ?>
                           <a href="<?php echo base_url('Admin/add_first_maintenance/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#00c0ef; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-plus"></i></a>
                     <?php
                         }
                         ?>
                         <?php
                          if(!empty($userid))
                         {
                             ?>
                  <a href="<?php echo base_url('Admin/add_next_maintenance/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#f39c12; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-plus"></i></a>
                        
                        <?php
                        }
                        ?>
                      <a href="<?php echo base_url('Admin/maintenance_costumers_list/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-eye"></i></a>


                    <button type="button"  class="btn btn-default btn-sm" data-toggle="modal" data-toggle="tooltip" title="Remark Update"   data-target="#myModal_<?php  echo $value->id; ?>"><i class="fa fa-repeat">Remark</i></button> 
                      </tr>
                   


    <div class="modal" id="myModal_<?php  echo $value->id; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Payment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container-fluid">

  <div class="nav nav-tabs">
   <button class="btn btn-danger" data-toggle="tab" href="#card<?php echo $value->id ?>" >Remark</button>
   <button class="btn btn-danger" data-toggle="tab" href="#google<?php echo $value->id ?>">Show History</button>
  </div>
  <br>
  <div class="container-fluid">

   <div class="tab-content">

     <div id="card<?php echo $value->id ?>" class="tab-pane fadein active">


    <div class="col-md-12">
            <div class="col-md-12">
          <form action="<?php echo base_url()?>admin/add_payment_remark" id="form" method="post" name="form">
          <div class="col-md-12">

            <div class="key">
              <div class="col-md-12"class="form-group">      
                <input type="hidden"  name="user_id" class="form-control" value="<?php echo $value->id ?>" readonly="">
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-8 col-md-offset-2"  class="form-group"> 
                    <label>Remark</label>
                  <textarea  class="form-control" id="remarks" name="remark" placeholder="Remark" width="100%" required=""style="margin: 0px -61px 0px 0px;height: 150px;width:100%;"></textarea>
                  </div>
               <div class="col-md-4" class="form-group">
                       <label>Payment Date</label>
                        <input id="date" name="date"  type="date" class="form-control" required="">
                    </div>
                  
                </div>
              <div class="key text-center"style="margin-bottom: 15px;margin-top:162px;">
                    <button class="btn btn-success" id="mybtn" type="submit"> Submit</button>
                </div>

          </div>
        </form>
      </div>

      </div>
     </div>
   

    <div id="google<?php echo $value->id ?>" class="tab-pane fade">
      <div class="container bg-info">
        <div class="col-md-12" style="height: 300px;overflow-y: scroll; margin-top:20px;width:100%;">  
       
            <div class="row">
              <div class="col-md-6">
                  <h4 style="font-weight: bold;">Date</h4>
         <?php 
        $user_details = $this->am->selectres('payment_remark',array('user_id'=>$value->id));
        ?>  
        <?php if (!empty($user_details)):?>
                    <?php $i=1; 
                          foreach ($user_details as $key): ?>
                  <p class="space-list" style="color: red;"><?php echo $key->date ?></p>
                   <?php endforeach ?>
                        <?php endif ?>
              </div>
              <div class="col-md-6">
                  <h4 style="font-weight: bold;">Remark</h4>
                     <?php 
        $user_details = $this->am->selectres('payment_remark',array('user_id'=>$value->id));
        ?>  
        <?php if (!empty($user_details)):?>
                    <?php $i=1; 
                          foreach ($user_details as $key): ?>
                  <p class="space-list"><?php echo $key->remark ?></p>
                    <?php endforeach ?>
                        <?php endif ?>
              </div>
        </div>

        
      </div>
     </div>        
    </div>     
  
</div>
<!---------tabend---------------->
    </div>
        </div>
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

