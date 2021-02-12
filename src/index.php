<?php 
$available_id = null;
$servername = "sql104.epizy.com";
$username = "epiz_27081301";
$password = "oGM667NEMc";
$dbname = "epiz_27081301_WEB_CODE_IDE_DO_NOT_DELETE_THIS_EVER_IN_YOUR_LIFE";
$id = $_GET['id'];
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT MAX(id) FROM products";
$users = $dbh->query($sql);
foreach ($users as $row) {
    $available_id = $row['MAX(id)'] + 1;
    //echo "document.querySelector('.CodeMirror').CodeMirror.setValue(".json_encode($row['qty']).")";
}
$dbh = null;
}
catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}
if(isset($_GET['id'])) {
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM products WHERE id = ".$_GET['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
    $name = $row['name'];
    //echo "document.querySelector('.CodeMirror').CodeMirror.setValue(".json_encode($row['qty']).")";
}
$dbh = null;
}
catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>WebCode | An online coding IDE for web developers!</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/theme/mbo.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/theme/xq-light.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.css'>
<link rel="shortcut icon" href="https://freeiconshop.com/wp-content/uploads/edd/code-flat.png">
<meta name="theme-color" content="#141414">
<link rel="favicon" href="https://freeiconshop.com/wp-content/uploads/edd/code-flat.png">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/dialog/dialog.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/search/searchcursor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/search/search.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/scroll/annotatescrollbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/search/matchesonscrollbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/search/jump-to-line.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
</head>
<style>
* .cm-error { color: rgba(255, 255, 255, 1.0) !important; background-color: #EC5F67 !important; } .CodeMirror-dialog { position: absolute; left: 0; right: 0; background: inherit; z-index: 15; padding: .1em .8em; overflow: hidden; color: inherit; } * { font-family: 'Source Code Pro', monospace; } .CodeMirror-dialog-top { border-bottom: 1px solid #eee; top: 0; } .CodeMirror-dialog-bottom { border-top: 1px solid #eee; bottom: 0; } .CodeMirror-dialog input { border: none; outline: none; background: transparent; width: 20em; color: inherit; font-family: monospace; } .CodeMirror-dialog button { font-size: 70%; } .cm-s-material { background-color: #263238 !important; color: rgba(233, 237, 237, 1); } .CodeMirror { border: 1px solid rgba(200,200,200,.5); height: 83vh; } .dropdown-content {z-index:999999999999999999999999 !important} .sidebar-icons .waves-ripple {transition-duration: .2s !important} .CodeMirror-scroll {z-index:0 !important} .CodeMirror-linenumbers {z-index: 2 !important} .tabs .tab a,.tabs .tab a:hover{ color:gray !important; transition-duration: 0s !important } /*Black color to the text*/ .tabs .tab a.active { background-color:transparent; color:gray;} /*Background and text color when a tab is active*/ .tabs-content.carousel.carousel-slider .carousel-item.active{ position: relative; } .tabs-content { height: auto !important; min-height: 100%; } #test1, #test4 { user-select:none; } .tabs .indicator { background-color:gray; } .alert { display:none }.row .col:last-child {padding:0 !important;}#test1, #test2,#test4 {margin-top: 10px;}body {overflow: hidden} p{ padding: 0; margin: 0; } user-notification{ position: fixed; bottom: 32px; left: 50%; transform: translateX(-50%) scale(0.87); opacity: 0; transform-origin: center bottom; padding: 0 16px; border-radius: 4px; min-width: 340px; max-width: calc(100vw - 64px); box-shadow: 0 1px 3px rgba(0,0,0, 0.15), 0 2px 6px rgba(0,0,0, 0.15); animation: popNotification 4000ms cubic-bezier(0.0, 0.0, 0.2, 1); background-color: rgb(51, 51, 51); color: rgba(255,255,255, 0.87); font-size: 14px; line-height: 48px; height: 48px; z-index: 9999; } user-notification.is-infinite{ animation: popInNotification 150ms cubic-bezier(0.0, 0.0, 0.2, 1) forwards; } user-notification button{ display: inline-block; height: 36px; line-height: 34px; margin: 0; padding: 0 16px; border: none; outline: none; box-shadow: none; border-radius: 2px; position: absolute; font-size: 14px; text-transform: uppercase; user-select: none; top: 6px; right: 6px; transition: all 150ms cubic-bezier(0.4, 0.0, 0.2, 1); } user-notification button:active{ transform: none; } @keyframes popInNotification{ from{ transform: translateX(-50%) scale(0.87); opacity: 0; } to{ transform: translateX(-50%) scale(1); opacity: 1; } } @keyframes popNotification{ 0%{ transform: translateX(-50%) scale(0.87); opacity: 0; } 3.75%, 96.25%{ transform: translateX(-50%) scale(1); opacity: 1; } 100%{ transform: translateX(-50%) scale(1); animation-timing-function: cubic-bezier(0.4, 0.0, 1, 1); opacity: 0; } } textarea { border:0;height: 85vh;width: 100%;  color: var(--font-color);background: var(--bg-color); outline: none; font-family: Courier, sans-serif;  }  body { padding-left: 50px; } iframe { bottom: 0; position: relative; border:0;width: 100%; height: 95vh; } :root { --primary-color: #302AE6; code-area-color: #fff; --secondary-color: #f4f4f9; --font-color: #424242; --bg-color: #fff; --heading-color: #292922; --black-color: #fff;} [data-theme="dark"] { --black-color:#242424;--primary-color: #9A97F3; --secondary-color: rgba(255,255,255,.1); --font-color: #e1e1ff; --code-area-color: #303030;--bg-color: #303030; --heading-color: #818cab; } iframe { background: var(--black-color); } body { background-color: var(--code-area-color); color: var(--font-color);} #circle { z-index:99999999999999999999999999;position:fixed; top:10px; right: 10px; width: 20px; height: 20px; border: 3px solid transparent; border-top: 3px solid #036bfc; border-left: 3px solid #036bfc; border-radius: 999px; animation: rotate .5s linear infinite; transform: rotate(45deg); } #bar { z-index: 999999999999999999999999999999999999999999999999999999999999999;background: #4287f5; width: 1%; height: 2px; position: fixed; top: 0; left: 0; animation: bar 3s forwards cubic-bezier(1,1.08,0,1); } #bar:after { content: ''; width: 60px; height: 1px; /* Half of the original height */ margin-left: -10px;; margin-top: -105px; float:right; box-shadow: 0 100px 5px 5px #036bfc; z-index: -1; animation: bar-after 2s forwards cubic-bezier(1,1.08,0,1) } @keyframes bar-after{ 100%{ right:0; } } @keyframes bar { 0% {width:0%} 60% {width: 100%;opacity:1} 99% {width: 100%;opacity:1} 100% {width:100%;opacity:1;} } @keyframes rotate { 0% { transform:rotate(0deg); opacity:1 } 100% { transform:rotate(360deg); opacity:1 } }#toast-container { top: auto !important; right: auto !important; bottom: 5%; left:2%; }.tabs a,.tabs{background-color: var(--code-area-color) !important}.sidebar-icons { position: fixed; top: 35px; left:0; background: #141414; height: 100%; } .sidebar-icons a { display: block; color: white; text-decoration: none; padding: 10px; } /* highlight styles */ .ldt .comment { color: silver; } .ldt .string { color: green; } .ldt .number { color: navy; } .ldt .keyword { font-weight: bold; } .ldt .variable { color: cyan; } .ldt .define { color: blue; } .nav { position: fixed; top: 0; left: 0; width: 100%; height: 35px; z-index: 2; background: #212121; } .nav a.btn { background: transparent !important; color: white !important } .nav a:hover { background: rgba(255,255,255,.3) !important } .tabs { margin-top: 30px; } iframe { margin-top: 30px; } .dropdown-content { background: #4a4a4a !important; min-width: 300px; } .dropdown-content a {color: white !important} .dropdown-content li:hover { background-color: rgba(255,255,255,.1) !important }.CodeMirror-search-match { background: gold; border-top: 1px solid orange; border-bottom: 1px solid orange; -moz-box-sizing: border-box; box-sizing: border-box; opacity: .5; } .nav a {margin:0 !important;word-wrap: normal; display: inline-block;} .modal,.modal-footer,.sidenav { background-color: var(--bg-color) !important } input,.modal-footer *,.sidenav * { color: var(--font-color) !important } ::-webkit-scrollbar { display:none } .cm-s-xq-light span.cm-string { color: green; } .button { display: block; position: relative; box-sizing: border-box; background: #ec710c; width: 250px; height: 50px; text-align: center; text-decoration: none; color: white; font-family: "Open Sans"; cursor: pointer; -webkit-transform: skew(-30deg); -moz-transform: skew(-30deg); -o-transform: skew(-30deg); } .button > div { -webkit-transform: skew(30deg); -moz-transform: skew(30deg); -o-transform: skew(30deg); } .button::before { content: ''; display: block; position: absolute; top: 0; right: calc(100.5% + 3px); width: calc(0.5% + 2px); height: 100%; background: inherit; }.new_c {animation: new 1s forwards}@keyframes new { 0% { background: rgba(255,0,0,.5); } }.sidenav-console {
    width: 95vw !important
}
html {
    scroll-behavior: smooth
}
</style>
<script>
var console = {};
console.log = function(msg){document.getElementById("warnings").insertAdjacentHTML("beforeend", '<li class="new_c"><a><b>'+msg+ '</b></a></li>');document.getElementById('console').scrollTop = document.getElementById('console').scrollHeight;};
</script>
<body onload="bar();run();typeWriter();desc()">
<div class="screen alert" id="intro_screen" style="position: fixed;top:0;left:0;width:100vw;height:100vh;background:var(--bg-color);z-index: 999999999999999999;overflow:scroll">
    <div class="fixed-action-btn">
    <a class="btn-floating btn-large black"onclick="document.getElementById('checkbox').click();">
    <i class="large material-icons">visibility</i>
    </a>
    </div>
    <style>
    .cm-s-xq-light span.cm-meta { color: gray; }
.collapsible-header {background: rgba(255,255,255,.1) !important}
    .closebtn .waves-ripple {
    transition-duration: .3s !important
    }
    .card {
    background: rgba(255,255,255,.1);
    }
    </style>
    <nav>
    <div class="nav-wrapper" style="background:var(--black-color)">
        <a href="#" class="brand-logo" style="color:var(--font-color);margin-left: 10px;">WebCode</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="https://github.com/manuthecoder/webcode/" target="_blank" style="color:var(--font-color)">View on GitHub</a></li>
        </ul>
    </div>
    </nav>
    <div class="row container">
    <div class="col s12 m6">
        <h2 id="demo"></h2>
        <p id="desc"></p>
        <br>
        <button class="closebtn gs btn black btn-large button waves-effect waves-light" onclick="document.getElementById('intro_screen').style.display='none'" >
            <div>Start coding now!</div>
        </button>
    </div>
    <div class="col s12 m6">
        <img src="https://freeiconshop.com/wp-content/uploads/edd/code-flat.png" width="50%" class="right">
    </div>
    </div>
    <div class="row container">
    <h4 class="center">Features</h4>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
                <polyline points="16 18 22 12 16 6"></polyline>
                <polyline points="8 6 2 12 8 18"></polyline>
                </svg>
                <h5>Syntax highlighting</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2">
                <circle cx="18" cy="5" r="3"></circle>
                <circle cx="6" cy="12" r="3"></circle>
                <circle cx="18" cy="19" r="3"></circle>
                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                </svg>
                <h5>Share your code</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                <h5>Download your code</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <h5>Quickly Access CDNs</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
                <h5>Dark mode</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play">
                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
                <h5>Run your code</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                </svg>
                <h5>Fullscreen code preview</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                <h5>Save code</h5>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card center">
            <div class="card-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command">
                <path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>
                </svg>
                <h5>Keyboard Shortcuts!</h5>
            </div>
        </div>
    </div>
    <div class="col s12 center">
        <h4 class="center">
            Start coding now!
        </h4>
        <button class=" button closebtn gs btn black btn-large waves-effect waves-light" style="margin:auto" onclick="document.getElementById('intro_screen').style.display='none'">
            <div>Start coding now!</div>
        </button>
    </div>
    </div>
    <footer class="page-footer purple darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">WebCode</h5>
                <p class="grey-text text-lighten-4">A modern online coding UI</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Other apps by ManuTheCoder</h5>
                <ul>
                <li><a class="grey-text text-lighten-3" href="http://smartlist.ga/">Smartlist</a></li>
                <li><a class="grey-text text-lighten-3" href="https://poll.rf.gd/">Dynamic Poll</a></li>
                <li><a class="grey-text text-lighten-3" href="http://todoapp.rf.gd/">Todolist</a></li>
                <li><a class="grey-text text-lighten-3" href="http://manuthecoder.github.io/">More!</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2021 Copyright
            <a class="grey-text text-lighten-4 right" href="http://manuthecoder.github.io/">About the developer</a>
        </div>
    </div>
    </footer>
</div>
<div id="bar" style="display:none"></div>
<div id="circle" style="display:none"></div>
<!-- Dropdown Structure --> 
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="javascript:void(0)" onclick="save()">Save</a></li>
    <li><a href="javascript:void(0)"onclick="document.getElementById('download').click()">Export HTML</a></li>
    <li><a href="javascript:void(0)" onclick="clearInterval(myVar);M.toast({html: 'Success!!'})">Turn off Autosave</a></li>
    <li><a href="javascript:void(0)"onclick="document.getElementById('checkbox').click();">Publish</a></li>
</ul>
<ul id='dropdown7' class='dropdown-content'>
    <li><a href="javascript:void(0)">Coming Soon!</a></li>
</ul>
<ul id='publish' class='dropdown-content'>
    <li><a href="javascript:void(0)">Publish website</a></li>
    <li><a>Publishing your website is a fun way to collaborate on code! Please use this tool respectfully. </a></li>
</ul>
<ul id='dropdown2' class='dropdown-content'>
    <li><a href="javascript:void(0)" onclick="clearInterval(myVar);M.toast({html: 'Success!!'})">Turn off Autosave</a></li>
    <li><a href="javascript:void(0)"onclick="document.getElementById('checkbox').click();">Dark Mode</a></li>
    <li><a href="javascript:void(0)"onclick="document.getElementById('download').click()">Export HTML</a></li>
</ul>
<ul id='dropdown3' class='dropdown-content'>
    <li><a href="javascript:void(0)"onclick="document.getElementById('checkbox').click();">Dark Mode!</a></li>
    <li><a href="#"onclick="halfitout()">Fullscreen</a></li>
</ul>
<ul id='dropdown5' class='dropdown-content'>
    <li><a href="http://developer.mozilla.org/"target="_blank">MDN</a></li>
    <li><a href="http://w3schools.com/"target="_blank">W3schools</a></li>
    <li><a href="https://dev.to"target="_blank">DEV.to</a></li>
    <li><a href="https://github.com"target="_blank">Github</a></li>
    <li><a href="https://stackoverflow.com"target="_blank">Stack Overflow</a></li>
    <li><a href="https://infinityfree.net/"target="_blank">InfinityFree</a></li>
</ul>
<ul id='dropdown6' class='dropdown-content'>
    <li><a href="javascript:void(0)"onclick="document.getElementById('checkbox').click();">Dark Mode!</a></li>
    <li><a href="javascript:void(0)"onclick="document.getElementById('checkbox').click();">Publish</a></li>
</ul>
<ul id='databases' class='dropdown-content'>
    <li><a href="https://www.w3schools.com/sql/trysql.asp?filename=trysql_op_in"target="_blank">W3Schools SQL tryit editor</a></li>
    <li><a href="https://sqliteonline.com/"target="_blank">Online SQL IDE</a></li>
</ul>
<ul id='dropdown4' class='dropdown-content'>
    <li><a href="javascript:void(0)" onclick='insert("<!DOCTYPE html>\n<html>\n<head>\n<title>Hello, World!</title>\n</head>\n<body>\nHello, World!\n</body>\n</html>")'>Basic HTML template <span class="badge new"></span></a></li>
    <li><a href="javascript:void(0)" onclick='insert("<script src=\"https://code.jquery.com/jquery-3.5.1.js\" integrity=\"sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=\" crossorigin=\"anonymous\"></script>")'>jQuery CDN</a></li>
    <li><a href="javascript:void(0)" onclick='insert("<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1\" crossorigin=\"anonymous\">\n<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW\" crossorigin=\"anonymous\"></script>")'>Bootstrap CDN</a></li>
    <li><a href="javascript:void(0)" onclick='insert("<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">")'>Materialize CDN</a></li>
    <li><a href="javascript:void(0)" onclick='insert("<link href=\"https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css\" rel=\"stylesheet\">")'>Tailwind CSS CDN</a></li>
</ul>
<div class="sidebar-icons fixed-left">
    <a class="waves-effect waves-light tooltipped"  data-position="right" data-tooltip="Home" href="https://webcode.rf.gd/">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
        <polyline points="16 18 22 12 16 6"></polyline>
        <polyline points="8 6 2 12 8 18"></polyline>
    </svg>
    </a>
    <a class="js-sample-1 waves-effect waves-light tooltipped" data-position="right" data-tooltip="Save (ALT A) or (CTRL S)" accesskey="a" href="javascript:void(0)" id="save" onclick="save()">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
        <polyline points="17 21 17 13 7 13 7 21"></polyline>
        <polyline points="7 3 7 8 15 8"></polyline>
    </svg>
    </a>
    <a href="#" class="waves-effect waves-light sidenav-trigger tooltipped" onclick="document.getElementById('console').scrollTop = document.getElementById('console').scrollHeight;" data-target="console" data-tooltip="Console" data-position="right"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg><span id="c_count" style="position: fixed;background: red;padding:0px 3px;color:white;margin-top:-10px;z-index:9999999999;border-radius: 99999px;margin-left: -10px;"></span></a>

    <a data-position="right" data-tooltip="Rerun" accesskey="q" href="javascript:void(0)" id="run" onclick="run()"class="waves-effect waves-light tooltipped">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play">
        <polygon points="5 3 19 12 5 21 5 3"></polygon>
    </svg>
    </a>
    <a href="#" class="waves-effect waves-light sidenav-trigger tooltipped" data-target="slide-out" data-position="right" data-tooltip="Libraries and frameworks">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
        <line x1="12" y1="22.08" x2="12" y2="12"></line>
    </svg>
    </a>
    <a href="#" onclick="halfitout()" class="tooltipped waves-effect waves-light" data-position="right" data-tooltip="Fullscreen!">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize-2">
        <polyline points="15 3 21 3 21 9"></polyline>
        <polyline points="9 21 3 21 3 15"></polyline>
        <line x1="21" y1="3" x2="14" y2="10"></line>
        <line x1="3" y1="21" x2="10" y2="14"></line>
    </svg>
    </a>
    <a href="#"  onclick="$('#code_res').modal('open');" class="tooltipped waves-effect waves-light" id="download" data-position="right" data-tooltip="Download">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
        <polyline points="7 10 12 15 17 10"></polyline>
        <line x1="12" y1="15" x2="12" y2="3"></line>
    </svg>
    </a>
    <!--<a href="#">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
    </a>-->
    <a href="#shortcuts" class="modal-trigger tooltipped waves-effect waves-light" data-position="right" data-tooltip="Keyboard Shortcuts">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command">
        <path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>
    </svg>
    </a>
    <a onclick="document.getElementsByTagName('form')[0].submit();"id="s121213223234" class="tooltipped waves-effect waves-light" data-position="right" data-tooltip="Upload to cloud &amp; share <?php if(isset($_GET['id'])) {echo "Click here to save your edits!";}?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
        <polyline points="16 16 12 12 8 16"></polyline>
        <line x1="12" y1="12" x2="12" y2="21"></line>
        <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
        <polyline points="16 16 12 12 8 16"></polyline>
    </svg>
    </a>
    <div class="theme-switch-wrapper" data-tooltip-right="Dark Mode">
    <label class="theme-switch" for="checkbox">
        <a href="javascript:void(0)" onclick="document.getElementById('checkbox').click();">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
            </svg>
        </a>
        <div style="opacity: 0;"> <input type="checkbox" id="checkbox"/> </div>
        <div class="slider round"></div>
    </label>
    </div>
</div>
<form method="POST" action="add.php">
    <input type="hidden" value="<?php echo $available_id;?>" name="id">
    <div class="nav"> <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown1'>File</a> 
    <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown2'>Edit</a> 
    <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown3'>View</a> 
    <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown4'>Insert</a> 
    <a class='dropdown-trigger btn btn-flat' href='#' data-target='dropdown6'>Tools</a> 
    <a class='dropdown-trigger btn btn-flat hide-on-small-only' href='#' data-target='databases'>Databases</a> 
    <a class='dropdown-trigger btn btn-flat hide-on-med-and-down' href='#' data-target='publish'>Publish</a> 
    <a class='dropdown-trigger btn btn-flat hide-on-med-and-down' href='#' data-target='dropdown5'>Quick Links</a> 
    <input name="name" class="hide-on-med-and-down" value="<?php if(!isset($_GET['id'])) { echo 'Code Snippet';} else {echo $name;} ?>" style="position:fixed;top:-5px;right:0;width: 200px;background: rgba(255,255,255,.1);padding: 0 10px !important;border: 0 !important;color:white;box-shadow: none !important;line-height: 1 !important;margin:0 !important;font-size: 15px !important;">
    </div>
    <div class="row">
    <div class="col s12 m6" id="half1">
        <ul class="tabs tabs-fixed-width">
            <li class="tab col s3"><a class="active"href="#test1" onclick="setTimeout(function(){ editor.refresh(); }, 0100);">HTML</a></li>
            <li class="tab col s3"><a href="#test2" onclick="setTimeout(function(){ css.refresh(); }, 0100);">CSS</a></li>
            <li class="tab col s3"><a href="#test4"onclick="setTimeout(function(){ js.refresh(); }, 0100);">JavaScript</a></li>
        </ul>
        <div id="test1" class="col s12"><textarea id="html" placeholder="HTML" name="html"></textarea><input type="submit" style="height:0;width:0;opacity:0;"></div>
        <div id="test2" class="col s12" onclick="css.focus();"><textarea id="css" placeholder="CSS" name="css"></textarea></div>
        <div id="test4" class="col s12"><textarea id="js" placeholder="JavaScript" name="js"></textarea></div>
</form>
</div>
<div class="col s12 m6" id="half2" style="border-left: 2px solid rgba(100,100,100,.5);">
<iframe id="code"></iframe>
</div>
</div>
<ul id="console" class="sidenav sidenav-console">
    <li><a href="#!" onclick="asdf()"><i class="material-icons">warning</i>Console</a></li>
    <div id="warnings"></div>
    <!--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>-->
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        
<ul id="slide-out" class="sidenav">
    <li><a><input id="search" Autocomplete="off" placeholder="Search frameworks, and libraries"></a></li>
    <li><a class="subheader">Click to copy CDN</a></li>
    <div id="packg">
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link href=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css&quot; rel=&quot;stylesheet&quot; integrity=&quot;sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl&quot; crossorigin=&quot;anonymous&quot;&gt;\n &lt;script src=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js&quot; integrity=&quot;sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;')">Bootstrap</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css&quot; integrity=&quot;sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==&quot; crossorigin=&quot;anonymous&quot; /&gt;')">Materialize CSS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css&quot; /&gt;')">Tailwind UI</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css&quot; /&gt;')">Tailwind CSS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js&quot; integrity=&quot;sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;')">jQuery</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.5/vue.cjs.js&quot;&gt;&lt;/script&gt;')">Vue</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/angular/11.2.0/core.umd.min.js&quot;&gt;&lt;/script&gt;')">Angular</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/react/17.0.1/umd/react.production.min.js&quot;&gt;&lt;/script&gt;')">React</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/tensorflow/3.0.0/tf.min.js&quot;&gt;&lt;/script&gt;')">Tensorflow</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdn.jsdelivr.net/npm/@tmcw/ml5@0.0.7-alpha3/dist/ml5.min.js&quot;&gt;&lt;/script&gt;')">ML5</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link rel=&quot;stylesheet&quot; href=&quot;https://material-design-pro.hostman.site/style.css&quot;&gt;')">Material Design Pro</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;')">Bootstrap</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js&quot; integrity=&quot;sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;')">Bootstrap 3</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/js/foundation.min.js&quot; integrity=&quot;sha512-9cXmvmK1gIDw3Tol6Xg/1SUls/CvBMgedu1aDjT519sQzy7jk+LoezyQqlzClW2LgXww4xEyuqtofg7PtWteLQ==&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;')">Foundation CSS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css&quot; /&gt;')">Bulma CSS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.16/js/uikit.min.js&quot;&gt;&lt;/script&gt;')">UIkit CSS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js&quot;&gt;&lt;/script&gt;')">Chart JS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/material-ui/4.11.3/index.js&quot;&gt;&lt;/script&gt;')">Material-UI</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css&quot; /&gt;')">Animate CSS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js&quot; integrity=&quot;sha512-FJ2OYvUIXUqCcPf1stu+oTBlhn54W0UisZB/TNrZaVMHHhYvLBV9jMbvJYtvDe5x/WVaoXZ6KB+Uqe5hT2vlyA==&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;')">Canvas JS</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.15.0/index.js&quot;&gt;&lt;/script&gt;')">Element UI</a></li>
    <li><a class="waves-effect" href="javascript:void(0)" onclick="copy('&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.4.4/vuetify.min.js&quot;&gt;&lt;/script&gt;')">Vuetify</a></li>
    <textarea type="text" value="Hello World" id="myInput" style="opacity:0" ></textarea>
    </div>
</ul>
<!--<script type="text/javascript" src="app.js"></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/xml/xml.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/css/css.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/javascript/javascript.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/htmlmixed/htmlmixed.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/addon/edit/closetag.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/addon/edit/closebrackets.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/addon/search/jump-to-line.js"></script>
<div id="code_res" class="modal">
    <div class="modal-content">
      <h4>Export/Copy your code:</h4>

  <ul class="collapsible">
    <li>
      <div class="collapsible-header">HTML</div>
      <div class="collapsible-body"><span id="code_res_html"></span></div>
    </li>
    <li>
      <div class="collapsible-header">CSS</div>
      <div class="collapsible-body"><span id="code_res_css"></span></div>
    </li>
    <li>
      <div class="collapsible-header">JavaScript</div>
      <div class="collapsible-body"><span id="code_res_js"></span></div>
    </li>
    <li>
      <div class="collapsible-header">Final Result</div>
      <div class="collapsible-body"><p id="code_res_p"></p></div>
    </li>
  </ul>
      
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  <script>
window.console = console;
</script>
<script>
    $(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#packg li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    $('.collapsible').collapsible();
    var i = 0;
    var txt = 'WebCode';
    var speed = 50;
    
    function typeWriter() {
    if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
    }
    var ia = 0;
    var txta = 'A modern code editor for professional web development!';
    var speedx = 50;
    
    function desc() {
    if (ia < txta.length) {
        document.getElementById("desc").innerHTML += txta.charAt(ia);
        ia++;
        setTimeout(desc, speedx);
    }
    }
    
        function halfitout() {
            $("#half2").toggleClass('m12');
            $("#half1").toggleClass('hide');
        }
            var html_value, css_val, js_val;
            var html_val_lstorage = localStorage["html"];
            var editor = CodeMirror.fromTextArea(document.getElementById("html"), {
                styleActiveLine: true,
                    lineNumbers: true,
                    matchBrackets: true,
                    autoCloseBrackets: true,
                    autoCloseTags: true,
                mode: "htmlmixed",
                extraKeys: {"Alt-F": "findPersistent"}
            });
            var css = CodeMirror.fromTextArea(document.getElementById("css"), {
                styleActiveLine: true,
                    lineNumbers: true,
                    matchBrackets: true,
                    autoCloseBrackets: true,
                mode: "css"
            });
            var js = CodeMirror.fromTextArea(document.getElementById("js"), {
                styleActiveLine: true,
                    lineNumbers: true,
                    matchBrackets: true,
                    autoCloseBrackets: true,
                mode: "javascript"
            });
            var doc = document.getElementById('code').contentWindow.document;
            function run() {
                html_value = editor.getValue();
                css_val = css.getValue();
                js_val = js.getValue();
                doc.open();
                doc.write("<style>" + css_val + "</style>" + html_value + "<script>" + js_val + "</scr"+"ipt><script>var console = { __on : {}, addEventListener : function (name, callback) { this.__on[name] = (this.__on[name] || []).concat(callback); return this; }, dispatchEvent : function (name, value) { this.__on[name] = (this.__on[name] || []); for (var i = 0, n = this.__on[name].length; i < n; i++) { this.__on[name][i].call(this, value); } return this; }, log: function () { var a = []; for (var i = 0, n = arguments.length; i < n; i++) { a.push(arguments[i]); } this.dispatchEvent(\"log\", a); } };</scr"+"ipt>");
                doc.close();
                bar();
                console.log("Running code...");
            }
            function showCode(){
            /*alert(editor.getValue());*/
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
                    console.log("CSS saved")} , false);
            document.getElementById("save").addEventListener("click", function (){
                    var user = js.getValue();
                    localStorage.setItem("js", user) ;
                    console.log("JS saved")} , false);
                    <?php
    if(isset($_GET['id'])) {
    $servername = "sql104.epizy.com";
    $username = "epiz_27081301";
    $password = "oGM667NEMc";
    $dbname = "epiz_27081301_WEB_CODE_IDE_DO_NOT_DELETE_THIS_EVER_IN_YOUR_LIFE";
    $id = $_GET['id'];
    try {$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM products WHERE id=".$id;
            $users = $dbh->query($sql);
            foreach ($users as $row) {
                echo "document.querySelector('.CodeMirror').CodeMirror.setValue(".json_encode($row['qty']).")\n";
                echo "document.querySelector('#test2 .CodeMirror').CodeMirror.setValue(".json_encode($row['price']).")\n";
                echo "document.querySelector('#test4 .CodeMirror').CodeMirror.setValue(".json_encode($row['javascript']).")";
            }
            $dbh = null;
        }
        catch (PDOexception $e) {
            echo "Error is: " . $e-> etmessage();
        }
    }
    else {
        echo 'document.querySelector(\'.CodeMirror\').CodeMirror.setValue(localStorage["html"])
    document.querySelector(\'#test2 .CodeMirror\').CodeMirror.setValue(localStorage["css"])
    document.querySelector(\'#test4 .CodeMirror\').CodeMirror.setValue(localStorage["js"])';
    }
    ?>
        
</script>
<script>
window.onerror = function(msg, url, linenumber) {
    //document.write('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    document.getElementById("warnings").insertAdjacentHTML("beforeend", '<li class="new_c"><a><b>'+msg+ '</b> | Line Number: '+linenumber + "</a></li>");
    document.getElementById('console').scrollTop = document.getElementById('console').scrollHeight;
    return true;
}
            /* Nothing much here.... It's nothing to do with the code editor/result*/
            document.getElementById("save").click();
    
    function insert(value) {
        document.getElementById("html").value += value;
        document.getElementById("html").focus();
    }
    var myVar = setInterval(function() {
        document.getElementById("save").click();
        run();
    }, 40000);
    var num;
    setInterval(function() {
num = $("#console").find("li").length;
if (num > 1) {
  //console.log(num);
  document.getElementById('c_count').innerHTML = num - 6;
}
    }, 1000);

    var setTimeoutv;
    
    function bar() {
        clearTimeout(setTimeoutv);
        document.getElementById("bar").style.display = "block";
        document.getElementById("circle").style.display = "block";
        setTimeoutv = setTimeout(function() {
            document.getElementById("bar").style.display = "none";
            document.getElementById("circle").style.display = "none";
            M.toast({
                html: 'Saved!'
            })
        }, 3000);
    }
    editor.setOption('theme', "xq-light");
            css.setOption('theme', "xq-light");
            js.setOption('theme', "xq-light");
    const sample1 = document.body.querySelector('.js-sample-1');
    const sample2 = document.body.querySelector('.js-sample-2');
    sample1.addEventListener('click', () => {
        bar();
    });
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);
        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
            editor.setOption('theme', "mbo");
            editor.refresh();
            css.setOption('theme', "mbo");
            css.refresh();
            js.setOption('theme', "mbo");
        }
    }
    
    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            editor.setOption('theme', "mbo");
            css.setOption('theme', "mbo");
            js.setOption('theme', "mbo");
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
            editor.setOption('theme', "xq-light");
            css.setOption('theme', "xq-light");
            js.setOption('theme', "xq-light");
        }
    }
    toggleSwitch.addEventListener('change', switchTheme, false);
    $(window).bind('keydown', function(event) {
        if (event.ctrlKey || event.metaKey) {
            switch (String.fromCharCode(event.which).toLowerCase()) {
                case 's':
                    event.preventDefault();
                    document.getElementById("save").click();
                    break;
                case 'q':
                    event.preventDefault();
                    document.getElementById("save").click();
                    setTimeout(function() {
                        window.close();
                    }, 10000);
                    break;
            case 'e':
                    event.preventDefault();
                    $(".sidenav").sidenav('open');
                    break;
                case 'r':
                    event.preventDefault();
                    document.getElementById("save").click();
                    document.getElementById("run").click();
                    break;
                case 'b':
                    event.preventDefault();
                    document.getElementById("run").click();
                    break;
            }
        }
    });
    $(document).keydown(function(e) {
    if (e.key === "Escape") { // escape key maps to keycode `27`
    $(".sidenav").sidenav('close');
    }
    });
    var toastHTML;
    function copy(data) {
    var copyText = document.getElementById("myInput");
    copyText.value = data;
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    toastHTML = "CDN link copied<br>" + HtmlEncode(document.getElementById("myInput").value);
    M.toast({html: toastHTML});
    $(".sidenav").sidenav('close');
    }
    var varx;
    /*
    function saveTextAsFile(textToWrite, fileNameToSaveAs)
    {
    varx = "<style>" + css.getValue(); + "</style>" + editor.getValue(); + "<scr"+"ipt>" + js.getValue(); + "</scr"+"ipt>";
    alert(varx);
    var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'}); 
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    if (window.webkitURL != null)
    {
    downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
    }
    else
    {
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    }    
    downloadLink.click();
    }*/
    function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}
function HtmlEncode(s)
{
  var el = document.createElement("div");
  el.innerText = el.textContent = s;
  s = el.innerHTML;
  return s;
}
var text, css_final_val, html_final_val, js_final_val, modal_text,modal_html_text;
// Start file download.
document.getElementById("download").addEventListener("click", function(){
    // Generate download of hello.txt file with some content
    css_final_val = css.getValue();
    html_final_val = editor.getValue();
    js_final_val = js.getValue();
    text = "<!--Created with Webcode (https://webcode.rf.gd/) on "+ new Date().toLocaleString()
+"-->\n<style>\n" + css_final_val + "\n</style>\n" + html_final_val + "\n<scr"+"ipt>\n" + js_final_val + "\n</scr"+"ipt>";
    modal_text = HtmlEncode(text);
    modal_html_text = HtmlEncode(html_final_val);
    modal_CSS_text = HtmlEncode(css_final_val);
    modal_JS_text = HtmlEncode(js_final_val);
    document.getElementById("code_res_p").innerHTML = modal_text;
    document.getElementById("code_res_html").innerHTML = modal_html_text;
    document.getElementById("code_res_css").innerHTML = modal_CSS_text;
    document.getElementById("code_res_js").innerHTML = modal_JS_text;
    var filename = "hello.html";
    
    download(filename, text);
}, false);
    $('.tooltipped').tooltip(); <?php if(isset($_GET['id'])) {?>$('.sidebar-icons a#s121213223234').tooltip('open');setTimeout(function(){ $('.sidebar-icons a#s121213223234').tooltip('close'); }, 3000);
    <?php } ?>$('.sidenav').sidenav();$('.tabs').tabs({swipeable:false}); $('.dropdown-trigger').dropdown({ coverTrigger: false });
    
    const showMsga = localStorage.getItem('showMsga');
    
    if(showMsga !== 'false'){
    $('.alert').show();
    }
    
    $('.closebtn').on('click', function(){
    $('.alert').fadeOut('slow');
    localStorage.setItem('showMsga', 'false');
    }); 
    var iframe = document.getElementById('code');
iframe.contentWindow.console.addEventListener("log", function (value) {
  console.log.apply(null, value);
});
</script>
<?php 
    if(isset($_GET['new'])) {?>
<div id="modal1" class="modal">
    <div class="modal-content">
    <h4>Share this with others!</h4>
    <p>By doing so, you agree to our terms and conditions. Please use this tool respectfully. PHP code will be ommitted, and <b>will not</b> be stored in the SQL database. Any attempts to violate these regulations will result in a block of your IP</p>
    <input value="https://webcode.rf.gd/public/<?php echo $_GET['id'];?>">
    </div>
    <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">ok</a>
    </div>
</div>
<script>$('.modal').modal({dismissible: false });$('#modal1').modal('open');</script>
<?php } else {?>
<div id="shortcuts" class="modal">
    <div class="modal-content">
    <h4>Keyboard Shortcuts!</h4>
    <p>CTRL S - Save</p>
    <p>CTRL Q - Save</p>
    <p>CTRL B - Refresh code</p>
    <p>CTRL R - Save and force reload page</p>
    <p>CTRL E - Open Extensions</p>
    </div>
    <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">ok</a>
    </div>
</div>
<script>$('.modal').modal({dismissible: false });</script>
<?php }?>