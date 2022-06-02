$(document).pjax(
  'a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"], a[href^="/"]',
  {
    container: '#pjax-load',
    fragment: '#pjax-load',
    timeout: 8000
  }
)
.on('pjax:send', function () {
  NProgress.start();//加载动画效果开始

}).on('pjax:complete', function () {
  NProgress.done();//加载动画效果结束
});