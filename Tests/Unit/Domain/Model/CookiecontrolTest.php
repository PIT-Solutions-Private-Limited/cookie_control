<?php

namespace PITSOLUTIONS\CookieControl\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 SIJU E RAJU <siju.er@pitsolutions.com>, PIT SOLUTIONS PVT LTD
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 ***************************************************************/

/**
 * Test case for class \PITSOLUTIONS\CookieControl\Domain\Model\Cookiecontrol.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author SIJU E RAJU <siju.er@pitsolutions.com>
 */
class CookiecontrolTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \PITSOLUTIONS\CookieControl\Domain\Model\Cookiecontrol
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \PITSOLUTIONS\CookieControl\Domain\Model\Cookiecontrol();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function dummyTestToNotLeaveThisFileEmpty()
	{
		$this->markTestIncomplete();
	}
}
