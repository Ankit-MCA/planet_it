

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
                       <form action="<?=base_url()?>Admin/add_employee" enctype="multipart/form-data" method="post" id="contact-form">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
                  <input type="text" name="name" required="" class="form-control" placeholder="Name">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Mobile No</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="mobile_no" required="" class="form-control" placeholder="Mobile no">
                </div>
              </div>
            </div>

            <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="email" required="" class="form-control" placeholder="Email">
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Password</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="text" name="password" required="" class="form-control" placeholder="Password">
                </div>
              </div>
            </div>     
        </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Employee List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee List</li>
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
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  