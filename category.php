<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
    <header>
        <div class="container">
            <h1>分类</h1>
            <p class="subtitle">这是 <span class="count"><?php $this->archiveTitle(array('category' => _t('%s')), ''); ?></span> 分类下的所有文章。</p>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="posts">
                <?php while ($this->next()): ?>
                <div class="post">
                    <a href="<?php $this->permalink(); ?>">
                        <div class="post-row">
                            <time><?php $this->date('M j'); ?></time>
                            <h3><?php $this->title(); ?></h3>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="container">
            <nav class="flex suggested">
                <?php $this->pageLink('上一页', 'prev'); ?>
                <?php $this->pageLink('下一页', 'next'); ?>
            </nav>
        </div>
    </section>
</main>
<?php $this->need('footer.php'); ?>
