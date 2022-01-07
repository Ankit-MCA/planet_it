
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Payment List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment List</li>
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
                          <?php $p_cost=$value->project_cost;
                         
                                if(!empty($p_cost))
                               {
                                   $project_cost=$p_cost;
                               }
                               else{
                                   $project_cost=0;
                               }
                         
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
                               
                               $total_cost=$project_cost + $maintinace_cost + $domain_cost + $server_cost + $email_cost + $sms + $third_party;
                                
                                $total_cost1 = $e_cost;
                               // print_r($total_cost);die;

                         
                         ?>
                           <td><?php echo $total_cost  ?></td>
                              <?php   $userid = $this->am->selectrow('payment_details',array('user_id'=>$value->user_id)); 
                              ?>
                              <?php 
                            $this->db->select_sum('payment_received');
                            $this->db->from('payment_details');
                            $this->db->where('user_id',$value->user_id);
                            $query=$this->db->get();
                            $paye=$query->row()->payment_received;
                             ?>
                             <?php
                             if(!empty($userid->payment_received))
                             {
                                 ?>
                                  <td><?php echo $paye; ?></td>
                                  <?php
                             }
                             else
                             {
                                 ?>
                                  <td></td>
                                  <?php
                             }
                                 ?>
                             
                             
                              <!-- <td><?=$value->payment_date?></td>-->
                              <!-- <td><?=$value->payment_mode?></td>-->
                              <!--<td><?=$value->transection_no?></td>-->
                              
                              <?php $val=$value->total_payment; ?>
                              
                             <?php if(!empty($userid->balance))
                           {
                               ?>
                           
                               <td><?php echo $val-$paye; ?></td>
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
                         
                      <a href="<?php echo base_url('Admin/user_payment_details/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-eye"></i></a>
                  
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
                    <th>Total payment</th>
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

