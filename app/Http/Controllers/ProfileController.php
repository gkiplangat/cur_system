<?php

namespace MyJesus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use MyJesus\Models\Members;
use MyJesus\Models\Settings;
use MyJesus\Models\Category;
use MyJesus\Models\Products;
use Auth;
use Mail;
use URL;
use Paystack;
use AmrShawky\LaravelCurrency\Facade\Currency;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function show_cart()
	{
	  $cart['product'] = Products::getcartData();
	  $cart_count = Products::getcartCount();
	   $data = array('cart' => $cart, 'cart_count' => $cart_count);
	   
	   return view('cart')->with($data);
	}
	
	
	public function show_my_donation()
	{
	   $donation['view'] = Products::getmyDonation();
	    $data = array('donation' => $donation);
	   return view('my-donation')->with($data);
	}
	
	public function show_my_order()
	{
	   $order['product'] = Products::getmyCheckout();
	    $data = array('order' => $order);
	   return view('my-order')->with($data);
	}
	
	public function product_details_order($product_token)
	{   
	    $user_id = Auth::user()->id;
	    $order['single'] = Products::getRate($product_token,$user_id);
		$rate_count = Products::getRateCount($product_token,$user_id);
		$product['view'] = Products::singleProducts($product_token);
	    $data = array('order' => $order, 'rate_count' => $rate_count, 'product_token' => $product_token, 'user_id' => $user_id, 'product' => $product);
	   return view('product-ratings')->with($data);
	}
	
	public function full_details_order($order_id)
	{
	  
	  
	  $order['product'] = Products::getmyOrders($order_id);
	   $data = array('order' => $order);
	   return view('order-details')->with($data);
	  
	}
	
	
	public function update_rating(Request $request)
	{
	
	   $product_rate = $request->input('product_rate');
	   $product_comments = $request->input('product_comments');
	    $product_token = $request->input('product_token');
		$user_id = $request->input('user_id');
		$update_date = date('Y-m-d');
		$getcount = Products::checkRating($product_token,$user_id);
		$savedata = array('product_token' => $product_token, 'user_id' => $user_id, 'product_rate' => $product_rate, 'product_comments' => $product_comments, 'update_date' => $update_date);
		$updatedata = array('product_rate' => $product_rate, 'product_comments' => $product_comments, 'update_date' => $update_date); 
		if($getcount == 0)
		{
		   Products::saveratingData($savedata);
		   return redirect()->back()->with('success', 'Thanks for your rating and reviews');
		}
		else
		{
		   Products::updaterateData($product_token,$user_id,$updatedata);
		   return redirect()->back()->with('success', 'Your rating and reviews has been updated');
		}
	
	}
	
	public function donate_now()
	{
	    $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $get_payment = explode(',', $setting['setting']->payment_option);
	  $data = array('get_payment' => $get_payment);
	    return view('donate-now')->with($data);
	}
	
	
	public function donate_paypal_success($ord_token, Request $request)
	{
	
	$payment_token = $request->input('tx');
	$purchased_token = $ord_token;
	$payment_status = 'completed';
	$orderdata = array('donate_payment_token' => $payment_token, 'donate_payment_status' => $payment_status);
	Products::singledonateData($purchased_token,$orderdata);
	$getbuyer['view'] = Products::getdonateData($purchased_token);
	$item_price = $getbuyer['view']->donate_amount;
	$sid = 1;
	$setting['setting'] = Settings::editGeneral($sid);
	$to_name = $setting['setting']->sender_name;
	$to_email = $setting['setting']->sender_email;
	$currency = $setting['setting']->site_currency_code;
	$from_name = $getbuyer['view']->donate_name;
	$from_email = $getbuyer['view']->donate_email;
	$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
	Mail::send('donation_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
							$message->to($to_email, $to_name)
									->subject('Donation Payment Received');
							$message->from($from_email,$from_name);
	});
		 
	$result_data = array('payment_token' => $payment_token);
	return view('donate-success')->with($result_data);
	
	}
	
	public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }
	
	public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
		

        dd($paymentDetails);
         //print_r($paymentDetails);
		/*if (array_key_exists('data', $paymentDetails) && array_key_exists('status', $paymentDetails['data']) && ($paymentDetails['data']['status'] === 'success')) 
		{
		    
			$payment_token = $paymentDetails['data']['reference'];
			$purchased_token = $paymentDetails['data']['metadata'];
			$payment_status = 'completed';
			$orderdata = array('donate_payment_token' => $payment_token, 'donate_payment_status' => $payment_status);
			Products::singledonateData($purchased_token,$orderdata);
			$getbuyer['view'] = Products::getdonateData($purchased_token);
			$item_price = $getbuyer['view']->donate_amount;
			$sid = 1;
			$setting['setting'] = Settings::editGeneral($sid);
			$to_name = $setting['setting']->sender_name;
			$to_email = $setting['setting']->sender_email;
			$currency = $setting['setting']->site_currency_code;
			$from_name = $getbuyer['view']->donate_name;
			$from_email = $getbuyer['view']->donate_email;
			$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
			Mail::send('donation_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
									$message->to($to_email, $to_name)
											->subject('Donation Payment Received');
									$message->from($from_email,$from_name);
			});
				 
			$result_data = array('payment_token' => $payment_token);
			return view('donate-success')->with($result_data);
	
	    
		}
		else
		{
		  return redirect('/cancel');
		}*/
		
    }
	
	public function donate_flutterwaveCallback(Request $request)
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$payment_token = $request->input('transaction_id');
		$ord_token = $request->input('tx_ref');
		$pay_status = $request->input('status');
		if ($pay_status == 'successful') 
		{
		
		    $purchased_token = $ord_token;
			$payment_status = 'completed';
			$orderdata = array('donate_payment_token' => $payment_token, 'donate_payment_status' => $payment_status);
			Products::singledonateData($purchased_token,$orderdata);
			$getbuyer['view'] = Products::getdonateData($purchased_token);
			$item_price = $getbuyer['view']->donate_amount;
			
			$to_name = $setting['setting']->sender_name;
			$to_email = $setting['setting']->sender_email;
			$currency = $setting['setting']->site_currency_code;
			$from_name = $getbuyer['view']->donate_name;
			$from_email = $getbuyer['view']->donate_email;
			$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
			Mail::send('donation_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
									$message->to($to_email, $to_name)
											->subject('Donation Payment Received');
									$message->from($from_email,$from_name);
			});
				 
			$result_data = array('payment_token' => $payment_token);
			return view('donate-success')->with($result_data);
		
		}
		else
		{
			   return view('cancel');
		}
			
    } 
	
	public function donate_coinpayments($ord_token, Request $request)
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$payment_token = '';
		$purchased_token = $ord_token;
		$payment_status = 'completed';
		$orderdata = array('donate_payment_token' => $payment_token, 'donate_payment_status' => $payment_status);
		Products::singledonateData($purchased_token,$orderdata);
		$getbuyer['view'] = Products::getdonateData($purchased_token);
		$item_price = $getbuyer['view']->donate_amount;
		$to_name = $setting['setting']->sender_name;
		$to_email = $setting['setting']->sender_email;
		$currency = $setting['setting']->site_currency_code;
		$from_name = $getbuyer['view']->donate_name;
		$from_email = $getbuyer['view']->donate_email;
		$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
		Mail::send('donation_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
									$message->to($to_email, $to_name)
											->subject('Donation Payment Received');
									$message->from($from_email,$from_name);
			});
				 
	    $result_data = array('payment_token' => $payment_token);
		return view('donate-success')->with($result_data);
	 
	
	}
	
	public function view_donate_now(Request $request)
	{
	   
	   
	   $donate_name = $request->input('donate_name');
	   $donate_email = $request->input('donate_email');
	   $donate_phone = $request->input('donate_phone');
	   $donate_amount = $request->input('donate_amount');
	   $donate_message = $request->input('donate_message');
	   $token = $request->input('token');
	   $donate_date = date('Y-m-d H:i:s');
	   $payment_status = 'pending';
	   $user_id = $request->input('user_id');
	   $payment_method = $request->input('payment_method');
	   $website_url = URL::to('/');
	   $purchase_token = $this->generateRandomString();
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $reference = $request->input('reference');
	   
	   $savedata = array('donate_payment_type' => $payment_method, 'user_id' => $user_id, 'purchase_token' => $purchase_token, 'donate_name' => $donate_name, 'donate_email' => $donate_email, 'donate_phone' => $donate_phone, 'donate_amount' => $donate_amount, 'donate_message' => $donate_message, 'donate_token' => $token, 'donate_date' => $donate_date, 'donate_payment_status' => $payment_status);
	   
	   
	   
	   if($donate_amount >= $setting['setting']->site_minimum_donate)
	   {
			   /* settings */
			   
			   $paypal_email = $setting['setting']->paypal_email;
			   $paypal_mode = $setting['setting']->paypal_mode;
			   $site_currency = $setting['setting']->site_currency_code;
			   if($paypal_mode == 1)
			   {
				 $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
			   }
			   else
			   {
				 $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
			   }
			   $success_url = $website_url.'/donate-success/'.$purchase_token;
			   $cancel_url = $website_url.'/cancel';
			   
			   $stripe_mode = $setting['setting']->stripe_mode;
			   if($stripe_mode == 0)
			   {
				 $stripe_publish_key = $setting['setting']->test_publish_key;
				 $stripe_secret_key = $setting['setting']->test_secret_key;
			   }
			   else
			   {
				 $stripe_publish_key = $setting['setting']->live_publish_key;
				 $stripe_secret_key = $setting['setting']->live_secret_key;
			   }
			   
			   /* settings */
			   /* flutterwave */
				$flutterwave_public_key = $setting['setting']->flutterwave_public_key;
				$flutterwave_secret_key = $setting['setting']->flutterwave_secret_key;
				/* flutterwave */
				
				/* coinpayments */
				$coinpayments_merchant_id = $setting['setting']->coinpayments_merchant_id;
				$coinpayments_success_url = $website_url.'/donate-coinpayments/'.$purchase_token;
				/* coinpayments */
			   
				  $product_names_data = "Donate Now";
				  Products::savedonateData($savedata);
				  
				  
				  if($payment_method == 'paypal')
				  {
					 
					 $paypal = '<form method="post" id="paypal_form" action="'.$paypal_url.'">
					  <input type="hidden" value="_xclick" name="cmd">
					  <input type="hidden" value="'.$paypal_email.'" name="business">
					  <input type="hidden" value="'.$product_names_data.'" name="item_name">
					  <input type="hidden" value="'.$purchase_token.'" name="item_number">
					  <input type="hidden" value="'.$donate_amount.'" name="amount">
					  <input type="hidden" value="'.$site_currency.'" name="currency">
					  <input type="hidden" value="'.$success_url.'" name="return">
					  <input type="hidden" value="'.$cancel_url.'" name="cancel_return">
							  
					</form>';
					$paypal .= '<script>window.paypal_form.submit();</script>';
					echo $paypal;
							 
					 
				  }
				  /* coinpayments */
				  else if($payment_method == 'coinpayments')
				  {
					 $coinpayments = '<form action="https://www.coinpayments.net/index.php" method="post" id="coinpayments_form">
										<input type="hidden" name="cmd" value="_pay">
										<input type="hidden" name="reset" value="1">
										<input type="hidden" name="merchant" value="'.$coinpayments_merchant_id.'">
										<input type="hidden" name="item_name" value="'.$product_names_data.'">	
										<input type="hidden" name="item_desc" value="'.$product_names_data.'">
										<input type="hidden" name="item_number" value="'.$purchase_token.'">
										<input type="hidden" name="currency" value="'.$site_currency.'">
										<input type="hidden" name="amountf" value="'.$donate_amount.'">
										<input type="hidden" name="want_shipping" value="0">
										<input type="hidden" name="success_url" value="'.$coinpayments_success_url.'">	
										<input type="hidden" name="cancel_url" value="'.$cancel_url.'">	
									</form>';
					$coinpayments .= '<script>window.coinpayments_form.submit();</script>';
					echo $coinpayments;				
				  }
				  /* coinpayments */
				  else if($payment_method == 'flutterwave')
				  {
					  if($site_currency != 'NGN')
					   {
					   
					   $convert = Currency::convert()->from($site_currency)->to('NGN')->amount($donate_amount)->round(2)->get();
					   $price_amount = $convert;
					   }
					   else
					   {
					   $price_amount = $donate_amount;
					   }
					   $flutterwave_callback = $website_url.'/donate-flutterwave';
					   $phone_number = "";
					   $csf_token = csrf_token();
					   $flutterwave = '<form method="post" id="flutterwave_form" action="https://checkout.flutterwave.com/v3/hosted/pay">
					  <input type="hidden" name="public_key" value="'.$flutterwave_public_key.'" />
					  <input type="hidden" name="customer[email]" value="'.$donate_email.'" >
					  <input type="hidden" name="customer[phone_number]" value="'.$phone_number.'" />
					  <input type="hidden" name="customer[name]" value="'.$donate_name.'" />
					  <input type="hidden" name="tx_ref" value="'.$purchase_token.'" />
					  <input type="hidden" name="amount" value="'.$price_amount.'">
					  <input type="hidden" name="currency" value="NGN">
					  <input type="hidden" name="meta[token]" value="'.$csf_token.'">
					  <input type="hidden" name="redirect_url" value="'.$flutterwave_callback.'">
					</form>';
					$flutterwave .= '<script>window.flutterwave_form.submit();</script>';
					echo $flutterwave;
				  }
				  else if($payment_method == 'paystack')
				  {
					   if($site_currency != 'NGN')
					   {
					   $convert = Currency::convert()->from($site_currency)->to('NGN')->amount($donate_amount)->round(2)->get();
					   $price_amount = $convert * 100;
					   }
					   else
					   {
					   $price_amount = $donate_amount * 100;
					   }
					   $callback = $website_url.'/paystack';
					   $csf_token = csrf_token();
					   
					   $paystack = '<form method="post" id="stack_form" action="'.route('paystack').'">
							  <input type="hidden" name="_token" value="'.$csf_token.'">
							  <input type="hidden" name="email" value="'.$donate_email.'" >
							  <input type="hidden" name="order_id" value="'.$purchase_token.'">
							  <input type="hidden" name="amount" value="'.$price_amount.'">
							  <input type="hidden" name="quantity" value="1">
							  <input type="hidden" name="currency" value="NGN">
							  <input type="hidden" name="reference" value="'.$reference.'">
							  <input type="hidden" name="callback_url" value="'.$callback.'">
							  <input type="hidden" name="metadata" value="'.$purchase_token.'">
							  <input type="hidden" name="key" value="'.$setting['setting']->paystack_secret_key.'">
							</form>';
							$paystack .= '<script>window.stack_form.submit();</script>';
							echo $paystack;
					 
				  }
				  /* stripe code */
				  else if($payment_method == 'stripe')
				  {
					 
								 
						$stripe = array(
							"secret_key"      => $stripe_secret_key,
							"publishable_key" => $stripe_publish_key
						);
					 
						\Stripe\Stripe::setApiKey($stripe['secret_key']);
					 
						
						$customer = \Stripe\Customer::create(array(
							'email' => $donate_email,
							'source'  => $token
						));
					 
						
						$item_name = $product_names_data;
						$item_price = $donate_amount * 100;
						$currency = $site_currency;
						$order_id = $purchase_token;
					 
						
						$charge = \Stripe\Charge::create(array(
							'customer' => $customer->id,
							'amount'   => $item_price,
							'currency' => $currency,
							'description' => $item_name,
							'metadata' => array(
								'order_id' => $order_id
							)
						));
					 
						
						$chargeResponse = $charge->jsonSerialize();
					 
						
						if($chargeResponse['paid'] == 1 && $chargeResponse['captured'] == 1) 
						{
					 
							
												
							$payment_token = $chargeResponse['balance_transaction'];
							$payment_status = 'completed';
							$purchased_token = $order_id;
							$orderdata = array('donate_payment_token' => $payment_token, 'donate_payment_status' => $payment_status);
							Products::singledonateData($purchased_token,$orderdata);
							$sid = 1;
							$setting['setting'] = Settings::editGeneral($sid);
							$to_name = $setting['setting']->sender_name;
							$to_email = $setting['setting']->sender_email;
							$currency = $setting['setting']->site_currency_code;
							$from['info'] = Members::singlevendorData($user_id);
							$from_name = $from['info']->name;
							$from_email = $from['info']->email;
							$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
							Mail::send('donation_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
									$message->to($to_email, $to_name)
											->subject('Donation Payment Received');
									$message->from($from_email,$from_name);
								});
							 
							
							$data_record = array('payment_token' => $payment_token);
							return view('donate-success')->with($data_record);
							
							
						}
					 
				  
				  }
				 
		  }
		  else
		  {
		     $donate_txt = "Please enter donation amount greater than ".$setting['setting']->site_currency_symbol.$setting['setting']->site_minimum_donate;
		     return redirect()->back()->with('error', $donate_txt);
		  }
	   
	   
	
	
	}
	
	
	
	
	public function show_checkout()
	{
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $get_payment = explode(',', $setting['setting']->payment_option);
	  $cart['product'] = Products::getcartData();
	  $cart_count = Products::getcartCount();
	   $data = array('cart' => $cart, 'cart_count' => $cart_count, 'get_payment' => $get_payment);
	   
	   return view('checkout')->with($data);
	
	}
	
	
	public function flutterwaveCallback(Request $request)
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$payment_token = $request->input('transaction_id');
		$ord_token = $request->input('tx_ref');
		$pay_status = $request->input('status');
		if ($pay_status == 'successful') 
		{
		    $purchased_token = $ord_token;
			$payment_status = 'completed';
			$orderdata = array('payment_token' => $payment_token, 'product_order_status' => $payment_status);
			$checkoutdata = array('payment_token' => $payment_token, 'payment_status' => $payment_status);
			Products::singleordupdateData($purchased_token,$orderdata);
			Products::singlecheckoutData($purchased_token,$checkoutdata);
			$getbuyer['view'] = Products::getcheckoutData($purchased_token);
			$item_price = $getbuyer['view']->total_price;
			$to_name = $setting['setting']->sender_name;
			$to_email = $setting['setting']->sender_email;
			$currency = $setting['setting']->site_currency_code;
			$from['info'] = Members::singlevendorData($getbuyer['view']->user_id);
			$from_name = $from['info']->name;
			$from_email = $from['info']->email;
			$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
			Mail::send('admin_payment_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
									$message->to($to_email, $to_name)
											->subject('New Payment Received');
									$message->from($from_email,$from_name);
			});
							 
			$result_data = array('payment_token' => $payment_token);
			return view('success')->with($result_data);
	    }
		else
		{
		   return view('cancel');
		}
			
	}
	
	public function coinpayments($ord_token, Request $request)
	{
	$sid = 1;
	$setting['setting'] = Settings::editGeneral($sid);
	$payment_token = '';
	$purchased_token = $ord_token;
	$payment_status = 'completed';
	$orderdata = array('payment_token' => $payment_token, 'product_order_status' => $payment_status);
	$checkoutdata = array('payment_token' => $payment_token, 'payment_status' => $payment_status);
	Products::singleordupdateData($purchased_token,$orderdata);
	Products::singlecheckoutData($purchased_token,$checkoutdata);
	$getbuyer['view'] = Products::getcheckoutData($purchased_token);
	$item_price = $getbuyer['view']->total_price;
	
	$to_name = $setting['setting']->sender_name;
	$to_email = $setting['setting']->sender_email;
	$currency = $setting['setting']->site_currency_code;
	$from['info'] = Members::singlevendorData($getbuyer['view']->user_id);
	$from_name = $from['info']->name;
	$from_email = $from['info']->email;
	$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
	Mail::send('admin_payment_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
							$message->to($to_email, $to_name)
									->subject('New Payment Received');
							$message->from($from_email,$from_name);
	});
					 
	$result_data = array('payment_token' => $payment_token);
	return view('success')->with($result_data);
	}
	
	public function view_checkout(Request $request)
	{
	   
	   
	   $buyer_name = $request->input('buyer_name');
	   $buyer_phone = $request->input('buyer_phone');
	   $token = $request->input('token');
	   $buyer_email = $request->input('buyer_email');
	   $buyer_address = $request->input('buyer_address');
	   $buyer_country = $request->input('buyer_country');
	   $buyer_state = $request->input('buyer_state');
	   $buyer_city = $request->input('buyer_city');
	   $buyer_postcode = $request->input('buyer_postcode');
	   $buyer_notes = $request->input('buyer_notes');
	   $purchase_token = $this->generateRandomString();
	   $product_order_id = $request->input('product_order_id');
	   $product_token = $request->input('product_token');
	   $user_id = $request->input('user_id');
	   $shipping_price = base64_decode($request->input('shipping_price'));
	   $sub_total_price = base64_decode($request->input('sub_total_price'));
	   $total_price = base64_decode($request->input('total_price'));
	   $payment_method = $request->input('payment_method');
	   $website_url = URL::to('/');
	   $payment_date = date('Y-m-d');
	   $payment_status = 'pending';
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   
	   
	   
	   
	   $getcount  = Products::getcheckoutCount($purchase_token,$user_id,$payment_status);
	   
	   $savedata = array('purchase_token' => $purchase_token, 'product_token' => $product_token, 'product_order_id' => $product_order_id, 'user_id' => $user_id, 'shipping_price' => $shipping_price, 'sub_total_price' => $sub_total_price, 'total_price' => $total_price, 'payment_type' => $payment_method, 'payment_date' => $payment_date, 'buyer_name' => $buyer_name, 'buyer_phone' => $buyer_phone, 'buyer_email' => $buyer_email, 'buyer_country' => $buyer_country, 'buyer_state' => $buyer_state, 'buyer_city' => $buyer_city, 'buyer_postcode' => $buyer_postcode, 'buyer_address' => $buyer_address, 'buyer_notes' => $buyer_notes, 'payment_status' => $payment_status);
	   
	   $updatedata = array('product_token' => $product_token, 'product_order_id' => $product_order_id, 'shipping_price' => $shipping_price, 'sub_total_price' => $sub_total_price, 'total_price' => $total_price, 'payment_type' => $payment_method, 'payment_date' => $payment_date, 'buyer_name' => $buyer_name, 'buyer_phone' => $buyer_phone, 'buyer_email' => $buyer_email, 'buyer_country' => $buyer_country, 'buyer_state' => $buyer_state, 'buyer_city' => $buyer_city, 'buyer_postcode' => $buyer_postcode, 'buyer_address' => $buyer_address, 'buyer_notes' => $buyer_notes);
	   
	   
	   /* settings */
	   
	   $paypal_email = $setting['setting']->paypal_email;
	   $paypal_mode = $setting['setting']->paypal_mode;
	   $site_currency = $setting['setting']->site_currency_code;
	   if($paypal_mode == 1)
	   {
	     $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
	   }
	   else
	   {
	     $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
	   }
	   $success_url = $website_url.'/success/'.$purchase_token;
	   $cancel_url = $website_url.'/cancel';
	   
	   $stripe_mode = $setting['setting']->stripe_mode;
	   if($stripe_mode == 0)
	   {
	     $stripe_publish_key = $setting['setting']->test_publish_key;
		 $stripe_secret_key = $setting['setting']->test_secret_key;
	   }
	   else
	   {
	     $stripe_publish_key = $setting['setting']->live_publish_key;
		 $stripe_secret_key = $setting['setting']->live_secret_key;
	   }
	   
	   /* settings */
	   /* flutterwave */
	   $flutterwave_public_key = $setting['setting']->flutterwave_public_key;
	   $flutterwave_secret_key = $setting['setting']->flutterwave_secret_key;
	   /* flutterwave */
	   /* coinpayments */
	   $coinpayments_merchant_id = $setting['setting']->coinpayments_merchant_id;
	   $coinpayments_success_url = $website_url.'/coinpayments/'.$purchase_token;
	   /* coinpayments */
	   
	   
	   
	   if($getcount == 0)
	   {
	      Products::savecheckoutData($savedata);
		  
		  
		  $order_loop = explode(',',$product_order_id);
		  $item_token = "";
		  foreach($order_loop as $order)
		  {
		    $orderdata = array('purchase_token' => $purchase_token, 'payment_type' => $payment_method);
			Products::singleorderupData($order,$orderdata);
			
		   
		  }
		  
		  $order_product = explode(',',$product_token);
		  $product_name = "";
		  foreach($order_product as $prod_token)
		  {
		     $product['view'] = Products::singleProducts($prod_token);
			 $product_name .= $product['view']->product_name;
		  }
		  $product_names_data = rtrim($product_name,',');
		  if($payment_method == 'paypal')
		  {
		     
			 $paypal = '<form method="post" id="paypal_form" action="'.$paypal_url.'">
			  <input type="hidden" value="_xclick" name="cmd">
			  <input type="hidden" value="'.$paypal_email.'" name="business">
			  <input type="hidden" value="'.$product_names_data.'" name="item_name">
			  <input type="hidden" value="'.$purchase_token.'" name="item_number">
			  <input type="hidden" value="'.$total_price.'" name="amount">
			  <input type="hidden" value="'.$site_currency.'" name="currency">
			  <input type="hidden" value="'.$success_url.'" name="return">
			  <input type="hidden" value="'.$cancel_url.'" name="cancel_return">
			  		  
			</form>';
			$paypal .= '<script>window.paypal_form.submit();</script>';
			echo $paypal;
					 
			 
		  }
		  /* coinpayments */
		  else if($payment_method == 'coinpayments')
		  {
		     $coinpayments = '<form action="https://www.coinpayments.net/index.php" method="post" id="coinpayments_form">
								<input type="hidden" name="cmd" value="_pay">
								<input type="hidden" name="reset" value="1">
								<input type="hidden" name="merchant" value="'.$coinpayments_merchant_id.'">
								<input type="hidden" name="item_name" value="'.$product_names_data.'">	
								<input type="hidden" name="item_desc" value="'.$product_names_data.'">
								<input type="hidden" name="item_number" value="'.$purchase_token.'">
								<input type="hidden" name="currency" value="'.$site_currency.'">
								<input type="hidden" name="amountf" value="'.$total_price.'">
								<input type="hidden" name="want_shipping" value="0">
								<input type="hidden" name="success_url" value="'.$coinpayments_success_url.'">	
								<input type="hidden" name="cancel_url" value="'.$cancel_url.'">	
							</form>';
			$coinpayments .= '<script>window.coinpayments_form.submit();</script>';
			echo $coinpayments;				
		  }
		  /* coinpayments */
		   else if($payment_method == 'flutterwave')
		  {
		      if($site_currency != 'NGN')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('NGN')->amount($total_price)->round(2)->get();
			   $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $total_price;
			   }
		       $flutterwave_callback = $website_url.'/flutterwave';
			   $phone_number = "";
			   $csf_token = csrf_token();
			   $flutterwave = '<form method="post" id="flutterwave_form" action="https://checkout.flutterwave.com/v3/hosted/pay">
	          <input type="hidden" name="public_key" value="'.$flutterwave_public_key.'" />
	          <input type="hidden" name="customer[email]" value="'.$buyer_email.'" >
			  <input type="hidden" name="customer[phone_number]" value="'.$phone_number.'" />
			  <input type="hidden" name="customer[name]" value="'.$buyer_name.'" />
			  <input type="hidden" name="tx_ref" value="'.$purchase_token.'" />
			  <input type="hidden" name="amount" value="'.$price_amount.'">
			  <input type="hidden" name="currency" value="NGN">
			  <input type="hidden" name="meta[token]" value="'.$csf_token.'">
			  <input type="hidden" name="redirect_url" value="'.$flutterwave_callback.'">
			</form>';
			$flutterwave .= '<script>window.flutterwave_form.submit();</script>';
			echo $flutterwave;
			   
			   
			   
		  }
		  /* stripe code */
		  else if($payment_method == 'stripe')
		  {
		     
			 			 
				$stripe = array(
					"secret_key"      => $stripe_secret_key,
					"publishable_key" => $stripe_publish_key
				);
			 
				\Stripe\Stripe::setApiKey($stripe['secret_key']);
			 
				
				$customer = \Stripe\Customer::create(array(
					'email' => $buyer_email,
					'source'  => $token
				));
			 
				
				$item_name = $product_names_data;
				$item_price = $total_price * 100;
				$currency = $site_currency;
				$order_id = $purchase_token;
			 
				
				$charge = \Stripe\Charge::create(array(
					'customer' => $customer->id,
					'amount'   => $item_price,
					'currency' => $currency,
					'description' => $item_name,
					'metadata' => array(
						'order_id' => $order_id
					)
				));
			 
				
				$chargeResponse = $charge->jsonSerialize();
			 
				
				if($chargeResponse['paid'] == 1 && $chargeResponse['captured'] == 1) 
				{
			 
					
										
					$payment_token = $chargeResponse['balance_transaction'];
					$payment_status = 'completed';
					$purchased_token = $order_id;
					$orderdata = array('payment_token' => $payment_token, 'product_order_status' => $payment_status);
					$checkoutdata = array('payment_token' => $payment_token, 'payment_status' => $payment_status);
					Products::singleordupdateData($purchased_token,$orderdata);
					Products::singlecheckoutData($purchased_token,$checkoutdata);
					
					$token = $purchased_token;
					$sid = 1;
					$setting['setting'] = Settings::editGeneral($sid);
					$to_name = $setting['setting']->sender_name;
					$to_email = $setting['setting']->sender_email;
					$currency = $setting['setting']->site_currency_code;
					$from['info'] = Members::singlevendorData($user_id);
					$from_name = $from['info']->name;
					$from_email = $from['info']->email;
					$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
					Mail::send('admin_payment_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
							$message->to($to_email, $to_name)
									->subject('New Payment Received');
							$message->from($from_email,$from_name);
						});
					 
					
					$data_record = array('payment_token' => $payment_token);
					return view('success')->with($data_record);
					
					
				}
		     
		  
		  }
		  /* stripe code */
		  
		 
		  
	   }
	   else
	   {
	   
	      Product::updatecheckoutData($purchase_token,$user_id,$payment_status,$updatedata);
		  $order_loop = explode(',',$product_order_id);
		  $item_token = "";
		  foreach($order_loop as $order)
		  {
		    $orderdata = array('purchase_token' => $purchase_token, 'payment_type' => $payment_method);
			Products::singleorderupData($order,$orderdata);
			$product['name'] = Products::singleorderData($order);
			$item_token .= $product['name']->product_token;
		   
		  }
		  $item_names_data = rtrim($item_token,',');
		  $order_product = explode(',',$item_names_data);
		  $product_name = "";
		  foreach($order_product as $product)
		  {
		     $product['name'] = Products::singleProducts($product);
			 $product_name .= $product['name']->product_name;
		  }
		  $product_names_data = rtrim($product_name,',');
		  if($payment_method == 'paypal')
		  {
		     
			 $paypal = '<form method="post" id="paypal_form" action="'.$paypal_url.'">
			  <input type="hidden" value="_xclick" name="cmd">
			  <input type="hidden" value="'.$paypal_email.'" name="business">
			  <input type="hidden" value="'.$product_names_data.'" name="item_name">
			  <input type="hidden" value="'.$purchase_token.'" name="item_number">
			  <input type="hidden" value="'.$total_price.'" name="amount">
			  <input type="hidden" value="'.$site_currency.'" name="currency">
			  <input type="hidden" value="'.$success_url.'" name="return">
			  <input type="hidden" value="'.$cancel_url.'" name="cancel_return">
			  		  
			</form>';
			$paypal .= '<script>window.paypal_form.submit();</script>';
			echo $paypal;
					 
			 
		  }
		  /* stripe code */
		  else if($payment_method == 'stripe')
		  {
		     
			 			 
				$stripe = array(
					"secret_key"      => $stripe_secret_key,
					"publishable_key" => $stripe_publish_key
				);
			 
				\Stripe\Stripe::setApiKey($stripe['secret_key']);
			 
				
				$customer = \Stripe\Customer::create(array(
					'email' => $buyer_email,
					'source'  => $token
				));
			 
				
				$item_name = $product_names_data;
				$item_price = $total_price * 100;
				$currency = $site_currency;
				$order_id = $purchase_token;
			 
				
				$charge = \Stripe\Charge::create(array(
					'customer' => $customer->id,
					'amount'   => $item_price,
					'currency' => $currency,
					'description' => $item_name,
					'metadata' => array(
						'order_id' => $order_id
					)
				));
			 
				
				$chargeResponse = $charge->jsonSerialize();
			 
				
				if($chargeResponse['paid'] == 1 && $chargeResponse['captured'] == 1) 
				{
			 
					
										
					$payment_token = $chargeResponse['balance_transaction'];
					$payment_status = 'completed';
					$purchased_token = $order_id;
					$orderdata = array('payment_token' => $payment_token, 'product_order_status' => $payment_status);
					$checkoutdata = array('payment_token' => $payment_token, 'payment_status' => $payment_status);
					Products::singleordupdateData($purchased_token,$orderdata);
					Products::singlecheckoutData($purchased_token,$checkoutdata);
					
					$token = $purchased_token;
					$sid = 1;
					$setting['setting'] = Settings::editGeneral($sid);
					$to_name = $setting['setting']->sender_name;
					$to_email = $setting['setting']->sender_email;
					$currency = $setting['setting']->site_currency_code;
					$from['info'] = Members::singlevendorData($user_id);
					$from_name = $from['info']->name;
					$from_email = $from['info']->email;
					$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
					Mail::send('admin_payment_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
							$message->to($to_email, $to_name)
									->subject('New Payment Received');
							$message->from($from_email,$from_name);
						});
					 
					
					$data_record = array('payment_token' => $payment_token);
					return view('success')->with($data_record);
					
					
				}
		     
		  
		  }
		  /* stripe code */

		  
		  
	   }
	   return view('checkout');
	
	
	}
	
	public function paypal_success($ord_token, Request $request)
	{
	
	$payment_token = $request->input('tx');
	$purchased_token = $ord_token;
	$payment_status = 'completed';
	$orderdata = array('payment_token' => $payment_token, 'product_order_status' => $payment_status);
	$checkoutdata = array('payment_token' => $payment_token, 'payment_status' => $payment_status);
	Products::singleordupdateData($purchased_token,$orderdata);
	Products::singlecheckoutData($purchased_token,$checkoutdata);
	$getbuyer['view'] = Products::getcheckoutData($purchased_token);
	$item_price = $getbuyer['view']->total_price;
	$sid = 1;
	$setting['setting'] = Settings::editGeneral($sid);
	$to_name = $setting['setting']->sender_name;
	$to_email = $setting['setting']->sender_email;
	$currency = $setting['setting']->site_currency_code;
	$from['info'] = Members::singlevendorData($getbuyer['view']->user_id);
	$from_name = $from['info']->name;
	$from_email = $from['info']->email;
	$data = array('to_name' => $to_name, 'to_email' => $to_email, 'item_price' => $item_price, 'currency' => $currency);
	Mail::send('admin_payment_mail', $data , function($message) use ($from_name, $from_email, $to_name, $to_email) {
							$message->to($to_email, $to_name)
									->subject('New Payment Received');
							$message->from($from_email,$from_name);
	});
					 
	$result_data = array('payment_token' => $payment_token);
	return view('success')->with($result_data);
	
	}
	
	public function payment_cancel()
	{
	  return view('cancel');
	}
	
	public function remove_cart_item($ordid)
	{
	  
	   $ord_id = base64_decode($ordid); 
	   Products::deletecartdata($ord_id);
	  
	  return redirect()->back()->with('success', 'Product has been removed');
	  
	}
	
	
	public function view_cart(Request $request)
	{
	  $product_user_id = $request->input('product_user_id');
	  $product_token = $request->input('product_token');
	  $product_id = $request->input('product_id');
	  $purchase_token = $this->generateRandomString();
	  $product_quantity = $request->input('product_quantity');
	  $product_price = $request->input('product_price');
	  $product_shipping = $request->input('product_shipping');
	  $product_subtotal = $product_price * $product_quantity;
	  $product_total = $product_subtotal + $product_shipping;
	  $product_order_status = 'pending';
	   
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   
	   $getcount  = Products::getorderCount($product_token,$product_user_id,$product_order_status);
	   
	   $savedata = array('product_id' => $product_id, 'product_user_id' => $product_user_id, 'product_token' => $product_token, 'purchase_token' => $purchase_token, 'product_quantity' => $product_quantity, 'product_price' => $product_price, 'product_shipping' => $product_shipping, 'product_subtotal' => $product_subtotal, 'product_total' => $product_total, 'product_order_status' => $product_order_status);
	   
	   
	   $updatedata = array('product_id' => $product_id, 'purchase_token' => $purchase_token, 'product_quantity' => $product_quantity, 'product_price' => $product_price, 'product_shipping' => $product_shipping, 'product_subtotal' => $product_subtotal, 'product_total' => $product_total);
	   
	   if($getcount == 0)
	   {
	      Products::savecartData($savedata);
		 
		  return redirect('cart')->with('success','Product has been added to cart'); 
	   }
	   else
	   {
	      Products::updatecartData($product_token,$product_user_id,$product_order_status,$updatedata);
		  
		  return redirect('cart')->with('success','Product has been updated to cart'); 
	   }
	   
	   
	  
	
	}
	
	
	
	public function insert_product_comment(Request $request)
	{
	   $user_id = $request->input('user_id');
	   $comment_content = $request->input('comment_content');
	   $product_token = $request->input('product_token');
	   $comment_date = date('Y-m-d');
	   
	   $data = array('product_token' => $product_token, 'user_id' => $user_id, 'product_comment_content' => $comment_content, 'product_comment_date' => $comment_date);
	   Products::savecommentData($data);
	   return redirect()->back()->with('success', 'Thanks for your comments. Once admin will approved your comment. will publish on this product.');
	
	}
    
    	
	public function view_myprofile()
	{
	
	  
	  return view('profile');
	  
	
	}
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	
	public function update_myprofile(Request $request)
	{
	
	   $name = $request->input('name');
	   $username = $request->input('username');
         $email = $request->input('email');
		 
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 
		 		 
		  $token = $request->input('edit_id');
		  $image_size = $request->input('image_size');
		 
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:6',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droPhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'password' => $pass, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));
 
            
            
			Members::updateData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	
	
}
