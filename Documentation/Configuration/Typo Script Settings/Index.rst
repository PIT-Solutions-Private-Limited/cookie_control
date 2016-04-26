.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _users-manual:

Typo Script Settings
====================

Setup
---------

.. container:: table-data

         ::

            page.1000= USER
            page.1000{
            userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
            extensionName = CookieControl
            pluginName = Cookiecontrol
            vendorName    = PITSOLUTIONS
            settings {
                countryselect = 0
                iconType = diamond
                themeSelect = default
                consentModel = implicit
                enableSession = 1
                iconPosition = right
                implicit_showWidget = 1
                include_jquery=1
               }
            }

Configure the introductory_text and additional_text using locallang variables in typoscript

plugin.tx_cookiecontrol._LOCAL_LANG.en.introductory_text   =  INTRODUCTORY TEXT
plugin.tx_cookiecontrol._LOCAL_LANG.en.additional_text =  ADDITIONAL TEXT