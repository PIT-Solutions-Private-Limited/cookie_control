.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Configuration
==============

Cookie control plugin can be configured in 2 ways  

A) tt_content [to be used in case of Information only consent mode].

B) Using Typoscript (used in Implicit or Explicit mode)

Using tt_content
------------------

1.) Add static typo script “Cookie Control” in the template record. Choose the page to configure cookie control plug in.

2.) Add a  plugin content element. Choose cookie_control plugin from the Plugins section.

3.) Click on the ‘Plugin’ tab and Fill out all the fields for the configuration option for cookie control plug in. Default values specified in the typoscript constants will be taken if fields are empty in plugin options. All available settings in the plugin options are described in the user manual section above.

4.)  After filling click the ‘save button’ and the the cookie control popup will appear in the front end.

Using Typo script
------------------
1.) Add the static template Cookie Control in the root template record; adjust the constants (described in typo script configuration page)

Eg: typo script plugin.tx_cookiecontrol_pi1.extra_options = onReady:function(){},onCookiesAllowed:function(){ccAddAnalytics()},onCookiesNotAllowed:function(){}page.20 < plugin.tx_cookiecontrol_pi1


.. toctree::
	:maxdepth: 5
	:titlesonly:
	:glob:

	Typo Script Settings/Index
	Typo Script Reference/Index


