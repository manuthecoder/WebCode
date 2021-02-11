$(document).ready(function() {
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#packg li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

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
    mode: "htmlmixed",
    extraKeys: {
        "Alt-F": "findPersistent"
    }
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
    doc.write("<style>" + css_val + "</style>" + html_value + "<script>" + js_val + "</scr" + "ipt>");
    doc.close();
    bar();
}

function showCode() {
    /*alert(editor.getValue());*/
}
showCode();

function save() {}
document.getElementById("save").addEventListener("click", function() {
    var user = editor.getValue();
    /*localStorage["html"] = user ;*/
    localStorage.setItem("html", user);
    /*alert(editor.getValue());*/
    console.log("HTML saved")
}, false);
document.getElementById("save").addEventListener("click", function() {
    var user = css.getValue();
    localStorage.setItem("css", user);
    console.log("HTML saved")
}, false);
document.getElementById("save").addEventListener("click", function() {
    var user = js.getValue();
    localStorage.setItem("js", user);
    console.log("HTML saved")
}, false);
echo 'document.querySelector(\'.CodeMirror\').CodeMirror.setValue(localStorage["html"])
document.querySelector(\'#test2 .CodeMirror\').CodeMirror.setValue(localStorage["css"])
        document.querySelector(\'#test4 .CodeMirror\').CodeMirror.setValue(localStorage["js"])'; window.onerror = function(msg, url, linenumber) {
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
            const sample1 = document.body.querySelector('.js-sample-1');
            const sample2 = document.body.querySelector('.js-sample-2'); sample1.addEventListener('click', () => {
                bar();
            });
            const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
            const currentTheme = localStorage.getItem('theme');
            if (currentTheme) {
                document.documentElement.setAttribute('data-theme', currentTheme);
                if (currentTheme === 'dark') {
                    toggleSwitch.checked = true;
                    editor.setOption('theme', "material");
                    editor.refresh();
                    css.setOption('theme', "material");
                    css.refresh();
                    js.setOption('theme', "material");
                }
            }

            function switchTheme(e) {
                if (e.target.checked) {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    editor.setOption('theme', "material");
                    css.setOption('theme', "material");
                    js.setOption('theme', "material");
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    editor.setOption('theme', "default");
                    css.setOption('theme', "default");
                    js.setOption('theme', "default");
                }
            }
            toggleSwitch.addEventListener('change', switchTheme, false); $(window).bind('keydown', function(event) {
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
                        case 'r':
                            event.preventDefault();
                            document.getElementById("save").click();
                            location.reload();
                            break;
                        case 'b':
                            event.preventDefault();
                            document.getElementById("run").click();
                            break;
                    }
                }
            });
            var varx;

            function saveTextAsFile(textToWrite, fileNameToSaveAs) {
                html_value = editor.getValue();
                css_val = css.getValue();
                js_val = js.getValue();
                varx = "<style>" + css_val + "</style>" + html_value + "<scr" + "ipt>" + js_val + "</scr" + "ipt>";

                var textFileAsBlob = new Blob([textToWrite], {
                    type: 'text/plain'
                });
                var downloadLink = document.createElement("a");
                downloadLink.download = fileNameToSaveAs;
                downloadLink.innerHTML = "Download File";
                if (window.webkitURL != null) {
                    downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
                } else {
                    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
                    downloadLink.onclick = destroyClickedElement;
                    downloadLink.style.display = "none";
                    document.body.appendChild(downloadLink);
                }

                downloadLink.click();
            }
