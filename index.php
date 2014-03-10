<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=624">
<title>MathQuill Editor Demo</title>
<link rel="stylesheet" type="text/css" href="editor.css">
<link rel="stylesheet" type="text/css" href="mathquill.css">
</head>

<body>
<div id="body">
<?php
session_start();
$file = fopen("key.txt", "r+");
$password = trim(fread($file, 100));
fclose($file);
$hash = md5('dgtaergsdfgsrybstrybnybdfg'.$password); 
$self = $_SERVER['REQUEST_URI'];
$lf = 0;
// logout
if(isset($_GET['logout'])) {
  unset($_SESSION['login']);
  $lf = 0;
}

// logged in
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {
  $lf = 1;?>
  <div id="logout">
  <a href="?logout=true">Logout</a></div><br>
<?php
}

// check key
else if (isset($_POST['submit'])) {
  if ($_POST['password'] == $password){	
    $_SESSION["login"] = $hash;
    header("Location: $_SERVER[PHP_SELF]");		
  } else {
    display_login_form("Key is invalid");
  }	

// show key prompt
} else { 
  display_login_form("");
}

function display_login_form($st){ ?>
  <form id="key" action="<?php echo $self;?>" method='post' autocomplete='off'>
  <label for="password">Key: </label><input type="password" name="password" id="password">
  <input type="submit" name="submit" value="" style="display:none">
  <?php echo $st?>
  </form><br>
<?php } 

function load($fn) {
    $file = fopen($fn, "r+");
    $fr = fread($file, 100000);
    fclose($file);
    echo $fr;
}
?>

<h2>Some Calculus Exercises - Solutions can be typed with MathQuill</h2>
<p>
<div id="mq1" class="mathquill-textbox"><?php load("mq1.tex");?></div>
</p>

<p>
<div id="mq2" class="mathquill-textbox"><?php load("mq2.tex");?></div>
</p>
</div>
<script type="text/javascript" src="jquery-1.7.2.js"></script>
<script type="text/javascript" src="mathquill.js"></script>
<script type="text/javascript">
var previousKeyCode=0;
(function () {
  function save(fname,latex){
  //console.log("SAVE: "+fname+latex);
   if (document.getElementById("logout")!=null)
    $.ajax({
      type: 'POST',
      url: 'save.php',
      data: {id:fname, c:latex},
      success: function(e){document.getElementById("saved"+fname).innerHTML=e;}
    });
  }

  window.onload = function() {
    var mqt = document.getElementsByClassName('mathquill-textbox'), id;
    for (var i=0;i<mqt.length;i+=1) {
      $(mqt[i]).keydown(function(event) {
        document.getElementById("saved"+this.id).innerHTML="Type $ to enter math, Ctrl-s or .s to save";
console.log(previousKeyCode);
        if((event.ctrlKey||previousKeyCode == 190) && event.keyCode == 83) { 
          event.preventDefault(); 
          //$(this).cursor.backspace();
          save($(this).attr('id'),$(this).mathquill('latex'));
        }
        previousKeyCode = event.keyCode;
      });
      if (document.getElementById("logout")!=null)
        $(mqt[i]).after('<span id="saved'+mqt[i].id+'">Type $ to enter math, Ctrl-S or .s to save</span>');
      else $(mqt[i]).after('<span id="saved'+mqt[i].id+'">Type $ to enter math. Enter a valid Key to save changes.</span>');
    }
  }
})();
</script>
</body>
</html>
