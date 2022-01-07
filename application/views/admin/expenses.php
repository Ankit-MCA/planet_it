

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expenses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses Form</li>
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
                <h3 class="card-title">Expenses Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
                       <form action="<?=base_url()?>Admin/add_expenses" enctype="multipart/form-data" method="post" id="contact-form">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Amount</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="nav-icon fas fa-money-check-alt"></i></span>
                  </div>
                  <input type="text" name="amount" required="" class="form-control" placeholder="">
                </div>
              </div>
               <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Date</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" name="date" required="" class="form-control" placeholder="">
                </div>
              </div>
                   <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Remark</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-note"></i></span>
                  </div>
                  <input type="text" name="remark" required="" class="form-control" placeholder="">
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
            <h4>Expenses List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses List</li>
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
                      <th> Amount </th>
                      <th> Date </th>
                      <th> Remark</th>
                     
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($data)):?>
                    <?php $i=1; foreach ($data as $key => $value): ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?php echo $value->amount ?></td>
                          <td><?php echo $value->date ?></td>
                          <td><?php echo $value->remark ?></td>
                         
                           <td>
                             <a href="<?php echo base_url('Admin/edit_expenses/').$value->id ?>" class="btn btn-flat btn-success rounded-circle" style="background-color:#4caf50; color:white; border-radius:5px; padding:5px 11px; font-size: 14px;" ><i class="fa fa-edit"></i></a>
                           <a href="<?php echo base_url('Admin/delete_expenses/').$value->id ?>" class="btn btn-flat btn-danger rounded-circle" ><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                         <?php endforeach ?>
                        <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th> SR.NO </th>
                      <th> Amount </th>
                      <th> Date </th>
                      <th> Remark</th>
                     
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
  