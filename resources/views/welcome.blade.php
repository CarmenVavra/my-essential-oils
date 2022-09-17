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
                <h1>Ätherische Öle</h1>
                <hr>

                <div class="row py-4">
                    <div class="col-md-2 wdr-bg-row2-transparent">
                        <h3>Überschrift</h3>
                        <p class="welcome-left-text">Scent is our most primitive sense. It's the closest thing to the emotional brain. </p>
                        <p class="welcome-left-text">I have an oil for that.</p>
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
                                <div class="welcome-deco-right row background">
                                    <div class="col wdr-bg-row5 transbox">
                                        <p class="welcome_brand_text">Essential Oils App - Carmen Vavra</p>
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