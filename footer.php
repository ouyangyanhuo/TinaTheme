<script src="https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.js"></script>
<link href="https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.css" rel="stylesheet">
<script src="https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.js"></script>
</div>
<script>
$(document).pjax(
  'a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"], a[href^="/"]',
  {
    container: '#pjax-load',
    fragment: '#pjax-load',
    timeout: 8000
  }
)
.on('pjax:send', function () {
  NProgress.start();//加载动画效果开始

}).on('pjax:complete', function () {
  NProgress.done();//加载动画效果结束
});
</script>
</body>
<footer class="footer flex">
    <section class="container">
        <nav class="footer-links">
            <p><center>Copyright © 2021-2022 Magneto<br>Theme <a href="https://fmcf.cc" target="_blank">SmileTheme</a> By Magneto</center></p>
        </nav>
            <?php if ($this->options->FooterHTML): ?>
            <?php $this->options->FooterHTML() ?>
            <?php endif; ?>
    </section>
    <?php if ($this->options->The_Dark_Mode): ?>
    <script async="" src="<?php $this->options->themeUrl('/assets/features.js'); ?>" data-enable-footnotes="true"></script>
    <?php endif; ?>
</footer>
<?php if ($this->options->cursor): ?>
<script>var CURSOR;Math.lerp=(a,b,n)=>(1-n)*a+n*b;const getStyle=(el,attr)=>{try{return window.getComputedStyle?window.getComputedStyle(el)[attr]:el.currentStyle[attr]}catch(e){}return""};class Cursor{constructor(){this.pos={curr:null,prev:null};this.pt=[];this.create();this.init();this.render()}move(left,top){this.cursor.style["left"]=`${left}px`;this.cursor.style["top"]=`${top}px`}create(){if(!this.cursor){this.cursor=document.createElement("div");this.cursor.id="cursor";this.cursor.classList.add("hidden");document.body.append(this.cursor)}var el=document.getElementsByTagName('*');for(let i=0;i<el.length;i++)if(getStyle(el[i],"cursor")=="pointer")this.pt.push(el[i].outerHTML);document.body.appendChild((this.scr=document.createElement("style")));this.scr.innerHTML=`*{cursor:url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8' width='8px' height='8px'><circle cx='4' cy='4' r='4' opacity='.5'/></svg>")4 4,auto!important}`}refresh(){this.scr.remove();this.cursor.classList.remove("hover");this.cursor.classList.remove("active");this.pos={curr:null,prev:null};this.pt=[];this.create();this.init();this.render()}init(){document.onmouseover=e=>this.pt.includes(e.target.outerHTML)&&this.cursor.classList.add("hover");document.onmouseout=e=>this.pt.includes(e.target.outerHTML)&&this.cursor.classList.remove("hover");document.onmousemove=e=>{(this.pos.curr==null)&&this.move(e.clientX-8,e.clientY-8);this.pos.curr={x:e.clientX-8,y:e.clientY-8};this.cursor.classList.remove("hidden")};document.onmouseenter=e=>this.cursor.classList.remove("hidden");document.onmouseleave=e=>this.cursor.classList.add("hidden");document.onmousedown=e=>this.cursor.classList.add("active");document.onmouseup=e=>this.cursor.classList.remove("active")}render(){if(this.pos.prev){this.pos.prev.x=Math.lerp(this.pos.prev.x,this.pos.curr.x,0.15);this.pos.prev.y=Math.lerp(this.pos.prev.y,this.pos.curr.y,0.15);this.move(this.pos.prev.x,this.pos.prev.y)}else{this.pos.prev=this.pos.curr}requestAnimationFrame(()=>this.render())}}(()=>{CURSOR=new Cursor()})();</script>
<?php endif; ?>
</html>
<?php /* 来自 MDr | HTML 压缩 */
if ($this->options->compressHtml) {
    $html_source = ob_get_contents();
    ob_clean();
    print compressHtml($html_source);
    ob_end_flush();
}
?>