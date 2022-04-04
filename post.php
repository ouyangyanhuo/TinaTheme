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
                                <?php if ($this->options->WordCount): ?>
                                <time> | 共 <?php echo word_count($this->cid); ?> 个字符</time>
                                <?php endif; ?>
                                </div>
                                <div class="tags">
                                    <?php $this->tags(', ', true, '<a>NoTag</a>'); ?>
                            </div>
                        </div>
                    </div>
                </header>
            </article>
            <div id="post" class="article-post">
            <?php if ($this->options->fancybox): ?>
            <?php
                $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)\".*?title\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="$2" title="$3"></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
                //内容截断
                $array=explode('<!--more-->', $content);
                $content=$array[0];
                echo getContentTest($content)
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