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

### 重大安全更新

- 为解决 CVE-2026-109618 & CVE-2026-109619 高危漏洞，Tina 小姐已经全面支持 php8.5及更高版本
- 数据库查询结果增加数组判断，POST type 参数增加 isset 检查，避免空值访问
- compressHtml 增加 preg_split 返回值判断，字符遍历防止越界，Links 支持空行并补齐字段，验证码改为严格整型校验，getContentTest 封装 preg_replace 空值回退，word_count 与上下篇链接增加空值保护并抽取公共方法
- UA 获取增加 isset 判断
- 移除冗余的条件分支
- 返回 null 时回退原始内容，修复 img 标签闭合错误

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
