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
                                <a>By <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></a> | 
                                <time><?php $this->date('M j, Y'); ?></time> |
                                <a><?php _e('Category: '); ?><?php $this->category(','); ?></a>
                                </div>
                                <div class="tags">
                                    <?php $this->tags(', ', true, '<a>NoTag</a>'); ?>
                            </div>
                        </div>
                    </div>
                </header>
            </article>
            <div class="article-post">
                <?php $this->content(); ?>
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
        <div class="container">
            <nav class="flex container suggested">
                    上一篇
                    <?php $this->thePrev('%s', '<a href="#">没有了</a>');?>
            
                    下一篇
                    <?php $this->theNext('%s', '<a href="#">没有了</a>');?>
            </nav>
        </div>
<?php $this->need('footer.php'); ?>