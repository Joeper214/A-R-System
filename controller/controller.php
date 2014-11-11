<?php

	Class Controller {
	
		public function adminSelectOption($option) {
		
			switch($option) {
				
				case 'addCategory':
					require "viewer/admin/manageCategory.php";
				break;
				
				case 'addProduct':
					require "viewer/admin/manageProduct.php";
				break;
				
				case 'disableCategory':
				  //				  echo "<script> disableCategory()</script>";
					$categoryID = $_GET['categoryID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateCategoryAvailability($categoryID, 0);
					
					if($isUpdated) {
						echo "<script>categoryAvailabilityHasBeenUpdated()</script>";
					}
				break;
				
				case 'enableCategory':

				  //echo "<script> enableCategory()</script>";
					$categoryID = $_GET['categoryID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateCategoryAvailability($categoryID, 1);
					
					if($isUpdated) {
				echo "<script>categoryAvailabilityHasBeenUpdated()</script>";
					}
				break;
				
				case 'enableBrand':
					$brandID = $_GET['brandID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateBrandStatus($brandID, 1);
					
					if($isUpdated) {
						echo "<script>brandStatusUpdated()</script>";
					}
				break;


				case 'disableBrand':
					$brandID = $_GET['brandID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateBrandStatus($brandID, 0);
					
					if($isUpdated) {
						echo "<script>brandStatusUpdated()</script>";
					}
				break;

			
				case 'disableProduct':
					$productID = $_GET['productID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateProductAvailability($productID, 0);
					
					if($isUpdated) {
			  	echo "<script>productStatusUpdated()</script>";
					}
				break;
				
				case 'enableProduct':
					$productID = $_GET['productID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateProductAvailability($productID, 1);
					
					if($isUpdated) {
		         	echo "<script>productStatusUpdated()</script>";
					}
				break;



			case 'disableSerial':
			  $serialID = $_GET['serialID'];
			  $productID = $_GET['productID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateSerialAvailability($serialID,$productID, 0);
					
					if($isUpdated) {
					  header("location: admin.php?option=editserial&productID=$productID");
					}
				break;
				
			case 'enableSerial':
			  $serialID = $_GET['serialID'];
			  $productID = $_GET['productID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateSerialAvailability($serialID,$productID, 1);
					
					if($isUpdated) {
			  		  header("location: admin.php?option=editserial&productID=$productID");
					}
				break;



			case 'disableService':
					$serviceID = $_GET['serviceID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateServiceAvailability($serviceID, 0);
					
					if($isUpdated) {
					  header("location: admin.php?option=manageservice");
					}
				break;
				
			case 'enableService':
			  $serviceID = $_GET['serviceID'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateServiceAvailability($serviceID, 1);
					
					if($isUpdated) {
					  header("location: admin.php?option=manageservice");
					}
				break;

		

		
				case 'enableAccount':
					$employeeID = $_GET['emp'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateUserStatus($employeeID, 1);
					
					if($isUpdated) {
						echo "<script>disabled()</script>";
					}
				break;


				case 'disableAccount':
                                        	
					$employeeID = $_GET['emp'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateUserStatus($employeeID, 2);
					
					if($isUpdated) {
						echo "<script>disabled()</script>";
					}
				break;


			case 'enableEmployee':
					$employeeID = $_GET['emp'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateAccountStatus($employeeID, 1);
					$isAcc = $goTo -> updateUserStatus($employeeID, 1);
					
					if($isUpdated) {
						echo "<script>disabled()</script>";
					}
				break;


				case 'disableEmployee':
                                        	
					$employeeID = $_GET['emp'];
					
					$goTo = new UpdateModel();
					$isUpdated = $goTo -> updateAccountStatus($employeeID, 2);
					$isAcc = $goTo -> updateUserStatus($employeeID, 3);
					
					if($isUpdated) {
						echo "<script>disabled()</script>";
					}
				break;






				case 'editCategory':
					require "viewer/admin/editCategory.php";
				break;
				
				case 'editProduct':
					require "viewer/admin/editProduct.php";
				break;
				
				case 'editConsumable':
					require "viewer/admin/editConsumable.php";
				break;
				
				case 'editserial':
					require "viewer/admin/editSerial.php";
				break;
				
				case 'replaceDamaged':
					require "viewer/admin/replaceDamaged.php";
				break;
				
				case 'manageemployee':
					require "viewer/admin/manageEmployee.php";
				break;
				
				case 'managecategory':
					require "viewer/admin/manageCategory.php";
				break;
				
				case 'managebrand':
					require "viewer/admin/manageBrand.php";
				break;
				
				case 'manageservice':
					require "viewer/admin/manageService.php";
				break;
				
				case 'editService':
					require "viewer/admin/editService.php";
				break;
				
				case 'editEmployee':
					require "viewer/admin/editEmployee.php";
				break;
				
				case 'addEmployee':
					require "viewer/admin/manageEmployee.php";
				break;
				
				case 'createaccount':
					require "viewer/admin/createAccount.php";
				break;
				
				case 'editBrand':
					require "viewer/admin/editBrand.php";
				break;
				
				case 'manageproduct':
					require "viewer/admin/manageProduct.php";
				break;
				
				case 'addstock':
					require "viewer/admin/addStock.php";
				break;
				
				case 'addConsumableStock':
					require "viewer/admin/addConsumableStock.php";
				break;
				
				case 'reports':
					require "viewer/admin/reports.php";
				break;
				
				case 'viewreport':
					echo "<script>viewReport()</script>";
				break;
				
				case 'logout':
		$login = new UpdateModel();
		$login->setLogin($_SESSION['accountID'],0);								
					session_destroy();
					echo "<script>logout()</script>";
				break;
				
				case 'viewEmployee':
					require "viewer/admin/viewEmployee.php";
				break;
				
				case 'viewCategory':
					require "viewer/admin/viewCategory.php";
				break;
				
				case 'edituserinformation':
					require "viewer/admin/editUserInformation.php";
				break;
				
				case 'changepassword':
					require "viewer/admin/changePassword.php";
				break;
				
				case 'viewProduct':
					require "viewer/admin/viewProduct.php";
				break;
				
				case 'viewConsumable':
					require "viewer/admin/viewConsumable.php";
				break;
				
				case 'transactions':
					require "viewer/admin/transactions.php";
				break;
				
				case 'salesdetail':
					require "viewer/admin/salesDetail.php";
				break;
				
				case 'pendingpaymentdetail':
					require "viewer/admin/pendingPaymentDetail.php";
				break;
				
				case 'technicaldetail':
					require "viewer/admin/technicalDetail.php";
				break;
				
				case 'reports':
					require "viewer/admin/reports.php";
				break;
				
				case 'changeUsername':
					require "viewer/admin/changeUsername.php";
				break;
				
				case 'changeaccountpicture':
					require "viewer/admin/changeAccountPicture.php";
				break;
				
				default:
					echo "<script>goToAdmin()</script>";
				break;
			}
		}
		
		public function cashierSelectOption($option) {
		
			switch($option) {
				
				case 'managecustomer':
					require "viewer/cashier/manageCustomer.php";
				break;
				
				case 'editcustomer':
					require "viewer/cashier/editCustomer.php";
				break;
				
				case 'viewcustomer':
					require "viewer/cashier/viewCustomer.php";
				break;
				
				case 'customerproduct':
					require "viewer/cashier/customerProduct.php";
				break;
			        case 'removeCart':
				  $cart = new UpdateModel();
				  $cartID = $_GET['cartID'];
				  $cart->removeCart($cartID);
				        require "viewer/cashier/product.php";
				break;
				case 'customercart':
					require "viewer/cashier/customerCart.php";
				break;
				
				case 'customerprocesspayment':
					require "viewer/cashier/customerProcessPayment.php";
				break;
				
				case 'product':
					require "viewer/cashier/product.php";
				break;

			        case 'filter_product_by_catID':
				  
				  require "viewer/cashier/product.php";
				  
             		        break;
				  
				
				case 'cart':
					require "viewer/cashier/cart.php";
				break;
				
				case 'processpayment':
					require "viewer/cashier/processPayment.php";
				break;
				
				case 'transactions':
					require "viewer/cashier/transactions.php";
				break;
				
				case 'paymentdetail':
					require "viewer/cashier/paymentDetail.php";
				break;
				
				case 'pendingpaymentdetail':
					require "viewer/cashier/pendingPaymentDetail.php";
				break;
				
				case 'salesdetail':
					require "viewer/cashier/salesDetail.php";
				break;
				
				case 'technicaldetail':
					require "viewer/cashier/technicalDetail.php";
				break;
				
				case 'warranty':
					require "viewer/cashier/warranty.php";
				break;
				
				case 'productreplacement':
				  if(isset($_GET['id'])){
				    
				  }
					require "viewer/cashier/productReplacement.php";
				break;
				
				case 'reports':
					require "viewer/cashier/reports.php";
				break;
				
				case 'technicalreportsdetail':
					require "viewer/cashier/technicalReportsDetail.php";
				break;
				
				case 'salesreportsdetail':
					require "viewer/cashier/salesReportsDetail.php";
				break;
				
				case 'edituserinformation':
					require "viewer/cashier/editUserInformation.php";
				break;
				
				case 'changeusername':
					require "viewer/cashier/changeUsername.php";
				break;
				
				case 'changepassword':
					require "viewer/cashier/changePassword.php";
				break;
				
				case 'changeaccountpicture':
					require "viewer/cashier/changeAccountPicture.php";
				break;
				
				case 'logout':

		$login = new UpdateModel();
		$login->setLogin($_SESSION['accountID'],0);
					session_destroy();
					echo "<script>logout()</script>";
				break;
				
				default:
					require "viewer/cashier/home.php";
				break;
			}
		}
		
		public function technicianSelectOption($option) {
		
			switch($option) {
				
				case 'managecustomer':
					require "viewer/technician/manageCustomer.php";
				break;

			case 'deleteService':

			  $ID = $_GET['id'];
			  
			  $goTo = new UpdateModel();
			  $isUpdated = $goTo -> deleteService($ID);
                          if($isUpdated){
			    $msg = "Remove Success";
			    header("location: technician.php?option=customerrepair&msg={$msg}");
			  }			  


			  break;
			  
				case 'editcustomer':
					require "viewer/technician/editCustomer.php";
				break;
				
				case 'viewcustomer':
					require "viewer/technician/viewCustomer.php";
				break;
			
				case 'repair':
					require "viewer/technician/repair.php";
				break;
				
				case 'repairapplied':
					require "viewer/technician/repairApplied.php";
				break;
			
				case 'customerrepair':
					require "viewer/technician/customerRepair.php";
				break;
			
				case 'customerrepairapplied':
					require "viewer/technician/customerRepairApplied.php";
				break;
				
				case 'managenote':
					require "viewer/technician/manageNote.php";
				break;
				
				case 'viewnote':
					require "viewer/technician/viewNote.php";
				break;
				
				case 'editnote':
					require "viewer/technician/editNote.php";
				break;
				
				case 'reports':
					require "viewer/technician/reports.php";
				break;
				
				case 'reportsdetail':
					require "viewer/technician/reportsDetail.php";
				break;
				
				case 'edituserinformation':
					require "viewer/technician/editUserInformation.php";
				break;
				
				case 'changeusername':
					require "viewer/technician/changeUsername.php";
				break;
				
				case 'changepassword':
					require "viewer/technician/changePassword.php";
				break;
				
				case 'changeaccountpicture':
					require "viewer/technician/changeAccountPicture.php";
				break;
				
				case 'logout':

		$login = new UpdateModel();
		$login->setLogin($_SESSION['accountID'],0);
					session_destroy();
					echo "<script>logout()</script>";
				break;
				
				default:
					require "viewer/technician/home.php";
				break;
			}
		}
	}
?>