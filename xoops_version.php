<?php
$modversion['name'] = _oscmem_MOD_NAME;
$modversion['version'] = "3.01";
$modversion['description'] = _oscmem_MOD_DESC;
$modversion['credits'] = "Open Source Church Project - http://sourceforge.net/osc";
$modversion['author'] = "Steve McAtee";
$modversion['help'] = "help.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = "3.01";
$modversion['image'] = "images/module_logo.png";
$modversion['dirname'] = "oscmembership";
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "oscmembership_person";
$modversion['tables'][1] = "oscmembership_family";
$modversion['tables'][2] = "oscmembership_group";
$modversion['tables'][3] = "oscmembership_groupprop_master";
$modversion['tables'][4] = "oscmembership_list";
$modversion['tables'][5] = "oscmembership_p2g2r";
$modversion['tables'][6] = "oscmembership_group_members";
$modversion['tables'][7] = "oscmembership_person_custom";
$modversion['tables'][8] = "oscmembership_person_custom_master";
$modversion['tables'][9] = "oscmembership_cart";
$modversion['tables'][10] = "oscmembership_churchdetail";

// Templates
$modversion['templates'][0]['file'] = 'simple.html';
$modversion['templates'][0]['description'] = 'Simple';
$modversion['templates'][1]['file'] = 'oscmembership_optionlist.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'cartview.html';
$modversion['templates'][2]['description'] = 'Cart View Template';
$modversion['templates'][3]['file'] = 'memberview.html';
$modversion['templates'][3]['description'] = 'Member View Template';
$modversion['templates'][4]['file'] = 'reports.html';
$modversion['templates'][4]['description'] = 'Report Page';
$modversion['templates'][5]['file'] = 'reportdirectory.html';
$modversion['templates'][5]['description'] = 'Report Directory Options';
$modversion['templates'][6]['file'] = 'csvexport.html';
$modversion['templates'][6]['description'] = 'CSV Export Options';
$modversion['templates'][7]['file'] = 'oscselect.html';
$modversion['templates'][7]['description'] = 'standard select template';
$modversion['templates'][8]['file'] = 'familyview.html';
$modversion['templates'][8]['description'] = 'family view template';

$modversion['blocks'][1]['file'] = "oscmemnav.php";
$modversion['blocks'][1]['name'] = 'OSC Navigation';
$modversion['blocks'][1]['description'] = "OSC Membership Menu";
$modversion['blocks'][1]['show_func'] = "oscmemnav_show";
$modversion['hasSearch'] = 0;
//$modversion['search']['file']="include/search.inc.php";
//$modversion['search']['func']="oscmem_search";
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";
$modversion['hasMain'] = 1;
//$modversion['templates'][1]['file'] = 'cs_index.html';
//$modversion['templates'][1]['description'] = 'cs main template file';
$modversion['hasComments'] = 1;
$modversion['comments']['pageName'] = 'index.php';
$modversion['comments']['itemName'] = 'id';

?>