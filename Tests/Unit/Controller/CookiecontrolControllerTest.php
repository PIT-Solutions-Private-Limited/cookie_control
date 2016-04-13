<?php
namespace PITSOLUTIONS\CookieControl\Tests\Unit\Controller;
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
 * Test case for class PITSOLUTIONS\CookieControl\Controller\CookiecontrolController.
 *
 * @author SIJU E RAJU <siju.er@pitsolutions.com>
 */
class CookiecontrolControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \PITSOLUTIONS\CookieControl\Controller\CookiecontrolController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('PITSOLUTIONS\\CookieControl\\Controller\\CookiecontrolController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCookiecontrolsFromRepositoryAndAssignsThemToView()
	{

		$allCookiecontrols = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$cookiecontrolRepository = $this->getMock('PITSOLUTIONS\\CookieControl\\Domain\\Repository\\CookiecontrolRepository', array('findAll'), array(), '', FALSE);
		$cookiecontrolRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCookiecontrols));
		$this->inject($this->subject, 'cookiecontrolRepository', $cookiecontrolRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('cookiecontrols', $allCookiecontrols);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCookiecontrolToView()
	{
		$cookiecontrol = new \PITSOLUTIONS\CookieControl\Domain\Model\Cookiecontrol();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('cookiecontrol', $cookiecontrol);

		$this->subject->showAction($cookiecontrol);
	}
}
