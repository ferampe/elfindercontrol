<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="{{ asset($asset_path.'/js/plugins/jquery-ui.css') }}">
		<script src="{{ asset($asset_path.'/js/plugins/jquery.min.js') }}"></script>
		<script src="{{ asset($asset_path.'/js/plugins/jquery-ui.min.js') }}"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="{{ asset($asset_path.'/css/elfinder.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ asset($asset_path.'/css/theme.css')}}">

		<!-- elFinder JS (REQUIRED) -->
		<script src="{{ asset($asset_path.'/js/elfinder.min.js')}}"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script src="{{ asset($asset_path.'/js/i18n/elfinder.'.$lang.'.js')}}"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Helper function to get parameters from the query string.
		    function getUrlParam(paramName) {
		        var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
		        var match = window.location.search.match(reParam) ;

		        return (match && match.length > 1) ? match[1] : '' ;
		    }

		    $().ready(function() {
		        var funcNum = getUrlParam('CKEditorFuncNum');

		        var elf = $('#elfinder').elfinder({
		            url : '<?=route("elfinderConnector")?>',
		            lang: '<?=$lang?>',
		            getFileCallback : function(file) {		                
		                window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
		                window.close();
		            },
		            resizable: false
		        }).elfinder('instance');
		    });
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
