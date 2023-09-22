<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use MyJesus\Models\Pages;
use MyJesus\Models\Settings;
use MyJesus\Models\Events;
use MyJesus\Models\Members;
use MyJesus\Models\Category;
use MyJesus\Models\Sermons;
use MyJesus\Models\Products;
use Auth;
use Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
    public function admin()
    {
        
		
	  $total_customers = Members::totaluserCount();
	  $total_sermons = Sermons::totalSermons();
	  $total_events = Events::totalEvent();
	  $total_products = Products::totalProducs();
	  $total_orders = Products::totalOrders();
	  $total_event_booking = Events::totalEventBooking();
	  $total_pastors = Events::totalPastors();
	  $total_donation = Events::totalDonation();
	  
	  $recentevent['view'] = Events::recenteventBooking();
	  $donateData['view'] = Pages::recentdonateData();
	  
	  $data = array('total_customers' => $total_customers,  'total_sermons' => $total_sermons, 'total_events' => $total_events, 'total_products' => $total_products, 'total_orders' => $total_orders, 'total_event_booking' => $total_event_booking, 'total_pastors' => $total_pastors, 'total_donation' => $total_donation, 'recentevent' => $recentevent, 'donateData' => $donateData);
	  return view('admin.index')->with($data);
	
		
		
    }
}
