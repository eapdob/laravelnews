/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$('.custom-mobile-menu').on('click', function () {
    if (!$('.main-sidebar').hasClass('main-sidebar-open'))
        $('.main-sidebar').addClass('main-sidebar-open')
});

$('.sidebar-brand').on('click', function () {
    if ($('.main-sidebar').hasClass('main-sidebar-open'))
        $('.main-sidebar').removeClass('main-sidebar-open')
});
