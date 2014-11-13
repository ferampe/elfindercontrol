<input type="button" value="{{ $parameter['button_text'] }}" onclick="window.open('{{ route('elFinderSingle', $parameter['input_name']) }}', '', 'location=0,height=500,width=950').focus()">
<input type="text" id="{{ $parameter['input_name'] }}" name="{{ $parameter['input_name'] }}" value="">

<script>

	function singleFile(file, obj)
	{		
	    document.getElementById(obj).value = file.path;	    
	}
</script>

