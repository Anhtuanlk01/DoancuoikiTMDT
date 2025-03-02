/**
 * Emoza Sidebar
 */

'use strict';

var emoza = emoza || {};
emoza.sidebar = {
  // To ensure better compatibility with plugins like WP Rocket that has
  // options to defer/lazy-load JS files, each JS script should have your own 
  // 'domReady' function. This way the script has no dependecies and can be loaded standalone.
  domReady: function domReady(fn) {
    if (typeof fn !== 'function') {
      return;
    }
    if (document.readyState === 'interactive' || document.readyState === 'complete') {
      return fn();
    }
    document.addEventListener('DOMContentLoaded', fn, false);
  },
  init: function init() {
    var ev = document.createEvent('HTMLEvents');
    ev.initEvent('sidebar-slide-close', true, false);
    window.addEventListener('sidebar-slide-open', function () {
      document.querySelector('body').classList.add('sidebar-slide-opened');
    });
    window.addEventListener('sidebar-slide-close', function () {
      document.querySelector('body').classList.remove('sidebar-slide-opened');
    });
    document.addEventListener('click', function (e) {
      var sidebar = document.querySelector('.sidebar-wrapper').parentElement;
      if (e.target.closest('.sidebar-wrapper') === null) {
        sidebar.classList.remove('show');
        window.dispatchEvent(ev);
      }
    });
  }
};
emoza.sidebar.domReady(function () {
  emoza.sidebar.init();
});