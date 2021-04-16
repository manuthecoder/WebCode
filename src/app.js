window.onerror = function(msg, url, linenumber) {
  alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
  return true;
}
$(document).ready(function(){
    $('.tabs').tabs();
    $('.tooltipped').tooltip();
    $('.modal').modal({endingTop: '50%'});
    $('.sidenav').sidenav();
});
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
  function HtmlEncode(s)
{
  var el = document.createElement("div");
  el.innerText = el.textContent = s;
  s = el.innerHTML;
  return s;
}
function run() {
  var doc = document.getElementById('result').contentWindow.document;
  doc.open();
  html_value = editor.getValue();
  css_val = css.getValue();
  js_val = js.getValue();
  doc.open();
  doc.write("");
  doc.close();
  doc.open();
  doc.write("<style>" + css_val + "</style>" + html_value + "<script>" + js_val + "</scr"+"ipt>");
  doc.close();
}
window.onscroll = function () { window.scrollTo(0, 0); };
$(window).bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
            case 's':
                event.preventDefault();
                save_p();
                break;
                case 'r':
                event.preventDefault();
                run();
                break;
        }
    }
});
$('iframe').bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
            case 's':
                event.preventDefault();
                save_p();
                break;
                case 'r':
                event.preventDefault();
                run();
                break;
        }
    }
});
function fullscreen() {
  document.getElementById('s1').classList.toggle('s0')
  document.getElementById('s2').classList.toggle('s12')
}

var theme = 'light';
if(localStorage.getItem('theme')) {
  theme = localStorage.getItem('theme');
}
$(document).ready(function() {
if(localStorage.getItem('theme') == 'dark') {
    document.documentElement.setAttribute('data-theme', 'dark');
    editor.setOption('theme', 'material');
    css.setOption('theme', 'material');
    js.setOption('theme', 'material');
  }
  else {
    document.documentElement.setAttribute('data-theme', 'light');
    editor.setOption('theme', 'base16-light');
    css.setOption('theme', 'base16-light');
    js.setOption('theme', 'base16-light');
  }
});
$(document).keydown(function(e) {
     if (e.key === "Escape") { // escape key maps to keycode `27`
        $('.sidenav').sidenav('close');
    }
});
function dark_mode() {
  if(theme == 'dark') {
    theme = 'light';
    document.documentElement.setAttribute('data-theme', 'light');
    editor.setOption('theme', 'base16-light');
    css.setOption('theme', 'base16-light');
    js.setOption('theme', 'base16-light');
    localStorage.setItem('theme', 'light')
  }
  else {
    theme = 'dark';
    document.documentElement.setAttribute('data-theme', 'dark');
    editor.setOption('theme', 'material');
    css.setOption('theme', 'material');
    js.setOption('theme', 'material');
    localStorage.setItem('theme', 'dark')
  }
}

function saveTextAsFile(e)
{
    var textToWrite = e;
    var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
    var fileNameToSaveAs = 'index.html';

    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    if (window.webkitURL != null)
    {
        // Chrome allows the link to be clicked
        // without actually adding it to the DOM.
        downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
    }
    else
    {
        // Firefox requires the link to be added to the DOM
        // before it can be clicked.
        downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
        downloadLink.onclick = destroyClickedElement;
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
    }

    downloadLink.click();
}
function save_as_file() {
    var css_final_val = css.getValue();
    var html_final_val = editor.getValue();
    var js_final_val = js.getValue();
    var text = "<!--Created with Webcode (https://webcode.rf.gd/) on "+ new Date().toLocaleString()
+"-->\n<style>\n" + css_final_val + "\n</style>\n" + html_final_val + "\n<scr"+"ipt>\n" + js_final_val + "\n</scr"+"ipt>";
    var filename = "hello.html";
    saveTextAsFile(text);
    M.toast({html: 'Downloaded "index.html"'});
}
// saveTextAsFile(1234);
