<?php

namespace MyJesus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use MyJesus\Models\Pages;
use MyJesus\Models\Settings;
use MyJesus\Models\Members;
use PaytmWallet;
use URL;
use Mail;

class PaytmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function order(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'mobile_number' => 'required',
            
        ]);

        $url = URL::to("/");
        $input = $request->all();
        $order_id = $input['order_id'];
		$name = $input['name'];
		$mobile_number = $input['mobile_number'];
		$amount = $input['amount'];
		$email = $input['email'];
        $currency = $input['currency'];
		

        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $order_id,
          'user' => $name,
          'mobile_number' => $mobile_number,
		  'currency' => $currency,
          'email' => $email,
          'amount' => $amount,
		  'callback_url' => $url.'/paytm/status'
        ]);
        return $payment->receive();
    }
	
	
	public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();
        $purchase_token = $transaction->getOrderId();
		$payment_id = $transaction->getTransactionId();


        if($transaction->isSuccessful())
		{
          $donation['data'] = Causes::singledataDonor($purchase_token);
		  $user_id = $donation['data']->donor_cause_user_id;
		  $donor_amount = $donation['data']->donor_amount;
		  $checkcount = Causes::checkuserSubscription($user_id);
		  $cause_id = $donation['data']->donor_cause_id;
		  $cause['details'] = Causes::singleCausesdetails($cause_id);
		  $sid = 1;
	      $setting['setting'] = Settings::editGeneral($sid);
		  $commission = ($setting['setting']->site_admin_commission * $donor_amount) / 100;
		  $user_amount = $donor_amount - $commission;
		  $admin_amount = $commission;
		  $user_data['view'] = Members::singlebuyerData($user_id);
		  $user_old_amount = $user_data['view']->earnings + $user_amount;
		  $admin_details['view'] = Members::adminData();
		  $admin_old_amount = $admin_details['view']->earnings + $admin_amount;
		  $user_record = array('earnings' => $user_old_amount);
		  Members::updateuserPrice($user_id, $user_record);
		  $admin_data = array('earnings' => $admin_old_amount);
		  Members::updateuserPrice(1, $admin_data);
		  $check_email_support = Members::getuserSubscription($user_id);
		  if($check_email_support == 1)
		  {   
				$donor_payment_amount = $donor_amount;
				$admin_name = $setting['setting']->sender_name;
				$admin_email = $setting['setting']->sender_email;
				$currency_symbol = $setting['setting']->site_currency_symbol;
				$cause_url = URL::to('/cause/').$cause['details']->cause_slug;
				$record = array('donor_payment_amount' => $donor_payment_amount, 'currency_symbol' => $currency_symbol, 'cause_url' => $cause_url);
				$to_name = $user_data['view']->name;
				$to_email = $user_data['view']->email;
				Mail::send('donation_mail', $record, function($message) use ($admin_name, $admin_email, $to_email, $to_name) {
				$message->to($to_email, $to_name)
					->subject('Donation payment received');
					$message->from($admin_email,$admin_name);
					});
		  }
			
		  
		  $donor_no = $donation['data']->donor_id;
		  $cause_no = $donation['data']->donor_cause_id;
	      $cause['data'] = Causes::getCausedata($cause_no);
	      $cause_raised = $cause['data']->cause_raised;
	      $fin_amount = $cause_raised + $donor_amount;
	      $data = array('cause_raised' => $fin_amount);
	      Causes::updatecausePrice($cause_no,$data);
	      $checkoutdata = array("donor_payment_status" => "completed", "donor_payment_token" => $payment_id);
	      Causes::updatedonorRecord($donor_no,$checkoutdata);
		  $data_record = array('payment_id' => $payment_id);
          return view('paytm_success')->with($data_record);
        
          
        }else if($transaction->isFailed()){
            
          return view('cancel');
        }
    }    
	
	
	
	public function paytm_success($payment_id)
	{
	$data_record = array('payment_id' => $payment_id);
    return view('paytm_success')->with($data_record);
	}
	
	
}
