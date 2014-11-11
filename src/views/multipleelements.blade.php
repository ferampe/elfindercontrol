<input type="button" value="Finde Images" onclick='window.open("{{ route("elFinderMultiple", $input_name) }}", "", "height=500,width=950")'>
<br />
<textarea id='{{ $input_name }}' name='{{ $input_name }}' rows="9" cols="50"></textarea>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script>
	function multipleFiles(files, obj)
	{	
		var pathsx = "";
		for (var key in files)
		{
			console.log(files[key].path);
			pathsx = pathsx + files[key].path + '\n';			
		}

		document.getElementById(obj).value = pathsx;
		console.log(JSON.stringify(files));	    
	}
</script>