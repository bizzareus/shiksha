
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Shiksha</title>
	
	</head>
		
<body>
	
	
	<section class="panel">
    <header class="panel-heading"><i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data." data-original-title="" title=""></i> 
    </header>
	<section id="content"> 
	<form action="/shiksha/Student/viewstudent/" method="post">
	<div class="student-content"> <br> 	
		<div class="row">
		
		<div class="col-xs-5"><div class="form-group">
    <label class="col-sm-5 control-label">Choose a school</label>
    <div class="col-sm-6">
        <select name="schoolid" class="form-control m-b">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option>option 2</option>
            <option>option 3</option>
            <option>option 4</option>
        </select>
        
    </div>
</div></div>
		<div class="col-xs-5"><label class="col-sm-4 control-label">Select a grade</label>
    <div class="col-sm-7">
        <select name="grade" class="form-control m-b">
            <option value="1">1st</option>
            <option value="2">2nd</option>
            <option value="3">3rd</option>
            <option value="4">4th</option>
            <option value="5">5th</option>
        </select></div>
		</div>
	<div class="col-xs-2">
		<input type="submit" class="btn btn-primary">
	</div></form>
	</section>
    <div class="table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
            <div class="row">
              
                <div id="DataTables_Table_0_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
            </div>
            <table class="table table-striped m-b-none dataTable" data-ride="datatables" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <thead>
                    <tr role="row">
                        <th width="10%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Student ID</th>
                        <th width="15%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >First Name</th>
                        <th width="20%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Fathers Name</th>
                        <th width="20%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Gender</th>
                        <th width="5%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Age</th>
                        <th width="5%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Class</th>
                        <th width="10%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >SchoolID</th>
                       <!-- <th width="10%" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Options</th>
                    --></tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    			<?php 	if(empty($StudentProfile)) { echo "<div class='col-xs-9 col-sm-12 alert alert-warning'> No Records Found! </div>"; } ?>

					<?php
					
	foreach ($StudentProfile as $s)
		{
			
?>

					<tr class="odd">
                        <td class=""><?php echo $s["Student"]["Stud_id"]; ?></td>
                        <td class=""><?php echo $s["Student"]["Student_Name"]; ?></td>
                        <td class=""><?php echo $s["Student"]["Fathers_Name"]; ?></td>
                        <td class=""><?php if($s["Student"]["Gender"] == "1") { echo "Female"; } else if ($s["Student"]["Gender"] == "0") { echo "Male"; } ?></td>
                        <td class=""><?php echo $s["Student"]["Age"]; ?></td>
                        <td class=""><?php echo $s["Student"]["Class"]; ?></td>
                        <td class=""><?php echo $s["Student"]["School_id"]; ?></td>
                        <!--<td class=""><a href="#">Edit </a> | <a href="#">Delete</a></td>-->
                    </tr>
					
					<?php } ?>
                    
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6">
                  
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
    </div>
</section>
	