<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Input Text to Table Dynamically</title>
</head>
<body>
	<button onclick="addRow()">Add Row</button>
    <table id="myTable" border="1">
       
    </table>
    <br>
    

    <script>
    
    function addRow() {
	    var table = document.getElementById("myTable");
	    var row = table.insertRow(table.rows.length);
	    
	        var cell = row.insertCell(0);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.name = "row-" + (table.rows.length) + "-col-" + (0 + 1);
	        input.value = "Enter something";
	        cell.appendChild(input);
	        
	        
	       	var cell = row.insertCell(1);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.name = "row-" + (table.rows.length) + "-col-" + (1 + 1);
	        input.value = "Enter something";
	        cell.appendChild(input);

    	
    	
		    var deleteButtonCell = row.insertCell(2);
		    var deleteButton = document.createElement("button");
		    deleteButton.innerHTML = "Delete";
		    deleteButton.setAttribute("onclick", "deleteRow(this)");
		    deleteButtonCell.appendChild(deleteButton);
	}

	function deleteRow(button) {
	    var row = button.parentNode.parentNode;
	    row.parentNode.removeChild(row);
	}

    
    </script>
</body>
</html>
