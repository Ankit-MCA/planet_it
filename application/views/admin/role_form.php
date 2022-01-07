
<style>
  input[type=checkbox], input[type=radio] {
    margin: 10px 0 0;
    line-height: normal;
    height:18px;
    width:18px;
  }
  /* Create a custom checkbox */
  .checkmark-box{
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
  .bode {
    background: #fff;
    box-shadow: -1px 1px 5px 2px #d2d6de;
  }
  .btn11 {
    color: #000;
    font-weight: 900;
    background: #f6f6f6;
    font-size: 16px;
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }
  .collapse.in {
    display: block;
  }
  .check_container {
    margin-top: 0px;
    position: relative;
    padding-left: 23px;
    margin-bottom: 7px;
    cursor: pointer;
    font-size: 13px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .check_container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }
  input[type=checkbox], input[type=radio] {
    margin: 10px 0 0;
    line-height: normal;
    height: 18px;
    width: 18px;
  }
  .btn11 {
    color: #000;
    font-weight: 900 !important;
    background: #f6f6f6;
    font-size: 16px !important;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 10px !important;
  }
  .label-style{
    
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
                <option value="<?php echo $row->id;?>"> <?php echo $row->name; ?>
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



               <div class="role">
                <div class="col-md-12">
                  <div class="row">
                  <div class="col-md-3" >
                    <div class="bode">
                      <div class="form-group">
                        <span class="btn btn11" name="leadgeneration" data-toggle="collapse" data-target="#ls1" style="width:100%;text-align:left" id="leadgeneration">
                          <i class="fa fa-list" aria-hidden="true">
                          </i>&nbsp &nbsp Lead Generation
                        </span>
                        <ul id="ls1" class="collapse in" style="margin-left: -12px;">
                          <li style="list-style: none;">
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" value="lead" name="roles[]" id="lead" style="list-style: none;" onclick="getLead()">
                                  <span class="label-style">Lead</span>
                                </label>
                                <ul>
                                  <div id="lead_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="lead_add" name="sub_roles[]" / >
                                      Add 
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="lead_edit" name="sub_roles[]"/>
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="lead_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="lead_assign" name="sub_roles[]"/>
                                      Lead Assign
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="lead_remark_update" name="sub_roles[]"/>
                                      Remark Update
                                    </label>
                                  </div>       
                                </ul>
                              </li>
                            </ul>
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" name="roles[]" id="leadsource" value="completed_lead" style="list-style: none;" onclick="getLeadsource()">
                                  <span class="label-style">Completed Lead</span>
                                </label>
                                <ul>
                                  <div id="lead_source_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="add_complet" name="sub_roles[]" / >
                                      Add
                                    </label>

                                     <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="edit_complet" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="delete_complet" name="sub_roles[]"/>
                                      Delete
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
                  <div class="col-md-3" >
                    <div class="bode">
                      <div class="form-group">
                        <span class="btn btn11" name="leadgeneration" data-toggle="collapse" data-target="#ls1" style="width:100%;text-align:left">
                          <i class="fa fa-list" aria-hidden="true">
                          </i>&nbsp &nbsp Payment Recode
                        </span>
                        <ul id="ls1" class="collapse in" style="margin-left: -12px;">
                          <li style="list-style: none;">
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" name="roles[]" value="payment" id="category" style="list-style: none;" onclick="getCategory()">
                                  <span class="label-style">Payment</span>
                                </label>
                                <ul>
                                  <div id="category_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="payment_add" name="sub_roles[]" / >
                                      Add 
                                    </label>

                                     <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="payment_edit" name="sub_roles[]" / >
                                      Edit 
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="payment_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                  </div>       
                                </ul>
                              </li>
                            </ul>
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" name="roles[]" value="maintenance" id="Sub Category" style="list-style: none;" onclick="getSubcategory()">
                                  <span class="label-style">Maintenance</span>
                                </label>
                                <ul>
                                  <div id="sub_category_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="maintenance_add" name="sub_roles[]" / >
                                      Add
                                    </label>

                                     <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="maintenance_edit" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="maintenance_delete" name="sub_roles[]"/>
                                      Delete
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
                  <div class="col-md-3" >
                    <div class="bode">
                      <div class="form-group">
                        <span class="btn btn11" name="leadgeneration" data-toggle="collapse" data-target="#ls1" style="width:100%;text-align:left">
                          <i class="fa fa-list" aria-hidden="true">
                          </i>&nbsp &nbsp Payment Report
                        </span>
                        <ul id="ls1" class="collapse in" style="margin-left: -12px;">
                          <li style="list-style: none;">
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input type="checkbox" class="ckd checked checkmark-box" name="roles[]" value="payment_report" id="survey" onclick="getSurvey()" style="list-style: none;">
                                  <span class="label-style">Payment </span>
                                </label>
                                <ul>
                                  <div id="survey_div" style="display: none;">                                  
                                   <!--  <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="survey_add" name="sub_roles[]" / >
                                      Add 
                                    </label> -->
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="payment_report_edit" name="sub_roles[]"/>
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="payment_report_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                  </div>       
                                </ul>
                              </li>
                            </ul>
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" name="roles[]" value="maintenance_report" id="space_type" onclick="getSpace()" style="list-style: none;">
                                  <span class="label-style">Maintenance  </span>
                                </label>
                                <ul>
                                  <div id="space_type_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="maintenance_report_add" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="maintenance_report_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                  </div>       
                                </ul>
                              </li>
                            </ul>
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" name="roles[]" class="checked" id="sub_space_type" onclick="getSubspace()" value="other" style="list-style: none;">
                                  Other 
                                </label>
                                <ul>
                                  <div id="sub_space_type_div" style="display: none">
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="other_add" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="other_delete" name="sub_roles[]"/>
                                      Delete
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
                  <div class="col-md-3" >
                    <div class="bode">
                      <div class="form-group">
                        <span class="btn btn11" name="leadgeneration" data-toggle="collapse" data-target="#ls1" style="width:100%;text-align:left">
                          <i class="fa fa-list" aria-hidden="true">
                          </i>&nbsp &nbsp Employee Details
                        </span>
                        <ul id="ls1" class="collapse in" style="margin-left: -12px;">
                          <li style="list-style: none;">
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" name="roles[]" value="employee" id="state" onclick="getState()" style="list-style: none;">
                                  <span class="label-style">Employee</span>
                                </label>
                                <ul>
                                  <div id="state_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="employee_add" name="sub_roles[]" / >
                                      Add 
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="employee_edit" name="sub_roles[]" / >
                                      Edit 
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="employee_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                  </div>       
                                </ul>
                              </li>
                            </ul>
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input  type="checkbox" class="ckd checked checkmark-box" value="salary" name="roles[]" id="city" onclick="getCity()" style="list-style: none;">
                                  <span class="label-style"> Salary</span>
                                </label>
                                <ul>
                                  <div id="city_div" style="display: none;">                                  
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="salary_add" name="sub_roles[]" / >
                                      Add
                                    </label>
                                     <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="salary_edit" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="salary_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                  </div>       
                                </ul>
                              </li>
                            </ul>
                            <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input type="checkbox" name="roles[]" class="checked" id="location" onclick="getLocation()" style="list-style: none;" value="attendance">
                                  Attendance 
                                </label>
                                <ul>
                                  <div id="location_div" style="display: none">
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="attendance_add" name="sub_roles[]" / >
                                      Add
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="attendance_edit" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="attendance_delete" name="sub_roles[]"/>
                                      Delete
                                    </label>
                                  </div>
                                </ul>
                              </li>
                            </ul>

                              <ul>
                              <li style="list-style: none;">
                                <label class="container">
                                  <input type="checkbox" name="roles[]" class="checked" id="locationlist" onclick="getLocationlist()" style="list-style: none;" value="attendance_list">
                                  Attendance List
                                </label>
                                <ul>
                                  <div id="location_list" style="display: none">
                                    
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="attendance_edit" name="sub_roles[]" / >
                                      Edit
                                    </label>
                                    <label class="container"style="font-weight: 500;">
                                      <input type="checkbox" value="attendance_delete" name="sub_roles[]"/>
                                      Delete
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


  <script src="https://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript">
</script>
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>

<script>
  function getLocation()
  {
    var loc = $('#location').val();
    $('#location_div').show();
  }

  function getLocationlist()
  {
    var loc = $('#locationlist').val();
    $('#location_list').show();
  }

  function getCity()
  {
    var city = $('#city').val();
    $('#city_div').show();
  }

  function getState()
  {
    var state = $('#state').val();
    $('#state_div').show();
  }

  function getSurvey()
  {
    var survey = $('#survey_div').val();
    $('#survey_div').show();
  }

  function getSpace()
  {
    var space = $('#space_type_div').val();
    $('#space_type_div').show();
  }

  function getSubspace()
  {
    var subspace = $('#sub_space_type').val();
    $('#sub_space_type_div').show();
  }

  function getCategory()
  {
    var category = $('#category_div').val();
    $('#category_div').show();
  }

  function getSubcategory()
  {
    var sub_space = $('#sub_category_div').val();
    $('#sub_category_div').show();
  }

  function getDesignation()
  {
    var designation = $('#designation').val();
    $('#designation_div').show();
  }

  function getDepartment()
  {
    var department = $('#department').val();
    $('#department_div').show();
  }

  function getRole()
  {
    var role = $('#role_div').val();
    $('#role_div').show();
  }

  function getUser()
  {
    var user = $('#user').val();
    $('#user_div').show();
  }

  function getLevel()
  {
    var level = $('#level').val();
    $('#level_div').show();
  }

  function getMyassignlead()
  {
    var my_assign_lead = $('#my_assign_lead').val();
    $('#my_assign_lead_div').show();
  }

  function getAssignlead()
  {
    var assign_lead = $('#assign_lead').val();
    $('#assign_lead_div').show();
  }

  function getLeadsource()
  {
    var leadsource = $('#leadsource').val();
    $('#lead_source_div').show();
  }

  function getLead()
  {
    var lead = $('#lead').val();
    $('#lead_div').show();
  }
</script>



  