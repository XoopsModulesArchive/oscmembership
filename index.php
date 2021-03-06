<?php
/**
 * Main index page for the module
 * @version $Id$
 */
/** Include the root mainfile */
include '../../mainfile.php';

$GLOBALS['xoopsOption']['template_main'] ="memberview.html";

$user=$xoopsUser;
//$perm="View Permissions";
$userId = ($user) ? $user->getVar('uid') : 0;
//$permissionPull = $groupPermHandler->getItemIds($perm, $user->groups(), $module->getVar("mid"));

include XOOPS_ROOT_PATH.'/include/cp_functions.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/person.php';
include_once XOOPS_ROOT_PATH . '/modules/oscmembership/include/functions.php';

if (file_exists('language/'.$xoopsConfig['language'].'/modinfo.php')) {
	include 'language/'.$xoopsConfig['language'].'/modinfo.php';
} else {
	include 'language/english/modinfo.php';
}

include XOOPS_ROOT_PATH.'/header.php';

//redirect
if (!$xoopsUser)
{
	redirect_header(XOOPS_URL.'/user.php', 3, _oscmem_accessdenied);
}

if(hasPerm('oscmembership_view',$xoopsUser)) $ispermview=true;
if(hasPerm('oscmembership_modify',$xoopsUser)) $ispermmodify=true;
$sort='';
$filter='';
$page=1;
$limit=5;

if (isset($_POST['sort'])) $sort = $_POST['sort'];
if (isset($_POST['filter'])) $filter=$_POST['filter'];
if (isset($_GET['filter'])) $filter=$_GET['filter'];
if (isset($_POST['submit'])) $submit = $_POST['submit'];
if (isset($_POST['loopcount'])) $loopcount = (int) $_POST['loopcount'];
if(isset($_SESSION['page'])) $page= (int) $_SESSION['page'];
if(isset($_POST['page'])) $page= (int) $_POST['page'];
if(isset($_POST['rowstodisplay'])) $limit= (int) $_POST['rowstodisplay'];

$person_handler = &xoops_getmodulehandler('person', 'oscmembership');

$searcharray=array();
if(isset($submit))
{
	switch($submit)
	{
		case _oscmem_menu_leftleftbutton :
			$page=1;
			break;

		case _oscmem_menu_rightrightbutton :

			if(isset($filter))
			{
				$searcharray[0]=$filter;
			}
			$rowcount=$person_handler->getrowcount($searcharray);

			$page=round($rowcount/$limit,0);
			break;

		case _oscmem_menu_leftbutton :  //previous page
			$page--;
			if($page<1) $page=1;
			break;

		case _oscmem_menu_rightbutton : //next page
			$page++;
			break;

		case _oscmem_addmember:
			redirect_header('persondetailform.php?action=create', 2, _oscmem_addingmember);
			break;

		case _oscmem_deletemember:
			$deletelist='';
			if($ispermmodify==true)
			{
				for($i=0;$i<$loopcount+1;$i++)
				{
					if (isset($_POST['chk' . $i]))
					{
						$id=$_POST['chk' . $i];
						$uid=$xoopsUser->getVar('uid');
						$person_handler->delete($id);
					}
				}
				redirect_header('index.php', 2, _oscmem_deleted);
			}
			else redirect_header(XOOPS_URL.'/user.php', 3, _oscmem_accessdenied);

			break;

		case _oscmem_applyfilter:
			//do nothing
			break;
		case _oscmem_clearfilter:
			$filter='';
			break;

		case _oscmem_addtocart:
			//call add cart
			for($i=0;$i<$loopcount+1;$i++)
			{
				if (isset($_POST['chk' . $i]))
				{
					$id=$_POST['chk' . $i];
					$uid=$xoopsUser->getVar('uid');
					$person_handler->addtoCart($id, $uid);
				}
			}
			redirect_header('index.php', 3, _oscmem_addedtocart);
			break;

		case _oscmem_removefromcart:
			for($i=0;$i<$loopcount+1;$i++)
			{
				if (isset($_POST['chk' . $i]))
				{
					$id=$_POST['chk' . $i];
					$uid=$xoopsUser->getVar('uid');
					$person_handler->removefromCart($id, $uid);
				}
			}
			redirect_header('index.php', 2, _oscmem_msg_removedfromcart);
			break;

		case _oscmem_intersectcart:
			for($i=0;$i<$loopcount+1;$i++)
			{
				if (isset($_POST['chk' . $i]))
				{
					$id=$_POST['chk' . $i];
					$uid=$xoopsUser->getVar('uid');
					//$person_handler->removefromCart($id, $uid);
				}
			}
			redirect_header('index.php', 2, _oscmem_msg_intersectedcart);
			break;
	}
}

if(isset($filter))
{
	$searcharray[0]=$filter;
}
else $searcharray[0]='';

//compute page and offset
$offset=$limit*($page-1);

$persons = $person_handler->search3($searcharray, $sort,null,$offset,$limit);

$xoopsTpl->assign('oscmem_applyfilter',_oscmem_applyfilter);
$xoopsTpl->assign('title',_oscmem_memberview);
$xoopsTpl->assign('oscmem_name',_oscmem_name);
$xoopsTpl->assign('oscmem_address',_oscmem_address);
$xoopsTpl->assign('oscmem_email',_oscmem_email);
$xoopsTpl->assign('oscmem_clearfilter',_oscmem_clearfilter);
$xoopsTpl->assign('oscmem_addtocart',_oscmem_addtocart);
$xoopsTpl->assign('oscmem_removefromcart',_oscmem_removefromcart);
$xoopsTpl->assign('oscmem_addmember',_oscmem_addmember);
$xoopsTpl->assign('is_perm_view',$ispermview);
$xoopsTpl->assign('is_perm_modify',$ispermmodify);
$xoopsTpl->assign('oscmem_view',_oscmem_view);
$xoopsTpl->assign('oscmem_edit',_oscmem_edit);
$xoopsTpl->assign('oscmem_confirmdelete',_oscmem_confirmdelete);
$xoopsTpl->assign('oscmem_deletemember',_oscmem_deletemember);
$xoopsTpl->assign('oscmem_filter',$filter);
$xoopsTpl->assign('page',$page);
$_SESSION['page']=$page;
$xoopsTpl->assign('oscmem_rowstodisplay',$limit);
$xoopsTpl->assign('oscmem_label_rowstodisplay',_oscmem_label_rowstodisplay);

$xoopsTpl->assign('oscmem_menu_leftleftbutton',_oscmem_menu_leftleftbutton);

$xoopsTpl->assign('oscmem_menu_leftbutton',_oscmem_menu_leftbutton);

$xoopsTpl->assign('oscmem_menu_rightrightbutton',_oscmem_menu_rightrightbutton);

$xoopsTpl->assign('oscmem_menu_rightbutton',_oscmem_menu_rightbutton);

if($page==1)
{
	$xoopsTpl->assign('oscmem_prevpage',1);
}
else
{
	$xoopsTpl->assign('oscmemb_prevpage',$page-1);
}

if($persons[0]->getVar('totalloopcount')>0)
{
	$xoopsTpl->assign('persons',$persons);
	$xoopsTpl->assign('loopcount', $persons[0]->getVar('totalloopcount'));
}
else
{
	$person=array();
	$xoopsTpl->assign('persons',$persons);
	$xoopsTpl->assign('loopcount', '0');
}

//xoops_cp_footer();
include XOOPS_ROOT_PATH.'/footer.php';
?>