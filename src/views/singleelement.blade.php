<input type="button" value="Finde Image" onclick='window.open("{{ route("elFinderSingle", $input_name) }}", "", "location=0,height=500,width=950").focus()'>
<input type='text' id='{{ $input_name }}' name='{{ $input_name }}' value=''>


<script>

	function singleFile(file, obj)
	{		
	    document.getElementById(obj).value = file.path;	    
	}
</script>


