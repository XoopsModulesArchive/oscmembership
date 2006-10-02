<?php
// $Id: customfieldselectform.php,v 1.1.1.1 2006/03/12 14:57:25 root Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2006 osc churchledger.com
//			http://www.churchledger.com
//
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Steve McAtee                                          //
// URL: http://www.churchledger.com, http://www.xoops.org/
// Project: The XOOPS Project, The Open Source Church project (OSC)
// ------------------------------------------------------------------------- //
include("../../mainfile.php");
//$xoopsOption['template_main'] = 'cs_index.html';
include(XOOPS_ROOT_PATH."/header.php");
//include("../../../include/cp_header.php");
include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");
include_once(XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar('dirname') . "/include/functions.php");

// include the default language file for the admin interface
if ( file_exists( "../language/" . $xoopsConfig['language'] . "/main.php" ) ) {
    include "../language/" . $xoopsConfig['language'] . "/main.php";
}
elseif ( file_exists( "../language/english/main.php" ) ) {
    include "../language/english/main.php";
}

/*
if (file_exists(XOOPS_ROOT_PATH. "/modules" . 	$xoopsModule->getVar('dirname') .  "/language/" . $xoopsConfig['language'] . "/modinfo.php")) {
    include XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar('dirname') . "/language/" . $xoopsConfig['language'] . "/modinfo.php";
}
elseif( file_exists(XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar('dirname') ."/language/english/modinfo.php"))
{ include XOOPS_ROOT_PATH ."/modules/" . $xoopsModule->getVar('dirname') . "/language/english/modinfo.php";

}
*/

//redirect
if (!$xoopsUser)
{
    redirect_header(XOOPS_URL."/user.php", 3, _AD_NORIGHT);
}


//verify permission
if ( !is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
    exit("Access Denied");
}


//determine action
$op = '';
$confirm = '';
$action='';


if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];
if (isset($_POST['action'])) $action=$_POST['action'];
if (isset($_GET['action'])) $action=$_GET['action'];


$myts = &MyTextSanitizer::getInstance();
$persondetail_handler = &xoops_getmodulehandler('person', 'oscmembership');

$member_handler =& xoops_gethandler('member');

switch (true) 
{
    case ($op=="save" || $op=="create"):

	if($op=="save")
	{
//		$persondetail_handler->update($person);
		$message=_oscmem_UPDATESUCCESS;
		redirect_header("customfielddetailform.php?action=save&id=" . $personid, 3, $message);
	}
	if($op=="create")
	{
		$message=_oscmem_CREATESUCCESS_individual;
		redirect_header("customfielddetailform.php?action=create&id=" . $personid, 3, $message);
	}
	    
    break;
}


//$id_hidden = new XoopsFormHidden("id",$person->getVar('id'));

$op_hidden = new XoopsFormHidden("op", "create");  //save operation
$submit_button = new XoopsFormButton("", "customdetailsubmit", _osc_create, "submit");

if($action=="create")
{
	$op_hidden = new XoopsFormHidden("op", "create");  //save operation
	$submit_button = new XoopsFormButton("", "customfielddetailsubmit", _osc_create, "submit");
}

$form = new XoopsThemeForm(_oscmem_customfield, "customfielddetailform", "customfieldselectform.php?action=create", "post", true);


$form->addElement($op_hidden);
//$form->addElement($id_hidden);

//Upload stuff

$form->addElement($submit_button);
//$form->setRequired($lastname_text);
//$form->setRequired($firstname_text);

$db = &Database::getInstance();

//Retrieve custom fields
$customFields = $persondetail_handler->getcustompersonFields();
$count=1;
$table_code="<table><tr>";
$table_code = $table_code . "<th></th><th>" . _oscmem_customfieldName . "</th><th>" . _oscmem_customfieldType . "</th><th></th></tr>";

while($row = $db->fetchArray($customFields)) 
{
	$table_code = $table_code . "<tr><td>" . $count++ . "</td>";

	$customName = new XoopsFormText('',"custom_Name",30,50,$row["custom_Name"]);	
		
	$table_code = $table_code . "<td>" . $customName->render() . "</td>";
	$table_code = $table_code . "<td>" . $row["optionname"]. "</td>";
	$table_code = $table_code . "<td><a href='customfielddetailform.php?id=" . $row["custom_Field"] . "'>" . "Edit" . "</a></td>";
	$table_code = $table_code . "</tr>";
	
}

$table_code = $table_code . "</table>";

$table_label = new XoopsFormLabel('', $table_code);
	
$form->addElement($table_label);


//		$form->addElement(new XoopsFormRadioYN($row["custom_Name"],$row["custom_Field"], $customData[$row["custom_Field"]]));
	
//	$form->addElement(new XoopsFormText($row["custom_Name"],$row["custom_Field"], 30, 50,$customData[$row["custom_Field"]]));
	

//xoops_cp_header();
$form->display();

//xoops_cp_footer();
include(XOOPS_ROOT_PATH."/footer.php");

?>