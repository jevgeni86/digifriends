<script>


function createDb() {

	showSpinner();
	showHint("Creating database ...");

	var user = document.getElementById("db_user").value;
	var pass = document.getElementById("db_pass").value;

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == 0){
				showHint("Successfully created database. Will reload in 3 seconds.");
				setTimeout(function () {
					document.location.href = "./index.php";
				}, 3000);
				
			}else{
				showHint("There has been a problem creating the database. Please check if mysql server is running and you are using the correct credentials.");
				hideSpinner();
			}
			
		}
	};
	xmlhttp.open("GET", "create_db.php?user="+user+"&pass="+pass, true);
	xmlhttp.send();
    
}

function dropDb(){
	if (!confirm("This will delete your database and revert to intitial setup. Do you want to continue ?")){
		return;
	}
	
	showSpinner();
	showHint("Deleting database ...");

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == 0){
				showHint("Successfully deleted database. Will reload in 3 seconds.");
				setTimeout(function () {
					document.location.href = "./index.php";
				}, 3000);
				
			}else{
				showHint("There has been a problem deleting the database. Please check if mysql server is running.");
				hideSpinner();
			}
			
		}
	};
	xmlhttp.open("GET", "drop_db.php", true);
	xmlhttp.send();
}

function showHint(str){
	document.getElementById("hint").innerHTML = str;
}

function showSpinner(){
	document.getElementById("spinner").style.visibility = "visible";
}

function hideSpinner(){
	document.getElementById("spinner").style.visibility = "hidden";
}

function insertNumber(){

	document.getElementById("spinner").style.visibility = "visible";
	document.getElementById("hint").innerHTML = "Inserting number ...";

	var number = document.getElementById("insert_number_text").value;
	
	if (!number){
		alert("Please insert a number");
		hideSpinner();
		showHint("");
		return;
	}
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == 2){
				showHint("Number and digifriends already in database.");
				hideSpinner();
				return;
			}
			if (this.responseText == 0){
				showHint("Successfully computed digifriends and stored them in database.");
				hideSpinner();
			}else{
				showHint("Error. Please try again.");
				hideSpinner();
			}
			
		}
		
	};
	xmlhttp.open("GET", "insert_number.php?number="+number, true);
	xmlhttp.send();
}

function listDigisForLastInserted(){
	showSpinner()
	showHint("Retrieving digifrieds of last inserted ...");
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText){
				showHint(this.responseText);
				hideSpinner();
			}else{
				showHint("Error. Please try again.");
				hideSpinner();
			}
			
		}
		
	};
	xmlhttp.open("GET", "list_digis_of_last_inserted.php", true);
	xmlhttp.send();
}

function checkDigifriends(){
	showSpinner();
	showHint("Checking if specified numbers are digifriends ...");
	
	var digi_y = document.getElementById("digifriend_y").value;
	var digi_z = document.getElementById("digifriend_z").value;
	
	if (!digi_y || !digi_z){
		alert("Please insert 2 numbers");
		hideSpinner();
		showHint("");
		return;
	}
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			showHint(this.responseText);
			hideSpinner();
			return;//result has to be shown this way, because of a problem with async loading

			
			if (this.responseText == 0){
				showHint(digi_Y+" and "+digi_Z+" are digifriends :D");
				hideSpinner();
				
			}else if (this.responseText == 1){
				showHint(digi_Y+" and "+digi_Z+" are not digifriends :(");
				hideSpinner();
				
			}else{
				showHint("Error. Please try again.");
				hideSpinner();
				
			}
			
		}
		
	};
	xmlhttp.open("GET", "check_digifriends.php?digi_y="+digi_y+"&digi_z="+digi_z, true);
	xmlhttp.send();
}


</script>
