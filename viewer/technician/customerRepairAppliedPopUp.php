<script type='text/javascript' src='script/moveable.js'></script>
<div id="popUpContainer">
    <div id="popUpHeader">
        <div id="popUpTitle">Format / Reformat</div>
        <div id="popUpCancel"><a href="javascript:popUpHide('popUpContainer','popUpBackground');"><em>Cancel</em></a></div>
    </div>
	<div id='popUpHeaderLine'></div>

    <div id="popUpInnerContainer">
		<form id='popUpForm' method='post'>
			<div class='popUpNote'>Check the device where the service is applied to</div>
			
			<div id='clear'></div>
			
			<div class='rate'>
				<label for='rate' >Rate</label>
				<input type='text' name='rate' id='rate' value='400.00' disabled='true'/><br/>
			</div>
			
			<div id='clear'></div>
			
			<div class='serialContainer'>
				<label>Device Applied To</label><br/>
					<ul id='devicerepaired'>
						<li><input type='checkbox' selected='false'/>Acer Aspire 4347Z</li>
					</ul>	
			</div>

			<div class='submit'>
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='APPLY SERVICE'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div id="popUpBackground"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>customerRepairApplied()</script>";
	}
?>