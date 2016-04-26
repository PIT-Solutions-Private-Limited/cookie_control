.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _users-manual:

Users manual
============

Content Model
These can be either of the 3 options:

1: Information only (Informs users the site is using cookies. They are given no option to opt out. )

2: Implicit (Informs users the site is using cookies and they are given the option to opt out. )

3:Explicit (Informs users the site would like to use cookies and they are given the option to opt in. ) 


**Popup Box title :** Enter the title of the cookie control box . 

**Introductory text :** Information text as subheader inside the popup.

**Additional text :** Information additional text inside the popup.

**Extra options :** Set some extra javascript options as in  .  Eg :
	onAccept:function(){ccAddAnalytics()}

	onReady:function(){}

	onCookiesAllowed:function(){ccAddAnalytics()},

	onCookiesNotAllowed:function(){}

**Enable Countries :** Enable country check for cookies with a geo cms plugin

**Countries :** If the above field is checked, country string can be added in this field to only perform cookie control only for the specified countries in the list. Use the full country name; list of  valid country names can be checked here

**Google Analytics Code :** If you use Google Analytics, enter your Google Analytics Key in this field here. This will prevent Google Analytics cookies being set before your users allow cookies on your site.

**Template file :** Path to the template file for front end.

**Select the Theme :** Select the available CSS themes that you want to see in the front end. By default the 'Default' theme will be selected.

**Custom theme :** If theme selection is custom in the above field, then path to custom css can be defined here.

**Theme Position :** The icon can be positioned either in left or right. The default value is left.

**Include Jquery Library :** Cookie control needs to include jquery library for its working. By default there is a jquery library in the extension. If you have a jquery library included in your template you can uncheck the default option.

*Note :* If you want to hide the Cookie Control  pop up after the user has given consent then  check the  'Do not ask me again' in explicit mode . 