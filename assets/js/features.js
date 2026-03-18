(() => {
  S = (function () {
    let l = document.documentElement,
      c = "user-color-scheme",
      s = "data-user-color-scheme",
      i = document.getElementById("dark-mode-button"),
      d = (n, a) => {
        try {
          localStorage.setItem(n, a);
        } catch (g) {}
      },
      h = (n) => {
        try {
          localStorage.removeItem(n);
        } catch (a) {}
      },
      e = (n) => {
        try {
          return localStorage.getItem(n);
        } catch (a) {
          return null;
        }
      },
      t = () =>
        window.matchMedia("(prefers-color-scheme: dark)").matches
          ? "dark"
          : "light",
      o = () => {
        (l.removeAttribute(s), h(c));
      },
      r = { dark: !0, light: !0 },
      m = (n) => {
        let a = n || e(c);
        a === t() ? o() : r[a] ? l.setAttribute(s, a) : o();
      },
      u = { dark: "light", light: "dark" },
      f = () => {
        let n = e(c);
        if (r[n]) n = u[n];
        else if (n === null) n = u[t()];
        else return;
        return (d(c, n), n);
      };
    (m(),
      i.addEventListener("click", (e) => {
        if (typeof document.startViewTransition !== "function") {
          m(f());
          return;
        }

        const x = e.clientX;
        const y = e.clientY;
        const endRadius = Math.hypot(
          Math.max(x, innerWidth - x),
          Math.max(y, innerHeight - y)
        );

        const transition = document.startViewTransition(() => {
          m(f());
        });

        transition.ready.then(() => {
          const clipPath = [
            `circle(0px at ${x}px ${y}px)`,
            `circle(${endRadius}px at ${x}px ${y}px)`
          ];

          document.documentElement.animate(
            {
              clipPath: clipPath
            },
            {
              duration: 400,
              easing: "ease-in",
              pseudoElement: "::view-transition-new(root)"
            }
          );
        });
      }));
  })();
})();
console.log(
  "%cTheme: %cTinaTheme%cBy Magneto",
  "color: rgba(255,255,255,.6); background: #ffbd31; font-size: 15px;border-radius:5px 0 0 5px;padding:10px 0 10px 20px;",
  "color: rgba(255,255,255,1); background: #ffbd31; font-size: 15px;border-radius:0;padding:10px 15px 10px 0px;",
  "color: #fff; background: #ffd479; font-size: 15px;border-radius:0 5px 5px 0;padding:10px 20px 10px 15px;",
);
console.log(
  "%chttps://github.com/ouyangyanhuo/TinaTheme",
  "font-size: 12px;border-radius:5px;padding:3px 10px 3px 10px;border:1px solid #5e72e4;",
);
$(function () {
  $("img.lazy").lazyload({ effect: "fadeIn" });

  var btt = document.getElementById("back-to-top");
  if (btt) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 300) {
        btt.classList.add("show");
      } else {
        btt.classList.remove("show");
      }
    });
    btt.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
});
