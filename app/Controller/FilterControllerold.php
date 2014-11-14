<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
 
 /*
 Possible combination for data analysis
1.  Boys vs Girls performance over the time

2.  District performance over the time

3.  Block performance over the time

4.  School Performance over the time

5.  Test score and attendance

6.  Test score and study time with content

7.  Teacher attendance vs Student test score

8.  Boys performance over the chapter

9.  Girls performance over the chapter 
 */
class FilterController extends AppController {
	public $helpers = array('Js','Form');
	public $components = array('RequestHandler');
	public $uses = array('Filter', 'Subject', 'Chapter');

	public function index() {
			
	       $district = $this->set('districts', $this->Filter->find('all',array('fields' => array('DISTINCT Filter.Name_Dist') )));
	       $blocks = $this->set('blocks', $this->Filter->find('all',array('fields' => array('DISTINCT Filter.Block_name') )));
	       //$schools = $this->Filter->Filter2->set('classes', $this->Filter->find('all',array('fields' => array('DISTINCT Filter.Class') )));
		   $getsubject = $this->set('subject', $this->Subject->find('all', array('conditions' => array('Subject.class' => '1'))));
		  } 
						

	public function getBlockName() {
					
		$blockname = $this->set('blockname', $this->Filter->find('all',array('conditions' => array('Filter.Name_Dist' => $this->data['district']))));
		}
		
		
			public function getSchoolName() {
		$this->layout = null ;
		$schoolname = $this->Filter->find('all',array('conditions' => array('Filter.Block_name' => $_GET['Block'])));
		echo json_encode($schoolname);

		}
		
public function getSubject() {
		$this->layout = null ;
		$getsubject = $this->Subject->find('all', array('conditions' => array('Subject.class' => $_GET['Class'] )));
		echo json_encode($getsubject);
		}
		
		public function getAllClasses() {
		$this->layout = null ;
		$getclasses = $this->Subject->find('all',array('fields' => array('DISTINCT class'), 'order' => array('class' => 'ASC')));
		echo json_encode($getclasses);
		}
		
		public function getChapters() {
		$this->layout = null ;
		$getchapters = $this->Chapter->find('all', array('conditions' => array('Subj_id' => $_GET['SubjectID'] ), 'order' => array('chapter_number' => 'ASC')));
		echo json_encode($getchapters);
		}

function ready () {
    
    //Ignore these two variables
$before_chart = '<html>
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>Filter</title>
	                <link href="/shiksha/favicon.ico" type="image/x-icon" rel="icon" />
                    <link href="/shiksha/favicon.ico" type="image/x-icon" rel="shortcut icon" />
                    <link rel="stylesheet" type="text/css" href="/shiksha/css/app.v1.css" />
                    <script type="text/javascript" src="/shiksha/js/app.v1.js"></script>
                    <script type="text/javascript" src="/shiksha/js/tasks.js"></script>
                    <script type="text/javascript" src="/shiksha/js/notes.js"></script>
                    <script type="text/javascript" src="/shiksha/js/jquery.js"></script>';
 $after_chart = ' </head>
                    <body>
                    <section class="hbox stretch"> 
                    <!-- .aside --> <aside class="bg-primary aside-sm" id="nav">
                    <section class="vbox"> 
                    <header class="dker nav-bar"> 
                      <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> 
                      <i class="icon-reorder"></i> </a> <a href="#" class="nav-brand" data-toggle="fullscreen">View</a> 
                      <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> 
                      <i class="icon-comment-alt"></i> </a> 
                    </header> 
                    <footer class="footer bg-gradient hidden-xs"> 
                      <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"></a> 
                      <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">  </a> 
                    </footer> <section> 
                
                    <!-- nav -->
                    <nav class="nav-primary hidden-xs">
                          <ul class="nav">
                            <li><a href="demo/index.html"><span>Dashboard</span></a></li>
                            <li><a href="demo/questions.html"><span>Questions</span></a></li>

                            <li class="dropdown-submenu active">
                                <a class="dropdown-toggle" data-toggle=
                                "dropdown" href="#"><span>Reports</span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">Student Report</a></li>

                                    <li><a href="#">Parent Report</a></li>

                                    <li><a href="#">Staff Report</a></li>

                                    <li><a href="#">Teacher Reports</a></li>

                                </ul>
                            </li>

                

                            <li><a href=
                            "#"><span>About Us</span></a></li>

                            <li><a href=
                            "#"><span>Support</span></a></li>
                        </ul>
                    </nav>
                    <!-- / nav --> 
                    </section> </section> </aside> 
                    <!-- /.aside --> 
                    <!-- .vbox --> 
                    <section id="content"> <section > 

                    <header class="header bg-white b-b"> 

                    <p>Welcome to CogniZZance Dashboard for School Analysis! </p> </header> 

                    <section> 
                    <div id="barchart_material"  style="width: 900px; height: 500px;"></div>
                    </section>
                  </body>
                </html>
                ';   

    
    
 $testtype=(isset($this->data['test-type']))?$this->data['test-type']:NULL;
 $block = (isset($this->data['Block']))?$this->data['Block']:NULL;
 $district1 = (isset($this->data['district']))?$this->data['district']:NULL;
 $school = (isset($this->data['school-name']))?$this->data['school-name']:NULL;
 $param = (isset($this->data['parameter']))?$this->data['parameter']:NULL;
 $chapter = (isset($this->data['Chapter']))?$this->data['Chapter']:NULL;
 $class = (isset($this->data['Class']))?$this->data['Class']:NULL;
 $subject = (isset($this->data['Subject']))?$this->data['Subject']:NULL;
 $gender = (isset($this->data['Gender']))?$this->data['Gender']:NULL;
 $case = (isset($this->data['case']))?$this->data['case']:NULL;
 
//Each parameter has question types, ex: $param[1] has question ids of 1A,1B,1C ie 1,2,3
 $param_query_string[0] =   "f.Quest_id =  '1' OR f.Quest_id =  '2' OR f.Quest_id =  '3'"; 
 $param_query_string[1] =   "f.Quest_id =  '4' OR f.Quest_id =  '5' OR f.Quest_id =  '6'"; 
 $param_query_string[2] =   "f.Quest_id =  '7' OR f.Quest_id =  '8' OR f.Quest_id =  '9'"; 
 $param_query_string[3] =   "f.Quest_id =  '10' OR f.Quest_id =  '11' OR f.Quest_id =  '12'"; 
 $param_query_string[4] =   "f.Quest_id =  '13' OR f.Quest_id =  '14' OR f.Quest_id =  '15'"; 
 
 $param_query_string_complete = array();

for($j = 1; $j<=5;$j++){
    if(in_array('q'.$j, $param)){
        array_push($param_query_string_complete,$j-1);
    } 
}
  
// Case 1: Gender Wise
// Works for query combination 1,8,9
if($case[0]=='gender-wise-1'){
    $comparisonparam = NULL;
    
    if(isset($district1) and !isset($block) and !isset($gender) and !isset($chapter)){
        //districtwise gender data
        $comparisonparam = $district1;
    } else if (isset($district1) and isset($block) and !isset($school)and !isset($gender) and !isset($chapter)){
        //blockwise gender data
        $comparisonparam = $block;
    } else if (isset($district1) and isset($block) and isset($school) and !isset($class) and !isset($gender) and !isset($chapter)){
        //schoolwise gender data
        $comparisonparam = $school;
    } else if(isset($district1)  and isset($chapter) and isset($class) and isset($subject) and !isset($block)){
		$comparisonparam = 'male-female-district-chapter';
	} else {
		echo "case not defined!";
	}
    // TODO: Add more cases for comparison. Exmaple: Classwise student data, subject wise, chapter wise
    
    if($comparisonparam == $district1){
        //We need district wise data of boys and girls
        
        $query_district_string = "sd.Name_Dist = '" .  $district1[0]."'";
        
        if(count($district1)>0){
        //But one can select multiple districts too, hence 
            for($i = 1; $i<count($district1);$i++){
             $query_district_string = $query_district_string."OR sd.Name_Dist = '". $district1[$i]."'";
            }
        }
        
       //Now we need to gather data for all parameters for males and females. Let's create associative array
        $males_score = array();
        $females_score = array();
        
        foreach($param_query_string_complete as $param_id){
            $sql_for_males = "SELECT SUM( f.Score ) 
            FROM final_results f
            INNER JOIN students s ON f.Stud_id = s.Stud_id
            INNER JOIN school_details sd ON s.School_id = sd.School_id
            WHERE (
            ".$query_district_string."
            )
            AND (
            ".$param_query_string[$param_id]."
            )
            AND (
            f.Test_id =  '".$testtype[0]."'
            )
            AND (
            s.Gender =  'M'
            )";
            $query1 = $this->Filter->query($sql_for_males);
            $males_score[$param_id] = ($query1[0][0]['SUM( f.Score )'])?$query1[0][0]['SUM( f.Score )']:0;
            
            
            $sql_for_females = "SELECT SUM( f.Score ) 
            FROM final_results f
            INNER JOIN students s ON f.Stud_id = s.Stud_id
            INNER JOIN school_details sd ON s.School_id = sd.School_id
            WHERE (
            ".$query_district_string."
            )
            AND (
            ".$param_query_string[$param_id]."
            )
            AND (
            f.Test_id =  '".$testtype[0]."'
            )
            AND (
            s.Gender =  'F'
            )";
            $query2 = $this->Filter->query($sql_for_females);
            $females_score[$param_id] = ($query2[0][0]['SUM( f.Score )'])?$query2[0][0]['SUM( f.Score )']:0;
        }
        
        $parameters_name = ""; $males_score_string = ""; $females_score_string="";
        foreach($param_query_string_complete as $param_id){
            $parameters_name = $parameters_name. ',\'' . get_param_name($param_id).'\'';
        } 
        foreach($males_score as $mark){
            $males_score_string = $males_score_string. ','.$mark;
        }
        foreach($females_score as $mark){
            $females_score_string = $females_score_string. ','.$mark;
        }
         
              
        
        
        echo $before_chart.'<script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1.1", {packages:["bar"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ["Gender"'.$parameters_name.'],
                          ["Male"'.$males_score_string.'],
                          ["Female"'.$females_score_string.'],
                         ]);
                        var options = {
                          chart: {
                            title: "Girls vs Boys Performance",
                          },
                          bars: "vertical" // Required for Material Bar Charts.
                        };
                        var chart = new google.charts.Bar(document.getElementById("barchart_material"));
                        chart.draw(data, options);
                      }
                    </script>
                    '.$after_chart;
        }
        //District Wise Comparision Complete
    
        //-------------------------------------------------------------
    
        //Block Wise starts
    
        if($comparisonparam == $block){
            //We need block wise data of boys and girls

            $query_block_string = "sd.Block_name = '" .  $block[0]."'";

            if(count($block)>0){
            //But one can select multiple blocks too, hence 
            for($i = 1; $i<count($block);$i++){
                 $query_block_string = $query_block_string."OR sd.Block_name = '". $block[$i]."'";
                }
            }

           //Now we need to gather data for all parameters for males and females. Let's create associative array
            $males_score = array();
            $females_score = array();

            foreach($param_query_string_complete as $param_id){
                $sql_for_males = "SELECT SUM( f.Score ) 
                FROM final_results f
                INNER JOIN students s ON f.Stud_id = s.Stud_id
                INNER JOIN school_details sd ON s.School_id = sd.School_id
                WHERE (
                ".$query_block_string."
                )
                AND (
                ".$param_query_string[$param_id]."
                )
                AND (
                f.Test_id =  '".$testtype[0]."'
                )
                AND (
                s.Gender =  '0'
                )";
                $query1 = $this->Filter->query($sql_for_males);
                $males_score[$param_id] = ($query1[0][0]['SUM( f.Score )'])?$query1[0][0]['SUM( f.Score )']:0;

                $sql_for_females = "SELECT SUM( f.Score ) 
                FROM final_results f
                INNER JOIN students s ON f.Stud_id = s.Stud_id
                INNER JOIN school_details sd ON s.School_id = sd.School_id
                WHERE (
                ".$query_block_string."
                )
                AND (
                ".$param_query_string[$param_id]."
                )
                AND (
                f.Test_id =  '".$testtype[0]."'
                )
                AND (
                s.Gender =  '1'
                )";
                $query2 = $this->Filter->query($sql_for_females);
                $females_score[$param_id] = ($query2[0][0]['SUM( f.Score )'])?$query2[0][0]['SUM( f.Score )']:0;
            }

            $parameters_name = ""; $males_score_string = ""; $females_score_string="";
            foreach($param_query_string_complete as $param_id){
                $parameters_name = $parameters_name. ',\'' . get_param_name($param_id).'\'';
            } 
            foreach($males_score as $mark){
                $males_score_string = $males_score_string. ','.$mark;
            }
            foreach($females_score as $mark){
                $females_score_string = $females_score_string. ','.$mark;
            }




            echo $before_chart.'<script type="text/javascript" src="https://www.google.com/jsapi"></script>
                        <script type="text/javascript">
                          google.load("visualization", "1.1", {packages:["bar"]});
                          google.setOnLoadCallback(drawChart);
                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ["Gender"'.$parameters_name.'],
                              ["Male"'.$males_score_string.'],
                              ["Female"'.$females_score_string.'],
                             ]);
                            var options = {
                              chart: {
                                title: "Girls vs Boys Performance",
                              },
                              bars: "vertical" // Required for Material Bar Charts.
                            };
                            var chart = new google.charts.Bar(document.getElementById("barchart_material"));
                            chart.draw(data, options);
                          }
                        </script>
                        '.$after_chart;
        }
        //Block Wise Comparision Complete
		
		//--------------------------------------------------------------------------------------------
		
		// Male or female performance in a chapter. Case 7 and 8

        
}
//END OF CASE I		
    
    
// Case 2: Overall Performance
//Works for query combination 2,3,4
if($case[0]=='overall-performance'){
    $comparisonparam = NULL;
    
    if(isset($district1) and !isset($block)){
        //districtwise overall performance
        $comparisonparam = $district1;
    } else if (isset($district1) and isset($block) and !isset($school)){
        //blockwise overall performance
        $comparisonparam = $block;
    } else if (isset($district1) and isset($block) and isset($school) and !isset($class)){
        //schoolwise overall performance
        $comparisonparam = $school;
    } 
    // TODO: Add more cases for comparison. Exmaple: Classwise student data, subject wise, chapter wise
    
    if($comparisonparam == $district1){
        //We need district wise data of boys and girls
        
        $query_district_string = "sd.Name_Dist = '" .  $district1[0]."'";$i=1;
         if(count($district1)>0){
        //But one can select multiple districts too, hence 
            for($i = 1; $i<count($district1);$i++){
             $query_district_string = $query_district_string."OR sd.Name_Dist = '". $district1[$i]."'";
            }
        }
        
 
        $scores = array();
        foreach($param_query_string_complete as $param_id){
            $sql = "SELECT SUM( f.Score ) 
            FROM final_results f
            INNER JOIN students s ON f.Stud_id = s.Stud_id
            INNER JOIN school_details sd ON s.School_id = sd.School_id
            WHERE (
            ".$query_district_string."
            )
            AND (
            ".$param_query_string[$param_id]."
            )
            AND (
            f.Test_id =  '".$testtype[0]."'
            )
            ";
            $query1 = $this->Filter->query($sql);
            $scores[$param_id] = ($query1[0][0]['SUM( f.Score )'])?$query1[0][0]['SUM( f.Score )']:0;
        }
        
        $query_string = "";$i=0;
        
        foreach($param_query_string_complete as $param_id){
                $query_string = $query_string . '["'.get_param_name($param_id).'",'.$scores[$i++].'],';
            } 
        
      
        echo $before_chart.'<script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1.1", {packages:["bar"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ["District","Scores"],
                          '.$query_string.'
                         ]);
                        var options = {
                          chart: {
                            title: "Girls vs Boys Performance",
                          },
                          bars: "vertical" // Required for Material Bar Charts.
                        };
                        var chart = new google.charts.Bar(document.getElementById("barchart_material"));
                        chart.draw(data, options);
                      }
                    </script>
                    '.$after_chart;
        }
        //District Wise Comparision Complete
    
        //-------------------------------------------------------------
    
        //Block Wise starts
    
        if($comparisonparam == $block){
            //We need overall block wise data

            $query_block_string = "sd.Block_name = '" .  $block[0]."'";

            if(count($block)>0){
            //But one can select multiple blocks too, hence 
            for($i = 1; $i<count($block);$i++){
                 $query_block_string = $query_block_string."OR sd.Block_name = '". $block[$i]."'";
                }
            }
           $scores = array();
        foreach($param_query_string_complete as $param_id){
            $sql = "SELECT SUM( f.Score ) 
            FROM final_results f
            INNER JOIN students s ON f.Stud_id = s.Stud_id
            INNER JOIN school_details sd ON s.School_id = sd.School_id
            WHERE (
            ".$query_block_string."
            )
            AND (
            ".$param_query_string[$param_id]."
            )
            AND (
            f.Test_id =  '".$testtype[0]."'
            )
            ";
            $query1 = $this->Filter->query($sql);
            $scores[$param_id] = ($query1[0][0]['SUM( f.Score )'])?$query1[0][0]['SUM( f.Score )']:0;
        }
        
        $query_string = "";$i=0;
        
        foreach($param_query_string_complete as $param_id){
                $query_string = $query_string . '["'.get_param_name($param_id).'",'.$scores[$i++].'],';
            } 
        
        
        echo $before_chart.'<script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1.1", {packages:["bar"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ["District","Scores"],
                          '.$query_string.'
                         ]);
                        var options = {
                          chart: {
                            title: "Girls vs Boys Performance",
                          },
                          bars: "vertical" // Required for Material Bar Charts.
                        };
                        var chart = new google.charts.Bar(document.getElementById("barchart_material"));
                        chart.draw(data, options);
                      }
                    </script>
                    '.$after_chart;
            
        }
        //Block Wise Comparision Complete
        
}
		$this->autoRender = false;
}
}
