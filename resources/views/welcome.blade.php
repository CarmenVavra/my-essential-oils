{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Essential Oils</title>
    </head>
    <body class="antialiased"> --}}
        @extends('layouts.welcome')
        @section('content')
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/img/welcome.jpg') }}" alt="Card image">
                            <div class="card-img-overlay">
                                <div class="welcome-deco-right row">
                                    <div class="col-md-4">&nbsp;</div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>                                    
                                </div>
                                <div class="welcome-deco-right row">
                                    <div class="col-md-4">&nbsp;</div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>                                    
                                </div>
                                <div class="welcome-deco-right row">
                                    <div class="col-md-4">&nbsp;</div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>                                    
                                </div>
                                <div class="welcome-deco-right row">
                                    <div class="col-md-4">&nbsp;</div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>                                    
                                </div>
                                <div class="welcome-deco-right row">
                                    <div class="col wdr-bg-row5 ">
                                        <p class="welcome_brand_text">Essential Oils by Carmen Vavra</p>
                                    </div>
                                </div>


{{--                             <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <a href="#" class="btn btn-primary">See Profile</a> --}}
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-2">
                        <div class="welcome-deco-right row py-2-bottom">
                            <div class="col wdr-bg-row1">
                                &nbsp;
                            </div>
                        </div>
                        <div class="welcome-deco-right row py-2-bottom">
                            <div class="col wdr-bg-row2">
                                &nbsp;
                            </div>
                        </div>
                        <div class="welcome-deco-right row py-2-bottom">
                            <div class="col wdr-bg-row3">
                                &nbsp;
                            </div>
                        </div>
                        <div class="welcome-deco-right row py-2-bottom">
                            <div class="col wdr-bg-row4">
                                &nbsp;
                            </div>
                        </div>
                        <div class="welcome-deco-right row py-2-top">
                            <div class="col wdr-bg-row5">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        {{--     </body>
</html>
 --}}