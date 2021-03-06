<?php
include("../../mainfile.php");
$GLOBALS['xoopsOption']['template_main'] ="familyview.html";

//redirect
if (!$xoopsUser)
{
    redirect_header(XOOPS_URL."/user.php", 3, _oscmem_accessdenied);
}


include XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar('dirname') . "/include/functions.php";

if(!hasPerm("oscmembership_view",$xoopsUser))     redirect_header(XOOPS_URL, 3, _oscmem_accessdenied);

if(hasPerm("oscmembership_view",$xoopsUser)) $ispermview=true;
if(hasPerm("oscmembership_modify",$xoopsUser)) $ispermmodify=true;

if (isset($_POST['submit'])) $submit = $_POST['submit'];

include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/family.php';

$sort="";
$filter="";
if (isset($_GET['sort'])) $sort = $_GET['sort'];
if (isset($_POST['filter'])) $filter=$_POST['filter'];
if (isset($_POST['loopcount'])) $loopcount=$_POST['loopcount'];

include(XOOPS_ROOT_PATH."/header.php");

$family_handler = &xoops_getmodulehandler('family', 'oscmembership');
if(isset($filter))
{
	$searcharray[0]=$filter;
}
else $searcharray[0]='';

if(isset($submit))
{
	switch($submit)
	{
	case _oscmembership_addfamily:
		redirect_header("familydetailform.php?action=create", 2, _oscmem_addfamily_redirect);
		
		//do nothing
		break;

	case _oscmem_deletefamily:
		$deletelist="";
		if($ispermmodify==true)
		{
			for($i=0;$i<$loopcount+1;$i++)
			{
				if (isset($_POST['chk' . $i]))
				{
					$id=$_POST['chk' . $i];
					$uid=$xoopsUser->getVar('uid');
					$family_handler->delete($id);
				}
			}
	//		redirect_header("familylistform.php", 2, _oscmem_deleted);
		}
		else redirect_header(XOOPS_URL."/user.php", 3, _oscmem_accessdenied);

		break;
	}


}


$results = $family_handler->search($searcharray, $sort);
$xoopsTpl->assign("title",_oscmem_family_list);

$xoopsTpl->assign('oscmem_applyfilter',_oscmem_applyfilter);
$xoopsTpl->assign('oscmem_familyname',_oscmem_familyname);
$xoopsTpl->assign('oscmem_address',_oscmem_address);
$xoopsTpl->assign('oscmem_clearfilter',_oscmem_clearfilter);
$xoopsTpl->assign('oscmem_addmember',_oscmem_addmember);
$xoopsTpl->assign('oscmem_deletefamily',_oscmem_deletefamily);
$xoopsTpl->assign('oscmem_email',_oscmem_email);
$xoopsTpl->assign('is_perm_view',$ispermview);
$xoopsTpl->assign('is_perm_modify',$ispermmodify);
$xoopsTpl->assign('oscmem_view',_oscmem_view);
$xoopsTpl->assign('oscmem_edit',_oscmem_edit);
$xoopsTpl->assign('oscmembership_addfamily',_oscmembership_addfamily);
$xoopsTpl->assign('oscmembership_addcarttofamily',_oscmembership_addcarttofamily);

$xoopsTpl->assign('families',$results);

$family=$results[0];

$totalloopcount=$family->getVar('totalloopcount');
$xoopsTpl->assign('loopcount', $totalloopcount);


include(XOOPS_ROOT_PATH."/footer.php");

?>