=== Plugin Name ===
Contributors: meigwil
Donate link: http://meigiwlym.com
Tags: bootstrap
Requires at least: 2.8.x
Tested up to: 3.8
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple widgets with Bootstrap width classes. 

== Description ==

Add Bootstrap columns to your widget areas. This widget gives a Title, an optional Icon and a Textarea along with column widths at the four Bootstrap break points. 

Any developer familiar with Bootstrap v3 will find this easy to use. If you have no previous experience with Bootstrap v3, please consult the documentation http://getbootstrap.com/css/#grid

Icons are from the Font Awesome set. Choose an icon from the set http://fontawesome.io/3.2.1/icons/

Just input the icon value withour `icon-`. For example, for the tick (icon-check), input `check`. 

== Requirements ==

* Bootstrap version 3.x
* A class of `row` added to the widget area wrapper element 

For example, if you have registered the `sidebar-triptych`:

    `<?php if ( is_active_sidebar( 'sidebar-triptych' ) ) : ?>`
        `<div class="row">`
            `<?php dynamic_sidebar( 'sidebar-triptych' ); ?>`
        `</div>`
    `<?php endif; ?>`

== Changelog == 

= 1.0 =
* Initial release. Can add content and set widths at the breakpoints
