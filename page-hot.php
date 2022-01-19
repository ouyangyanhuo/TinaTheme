<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 热门文章
 *
 * @package custom
 * 
 * author:Magneto
 * time：2021-12-30
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
    <header>
        <div class="container">
            <h1>热门文章</h1>
            <p class="subtitle">这里是<span class="count">热门文章</span></p>
        </div>
    </header> 
    <div class="container">
     <section>
         <h2>Hot Articles</h2>
         <div class="posts">
             <?php $this->widget('Widget_Post_hot@hot', 'pageSize=10')->to($hot); ?>
             <?php while($this->next()): ?>
             <div class="post">
                 <a href="<?php $hot->permalink() ?>">
                     <div class="post-row">
                         <time><?php $hot->date('M j'); ?></time>
                         <h3><?php $hot->title(); ?></h3>
                     </div>
                 </a>
             </div>
             <?php endwhile; ?>
         </div>
     </section>
    </div>
</main>
<?php $this->need('footer.php'); ?>