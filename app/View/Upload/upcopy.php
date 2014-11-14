<?php

include 'simplexlsx.class.php';
if (isset($_FILES['file'])) { 
     
   
     
    $xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] ); 

echo '<table cellpadding="10">
<tr><td valign="top">';

// output worsheet 1
$con = mysql_connect("localhost","root","root");

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
function getIndex($v)
{
	$query = "select quest_id from question_type where quest_name='$v'";
$retval = mysql_query( $query);
if(! $retval )
{
  die('Could not read: ' . mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC)){   //Creates a loop to loop through results
	$index = $row['quest_id'];  //$row['index'] the index here is a field name

return $index;
}
}
function getchapterid($grade,$subject,$chapterno)
{
	$query = "select chapters.chapter_id from chapters INNER JOIN subjects on chapters.Subj_id=subjects.Subj_id and chapters.chapter_number='$chapterno' and subjects.Subj_name='$subject' and subjects.class='$grade'";
$retval = mysql_query( $query);
if(! $retval )
{
  die('Could not read: ' . mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC)){   //Creates a loop to loop through results
	$index = $row['chapter_id'];  //$row['index'] the index here is a field name

return $index;
}
}
   mysql_select_db("shiksha_dataanalysis", $con);
$shs = $xlsx->sheetNames();

echo $shs[1];
list($num_cols, $num_rows) = $xlsx->dimension();

echo '<h1>Sheet 1</h1>';
echo '<table>';
$j=0;


$ques_id =0;
$test_id=0;
$i=5;
$rowch=0;
$size=50;
$post=0;
$grade=0;
$subject='';
$chapterno=0;
foreach( $xlsx->rows() as $r ) {

if($rowch==5)
{
	$cc=6;
	$ch=true;
	while($ch)
	{
		$val=$r[$cc];
		echo strlen($val);
		if(strcmp($val, '')!=0)
			{
				echo $cc;
				$post=$cc;
				$ch=false;
			}
		$cc++;	
	}


}
$v=$r[0];
if($rowch>8&&strcmp($v,"")==0)
	{echo 'equal';
	break;
	}
$rowch++;
}
$post=$post-5;
$size=5+$post+$post+$post;
echo $rowch.'\n'.$size.'\n';
while ($i<$size ) 
{$j=0;
	echo $i;
	$questions = ($size-5)/3;
echo 'Number of questions '.$questions;
	if($i<5+$questions)
		$test_id=1;
	if ($i>=5+$questions&&$i<5+$questions+$questions) {
		$test_id=2;
	}
	if ($i>=5+$questions+$questions)
		$test_id=3;

foreach( $xlsx->rows() as $r ) {
	if($j==1)
	$grade = $r[5+$questions+$questions];
	if($j==2)
	$subject = $r[5+$questions+$questions];
	if($j==3)
	$chapterno = $r[5+$questions+$questions];
	
	$chapterid = getchapterid($grade,$subject,$chapterno);
	if($j==7)
	{
		if($r[$i]=='-')
			$check=false;
		else
		{
		$check=true;
		$ques_id = getIndex($r[$i]);	# code...
		echo $ques_id;	
		}
	}
	$tmp=$r[$i];
	if($j>=8&&$j<$rowch)
	{
		
	if(strcmp($tmp,"")==0)
		$tmp='N';
	if(strcmp($tmp,"2")==0)
		$tmp='0.8';

	$query = " insert into final_results values ($chapterid,$r[0],$test_id,$ques_id,'$tmp')";
	$retval = mysql_query( $query);
	 if(! $retval )
	{
 	 die('Could not enter data: ' . mysql_error());
	} 
	}

/*for entering student data
	//echo '<tr>';
	foreach( $xlsx->rows() as $r ) {

		if($j>=8&&$j<63)
		{
			$query = "
  insert into students values ($r[0],1001,'$r[1]','$r[2]',1,$r[4])";
$retval = mysql_query( $query);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";

		}
		*/
		$j++;
}
$i++;
}
/*			echo $j."and".$i;
		echo '<td>'.( (!empty($r[3])) ? $r[3] : '&nbsp;' ).'</td>';
//	e//cho '</tr>';
	$j++;

}
echo '</table>';

echo '</td><td valign="top">';
 */

/*
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row[0] . "</td><td>" ;  //$row['index'] the index here is a field name
}
*/
}


?>
<h1>Upload</h1> 
<form method="post" enctype="multipart/form-data"> 
*.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" /> 
</form> 