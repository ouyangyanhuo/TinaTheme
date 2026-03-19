<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
    <div class="container">
        <article>
            <header class="article-header">
                <div class="thumb">
                    <div>
                        <h1><?php $this->title(); ?></h1>
                        <div class="post-meta">
                            <div>
                                By <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> |
                                <time><?php $this->date('M j, Y'); ?></time> |
                                <?php _e('Category: '); ?><?php $this->category(','); ?>
                                <?php if ($this->options->WordCount): ?>
                                <span> | 共 <?php echo word_count($this->cid); ?> 个字符</span>
                                <?php endif; ?>
                            </div>
                            <div class="tags">
                                <?php $this->tags(', ', true); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </article>

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
        </div>
    </div>

    <?php if ($this->options->TheComments): ?>
    <div class="container">
        <?php $this->need('comments.php'); ?>
    </div>
    <?php endif; ?>

    <div class="container">
        <nav class="flex suggested">
            <?php prev_post($this); ?>
            <?php next_post($this); ?>
        </nav>
    </div>
</main>
<?php $this->need('footer.php'); ?>
