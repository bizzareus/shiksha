<section class="panel"> 

<header class="panel-heading bg-light"> 
<ul class="nav nav-tabs nav-justified"> 
<li class="active"><a href="#analyze" data-toggle="tab">Analyze</a></li> 
<li><a href="#compare" data-toggle="tab">Compare</a></li> 
</ul> </header> 

<div class="panel-body"> 

<div class="tab-content"> 

<div class="tab-pane active" id="analyze">

<div class="col-lg-6">

<?php //echo $this->Form->create(); ?>
<form action="/shiksha/Filter/ready" id="FilterIndexForm" method="post" accept-charset="utf-8"> 
<?php //echo "<pre>"; print_r($Filter);
//exit; ?>

<h3> Choose Case </h3>
<select name="case[]" class="form-control m-b" > 
  <option value="overall-performance">Overall Performance</option>
  <option value="gender-wise-1">Gender Wise</option>
</select>
    
<h3> Choose Parameter </h3>
<select name="parameter[]" class="form-control m-b" multiple="multiple" style="
    height: 100px;
" > 
	<option value="q1"> Connecting </option>
	<option value="q2"> Understanding </option>
	<option value="q3"> Operational </option>
	<option value="q4"> Analytical </option>
	<option value="q5"> Application </option>
</select>
<h3> Choose District </h3>
<select name="district[]"  class="form-control m-b" multiple="multiple" id="district"> 
	<?php foreach ($districts as $district) : 	?>
	<option value="<?php echo $district['Filter']['Name_Dist']; ?>"> <?php echo $district['Filter']['Name_Dist']; ?> </option>
	<?php endforeach ?>
	</select>
<h3> Choose Block </h3>
<!--<select name="Block[]"  class="form-control m-b" id="Block" multiple="multiple"> 
	<?php foreach ($blocks as $block) : 	?>
	<option value="<?php echo $block['Filter']['Block_name']; ?>"> <?php echo $block['Filter']['Block_name']; ?> </option>
	<?php endforeach ?>
	</select>-->
	<div id="block-name"> </div>
	 	 <h3> Choose School Name </h3>
<select name="school-name[]" class="form-control m-b" id="school-name" multiple="multiple"> 
 
</select>
    
			 
</div>
<div class="col-lg-6">
    <h3> Choose Test </h3>
<select name="test-type[]" class="form-control m-b" > 
  <option value="1">Pre Test</option>
  <option value="2">Post Test</option>
  <option value="3">Augmentation</option>
</select>
    
	
	<h3> Choose Class </h3>
 <select name="Class[]"  class="form-control m-b" id="Class" multiple="multiple"> 
		<option value="0"> --Class-- </option>

	</select>
	
	
	<h3> Choose Subject </h3>
	<select name="Subject[]"  class="form-control m-b" id="Subject" onchange="getChapter();" multiple="multiple" > 		<option value="0"> --Subject-- </option>
</select>
	
		 <h3> Choose Chapter </h3>
		 <select name="Chapter[]"  class="form-control m-b" id="Chapter" multiple="multiple"> 
		<option value="0"> --Chapter-- </option>

	</select>
	<!--
	<h3> Choose Gender </h3>
 <select name="Gender[]"  class="form-control m-b" id="Gender" multiple="multiple"> 
	<option value="1"> Male </option>
	<option value="2"> Female </option>
	</select> -->
	
	</div>
		 <div class="tab-pane" id="compare">

</div> 

</div> 
</div> 
</div>
<div align="center">
<input type="submit" class="btn btn-s-lg btn-info" name="submit"> 
</div> <br><br></section>


<?php 

$this->Js->get('#district')->event(
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

$( document ).ready(function() {

$.ajax({
    type: 'GET',
    url: '/shiksha/Filter/getAllClasses',
    success: function( data ) {
	var json = JSON.parse(data);
           for(var i=0; i<json.length; i++)
		{
			var Class = json[i].Subject.class;
			$('#Class').append("<option value='" + Class + "'>Class "+Class+"</option>");
					
		}   
    }
});
});

</script>