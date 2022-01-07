

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Salary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Salary</li>
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
                <h3 class="card-title">Salary Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
                       <form action="<?=base_url()?>Admin/add_salary" enctype="multipart/form-data" method="post" id="contact-form">
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-3 form-group">
                     <label for="exampleInputPassword1">Employee Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="nav-icon fas fa-money-check-alt"></i></span>
                  </div>
                 <select name="emp_id" class="form-control" required="" id="" >
                      <option value="">Select Employee</option>
                  <?php foreach ($employee as $row){  ?>
                <option value="<?php echo $row->id;?>"> <?php echo $row->name; ?>
                         <?php  } ?>   
                     </option>
                 </select>
                </div>
              </div>
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
  </div>
  