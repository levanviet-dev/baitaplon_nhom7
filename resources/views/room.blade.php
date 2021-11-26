<div class="plans-section" id="rooms">
    <div class="container">
        <h3 class="title-w3-agileits title-black-wthree">Loại phòng phục vụ</h3>
        <div class="priceing-table-main">
                 @foreach ($data as $item)
                      <div class="col-md-3 price-grid">
             {{--  --}}
          
           
             <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="{{$item['Anh']}}" alt=" " class="img-responsive"  style="width: 25em;height: 15em;"/>
                        <h4>{{$item['TenPhong']}}</h4>
                    </div>
                    <div class="price-gd-bottom">
                        <div class="price-list">
                            {{-- <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>

                            </ul> --}}
                        </div>
                        <div class="price-selet">
                            <h3><span>{{number_format($item['GiaTien'])}} </span>VNĐ</h3>
                            <a href="booking">Đặt phòng</a>
                        </div>
                    </div>
                </div>
            </div>


                 @endforeach   
  
           
             {{-- <div class="col-md-3 price-grid ">
                <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="{{url('public/sites')}}/images/r2.jpg" alt=" " class="img-responsive" />
                        <h4>Luxury Room</h4>
                    </div>
                    <div class="price-gd-bottom">
                        <div class="price-list">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="price-selet">
                            <h3><span>$</span>220</h3>
                            <a href="booking">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 price-grid lost">
                <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="{{url('public/sites')}}/images/r3.jpg" alt=" " class="img-responsive" />
                        <h4>Guest House</h4>
                    </div>
                    <div class="price-gd-bottom">
                        <div class="price-list">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="price-selet">
                            <h3><span>$</span>180</h3>
                            <a href="booking">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 price-grid wthree lost">
                <div class="price-block agile">
                    <div class="price-gd-top ">
                        <img src="{{url('public/sites')}}/images/r4.jpg" alt=" " class="img-responsive" />
                        <h4>Single Room</h4>
                    </div>
                    <div class="price-gd-bottom">
                        <div class="price-list">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="price-selet">
                            <h3><span>$</span> 150</h3>
                            <a href="booking">Book Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}
           
           {{--  --}}
            <div class="clearfix"> </div>
        </div>
    </div>
</div>