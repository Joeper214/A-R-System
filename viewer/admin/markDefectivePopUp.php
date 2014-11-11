<script type='text/javascript' src='script/moveable.js'></script>
<div id="popUpContainer">
    <div id="popUpHeader">
        <div id="popUpTitle">Asus Aspire 4736Z</div>
        <div id="popUpCancel"><a href="javascript:popUpHide('popUpContainer','popUpBackground');"><em>Cancel</em></a></div>
    </div>
	<div id='popUpHeaderLine'></div>

    <div id="popUpInnerContainer">
		<form id='popUpForm' method='post'>
			<div class='popUpNote'>Check the defective product serials</div>
			
			<div id='clear'></div>
			
			<div class='quantity'>
				<label for='quantity' >Stock</label>
				<input type='number' min='0' name='quantity' id='quantity' disabled='true' value='15'/><br/>
			</div>
			
			<div id='clear'></div>
			
			<div class='serialContainer'>
				<label>Product Serials</label><br/>
					<ul id='serials'>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRS666G3R8DAS</li>
						<li><input type='checkbox'/> 56JDDYJJJDNC65755A87</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRS666G3R8DAS</li>
						<li><input type='checkbox'/> 56JDDYJJJDNC6575587</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
						<li><input type='checkbox'/> SDG985SRG3G6G3R8DAS</li>
					</ul>	
			</div>

			<div class='submit'>
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='MARK DEFECTIVE'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div id="popUpBackground"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>markedDefective()</script>";
	}
?>