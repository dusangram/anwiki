<?php
/**
 * Anwiki is a multilingual content management system <http://www.anwiki.com>
 * Copyright (C) 2007-2009 Antoine Walter <http://www.anw.fr>
 * 
 * Anwiki is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, version 3 of the License.
 * 
 * Anwiki is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Anwiki.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Management home.
 * @package Anwiki
 * @version $Id: action_management.php 116 2009-02-07 11:09:11Z anw $
 * @copyright 2007-2009 Antoine Walter
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License 3
 */

class AnwActionDefault_management extends AnwActionGlobal implements AnwAlwaysEnabledAction
{
	function getNavEntry()
	{
		return $this->createNavEntry();
	}
	
	function run()
	{
		$this->setTitle( $this->t_('title') );
		$aoManagementNavEntries = self::getManagementNavEntriesAllowed();
		$this->out .= $this->tpl()->managementHome($aoManagementNavEntries);
		
	}
}

?>