<script type='text/javascript' src='script/moveable.js'></script>
<div id="popUpContainer">
    <div id="popUpHeader">
        <div id="popUpTitle">IMEI Plastic Keychain</div>
        <div id="popUpCancel"><a href="javascript:popUpHide('popUpContainer','popUpBackground');"><em>Cancel</em></a></div>
    </div>
	<div id='popUpHeaderLine'></div>

    <div id="popUpInnerContainer">
		<form id='popUpForm' method='post'>
			<div class='popUpNote'>Enter disposed item quantity & the reason</div>
			
			<div id='clear'></div>
			
			<div class='quantity'>
				<label for='quantity' >Dispose</label>
				<input type='number' name='quantity' id='quantity' min='1' value='1'/><br/>
			</div>
			
			<div class='stock'>
				<label for='quantity' >Stock</label>
				<input type='number' name='quantity' id='stock' value='15' disabled='true'/><br/>
			</div>
			
			<div id='clear'></div>
			
			<div class='serialContainer'>
				<label>Reason of disposal</label><br/>
					<textarea id='reasonofdisposal'>
						
					</textarea>	
			</div>

			<div class='submit'>
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='DISPOSE ITEMS'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div id="popUpBackground"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>consumableDisposed()</script>";
	}
?>