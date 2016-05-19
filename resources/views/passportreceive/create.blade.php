@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <div class="panel-heading clear-fix">
                    <h3 class="panel-title pull-left">{{$title}}</h3>
                    <span class="pull-right">
                        <a href="{{route('passportreceive.index')}}" class="btn btn-primary">View All</a>
                    </span>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'passportreceive.store', 'class' => 'form-horizontal','files' => true)) !!}

        <!-- input for tiltle -->

                    <div class="form-group">
                        {!! Form::label('name', 'Name : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'Name', 'required')) !!}
                        </div>
                    </div>
        <!-- input for description -->
                    <div class="form-group">
                        {!! Form::label('passport_no', 'Passport No : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('passport_no', null, array('class' => 'form-control',  'placeholder' => 'Passport No', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('broker_name', 'Broker Name : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('broker_name', null, array('class' => 'form-control',  'placeholder' => 'Broker Name', 'required')) !!}
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        {!! Form::label('password', 'Password :', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required')) !!}
                        </div>
                    </div> -->

        <!-- input for price -->           

                    <!-- <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm', 'required')) !!}
                        </div>
                    </div> -->

        <!-- input for status -->

                    

        <!-- image upload  -->

                    <!-- <div class="form-group">
                        {!! Form::label('img_link', "Upload Card Image*", array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::file('img_link', array( 'class' => 'file-loading' , 'multiple'=>false, 'id' => 'input-4' )) !!}
                        </div>
                    </div> -->
                      
        <!-- submit button  -->       

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                
            </section>
        </div>
    </div>
@stop



@section('style')
  

@stop



@section('script')

    <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap.js')}}"></script>

   
    <!-- image drag&drop and upload plugin  -->

    <script>
        $(document).on('ready', function() {
            $("#input-4").fileinput({showCaption: false});
        });
    </script>    
    
@stop
