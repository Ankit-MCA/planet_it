

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Employee Details</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee </li>
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
                      <th> SR.NO </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Mobile No </th>
                      <th> DOB </th>
                       <th> Father Name </th>
                        <th> Mother Name </th>
                        <th>Qualification</th>
                         <th>Correspondence Address</th>
                          <th>Permanent Address</th>
                           <th>Date Of Joining</th>
                            <th>Designation</th>
                             <th>Pan No</th>
                              <th>Aadhar No</th>
                               <th>Bank Name</th>
                                <th>Account No</th>
                                 <th>IFSC Code</th>
                                  <th>Salary</th>
                                   <th>Salary Increment</th>
                                    <th>Date Of Increment</th>
                      <th>Password</th>
                       <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($data)):?>
                    <?php $i=1; foreach ($data as $key => $value): ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?php echo $value->name ?></td>
                          <td><?php echo $value->email ?></td>
                          <td><?php echo $value->mobile_no ?></td>
                          <td><?php echo $value->dob ?> </td>
                          
                          <td><?php echo $value->father_name ?> </td>
                           <td><?php echo $value->mother_name ?> </td>
                            <td><?php echo $value->qulification ?> </td>
                              <td><?php echo $value->address2 ?> </td>
                                <td><?php echo $value->address ?> </td>
                                  <td><?php echo $value->date_of_joining ?> </td>
                                    <td><?php echo $value->designation ?> </td>
                                    <td><?php echo $value->pan_no ?> </td>
                                    <td><?php echo $value->aadhar_no ?> </td>
                                    <td><?php echo $value->bank_name ?> </td>
                                    <td><?php echo $value->account_no ?> </td>
                                    <td><?php echo $value->ifsc_code ?> </td>
                                    <td><?php echo $value->salary ?> </td>
                                    <td><?php echo $value->incriment ?> </td>
                                    <td><?php echo $value->date_incriment ?> </td>
                                     <td><?php echo $value->password ?> </td>
                                     <td><a href="<?php echo base_url('Admin/edit_employee_detaild/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></a></td>
                                    
                                    
                                    
                        </tr>
                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> SR.NO </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Mobile No </th>
                      <th> DOB </th>
                       <th> Father Name </th>
                        <th> Mother Name </th>
                        <th>Qualification</th>
                         <th>Correspondence Address</th>
                          <th>Permanent Address</th>
                           <th>Date Of Joining</th>
                            <th>Designation</th>
                             <th>Pan No</th>
                              <th>Aadhar No</th>
                               <th>Bank Name</th>
                                <th>Account No</th>
                                 <th>IFSC Code</th>
                                  <th>Salary</th>
                                   <th>Salary Increment</th>
                                    <th>Date Of Increment</th>
                      <th>Password</th>
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
  