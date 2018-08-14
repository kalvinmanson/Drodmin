@extends('layouts.blank')

@section('content')
<div class="container-fluid">
  <script>
          // Helper function to get parameters from the query string.
          function getUrlParam( paramName ) {
              var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
              var match = window.location.search.match( reParam );

              return ( match && match.length > 1 ) ? match[1] : null;
          }
          // Simulate user action of selecting a file to be returned to CKEditor.
          function returnFileUrl() {

              var funcNum = getUrlParam( 'CKEditorFuncNum' );
              var fileUrl = '/path/to/file.txt';
              window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
              window.close();
          }
      </script>
      <button onclick="returnFileUrl()">Select File</button>
</div>


@endsection
