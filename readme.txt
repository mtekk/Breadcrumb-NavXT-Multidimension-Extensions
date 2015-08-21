=== Breadcrumb NavXT Multidimension Extensions===
Contributors: mtekk
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=FD5XEU783BR8U&lc=US&item_name=Breadcrumb%20NavXT%20Donation&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: breadcrumb navxt, breadcrumb, breadcrumbs, trail, navigation, menu
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 1.9.0
License: GPLv2 or later
Automates the generation of multidimensional list breadcrumb trails with Breadcrumb NavXT.

== Description ==

In the [Vista-Like Breadcrumbs for WordPress](http://mtekk.us/archives/guides/vista-like-breadcrumbs-for-wordpress/) guide, code was presented for recreating the breadcrumb style featured in Windows Vista and Windows 7. That code eventually was updated and placed into a plugin to ease implementation. This is that plugin.

= Breadcrumb NavXT Versions Supported =

This plugin supports Breadcrumb NavXT 5.0.x and Breadcrumb NavXT 5.1.x.

= Translations =

Breadcrumb NavXT Multidimension Extensions is distributed with translations for the following languages:

* English - default -

Don't see your language on the list? Stop by [Breadcrumb NavXT's translation project](http://translate.mtekk.us/projects/breadcrumb-navxt "Go to Breadcrumb NavXT's GlotPress based translation project").

== Installation ==
Open the appropriate file for your theme (typically header.php). This can be done within WordPress’ administration panel through Presentation > Theme Editor or through your favorite text editor. Place one of the following code snippets where you want the breadcrumb trail to appear.

= Siblings in the Second Dimension =
The following code will produce a multidimensional breadcrumb trail with the siblings of a breadcrumb in it’s second dimension:
`<ul class="breadcrumbs">
	<?php if(function_exists('bcn_display_list_multidim'))
	{
		bcn_display_list_multidim();
	}?>
</ul>`
= Children in the Second Dimension =
The following code will produce a multidimensional breadcrumb trail with the children of a breadcrumb in it’s second dimension:
`<ul class="breadcrumbs">
	<?php if(function_exists('bcn_display_list_multidim_children'))
	{
		bcn_display_list_multidim_children();
	}?>
</ul>`
Save the file (upload if applicable). Now you should have a breadcrumb trail on your WordPress powered site. To customize the breadcrumb trail you may edit the default values for the options in the administrative interface. This is located in your administration panel under Settings > Breadcrumb NavXT.

Please visit [Breadcrumb NavXT's Documentation](http://mtekk.us/code/breadcrumb-navxt/breadcrumb-navxt-doc/ "Go to Breadcrumb NavXT's Documentation.") page for more information.

== Changelog ==
= 1.9.0 =
* New feature: Added new `bcn_display_list_multidim_children()` function which places the children of a breadcrumb into the second dimension
* New feature: Support for the Breadcrumb NavXT widget, requires Breadcrumb NavXT 5.3.0 or newer
* Bug fix: Fixed issue where the second dimension would not be populated for the current item if the current item was linked
* Bug fix: Fixed issue where an “Empty Category” message would appear in the second dimension for terms without children or siblings
= 1.8.1 =
* Behavior Change: Dropped support of version of Breadcrumb NavXT prior to 5.1.x
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.1.1
= 1.8.0 =
* Behavior Change: Refactored entire plugin
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.1.x
= 1.7.0 =
* Behavior Change: Dropped support of version of Breadcrumb NavXT prior to 5.0.x
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.0.x
= 1.6.0 =
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 4.2.x
= 1.5.0 =
* Initial Public Release

== Upgrade Notice ==
= 1.9.0 =
Added  new `bcn_display_list_multidim_children()` function, added support for the Breadcrumb NavXT Widget, and fixed some bugs.
= 1.8.0 =
Added support for Breadcrumb NavXT 5.1.x