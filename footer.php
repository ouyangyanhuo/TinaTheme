<footer class="footer flex">
    <section class="container">
        <nav class="footer-links">
            <p><center>Copyright © 2021 Magneto<br>Theme <a href="https://www.symbk.cn" target="">SmileTheme</a> By Magneto</center></p>
        </nav>
            <?php if ($this->options->FooterHTML): ?>
            <?php $this->options->FooterHTML() ?>
            <?php endif; ?>
    </section>
    <script async="" src="<?php $this->options->themeUrl('/main/features.js'); ?>" data-enable-footnotes="true"></script>
</footer>