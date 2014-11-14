<section class="panel"> 

<header class="panel-heading bg-light"> 
<ul class="nav nav-tabs nav-justified"> 
<li class="active"><a href="#schoollevel" data-toggle="tab">School Level Evaluation</a></li> 
<li ><a href="#districtlevel" data-toggle="tab">District Level Evaluation</a></li> 
<li ><a href="#blocklevel" data-toggle="tab">Block Level Evaluation</a></li> 
</ul> </header> 

<div class="panel-body"> 

	<div class="tab-content"> 

		<div class="tab-pane active" id="schoollevel">

			<div class="col-lg-6">

	<form action="/shiksha/Filter/ready" id="FilterIndexForm" method="post" accept-charset="utf-8"> 

		 <h4> <span class="label label-sm bg-warning" style="font-weight:100;">Step 1 </span>&nbsp;&nbsp;&nbsp; Choose Case </h4>
			<select name="case[]" class="form-control m-b" > 
			  <option value="overall-performance">Overall Performance</option>
			  <option value="gender-wise-1">Gender Wise</option>
			</select>
				
		<h4> <span class="label label-sm bg-warning" style="font-weight:100;">Step 2 </span>&nbsp;&nbsp;&nbsp; Choose Parameter </h4>
			<select name="parameter[]" class="form-control m-b" multiple="multiple" style="height: 100px;" > 
				<option value="q1"> Connecting </option>
				<option value="q2"> Understanding </option>
				<option value="q3"> Operational </option>
				<option value="q4"> Analytical </option>
				<option value="q5"> Application </option>
			</select>
		<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 3 </span>&nbsp;&nbsp;&nbsp;Choose District </h4>
			<select name="district[]"  class="form-control m-b" multiple="multiple" id="district" onchange="getBlock();"> 
				<?php foreach ($districts as $district) : 	?>
				<option value="<?php echo $district['Filter']['Name_Dist']; ?>"> <?php echo $district['Filter']['Name_Dist']; ?> </option>
				<?php endforeach ?>
				</select>
		<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 4 </span>&nbsp;&nbsp;&nbsp;Choose Block </h4>
		
				 <select name="block-name[]"  class="form-control m-b block-name1" id="Block" multiple="multiple"> </select>
				 
		<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 5 </span>&nbsp;&nbsp;&nbsp; Choose School Name </h4>
			<select name="school-name[]" class="form-control m-b" id="school-name" multiple="multiple"></select>
						 
			</div>
			<div class="col-lg-6">
		<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 6 </span>&nbsp;&nbsp;&nbsp; Choose Test </h4>
			<select name="test-type[]" class="form-control m-b" > 
			  <option value="1">Pre Test</option>
			  <option value="2">Post Test</option>
			  <option value="3">Augmentation</option>
			</select>
				
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp; Choose Class </h4>
			 <select name="Class[]"  class="form-control m-b class1" id="Class" multiple="multiple"> 
					<!--<option value="0"> --Class-- </option>-->

				</select>
				
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp;Choose Subject </h4>
				<select name="Subject[]"  class="form-control m-b" id="Subject" onchange="getChapter();" multiple="multiple" > 		<option value="0"> --Subject-- </option>
			</select>
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp; Choose Chapter </h4>
					 <select name="Chapter[]"  class="form-control m-b" id="Chapter" multiple="multiple"> 
					<!--<option value="0"> --Chapter-- </option> -->

				</select>
				<!--
				<h3> Choose Gender </h3>
			 <select name="Gender[]"  class="form-control m-b" id="Gender" multiple="multiple"> 
				<option value="1"> Male </option>
				<option value="2"> Female </option>
				</select> -->
				
				</div> </div>
<div class="tab-pane" id="districtlevel">
	
	<div class="col-lg-6">

	<form action="/shiksha/Filter/ready" id="FilterIndexForm" method="post" accept-charset="utf-8"> 

		 <h4> <span class="label label-sm bg-warning" style="font-weight:100;">Step 1 </span>&nbsp;&nbsp;&nbsp; Choose Case </h4>
			<select name="case[]" class="form-control m-b" > 
			  <option value="overall-performance">Overall Performance</option>
			  <option value="gender-wise-1">Gender Wise</option>
			</select>
				
		<h4> <span class="label label-sm bg-warning" style="font-weight:100;">Step 2 </span>&nbsp;&nbsp;&nbsp; Choose Parameter </h4>
			<select name="parameter[]" class="form-control m-b" multiple="multiple" style="height: 100px;" > 
				<option value="q1"> Connecting </option>
				<option value="q2"> Understanding </option>
				<option value="q3"> Operational </option>
				<option value="q4"> Analytical </option>
				<option value="q5"> Application </option>
			</select>
		<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 3 </span>&nbsp;&nbsp;&nbsp;Choose District </h4>
			<select name="district[]"  class="form-control m-b" multiple="multiple" id="district"> 
				<?php foreach ($districts as $district) : 	?>
				<option value="<?php echo $district['Filter']['Name_Dist']; ?>"> <?php echo $district['Filter']['Name_Dist']; ?> </option>
				<?php endforeach ?>
				</select>
				
<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 5 </span>&nbsp;&nbsp;&nbsp; Choose Test </h4>
			<select name="test-type[]" class="form-control m-b" multiple="multiple"> 
			  <option value="1">Pre Test</option>
			  <option value="2">Post Test</option>
			  <option value="3">Augmentation</option>
			</select>
								
			</div>
			<div class="col-lg-6">
		
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp; Choose Class </h4>
			 <select name="Class[]"  class="form-control m-b class2" id="Class" multiple="multiple"> 
					<!--<option value="0"> --Class-- </option>-->

				</select>
				
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp;Choose Subject </h4>
				<select name="Subject[]"  class="form-control m-b" id="Subject" onchange="getChapter();" multiple="multiple" > 		<option value="0"> --Subject-- </option>
			</select>
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp; Choose Chapter </h4>
					 <select name="Chapter[]"  class="form-control m-b" id="Chapter" multiple="multiple"> 
					<!--<option value="0"> --Chapter-- </option> -->

				</select>
				<!--
				<h3> Choose Gender </h3>
			 <select name="Gender[]"  class="form-control m-b" id="Gender" multiple="multiple"> 
				<option value="1"> Male </option>
				<option value="2"> Female </option>
				</select> -->
				
	
	
	
	
</div> 

			</div> 
			
			<div class="tab-pane" id="blocklevel">
	
	<div class="col-lg-6">

	<form action="/shiksha/Filter/ready" id="FilterIndexForm" method="post" accept-charset="utf-8"> 

		 <h4> <span class="label label-sm bg-warning" style="font-weight:100;">Step 1 </span>&nbsp;&nbsp;&nbsp; Choose Case </h4>
			<select name="case[]" class="form-control m-b" > 
			  <option value="overall-performance">Overall Performance</option>
			  <option value="gender-wise-1">Gender Wise</option>
			</select>
				
		<h4> <span class="label label-sm bg-warning" style="font-weight:100;">Step 2 </span>&nbsp;&nbsp;&nbsp; Choose Parameter </h4>
			<select name="parameter[]" class="form-control m-b" multiple="multiple" style="height: 100px;" > 
				<option value="q1"> Connecting </option>
				<option value="q2"> Understanding </option>
				<option value="q3"> Operational </option>
				<option value="q4"> Analytical </option>
				<option value="q5"> Application </option>
			</select>
		<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 3 </span>&nbsp;&nbsp;&nbsp;Choose District </h4>
			<select name="district[]"  class="form-control m-b" multiple="multiple" id="district" onchange="getBlock();"> 
				<?php foreach ($districts as $district) : 	?>
				<option value="<?php echo $district['Filter']['Name_Dist']; ?>"> <?php echo $district['Filter']['Name_Dist']; ?> </option>
				<?php endforeach ?>
				</select>
				
								<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 4 </span>&nbsp;&nbsp;&nbsp;Choose Block </h4>
							 <select name="block-name[]"  class="form-control m-b block-name2" id="Block" multiple="multiple"> </select>

				<h4><span class="label label-sm bg-warning" style="font-weight:100;">Step 5 </span>&nbsp;&nbsp;&nbsp; Choose Test </h4>
			<select name="test-type[]" class="form-control m-b" multiple="multiple"> 
			  <option value="1">Pre Test</option>
			  <option value="2">Post Test</option>
			  <option value="3">Augmentation</option>
			</select>
				
			</div>
			<div class="col-lg-6">
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp; Choose Class </h4>
			 <select name="Class[]"  class="form-control m-b class3" id="Class" multiple="multiple"> 
					<!--<option value="0"> --Class-- </option>-->

				</select>
				
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp;Choose Subject </h4>
				<select name="Subject[]"  class="form-control m-b" id="Subject" onchange="getChapter();" multiple="multiple" > 		<option value="0"> --Subject-- </option>
			</select>
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp; Choose Chapter </h4>
					 <select name="Chapter[]"  class="form-control m-b" id="Chapter" multiple="multiple"> 
					<!--<option value="0"> --Chapter-- </option> -->

				</select>
				
		<h4><span class="label label-sm bg-info" style="font-weight:100;"> Optional </span>&nbsp;&nbsp;&nbsp;Choose Gender </h4>
			 <select name="Gender[]"  class="form-control m-b" id="Gender" multiple="multiple"> 
				<option value="1"> Male </option>
				<option value="2"> Female </option>
				</select> 				
	
	
	
	
</div> 

			</div>
			
			
			
			
			</div> 
			</div>
			<div align="center">
			<input type="submit" class="btn btn-s-lg btn-info" name="submit"> 
			</div> <br><br></section>


<?php 

/* $this->Js->get('#district')->event(
'change',
$this->Js->request(
    array('controller' => 'Filter', 'action' => 'getBlockName'),
        array(
            'async' => true, 
            'update' => '#block-name',
            'dataExpression' => true, 
            'method' => 'post', 
			'dataType' => 'text',
			'data' => $this->Js->serializeForm(array('isForm' => false, 'inline' => true))
        )
    )
);

 */

?>
<script>
$('#Class').change(function() {
var Class = $('#Class').val()
$.ajax({
    type: 'GET',
    url: '/shiksha/Filter/getSubject',
	cache: false,
    data: 'Class=' + Class,
    //dataType: 'json',
    success: function( data ) {
	var json = JSON.parse(data);
          for(var i=0; i<json.length; i++)
		{
			var SubjectID = json[i].Subject.Subj_id;
			var SubjectName = json[i].Subject.Subj_Name;
			var Class = json[i].Subject.class;
			$('#Subject').append("<option value='" + SubjectID + "'>"+SubjectName+"("+Class+")</option>");
					
		}  
    }
});
});

function getChapter () {

var subj_id = $('#Subject').val();
$.ajax({
    type: 'GET',
    url: '/shiksha/Filter/getChapters',
	data: 'SubjectID=' + subj_id,
    success: function( data ) {
	var json = JSON.parse(data);
           for(var i=0; i<json.length; i++)
		{
			var ChapterName = json[i].Chapter.chapter_name;
			var ChapterID = json[i].Chapter.chapter_id;
			var ChapterNumber = json[i].Chapter.chapter_number;
			$('#Chapter').append("<option value='" + ChapterID + "'>"+ChapterName+" ("+ChapterNumber+")</option>");
					
		}   
    }
});


}

function getSchool () {

var block = $('#Block').val();
$.ajax({
    type: 'GET',
    url: '/shiksha/Filter/getSchoolName',
	data: 'Block=' + block,
    success: function( data ) {
	var json = JSON.parse(data);
           for(var i=0; i<json.length; i++)
		{
			var SchoolName = json[i].Filter.School_Name;
			var SchoolID = json[i].Filter.School_id;
			$('#school-name').append("<option value='" + SchoolID + "'>"+SchoolName+"</option>");
					
		}   
    }
});


}

function getBlock () {

var district = $('#district').val();
$.ajax({
    type: 'GET',
    url: '/shiksha/Filter/getBlockName',
	data: 'district=' + district,
    success: function( data ) {
	var json = JSON.parse(data);
				alert(json);

           for(var i=0; i<json.length; i++)
		{
			var BlockName = json[i].Filter.Block_name;
			alert(BlockName);
			$('.block-name1').append("<option value='" + BlockName + "'>"+BlockName+"</option>");
			$('.block-name2').append("<option value='" + BlockName + "'>"+BlockName+"</option>");
					
		}   
    }
});


}

$( document ).ready(function() {

$.ajax({
    type: 'GET',
    url: '/shiksha/Filter/getAllClasses',
    success: function( data ) {
	var json = JSON.parse(data);
           for(var i=0; i<json.length; i++)
		{
			var Class = json[i].Subject.class;
			$('.class1').append("<option value='" + Class + "'>Class "+Class+"</option>");
			$('.class2').append("<option value='" + Class + "'>Class "+Class+"</option>");
			$('.class3').append("<option value='" + Class + "'>Class "+Class+"</option>");
					
		}   
    }
});
});

</script>