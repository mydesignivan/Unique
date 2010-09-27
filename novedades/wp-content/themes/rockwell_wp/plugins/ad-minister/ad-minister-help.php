<?php

	function section () {
		global $section, $subsection;
		if (!$section) $section = 0;
		$section++;
		echo $section. ' ';	
		$subsection = 0;
	}


	function subsection () {
		global $section, $subsection;
		if (!$subsection) $subsection = 0;
		$subsection++;
		echo $section . '.' . $subsection . ' ';	
	}


?>


<h3><?php _e('Looking for help?', 'ad-minister'); ?></h3>

<p><?php _e('For more information on how this plugin works, go to', 'ad-minister'); ?> <a href="http://labs.dagensskiva.com/plugins/ad-minister/">http://labs.dagensskiva.com/plugins/ad-minister/</a>.</p>

<p><?php _e('Please report bugs to', 'ad-minister'); ?> <a href="mailto:henrik@dagensskiva.com">henrik@dagensskiva.com</a>.</p>

<p><?php _e('This plugin is geared towards the generation of revenue for websites by enabling the ease of hadling advertising. It is completely free, but if you feel that you\'ve made enough money to contribute to this project, then please do. Your contibution will enable the future development of this plugin.', 'ad-minister'); ?></p>

<center>
	<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="business" value="h.melin@gmail.com" />
		<input type="hidden" name="item_name" value="Donation" />
		<input type="hidden" name="currency_code" value="USD" />
		<input type="hidden" name="amount" value="0" />
		<input class="button-primary" type="submit" name="submit" value="<?php _e('Donate via PayPal!', 'ad-minister'); ?>" />
	</form>
</center>
