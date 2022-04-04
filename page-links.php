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
            <h1><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
            ), ''); ?>
            </h1>
            <p class="subtitle">这是一个<span class="count">友链</span>页面</p>
        </div>
    </header>
    <div class="container">
        <div class="article-post">
            <?php if ($this->options->fancybox): ?>
            <?php
                $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)\".*?title\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="$2" title="$3"></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
                //内容截断
                $array=explode('<!--more-->', $content);
                $content=$array[0];
                echo getContentTest($this->content);
            ?>
            <?php else: ?>
            <?php echo getContentTest($this->content); ?>
            <?php endif; ?>
            <h4>以下是链接</h4>
            
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
        <?php else: ?>
        <div class="container">
            <div class="alert info">已关闭全局评论。</div>
        </div>
        <?php endif; ?>
</main>
<?php $this->need('footer.php'); ?>