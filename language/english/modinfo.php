<?php
// Module 
//
define("_oscmem_MOD_NAME","OSC Membership Module");
define("_oscmem_MOD_DESC","Xoops OSC Module for Membership.");
define("_oscmem_ADMENU0","OSC Membership Administation");
define("_oscmem_personselect","Person Select");
//Field names
//define("_oscdir_userfile","Church Picture");

define("_oscmem_name","Member Name");
define("_oscmem_lastname", "Last Name");
define("_oscmem_firstname", "First Name");
define("_oscmem_phone","Phone Number");
define("_oscmem_address","Address");
define("_oscmem_city","City");
define("_oscmem_state","State");
define("_oscmem_post","Zip");
define("_oscmem_email","Email");
define("_oscmem_country","Country");
define("_oscmem_title","Member Directory");
define("_oscmem_birthday","Birthday");
define("_oscmem_gender","Gender");
define("_oscmem_membershipdate","Membership Date");
define("_oscmem_submit","Submit");
define("_osc_save","Save");
define("_osc_select","Select");
define("_osc_create","Create");
define("_oscmem_actions","Actions");
define("_osc_addmember","Add Family Member");
define("_oscmem_addmember","Add Member");
define("_oscmem_addingmember","Redirecting to Add Member");

define("_oscmem_homephone","Home Phone");
define("_oscmem_workphone","Work Phone");
define("_oscmem_cellphone","Cell Phone");

define("_oscmem_groupname", "Group Name");
define("_oscmem_groupdescription","Group Description");
define("_oscmem_grouptype","Group Type");

define("_oscmem_workemail","Work Email");

define("_oscmem_male","Male");
define("_oscmem_female","Female");

define("_oscmem_datelastedited","Date Last Edited");
define("_oscmem_editedby","Edited By");
define("_oscmem_dateentered","Date Entered");
define("_oscmem_enteredby","Entered By");
define("_oscmem_birthdayinstructions","&nbsp;&nbsp;Birthday Format (MM/DD/YYYY)");
define("_oscmem_weddingdate","Wedding Date");

define("_oscmem_familyname","Family Name");

define("_oscmem_persondetail_TITLE","Person Detail Form");
define("_oscmem_familydetail_TITLE","Family Detail Form");
define("_oscmem_person_list","Person List");
define("_oscmem_family_list","Family List");
define("_oscmem_familymember","Family Members");
define("_oscmem_groupselect_TITLE","Group List");
define("_oscmem_groupdetail_TITLE","Group Form");
//Messages
define('_oscmem_UPDATESUCCESS','The OSC Membership database has been updated successfully');
define('_oscmem_CREATESUCCESS_individual','The Individual has been created in the OSC database.');

define("_oscmem_CREATESUCCESS_family","The Family has been created in the OSC database.");
define("_oscmem_addfamily_redirect","Redirecting to Add Family");

define("_oscmem_UPDATESUCCESS_member","Member(s) added to family.");
define("_oscmem_REMOVEMEMBERSUCCESS","Family Member Removed.");
define("_oscmem_nomembers","No Family Members");
define("_oscmem_nogroups","No Groups.  To create a group click <a href=>here</a>");

define("_oscmem_persondetail","Members");
define("_oscmem_customfield","Person Custom Fields");
define("_oscmem_customfieldName", "Field Name");
define("_oscmem_customfieldType","Type");

//Groups
define("_oscmem_groupmember","Group Membership");
define("_osc_addgroupmember","Add Group Members");
define("_oscmem_UPDATESUCCESS_member_grooup","Member added to Group Successfully");
define("_oscmem_REMOVEGROUPMEMBERSUCCESS","Group Member Successfully removed.");

//Menu
define("_oscmembership_viewperson","Members");
define("_oscmembership_addperson", "Add Member");
define("_oscmembership_addfamily","Add Family");
define("_oscmembership_viewfamily","Family");
define("_oscmem_remove_member","Remove Member");
define("_oscmem_edit_member","Edit Member");
define("_oscmem_edit","Edit");
define("_oscmembership_viewgroup","Groups");
define("_oscmem_addgroup","Add Group");
define("_oscmem_addgroup_redirect","Redirecting to Add Group");

//customfield
define("_oscmem_customfieldOrder","Order");
define("_oscmem_customName","Display Name");

define("_oscmem_familyrole","Family Role");

define("_oscmem_unassigned","Unassigned");

define("_oscmem_optionname","Option Name");
define("_oscmem_optionsequence","Sequence");
define("_oscmem_osclist_famrole_TITLE","Family Roles");

define("_oscmem_osclist_TITLE_familyroles","Family Roles");
define("_oscmem_osclist_TITLE_memberclassifications","Member Classifications");
define("_oscmem_osclist_TITLE_grouptypes","Group Types");

define("_oscmem_admin_osclist_familyroles","Modify Family Roles");

define("_oscmem_admin_osclist_memberclassification","Modify Member Classifications");

define("_oscmem_admin_osclist_grouptype","Modify Group Types");

define("_oscmem_filter","Filter");
define("_oscmem_applyfilter","Apply Filter");
define("_oscmem_clearfilter","Clear Filter");
define("_oscmem_addtocart","Add to Cart");
define("_oscmem_remove","Remove");
define("_oscmem_emptycart","Empty Cart");
define("_oscmem_emptycarttogroup","Empty Cart to Group");
define("_oscmem_emptycarttofamily","Empty Cart to Family");
define("_oscmem_generatelabels","Generate Labels");
define("_oscmem_addedtocart","Members have been added to the cart.");
define("_oscmem_intersectcart","Intersect Cart");
define("_oscmem_removefromcart","Remove from Cart");

define("_oscmem_msg_removedfromcart","Selected Individuals have been successfully removed from the cart");
define("_oscmem_msg_intersectedcart","Selected Individuals have been successfully intersected with the cart");

define("_oscmem_view_cart","View Cart");
define("_oscmem_cartcontents","Cart Contents");
define("_oscmem_memberview","Membership View");
define("_oscmem_yes","Yes");
define("_oscmem_no","No");

define("_oscmem_reporttitle","OSC Membership Reports");
define("_oscmem_directoryreport","Membership Directory");
define("_oscmem_reports", "Reports");

define("_oscmem_dirreport_selectclass","Select classifications to include:");
define("_oscmem_usectl","Use Ctrl Key to select multiple");
define("_oscmem_dirreport_groupmemb","Group Membership:");
define("_oscmem_dirreport_headhouse","Which role is the head of household?");
define("_oscmem_dirreport_spouserole","Which role is the spouse?");
define("_oscmem_dirreport_childrole","Which role is a child?");
define("_oscmem_dirreport_infoinclude","Information to Include:");

define("_oscmem_address_label","Address:");
define("_oscmem_familyhomephone","Family Home Phone");
define("_oscmem_familyworkphone","Family Work Phone");
define("_oscmem_familycellphone","Family Cell Phone");
define("_oscmem_familyemail","Family Email");
define("_oscmem_personalphone","Individual Phone");
define("_oscmem_personalworkphone","Individual Work Phone");
define("_oscmem_personalcell","Individual Cell Phone");
define("_oscmem_personalemail","Individual Email");
define("_oscmem_personalworkemail","Individual Work Email");

define("_oscmem_informationinclude","Information to Include:");
define("_oscmem_diroptions","Directory Options");
define("_oscmem_altfamilyname","Dual Listing - Alternate Family Name");
define("_oscmem_althead","Use only Family Name for listing");
define("_oscmem_dirsort","Directory Sort");
define("_oscmem_orderbyfirstname","Order Directory by First Name");
define("_oscmem_directorytitle","Church Directory Options");

define("_oscmem_titlepagesettings","Directory Title Page Settings");

define("_oscmem_usetitlepageyn","Use Title Page");
define("_oscmem_churchname_label","Church Name");
define("_oscmem_disclaimer","Disclaimer");

?>