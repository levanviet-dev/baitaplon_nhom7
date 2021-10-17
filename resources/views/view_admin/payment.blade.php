@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            Payment <span class="badge"></span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                <div class="panel-body">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                               <div class="form-group">
                                 <label for="">Search</label>
                                 <input type="text">
                                 <button type="submit">Search</button>
                               </div>
                               <table class="table">
                                <thead>
                                    <tr>
                                                <th>Name</th>
                                                <th>Card number</th>
                                                <th>Address</th>
                                                <th>Room </th>
                                                <th>Service</th>
                                                <th>Phone number</th>
                                                <th>Total price</th>
                                                <th>More</th>

                                    </tr>
                                </thead>
                                <tbody id="booked">

                                   

                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">More Action</a>
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
                            Payed <span class="badgeroom"></span>
                        </button>

                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                  <div class="form-group">
                    <label for="">Search</label>
                    <input type="text"
                      name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <h3>Danh sách phòng trống</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Loại Phòng</th>
                                <th>Số phòng</th>
                                <th>Số người</th>
                                <th>Số giường</th>
                                <th>Trạng thái</th>
                                <th>More</th>
                                
                            </tr>
                        </thead>
                        <tbody id="rooms">
                     
                        </tbody>
                        
                    </table>

                </div>

            </div>

        </div>
     
<div class="container">
    <!-- Trigger the modal with a button -->
   
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    




<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>


 </script>



    @endsection