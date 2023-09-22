<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ __('Event Booking') }}</title>
    
</head>

<body class="preload dashboard-upload">

    
    
    
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ __('Event Booking') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p>Your event booking seats has been approved.</p>   
                        
                        <p><strong> Event Url : </strong> <a href="{{ $event_url }}" target="_blank">{{ $event_url }}</a></p> 
                        <p><strong> Your Booked Seats : </strong>{{ $booking_seats }}</p>  
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
    
    
   

    
</body>

</html>