
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
                    <th>Payment Date</th>
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
                         <td><?=$value->maintenance_cost?></td>
                             <td><?=$value->payment_received?></td>
                         <td><?=$value->payment_date?></td>
                         
                          <td><?=$value->balance?></td>
                       <td>
                    <a href="<?php echo base_url('Admin/edit_maintenance_costumers/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('Admin/delete_maintenance_costumers/').$value->id ?>" class="btn btn-flat btn-danger rounded-circle" style="background-color:#CC0000; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-trash"></i></a>
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
                    <th>Payment Date</th>
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

