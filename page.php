<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
/*
 * @Author: Magneto github.com:ouyangyanhuo
 * @Date: 2023-06-08 10:43:31
 * @LastEditors: ouyangyanhuo ouyangyanhuo@vip.qq.com
 * @LastEditTime: 2023-09-16 10:26:31
 * @FilePath: \TinaTheme\page.php
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
                $replacement = '<a href="$1" data-fancybox="gallery" /><img class="lazy" data-original="$1" alt="$2" title="$3"></a>';
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
        <?php endif; ?>
    </div>
</main>
<?php $this->need('footer.php'); ?>