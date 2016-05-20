@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <div class="panel-heading clear-fix">
                    <h3 class="panel-title pull-left">{{$title}}</h3>
                    <span class="pull-right">
                        <a href="{{route('example.index')}}" class="btn btn-primary">View All</a>
                    </span>
                </div>
                <div class="panel-body">
                    
                    {!! Form::open(array('route' => 'example.store', 'class' => 'form-horizontal','files' => true)) !!}

       
                    <div class="form-group">
                        {!! Form::label('title', 'Title : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('title', null, array('class' => 'form-control',  'placeholder' => 'Title', 'required')) !!}
                        </div>
                    </div>
        
                    <div class="form-group">
                        {!! Form::label('description', 'Description : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('description', null, array('class' => 'form-control',  'placeholder' => 'Description', 'required')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status : ', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::select('status',$statuses, 1, array('class' => 'form-control')) !!}
                        </div>
                    </div>       

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
