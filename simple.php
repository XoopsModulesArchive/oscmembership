<?php

include("../../mainfile.php");
include_once XOOPS_ROOT_PATH.'/header.php';

//include(XOOPS_ROOT_PATH."/header.php");
// language files

$language = $xoopsConfig['language'] ;

$xoopsOption['template_main'] = 'simple.html';

//redirect
if (!$xoopsUser)
{
    redirect_header(XOOPS_URL."/user.php", 3, _oscmem_accessdenied);
}


$xoopsTpl->assign("test","hi");

include_once XOOPS_ROOT_PATH."/footer.php";


?>