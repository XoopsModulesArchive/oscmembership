<?php
// $Id: osclist.php,v 1.1.1.1 2006/03/12 14:57:25 root Exp $
//  ------------------------------------------------------------------------ //
//                ChurchhLedger.com
//                    Copyright (c) 2006 
//
//                       <http://www.churchledger.com/>    
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

class Osclist extends XoopsObject {
    var $db;
    var $table;

    function Osclist()
    {
        $this->db = &Database::getInstance();
        $this->table = $this->db->prefix("oscmembership_list");
	$this->initVar('id',XOBJ_DTYPE_INT);
	$this->initVar('optionid',XOBJ_DTYPE_INT);
	$this->initVar('optionname',XOBJ_DTYPE_TXTBOX);
	$this->initVar('optionsequence',XOBJ_DTYPE_INT);
    }

}    
    

class oscMembershipOsclistHandler extends XoopsObjectHandler
{

	function &getitems(&$osclist)
	//Search on criteria and return result
	{
	
		$result='';
		$returnresult='';
		
		$sql = "SELECT p.* FROM " . $osclist->table . " p
		WHERE id=" . $osclist->getVar('id');
		$sql =  $sql . " order by optionsequence";
		
		$oddrow=false;

		$oscitems[]=array();
		
		if ($result = $this->db->query($sql)) 
		{
			$i=0; //start counter
			while($row = $this->db->fetchArray($result)) 
			{
				if(isset($row))
				{
					$osclist=&$this->create(false);
					$osclist->assignVars($row);
					$oscitems[$i]['oddrow']=$oddrow;
					$oscitems[$i]['id']=$osclist->getVar('id');
					$oscitems[$i]['optionid']=$osclist->getVar('optionid');
					$oscitems[$i]['optionsequence']=$osclist->getVar('optionsequence');
					$oscitems[$i]['optionname']=$osclist->getVar('optionname');
					$oscitems[$i]['loopcount']=$i;
					
				}
				$i++; //start counter
			}
			
			return $oscitems;
		}
		else return null;
		
	}

	
    function remove($osclist)
    {
		$sql = "Delete " .
		$this->table ;
		$sql = $sql . " where id=" . $osclist->getVar('id') . " and optionid=" . $osclist->getVar('optionid') ;      
	
		if (!$result = $this->db->query($sql)) 
		{
			return false;
		}
    }

    
    function &create($isNew = true)
    {
    	$osclist = new Osclist();
        if ($isNew) {
            $osclist->setNew();
        }
        return $osclist;
    }


    function &get($osclist)
    {
    
        if (intval($osclist->getVar('id')) > 0) 
	{
		$sql = "SELECT * FROM " . $osclist->table . " WHERE id = " . intval($osclist->getVar('id')) . " and optionid=" . intval($osclist->getVar('optionid'));
		
		
		if (!$result = $this->db->query($sql)) 
		{
			echo "<br />NewbbForumHandler::get error::" . $sql;
			return false;
		} 
		if($row = $this->db->fetchArray($result)) 
		{
			$osclist->assignVars($row);
		}

		
        }
        return $osclist;
    }
    
	function &update(&$osclist)
	{
		$sql = "UPDATE " . $osclist->table
		. " SET "
		. "optionname=" . $this->db->quoteString($osclist->getVar('optionname'))
		. ",optionsequence=" .
		$osclist->getVar('optionsequence');
		
		$sql .=" where id=" . $osclist->getVar('id') . " and optionid=" . $osclist->getVar('optionid');
		
		if (!$result = $this->db->query($sql)) {
			echo "<br />oscmembershipHandler::get error::" . $sql;
			return false;
			}
	}

	     
	function &insert(&$osclist)
    	{
	
		//get next optionid
		$sqlcount="select max(optionid)+1 'rowcount' from " . $osclist->table . " where id=" . $osclist->getVar('id');

		$result = $this->db->query($sqlcount);

		$row = $this->db->fetchArray($result);
		
		$nextid= $row['rowcount'];
		
		$sql = "INSERT into " . $osclist->table
		. "(id, optionid, optionname, optionsequence)";
		$sql = $sql . "values(" . $osclist->getVar('id')
		. "," . 
		$nextid
		. "," . 
		$this->db->quoteString($osclist->getVar('optionname'))
		. "," . 
		$osclist->getVar('optionsequence') . 
		")";

  		if (!$result = $this->db->query($sql)) {
			echo "<br />oscmembershipHandler::get error::" . $sql;
			return false;
			}
		else
		{
			return $this->db->getInsertId();
		}
	}

}


?>