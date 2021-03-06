<?php

namespace RENOLIT\ReintMailtaskExample\Task;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Ephraim Härer <ephraim.haerer@renolit.com>, RENOLIT SE
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * task class which executes only another class
 * see: http://docs.typo3.org/typo3cms/extensions/scheduler/latest/DevelopersGuide/CreatingTasks/Index.html
 */
class MailSendoutTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {
	
	/*
	 * executed by scheduler
	 */
	public function execute() {

		// initialize task class
		$mailSendout = GeneralUtility::makeInstance('RENOLIT\\ReintMailtaskExample\\Task\\MailSendout');
		return $mailSendout->run($this->link, $this->translang, $this->receiver_email, $this->receiver_name, $this->sender_email, $this->sender_name, $this->rootpage_id);
	}

}
