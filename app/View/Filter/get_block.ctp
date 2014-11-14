<select name="Block"  class="form-control m-b" id="Block" onchange="getSchool();"> 
	<?php foreach ($blocks as $block) : 	?>
	<option value="<?php echo $block['Filter']['Block']; ?>"> <?php echo $block['Filter']['Block']; ?> </option>
	<?php endforeach ?>
	</select>