tmcTwitterBootstrapPlugin
=========================
NOTE: Problems actualizing the repo from my country (Cuba), the customizations assets doesn´t work in the repo and I can change the files for now. Contact me at dr.juanc@gmail.com 
This is a twitter bootstrap theme for the symfony 1.4 admin generator.

Features
--------

* a theme that integrates Twitter Bootstrap for symfony admin generator
* a sfGuardAuth module to replace the default layout of the sfDoctrineGuardPlugin
* generate admin with show view, option to set the max results in list view
* multiple CSS class customizations

Installation
-----------

* Clone this project into plugins folder of your symfony project and enable it in the config/ProjectConfiguration.class.php file.
* Copy the tmcTwitterBootstrap to the module of your backend application. From  plugins/tmcTwitterBootstrapPlugin/modules/tmcTwitterBootstrap to apps/backend/modules/tmcTwitterBootstrap
*Also you can copy the files inside this folder "plugins/tmcTwitterBootstrapPlugin/modules/tmcTwitterBootstrap/templates" to your module folder to customize your  module. You can customize staticSuccess.php, _assets.php, _footer.php, _header.php files and any other partial.
* Copy the sfGuardAuth to the modules of your backend application if you want to replace the sfDoctrineGuardPlugin default theme.
* Generate a new administration module with the option `--theme=tmcTwitterBootstrap`.
    php symfony generate:app backend
    php symfony doctrine:generate-admin backend className --module=yourModuleName --theme=tmcTwitterBootstrap	
* Copy all images, css and js files in the plugins/tmcTwitterBootstrapPlugin/web folder to web/tmcTwitterBootstrapPlugin. You can use the publish-assets task
     php symfony plugin:publish-assets
	

Configuration
-------------
In your apps/admin/config/app.yml:

    all:
      tmcTwitterBootstrapPlugin:
        dashboard_name: Backend application name
# NAVBAR options
        navbar_inverse: true          # true= Black navbar; false= standard  (silver) navbar
        navbar_fixed_top: true        # true= navbar stay on top; false= navbar disappear on scroll
#TABLE options
        table_bordered: true          # true= add border to the main table (the record list)
        table_striped: true           # true= alternated dark and light rows (stripes)
        table-condensed: true         # true= narrow rows
        table_ultracondensed: true    # true= even more narrow rows
        table_hover: true             # true= highlight row on mouse over
        tr_hover_color: "#d9edf7"     # The tr highlight  on mouse over. Use " (quotation marks) to use the number sign as value
        thead_type: error             # possible  (success, error, warning and info or define your own types in styles.css)
        thead_color: "#dff0d8"        # Set color to the table head (overwrite the thead_type option)
        tr_action_hover_color: false  # true= highlight the action cell on row´s mouse over (the last cell)

# PAGINATION options
        show_top_paginator: true      # true= Show the pagination on top of the table 
        show_botton_paginator: false  # true= Show the pagination on bottom of the table
        show_per_page: true           # true= Show a "max record per page" selector
        per_page_text: rec per page   # The text show in the "max record per page" selector	
        per_page_values: "1;5;10;20"  # The list of selected values in "max record per page" selector
        per_page_prefix:  show        # Prefix for every value, ex: Show 1 ..., Show 5...
        per_page_sufix: rec           # Suffix for every value, ex: ...1 record, ...5 record
        per_page_size: input-large    # the size of the selected (possibles values: input-mini, input-small, input-medium, input-large, input-xlarge, input-xxlarge)

# BUTTONS OPTIONS
# NEW Button options
        new_button_type: btn-success       # btn-primary; btn-info; btn-success; btn-warning; btn-danger; btn-inverse; btn-link btn-normal (default); 
        new_button_size: btn-small         # btn-large; btn-normal (default size); btn-small; btn-mini; btn-block(not recommended)
        new_button_icon: icon-plus         # 140 possible icons search in the TwitterBootstrap documentation(http://twitter.github.com/bootstrap/base-css.html#icons)
        new_button_icon_color: icon-white  # Icon color, just white, any other produce black icon

# FILTER Button options (same single options of the new button)
        filter_button_type:                     
        filter_button_size: btn-small          
        filter_button_icon: icon-filter
        filter_button_icon_color: icon-black

# DELETE Button options (same single options of the new button)
        delete_button_type: 
        delete_button_size: btn-small
        delete_button_icon: icon-trash
        delete_button_icon_color: icon-white

# EDIT Button options (same single options of the new button)
        edit_button_type: 
        edit_button_size: btn-small
        edit_button_icon: icon-pencil
        edit_button_icon_color: icon-black

# SHOW Button options (same single options of the new button)
        show_button_type:
        show_button_size: btn-small
        show_button_icon: 
        show_button_icon_color: icon-black

# GO Button options (same single options of the new button, not icon allow)
        go_button_type: btn-inverse
        go_button_size: btn-small

# BATCH Button options (same single options of the new button, not icon allow)
        batch_button_type: btn-inverse
        batch_button_size: btn-small
        batch_select_size: input-large # Possibles values: input-mini, input-small, input-medium, input-large, input-xlarge, input-xxlarge

# LIST Button options (same single options of the new button)
        list_button_type: 
        list_button_size: 
        list_button_icon: 
        list_button_icon_color: 

# SAVE Button options (same single options of the new button)
        save_button_type: 
        save_button_size: 
        save_button_icon: 
        save_button_icon_color: 

# SAVE AND NEW Button options (same single options of the new button, not icon allow)
        savenew_button_type: 
        savenew_button_size: 

Portability
===========

If you don't want to use the bundled, minified versions of Bootstrap's CSS and JS or you'd like to use unminified versions in dev, you can set the following app.yml variables:

    all:
      # Change these if you'd like to move/modify CSS & JS files
      tmcTwitterBootstrapPlugin:
        bootstrap_path:              /tmcTwitterBootstrapPlugin/css/bootstrap.min.css
        responsive_bootstrap_path:   /tmcTwitterBootstrapPlugin/css/bootstrap-responsive.min.css
        admin_styles_path:           /tmcTwitterBootstrapPlugin/css/styles.css
        jquery_path:                 /tmcTwitterBootstrapPlugin/js/jquery.min.js
        bootstrap_js_path:           /tmcTwitterBootstrapPlugin/js/bootstrap.min.js
        admin_js_path:               /tmcTwitterBootstrapPlugin/js/global.js

Using
-----

Twitter Bootstrap version 2.0.2 and symfony 1.4

Contributors
------------

* Tito Miguel Costa <titomiguelcosta@titomiguelcosta.com>
* Tiago Carvalho <tiago.carvalho@gmail.com>
* Ben Lancaster https://github.com/benlancaster
* Juan Carlos Garcia @<dr.juanc@gmail.com>
