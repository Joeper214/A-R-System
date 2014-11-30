function charOnly(e){
    var arr = [8,16,17,20,35,36,37,38,39,40,45,46];
    
    // Allow letters
    for(var i = 65; i <= 90; i++){
	arr.push(i);
  }
    
    if(jQuery.inArray(event.which, arr) === -1){
	event.preventDefault();
    }
}



function isAlpha(keyCode)
{

return ((keyCode >= 65 && keyCode <= 90) || keyCode == 40 || keyCode == 38 || keyCode == 37 || keyCode == 39 || keyCode == 9 || keyCode == 8 || keyCode == 32 || keyCode == 190)

}

function NumAndChar(keyCode){
   // alert(keyCode);
    return ((keyCode >= 65 && keyCode <= 90) || keyCode == 40 || keyCode == 38 || keyCode == 37 || keyCode == 39 || keyCode == 9 || keyCode == 8 || keyCode == 32 
 || keyCode == 190 )
 
}


/* Index Functions */
function allNumbers(e){
   var key;
   if(window.event){
      key = e.keyCode;
   }else if(e.which){
      key = e.which;
   }
                
  if (key == 8){//backspace
    return true;
  }else if(key==9){//tab
    return true;
  }else if (key < 48 || key > 57){//alpha characters
    return false;
  }else{
    return true;
  }
}

function Decimals(e){
  var key;
   if(window.event){
      key = e.keyCode;
   }else if(e.which){
      key = e.which;
   }
  //alert(key);              
  if (key == 8){//backspace
    return true;
  }else if(key==9){//tab
    return true;
  }else if(key==190){//decimal point
    return true;
  }else if (key < 48 || key > 57){//alpha characters
    return false;
  }else{
    return true;
  }
}


function inputChange(){
 //alert('asd');
    var total =  $('#total').val();
    var amount = $('#amount').val();
//    alert(total);
//  alert(amount);
var change = (amount-total);
if(change < 0){
 $('#change').val(change);
 //$('#pay').attr('disabled','true');
}else{
 $('#change').val(change);
  $('#pay').removeAttr('disabled');
}

}



function accountDisabled() {
	alert('Account is currently disabled!');
	document.location.href='index.php';
}

function accountDontExist() {
	alert('Account does not exist!');
	document.location.href='index.php';
}

function logout() {
	document.location.href='index.php';
}


function consumable(){
	document.location.href='admin.php?option=manageproduct&type=1';
}
function nonConsumable(){
	document.location.href='admin.php?option=manageproduct';
}
function year(id){
    	document.location.href='admin.php?option=transactions&year='+id;
}
/* End of Index Functions */


/* Admin Functions */

function goToAdmin() {
	document.location.href='admin.php';
}
function disabled(){
//        alert('User account has been updated.');
	document.location.href='admin.php?option=manageemployee';
}
function adminAccountUpdated() {
	alert('User account has been updated.');
	document.location.href='admin.php?option=home';
}

function cashierAccountUpdated() {
	alert('User account has been updated.');
	document.location.href='cashier.php?option=home';
}


function adminUsernameUpdated() {
	alert('Username has been updated.');
	document.location.href='admin.php?option=home';
}

function adminPasswordChanged() {
	alert('User password has been updated.');
	document.location.href='admin.php?option=home';
}

function adminInfoUpdated() {
	alert('User information has been updated.');
	document.location.href='admin.php?option=home';
}

function accountPictureUpdated() {
	alert('Account picture has been updated.');
	document.location.href='admin.php?option=home';
}

function saveServices(){
    var retVal = confirm("Are you sure to save this services?");
    if(retVal == true){
    alert('Services Applied Successfully! Please procced to cashier for payment.');
	document.location.href="technician.php?option=managecustomer";
	return true;
    }else{
	document.location.href="technician.php?option=customerrepair";
	return false;
    }
}

//cart functions
function removeCart(id){
    var retVal = confirm("Are you sure you want to remove this product?");
    if (retVal == true){
	document.location.href="cashier.php?option=removeCart&cartID="+id;
	return true;
    }else{
	document.location.href="cashier.php?option=product";
	return false;
    }
}



//account Functions


function removeService(id){
    var retVal = confirm("Are you sure you want to remove the selected Service?");
    if (retVal == true){
	document.location.href="technician.php?option=deleteService&id="+id;
	return true;
    }else{
	document.location.href="technician.php?option=customerrepair";
	return false;
    }
}

//Employee Functions
function disableEmployee(id){
    var retVal = confirm("Are you sure you wnat to disable the selected Account?");
    if (retVal == true){
	document.location.href="admin.php?option=disableEmployee&emp="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageemployee";
	return false;
    }
}


function enableEmployee(id){
    var retVal = confirm("Are you sure you want to enable the selected Account?");
    if (retVal == true){
	document.location.href="admin.php?option=enableEmployee&emp="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageemployee";
	return false;
    }
}



function disableUser(id){
    var retVal = confirm("Are you sure you wnat to disable the selected Account?");
    if (retVal == true){
	document.location.href="admin.php?option=disableAccount&emp="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageemployee";
	return false;
    }
}


function enableUser(id){
    var retVal = confirm("Are you sure you want to enable the selected Account?");
    if (retVal == true){
	document.location.href="admin.php?option=enableAccount&emp="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageemployee";
	return false;
    }
}





function manageEmployee() {
	document.location.href='admin.php?option=manageemployee';
}

function employeeAdded() {
	alert('Employee has been added.');
	document.location.href='admin.php?option=manageemployee';
}

function employeeUpdated() {
	alert('Employee has been updated.');
	document.location.href='admin.php?option=manageemployee';
}

function accountCreated() {
	alert('Account has been created.');
	document.location.href='admin.php?option=manageemployee';
}

//Category Functions

function disableCategory(id){
    var retVal = confirm("Are you sure you wnat to disable the selected Category?");
    if (retVal == true){
	document.location.href="admin.php?option=disableCategory&categoryID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=managecategory";
	return false;
    }
}

function enableCategory(id){
    var retVal = confirm("Are you sure you want to enable the selected Category?");
    if (retVal == true){
	document.location.href="admin.php?option=enableCategory&categoryID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=managecategory";
	return false;
    }
}




function manageCategory() {
	document.location.href='admin.php?option=managecategory';
}




function categoryAdded() {
	alert('Category has been added.');
	document.location.href='admin.php?option=managecategory';
}

function categoryUpdated() {
	alert('Category has been updated.');
	document.location.href='admin.php?option=managecategory';
}

function categoryAvailabilityHasBeenUpdated() {
	document.location.href='admin.php?option=managecategory';
}





//Brand Functions

function disableBrand(id){
    var retVal = confirm("Are you sure you wnat to disable the selected Category?");
    if (retVal == true){
	document.location.href="admin.php?option=disableBrand&brandID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=managebrand";
	return false;
    }
}

function enableBrand(id){
    var retVal = confirm("Are you sure you want to enable the selected Category?");
    if (retVal == true){
	document.location.href="admin.php?option=enableBrand&brandID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=managebrand";
	return false;
    }
}








function brandAdded() {
	alert('Brand has been added.');
	document.location.href='admin.php?option=managebrand';
}

function brandStatusUpdated() {
	document.location.href='admin.php?option=managebrand';
}

function productStatusUpdated(){
	document.location.href='admin.php?option=manageproduct';
}

function serialStatusUpdated(id){
	document.location.href='admin.php?option=manageproduct&productID='+id;
}




function manageBrand() {
	document.location.href='admin.php?option=managebrand';
}


//Product Functions

function disableProduct(id){
    var retVal = confirm("Are you sure you wnat to disable the selected Product?");
    if (retVal == true){
	document.location.href="admin.php?option=disableProduct&productID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageproduct";
	return false;
    }
}

function enableProduct(id){
    var retVal = confirm("Are you sure you want to enable the selected Product?");
    if (retVal == true){
	document.location.href="admin.php?option=enableProduct&productID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageproduct";
	return false;
    }
}


//Serial Functions

function disableSerial(prodID,id){
    var retVal = confirm("Are you sure you wnat to disable the selected Serial?");
    if (retVal == true){
	document.location.href="admin.php?option=disableSerial&serialID="+id+"&productID="+prodID;
	return true;
    }else{
	document.location.href="admin.php?option=editserial&productID="+prodID;
	return false;
    }
}

function enableSerial(prodID,id){
    var retVal = confirm("Are you sure you want to enable the selected Serial?");
    if (retVal == true){
	document.location.href="admin.php?option=enableSerial&serialID="+id+"&productID="+prodID;
	return true;
    }else{
	document.location.href="admin.php?option=editserial&productID="+prodID;
	return false;
    }
}





function manageProduct() {
	document.location.href='admin.php?option=manageproduct';
}

function productAdded() {
	alert('Product has been added.');
	document.location.href='admin.php?option=manageproduct';
}

function productUpdated() {
	alert('Product information has been updated.');
	document.location.href='admin.php?option=manageproduct';
}

function markedDefective() {
	alert('Product in stock has been updated.');
	document.location.href='admin.php?option=viewProduct';
}

function stockUpdated() {
	alert('Stock has been updated.');
	document.location.href='admin.php?option=manageproduct';
}


//Service Functions

function disableService(id){
    var retVal = confirm("Are you sure you wnat to disable the selected Service?");
    if (retVal == true){
	document.location.href="admin.php?option=disableService&serviceID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageservice";
	return false;
    }
}

function enableService(id){
    var retVal = confirm("Are you sure you want to enable the selected Service?");
    if (retVal == true){
	document.location.href="admin.php?option=enableService&serviceID="+id;
	return true;
    }else{
	document.location.href="admin.php?option=manageservice";
	return false;
    }
}




function serialUpdated() {
	alert('Serial has been updated.');
	document.location.href='admin.php?option=manageproduct';
}

function manageService() {
	document.location.href='admin.php?option=manageservice';
}

function serviceAdded() {
	alert('Service has been added.');
	document.location.href='admin.php?option=manageservice';
}

function serviceUpdated() {
	alert('Service info has been updated.');
	document.location.href='admin.php?option=manageservice';
}

function printTransactions() {
	window.print();
	document.location.href='admin.php?option=transactions';
}

function viewReport() {
	document.location.href='admin.php?option=reports';
}

function printReport() {
	window.print();
	document.location.href='admin.php?option=reports';
}

/* End of Admin Functions */


/* Cashier Functions */

function goToCashier() {
	document.location.href='cashier.php';
}

function cashierInfoUpdated() {
	alert('User information has been updated.');
	document.location.href='cashier.php?option=home';
}

function CashierAccountUpdated() {
	alert('Account has been updated.');
	document.location.href='cashier.php?option=home';
}

function cashierPasswordChanged() {
	alert('Password has been updated.');
	document.location.href='cashier.php?option=home';
}

function cashierAccountPictureUpdated() {
	alert('Account picture has been updated.');
	document.location.href='cashier.php?option=home';
}

function viewCustomer() {
	document.location.href='cashier.php?option=managecustomer';
}

function cashierManageCustomer() {
	document.location.href='cashier.php?option=managecustomer';
}

function customerUpdated() {
	alert('Customer information has been updated.');
	document.location.href='cashier.php?option=managecustomer';
}

function customerProductAddedToCart() {
	document.location.href='cashier.php?option=customercart';
}

function customerProcessPayment() {
	document.location.href='cashier.php?option=customerprocesspayment';
}

function customerPrintReceipt() {
	window.print();
	document.location.href='cashier.php?option=managecustomer';
}

function productAddedToCart() {
	document.location.href='cashier.php?option=cart';
}

function processPayment() {
	document.location.href='cashier.php?option=processpayment';
}

function printReceipt() {
	window.print();
	document.location.href='cashier.php?option=product';
}

function printPendingPaymentReceipt() {
	window.print();
	document.location.href='cashier.php?option=transactions';
}

function productReplacement() {
    var serial = $("#serialN").val();
//    	alert(serial);
	 window.location ='cashier.php?option=productreplacement&msg='+serial;

}

function replaceProduct() {
	alert('Product has been replaced & warranty has been void.');
	document.location.href='cashier.php?option=warranty';
}

function printSalesReport() {
	window.print();
	document.location.href='cashier.php?option=reports';
}

/* End of Cashier Functions */


/* Technician Functions */

function goToTechnician() {
	document.location.href='technician.php';
}

function technicianInfoUpdated() {
	alert('User information has been updated.');
	document.location.href='technician.php?option=home';
}

function technicianAccountUpdated() {
	alert('Username has been updated.');
	document.location.href='technician.php?option=home';
}

function technicianPasswordChanged() {
	alert('Password has been updated.');
	document.location.href='technician.php?option=home';
}

function technicianAccountPictureUpdated() {
	alert('Account picture has been updated.');
	document.location.href='technician.php?option=home';
}

function manageCustomerTechnical() {
	document.location.href='technician.php?option=managecustomer';
}

function technicianCustomerUpdated() {
	alert('Customer information has been updated.');
	document.location.href='technician.php?option=managecustomer';
}

function customerRepairApplied() {
	document.location.href='technician.php?option=customerrepairapplied';
}

function customerRepair() {
	document.location.href='technician.php?option=customerrepair';
}

function customerRepairSaved() {
	alert('Transaction has been recorded.');
	document.location.href='technician.php?option=customerrepair';
}

function repair() {
	document.location.href='technician.php?option=repair';
}

function repairApplied() {
	document.location.href='technician.php?option=repairapplied';
}

function repairSaved() {
	alert('Transaction has been recorded.');
	document.location.href='technician.php?option=repair';
}

function manageNote() {
	document.location.href='technician.php?option=managenote';
}

function noteHasBeenAdded() {
	alert('note has been successfully added.');
	document.location.href='technician.php?option=managenote';
}

function noteHasBeenUpdated() {
	alert('Note has been updated.');
	document.location.href='technician.php?option=managenote';
}

function printTechnicalReport() {
	window.print();
	document.location.href='technician.php?option=reports';
}

/* End of Technician Functions */
