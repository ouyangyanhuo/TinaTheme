<p align="center">
    <img src="/assets/favicon.ico" width="200" height="200" alt="Haku">
</p>

<div align="center">

# Tina

_Haku，是 Tina 小姐最爱的喵喵，它在这里守卫着 Tina 小姐_

</div>

## TinaTheme

一个为typecho移植的主题，源自于[hugo-tania](https://github.com/WingLim/hugo-tania)主题，原本是Hugo的主题，被移植到Typecho上在其基础上进行了深度修改的 TinaTheme 或许是你在Typecho上最好的选择

原主题：[https://github.com/WingLim/hugo-tania](https://github.com/WingLim/hugo-tania)

## 最近版本更新日志

### 前端交互与 PJAX

- 修复启用 PJAX 后切换页面触发 `MathJax is not defined` 的报错问题。
- 统一页面初始化逻辑，首屏加载与 PJAX 切页后都会重新执行代码高亮和数学公式渲染。
- 修复直接进入文章页时代码块高亮不生效、只有 PJAX 进入文章页时才生效的问题。
- 修复 PJAX 切换页面后日间/夜间模式按钮失效的问题。
- 为暗色模式切换动画增加安全回退，避免 `AbortError: Transition was skipped` 导致按钮无法正常工作。

### 脚本重构

- 重构 `assets/js/features.js`，改为可重复初始化的模式，兼容 PJAX 页面切换。
- 重构 `assets/js/codecopy.js`，避免代码块复制按钮重复插入和重复绑定事件。
- 重构 `assets/js/toc.js`，避免目录组件、遮罩层、按钮和观察器在 PJAX 下重复创建。
- 将 PJAX 成功后的脚本处理方式从重复 `getScript` 改为直接调用全局初始化函数。

### 评论区

- 将评论区样式独立拆分到 `assets/css/comments.css` 并在主题中引入。
- 优化评论区整体布局，补充评论头部、正文、操作区等更清晰的结构类名。
- 调整评论区视觉风格。
- 修正评论表单结构，移除不适合同排布局的旧标签结构。

### 页面模板整理

- 整理并优化以下模板文件的结构
- 修复部分模板中的冗余嵌套结构和不规范 HTML。

### 样式细节

- 调整 footer 区域的超链接样式，移除按钮化效果，使其更接近普通文本链接。
- 修复友情链接页面和文章页中 fancybox 图片替换标签的结构问题。

## 功能与特性

- 简洁风格

- 适配深色模式

- HTML 原生自响应式布局

- 超轻量

- 高度自定义

- 完善的后台设置系统

- HighLight.js

- Pjax

欢迎提 Issues 和 PRs，欢迎提出建议

## 使用

下载主题包并解压 ( 若是从 GitHub 或 Gitee 下载，请把解压出来的文件夹改名为 `TinaTheme` ) ，将文件夹上传至网站文件主题目录 ( `/usr/theme` ) 下，进入网站后台 - 控制台 - 外观 - 启用主题即可。

## 文档

TinaTheme 文档 : [https://tina.fmcf.cc/Docs](https://tina.fmcf.cc/Docs)

## Demo

主题效果预览

TinaTheme主题演示站：[https://tina.fmcf.cc](https://tina.fmcf.cc)

## 注意

TinaTheme 使用 [GPL V3.0](https://github.com/ouyangyanhuo/TinaTheme/blob/main/LICENSE) 协议开源，请遵守此协议进行二次开发等。

您必须在页脚保留 TinaTheme 主题的名称及其指向链接，否则请不要使用 TinaTheme 主题。

您可以删除页脚的作者版权信息，但是不能删除 TinaTheme 主题的名称及其指向链接。

## 预览图
![](https://pic1.zhimg.com/80/v2-c3d9c9458bdc2e12ceef006c3192687d_720w.jpeg)
![](https://picx.zhimg.com/80/v2-0d04d14df7fb1d533e95c561a85e071b_720w.jpeg)
![](https://picx.zhimg.com/80/v2-2e9bff0db4dc6a129d77a3b017e04266_720w.jpeg)
![](https://picx.zhimg.com/80/v2-d7d0e6115507a8dbb106865cfb4e8b83_720w.jpeg)
![](https://picx.zhimg.com/80/v2-4db906b3d9271dbe27340d5d5f3658b8_720w.jpeg)
![](https://picx.zhimg.com/80/v2-0d04d14df7fb1d533e95c561a85e071b_720w.jpeg)

## Contributors

[![Contributors](https://contrib.rocks/image?repo=ouyangyanhuo/TinaTheme)](https://github.com/ouyangyanhuo/TinaTheme/graphs/contributors)
