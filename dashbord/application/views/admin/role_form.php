<style>
    input[type=checkbox], input[type=radio] {
    margin: 10px 0 0;
    line-height: normal;
    height:18px;
    width:18px;
}
.container {
  margin-top:0px;
  position: relative;
  padding-left: 23px;
  margin-bottom: 7px;
  cursor: pointer;
  font-size:13px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width:20px;
  background-color: #eee;
  
  border:1px solid #ccc;
}

.checkmark1 {
  position: absolute;
  top: 0;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
  
  border:1px solid #ccc;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}
.container:hover input ~ .checkmark1 {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

.container input:checked ~ .checkmark1 {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
.checkmark1:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}
.container input:checked ~ .checkmark1:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 7px;
  top: 4px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.container .checkmark1:after {
  left: 5px;
  top: 1px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.bode{
    
    background: #fff;
    box-shadow: -1px 1px 5px 2px #d2d6de;
   
}
.btn11{
   color: #000;
    font-weight: 900;
    background: #f6f6f6;
    font-size: 16px;
    padding: 10px;
    border-bottom:1px solid #ddd;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Role Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role Form</li>
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
                <h3 class="card-title">Details</h3>
              </div>
             <center> <?php if($this->session->flashdata('success_msg')): ?>             
              <alert class="alert alert-success msg"><?=$this->session->flashdata('success_msg')?></alert> 
            <?php endif ?></center>
            <form role="form" method="post"  action="<?php echo base_url() ?>admin/add_role">
                <div class="card-body">
                   <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Employee Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-name">N</i></span>
                  </div>
               <select name="name" class="form-control" required="" id="category" >
                      <option value="">Select Employee</option>
                  <?php foreach ($employee as $row){  ?>
                <option value="<?php echo $row->name;?>"> <?php echo $row->name; ?>
                         <?php  } ?>   
                     </option>
                 </select>
                </div>
              </div>
               <div class="col-md-6 form-group">
                     <label for="exampleInputPassword1">Role Name</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-role">R</i></span>
                  </div>
                 <input type="text" name="role"  class="form-control" placeholder="Enter Role" required="">
                </div>
              </div>
            </div>


            <div class="row">
            <div class="col-md-12 form-group">
                         <div class="col-md-3" >
                      <div class="bode">
                  <div class="form-group">
                
                    <span class="btn btn11"  name="leadgeneration" data-toggle="collapse" data-target="#ls1" style="width:100%;text-align:left"><i class="fa fa-list" aria-hidden="true"></i>&nbsp &nbsp Leads</span>
                    
                   <ul id="ls1" class="collapse in" style="margin-left: -12px;">
                      
                    <li style="list-style: none;">
                     
                       
                        <ul>
                            <li style="list-style: none;">
                              <label class="container">Add leads
                                  <input type="checkbox" class="ckd" name="access[]" class="checked"  name="lead" value="lead" id="lea" style="list-style:none;">
                                  <span class="checkmark"></span>
                                </label>
                                   <ul >
                                    <div id="lse"style="display: none;">                                  
                                     <label class="container"style="font-weight: 500;">Add
                                      <input type="checkbox" value="add" name="lead_action[]" / >
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Edit
                                      <input type="checkbox" value="edit" name="lead_action[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Delete
                                      <input type="checkbox" value="delete" name="lead_action[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                   
                                             </div>                         
                                </ul>
                            </li>
                        </ul>
                      
                      
                      
                      <ul>
                            <li style="list-style: none;">
                                <label class="container">Total leads
                                <input  type="checkbox" class="ckd" name="access[]" class="checked" name="leadsource" value="leadsource" id="ls" style="list-style: none;">
                                 <span class="checkmark"></span>
                                </label>
                                  <ul>
                                      <div id="lso"style="display: none;">                                  
                                     <label class="container"style="font-weight: 500;">Add
                                      <input type="checkbox" value="add" name="paymet[]" / >
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Edit
                                      <input type="checkbox" value="edit" name="paymet[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Delete
                                      <input type="checkbox" value="delete" name="paymet[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                    
                                             </div>       
                        
                                  </ul>
                            </li>
                      </ul>
                      <ul>
                            <li style="list-style: none;">
                                <label class="container">Missed Follow Up
                                <input  type="checkbox" name="access[]" class="checked" name="leadassign" id="al" value="leadassign" style="list-style: none;">
                                <span class="checkmark"></span>
                                </label>
                                  <ul>
                                      <div id="ale" style="display: none">
                                   
                                     <label class="container"style="font-weight: 500;">Add
                                      <input type="checkbox" value="add" name="employee[]" / >
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Edit
                                      <input type="checkbox" value="edit" name="employee[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Delete
                                      <input type="checkbox" value="delete" name="employee[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                   </div>
                                  </ul>
                            </li>
                      </ul>
                      <ul>
                            <li style="list-style: none;">
                                 <label class="container">Today Follow Up
                                <input  type="checkbox" class="ckd"  name="access[]" class="checked" name="myleadassign" id="mla" value="myleadassign" style="list-style: none;">
                                 <span class="checkmark"></span>
                                 </label>
                                  <ul>
                                      <div id="mle" style="display: none;">
                                       <label class="container"style="font-weight: 500;">Add
                                      <input type="checkbox" value="add" name="report[]" / >
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Edit
                                      <input type="checkbox" value="edit" name="report[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Delete
                                      <input type="checkbox" value="delete" name="report[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                         </div>         
                                  </ul>
                            </li>
                      </ul>


                       <ul>
                            <li style="list-style: none;">
                                <label class="container">Sales Done
                                <input  type="checkbox"  class="ckd" name="access[]" class="checked"  name="category" value="category" id="cat" style="list-style: none;"> 
                                <span class="checkmark"></span>
                                </label>
                                  <ul> 
                                  <div id="cate" style="display: none;">
                                        <label class="container"style="font-weight: 500;">Add
                                       <input type="checkbox" class="c" value="add" name="attendance[]" />
                                       <span class="checkmark1"></span>
                                      </label>
                                      <label class="container"style="font-weight: 500;">Edit
                                      <input type="checkbox" class="c" value="edit" name="attendance[]"/> 
                                      <span class="checkmark1"></span>
                                      </label>
                                      <label class="container"style="font-weight: 500;">Delete
                                      <input type="checkbox" class="c" value="delete" name="attendance[]"/>
                                      <span class="checkmark1"></span>
                                      </label>
                                       </div>           
                                  </ul>
                            </li>
                        </ul>


                            <ul>
                            <li style="list-style: none;">
                                 <label class="container">Meeting Done
                                <input  type="checkbox" class="ckd"  name="access[]" class="checked" name="myleadassign" id="mla1" value="myleadassign" style="list-style: none;">
                                 <span class="checkmark"></span>
                                 </label>
                                  <ul>
                                      <div id="mle1" style="display: none;">
                                       <label class="container"style="font-weight: 500;">Add
                                      <input type="checkbox" value="add" name="attendance[]" / >
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Edit
                                      <input type="checkbox" value="edit" name="attendance[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                    <label class="container"style="font-weight: 500;">Delete
                                      <input type="checkbox" value="delete" name="attendance[]"/>
                                      <span class="checkmark1"></span>
                                    </label>
                                         </div>         
                                  </ul>
                            </li>
                      </ul>



                    </li>
                  </ul>
                  </div>
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
  