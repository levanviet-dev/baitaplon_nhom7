@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            New Room Bookings <span class="badge"></span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                <div class="panel-body">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Room</th>
                                            <th>Bedding</th>
                                            <th>Meal</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Status</th>
                                            <th>More</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                   

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>
            </div>
        </div>
       
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                        <button class="btn btn-primary" type="button">
                            Booked Rooms <span class="badge"></span>
                        </button>

                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                    

                </div>

            </div>

        </div>
        
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                        <button class="btn btn-primary" type="button">
                            Followers <span class="badge">5</span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Follow Start</th>
                                        <th>Permission status</th>


                                    </tr>
                                </thead>
                                <tbody>

                                   

                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">More Action</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection