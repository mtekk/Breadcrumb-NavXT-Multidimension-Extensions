=== Breadcrumb NavXT Multidimension Extensions===
Contributors: mtekk
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=FD5XEU783BR8U&lc=US&item_name=Breadcrumb%20NavXT%20Donation&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: breadcrumb, breadcrumbs, trail, navigation, menu, widget
Requires at least: 3.8
Tested up to: 3.9.0
Stable tag: 1.07
License: GPLv2 or later
Automates the generation of multidimensional list breadcrumb trails with Breadcrumb NavXT.

== Description ==

In the [Vista-Like Breadcrumbs for WordPress](http://mtekk.us/archives/guides/vista-like-breadcrumbs-for-wordpress/) guide, code was presented for recreating the breadcrumb style featured in Windows Vista and Windows 7. That code eventually was updated and placed into a plugin to ease implementation. This is that plugin.

= Translations =

Breadcrumb NavXT Multidimension Extensions is distributed with translations for the following languages:

* English - default -

Don't see your language on the list? Stop by [Breadcrumb NavXT's translation project](http://translate.mtekk.us/projects/breadcrumb-navxt "Go to Breadcrumb NavXT's GlotPress based translation project").

== Installation ==
Open the appropriate file for your theme (typically header.php). This can be done within WordPress’ administration panel through Presentation > Theme Editor or through your favorite text editor. Place the following code where you want the breadcrumb trail to appear.
`<ul class="breadcrumbs">
	<?php if(function_exists('bcn_display_list_multidim'))
	{
		bcn_display_list_multidim();
	}?>
</ul>`
Save the file (upload if applicable). Now you should have a breadcrumb trail on your WordPress powered site. To customize the breadcrumb trail you may edit the default values for the options in the administrative interface. This is located in your administration panel under Settings > Breadcrumb NavXT.

Please visit [Breadcrumb NavXT's Documentation](http://mtekk.us/code/breadcrumb-navxt/breadcrumb-navxt-doc/ "Go to Breadcrumb NavXT's Documentation.") page for more information.

== Changelog ==
= 1.7.0 =
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.0.x
= 1.6.0 =
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 4.2.x
= 1.5.0 =
* Initial Public Release

== Upgrade Notice ==

= 1.7.0 =
Added support for Breadcrumb NavXT 5.0.x