<?php
/**
 * Articles
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<main>
    <header>
        <div class="container">
            <h1>Articles</h1>
            <p class="subtitle">All articles that I write.</p>
        </div>
    </header>
    <section>
        <div class="container">
            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
            <input id="search-query" type="text" id="s" name="s" class="text"  placeholder="Search for anything...">
            </form>
            <section id="articles-list">
            <?php
            $stat = Typecho_Widget::widget('Widget_Stat');
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
            $year = 0;
            $mon = 0;
            $i = 0;
            $j = 0;
            $output = '<section>';
            while ($archives->next()) {
                $year_tmp = date('Y', $archives->created);
                if ($year != $year_tmp) {
                    $year = $year_tmp;
                    $output .= '<h2>' . date('Y', $archives->created) . '</h2>';
                }
                if ($this->options->PjaxOption && $archives->hidden) {
                    $output .= '<div class="post"><a href="' . $archives->permalink . '"><div class="post-row"><time>' . date('M j', $archives->created) . '</time><h3>'. $archives->title . '</h3></div></a></div>';
                } else {
                    $output .= '<div class="post"><a href="' . $archives->permalink . '"><div class="post-row"><time>' . date('M j', $archives->created) . '</time><h3>'. $archives->title . '</h3></div></a></div>';
                }
            }
            $output .= '</section>';
            echo $output;
            ?>
        </div>
    </section>
</main>
<?php $this->need('footer.php'); ?>