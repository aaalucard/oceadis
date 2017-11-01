<?php foreach ($departamentDocuments as $sdd) {
	?>
	<a href="/site/readdoc?doc=<?= $sdd->document->dir_name ?>"></a>
	<?php
}