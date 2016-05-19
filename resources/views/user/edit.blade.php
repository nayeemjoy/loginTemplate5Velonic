@extends('admin.layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('cards.index') }}">Card Type List</a>

					</span>
                </header>
                <div class="panel-body">
                   

                    {{Form::model($card,['route' => ['cards.update',$card->id], 'class' => 'form-horizontal', 'method' => 'put', 'files' => true ])}}

                    

                 <!-- input for tiltle -->

                            <div class="form-group">
                                {{ Form::label('title', 'Cards Title*', array('class' => 'col-md-2 control-label')) }}
                                <div class="col-md-4">
                                    {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Card Title', 'required')) }}
                                </div>
                            </div>

                <!-- input for description -->

                            <div class="form-group">
                                {{ Form::label('description', 'Cards Description*', array('class' => 'col-md-2 control-label')) }}
                                <div class="col-md-4">
                                    {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'Card Description', 'required')) }}
                                </div>
                            </div>

                <!-- input for price -->           

                            <div class="form-group">
                                {{ Form::label('price', 'Cards Price*', array('class' => 'col-md-2 control-label')) }}
                                <div class="col-md-4">
                                    {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Card Price')) }}
                                </div>
                            </div>

                <!-- input for status -->

                            <div class="form-group">
                                {{ Form::label('status', 'Cards Status*', array('class' => 'col-md-2 control-label')) }}
                                <div class="col-md-4">
                                    {{ Form::select('status', $status, null, array('class' => 'form-control', 'placeholder' => 'Cards Status')) }}
                                </div>
                            </div>


                <!-- image upload  -->
                            
                            <div class="form-group">
                                {{ Form::label('img_link', "Change Card Image*", array('class' => 'col-md-2 control-label')) }}
                                <div class="col-md-4">
                                    <div id="preimg">
                                    {{ HTML::image($card->img_link, $card->title, [ 'class'=> 'img-responsive', 'width' => '230' , 'height' => '236']) }}<br>
                                    </div>
                                    {{ Form::file('img_link', array( 'class' => 'file-loading' , 'multiple'=>false, 'id' => 'input-4' )) }}
                                </div>
                            </div>

                <!-- submit button  -->

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                                </div>
                            </div>

                    {{ Form::close() }}
                       

                </div>
            </section>
        </div>
    </div>
@stop

@section('style')
 
    {{ HTML::style('rename/css/fileinput.min.css') }}

@stop

@section('script')


    {{ HTML::script('rename/js/fileinput_locale_<lang>.js') }}
    {{ HTML::script('rename/js/fileinput.min.js') }}
 

    <script>
    $(document).on('ready', function() {
        $("#input-4").fileinput({showCaption: false});
    });
    </script>

    <script>
        $(document).on('ready', function() {
            $("#input-4").click(function(){
                $("#preimg").fadeOut("1000");
                
              //  $("#div2").fadeOut("slow");
             //   $("#div3").fadeOut(3000);
            });
        });
    </script>

@stop