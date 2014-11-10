<input type="button" value="Finde Images" onclick='window.open("{{ route("elFinderMultiple", "images") }}", "", "height=500,width=950")'>
<br />
<textarea id='images' name='images' rows="9" cols="50"></textarea>

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