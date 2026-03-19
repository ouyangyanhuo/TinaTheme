(function () {
  function copyText(text) {
    if (navigator.clipboard && window.isSecureContext) {
      return navigator.clipboard.writeText(text);
    }

    return new Promise(function (resolve, reject) {
      try {
        var textarea = document.createElement("textarea");
        textarea.value = text;
        textarea.setAttribute("readonly", "");
        textarea.style.position = "fixed";
        textarea.style.top = "-9999px";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        resolve();
      } catch (err) {
        reject(err);
      }
    });
  }

  function createCopyButton() {
    var button = document.createElement("button");
    button.type = "button";
    button.className = "code-copy-button";
    button.textContent = "Copy";
    button.setAttribute("aria-label", "Copy code");
    button.style.position = "absolute";
    button.style.right = "12px";
    button.style.top = "12px";
    button.style.padding = "4px 10px";
    button.style.border = "1px solid rgba(0, 0, 0, 0.08)";
    button.style.borderRadius = "999px";
    button.style.backgroundColor = "#f1f4f8";
    button.style.color = "#222";
    button.style.cursor = "pointer";
    button.style.zIndex = "2";
    button.style.boxShadow = "none";
    return button;
  }

  function bindCopyButton(pre, button, code) {
    if (button.dataset.bound === "true") {
      return;
    }

    button.dataset.bound = "true";
    button.addEventListener("click", function () {
      var text = code ? code.innerText : pre.innerText;
      copyText(text)
        .then(function () {
          button.textContent = "Copy Success";
          window.clearTimeout(button._copyTimer);
          button._copyTimer = window.setTimeout(function () {
            button.textContent = "Copy";
          }, 2000);
        })
        .catch(function () {
          button.textContent = "Copy Failed";
          window.clearTimeout(button._copyTimer);
          button._copyTimer = window.setTimeout(function () {
            button.textContent = "Copy";
          }, 2000);
        });
    });
  }

  window.TinaThemeInitCodeCopy = function (scope) {
    var root = scope || document;
    var blocks = root.querySelectorAll("pre");

    blocks.forEach(function (pre) {
      if (!pre.style.position) {
        pre.style.position = "relative";
      }

      var code = pre.querySelector("code");
      var button = pre.querySelector(".code-copy-button");

      if (!button) {
        button = createCopyButton();
        pre.appendChild(button);
      }

      bindCopyButton(pre, button, code);
    });
  };

  window.TinaThemeInitCodeCopy(document);
})();
