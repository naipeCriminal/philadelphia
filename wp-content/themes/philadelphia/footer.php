	<div id="footer">
		<ul>
			<li><a href="http://mx.mondelezinternational.com/"><img src="<?php bloginfo('template_url'); ?>/assets/img/estatico/mondelez.png" width="150px" alt=""></a></li>
			<li>
				<select name="" id="">
					<option value="2015">MONDELEZ EN EL MUNDO</option>
				</select> 
			</li>
			<li>kgjfasgkjfsa </li>
			<li>kgjfasgkjfsa </li>
			<li>kgjfasgkjfsa </li>
			<li>kgjfasgkjfsa </li>
			<li>kgjfasgkjfsa </li>
		</ul>

	</div>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery-1.9.1.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.js" ></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.fittext.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.lettering.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.textillate.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/global.js"></script>	
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app.js"></script>	
	<script>
		$(document).on("ready",function(){
			//Bootstraping
			Global.setVar("ROOT_PATH",'<?= $root ?>');
			Global.setVar("IMAGE_PATH",'<?php bloginfo('template_url'); ?>');
			Global.setVar("TIEMPO",100);

			App.init();
		});
	</script>
	<?php wp_footer(); ?>
</body>
</html>

