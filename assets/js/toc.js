(function () {
  function removeExistingTOC() {
    var toc = document.getElementById("toc-container");
    var button = document.querySelector(".toc-toggle-btn");
    var overlay = document.querySelector(".toc-overlay");

    if (toc) {
      toc.remove();
    }
    if (button) {
      button.remove();
    }
    if (overlay) {
      overlay.remove();
    }

    if (window.TinaThemeTOCObserver) {
      window.TinaThemeTOCObserver.disconnect();
      window.TinaThemeTOCObserver = null;
    }
  }

  function buildTOC(post) {
    var headings = post.querySelectorAll("h1, h2, h3, h4, h5, h6");
    if (!headings.length) {
      return;
    }

    var tocContainer = document.createElement("div");
    tocContainer.className = "toc-container";
    tocContainer.id = "toc-container";

    var title = document.createElement("div");
    title.className = "toc-title";
    title.textContent = "文章目录";

    var list = document.createElement("ul");
    list.className = "toc-list";

    headings.forEach(function (heading, index) {
      if (!heading.id) {
        heading.id = "heading-" + index;
      }

      var level = parseInt(heading.tagName.replace("H", ""), 10);
      var item = document.createElement("li");
      item.className = "toc-level-" + level;

      var link = document.createElement("a");
      link.href = "#" + heading.id;
      link.className = "toc-link";
      link.textContent = heading.textContent;

      item.appendChild(link);
      list.appendChild(item);
    });

    tocContainer.appendChild(title);
    tocContainer.appendChild(list);

    var toggleBtn = document.createElement("button");
    toggleBtn.className = "toc-toggle-btn";
    toggleBtn.type = "button";
    toggleBtn.setAttribute("aria-label", "文章目录");
    toggleBtn.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M3 4h18v2H3V4zm6 7h12v2H9v-2zm-6 7h18v2H3v-2zm0-7h4v2H3v-2z"/></svg>';

    var overlay = document.createElement("div");
    overlay.className = "toc-overlay";

    document.body.appendChild(tocContainer);
    document.body.appendChild(toggleBtn);
    document.body.appendChild(overlay);

    toggleBtn.addEventListener("click", function () {
      tocContainer.classList.toggle("show");
      overlay.classList.toggle("show");
    });

    overlay.addEventListener("click", function () {
      tocContainer.classList.remove("show");
      overlay.classList.remove("show");
    });

    tocContainer.querySelectorAll(".toc-link").forEach(function (link) {
      link.addEventListener("click", function (event) {
        event.preventDefault();

        var targetId = this.getAttribute("href").slice(1);
        var target = document.getElementById(targetId);
        if (target) {
          window.scrollTo({
            top: target.offsetTop - 80,
            behavior: "smooth"
          });
        }

        if (window.innerWidth <= 1299) {
          tocContainer.classList.remove("show");
          overlay.classList.remove("show");
        }
      });
    });

    if ("IntersectionObserver" in window) {
      var activeLink = null;
      var observer = new IntersectionObserver(
        function (entries) {
          var currentHeading = null;

          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              currentHeading = entry.target;
            }
          });

          if (!currentHeading) {
            return;
          }

          if (activeLink) {
            activeLink.classList.remove("active");
          }

          var id = currentHeading.getAttribute("id");
          var newLink = tocContainer.querySelector('a[href="#' + id + '"]');
          if (!newLink) {
            return;
          }

          newLink.classList.add("active");
          activeLink = newLink;

          var listContainer = tocContainer.querySelector(".toc-list");
          if (!listContainer) {
            return;
          }

          var linkTop = newLink.offsetTop;
          if (
            linkTop < listContainer.scrollTop ||
            linkTop > listContainer.scrollTop + listContainer.clientHeight
          ) {
            listContainer.scrollTo({
              top: Math.max(0, linkTop - 50),
              behavior: "smooth"
            });
          }
        },
        {
          root: null,
          rootMargin: "-80px 0px -60% 0px",
          threshold: 0
        }
      );

      headings.forEach(function (heading) {
        observer.observe(heading);
      });

      window.TinaThemeTOCObserver = observer;
    }
  }

  window.TinaThemeInitTOC = function () {
    removeExistingTOC();

    var post = document.getElementById("post");
    if (!post) {
      return;
    }

    buildTOC(post);
  };

  window.TinaThemeInitTOC();
})();
