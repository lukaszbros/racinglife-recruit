<?php   
$fileList = array();
if ($handle = opendir('.')) 
{
  while (false !== ($filename = readdir($handle)))
  {  
      $file = pathinfo($filename);
      if (array_key_exists("extension", $file) && $file["extension"] == "html")
      {
          array_push($fileList, $file);
      }
  }             
  closedir($handle);
}
asort($fileList);   
?>
    
<!doctype html>
<html>
<head>

<style type="text/css">
  a.menu { text-decoration: none; background-color: GreenYellow; color: Green; margin: 5px; padding: 3px; border: 1px solid Green; }
    a.menu:hover { text-decoration: underline; }
  a.menu.on { text-decoration: underline; background-color: yellow; }
  div.included { border: 1px solid black; margin: 20px; padding: 20px; }
</style>

</head>
<body>

      <? foreach($fileList as $fileItem) { ?>
        <a class="menu" href="<?=$fileItem['basename']?>"><?=$fileItem['filename']?></a>
      <? } ?>
      
      <div id="included" class="included" style="display: none;">
        
      </div>
      
</body>       

<script type="text/javascript">
  var menu = document.querySelectorAll("a.menu");
  
  for(var i = 0; i < menu.length; i++)
  {
    menu[i].onclick = function(event){
      ClearMenu();
      this.className += " on";  
      
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          var included = document.getElementById("included"); 
          included.style.display = "block";
          included.innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET",this.href,true); 
      xmlhttp.send();
      event.preventDefault();
    };
  }
  function ClearMenu()
  {
    var menu = document.querySelectorAll("a.menu.on");

    for(var i = 0; i < menu.length; i++)
    {
      menu[i].className = "menu";
    }
  }
</script>

</html>