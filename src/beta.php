<!DOCTYPE html>
<html>
   <head>
      <title>Code Editor</title>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.css'>
   </head>
   <style>
   .CodeMirror {
  border: 1px solid #eee;
  height: 83vh;
}
      .col {padding:0 !important;}#test1, #test2,#test4 {margin-top: 10px;}body {overflow: hidden}
      p{ padding: 0; margin: 0; } user-notification{ position: fixed; bottom: 32px; left: 50%; transform: translateX(-50%) scale(0.87); opacity: 0; transform-origin: center bottom; padding: 0 16px; border-radius: 4px; min-width: 340px; max-width: calc(100vw - 64px); box-shadow: 0 1px 3px rgba(0,0,0, 0.15), 0 2px 6px rgba(0,0,0, 0.15); animation: popNotification 4000ms cubic-bezier(0.0, 0.0, 0.2, 1); background-color: rgb(51, 51, 51); color: rgba(255,255,255, 0.87); font-size: 14px; line-height: 48px; height: 48px; z-index: 9999; } user-notification.is-infinite{ animation: popInNotification 150ms cubic-bezier(0.0, 0.0, 0.2, 1) forwards; } user-notification button{ display: inline-block; height: 36px; line-height: 34px; margin: 0; padding: 0 16px; border: none; outline: none; box-shadow: none; border-radius: 2px; position: absolute; font-size: 14px; text-transform: uppercase; user-select: none; top: 6px; right: 6px; transition: all 150ms cubic-bezier(0.4, 0.0, 0.2, 1); } user-notification button:active{ transform: none; } @keyframes popInNotification{ from{ transform: translateX(-50%) scale(0.87); opacity: 0; } to{ transform: translateX(-50%) scale(1); opacity: 1; } } @keyframes popNotification{ 0%{ transform: translateX(-50%) scale(0.87); opacity: 0; } 3.75%, 96.25%{ transform: translateX(-50%) scale(1); opacity: 1; } 100%{ transform: translateX(-50%) scale(1); animation-timing-function: cubic-bezier(0.4, 0.0, 1, 1); opacity: 0; } } textarea { border:0;height: 85vh;width: 100%;  color: var(--font-color);background: var(--bg-color); outline: none; font-family: Courier, sans-serif;  }  body { padding-left: 60px; } iframe { bottom: 0; position: relative; border:0;width: 100%; height: 100vh; } @import url(https://fonts.googleapis.com/css?family=Lato:400,400italic,700|Sansita+One); :root { --primary-color: #302AE6; --secondary-color: #f4f4f9; --font-color: #424242; --bg-color: #fff; --heading-color: #292922; } [data-theme="dark"] { --primary-color: #9A97F3; --secondary-color: rgba(255,255,255,.1); --font-color: #e1e1ff; --bg-color: #212121; --heading-color: #818cab; } iframe { background: white; } body { background-color: var(--bg-color); color: var(--font-color);} #circle { z-index:99999999999999999999999999;position:fixed; top:10px; right: 10px; width: 20px; height: 20px; border: 3px solid transparent; border-top: 3px solid #036bfc; border-left: 3px solid #036bfc; border-radius: 999px; animation: rotate .5s linear infinite; transform: rotate(45deg); } #bar { z-index: 999999999999999999999999999999999999999999999999999999999999999;background: #4287f5; width: 1%; height: 2px; position: fixed; top: 0; left: 0; animation: bar 3s forwards cubic-bezier(.82,.04,.38,.63); } #bar:after { content: ''; width: 60px; height: 1px; /* Half of the original height */ margin-left: -10px;; margin-top: -105px; float:right; box-shadow: 0 100px 5px 5px #036bfc; z-index: -1; animation: bar-after 2s forwards cubic-bezier(1,.02,.56,.4) } @keyframes bar-after{ 100%{ right:0; } } @keyframes bar { 0% {width:0%} 60% {width: 100%;opacity:1} 99% {width: 100%;opacity:1} 100% {width:100%;opacity:1;} } @keyframes rotate { 0% { transform:rotate(0deg); opacity:1 } 100% { transform:rotate(360deg); opacity:1 } }
      .tabs a,.tabs{background-color: var(--bg-color) !important}.sidebar-icons { position: fixed; top: 35px; left:0; background: #141414; height: 100%; } .sidebar-icons a { display: block; color: white; text-decoration: none; padding: 10px; } /* highlight styles */ .ldt .comment { color: silver; } .ldt .string { color: green; } .ldt .number { color: navy; } .ldt .keyword { font-weight: bold; } .ldt .variable { color: cyan; } .ldt .define { color: blue; } .nav { position: fixed; top: 0; left: 0; width: 100%; height: 35px; z-index: 999999999; background: #212121; } .nav a.btn { background: transparent !important; color: white !important } .nav a:hover { background: rgba(255,255,255,.3) !important } .tabs { margin-top: 30px; } iframe { margin-top: 30px; } .dropdown-content { background: #4a4a4a !important; min-width: 300px; } .dropdown-content a {color: white !important} .dropdown-content li:hover { background-color: rgba(255,255,255,.1) !important }
   </style>
   </head>
<body onload="bar()"> <div id="bar" style="display:none"></div> <div id="circle" style="display:none"></div> <div class="nav"> <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown1'>File</a> <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown2'>Edit</a> <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown3'>View</a> <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown4'>Insert</a> <a class='dropdown-trigger btn btn-flat right' href='#' data-target='dropdown7'>Login!</a> </div> <!-- Dropdown Structure --> <ul id='dropdown1' class='dropdown-content'> <li><a href="#!">Save</a></li> </ul> <ul id='dropdown7' class='dropdown-content'> <li><a href="#!">Coming Soon!</a></li> </ul> <ul id='dropdown2' class='dropdown-content'> <li><a href="#!" onclick="clearInterval(myVar);M.toast({html: 'Success!!'})">Turn off Autosave</a></li> <li><a href="#!">Dark Mode</a></li> </ul> <ul id='dropdown3' class='dropdown-content'> <li><a href="#!">Dark Mode!</a></li> </ul> <ul id='dropdown4' class='dropdown-content'> <li><a href="#!" onclick='insert("<!DOCTYPE html>\n<html>\n<head>\n<title>Hello, World!</title>\n</head>\n<body>\nHello, World!\n</body>\n</html>")'>Basic HTML template <span class="badge new"></span></a></li> <li><a href="#!" onclick='insert("<script src=\"https://code.jquery.com/jquery-3.5.1.js\" integrity=\"sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=\" crossorigin=\"anonymous\"></script>")'>jQuery CDN</a></li> <li><a href="#!" onclick='insert("<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1\" crossorigin=\"anonymous\">\n<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW\" crossorigin=\"anonymous\"></script>")'>Bootstrap CDN</a></li> <li><a href="#!" onclick='insert("<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">")'>Materialize CDN</a></li> <li><a href="#!" onclick='insert("<link href=\"https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css\" rel=\"stylesheet\">")'>Tailwind CSS CDN</a></li> </ul> <div class="sidebar-icons fixed-left"> <a class="material-icons ripple" data-tooltip-right="Home" href="#!">home</a> <a class="material-icons js-sample-1" data-tooltip-right="Save (ALT A) or (CTRL S)" accesskey="a" href="#!" id="save" onclick="save()">save</a> <a class="material-icons" data-tooltip-right="Rerun code (ALT Q)" accesskey="q" href="#!" onclick="run()">refresh</a> <div class="theme-switch-wrapper" data-tooltip-right="Dark Mode"> <label class="theme-switch" for="checkbox"> <a class="material-icons" href="#!" onclick="document.getElementById('checkbox').click();" style="transform: rotate(180deg)">brightness_3</a> <div style="opacity: 0;"> <input type="checkbox" id="checkbox"/> </div> <div class="slider round"></div> </label> </div> </div>
      <div class="row">
         <div class="col s6">
            <ul class="tabs tabs-fixed-width">
               <li class="tab col s3"><a class="active" href="#test1">HTML</a></li>
               <li class="tab col s3"><a href="#test2">CSS</a></li>
               <li class="tab col s3"><a href="#test4">JavaScript</a></li>
            </ul>
            <div id="test1" class="col s12"><textarea id="html" placeholder="HTML"></textarea></div>
            <div id="test2" class="col s12"><textarea id="css" placeholder="CSS"></textarea></div>
            <div id="test4" class="col s12"><textarea id="js" placeholder="JavaScript"></textarea></div>
         </div>
         <div class="col s6">
            <iframe id="code"></iframe>
         </div>
      </div>
      <!--<script type="text/javascript" src="app.js"></script>-->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/xml/xml.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/css/css.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/javascript/javascript.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/htmlmixed/htmlmixed.js'></script>
      <link href="https://ichord.github.io/At.js/dist/css/jquery.atwho.css" rel="stylesheet">
      <script src="https://ichord.github.io/Caret.js/src/jquery.caret.js"></script>
      <script src="https://ichord.github.io/At.js/dist/js/jquery.atwho.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script>
var html_value, css_val, js_val;
var html_val_lstorage = localStorage["html"];
var editor = CodeMirror.fromTextArea(document.getElementById("html"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "htmlmixed"
});
var css = CodeMirror.fromTextArea(document.getElementById("css"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "css"
});
var js = CodeMirror.fromTextArea(document.getElementById("js"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "javascript"
});
var doc = document.getElementById('code').contentWindow.document;
function run() {
    html_value = editor.getValue();
    css_val = css.getValue();
    js_val = js.getValue();
    doc.open();
    doc.write("<style>" + css_val + "</style>" + html_value + "<script>" + js_val + "</scr"+"ipt>");
    doc.close();
}
function showCode(){
//alert(editor.getValue());
}
showCode();
function save() {
}
document.getElementById("save").addEventListener("click", function (){
        var user = editor.getValue();
        /*localStorage["html"] = user ;*/
        localStorage.setItem("html", user) ;
        /*alert(editor.getValue());*/
        console.log("HTML saved")} , false);
document.getElementById("save").addEventListener("click", function (){
        var user = css.getValue();
        localStorage.setItem("css", user) ;
        console.log("HTML saved")} , false);
document.getElementById("save").addEventListener("click", function (){
        var user = js.getValue();
        localStorage.setItem("js", user) ;
        console.log("HTML saved")} , false);
document.querySelector('.CodeMirror').CodeMirror.setValue(localStorage["html"])
document.querySelector('#test2 .CodeMirror').CodeMirror.setValue(localStorage["css"])
document.querySelector('#test4 .CodeMirror').CodeMirror.setValue(localStorage["js"])
        </script>
      <script>
window.onerror = function(msg, url, linenumber) {
    alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
}
         /* Nothing much here.... It's nothing to do with the code editor/result*/
         document.getElementById("save").click(); function insert(value) { document.getElementById("html").value += value; document.getElementById("html").focus(); } var myVar = setInterval(function(){ document.getElementById("save").click(); }, 20000); var setTimeoutv; function bar() { clearTimeout(setTimeoutv); document.getElementById("bar").style.display="block"; document.getElementById("circle").style.display="block"; setTimeoutv = setTimeout(function(){ document.getElementById("bar").style.display="none";document.getElementById("circle").style.display="none";M.toast({html: 'Saved!'}) }, 3000); } const sample1 = document.body.querySelector('.js-sample-1'); const sample2 = document.body.querySelector('.js-sample-2'); sample1.addEventListener('click', ()=>{ bar(); });const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]'); const currentTheme = localStorage.getItem('theme'); if (currentTheme) { document.documentElement.setAttribute('data-theme', currentTheme); if (currentTheme === 'dark') { toggleSwitch.checked = true; } } function switchTheme(e) { if (e.target.checked) { document.documentElement.setAttribute('data-theme', 'dark'); localStorage.setItem('theme', 'dark'); } else {        document.documentElement.setAttribute('data-theme', 'light'); localStorage.setItem('theme', 'light'); } } toggleSwitch.addEventListener('change', switchTheme, false);$(window).bind('keydown', function(event) { if (event.ctrlKey || event.metaKey) { switch (String.fromCharCode(event.which).toLowerCase()) { case 's': event.preventDefault(); document.getElementById("save").click(); break; case 'q': event.preventDefault(); document.getElementById("save").click(); setTimeout(function(){ window.close(); }, 10000); break; case 'r': event.preventDefault(); document.getElementById("save").click(); location.reload(); break; } } }); 
         /*Autocomplete*/
        /* $('#html').atwho({  startWithSpace: false, at: "<", data:['html', 'head', 'title', 'body', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'a', 'section', 'aside'] }); $('#html').atwho({  startWithSpace: false, at: "</", data:['html>', 'head>', 'title>', 'body>', 'div>', 'h1>', 'h2>', 'h3>', 'h4>', 'h5>', 'h6>', 'p>', 'a>', 'section>', 'aside>'] }); $('#html').atwho({  startWithSpace: false, at: "<html ", data:['lang="en">'] }); $('#js').atwho({  startWithSpace: false, at: "document.", data:['getElementById', 'getElementByClassName','getElementsByClassName', 'querySelector', 'querySelectorAll','getElementsByTagName'] }); $('#css').atwho({  startWithSpace: false, at: "}\n", data:['html', 'head', 'title', 'body', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'a', 'section', 'aside'] }); $('#css').atwho({  startWithSpace: false, at: "\n", data:['accelerator', 'azimuth', 'background', 'background-attachment', 'background-color', 'background-image', 'background-position', 'background-position-x', 'background-position-y', 'background-repeat', 'behavior', 'border', 'border-bottom', 'border-bottom-color', 'border-bottom-style', 'border-bottom-width', 'border-collapse', 'border-color', 'border-left', 'border-left-color', 'border-left-style', 'border-left-width', 'border-right', 'border-right-color', 'border-right-style', 'border-right-width', 'border-spacing', 'border-style', 'border-top', 'border-top-color', 'border-top-style', 'border-top-width', 'border-width', 'bottom', 'caption-side', 'clear', 'clip', 'color', 'content', 'counter-increment', 'counter-reset', 'cue', 'cue-after', 'cue-before', 'cursor', 'direction', 'display', 'elevation', 'empty-cells', 'filter', 'float', 'font', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', ' H/I ', 'height', 'ime-mode', 'include-source', 'layer-background-color', 'layer-background-image', 'layout-flow', 'layout-grid', 'layout-grid-char', 'layout-grid-char-spacing', 'layout-grid-line', 'layout-grid-mode', 'layout-grid-type', 'left', 'letter-spacing', 'line-break', 'line-height', 'list-style', 'list-style-image', 'list-style-position', 'list-style-type', 'margin', 'margin-bottom', 'margin-left', 'margin-right', 'margin-top', 'marker-offset', 'marks', 'max-height', 'max-width', 'min-height', 'min-width', '-moz-binding', '-moz-border-radius', '-moz-border-radius-topleft', '-moz-border-radius-topright', '-moz-border-radius-bottomright', '-moz-border-radius-bottomleft', '-moz-border-top-colors', '-moz-border-right-colors', '-moz-border-bottom-colors', '-moz-border-left-colors', '-moz-opacity', '-moz-outline', '-moz-outline-color', '-moz-outline-style', '-moz-outline-width', '-moz-user-focus', '-moz-user-input', '-moz-user-modify', '-moz-user-select', 'orphans', 'outline', 'outline-color', 'outline-style', 'outline-width', 'overflow', 'overflow-X', 'overflow-Y', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'page', 'page-break-after', 'page-break-before', 'page-break-inside', 'pause', 'pause-after', 'pause-before', 'pitch', 'pitch-range', 'play-during', 'position', 'quotes', '-replace', 'richness', 'right', 'ruby-align', 'ruby-overhang', 'ruby-position', '-set-link-source', 'size', 'speak', 'speak-header', 'speak-numeral', 'speak-punctuation', 'speech-rate', 'stress', 'scrollbar-arrow-color', 'scrollbar-base-color', 'scrollbar-dark-shadow-color', 'scrollbar-face-color', 'scrollbar-highlight-color', 'scrollbar-shadow-color', 'scrollbar-3d-light-color', 'scrollbar-track-color', 'table-layout', 'text-align', 'text-align-last', 'text-decoration', 'text-indent', 'text-justify', 'text-overflow', 'text-shadow', 'text-transform', 'text-autospace', 'text-kashida-space', 'text-underline-position', 'top', 'unicode-bidi', '-use-link-source', 'vertical-align', 'visibility', 'voice-family', 'volume', 'white-space', 'widows', 'width', 'word-break', 'word-spacing', 'word-wrap', 'writing-mode', 'z-index', 'zoom'] }); $('#css').atwho({  startWithSpace: false, at: "background: ", data:['red', 'blue', 'green', 'violet', 'pink', 'black', 'white', 'purple', 'teal', 'cyan', 'magenta', 'gray', 'whitesmoke'] });*/ $('.tabs').tabs(); $('.dropdown-trigger').dropdown({ coverTrigger: false, hover: true });
        
      </script>