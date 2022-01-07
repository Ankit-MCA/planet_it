
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Employee  List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                      <th> SR.NO </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Mobile No </th>
                      <th> Password </th>
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
                          <td><?php echo $value->password ?> </td>
                           <td>
                            <a href="<?php echo base_url('Admin/edit_employee/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></a>
                           <a href="<?php echo base_url('admin/delete_agent/').$value->id ?>" class="btn btn-flat btn-danger rounded-circle" ><i class="fa fa-trash"></i></a>
                          </td>
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
                      <th> Password </th>
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

