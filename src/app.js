function compile() {
  var html = editor.getValue();
  var css = document.getElementById("css");
  var js = document.getElementById("js");
  var code = document.getElementById("code").contentWindow.document;

  document.body.onkeyup = function() {
    code.open();
    code.writeln(
      "" +
        html +
        "<style>" +
        css.value +
        "</style>" +
        "<script>" +
        js.value +
        "</script>"
    );
    code.close();
  };
}

compile();

//check if "html" is in localStorage

if (localStorage["html"])
{
    var user = localStorage["html"] ;
    document.getElementById("html").value = user ;
    //alert("you are already a html")
}
else
{
    document.getElementById("html").placeholder = "HTML" ;
    console.log("user no found in localStorage")
}

//save entered gmail address
document.getElementById("save").addEventListener("click", function ()
    {
        var user = document.getElementById("html").value ;
        //localStorage["html"] = user ;
        localStorage.setItem("html", user) ;
       // alert("gmail id saved") ;
        console.log("gmail id saved")
    } , false);


    
if (localStorage["css"])
{
    var user = localStorage["css"] ;
    document.getElementById("css").value = user ;
    //alert("you are already a html")
}
else
{
    document.getElementById("css").placeholder = "CSS" ;
    console.log("user no found in localStorage")
}

//save entered gmail address
document.getElementById("save").addEventListener("click", function ()
    {
        var user = document.getElementById("css").value ;
        //localStorage["html"] = user ;
        localStorage.setItem("css", user) ;
       // alert("gmail id saved") ;
        console.log("gmail id saved")
    } , false);


    
    
if (localStorage["js"])
{
    var user = localStorage["js"] ;
    document.getElementById("js").value = user ;
    //alert("you are already a html")
}
else
{
    document.getElementById("js").placeholder = "JS" ;
    console.log("user no found in localStorage")
}

//save entered gmail address
document.getElementById("save").addEventListener("click", function ()
    {
        var user = document.getElementById("js").value ;
        //localStorage["html"] = user ;
        localStorage.setItem("js", user) ;
       // alert("gmail id saved") ;
        console.log("gmail id saved")
    } , false);