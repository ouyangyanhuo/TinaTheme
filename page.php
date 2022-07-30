<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
    <div class="container">
        <article>
            <header class="article-header">
                <div class="thumb">
                    <div>
                        <h1><?php $this->title() ?></h1>
                        <div class="post-meta">
                            <div>
                            <a>
                                By <?php $this->author(); ?>
                            </a> | 
                            <a>
                                <time><?php $this->date('M j, Y'); ?></time>
                            </a> |
                            <?php if ($this->options->WordCount): ?>
                            <a>
                                共 <?php echo word_count($this->cid); ?> 个字符
                            </a>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </article>
        <div class="article-post">
            <?php if ($this->options->fancybox): ?>
            <?php
                $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)\".*?title\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="$2" title="$3"></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
                echo getContentTest($this->content);
            ?>
            <?php else: ?>
            <?php echo getContentTest($this->content); ?>
            <?php endif; ?>
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
    </div>
</main>
<?php $this->need('footer.php'); ?>