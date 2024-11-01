=== Xtreme Dock Menu ===
Contributors: Flashtuning 
Tags: flash, swf, menu, dock, xml, photo, autoplay, horizontal, vertical, zoom, flashvars, tooltip, as3, scroll, scroller, free, plugin, images, post
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML Dock Menu application. No Flash Knowledge required to insert the Dock Menu SWF inside the HTML page(s) of your site.

== Description ==

XML Dock Image Menu / XML Dock Photo Menu & XML Dock AutoPlay Menu.

**Features**

* Fully customizable XML driven content
* Unlimited number of images / swf support
* Customizable width, height, position and item size
* Easy to use XML file for images / tooltips / titles / descriptions and links
* AutoPlay ( AutoScroll ) with global or individual timer for each image
* Individual items selection or mouse roll over scroll effect options for AutoScroll mode
* Time period adjustable from the XML file (in seconds)
* Both horizontal and vertical menu orientation support
* Dynamic image reflection with transparency, distance and direction settings
* Image ToolTips with automatic text wrapping, font embedding, background and border color / size support
* HTML / CSS driven ToolTips description text and ToolTips position, offest support
* Zoom amount and zoom speed setting on mouseover with zoom/position influence option on adjacent items 
* Define image borders size/color from within the XML configuration file
* Image tooltips, spacing, mouse roll over blur effect and click support 

== Installation ==

1. Download the plugin and upload it to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Download the [Free XtremeDockMenu](http://www.flashtuning.net/flash-samples/XtremeDockMenuFree.zip "Xtreme Dock Menu") and copy the content of the archive in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-dock-menu")
3. Insert the swf into post or page using this tag: `[xtreme-dock-menu]`. The default values for width and height are 580 200. If you want other values write the width and height attributes into the tag like so: `[xtreme-dock-menu width="yourvalue" height="yourvalue"]`
4. To configure the dock menu general parameters use the dock-settings.xml. For individual dock menu items use the dock-contents.xml file. (tooltips, image path, image link and more)
5. If you want to use multiple instances of Xtreme Dock Menu on different pages. Follow this steps:
   a. There are 2 xml files in **wp-content/flashtuning/xtreme-dock-menu** folder: **dock-settings.xml**, used for general settings, and **dock-contents.xml**, used for individual items.
   b. Modify the 2 xml files according to your needs and rename them (eg.: **dock-settings2.xml**, **dock-contents2.xml**)
   c. Open the **dock-settings2.xml**, search for this tag `< object param="contentXML"	value="dock-contents.xml" />` and change the attribute **value** to **dock-contents2.xml** .
   d. Copy the 2 modified xml files to **wp-content/flashtuning/xtreme-dock-menu** .
   e. Use the **xml** attribute `[xtreme-dock-menu xml="dock-settings2.xml"]` when you insert the dock menu on a page.
6. Optionally for custom pages use this php function: `xtremeDockMenuEcho(width,height,xmlFile)` (e.g: **xtremeDockMenuEcho(580,200,'dock-settings.xml')** )


= Remove the Flashtuning.net logo =

 If you don’t want to have the Flashtuning.net logo on the bottom left corner, you'll have to purchase the [commercial package](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-dock-menu-xml-as3.html "FT Xtreme Dock Menu"). You'll also have access to the fla file. After downloading the commercial archive, overwrite the swf file from the `/wp-content/flashtuning/xtreme-dock-menu` directory.

== Screenshots ==

1. Fully customizable XML driven content. No Flash Knowledge required to insert the Dock Menu SWF inside the HTML page(s) of your site.

