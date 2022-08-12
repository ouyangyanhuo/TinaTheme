## 开发版特点

- 开发版使用和正式版相同的更新检测渠道，因此无法获得最新开发版，需要更新，请手动监察是否更新
- 开发版命名规则：发布版本号+Build内部版本号+Dev+第几次提交
- 开发版是开发者在云端开发环境中进行开发，测试能够运行后才提交至 Dev 分支，因此通常情况下，开发版是可以正常运行并使用的
- 开发版在正式版发布前通常未经过代码测试，不保证百分百稳定

## 最近版本更新日志

- 更改 更新校验方式 将其更改为 内部版本号校验 以达到精确校验（大部分App应用商店的校验方式）
- 新增 Gravatar头像源切换 功能，用于加速国内的Gravatar头像显示，经测试不会影响运行性能。
- 新增 主题数据备份 功能，数据存储于数据库中，名称为 TinaThemebf
- 修复开启图片灯箱后对Tyoecho `<!---more-->`  标签的支持
- 修复了不开启图片灯箱无法正常使用PJAX的陈年Bug
- 修复了评论区头像的显示效果负优化
- 优化了 CSS 的书写，进而提高性能
- 优化了 图片 的显示效果
- 优化了 友链 页面中 链接的显示效果
- 优化了 评论内容 的整体显示效果
- 删除了在 CSS 中部分无法正常使用的功能
- 删除了冗余的核心JS

## 更多内容

- 更多内容详见 main 分支的 README.md

## 捐赠

如果您很喜欢这个主题，不妨[捐赠](https://www.verypoor.cn)一下我，这样有助于我更高效的开发