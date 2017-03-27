<?php

ClassLoader::addClasses(array
(
	'BootstrapDatepickerField' => 'system/modules/bootstrap-datepicker/widgets/BootstrapDatepickerField.php',
	'BootstrapRangepickerField' => 'system/modules/bootstrap-datepicker/widgets/BootstrapRangepickerField.php',
));

\TemplateLoader::addFile('form_datepicker', 'system/modules/bootstrap-datepicker/templates/widget');
