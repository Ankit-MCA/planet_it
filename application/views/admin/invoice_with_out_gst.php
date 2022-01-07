

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Invoice</h1>
          </div>
           <div class="col-sm-4">
            <?php $id= $this->uri->segment(3); ?>
             <a href="<?php echo base_url('Admin/invoice_with_out_gst/').$id ?>"rel="noopener"  class="btn btn-default"><i class="fas fa-file"></i> With out GST</a>
              <a href="<?php echo base_url('Admin/invoice/').$id ?>" rel="noopener"  class="btn btn-default"><i class="fas fa-file"></i> With GST</a>
          </div>
           
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid" id="printableArea">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->
<style type="text/css">@media print {
  .noPrint{
    display:none;
  }
}
h1{
  color:#f6f6;
}</style>

            <!-- Main content -->
            <div class="invoice p-3 mb-3" style="font-size:120% ">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                     <img src="<?=base_url()?>dashbord/planet.png"  height="60" width="80" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> Planet Web it Services
                     <?php  $date=date('d-m-Y'); ?>
                    <!--<small class="float-right">Date: <?php echo $data->payment_date ?></small>-->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 <p style="color: green"> From</p>
                  <address>
                  
                    <strong>Planet Web it Services .</strong><br>
                    A-88, Sector 4, <br>
                    Noida, Pin code-201301<br>
                    Phone: 01204156709,9910646680<br>
                    Email: info@planetwebit.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <p style="color: green"> To</p>
                  <address>
                
                    <strong> <?php echo $data->name ?></strong><br>
                    <?php   $res = $this->am->selectrow('lead',array('id'=>$data->user_id)); ?>
                    Address: <?php echo $res->location ?><br>
                      
                    Phone: <?php echo $res->mobile_no ?><br>
                    Email: <?php echo $res->email ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <?php $val=rand(100000,10000000); ?>
                  <!-- <b>Invoice #<?php echo $val ?></b><br> -->
                  <br>
                  <br>
                  <br>
                  <b>Invoice: #<?php echo $val ?><br>
                  <b>Payment Date:</b> <?php echo $data->payment_date ?><br>
                  <!-- <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>Project Name</th>
                      <th>Amount</th>
                      <th>Transection No</th>
                      <th>GST (18) %</th>
                      <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $data->project_type ?></td>
                      <td><?php echo $data->payment_received ?></td>
                      <td><?php echo $data->transection_no ?></td>
                      <?php $amount = $data->payment_received; 
                      $gst=$amount*18/100;
                      ?>
                      <td>-</td>
                      <td><?php echo $amount ?></td>
                     
                    </tr>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table">
                    <!--   <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr> -->
                      <tr>
                        <th>GST(18%)</th>
                        <td>-</td>
                      </tr>
                      <tr>
                        <th>Amount:</th>
                        <td><?php echo $data->payment_received ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo $amount ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a onclick="printDiv('printableArea')"rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <!--<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit-->
                  <!--  Payment-->
                  <!--</button>-->
                  <!--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">-->
                  <!--  <i class="fas fa-download"></i> Generate PDF-->
                  <!--</button>-->
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
  