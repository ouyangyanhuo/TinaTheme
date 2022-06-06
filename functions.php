<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('INITIAL_VERSION_NUMBER', '1.0');
if (Helper::options()->GravatarUrl) define('__TYPECHO_GRAVATAR_PREFIX__', Helper::options()->GravatarUrl);
require_once __DIR__ . '/core/functions.php';

function themeConfig($form) {
    /* 外观 */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>基础外观</h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, '/usr/themes/SmileTheme/assets/favicon.ico', _t('Favicon 图标'), _t('在这里填入一个图片 URL 地址, 以添加一个 Favicon，留空则不单独设置 Favicon，主题默认 Favicon 地址为 /usr/themes/SmileTheme/assets/favicon.ico'));
	$form->addInput($favicon);
	
	$articles = new Typecho_Widget_Helper_Form_Element_Text('articles', NULL, '/index.php/articles.html', _t('Articles URL'), _t('首页全部文章按钮<a href="https://z3.ax1x.com/2021/08/15/fcasqf.png" target="_blank">[查看示例图片]</a>指向的链接，需要创建Articles的自定义页面，并在此填入自定义页面的URL才可正常使用，不填则不显示，<strong><font color="#525288">强烈推荐开启</font></strong>，因为首页不支持文章翻页，一次仅能浏览有限数量文章。'));
    $form->addInput($articles);
	
	$cursor = new Typecho_Widget_Helper_Form_Element_Radio(
        'cursor',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        0,
        _t('鼠标美化'),
        _t('开启后电脑端网页会对鼠标进行美化，默认关闭)')
    );
    $form->addInput($cursor);
    
    /* 网站功能 */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>网站功能</h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
	$compressHtml = new Typecho_Widget_Helper_Form_Element_Radio(
        'compressHtml',
        array(
            1 => _t('启用'),
            0 => _t('关闭')
        ),
        0,
        _t('HTML压缩'),
        _t('默认关闭，启用则会对HTML代码进行压缩，可能与部分插件存在兼容问题，请酌情选择开启或者关闭')
    );
    $form->addInput($compressHtml);
    
    $fancybox = new Typecho_Widget_Helper_Form_Element_Radio(
        'fancybox',
        array(
            1 => _t('启用'),
            0 => _t('关闭')
        ),
        1,
        _t('图片灯箱'),
        _t('默认开启，启用后可以优化图片浏览的体验')
    );
    $form->addInput($fancybox);
    
    $SEOOPEN = new Typecho_Widget_Helper_Form_Element_Radio(
        'SEOOPEN',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        1,
        _t('SEO系统'),
        _t('关闭后网站SEO将会关闭(本SEO系统，采用Typecho原生SEO，默认开启)<br><strong>网站关键词、网站描述均调用自系统，修改请前往路径“后台->基本设置->网站关键词 或 网站描述”</strong>')
    );
    $form->addInput($SEOOPEN);
    
    $WordCount = new Typecho_Widget_Helper_Form_Element_Radio(
        'WordCount',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        1,
        _t('字数统计'),
        _t('在网站的文章页面及自建页面中显示内容总字数')
    );
    $form->addInput($WordCount);
    
    $WebPjax = new Typecho_Widget_Helper_Form_Element_Radio(
        'WebPjax',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        1,
        _t('PJAX'),
        _t('全站PJAX无刷新加载，评论区暂不支持PJAX')
    );
    $form->addInput($WebPjax);

    /* Link */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>Link</h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $alink = new Typecho_Widget_Helper_Form_Element_Text('alink', NULL, NULL, _t('顶部按钮链接'), _t('在Articles按钮旁边出现的按钮的链接，可以用做友链等内容，不填则代表不启用，且下一项内容不会显示'));
    $form->addInput($alink);
    
    $alink_name = new Typecho_Widget_Helper_Form_Element_Text('alink_name', NULL, NULL, _t('顶部按钮名称'), _t('在Articles按钮旁边出现的按钮的文字，可以用做友链等内容，不填则代表不显示文字，若上一项已填，不建议不填文字。'));
    $form->addInput($alink_name);
    
    /* 评论 */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>评论 <small>Comments</small></h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $TheComments = new Typecho_Widget_Helper_Form_Element_Radio(
        'TheComments',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        1,
        _t('全局评论'),
        _t('关闭后全部文章不提供评论区。')
    );
    $form->addInput($TheComments);
    
    $TheVerification = new Typecho_Widget_Helper_Form_Element_Radio(
        'TheVerification',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        1,
        _t('评论验证'),
        _t('评论区的加减法验证系统，关闭后反垃圾评论效果降低。')
    );
    $form->addInput($TheVerification);
    
     /* Notice */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>网站公告 <small>Notice</small></h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $Notice = new Typecho_Widget_Helper_Form_Element_Textarea('Notice', NULL, NULL, _t('网站首页公告'), _t('支持HTML语法，但不建议使用HTML语法。不填则代表为默认内容。'));
    $form->addInput($Notice);
    
    /* Footer */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>页脚 <small>Notice</small></h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $FooterHTML = new Typecho_Widget_Helper_Form_Element_Textarea('FooterHTML', NULL, NULL, _t('自定义页脚内容'), _t('支持HTML语法。不填则代表为空。'));
    $form->addInput($FooterHTML);
    
    /* 深色模式 */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>深色模式 <small>Dark Mode</small></h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $The_Dark_Mode = new Typecho_Widget_Helper_Form_Element_Radio(
        'The_Dark_Mode',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        1,
        _t('深色模式'),
        _t('如果你不喜欢深色模式，或者认为深色模式有瑕疵你可以选择关闭深色模式的开关。<br>关闭此开关后，性能将会得到一定程度的提升。')
    );
    $form->addInput($The_Dark_Mode);
    
	/* 图标 */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>图标 <small>Icon</small></h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
    $Icons = new Typecho_Widget_Helper_Form_Element_Radio(
        'Icons',
        array(
            1 => _t('开启'),
            0 => _t('关闭')
        ),
        0,
        _t('首页图标'),
        _t('开启后可在首页公告下方见到图标，这些图标可以指向你的社交账号、Github等地址。<strong><font color="#ed5a65">注意:倘若关闭，则所有有关项目的内容将不会生效</font></strong>')
    );
    $form->addInput($Icons);
    
	$icon_1 = new Typecho_Widget_Helper_Form_Element_Textarea('icon_1', NULL, '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 24 24"><g id="surface3680"><path fill="currentcolor" d="M10.898438 2.101562c-4.597657.5-8.296876 4.199219-8.796876 8.699219-.5 4.699219 2.199219 8.898438 6.296876 10.5C8.699219 21.398438 9 21.199219 9 20.800781V19.199219S8.601562 19.300781 8.101562 19.300781c-1.402343.0-2-1.199219-2.101562-1.902343C5.898438 17 5.699219 16.699219 5.398438 16.398438 5.101562 16.300781 5 16.300781 5 16.199219 5 16 5.300781 16 5.398438 16 6 16 6.5 16.699219 6.699219 17c.5.800781000000001 1.101562 1 1.402343 1C8.5 18 8.800781 17.898438 9 17.800781 9.101562 17.101562 9.398438 16.398438 10 16c-2.300781-.5-4-1.800781-4-4 0-1.101562.5-2.199219 1.199219-3C7.101562 8.800781 7 8.300781 7 7.601562c0-.402343.0-1 .300781-1.601562.0.0 1.398438.0 2.800781 1.300781C10.601562 7.101562 11.300781 7 12 7s1.398438.101562 2 .300781C15.300781 6 16.800781 6 16.800781 6 17 6.601562 17 7.199219 17 7.601562 17 8.398438 16.898438 8.800781 16.800781 9 17.5 9.800781 18 10.800781 18 12c0 2.199219-1.699219 3.5-4 4 .601562.5 1 1.398438 1 2.300781v2.597657C15 21.199219 15.300781 21.5 15.699219 21.398438 19.398438 19.898438 22 16.300781 22 12.101562c0-6-5.101562-10.703124-11.101562-10zm0 0"></path></g></svg>', _t('<strong><font color="#ed5a65">第一个</font></strong>图标的SVG图形'), _t('在这里填入一个
图标的 SVG 图形，推荐大小25x25，不填则代表无图标。<strong><font color="#ed5a65">注意:倘若不填，则下项内容将不会生效</font></strong>'));
	$form->addInput($icon_1);
	$icon_1_URL = new Typecho_Widget_Helper_Form_Element_Text('icon_1_URL', NULL, NULL, _t('<strong><font color="#ed5a65">第一个</font></strong>图标指向的链接'), _t('在这里填入第一个图标指向的链接，不填则代表指向博客本身，填入空格则代表为空'));
	$form->addInput($icon_1_URL);
	
	$icon_2 = new Typecho_Widget_Helper_Form_Element_Textarea('icon_2', NULL, NULL, _t('<strong><font color="#ed5a65">第二个</font></strong>图标的SVG图形'), _t('在这里填入一个
图标的 SVG 图形，推荐大小25x25，不填则代表无图标。<strong><font color="#ed5a65">注意:倘若不填，则下项内容将不会生效</font></strong>'));
	$form->addInput($icon_2);
	$icon_2_URL = new Typecho_Widget_Helper_Form_Element_Text('icon_2_URL', NULL, NULL, _t('<strong><font color="#ed5a65">第二个</font></strong>图标指向的链接'), _t('在这里填入第一个图标指向的链接，不填则代表指向博客本身，填入空格则代表为空'));
	$form->addInput($icon_2_URL);
	
	$icon_3 = new Typecho_Widget_Helper_Form_Element_Textarea('icon_3', NULL, NULL, _t('<strong><font color="#ed5a65">第三个</font></strong>图标的SVG图形'), _t('在这里填入一个
图标的 SVG 图形，推荐大小25x25，不填则代表无图标。<strong><font color="#ed5a65">注意:倘若不填，则下项内容将不会生效</font></strong>'));
	$form->addInput($icon_3);
	$icon_3_URL = new Typecho_Widget_Helper_Form_Element_Text('icon_3_URL', NULL, NULL, _t('<strong><font color="#ed5a65">第三个</font></strong>图标指向的链接'), _t('在这里填入第一个图标指向的链接，不填则代表指向博客本身，填入空格则代表为空'));
	$form->addInput($icon_3_URL);
	
	/* 项目推荐 */
    $TheNotice = new Typecho_Widget_Helper_Form_Element_Text('TheNotice', NULL, NULL, _t('<h2>项目推荐 <small>Projects</small></h2>'));
    $TheNotice->input->setAttribute('style', 'display:none');
    $form->addInput($TheNotice);
    
	$Projects = new Typecho_Widget_Helper_Form_Element_Radio(
        'Projects',
        array(
            true => _t('开启'),
            false => _t('关闭')
        ),
        false,
        _t('项目推荐'),
        _t('开启后可在首页见到项目推荐，<strong><font color="#ed5a65">注意:倘若关闭，则所有有关项目的内容将不会生效</font></strong>')
    );
    $form->addInput($Projects);
	
	$Project_1 = new Typecho_Widget_Helper_Form_Element_Radio(
        'Project_1',
        array(
            true => _t('开启'),
            false => _t('关闭')
        ),
        true,
        _t('第一个项目'),
        _t('开启后可在首页见到第一个项目推荐，若想要显示，请首先开启项目推荐')
    );
    $form->addInput($Project_1);
	$Project_1_Name = new Typecho_Widget_Helper_Form_Element_Text('Project_1_Name', NULL, 'SmileTheme', _t('<strong><font color="#ed5a65">第一个</font></strong>项目的名称'), _t(''));
	$form->addInput($Project_1_Name);
	$Project_1_URL = new Typecho_Widget_Helper_Form_Element_Text('Project_1_URL', NULL, 'https://www.github.com/ouyangyanhuo/SmileTheme', _t('<strong><font color="#ed5a65">第一个</font></strong>项目的链接'), _t('这里写第一个项目的链接地址，不填则代表留空'));
	$form->addInput($Project_1_URL);
	$Project_1_Describe = new Typecho_Widget_Helper_Form_Element_Textarea('Project_1_Describe', NULL, 'A theme for Typecho', _t('<strong><font color="#ed5a65">第一个</font></strong>项目的描述'), _t('这里写第一个项目的描述内容，不推荐超过50字，不填则代表留空'));
	$form->addInput($Project_1_Describe);
	$Project_1_Icon = new Typecho_Widget_Helper_Form_Element_Text('Project_1_Icon', NULL, '/usr/themes/SmileTheme/assets/favicon.ico', _t('<strong><font color="#ed5a65">第一个</font></strong>项目的图标'), _t('这里填入第一个项目的图标的链接，由于未知原因，暂不支持Emoji、Windows表情，若有需要请修改本地代码'));
	$form->addInput($Project_1_Icon);
	
	$Project_2 = new Typecho_Widget_Helper_Form_Element_Radio(
        'Project_2',
        array(
            true => _t('开启'),
            false => _t('关闭')
        ),
        false,
        _t('第二个项目'),
        _t('开启后可在首页见到第二个项目推荐，若想要显示，请首先开启项目推荐')
    );
    $form->addInput($Project_2);
	$Project_2_Name = new Typecho_Widget_Helper_Form_Element_Text('Project_2_Name', NULL, NULL, _t('<strong><font color="#ed5a65">第二个</font></strong>项目的名称'), _t(''));
	$form->addInput($Project_2_Name);
	$Project_2_URL = new Typecho_Widget_Helper_Form_Element_Text('Project_2_URL', NULL, NULL, _t('<strong><font color="#ed5a65">第二个</font></strong>项目的链接'), _t('这里写第一个项目的链接地址，不填则代表留空'));
	$form->addInput($Project_2_URL);
	$Project_2_Describe = new Typecho_Widget_Helper_Form_Element_Textarea('Project_2_Describe', NULL, NULL, _t('<strong><font color="#ed5a65">第二个</font></strong>项目的描述'), _t('这里写第二个项目的描述内容，不推荐超过50字，不填则代表留空'));
	$form->addInput($Project_2_Describe);
	$Project_2_Icon = new Typecho_Widget_Helper_Form_Element_Text('Project_2_Icon', NULL, NULL, _t('<strong><font color="#ed5a65">第二个</font></strong>项目的图标'), _t('这里填入第二个项目的图标的链接，由于未知原因，暂不支持Emoji、Windows表情，若有需要请修改本地代码'));
	$form->addInput($Project_2_Icon);
	
}