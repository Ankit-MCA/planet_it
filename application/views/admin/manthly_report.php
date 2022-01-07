

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Employee Details</h1>
          </div>
           <div class="col-sm-4">
            <?php $id= $this->uri->segment(3); ?>
          </div>
           
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid" id="printableArea">
        <div class="row">
          <div class="col-12">
<style type="text/css">@media print {
  .noPrint{
    display:none;
  }
}
h1{
  color:#f6f6;
}</style>

            <!-- Main content -->
        <div class="invoice p-3 mb-3" style="font-size:120%;
">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                     <img src="<?=base_url()?>dashbord/planet.png" style="color:#f6f6"   height="60" width="80" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> Planet Web it Services
                     <?php  $date=date('d-m-Y'); ?>
                    <!--<small class="float-right">Date: <?php echo $data->payment_date ?></small>-->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                 
                  <address>
                  
                    <strong>Employee Name </strong> : <?php echo $data->name ?><br>
                    <strong>Mobile No </strong> : <?php echo $data->mobile_no ?><br>
                    <strong>Email </strong> : <?php echo $data->email ?><br>
                    <strong>Address </strong> : <?php echo $data->address ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong> </strong>
                   
                   
                  </address>
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                    <!--id="example1"-->
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>Month Name</th>
                      <th>Persent</th>
                      <!--<th>Absent</th>-->
                      <th>Half</th>
                      <th>Full</th>
                       <th>Leave</th>
                      <th>Salary</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($data1)):?>
                    <?php $i=1; foreach ($data1 as $key => $value): ?>
                    <tr>
              <td><?=$i++?></td>
              
              <td><?php echo $value->name ?></td>
              
             <?php $month=$value->id;
             $id=$this->uri->segment(3);
             $res = $this->am->selectrow('employee',array('id'=>$id));
             $name=$res->name;
             
                  $salary=$res->salary;
                  $full_day_salary=$res->salary/30;
                  $half_day_salary=$full_day_salary/2; 

              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('in_time >', '');
              $this->db->where('out_time >', '');
              $this->db->from("attendance");
              $persent= $this->db->count_all_results();
              //echo $this->db->last_query();die;
              
              ?>
              
              <td><?php echo $persent ?></td>
              <?php 
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('in_time >', '10:15');
              $this->db->from("attendance");
              $punishment= $this->db->count_all_results();
              
              $punishment_val=$punishment;
              
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('date >', '2021-09-12');
              $this->db->where('in_time >', '10:15');
              $this->db->from("attendance");
              $punishment1= $this->db->count_all_results();

              $punishment_val1=$punishment1;
 
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('leave', 'Half');
              $this->db->from("attendance");
              $half_leave= $this->db->count_all_results();
              
               $punishment_amount=$punishment_val+$punishment_val1+$half_leave;
              ?>

              <td><?php echo $punishment_amount ?></td>

            <?php
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('leave', 'Full');
              $this->db->from("attendance");
              $full_leave= $this->db->count_all_results();

              $leave=$punishment_val+$punishment_val1+$half_leave+$full_leave;
              
              if($full_leave>1)
              {
                  $user_leave =$full_leave-1;
                  $amount1=$user_leave*$full_day_salary;
              }
              else{
                  $amount1='0';
              }
              ?>

              <td><?php echo $full_leave ?></td>
               <td><?php echo $leave ?></td>
               
             <?php  
           $month=$value->id;
           $id=$this->uri->segment(3);
           $res = $this->am->selectrow('employee',array('id'=>$id));
           $name=$res->name;
           $salary=$res->salary;

           $full_day_salary=$res->salary/30;

           $half_day_salary=$full_day_salary/2;
           
             $this->db->where('MONTH(created_at)', $month);
             $this->db->where('YEAR(created_at)', date('Y'));
             $this->db->where('name', $name);
              $this->db->where('in_time >', '');
              $this->db->where('out_time >', '');
              $this->db->from("attendance");
              $full_day= $this->db->count_all_results();

              if($full_day>23)
              {
                   $fullday=$full_day-1;

                   $amount =$fullday*$full_day_salary;
              }
              else
              {
                  $amount=$full_day*$full_day_salary;
              }
             
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('in_time >', '10:30');
              $this->db->from("attendance");
              $punishment= $this->db->count_all_results();
              
              $punishment_val=$punishment*$half_day_salary;
               
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('date >', '2021-09-12');
              $this->db->where('in_time >', '10:15');
              $this->db->from("attendance");
              $punishment1= $this->db->count_all_results();
               
              $punishment_val1=$punishment1*$half_day_salary;
               
              $punishment_amount=$punishment_val+$punishment_val1;

              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('leave', 'Half');
              $this->db->from("attendance");
              $half_day_leave= $this->db->count_all_results();
              
              if($half_day_leave>0)
              {
                  $half_day=$half_day_leave/2;
              }
              else
              {
                  $half_day='0';
              }

              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('leave', 'Full');
              $this->db->from("attendance");
              $full_day_leave= $this->db->count_all_results();
              
              $leave=$half_day+$full_day_leave+$punishment1+$punishment;
              
              if($leave>1)
              {
                  $user_leave =$leave-1;
                  $amount1=$user_leave*$full_day_salary;
              }
              else
              {
                $amount1='0';
              }
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('day', 'Saturday');
              $this->db->from("attendance");
              $saturday= $this->db->count_all_results();
              if($saturday>4)
              {
                 $sat=$saturday-3;
                 $amount3= $sat*$full_day_salary; 
              }
              else
              {
                  $sat_val=$saturday-2;
                  $amount3= $sat_val*$full_day_salary;
              }
            
              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('day', 'Sunday');
              $this->db->from("attendance");
              $sunday= $this->db->count_all_results();

              $amount4= $sunday*$full_day_salary;

              if(!empty($amount))
              {

              $total_amount=$amount+$amount3+$amount4;

                ?>
               <td><?php echo $total_amount ?></td>
               <?php
              }
              else
              {
                ?>
                <td>0</td>
                <?php
              }
                ?>
            

                 

                      


                      </tr>
                       <?php endforeach ?>
                        <?php endif ?>


                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <div class="row no-print">
                <div class="col-12">
                  <a onclick="printDiv('printableArea')"rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
   <script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
  