<?php

ClassLoader::addClasses(array
(
	'BootstrapDatepickerField' => 'system/modules/bootstrap-datepicker/widgets/BootstrapDatepickerField.php',
));

\TemplateLoader::addFile('form_datepicker', 'system/modules/bootstrap-datepicker/templates/widget');
