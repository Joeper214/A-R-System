<script type='text/javascript' src='script/moveable.js'></script>
<div id="popUpContainer">
    <div id="popUpHeader">
        <div id="popUpTitle">Asus Aspire 4736Z</div>
        <div id="popUpCancel"><a href="javascript:popUpHide('popUpContainer','popUpBackground');"><em>Cancel</em></a></div>
    </div>
	<div id='popUpHeaderLine'></div>

    <div id="popUpInnerContainer">
		<form id='popUpForm' method='post'>
			<div class='popUpNote'>Enter the quantity and check serials if product has serials</div>
			
			<div id='clear'></div>
			
			<div class='quantity'>
				<label for='quantity' >Quantity</label>
				<input type='number' min='1' name='quantity' id='quantity' value='1'/><br/>
			</div>
			
			<div class='stock'>
				<label for='quantity' >Stock</label>
				<input type='number' min='1' name='quantity' id='stock' value='15' disabled='true'/><br/>
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
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='ADD TO CART'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div id="popUpBackground"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>customerProductAddedToCart()</script>";
	}
?>