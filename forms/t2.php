<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record to Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table id="myTable">
    <thead>
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
            <th>Header 3</th>
        </tr>
    </thead>
   
</table>

<button onclick="addRow()">Add Record</button>

<script>
    function addRow() {
        // Get the table reference by ID
        var table = document.getElementById("myTable");

        // Create a new row and cells
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);

        // Set the content of the cells (you can customize this part)
        cell1.innerHTML = "New Row, Cell 1";
        cell2.innerHTML = "New Row, Cell 2";
        cell3.innerHTML = "New Row, Cell 3";
    }
</script>

</body>
</html>