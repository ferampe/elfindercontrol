<input type="button" value="{{ $parameter['button_text'] }}" onclick="window.open('{{ route('elFinderMultiple', $parameter['input_name']) }}', '', 'height=500,width=950')">
<br />
<textarea id='{{ $parameter["input_name"] }}' name='{{ $parameter["input_name"] }}' rows="9" cols="50"></textarea>

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