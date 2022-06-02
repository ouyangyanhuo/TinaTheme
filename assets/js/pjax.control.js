$(document).pjax(
  'a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"], a[href^="/"]',
  {
    container: '#pjax-load',
    fragment: '#pjax-load',
    timeout: 8000
  }
)
.on('pjax:send', function () {
  NProgress.start();

}).on('pjax:complete', function () {
  NProgress.done();
});