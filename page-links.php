<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 友链
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
    <header>
        <div class="container">
            <h1>友链</h1>
            <p class="subtitle">这里是<span class="count">友情链接</span></p>
        </div>
    </header>
    <div class="container">
        <div class="article-post">
            <?php $this->content(); ?>
        </div>
    </div>
    <?php if ($this->options->TheComments): ?>
        <div class="container">
        <?php $this->need('comments.php'); ?>
        </div>
    <?php endif; ?>
</main>
<?php $this->need('footer.php'); ?>