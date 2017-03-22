
Contao Form Bootstrap Datepicker
=================================

This project utilizes the [bootstrap-datepicker project](https://github.com/eternicode/bootstrap-datepicker) for use with the [contao bootstrap framework](http://contao-bootstrap.netzmacht.de/). The datepicker is provided as form widget, available in the contao form editor. It can act as replacement for the legacy calendarfield, which does not render correctly with the bootstrap framework.

Requirements
-------------

* Contao 3.3.0+ (Not tested below that version)
* contao-bootstrap/bundle 1.0-rc1+
* Bootstrap 3.3 or higher with jQuery  

Installation
-------------

ToDo

Features
---------

* Matches with bootstrap form styles
* Calendar popup when entering edit field 
* Compatible with all modern Browsers
* Date validation in frontend and backend
* Allows limitation of selectable dates
* Automatically matches calendar language with frontend
* Also matches date format with the backend date format
* Error messages localized in English, German and French.

Not (yet) Implemented
----------------------

* Multidate selection
* Range selection

Known limitations
------------------

This widget assumes your contao website uses valid ISO 639-1 (de,en,fr ...) codes for language configuration, otherwise it will fail to guess what language your site is using and falls back to english. 

This widget also assumes a not too 'exotic' configuration for displaying date like d.m.Y, m/d/Y or Y-m-d to determine the input format for the calendar.
   
Changelog
----------

03/22/2017

- Updated datepicker component from version 1.4 to version 1.7
- Added missing .htaccess to assets, because Contao disallows access beyond /system per default now
- Use of minified bootstap-datepicker.min.js
- Improved the initialization of widget a little
