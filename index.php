<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
            function ajaxpage(url, id) {
                var page_request = new XMLHttpRequest()
                page_request.onreadystatechange = function() {
                    loadpage(page_request, id)
                }
                page_request.open('GET', url, true)
                page_request.send(null)
            }

            function loadpage(page_request, id) {
                if (page_request.readyState == 4 && (page_request.status == 200 || window.location.href.indexOf("http") == -1))
                    document.getElementById(id).innerHTML = page_request.responseText
            }
        </script>
    </head>
    <body>
        <?php
        $dir = 'C:\\xampp\\htdocs\\RacingLifeTest';
        foreach (new DirectoryIterator($dir) as $file) {
            if (!$file->isDot()) {
                if (preg_match('/\b.html\b/i', $file->getFilename())) {
                    echo '<a href="javascript:ajaxpage(\'' . $file->getFilename() . '\', \'here\');"">' . str_replace('.html', '', $file->getFilename()) . '</a><br />';
                }
            }
        }
        ?>
        </br>
        <div id="here"></div>
    </body>
</html>
