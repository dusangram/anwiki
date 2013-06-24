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
 * CurrentSession reserved for batch mode (no IP check).
 * @package Anwiki
 * @version $Id: class_currentsession-minimal.php 116 2009-02-07 11:09:11Z anw $
 * @copyright 2007-2009 Antoine Walter
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License 3
 */

if (!ANWIKI_MODE_BATCH || !defined("STDIN") ) AnwDieCriticalError("Bad execution mode");

class AnwCurrentSession
{
		
	//------------------------------------------------
	// ACCESSORS
	//------------------------------------------------
	
	static function getUser()
	{
		return new AnwUserBatch();
	}
	
	static function getLang()
	{
		return AnwComponent::globalCfgLangDefault();
	}
	
	/*static function getId()
	{
		return self::getSession()->getId();
	}*/
	
	static function getTimezone()
	{
		return 2;
	}
	
	static function isLoggedIn()
	{
		return false;
	}
	
	static function needsReauth()
	{
		return false;
	}
	
	static function resetReauth()
	{
	}
	
	static function getSession()
	{
		return new AnwSession(); //anonymous session
	}
	
	static function getIp()
	{
		// no IP available in batch mode
		// AnwEnv will return hardcoded IP 127.0.0.1 by recognizing ANWIKI_MODE_BATCH
		return AnwEnv::getIp();
	}
	
	static function isActionAllowed($sPageName, $sAction, $sLang)
	{
		return true;
	}
	
	static function isActionGlobalAllowed($sAction)
	{
		return true;
	}
	
}

class AnwUserBatch extends AnwUserAnonymous
{
	function getDisplayName()
	{
		return "Batch";
	}
	
	function getLogin()
	{
		return 'batch';
	}
}

?>