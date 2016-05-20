@extends('layouts.default')

@section('content')
    <div class="wraper container-fluid">
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="bg-picture" style="background-image:url('img/bg_6.jpg')">
                      <span class="bg-picture-overlay"></span>
                      
                      <div class="box-layout meta bottom">
                        <div class="col-sm-6 clearfix">
                          <span class="img-wrapper pull-left m-r-15"><img src="{{asset('img/avatar-2.jpg')}}" alt="" style="width:64px" class="br-radius"></span>
                          <div class="media-body">
                            <h3 class="text-white mb-2 m-t-10 ellipsis">Jonathan Deo</h3>
                            <h5 class="text-white"> Mycityname</h5>
                          </div>
                        </div>
                        <div class="col-sm-6">

                          <div class="pull-right">
                            <div class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle btn btn-primary" href="#"> Following <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a href="#">Poke</a></li>
                                    <li><a href="#">Private message</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Unfollow</a></li>
                                </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
            </div> -->

            <div class="row m-t-30">
                <div class="col-sm-12">
                    <div class="panel panel-default p-0">
                        <div class="panel-body p-0"> 
                            <ul class="nav nav-tabs profile-tabs">
                                <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
                                <!-- <li class=""><a data-toggle="tab" href="#user-activities">Activities</a></li> -->
                                <!-- <li class=""><a data-toggle="tab" href="#edit-profile">Settings</a></li> -->
                                <!-- <li class=""><a data-toggle="tab" href="#projects">Projects</a></li> -->
                                <li class=""><a href="{{route('example.index')}}">View All</a></li>
                            </ul>

                            <div class="tab-content m-0"> 

                                <!-- About Me Div -->
                                <div id="details" class="tab-pane active">
                                    <div class="profile-desk">
                                        <!-- <h1>Johnathan Deo</h1>
                                        <span class="designation">PRODUCT DESIGNER (UX / UI / Visual Interaction)</span>
                                        <p>
                                            I have 10 years of experience designing for the web, and specialize in the areas of user interface design, interaction design, visual design and prototyping. I’ve worked with notable startups including Pearl Street Software.
                                        </p>
                                        <a class="btn btn-primary m-t-20" href="#"> <i class="fa fa-check"></i> Following</a>
 -->
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th colspan="3"><h3>Detail Information of Example</h3></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Title</b></td>
                                                    <td>
                                                    <a href="#" class="ng-binding">
                                                        {!!$example->title!!}
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Description</b></td>
                                                    <td>
                                                    <a href="#" class="ng-binding">
                                                        {!!$example->description!!}
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Status</b></td>
                                                    <td>
                                                    <a href="#" class="ng-binding">
                                                        {!!$example->status!!}
                                                    </a></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div> 
                                

                            <!-- Activities -->
                           

                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane">
                                <div class="user-profile-content">
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="FullName">Full Name</label>
                                            <input type="text" value="John Doe" id="FullName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">Username</label>
                                            <input type="text" value="john" id="Username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="RePassword">Re-Password</label>
                                            <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">About Me</label>
                                            <textarea style="height: 125px;" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>


                            <!-- profile -->
                            <div id="projects" class="tab-pane">
                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <div class="portlet"><!-- /primary heading -->
                                            <div id="portlet2" class="panel-collapse collapse in">
                                                <div class="portlet-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Project Name</th>
                                                                    <th>Start Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Status</th>
                                                                    <th>Assign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Velonic Admin</td>
                                                                    <td>01/01/2015</td>
                                                                    <td>07/05/2015</td>
                                                                    <td><span class="label label-info">Work in Progress</span></td>
                                                                    <td>Coderthemes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Velonic Frontend</td>
                                                                    <td>01/01/2015</td>
                                                                    <td>07/05/2015</td>
                                                                    <td><span class="label label-success">Pending</span></td>
                                                                    <td>Coderthemes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Velonic Admin</td>
                                                                    <td>01/01/2015</td>
                                                                    <td>07/05/2015</td>
                                                                    <td><span class="label label-pink">Done</span></td>
                                                                    <td>Coderthemes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Velonic Frontend</td>
                                                                    <td>01/01/2015</td>
                                                                    <td>07/05/2015</td>
                                                                    <td><span class="label label-purple">Work in Progress</span></td>
                                                                    <td>Coderthemes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Velonic Admin</td>
                                                                    <td>01/01/2015</td>
                                                                    <td>07/05/2015</td>
                                                                    <td><span class="label label-warning">Coming soon</span></td>
                                                                    <td>Coderthemes</td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- /Portlet -->
                                    </div>
                                </div>
                            </div>
                        </div>
         
                    </div> 
                </div>
            </div>
        </div>
    </div>


 


@stop




@section('script')
    <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap.js')}}"></script>

   
    <!-- image drag&drop and upload plugin  -->

    <script>
        $(document).on('ready', function() {
            // $("#input-4").fileinput({showCaption: false});
        });
    </script> 

@stop


