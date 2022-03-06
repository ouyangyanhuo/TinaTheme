<?php
/**
 * 移植自<a href="https://limxw.com/" target="_blank">WingLim</a>的<a href="https://github.com/WingLim/hugo-tania" target="_blank">hugo-tania</a>主题，在其基础上进行了深度修改的Smiletheme或许是你在Typecho上最好的选择
 * 
 * @package Smile Theme
 * @author Magneto
 * @version 1.2.5
 * @link https://www.symbk.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<main>
    <div class="container">
    <section class="my">
        <div class="content">
            <p>
            <?php if ($this->options->Notice): ?>
            <?php $this->options->Notice() ?>
            <?php else: ?>
            <?php $this->options->description() ?>
            <?php endif; ?>
            </p>
            <?php if ($this->options->Icons): ?>
            <div class="bio-social">
            <a href="<?php if ($this->options->icon_1_URL): ?><?php $this->options->icon_1_URL() ?><?php else: ?><?php $this->options->siteUrl(); ?><?php endif; ?>" target="_blank"><?php if ($this->options->icon_1): ?><?php $this->options->icon_1() ?><?php else: ?><?php endif; ?></a>
            <a href="<?php if ($this->options->icon_2_URL): ?><?php $this->options->icon_2_URL() ?><?php else: ?><?php $this->options->siteUrl(); ?><?php endif; ?>" target="_blank"><?php if ($this->options->icon_2): ?><?php $this->options->icon_2() ?><?php else: ?><?php endif; ?></a>
            <a href="<?php if ($this->options->icon_3_URL): ?><?php $this->options->icon_3_URL() ?><?php else: ?><?php $this->options->siteUrl(); ?><?php endif; ?>" target="_blank"><?php if ($this->options->icon_2): ?><?php $this->options->icon_3() ?><?php else: ?><?php endif; ?></a>
            </div>
            <?php endif; ?>
    </section>
    </div>
 <div class="container">
     <section>
         <h2>Latest Articles<?php if ($this->options->articles): ?><a class=section-button href="<?php $this->options->articles() ?>">View all</a><?php else: ?><?php endif; ?></h2>
         <div class="posts">
             <?php while($this->next()): ?>
             <div class="post">
                 <a href="<?php $this->permalink() ?>">
                     <div class="post-row">
                         <time><?php $this->date('M j'); ?></time>
                         <h3><?php $this->title() ?></h3>
                     </div>
                 </a>
             </div>
             <?php endwhile; ?>
         </div>
    </section>
    <?php if ($this->options->Projects): ?>
    <section>
        <h2>Projects</h2>
        <div class="projects">
            <?php if ($this->options->Project_1): ?>
            <div class="project">
                <div>
                    <?php if ($this->options->Project_1_URL): ?>
                    <a href="<?php $this->options->Project_1_URL() ?>" target="_blank" rel="noreferrer">
                    <?php else: ?>
                    <a href="#" target="_blank" rel="noreferrer">
                    <?php endif; ?>
                    <?php if ($this->options->Project_1_Icon): ?>
                        <div class="icon"><img src="<?php $this->options->Project_1_Icon() ?>" height="30px" width="30px"></div>
                    <?php else: ?>
                        <div class="icon"></div>
                    <?php endif; ?>
                    <?php if ($this->options->Project_1_Name): ?>
                        <h3><?php $this->options->Project_1_Name() ?></h3>
                    <?php else: ?>
                        <h3>Project</h3>
                    <?php endif; ?>
                    </a>
                    <?php if ($this->options->Project_1_Describe): ?>
                    <div class="description"><?php $this->options->Project_1_Describe() ?></div>
                    <?php else: ?>
                    <div class="description"></div>
                    <?php endif; ?>
                </div>
                <div class="flex">
                    <a href="<?php if ($this->options->Project_1_URL): ?><?php $this->options->Project_1_URL() ?><?php else: ?><?php endif; ?>" class="button" target="_blank" rel="noreferrer">Source</a>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->options->Project_2): ?>
            <div class="project">
                <div>
                    <?php if ($this->options->Project_2_URL): ?>
                    <a href="<?php $this->options->Project_2_URL() ?>" target="_blank" rel="noreferrer">
                    <?php else: ?>
                    <a href="#" target="_blank" rel="noreferrer">
                    <?php endif; ?>
                    <?php if ($this->options->Project_2_Icon): ?>
                        <div class="icon"><img src="<?php $this->options->Project_2_Icon() ?>" height="30px" width="30px"></div>
                    <?php else: ?>
                        <div class="icon"></div>
                    <?php endif; ?>
                    <?php if ($this->options->Project_2_Name): ?>
                        <h3><?php $this->options->Project_2_Name() ?></h3>
                    <?php else: ?>
                        <h3>Project</h3>
                    <?php endif; ?>
                    </a>
                    <?php if ($this->options->Project_2_Describe): ?>
                    <div class="description"><?php $this->options->Project_2_Describe() ?></div>
                    <?php else: ?>
                    <div class="description"></div>
                    <?php endif; ?>
                </div>
                <div class="flex">
                    <a href="<?php if ($this->options->Project_2_URL): ?><?php $this->options->Project_2_URL() ?><?php else: ?><?php endif; ?>" class="button" target="_blank" rel="noreferrer">Source</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
 </div>
</main>
<?php $this->need('footer.php'); ?>