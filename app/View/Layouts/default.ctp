<?php
/**
 *
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('app.v1');
		echo $this->Html->script('app.v1');
		echo $this->Html->script('tasks');
		echo $this->Html->script('notes');
		echo $this->Html->script('jquery'); // Include jQuery library

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
	<body> <section class="hbox stretch"> 
<!-- .aside --> <aside class="bg-primary aside-sm" id="nav"> <section class="vbox"> 

<header class="dker nav-bar"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> <i class="icon-reorder"></i> </a> 
<a href="#" class="nav-brand" data-toggle="fullscreen"><img src="http://shikshainitiative.org/sites/default/files/th_shiksha_logo.jpg" style="width:55%;"></a> <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> <i class="icon-comment-alt"></i> </a> </header> <footer class="footer bg-gradient hidden-xs"> <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"></a> <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">  </a> </footer> <section> 
<!-- user --> 

 
<!-- / user --> 
<!-- nav -->   <nav class="nav-primary hidden-xs">
                        <ul class="nav">
                            <li><a href="/shiksha/"><span>Dashboard</span></a></li>
                            <li><a href="/upload/upcopy.php"><span>Upload File</span></a></li>

                          <!--  <li class="dropdown-submenu active">
                                <a class="dropdown-toggle" data-toggle=
                                "dropdown" href="#"><span>Reports</span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">Student Report</a></li>

                                    <li><a href="#">Parent Report</a></li>

                                    <li><a href="#">Staff Report</a></li>

                                    <li><a href="#">Teacher Reports</a></li>

                                </ul>
                            </li>

                -->

                            <li><a href=
                            "#"><span>About Us</span></a></li>

                            <li><a href=
                            "#"><span>Support</span></a></li>
                        </ul>
                    </nav>
<!-- / nav --> 
</section> </section> </aside> 
<!-- /.aside --> 
<!-- .vbox --> <section id="content"> <section class="vbox"> 

<header class="header bg-white b-b"> 

<p>Data Analysis for Shiksha Initiative </p> </header> 

<section class="scrollable wrapper"> 

<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?><br><br><br><br><br>
			
	<?php //echo $this->element('sql_dump'); ?>

<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>