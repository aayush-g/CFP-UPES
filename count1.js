	function addr()
		{
		var l=document.getElementById("l").value;
		var p=document.getElementById("p").value;
		var t=document.getElementById("t").value;
		var e=document.getElementById("e").value;
		var r=document.getElementById("r").value;

		
		var table=document.getElementById("myTable");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='l"+table_len+"'>"+l+"</td><td id='p"+table_len+"'>"+p+"</td><td id='t"+table_len+"'>"+t+"</td><td id='e"+table_len+"'>"+e+"</td><td id='r"+table_len+"'>"+r+"</td></tr>";
 
			document.getElementById("l").value="";
			document.getElementById("p").value="";
			document.getElementById("t").value="";
			document.getElementById("e").value="";
			document.getElementById("r").value="";

			}

