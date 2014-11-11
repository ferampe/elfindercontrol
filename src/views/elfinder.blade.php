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
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : '<?=route("elfinderConnector")?>',  // connector URL (REQUIRED)
					lang: '<?=$lang?>',     // language (OPTIONAL)
					dialog: {width: 900, modal: true, title: 'Select a file'},
	                resizable: false,
	                commandsOptions: {
	                    getfile: {
	                        oncomplete: 'destroy',               
	                        multiple : <?=$multiple?>
	                    }
	                },
	                getFileCallback: function (file) {

	                    if(<?=$multiple?>)
	                    {
	                        window.opener.multipleFiles(file , '<?=$input_id?>');
	                        window.close();
	                        
	                    }else{               
	                        window.opener.singleFile(file, '<?=$input_id?>');
	                        window.close();
	                       
	                    }
	                    

	                }
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
