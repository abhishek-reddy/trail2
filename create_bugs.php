<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/create_bugs.css">
		<link rel="stylesheet" href="../css/header.css">
		<title>Bugs Reporting Page</title>
		<script type="text/javascript">  
							function countCharacters(id,max_chars,myelement)  
							{  
								counter = document.getElementById(id);  
								field = document.getElementById(myelement).value;  
								field_length = field.length;  
			 					if (field_length <= max_chars)  {     
								remaining_characters = max_chars-field_length;     
								counter.innerHTML = remaining_characters;  }  
			 				}
			 				function change_size(rowid)
							{
								ela=document.getElementById("comment");
								if(ela.rows+rowid<1)
								{
									ela.rows=1;
								}
								else
								{
								 	 ela.rows+=rowid;
								}
							}
							function validation ()
							{
								var descp=document.forms["form1"]["descp"].value;
								if(descp==null || descp=="")
								{
								alert("A short description is necessary!!");
								return false;
								}
								var proj=document.forms["form1"]["proj"].value;
								if(proj==null || proj=="")
								{
								alert("Project Name is necessary!!");
								return false;
								}
								var org=document.forms["form1"]["org"].value;
								if(org==null || org=="")
								{
								alert("A Organisation name is necessary!!");
								return false;
								}
								var category=document.forms["form1"]["category"].value;
								if(category==null || category=="")
								{
								alert("Please select a category!!");
								return false;
								}
								var priority=document.forms["form1"]["priority"].value;
								if(priority==null || priority=="")
								{
								alert("Please select a priority!!");
								return false;
								}
								var assign=document.forms["form1"]["assign"].value;
								if(assign==null || assign=="")
								{
								alert("Please select a to whom the project is assigned to!!");
								return false;
								}
								var status=document.forms["form1"]["status"].value;
								if(status==null || status=="")
								{
								alert("Please select the current status of the project!!");
								return false;
								}
								var bugtype=document.forms["form1"]["bugtype"].value;
								if(bugtype==null || bugtype=="")
								{
								alert("Please select a bug type!!");
								return false;
								}
								var build=document.forms["form1"]["build"].value;
								if(build==null || build=="")
								{
								alert("Please select the build of the project!!");
								return false;
								}
								var app=document.forms["form1"]["app"].value;
								if(app==null || app=="")
								{
								alert("Please select a Application!!");
								return false;
								}
								var modapp=document.forms["form1"]["modapp"].value;
								if(modapp==null || modapp=="")
								{
								alert("Please select a modules or an application!!");
								return false;
								}
								var comments=document.forms["form1"]["comments"].value;
								if(comments==null || comments=="")
								{
								alert("Please enter any comments!!");
								return false;
								}
							}
			 			</script>  
	</head>
	<body>
		<?php
		ini_set("display_errors",1);//display errors
		include("../create_bugs/config/temp.php");
		include ('db1.php');
		$database->connectdb();
		$database->select('bug_report');
		?>
			<div class="labels">
			<form action="Connect.php " method="post" name="form1" onsubmit="return validation()">
				<ul>
					<li>
						<label for="textbox1">Description:</label>
						<input type="input" id="textbox1" maxlength="200" name="descp" onkeyup="countCharacters('mycounter',200,'textbox1')"/>
						<div id="characters_remaining">
						<span id="mycounter">200</span> <span>Characters remaining</span>
						</div><br>
						<div class="sidebar">
							<p>Presets:
								<a href="#">use</a> /
								<a href="#">save</a>
							</p>
						</div>
						<br>
						<br>
					</li>
					<li>
						<label>Project:</label>
						<select name="proj">
						  	<option></option>
						  	<option>Shipping</option>
						  	<option>Checkout</option>  
						  	<option>Themes</option>
						  	<option>I18N</option>
						  	<option>API</option>
						  	<option>BigPay</option>
						</select>
					</li>
					<li>
						<label>Organisation:</label>
						<select name="org">
							<option></option>
						  	<option>Vasudhaika Software Solutions</option>
						</select>
					</li>
					<li>
						<label>Category:</label>
						<select name="category">
							<option></option>
							<option>Bug</option>
							<option>Enhancement</option>  
							<option>Clarification</option>
							<option>Questions</option>
							<option>Requirements</option>
						</select>
					</li>
					<li>
						<label>Priority:</label>
						<select name="priority">
							<option></option>
							<option>NO PRIORITY</option>
							<option>Low</option>
							<option>Medium</option>  
							<option>High</option>
						</select>
					</li>
					<li>
						<label>Assigned To:</label>
						<select name="assign">
							<option></option>
							<?php
							$result = mysql_query("SELECT * FROM Persons");
							while($row = mysql_fetch_assoc($result))
  								{
     							echo "<option>".$row['FirstName']."</option>";
								}
  							?>
  						</select>
					</li>
					<li>
						<label>Status:</label>
							<select name="status">
								<option></option>
								<option>New</option>
								<option>Checked IN</option>  
								<option>Closed</option>
								<option>In Progress</option>
								<option>ReOpen</option>
								<option>Not A Bug</option>
								<option>Postponed</option>
						</select>
					</li>
					<li>
						<label>Bug Type:</label>
						<select name="bugtype">
							<option></option>
							<option>Functional</option>
							<option>UI</option>  
						</select>			
					
					</li>
					<li>
						<label>Build:</label>
						<select name="build">
							<option></option>
							<option>Demo Issues</option>
						</select>			
					</li>
					<li>
						<label>Application:</label>
						<select name="app">
							<option></option>
							<option>iAgriMarC</option>
						</select>		
					</li>
					<li>
						<label>Modules/Applications:</label>
						<select name="modapp">
							<option></option>
							<option>DashBoard</option>
						</select>										
					</li>
				</ul>
			<div id="comments_section">
			<label class="commentsize" onclick="change_size(5)" name="+">[+]</label>&nbsp;
			<label class="commentsize" onclick="change_size(-5);" name="-">[-]</label>
			<label for="comment">Comments:</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--<label id="textoncomment">Entering "bugid#999" in comment creates link to id 999</label>-->
			<textarea rows="5" cols="83" id="comment" name="comments"></textarea><br>
			<div id="submit">
				<input type="submit" value="Create" />
			</div>
			</div>
			</form>
		</div>
	</body>
</html>