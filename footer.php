<?php if ($this->options->WebPjax): ?>
  <script src="<?php $this->options->themeUrl('/assets/js/pjax.min.js'); ?>"></script>
  <link href="https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
  <script src="https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
  </div>
  <script>$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"], a[href^="/"]',{container:'#pjax-load',fragment:'#pjax-load',timeout:8000}).on('pjax:send',function(){NProgress.start()}).on('pjax:complete',function(){NProgress.done()});</script>
<?php endif; ?>
</body>
<footer class="footer flex">
    <section class="container">
        <nav class="footer-links">
            <p><center>Copyright © 2021-2022 Magneto<br>Theme <a href="https://fmcf.cc" target="_blank">SmileTheme</a> By Magneto</center></p>
        </nav>
            <?php if ($this->options->FooterHTML): ?>
            <?php $this->options->FooterHTML() ?>
            <?php endif; ?>
    </section>
    <?php if ($this->options->The_Dark_Mode): ?>
    <script async="" src="<?php $this->options->themeUrl('/assets/js/features.js'); ?>" data-enable-footnotes="true"></script>
    <?php endif; ?>
</footer>
<?php if ($this->options->cursor): ?>
  <script async="" src="<?php $this->options->themeUrl('/assets/js/cursor.js'); ?>" data-enable-footnotes="true"></script>
<?php endif; ?>
</html>
<?php /* 来自 MDr | HTML 压缩 */
if ($this->options->compressHtml) {
    $html_source = ob_get_contents();
    ob_clean();
    print compressHtml($html_source);
    ob_end_flush();
}
?>