var codeblocks = document.getElementsByTagName("pre")
//循环每个pre代码块，并添加 复制代码
for (var i = 0; i < codeblocks.length; i++) {
    //显示 复制代码 按钮
    currentCode = codeblocks[i]
    currentCode.style = "position: relative;"
    var copy = document.createElement("div")
    copy.style = "position: absolute;right: 4px;\
    top: 4px;background-color: white;padding: 2px 8px;\
    margin: 8px;border-radius: 4px;cursor: pointer;\
    z-index: 9999;\
    box-shadow: 0 2px 4px rgba(0,0,0,0.05), 0 2px 4px rgba(0,0,0,0.05);"
    copy.innerHTML = "Copy"
    currentCode.appendChild(copy)
    //让所有 "复制"按钮 全部隐藏
    copy.style.visibility = "hidden"
}
for (var i = 0; i < codeblocks.length; i++) {
    !function (i) {
        //鼠标移到代码块，就显示按钮
        codeblocks[i].onmouseover = function () {
            codeblocks[i].childNodes[1].style.visibility = "visible"
        }
        //执行 复制代码 功能
        function copyArticle(event) {
            const range = document.createRange();
            //范围是 code，不包括刚才创建的div
            range.selectNode(codeblocks[i].childNodes[0]);
            const selection = window.getSelection();
            if (selection.rangeCount > 0) selection.removeAllRanges();
            selection.addRange(range);
            document.execCommand('copy');
            codeblocks[i].childNodes[1].innerHTML = "Copy Success"
            setTimeout(function () {
                codeblocks[i].childNodes[1].innerHTML = "Copy"
            }, 3500);
            //清除选择区
            if (selection.rangeCount > 0) selection.removeAllRanges(); 0
        }
        codeblocks[i].childNodes[1].addEventListener('click', copyArticle, false);
    }(i);
    !function (i) {
        //鼠标从代码块移开 则不显示复制代码按钮
        codeblocks[i].onmouseout = function () {
            codeblocks[i].childNodes[1].style.visibility = "hidden"
        }
    }(i);
}
