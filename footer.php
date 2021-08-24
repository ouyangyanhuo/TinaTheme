</body>
<footer class="footer flex">
    <section class="container">
        <nav class="footer-links">
            <p><center>Copyright © 2021 Magneto<br>Theme <a href="https://www.symbk.cn" target="">SmileTheme</a> By Magneto</center></p>
        </nav>
            <?php if ($this->options->FooterHTML): ?>
            <?php $this->options->FooterHTML() ?>
            <?php endif; ?>
    </section>
    <?php if ($this->options->The_Dark_Mode): ?>
    <script async="" src="<?php $this->options->themeUrl('/assets/features.js'); ?>" data-enable-footnotes="true"></script>
    <?php endif; ?>
</footer>
</html>
<?php /* 来自 MDr | HTML 压缩 */
if ($this->options->compressHtml) {
    $html_source = ob_get_contents();
    ob_clean();
    print compressHtml($html_source);
    ob_end_flush();
}
?>