/*! SmileJS for v1.2.7 | Created by Magneto for Smiletheme| Size about 2.2KB */
(()=>{(function(l){let c=!1;l.currentScript&&(c=l.currentScript.dataset.enableFootnotes=="true"),c&&function(){let i=e=>{!e||(e.remove?e.remove():e.parentNode.removeChild(e))},d=(e,t)=>{e.after?e.after(t):e.parentNode.insertBefore(t,e.nextSibling)},h=e=>{var t=e.parentNode,o=e.innerHTML,r=document.createElement("div");d(t,r),r.appendChild(e),e.innerHTML="",e.appendChild(t),t.innerHTML=o,d(r,r.firstElementChild),i(r)};document.querySelectorAll('.footnotes > ol > li[id^="fn"], #refs > div[id^="ref-"]').forEach(function(e){let t=document.querySelectorAll('a[href="#'+e.id+'"]');if(t.length===0)return;t.forEach(function(u){u.removeAttribute("href")});let o=t[0],r=document.createElement("div");if(r.className="side side-right",/^fn/.test(e.id)){r.innerHTML=e.innerHTML;var m=o.innerHTML;r.firstElementChild.innerHTML='<span class="bg-number">'+m+"</span> "+r.firstElementChild.innerHTML,i(r.querySelector('a[href^="#fnref"]')),o.parentNode.tagName==="SUP"&&h(o)}else r.innerHTML=e.outerHTML,o=o.parentNode;d(o,r),o.classList.add("note-ref"),i(e)}),document.querySelectorAll(".footnotes, #refs").forEach(function(e){var t=e.children;if(e.id==="refs")return t.length===0&&i(e);t.length!==2||t[0].tagName!=="HR"||t[1].tagName!=="OL"||t[1].childElementCount===0&&i(e)})}()})(document);var M=function(){for(let l=1;l<=6;l++){let c=document.querySelectorAll(".article-post>h"+l);for(let s=0;s<c.length;s++){let i=c[s];i.innerHTML=`<a href="#${i.id}" class="anchor"></a>${i.innerHTML}`}}}(),S=function(){let l=document.documentElement,c="user-color-scheme",s="data-user-color-scheme",i=document.getElementById("dark-mode-button"),d=(n,a)=>{try{localStorage.setItem(n,a)}catch(g){}},h=n=>{try{localStorage.removeItem(n)}catch(a){}},e=n=>{try{return localStorage.getItem(n)}catch(a){return null}},t=()=>window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light",o=()=>{l.removeAttribute(s),h(c)},r={dark:!0,light:!0},m=n=>{let a=n||e(c);a===t()?o():r[a]?l.setAttribute(s,a):o()},u={dark:"light",light:"dark"},f=()=>{let n=e(c);if(r[n])n=u[n];else if(n===null)n=u[t()];else return;return d(c,n),n};m(),i.addEventListener("click",()=>{m(f())})}();})();
