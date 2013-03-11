(function( $ ) {

    /**
     * Change content of page
     *
     * @param filename
     */
    function changeContent( filename ) {
        $('.content').load( filename.replace(/[^\w]/, '') + '.html' );
    }

    /**
     * Get name of file from hash
     *
     * @return {String}
     */
    function getFilenameFromHash() {
        return location.hash.substr( 1 );
    }

    /**
     * Load data on start if hash provided. Register event listener on hash change.
     */
    $(document).ready(function() {

        if( location.hash ) {
            changeContent( getFilenameFromHash() );
        }

        $(window).on('hashchange', function() {

            changeContent( getFilenameFromHash() );
        });
    });

})( jQuery );