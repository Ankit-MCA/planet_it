<!DOCTYPE html>
<html lang="en">
<style>
    td,
    th {
        font-size: 14px;
    }
</style>

<head>
    <title>Quatation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div> <input type="text" class="form-control" style="margin-bottom: 3px;" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });
            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap_add"); //Fields wrapper
            var add_button = $(".add_field_button_down"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div> <input type="text" class="form-control" style="margin-bottom: 3px;" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });
            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_termsCondition"); //Fields wrapper
            var add_button = $(".add_field_termsCondition"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div> <input type="text" style="margin: 5px; border: 1px darkgrey; width: 776px;" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });
            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
    <script>
        function myFunction2(ele,tableRowCurrentCounter) {
            var x = document.createElement("TEXTAREA");
            var t = document.createTextNode("");
            x.classList.add("form-control");
            x.appendChild(t);
            document.getElementById("description-area-gst"+tableRowCurrentCounter).appendChild(x);
            ele.style.display = "none";
        }
        function myDeleteGSTFunction(ind) {
            var ind1=ind.rowIndex;
            var ind2=ind.nextSibling.rowIndex;
            var ind3=ind.nextSibling.nextSibling.rowIndex;

        document.getElementById("igst-table").deleteRow(ind1);
            document.getElementById("igst-table").deleteRow(ind2);
            document.getElementById("igst-table").deleteRow(ind3);
        }
    </script>

    <script>
        function myFunction3(ele) {
            var x = document.createElement("TEXTAREA");
            var t = document.createTextNode("");
            x.classList.add("form-control");
            x.appendChild(t);
            document.getElementById("description-area").appendChild(x);
            ele.style.display = "none";
        }
        function myDeleteFunction(ind) {
            var ind1=ind.rowIndex;
            var ind2=ind.nextSibling.rowIndex;
            var ind3=ind.nextSibling.nextSibling.rowIndex;

        document.getElementById("igst-table").deleteRow(ind1);
            document.getElementById("igst-table").deleteRow(ind2);
            document.getElementById("igst-table").deleteRow(ind3);
        }
    </script>
    <!-- //GST Table -->
    <script>
        function myCreateFunction() {
            var table = document.getElementById("igst-table").getElementsByTagName('tbody')[0];
            var tableRowCount=table.rows.length;
            // tableRowCount=tableRowCount+1;
            var row = table.insertRow(tableRowCount);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            
            cell1.innerHTML = "<input type='text' class='form-control' placeholder='Item Name (Required)'>";
            cell2.innerHTML = "<input type='number' class='form-control' min='1' value='1'>";
            cell3.innerHTML = "<input type='number' class='form-control' min='1' value='1'>";
            cell4.innerHTML = "<input type='number' class='form-control' min='1' value='1'>";
            cell5.innerHTML = "<input type='number' class='form-control' min='1' value='1'>";
            cell6.innerHTML = "<input type='number' class='form-control' min='1' value='1'>";
            cell7.innerHTML = "<button class='btn btn-sm' aria-label='Close' onclick='myDeleteGSTFunction(this.parentNode.parentNode)'> X</button>";
        
            var row2 = table.insertRow(++tableRowCount);
            var cell8 = row2.insertCell(0);
            cell8.id="description-area-gst"+tableRowCount;
            cell8.colSpan="7";
            cell8.innerHTML = "";

            var row3= table.insertRow(++tableRowCount);
            var cell9 = row3.insertCell(0);
            cell9.innerHTML = "<button class='btn btn-info mb-2' onclick='myFunction2(this,"+(tableRowCount-1)+")'>+ Add Description</button>        <input type='file' accept='image/*' />";
            
        }
    <!-- // Without GST Table -->
    
        function myDeleteFunction(ind) {
            document.getElementById("without-igst-table").deleteRow(ind);
        }
    </script>
</head>

<body>
    <div style="height:1240px; width:874px; margin:auto">
        <h1>
            <center>Quatation</center>
        </h1>

        <table style="width:100%" class="table-sm">
            <tr>
                <td width="15%">Quatation No *</td>
                <td>00001</td>
                <!-- <td rowspan="4">s </td> -->
            </tr>
            <tr>
                <td>Quatation Date *</td>
                <td><input type="date" id="day" name="QuatationDate"></td>
            </tr>

            <tr>
                <td>Due Date</td>
                <td><input type="date" id="day" name="QuatationDate"></td>
            </tr>
            <!-- <tr>
                <td colspan="4">
                    <div class="input_fields_wrap">
                        <button class="add_field_button btn btn-info mb-2">Add More Fields</button>
                        <div>
                            
                        </div>
                    </div>
                </td>
            </tr> -->
        </table>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <h5>Quatation Form <small> (Your Details) </small></h5>
                <select class="form-control">
                    <option value="1t">1t</option>
                </select>
                <br>
                <script>
                    $(document).ready(function () {
                        $("#editleftbutton").click(function () {
                            $("#id_business_name_box").show();
                            $("#id_address_box").show();
                        });
                    });
                </script>
                <div class="card">
                    <div class="card-body">Business details
                        <button class="pull-right btn btn-sm border border-info" id="editleftbutton">
                            <i class="fa fa-edit"></i>
                            Edit
                        </button>
                    </div>
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr>
                                <td width="30%">Business Name </td>
                                <td width="70%"><input type="text"
                                        style="width: auto; border:none; border-bottom: 1px solid grey;width:100%; display: none;"
                                        id="id_business_name_box" value=""></td>
                            </tr>
                            <tr>
                                <td width="30%">Address </td>
                                <td width="70%"><input type="text"
                                        style="width: auto; border:none; border-bottom: 1px solid grey;width:100%;display: none;"
                                        id="id_address_box" value=""></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">Footer</div>
                </div>
            </div>
            <div class="col-sm-6">
                <h5>Quatation Form <small> (Your Details) </small></h5>
                <select class="form-control">
                    <option value="1t">1t</option>
                </select>
                <br>
                <script>
                    $(document).ready(function () {
                        $("#rightbtn").click(function () {
                            $("#id_business_name_box1").toggle();
                            $("#business_nm").toggle();
                            $("#business_email").toggle();
                            $("#business_phone").toggle();
                            $("#business_add").toggle();
                        });
                    });
                </script>
                <div class="card">
                    <div class="card-body">Business details
                        <button class="pull-right btn btn-sm border border-info" id="rightbtn">
                            <i class="fa fa-edit"></i>
                            Edit
                        </button>
                    </div>
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr>
                                <td width="30%">Business Name </td>
                                <td width="70%"><input type="text"
                                        style="width: auto;border:none;border-bottom: 1px solid grey;width:100%;display: none;"
                                        id="id_business_name_box1" value=""></td>
                            </tr>
                            <tr>
                                <td width="30%">Name </td>
                                <td width="70%"><input type="text"
                                        style="width: auto;border:none;border-bottom: 1px solid grey;width:100%;display: none;"
                                        id="business_nm" value=""></td>
                            </tr>
                            <tr>
                                <td width="30%">Email </td>
                                <td width="70%"><input type="text"
                                        style="width: auto;border:none;border-bottom: 1px solid grey;width:100%;display: none;"
                                        id="business_email" value=""></td>
                            </tr>
                            <tr>
                                <td width="30%">Phone no. </td>
                                <td width="70%"><input type="text"
                                        style="width: auto;border:none;border-bottom: 1px solid grey;width:100%;display: none;"
                                        id="business_phone" value=""></td>
                            </tr>
                            <tr>
                                <td width="30%">Address </td>
                                <td width="70%"><input type="text"
                                        style="width: auto;border:none;border-bottom: 1px solid grey;width:100%;display: none;"
                                        id="business_add" value=""></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        <script>
            function getElement(ID) {
                return document.getElementById(ID);
            }
            function showTable(tableID) {
                var tables = ['id_mainTable', 'id_ppnTable', 'id_hsnTable'];
                for (var i = 0; i < tables.length; i++) {
                    getElement(tables[i]).style.display = "none";
                }
                getElement(tableID).style.display = "block";
            }

        </script>
        <script>
            function showHideTaxTables(sourceID, targetID) {
                // document.getElementById(sourceID).style.visibility = "hidden";
                // document.getElementById(targetID).style.visibility = "visible";
                document.getElementById(sourceID).style.display = "none";
                document.getElementById(targetID).style.display = "block";
            }
        </script>
        <div class="m-3">
            <input type="radio" name="taxSelectionRadio" id="with-gst"
                onclick="showHideTaxTables('without-igst-table','igst-table')">
            <i class="fa fa-inr" aria-hidden="true"></i> GST
            <input type="radio" name="taxSelectionRadio" id="without-gst"
                onclick="showHideTaxTables('igst-table','without-igst-table')">Without GST
        </div>
      
        <br>

        <table class="table table-sm" cellspadding="0" cellspacing="0" id="igst-table" style="width: 100%;">

            <tr style="background-color: blueviolet; color:white;">
                <td width="35%" style="padding: 10px;">Item</td>
                <td width="15%" style="padding: 10px;">Quantity</td>
                <td width="10%" style="padding: 10px;">Rate</td>
                <td width="10%" style="padding: 10px;">CGST</td>
                <td width="10%" style="padding: 10px;">SGST</td>
                <td width="15%" style="padding: 10px;">Amount</td>
                <td width="5%"></td>
            </tr>
            <tbody id="body_IGSTtable">
        </tbody>
        </table> 
                <button class="btn btn-sm btn-secondary" onclick="myCreateFunction()" style="width: 100%;">
                    <i class="fa fa-plus"></i> Add New Line</button>
            
        <table class="table table-sm" cellspadding="0" cellspacing="0" id="without-igst-table" style="width: 100%;">
            <tr style="background-color: blueviolet; color:white;">
                <td width="35%" style="padding: 10px;">Item</td>
                <td width="20%" style="padding: 10px;">Quantity</td>
                <td width="20%" style="padding: 10px;">Rate</td>
                <td width="20%" style="padding: 10px;">Amount</td>
                <td width="5%"></td>
            </tr>
            <tr style="background-color: whitesmoke;" id="id_mainTable">
                <td width="35%">
                    <input type="text" class="form-control" placeholder="Item Name (Required)">
                </td>
                <td width="20%">
                    <input type="number" class="form-control" min="1" value="1">
                </td>
                <td width="20%">
                    <input type="number" class="form-control" min="1" value="1">
                </td>
                <td width="20%">
                    <input type="number" class="form-control" min="1" value="1">
                </td>
                <td width="5%">
                    <button class="btn btn-sm" aria-label="Close"
                        onclick="myDeleteFunction(this.parentNode.parentNode.rowIndex)"> X</button>
                </td>
            </tr>
            <tr>
                <td id="description-area" colspan="5"></td>
            </tr>
            <tr style="background-color: rgb(252, 248, 248);">
                <td colspan="5">
                    <button class="btn btn-info mb-2" onclick="myFunction3(this)">+ Add Description</button>
                    <input type="file" accept="image/*" />
                </td>
            </tr>
            <tr>
                        <td colspan="7">
                            <button class="btn btn-sm btn-secondary" onclick="CreateFunction()" style="width: 100%;">
                                <i class="fa fa-plus"></i> Add New Line</button>
                        </td>
                    </tr>
        </table>

      
        <table class="" style="width:100%">
            <tr>
                <td width="60%">
                </td>
                <td width="40%">
                    <button class="btn btn-sm">
                        <i class="fa fa-tag"></i> Add Discount
                    </button><br>
                    <div class="input_fields_wrap">
                        <button class="add_field_button btn btn-sm mb-2"><i class="fa fa-plus"></i> Add
                            Additional Charge</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <h5>Total (INR) <span style="float: right;"> <i class="fa fa-inr"
                                        aria-hidden="true"></i></span></h5>
                        </div>

                        <div class="col-sm-7">
                            <input type="text" value="1" style="border: none;text-align: right;">
                        </div>
                    </div>
                    <hr>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    Total (in words)<br>One Rupee Only
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <hr>
                    <div class="input_fields_wrap_add">
                        <button class="add_field_button_down btn btn-info mb-2 "><i class="fa fa-plus"></i> Add
                            More Fields</button>
                        <div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr style="background-color: whitesmoke;">
                <td colspan="2"><h4>Terms & conditions</h4></td>
            </tr>
            <tr style="background-color: whitesmoke;">
                <td colspan="2">
                    <br>1. Please pay within 15 days from the date of invoice. overdue interest @ 14% will be
                    chargedon delayed payments.
                    <hr>
                </td>
            </tr>
            <tr style="background-color: whitesmoke;">
                <td colspan="2">2. Please quote invoice number when temiting fund.
                    <hr>
                </td>
            </tr>
            <tr style="background-color: whitesmoke;">
                <td colspan="4">
                    <div class="input_fields_termsCondition">
                        </div>
                        <button class="add_field_termsCondition btn btn-sm mb-2"><i class="fa fa-plus"></i> Add New
                            Terms & Conditions</button>
                    </div>
                </td>
                <td></td>
            </tr>
            <!-- <tr>
                <td>
                    <button class="btn btn-sm"><i class="fa fa-file-text"></i> Add Note</button><br>
                    <button class="btn btn-sm"><i class="fa fa-paperclip"></i> Add Attatchments</button>
                </td>
                <td>
                    <button class="btn btn-sm pull-right"><i class="fa fa-pencil"></i> Add Signature</button>
                </td>
            </tr> -->

            <tr style="background-color: whitesmoke;">
                <td colspan="2">
                    <h5><u>Your Contact Details</u></h5>
                    <div class="row">
                        <div class="col-sm-3">For any query reach out via email at
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-sm-1">or call on <i class="fa fa-phone"></i></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br><br>
                    <input type="checkbox"> This is a recurring invoice.
                    <br>
                    <small>
                        A draft invoice will be created with same details every next period
                    </small>
                    <center>
                        <hr>
                        <button type="button" class="btn btn-info btn-sm mb-3">Save For Draft</button>
                        <button type="button" class="btn btn-success btn-sm mb-3">Save & Continue</button>
                    </center>
                </td>
            </tr>
        </table>
    </div>
    <script type="text/javascript">
        function none() {
            $("#none").click(function () {
                $("#none_form").show();
                $("#vat_form").hide();
                $("#formtwo").hide();
            });
        }
        function vat() {
            $("#vat").click(function () {
                $("#vat_form").show();
                $("#none_form").hide();
                $("#formtwo").hide();
            });
        }
    </script>
</body>

</html>