
<div id="drop_database">
	<button type="button" id="drop_db_button" onclick="dropDb();">Drop database</button>
</div>

<div id="setup"><p>Hello! What would you like to do today?</p></div>



<div align="center">
<div id="insert_number">

	<p>Insert a number and compute it's digifriends</p>

	<input class="inputtext" type="text" id="insert_number_text" size="5" maxlength="11">
	<button type="button" id="insert_number_button" onclick="insertNumber();">Insert</button>

</div>
<hr>
<div id="list_digi">

	<p>List Digifriends for last inserted number</p>

	<button type="button" id="list_digi_button" onclick="listDigisForLastInserted();">List</button>

</div>
<hr>
<div id="check_digifriends">

	<p>Check if 2 numbers are digifriends</p>

	<input class="inputtext" type="text" id="digifriend_y" size="5" maxlength="11">
	<input class="inputtext" type="text" id="digifriend_z" size="5" maxlength="11">
	
	<button type="button" id="check_digifriends_button" onclick="checkDigifriends();">Check</button>

</div>
<hr>
</div>