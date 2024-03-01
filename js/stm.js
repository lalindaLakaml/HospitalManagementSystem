function loadPhp(file) {
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
           document.getElementById("con").innerHTML = this.responseText;
       	}
    };
    xhttp.open("GET", file, true);
    xhttp.send();
}

function tt(){
	
	
	var mySelect1 = document.getElementById("re"); 
	mySelect1.selectedIndex = parseInt(document.getElementById('h_rel').value);
	
	var mySelect2 = document.getElementById("gend"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_gen').value);

	var mySelect2 = document.getElementById("na"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_nat').value);


	var mySelect2 = document.getElementById("type"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_stty').value);

	var mySelect2 = document.getElementById("cls"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_stcl').value);

	var mySelect2 = document.getElementById("pa"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_par').value);
	
	var mySelect2 = document.getElementById("cl"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_stcl').value);

	var mySelect2 = document.getElementById("ho"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_hou').value);
	
	var mySelect2 = document.getElementById("me"); 
	mySelect2.selectedIndex = parseInt(document.getElementById('h_med').value);


	

	document.getElementById('id').value = document.getElementById('h_id').value;
	document.getElementById('name').value = document.getElementById('h_name').value;
	document.getElementById('a1').value = document.getElementById('h_ad1').value;
	document.getElementById('a2').value = document.getElementById('h_ad2').value;
	//document.getElementById('a3').value = document.getElementById('h_ad3').value;
	

	
	var dateString = document.getElementById('h_dob').value;	
	var dateObj = new Date(dateString);
	var formattedDate = dateObj.toISOString().split('T')[0];
	document.getElementById("do").value = formattedDate;


	var dateString_1 = document.getElementById('h_adm').value;	
	var dateObj_1 = new Date(dateString_1);
	var formattedDate_1 = dateObj_1.toISOString().split('T')[0];
	document.getElementById("ad").value = formattedDate_1;

	
	}


function myClose(id) {
	alert(id);
	setSessionVariable() 	 		
  	window.close();
  			
}

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



      
      
function test(){
				
	pass = window.document.getElementById("txtPassword").value;
    conf = window.document.getElementById("txtConfirm").value;
            
    if(pass==conf){
          	return true;
        }else{
        alert("Password and confirm password are not match");
       		return false; 
       }
       
}



