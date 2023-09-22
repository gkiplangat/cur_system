<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(59,$translate,'') }}</title>
    
</head>

<body class="preload dashboard-upload">

    
    
    
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ Helper::translation(59,$translate,'') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p> {{ Helper::translation(24,$translate,'') }} : {{ $from_name }}</p>
                        <p> {{ Helper::translation(26,$translate,'') }} : {{ $from_email }}</p>
                        <p> {{ Helper::translation(67,$translate,'') }} : {{ $booking_seats }}</p>
                        <p> {{ Helper::translation(68,$translate,'') }} : <a href="{{ $event_url }}" target="_blank">{{ $event_url }}</a> </p>
                           
                            
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
    
    
   

    
</body>

</html>