<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>

<!------ Include the above in your HEAD tag ---------->
<div class="container table-bordered mt-4  mb-4" id="printableArea">
    <div class="row col-sm-offset-1 col-md-offset-3" style="background-color: #c4e9f7;">
        <div class="col-sm-6 mt-2">
          <img src="<?=base_url()?>dashbord/planet.png" width="170" height="100">
          <br/>
        </div>
        <div class="col-sm-6 mt-5 text-right">
        <b>Planet Web IT Services
        </b>
    </div>
    </div>
    <style type="text/css">@media print {
  .noPrint{
    display:none;
  }
}
h1{
  color:#f6f6;
}</style>
     <?php   $emp_id=$this->uri->segment(3);
             $month_id=$this->uri->segment(4);
             if ($month_id==1)
              {
              $month='January';
              }
              elseif ($month_id==2) 
              {
                $month='Fabruary';
              }
               elseif ($month_id==3) 
              {
                $month='March';
              }
               elseif ($month_id==4) 
              {
                $month='April';
              }
               elseif ($month_id==5) 
              {
                $month='May';
              }
               elseif ($month_id==6) 
              {
                $month='June';
              }
               elseif ($month_id==7) 
              {
                $month='July';
              }
               elseif ($month_id==8) 
              {
                $month='August';
              }
               elseif ($month_id==9) 
              {
                $month='September';
              }
               elseif ($month_id==10) 
              {
                $month='October';
              }
               elseif ($month_id==11) 
              {
                $month='November';
              }
               elseif ($month_id==12) 
              {
                $month='December';
              }

        $res = $this->am->selectrow('employee',array('id'=>$emp_id));
      ?>
    <div class="row" style="margin-bottom: -17px;"><!-- 
       <h4 style="margin-left: 481px;"><u>Student's Details</u>
        </h4>
        <br> -->
      </span>
 
        <table class="table ">
          <tbody>
           <tr>
              <td colspan="10" style="text-align: center;"> <b>PAY SLIP FOR THE MONTH OF <?php echo $month ?> , 2021</b></td>
            <tr>
              <td colspan="2">
                <p><strong>Employee Number</strong>
                </p>
                <p>
                  <strong>Name 
                  </strong>
                </p>
                <p>
                  <!--<strong>Department-->
                  <!--</strong>-->
                   <strong>Email
                  </strong>
                </p>
                <p>
                  <!--<strong>Grade-->
                  <!--</strong>-->
                  <strong>Mobile No
                  </strong>
                </p>
                <p>
                  <strong>Designation
                  </strong>
                </p>
              </td>
              <td colspan="3">
                <p><?php echo $res->employee_no ?></p>
                <p><?php echo $res->name ?></p>
                <p><?php echo $res->email ?></p>
                <p><?php echo $res->mobile_no ?></p>
                <p><?php echo $res->designation ?></p>
              </td>
              <td colspan="2">
                <p>
                  <strong>Location</strong>
                </p>
                <p>
                  <strong>PAN/Aadhar No</strong>
                </p>
                <p>
                  <strong>Bank Name</strong>
                </p>
                <p>
                  <strong>Bank Account No.</strong>
                </p>
                <p>
                  <strong>IFSC Code</strong>
                </p>
              </td>
              <td colspan="3">
                <p><?php echo $res->address ?></p>
               <p><?php echo $res->pan_no ?></p>
              <p><?php echo $res->bank_name ?></p>
                <p><?php echo $res->account_no ?></p>
                <p><?php echo $res->ifsc_code ?></p>
              </td>
              
            </tr>
           <tr>
              <td colspan="3">
                <b>Earnings</b>
              </td>
              <td colspan="2">
                <b> Amount (Rs)</b>
              </td>
              <td colspan="3">
                <b>Deductions</b>
              </td>
              <td colspan="2">
                <b>Amount (Rs)</b>
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <b>Basic Salary + DA<br> Special Allowance
                </b>
              </td>
              <td colspan="2">
                 N
              </td>
              <td colspan="3">
                <b>
                  Provident Fund <br> Employee State Insurance
                </b>
              </td>
              <td colspan="2">
                 N
              </td>
            </tr>
       
           <tr>
              <td colspan="3">
                <b>Gross Salary</b>
              </td>
              <td colspan="2">N
              </td>
              <td colspan="3">
                <b>Gross Deduction</b>
              </td>
              <td colspan="2">N</td>
            </tr>
           
            <tr>
               <tr>
              <td colspan="3">
                <b>Net Salary</b>
              </td>
              <td colspan="7">
              <?php  
            $month=$this->uri->segment(4);
            $id=$this->uri->segment(3);
           $res = $this->am->selectrow('employee',array('id'=>$id));
           $name=$res->name;
           $salary=$res->salary;
            $full_day_salary=$res->salary/30;
           //print_r($full_day_salary);die;
            $half_day_salary=$full_day_salary/2;
           
             $this->db->where('MONTH(created_at)', $month);
             $this->db->where('YEAR(created_at)', date('Y'));
             $this->db->where('name', $name);
              $this->db->where('in_time >', '');
              $this->db->where('out_time >', '');
              $this->db->from("attendance");
              $full_day= $this->db->count_all_results();
             // print_r($full_day);die;
              if($full_day>23)
              {
                   $fullday=$full_day-1;
                   $amount=$fullday*$full_day_salary;
              }
              else{
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
              
             // echo $this->db->last_query();die;
              
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
              else{
                  $half_day='0';
              }
              
             // $amount1= $half_day_leave*$half_day_salary;

              $this->db->where('MONTH(created_at)', $month);
              $this->db->where('YEAR(created_at)', date('Y'));
              $this->db->where('name', $name);
              $this->db->where('leave', 'Full');
              $this->db->from("attendance");
              $full_day_leave= $this->db->count_all_results();
              
              $leave=$half_day+$full_day_leave;
              //print_r($leave);die;
              
              if($leave>1)
              {
                  $user_leave =$leave-1;
                  $amount1=$user_leave*$full_day_salary;
              }
              else{
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
              
              
              
            
             // echo $this->db->last_query();die;
               $total_amount=$salary-$amount1-$punishment_amount;
              
              echo $total_amount;
              //echo $amount+$amount1+$amount2+$amount3+$amount4;
         ?></td>
            </tr>
           
            
            <tr>
              <!--<td colspan="10"> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.-->
              <!--</td>-->
            </tr>
          </tbody>
        </table>
        </div>
    </div>
    <center>
    <a onclick="printDiv('printableArea')"rel="noopener" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Print</a></center>
      <script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>