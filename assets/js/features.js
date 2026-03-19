(function () {
  var root = document.documentElement;
  var storageKey = "user-color-scheme";
  var attrName = "data-user-color-scheme";
  var allowed = { dark: true, light: true };
  var reverse = { dark: "light", light: "dark" };

  function setStorage(key, value) {
    try {
      localStorage.setItem(key, value);
    } catch (err) {}
  }

  function removeStorage(key) {
    try {
      localStorage.removeItem(key);
    } catch (err) {}
  }

  function getStorage(key) {
    try {
      return localStorage.getItem(key);
    } catch (err) {
      return null;
    }
  }

  function getSystemScheme() {
    return window.matchMedia("(prefers-color-scheme: dark)").matches
      ? "dark"
      : "light";
  }

  function clearScheme() {
    root.removeAttribute(attrName);
    removeStorage(storageKey);
  }

  function applyScheme(nextScheme) {
    var scheme = nextScheme || getStorage(storageKey);
    if (scheme === getSystemScheme()) {
      clearScheme();
      return;
    }

    if (allowed[scheme]) {
      root.setAttribute(attrName, scheme);
    } else {
      clearScheme();
    }
  }

  function toggleScheme() {
    var current = getStorage(storageKey);

    if (allowed[current]) {
      current = reverse[current];
    } else if (current === null) {
      current = reverse[getSystemScheme()];
    } else {
      return null;
    }

    setStorage(storageKey, current);
    return current;
  }

  function animateThemeToggle(event) {
    var nextScheme = toggleScheme();
    if (!nextScheme) {
      return;
    }

    if (typeof document.startViewTransition !== "function") {
      applyScheme(nextScheme);
      return;
    }

    var x = event.clientX || window.innerWidth / 2;
    var y = event.clientY || window.innerHeight / 2;
    var endRadius = Math.hypot(
      Math.max(x, window.innerWidth - x),
      Math.max(y, window.innerHeight - y)
    );

    var transition;
    try {
      transition = document.startViewTransition(function () {
        applyScheme(nextScheme);
      });
    } catch (err) {
      applyScheme(nextScheme);
      return;
    }

    transition.ready
      .then(function () {
        document.documentElement.animate(
          {
            clipPath: [
              "circle(0px at " + x + "px " + y + "px)",
              "circle(" + endRadius + "px at " + x + "px " + y + "px)"
            ]
          },
          {
            duration: 400,
            easing: "ease-in",
            pseudoElement: "::view-transition-new(root)"
          }
        );
      })
      .catch(function () {
        applyScheme(nextScheme);
      });
  }

  function initLazyImages(scope) {
    if (!window.jQuery || !jQuery.fn || !jQuery.fn.lazyload) {
      return;
    }

    var $scope = scope ? jQuery(scope) : jQuery(document);
    $scope.find("img.lazy").lazyload({ effect: "fadeIn" });
  }

  function initBackToTop() {
    var button = document.getElementById("back-to-top");
    if (!button || button.dataset.bound === "true") {
      return;
    }

    button.dataset.bound = "true";

    window.addEventListener("scroll", function () {
      if (window.scrollY > 300) {
        button.classList.add("show");
      } else {
        button.classList.remove("show");
      }
    });

    button.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  function bindThemeToggle() {
    if (document.documentElement.dataset.themeToggleBound === "true") {
      return;
    }

    document.documentElement.dataset.themeToggleBound = "true";

    document.addEventListener("click", function (event) {
      var button = event.target.closest("#dark-mode-button");
      if (!button) {
        return;
      }

      animateThemeToggle(event);
    });
  }

  window.TinaThemeInitFeatures = function (scope) {
    applyScheme();
    bindThemeToggle();
    initLazyImages(scope || document);
    initBackToTop();
  };

  window.TinaThemeInitFeatures(document);

  console.log(
    "%cTheme: %cTinaTheme%cBy Magneto",
    "color: rgba(255,255,255,.6); background: #ffbd31; font-size: 15px;border-radius:5px 0 0 5px;padding:10px 0 10px 20px;",
    "color: rgba(255,255,255,1); background: #ffbd31; font-size: 15px;border-radius:0;padding:10px 15px 10px 0px;",
    "color: #fff; background: #ffd479; font-size: 15px;border-radius:0 5px 5px 0;padding:10px 20px 10px 15px;"
  );
  console.log(
    "%chttps://github.com/ouyangyanhuo/TinaTheme",
    "font-size: 12px;border-radius:5px;padding:3px 10px 3px 10px;border:1px solid #5e72e4;"
  );
})();
