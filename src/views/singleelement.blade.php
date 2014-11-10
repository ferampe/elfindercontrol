<input type="button" value="Finde Image" onclick='window.open("{{ route("elFinderSingle", "image") }}", "", "height=500,width=950")'>

<input type='text' id='image' name='image' value=''>

<script>
	function singleFile(file, obj)
	{		
	    document.getElementById(obj).value = file.path;	    
	}
</script>