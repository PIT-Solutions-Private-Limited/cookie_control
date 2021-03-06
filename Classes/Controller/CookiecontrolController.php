<?php

namespace PITSOLUTIONS\CookieControl\Controller;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 SIJU E RAJU <siju.er@pitsolutions.com>, PIT SOLUTIONS PVT LTD
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

/**
 * CookiecontrolController
 */
class CookiecontrolController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * cookiecontrolRepository
     *
     * @var \PITSOLUTIONS\CookieControl\Domain\Repository\CookiecontrolRepository
     * @inject
     */
    protected $cookiecontrolRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->request);

        $cookiecontrols = $this->settings;


        /*Theme Selector*/
        switch ($this->settings['themeSelect']) {
            case 'default':
                $cookiecontrols['themeSelect'] = 0;
                break;
            case 'grey':
                $cookiecontrols['themeSelect'] = 1;
                break;
            case 'black':
                $cookiecontrols['themeSelect'] = 2;
                break;
            case 'blue':
                $cookiecontrols['themeSelect'] = 3;
                break;
            case 'custom':
                $cookiecontrols['themeSelect'] = 4;
                break;
        }


        $uid = $this->settings['customThemeSelect'];
        if ($uid) {
            $args = explode(':', $uid);

            if ($args[0] == 'file') {

                $fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
                $fileObjects = $fileRepository->findByUid($args[1]);
                $r = $fileObjects->getProperties();
                $storage = $fileObjects->getStorage();
                $con = $storage->getConfiguration();
                $cookiecontrols['path'] = $con['basePath'] . $r['identifier'];
               
            } else {

                $cookiecontrols['path'] = $uid;
            }
        }

        $cookiecontrols['readmore'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate("readmore", $this->extensionName);
        $cookiecontrols['readless'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate("readless", $this->extensionName);
        $cookiecontrols['codeButton'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate("readmore", $this->extensionName);
        $cookiecontrols['cookieoff'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('cookieoff', $this->extensionName);
        $cookiecontrols['cookieon'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('cookieon', $this->extensionName);
        $cookiecontrols['cookieofftext'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('cookieofftext', $this->extensionName);
        $cookiecontrols['cookiepreftext'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('cookiepreftext', $this->extensionName);
        $cookiecontrols['cookiecheckboxlabel'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('cookiecheckboxlabel', $this->extensionName);
        $cookiecontrols['cookiecheckboxtext'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('cookiecheckboxtext', $this->extensionName);
        $cookiecontrols['close'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('close', $this->extensionName);
        $cookiecontrols['addSize'] = strlen(htmlentities($this->settings['additional_text']));
        $cookiecontrols['introductory_text'] = ($this->settings['introductory_text'] != "") ? $this->settings['introductory_text'] :
                addslashes(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('introductory_text', $this->extensionName));
        $cookiecontrols['themeTitle'] = $this->settings["themeTitle"] ? $this->settings["themeTitle"] :
                \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('titlelabel', $this->extensionName);

        $this->view->assign('cookiecontrols', $cookiecontrols);
    }

    /**
     * action show
     *
     * @param \PITSOLUTIONS\CookieControl\Domain\Model\Cookiecontrol $cookiecontrol
     * @return void
     */
    public function showAction(\PITSOLUTIONS\CookieControl\Domain\Model\Cookiecontrol $cookiecontrol) {
        //$this->view->assign('cookiecontrol', $cookiecontrol);
    }

    /**
     * action delete
     *
     * @param 
     * @return void
     */
    public function deleteAction() {
     if ($this->settings['consentModel'] != 'information_only') {
                session_start();                              
                // cookie control for login                 
                if ($_SESSION['disable_session'] == 1 ) {
                   // $httpcookie = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_COOKIE');
                     $httpcookie =$_SERVER['HTTP_COOKIE'];
                    if (isset($httpcookie)) {
                        $cookies = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(';', $httpcookie);
                        foreach ($cookies as $cookie) {
                            $parts = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('=', $cookie);
                            $name = trim($parts[0]);
                            if ($name == 'PHPSESSID' && $this->settings['enableSession'] == 0) {
                                setcookie($name, '', time() - (60 * 60 * 24 * 365 * 10));
                                setcookie($name, '', time() - (60 * 60 * 24 * 365 * 10), '/', '.' . \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_HOST'));
                            } else if ($name != 'PHPSESSID') {
                                setcookie($name, '', time() - (60 * 60 * 24 * 365 * 10));
                                setcookie($name, '', time() - (60 * 60 * 24 * 365 * 10), '/', '.' . \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_HOST'));
                            }
                        }
                    }
                    if ($_REQUEST['user'] != "")
                        \TYPO3\CMS\Core\Utility\HttpUtility::redirect(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_REFERER'));
                }
            }
    }

}
