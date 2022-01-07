

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                 <h3><?php 
              $this->db->from("lead");
              echo $this->db->count_all_results();
                ?></h3>
              <p>Total Leads</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!--<a href="<?=base_url()?>Admin/alllead_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
               <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                 <h3><?php 
               $this->db->where('stage','');
               $this->db->where('assigned_to','');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>
              <p>New Leads</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/lead_list') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                  <h3><?php 
               $date=date('Y-m-d');
              $this->db->where('follow_up_date <',$date);
              $this->db->where('stage','Follow Up');

              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Total Missed Follow Ups</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('admin/missed_lead') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
               
              <h3><?php 
              $date=date('Y-m-d');
              $this->db->where('follow_up_date',$date);
              $this->db->where('stage','Follow Up');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Total Today Follow Ups</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('admin/today_lead') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                
              <h3><?php 
              $this->db->where('stage','meeting done');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Meeting Done</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/meeting_done') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
              $this->db->where('stage','Sale done');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Sale Done</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/sale_done') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                 <h3><?php 
              $this->db->where('stage','Not Interested');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Not Interested</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('admin/not_interested') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3><?php 
             $date=date('Y-m-d');
              $this->db->where('follow_up_date >',$date);
              $this->db->where('stage','Follow Up');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Follow Up</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('admin/follow_up') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                
              <h3><?php 
              $this->db->where('stage','Other requirement');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Purchase From Other </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('admin/other_requirement') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                
              <h3><?php 
              $this->db->where('stage','Not Contact');
              $this->db->from("lead");
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?> </h3>

              <p>Not Contact</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('admin/not_contact') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


           <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                
              <h3><?php 
              $this->db->where('status','1');
              $this->db->from("employee");
              
              echo $this->db->count_all_results();
              //echo $this->db->last_query();die;
                ?></h3>

              <p>Total Employee</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url();?>Admin/employee_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                
             <h3><?php 
              $this->db->where("assigned_to >",'0');
              $this->db->from("lead");
              echo $this->db->count_all_results();
             // echo $this->db->last_query();die;
                ?></h3>

              <p>Total Assign Leads</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url();?>Admin/assignlead_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <!--<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                
             <h3><?php 
              $date =date('Y-m-d');
              $this->db->where("updated_at",$date);
              $this->db->from("lead");
              echo $this->db->count_all_results();
            //  echo $this->db->last_query();die;
                ?></h3>

              <p>Total Today Lead Work</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url();?>Admin/today_lead_work" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 