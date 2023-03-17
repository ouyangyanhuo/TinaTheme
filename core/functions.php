<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    /**
     * TinaTheme - FindContents
     * 函数定义
     */
function FindContents($val = NULL, $order = 'order', $sort = 'a', $publish = NULL)
{
    $db = Typecho_Db::get();
    $sort = ($sort == 'a') ? Typecho_Db::SORT_ASC : Typecho_Db::SORT_DESC;
    $select = $db->select()->from('table.contents')
        ->where('created < ?', Helper::options()->time)
        ->order($order, $sort);
    if ($val) {
        $select->where('template = ?', $val);
    }
    if ($publish) {
        $select->where('status = ?', 'publish');
    }
    return $db->fetchAll($select, array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
}
    /**
     * TinaTheme - compressHtml
     * 代码压缩
     */
function compressHtml($html_source)
{
    $chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $compress = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
            $c = substr($c, 19, strlen($c) - 19 - 20);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
            $c = substr($c, 12, strlen($c) - 12 - 13);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
            $tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
            $c = '';
            foreach ($tmps as $tmp) {
                if (strpos($tmp, '//') !== false) {
                    if (substr(trim($tmp), 0, 2) == '//') {
                        continue;
                    }
                    $chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
                    $is_quot = $is_apos = false;
                    foreach ($chars as $key => $char) {
                        if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
                            $is_quot = !$is_quot;
                        } else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
                            $is_apos = !$is_apos;
                        } else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
                            $tmp = substr($tmp, 0, $key);
                            break;
                        }
                    }
                }
                $c .= $tmp;
            }
        }
        $c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
        $c = preg_replace('/\\s{2,}/', ' ', $c);
        $c = preg_replace('/>\\s</', '> <', $c);
        $c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
        $c = preg_replace('/<!--[^!]*-->/', '', $c);
        $compress .= $c;
    }
    return $compress;
}
    /**
     * TinaTheme - Links
     * 友情链接
     */
function Links_list()
{
    $db = Typecho_Db::get();
    $list = Helper::options()->Links ? Helper::options()->Links : '';
    $page_links = FindContents('page-links.php', 'order', 'a');
    if (isset($page_links[0])) {
        $exist = $db->fetchRow($db->select()->from('table.fields')
            ->where('cid = ? AND name = ?', $page_links[0]['cid'], 'links'));
        if (empty($exist)) {
            $db->query($db->insert('table.fields')
                ->rows(array(
                    'cid'           =>  $page_links[0]['cid'],
                    'name'          =>  'links',
                    'type'          =>  'str',
                    'str_value'     =>  $list,
                    'int_value'     =>  0,
                    'float_value'   =>  0
                )));
            return $list;
        }
        if (empty($exist['str_value'])) {
            $db->query($db->update('table.fields')
                ->rows(array('str_value' => $list))
                ->where('cid = ? AND name = ?', $page_links[0]['cid'], 'links'));
            return $list;
        }
        $list = $exist['str_value'];
    }
    return $list;
}
function Links($short = false)
{
    $link = NULL;
    $list = Links_list();
    if ($list) {
        $list = explode("\r\n", $list);
        foreach ($list as $val) {
            list($name, $url, $description, $logo) = explode(',', $val);
            if ($short) {
                $link .= '<li><a target="_blank" rel="nofollow" href="' . $url . '"><img src="' . $logo . '"><div class="linkpage_links">@' . $name . '</div><p>' . $description . '</p></a></li>' . "\n";
            } else {
                $link .= '<li><a target="_blank" rel="nofollow" href="' . $url . '"><img src="' . $logo . '"><div class="linkpage_links">@' . $name . '</div><p>' . $description . '</p></a></li>' . "\n";
            }
        }
    }
    echo $link ? $link : '暂无链接' . "\n";
}
    /**
     * TinaTheme - Verification
     * 验证系统
     */
function themeInit($comment){
$comment = spam_protection_pre($comment, $post, $result);
}
function spam_protection_math(){
    $num1=rand(1,25);
    $num2=rand(1,25);
    echo "<code>$num1</code> + <code>$num2</code> = <input type=\"text\" name=\"sum\" class=\"text\" value=\"\" maxlength=\"2\">\n";
    echo "<input type=\"hidden\" name=\"num1\" value=\"$num1\">\n";
    echo "<input type=\"hidden\" name=\"num2\" value=\"$num2\">";
}
function spam_protection_pre($comment, $post, $result){
    $sum=$_POST['sum'];
    switch($sum){
        case $_POST['num1']+$_POST['num2']:
        break;
        case null:
        throw new Typecho_Widget_Exception(_t('对不起: 请输入验证码。<a href="javascript:history.back(-1)">返回上一页</a>','评论失败'));
        break;
        default:
        throw new Typecho_Widget_Exception(_t('对不起: 验证码错误，请<a href="javascript:history.back(-1)">返回</a>重试。','评论失败'));
    }
    return $comment;
}
    /**
     * TinaTheme - ShortCode
     * 短代码
     */
function getContentTest($content) {
    /* MARK功能 */
    $pattern = '/\[(mark)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<mark>$2</mark>';
    $content = preg_replace($pattern, $replacement, $content);
    /* 提示功能 */
    $pattern = '/\[(info)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<div class="alert info">$2</div>';
    $content = preg_replace($pattern, $replacement, $content);
    /* Keybord */
    $pattern = '/\[(kbd)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<kbd>$2</kbd>';
    $content = preg_replace($pattern, $replacement, $content);
    /* 上标 */
    $pattern = '/\[(sup)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<sup>$2</sup>';
    $content = preg_replace($pattern, $replacement, $content);
    /* 下标 */
    $pattern = '/\[(sub)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<sub>$2</sub>';
    $content = preg_replace($pattern, $replacement, $content);
    /* 返回值 */
    return $content;
}
    /**
     * TinaTheme - Words Count
     * 字数统计
     */
function word_count($cid){
	$db = Typecho_Db::get ();
	$rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	return mb_strlen($rs['text'], 'UTF-8');
}
    /**
     * TinaTheme - Next or Previous Post
     * 上一篇文章、下一篇文章输出修订
     * 为了在 a 标签的内容中同时兼容文章标题和其它内容所写
     */
function prev_post($archive) {
    $db = Typecho_Db::get();
    $content = $db->fetchRow($db->select()
            ->from('table.contents')
            ->where('table.contents.created < ?', $archive->created)
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.type = ?', $archive->type)
            ->where('table.contents.password IS NULL')
            ->order('table.contents.created', Typecho_Db::SORT_DESC)
            ->limit(1));
    if ($content) {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        echo '<a rel="next" href="' . $content['permalink'] . '" title="' . $content['title'] . '"><span>Previous</span>' . $content['title'] . '</a>';
    }
    else {
        echo '';
    }
}
    
function next_post($archive) {
    $db = Typecho_Db::get();
    $content = $db->fetchRow($db->select()
            ->from('table.contents')
            ->where('table.contents.created > ? AND table.contents.created < ?', $archive->created, Helper::options()->gmtTime)
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.type = ?', $archive->type)
            ->where('table.contents.password IS NULL')
            ->order('table.contents.created', Typecho_Db::SORT_ASC)
            ->limit(1));
    if ($content) {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        echo '<a rel="next" href="' . $content['permalink'] . '" title="' . $content['title'] . '"><span>Next</span>' . $content['title'] . '</a>';
    }
    else {
        echo '';
    }
}
    /**
     * TinaTheme - CDN Supports
     * 换静态资源库
     */
function staticUrl($file = ''){
    $lists = explode("\r\n", Helper::options()->cjCDNlink);
    $cjCDNlinks = [
        'jquery.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js',
            'custom' => isset($lists[0]) ? $lists[0] : ''
        ],
        'jquery.fancybox.min.css' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css',
            'jd' => 'cdn.jsdelivr.net/npm/fancybox@3.0.1/dist/css/jquery.fancybox.css',
            'custom' => isset($lists[1]) ? $lists[1] : ''
        ],
        'jquery.fancybox.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/fancybox@3.0.1/dist/js/jquery.fancybox.min.js',
            'custom' => isset($lists[2]) ? $lists[2] : ''
        ],
        'androidstudio.min.css' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/highlight.js/11.6.0/styles/androidstudio.min.css',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/androidstudio.min.css',
            'jd' => 'cdn.jsdelivr.net/npm/highlight.js@11.6.0/styles/androidstudio.css',
            'custom' => isset($lists[3]) ? $lists[3] : ''
        ],
        'highlight.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/highlight.js/11.6.0/highlight.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js',
            'jd' => 'cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.6.0/build/highlight.min.js',
            'custom' => isset($lists[4]) ? $lists[4] : ''
        ],
        'katex.min.css' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/KaTeX/0.16.0/katex.min.css',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.0/katex.min.css',
            'jd' => 'cdn.jsdelivr.net/npm/katex@0.16.0/dist/katex.min.css',
            'custom' => isset($lists[5]) ? $lists[5] : ''
        ],
        'katex.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/KaTeX/0.16.0/katex.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.0/katex.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/katex@0.16.0/dist/katex.min.js',
            'custom' => isset($lists[6]) ? $lists[6] : ''
        ],
        'auto-render.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/KaTeX/0.16.0/contrib/auto-render.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.0/contrib/auto-render.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/katex@0.16.0/dist/contrib/auto-render.min.js',
            'custom' => isset($lists[7]) ? $lists[7] : ''
        ],
        'tex-mml-chtml.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/mathjax/3.2.2/es5/tex-mml-chtml.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/mathjax/3.2.2/es5/tex-mml-chtml.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/mathjax@3.2.2/es5/tex-mml-chtml.js',
            'custom' => isset($lists[8]) ? $lists[8] : ''
        ],
        'nprogress.min.css' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.css',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css',
            'jd' => 'cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.css',
            'custom' => isset($lists[9]) ? $lists[9] : ''
        ],
        'nprogress.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.js',
            'custom' => isset($lists[10]) ? $lists[10] : ''
        ],
        'jquery.pjax.min.js' => [
            'bc' => 'cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js',
            'cf' => 'cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js',
            'jd' => 'cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js',
            'custom' => isset($lists[11]) ? $lists[11] : ''
        ]
    ];
    if (isset($cjCDNlinks[$file])) {
        $links = $cjCDNlinks[$file];
        $which = Helper::options()->cjCDN;
    } else return '';
    return isset($links[$which]) ? '//' . $links[$which] : '';
}