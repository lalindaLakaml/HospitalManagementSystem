<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Session Variable</title>
</head>
<body>
    <h1>Read Session Variable</h1>
    <input type="text" id="sessionValueInput" placeholder="Session Value">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Send AJAX request to fetch session variable
            setSessionVariable() 
            $.ajax({
                url: "fetch_session.php",
                type: "GET",
                success: function(response) {
                    // Set the value of the input field to the session variable value
                    $('#sessionValueInput').val(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching session variable:", error);
                }
            });
        });
    </script>
    
    <script>
    	function setSessionVariable() {
    	var sectionValue = "your_section_value"; // Specify the section value you want to set

    // Send an AJAX request to the server-side script to set the session variable
	    $.ajax({
	        url: "set_session.php",
	        type: "POST",
	        data: { section: sectionValue },
	        success: function(response) {
	            console.log("Session variable set successfully");
	        },
	        error: function(xhr, status, error) {
	            console.error("Error setting session variable:", error);
	        }
	    });
}

    
    </script>
    
    
</body>
</html>
