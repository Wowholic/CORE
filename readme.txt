=== Wowholic CORE ===
Contributors: wowholic
Donate link: https://wowholic.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Tags: utility, productivity, efficiency, custom themes, development
Requires at least: 5.6
Tested up to: 6.8.1
Stable tag: 1.1.1
Requires PHP: 7.0

CORE makes you faster and more efficient when developing custom WordPress sites.

== Description ==

### CORE: WordPress utilities

CORE is a utility-based, unintrusive WordPress plugin. It offers a simple UI to tweak many sensible default settings to quickstart your new fresh WordPress project. It's recommended for developers building custom themes with ACF.

CORE builds on top of Wowholic’s +5 years of experience developing fully custom WordPress sites, for all sorts of customers and industries. We made this plugin to be more efficient and productive in our own work, and we hope it helps you too!

#### Features

* Clean up unnecessary WordPress' defaults:
	* Remove comments widget styles
	* Remove WP version from RSS feed
	* Remove Gutenberg block library CSS (only if Classic Editor plugin is active)
	* Remove RSD link
	* Remove post, category and comment feed links
	* Remove Windows Live Writer link
	* Remove canonical link
	* Remove shortlink
	* Remove relational adjacent links
	* Remove emoji detection script and styles
* Disable Theme & Plugin Editors, Widgets Admin Page, Default Post Type and Comments
* Set up some default redirections (archives, attachment pages...)
* Set up a visual grid on different breakpoints for debugging layout styles
* Enable layout spacing utility for debugging distances between elements (using [spacingjs](https://github.com/stevenlei/spacingjs))
* Add custom format options to TinyMCE *(only if Classic Editor is active)*
* Allow removing unnecessary buttons from TinyMCE *(only if Classic Editor is active)*
* Enable Theme Options *(only if ACF is active)*
* Add label next to Flexible Content Layout name *(only if ACF is active)*
* Allow shortcodes in excerpts, textareas and text fields *(only if ACF is active)*
* Enable pretty Search URL
* Enable `[email]` shortcode for antispam
* Change WordPress' upload size limit

Some of these features are contextual, which means that they won't show or work unless some condition is met (usually, if a given plugin is active or not).

### Community Feedback

Although already providing many features, this plugin is still in its early stages of development. Please reach out to us for any constructive feedback you might have!

### Contribute

If you want to read contributing guidelines, you can find them at the [GitHub repository](https://github.com/Wowholic/CORE)

== Frequently Asked Questions ==

= I changed the upload size limit, but nothing happened =

You might have noticed that below the upload size limit option, there is the "Hosting provider size limit" label. This indicates the size limit set by your hosting provider. No plugin can modify that value, only you can do it (if given enough permissions). Otherwise, contact your hosting support for help.

= How do I use the email shortcode? =

You can use the email shortcode in any content field that accepts shortcodes. Here's an example: `[email]example@gmail.com[/email]`

== Screenshots ==

1. General Tab
2. Redirects Tab
3. Grid Tab
4. Layout Tab
5. ACF Tab
6. TinyMCE Tab
7. Grid feature & spacingjs working in the frontend

== Changelog ==

= 1.1.0 =
Release Date: May 9th, 2025

* Update spacing.js
* Update description

= 1.1.0 =
Release Date: January 29th, 2025

* Remove Install recommended plugins
* ACF add label next to Flexible Content Layout name
* Pretty search url
* Add option to redirect search results page
* Add option to remove TinyMCE headlines
* Force TinyMCE second row to show if "Second row toggle" is unchecked

= 1.0.9 =
Release Date: January 28th, 2025

= 1.0.8 =
Release Date: August 3rd, 2023

= 1.0.7 =
Release Date: August 3rd, 2023

= 1.0.6 =
Release Date: February 16th, 2023

= 1.0.5 =
Release Date: November 3rd, 2022

= 1.0.4 =
Release Date: December 15th, 2021

First public release! 🥳
