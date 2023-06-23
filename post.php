<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
/*
 * @Author: Magneto github.com:ouyangyanhuo
 * @Date: 2023-06-08 10:43:31
 * @LastEditors: ouyangyanhuo ouyangyanhuo@vip.qq.com
 * @LastEditTime: 2023-06-23 18:11:52
 * @FilePath: \AdminMDf:\Github Projects\TinaTheme\post.php
 * @Description: 
 * EMail:magneto@88.com
 * Copyright (c) 2023 by Magneto, All Rights Reserved. 
 */
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
                                By <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                            </a> |
                            <a>
                                <time><?php $this->date('M j, Y'); ?></time> |
                            </a>
                            <a>
                                <?php _e('Category: '); ?><?php $this->category(','); ?>
                            </a>
                            <?php if ($this->options->WordCount): ?>
                            <time> | 共 <?php echo word_count($this->cid); ?> 个字符</time>
                            <?php endif; ?>
                            </div>
                            <div class="tags">
                                <?php $this->tags(', ', true); ?>
                        </div>
                    </div>
                </div>
            </header>
        </article>
        <div id="post" class="article-post">
            <?php if ($this->options->fancybox): ?>
            <?php
                $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)\".*?title\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery" /><img class="lazy" data-original="$1" alt="$2" title="$3"></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
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
    <br><br>
    <div class="container">
        <nav class="flex container suggested">
            <?php prev_post($this);?>
            <?php next_post($this);?>
        </nav>
    </div>
<?php $this->need('footer.php'); ?>