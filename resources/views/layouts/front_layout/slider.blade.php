<section class="slider_section">
    <div class="banner_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mapimg">
                    <div class="text-bg">
                        <h1>తొగట వీర <br> <strong class="black_bold">క్షత్రియ</strong><br></h1>

                            @if(Auth::check())
                              
                              <a href="{{url('/admin/home')}}">Census <i class='fa fa-angle-right'></i></a>

                            @else
                            <a href="{{url('/login-register')}}">Login <i class='fa fa-angle-right'></i></a>
                            @endif
                        
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="text-img">
                        <figure><img src="{{asset('images/front_images/img/front.png')}}" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>