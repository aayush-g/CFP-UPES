	function addr()
		{
		var m=document.getElementById("m").value;
		var l=document.getElementById("l").value;
		var s=document.getElementById("s").value;
		var a=document.getElementById("a").value;
		var t=document.getElementById("t").value;
		var q=document.getElementById("q").value;
		
		var table=document.getElementById("myTable");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='m"+table_len+"'>"+m+"</td><td id='l"+table_len+"'>"+l+"</td><td id='s"+table_len+"'>"+s+"</td><td id='a"+table_len+"'>"+a+"</td><td id='t"+table_len+"'>"+t+"</td><td id='q"+table_len+"'>"+q+"</td></tr>";
 
			document.getElementById("m").value="";
			document.getElementById("l").value="";
			document.getElementById("s").value="";
			document.getElementById("a").value="";
			document.getElementById("t").value="";
			document.getElementById("q").value="";
			}

