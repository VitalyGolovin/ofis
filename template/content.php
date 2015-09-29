
<div class="content">

	<?php if($phototext):?>
	
		<?php $iterator = 0;?>
		
		<?php foreach($phototext as $key => $val): ?>
		
			<?php if($iterator%2 == 0):?>
			
			<div class="articlew">
			
			<?php else:?>
			
			<div class="articleb">
			
			<?php endif;?>	
			
				<div class="art-img">
					<img src="<?php echo SITE_URL.IMAGE?><?php echo $key;?>"/>
				</div>
				<p class="atext"><?php echo $val;?></p>
			</div>
			<?php $iterator++;?>
		<?php endforeach; ?>
	<?php endif;?>	
		