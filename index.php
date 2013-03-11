<link rel='stylesheet' type='text/css' href='x/css/style.css' />
<script type="text/javascript" src="x/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="x/js/main.js"></script>


<?php

function escape( $_str ) {
    return htmlspecialchars( $_str, ENT_QUOTES, 'UTF-8' );
}

$files = glob('*.html');

?>

<div class="menu">
    <?php foreach( $files as $file ) :
        $name = substr( $file, 0, strrpos( $file, '.' ) );
    ?>

        <a href="#<?php echo escape( $name ) ?>">
            <?php echo escape( $name ) ?>
        </a>

    <?php endforeach; ?>
</div>

<div class="content">
    main page
</div>