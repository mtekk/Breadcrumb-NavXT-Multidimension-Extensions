=== Breadcrumb NavXT Multidimension Extensions===
Contributors: mtekk
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=FD5XEU783BR8U&lc=US&item_name=Breadcrumb%20NavXT%20Donation&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: breadcrumb navxt, breadcrumb, breadcrumbs, trail, navigation, menu
Requires at least: 4.8
Tested up to: 5.4
Stable tag: 2.6.0
License: GPLv2 or later
Automates the generation of multidimensional list breadcrumb trails with Breadcrumb NavXT.

== Description ==

In the [Vista-Like Breadcrumbs for WordPress](http://mtekk.us/archives/guides/vista-like-breadcrumbs-for-wordpress/) guide, code was presented for recreating the breadcrumb style featured in Windows Vista and Windows 7. That code eventually was updated and placed into a plugin to ease implementation. This is that plugin.

= Breadcrumb NavXT Versions Supported =

This plugin supports Breadcrumb NavXT 5.1+, and Breadcrumb NavXT 6.0+. Note that not all features are available on older Breadcrumb NavXT versions.

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
= 2.6.0 =
Release date: December 30th, 2019

* New feature: Added support for Breadcrumb NavXT 6.4.0.

= 2.5.3 =
Release date: March 30th, 2019

* Bug fix: Fixed compatibility issues with Breadcrumb NavXT 6.3.x

= 2.5.2 =
Release date: August 11th, 2018

* Bug fix: Fixed compatibility issues with Breadcrumb NavXT 6.1.x

= 2.5.1 =
Release date: March 13th, 2018

* Bug fix: Fixed issue where when using Breadcrumb NavXT 6.0.x under some circumstances caused an erroneous root page to be included for the page post type when using `bcn_display_multidim_children()`.
* Bug fix: Fixed issue where the `$force` parameter did not work and threw PHP errors for the `bcn_display_list_multidim_*()` functions.

= 2.5.0 =
Release date: November 8th, 2017

* New feature: Added support for Breadcrumb NavXT 6.0.0.
* Bug fix: Moved localization textdomain to be compatible with the .org GlotPress install

= 2.1.0 =
Release date: December 27th, 2015

* New feature: Added support for Breadcrumb NavXT 5.6.0's force parameter in the display functions.

= 2.0.0 =
Release date: December 3rd, 2015

* New feature: Added setting for controlling the display of children of the home page while on the homepage.
* New feature: Added bcn_multidim_term_children filter.
* New feature: Added bcn_multidim_post_children filter. 

= 1.9.0 =
Release date: Release date: August 21st, 2015

* New feature: Added new `bcn_display_list_multidim_children()` function which places the children of a breadcrumb into the second dimension
* New feature: Support for the Breadcrumb NavXT widget, requires Breadcrumb NavXT 5.3.0 or newer
* Bug fix: Fixed issue where the second dimension would not be populated for the current item if the current item was linked
* Bug fix: Fixed issue where an “Empty Category” message would appear in the second dimension for terms without children or siblings

= 1.8.1 =
Release date: July 30th, 2014

* Behavior Change: Dropped support of version of Breadcrumb NavXT prior to 5.1.x
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.1.1

= 1.8.0 =
Release date: June 6th, 2014

* Behavior Change: Refactored entire plugin
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.1.x

= 1.7.0 =
Release date: April 5th, 2014

* Behavior Change: Dropped support of version of Breadcrumb NavXT prior to 5.0.x
* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 5.0.x

= 1.6.0 =
Release date: January 12th, 2013 

* Bug fix: Fixed issues relating to support for Breadcrumb NavXT 4.2.x

= 1.5.0 =
* Initial Public Release

== Upgrade Notice ==
= 2.1.0 =
Added support for Breadcrumb NavXT 5.6.0's force parameter in the display functions.

= 2.0.0 =
Added two new filters and a setting to control the display the home breadcrumb's children when on the home page.