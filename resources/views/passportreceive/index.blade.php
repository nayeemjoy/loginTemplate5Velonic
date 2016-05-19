@extends('layouts.default')
@section('content')
    @include('includes.alert')
    <div class="container-fluid">
        <!-- <div class="page-title"> 
            <h3 class="title">{{$title}}</h3>
            <a class="btn btn-danger deleteBtn pull-right">Create Manager</a> 
        </div> -->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clear-fix">
                        <h3 class="panel-title pull-left">{{$title}}</h3>
                        <span class="pull-right">
                            <a href="{{route('passportreceive.create')}}" class="btn btn-primary">Create Passport Receive</a>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Passport No</th>
                                            <!-- <th>Query</th> -->
                                            <th>Broker Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                             
                                    <tbody>
                                        @foreach($passport_receives as $passport_receive)
                                            <tr>

                                                <td>{{$passport_receive->id}}</td>
                                                <td>{{$passport_receive->name}}</td>
                                                <td>{{$passport_receive->passport_no}}</td>
                                                <td>{{$passport_receive->broker_name}}</td>
                                                <!-- <td>Description</td> -->
                                                <td class="actions">
                                                    <a href="{{route('passportreceive.edit',$passport_receive->id)}}" class="btn btn-info">Edit</a>
                                                    <a href="#" class="btn btn-danger deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{{ $passport_receive->id }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- End Row -->

        

    </div>
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('route' => array('passportreceive.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {!! Form::submit('Yes, Delete', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('script')

    <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        });
        $(document).on("click", ".deleteBtn", function() {
            var deleteId = $(this).attr('deleteId');
            var url = "<?php echo URL::route('passportreceive.delete',false); ?>";
            $(".deleteForm").attr("action", url+'/'+deleteId);
        });
    </script>
@stop