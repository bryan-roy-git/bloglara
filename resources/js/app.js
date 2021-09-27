require('./bootstrap');
const ClassicEditor = require( '@ckeditor/ckeditor5-build-classic' )

ClassicEditor
    .create( document.querySelector( '#content' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );