<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
        <script src="jquery.content.js"></script> 
        <title>Zadanie</title>
        <script>
            $(document).ready(function(){
                $.content('Menu.php?json');
            });
        </script>
    </head>
    <body>
        <div id="content">
            <div id="menu"><?php require('Menu.php');?></div>
            <div id="file"></div>
        </div>
    </body>
</html>

