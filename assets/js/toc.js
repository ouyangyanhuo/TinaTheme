window.initTOC = function () {
  // 移除已存在的目录结构 (防止 pjax 重复执行添加)
  const existToc = document.getElementById("toc-container");
  if (existToc) existToc.remove();
  const existBtn = document.querySelector(".toc-toggle-btn");
  if (existBtn) existBtn.remove();
  const existOverlay = document.querySelector(".toc-overlay");
  if (existOverlay) existOverlay.remove();

  const post = document.getElementById("post");
  if (!post) return;

  // 获取文章内的所有标题
  const headings = post.querySelectorAll("h1, h2, h3, h4, h5, h6");
  if (headings.length === 0) return;

  // 创建目录容器
  const tocContainer = document.createElement("div");
  tocContainer.className = "toc-container";
  tocContainer.id = "toc-container";

  let html = '<div class="toc-title">文章目录</div><ul class="toc-list">';
  headings.forEach((heading, index) => {
    // 给没有 ID 的标题添加 ID，便于锚点跳转
    if (!heading.id) {
      heading.id = "heading-" + index;
    }
    const level = parseInt(heading.tagName.replace("H", ""), 10);
    html += `<li class="toc-level-${level}"><a href="#${heading.id}" class="toc-link">${heading.textContent}</a></li>`;
  });
  html += "</ul>";
  tocContainer.innerHTML = html;

  // 创建移动端悬浮按钮
  const toggleBtn = document.createElement("button");
  toggleBtn.className = "toc-toggle-btn";
  toggleBtn.innerHTML =
    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M3 4h18v2H3V4zm6 7h12v2H9v-2zm-6 7h18v2H3v-2zm0-7h4v2H3v-2z"/></svg>';
  toggleBtn.setAttribute("aria-label", "文章目录");

  const overlay = document.createElement("div");
  overlay.className = "toc-overlay";

  document.body.appendChild(tocContainer);
  document.body.appendChild(toggleBtn);
  document.body.appendChild(overlay);

  // 交互逻辑
  const tocLinks = tocContainer.querySelectorAll(".toc-link");

  // 菜单按钮展开/缩起交互
  toggleBtn.addEventListener("click", function () {
    tocContainer.classList.toggle("show");
    overlay.classList.toggle("show");
  });

  overlay.addEventListener("click", function () {
    tocContainer.classList.remove("show");
    overlay.classList.remove("show");
  });

  // 点击目录项平滑滚动并关闭面板
  tocLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href").substring(1);
      const targetEl = document.getElementById(targetId);
      if (targetEl) {
        window.scrollTo({
          top: targetEl.offsetTop - 80, // 抵消顶部导航栏高度
          behavior: "smooth",
        });
      }
      if (window.innerWidth <= 1299) {
        tocContainer.classList.remove("show");
        overlay.classList.remove("show");
      }
    });
  });

  // IntersectionObserver 高亮当前可视区域的标题
  if ("IntersectionObserver" in window) {
    const observerOptions = {
      root: null,
      rootMargin: "-80px 0px -60% 0px",
      threshold: 0,
    };

    let activeLink = null;
    const observer = new IntersectionObserver((entries) => {
      let currentHeading = null;
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          currentHeading = entry.target;
        }
      });

      if (currentHeading) {
        if (activeLink) {
          activeLink.classList.remove("active");
        }
        const id = currentHeading.getAttribute("id");
        const newLink = tocContainer.querySelector(`a[href="#${id}"]`);
        if (newLink) {
          newLink.classList.add("active");
          activeLink = newLink;
          // 让目录同时跟着滚动
          const listContainer = tocContainer.querySelector(".toc-list");
          if (listContainer) {
            const linkTop = newLink.offsetTop;
            if (
              linkTop < listContainer.scrollTop ||
              linkTop > listContainer.scrollTop + listContainer.clientHeight
            ) {
              listContainer.scrollTo({
                top: Math.max(0, linkTop - 50),
                behavior: "smooth",
              });
            }
          }
        }
      }
    }, observerOptions);

    headings.forEach((heading) => observer.observe(heading));
  }
};

// 页面首次加载时执行
window.initTOC();

// 处理 pjax 跳转时的旧组件残留及重载问题
if (typeof window.pjaxTocBound === "undefined") {
  window.pjaxTocBound = true;
  if (window.jQuery) {
    window.jQuery(document).on("pjax:send", function () {
      const existToc = document.getElementById("toc-container");
      if (existToc) existToc.remove();
      const existBtn = document.querySelector(".toc-toggle-btn");
      if (existBtn) existBtn.remove();
      const existOverlay = document.querySelector(".toc-overlay");
      if (existOverlay) existOverlay.remove();
    });

    // PJAX 加载完毕后重新初始化目录
    window.jQuery(document).on("pjax:complete", function () {
      if (typeof window.initTOC === "function") {
        window.initTOC();
      }
    });
  }
}
