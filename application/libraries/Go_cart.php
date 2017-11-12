<?php  


/* 
*  Gocart Cart Library
*  Based on cart.php included with Codeigniter
*/

/*  
*	Coupon Support
*    This cart accepts coupons, Two main types:
		- Whole order discount 
		- Individual product discounts
	 Discount Types:
	 	- percent of price
		- fixed discount
	 Usage Restrictions (optional):
	 	- Number of uses
		- Product instance limit (ex. applying to up to x number of products per use)
		- Date range, expiration
		- Only one coupon can be applied to a prodct. No Doubling, etc.
	Coupon Discount Logic:
		- Validate usage limitation and expiration
      	- Apply only one coupon to each individual item (up to the instance limit for each item)
		- Adhere to coupon instance restrictions by applying  discount to x number of items
		- Maximize the savings for the customer by applying the best discount possible
*/

class go_cart {
	var $CI;
	

	// Cart properties and items will go in here
	//  Modified from the original cart lib as follows:
	//    _cart_contents[ (cart property indexes) ] = (property value)
	//    _cart_contents[items]	= (shopping cart products list)
	// This has to be in a single variable for easy session storage
	var $_cart_contents	= array();
	
	var $gift_cards_enabled = false;
	
	function __construct() 
	{
		
		
		//die(var_dump($this->_cart_contents));
	}

	
	
}
