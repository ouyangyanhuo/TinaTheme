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
            <h1><?php $this->title(); ?></h1>
            <p class="subtitle">这是一个 <span class="count">友情链接</span> 页面</p>
        </div>
    </header>

    <div class="container">
        <div id="post" class="article-post">
            <?php if ($this->options->fancybox): ?>
            <?php
                $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)\".*?title\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery"><img class="lazy" data-original="$1" alt="$2" title="$3"></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
                echo getContentTest($content);
            ?>
            <?php else: ?>
            <?php echo getContentTest($this->content); ?>
            <?php endif; ?>

            <h4>以下是友情链接</h4>
        </div>

        <div class="linkpage">
            <ul id="friendsList">
                <?php Links(); ?>
            </ul>
        </div>
    </div>

    <?php if ($this->options->TheComments): ?>
    <div class="container">
        <?php $this->need('comments.php'); ?>
    </div>
    <?php endif; ?>
</main>
<?php $this->need('footer.php'); ?>
