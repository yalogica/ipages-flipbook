=== iPages Flipbook For WordPress ===
Contributors: Avirtum
Tags: flipbook from images, pdf viewer, book with markers, responsive design
Requires at least: 4.0
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.5.4

Create great interactive digital HTML5 flipbooks, the plugin provides an easy way for you to convert static PDF documents or image sets into the online magazine, interactive catalogs, media brochures or booklets in seconds.

== Description ==

iPages Flipbook is a lightweight and rich-feature plugin helps you create great interactive digital HTML5 flipbooks. With this plugin you are able to easily make media books for your site that empower publishers and bloggers to create more engaging content. It provides an easy way for you to convert static PDF documents and image sets into the online magazine, interactive catalogs, media brochures or booklets in seconds. The plugin can be deployed easily and runs on all modern browsers and mobile devices.

Using **[ipages id="123"]** shortcode, you can publish a flipbook on any Page or Post in your WordPress sites.

This is the **LITE version** of the official [iPages Flipbook For WordPress plugin](https://1.envato.market/5QrNo) which comes with support and doesn't have some limitations.

= Quick Video Demo =
https://youtu.be/SzHxbEr0Aq8

= The sample of how to create a flipbook from images =
https://youtu.be/uyehrTDdz14

= Features =
* **3 Render Book Modes** - two & one page flip, swipe
* **2 Data Sources** - images and PDF or you can mix them together
* **Markers** - add image or text to any page
* **Thumbnails** - the side panel with page miniatures
* **Portrait & Landscape** – unique look for different container sizes
* **Outline** - bookmarks and external links
* **Keyboard Navigation** - arrows can be used for the book navigation
* **Multilevel Zoom** - zoom books pages to make better look
* **Share** - share a link with friends
* **Fullscreen** - you can toggle from the normal state to fullscreen and back
* **PDF download** - download source PDF file
* **Powerful Interface** - over 100 options
* **AJAX saving** - save your config without page reloading
* **JSON config** - the config is served from the filesystem instead of the database for better performance
* **Code editors** - add extra css styles or js code with syntax highlighting
* **Customization** - create you own theme


The developer version is avalible [here](https://github.com/yalogica/ipages-flipbook).


== Installation ==
* From the WP admin panel, click "Plugins" -> "Add new"
* In the browser input box, type "iPages Flipbook"
* Select the "iPages Flipbook" plugin and click "Install"
* Activate the plugin

Alternatively, you can manually upload the plugin to your wp-content/plugins directory

== Screenshots ==
1. Manage Books
2. Book config
3. Book pages
4. Create page layers


== Frequently Asked Questions ==

= I'd like access to more features and support. How can I get them? =
You can get access to more features and support by visiting the CodeCanyon website and
[purchasing the plugin](https://1.envato.market/5QrNo).
Purchasing the plugin gets you access to the full version of the iPages Flipbook plugin and support.

= What do I do if I get "Failed to load PDF document" error?
Sometimes when you add a book on your site and use a PDF document as a source, you might face this issue that rather than loading the book it will give the error "Failed to load PDF document"
This error shows up when you are running a website under "HTTPS" (secured with SSL certificate) whereas your PDF document link is under "HTTP" (unsecured).
To solve this issue, go to your WordPress Dashboard > Settings > General. Here make sure you have "https" added to both "WordPress Address (URL)" and "Site Address (URL)". That’s it. Your book will load with no issues.

= What is the difference between LITE and PRO =
The lite version has only one limitation. You can create and use only one item. All other features are the same as PRO has.


== Changelog ==

= 1.5.4 =
* Fix: ajax request params

= 1.5.3 =
* Fix: rest api endpoints of third-party plugins stop working

= 1.5.2 =
* Fix: unauthorized access to view deactivated items

= 1.5.1 =
* Fix: empty list of items

= 1.5.0 =
* Fix: constant FILTER_SANITIZE_STRING is deprecated
* Fix: SQL injection vulnerability when sorting items in orderby parameter

= 1.4.8 =
* Fix: $wpdb->prepare calls

= 1.4.7 =
* Fix: prevent cross-site scripting (XSS) from shortcode
* Mod: polish the code

= 1.4.6 =
* New: HTML data for a layer

= 1.4.5 =
* Fix: touch click on a document annotation

= 1.4.4 =
* New: modal dialog with posts for a layer link

= 1.4.3 =
* New: Gutenberg block support
* Fix: prevent XSS attacks

= 1.4.2 =
* Fix: converting the url protocol from HTTP to HTTPS if needed
* New: search item box, trash support
* New: shortcode attribute 'slug'

= 1.4.1 =
* Fix: website under HTTPS (secured with SSL certificate), but config urls are under HTTP (unsecured)

= 1.4.0 =
* New: access to a page from the URL param 'page' or 'pagenum'
* New: shortcode attribute 'page'
* New: config parameter 'pageStartDelay'
* New: support Emoji

= 1.3.9 =
* Fix: open the new url for iOS & Android directly
* Fix: annotations layout from a PDF document

= 1.3.8 =
* Fix: the odd pages (the right pages) are shifted to the left

= 1.3.7 =
* New: create pages from the set of selected images
* New: shortcode attribute 'width', 'height'

= 1.3.6 =
* Fix: refresh page data after the fullscreen toggle event

= 1.3.5 =
* Fix: super admin can't see menu items
* New: DB field 'editor'

= 1.3.4 =
* New: item slug (URL valid name)
* New: options for preview & iframe embed page
* Mod: file system operations

= 1.3.3 =
* New: edit roles with access to the plugin
* Fix: loader is called only once on a page
* Mod: user can view & edit only their items

= 1.3.2 =
* Fix: FontAwesome i2svg breaks the admin frontend
* Fix: bookmarks from a pdf document

= 1.3.1 =
* Mod: items pagination view

= 1.3.0 =
* New: support bookmarks from a pdf document
* New: support hyperlinks from a pdf document
* Mod: outline & thumbnails ui elements

= 1.2.5 =
* New: support pdf documents in a brochure format
* New: fullscreen emulation for iOS
* New: config parameter - pageSizeAuto
* New: config parameter - pdfAutoLoad & pdfCoverImageUrl

= 1.2.4 =
* Fix: undefined variable timestamp

= 1.2.3 =
* Fix: the quality of the text after pdf zoom

= 1.2.2 =
* New: preview & iframe embed feature

= 1.2.1 =
* New: edit permissions for roles: administrator, editor, author, contributor
* Fix: manual container width & height parameters did not apply

= 1.2.0 =
* Mod: new interface
* New: any layer as a link

= 1.1.5 =
* Mod: added mouseDragNavigation & mousePageClickNavigation parameters
* Mod: updated the jQuery plugin

= 1.1.4 =
* Fix: the book stays small after fullscreen toggle
* Mod: page numbers format for the two page mode: 1/4 ; 2-3/4 ; 4/4
* Mod: public function - setBookEngine (change the book engine on the fly)
* Mod: unique book engine for portrait & landscape view
* Mod: updated the jQuery plugin

= 1.1.3 =
* Fix: keyboard navigation
* Mod: pinch zoom (2 fingers touch on the screen at the same time)
* Mod: keyboard zoom (plus and minus keys)
* Mod: zoom default after double click
* Mod: updated the jQuery plugin

= 1.1.2 =
* Fix: pdf rendering in IE11

= 1.1.1 =
* Fix: some CSS rules

= 1.1.0 =
* Fix: Responsive functionality
* Mod: added autoWidth, autoHeight, containerWidth & containerHeight parameters
* Mod: updated the jQuery plugin

= 1.0.2 =
* Fix: AutoFit functionality
* Mod: updated the jQuery plugin

= 1.0.1 =
* Fix: updated default parameters
* Mod: updated the jQuery plugin

= 1.0.0 =
* Initial release