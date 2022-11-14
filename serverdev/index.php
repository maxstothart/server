
<!DOCTYPE html>
<html>
<head>
    <style>
        #popup { display: none; position: fixed; top: 12%; left: 15%; width: 70%; height: 70%; background-color: white; z-index: 10; }
#popup iframe { width: 100%; height: 100%; border: 0; }
#popupdarkbg { position: fixed; z-index: 5; left: 0; top: 0; width: 100%; height: 100%; overflow: hidden; background-color: rgba(0,0,0,.75); display: none; }
    </style>
    <script src="/scripts/snippet-javascript-console.min.js?v=1"></script>
</head>
<body>
    <div id="main">
<a href="windmill-inc.com" id="link">Click me</a><br>
</div>

<div id="popup"><iframe id="popupiframe"></iframe></div>
<div id="popupdarkbg"></div>
    <script type="text/javascript">
        document.getElementById("link").onclick = function(e) {
  e.preventDefault();
  document.getElementById("popupdarkbg").style.display = "block";
  document.getElementById("popup").style.display = "block";
  document.getElementById('popupiframe').src = "http://windmill-inc.com";
  document.getElementById('popupdarkbg').onclick = function() {
      document.getElementById("popup").style.display = "none";
      document.getElementById("popupdarkbg").style.display = "none";
  };
  return false;
}

window.onkeydown = function(e) {
    if (e.keyCode == 27) {
      document.getElementById("popup").style.display = "none";
      document.getElementById("popupdarkbg").style.display = "none";
      e.preventDefault();
      return;
    }
}
    </script>
</body>
</html>