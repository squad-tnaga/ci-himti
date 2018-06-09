<div class="page-header">
	<h3>Event</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php
		if($customdate):
			echo $this->calendar->generate($tahun,$bulan);
		else:
			echo $this->calendar->generate();
		endif;
		?>
	</div>
</div>