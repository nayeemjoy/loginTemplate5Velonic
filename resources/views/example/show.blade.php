@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm btn-new-user" href="{{ URL::route('cards.create') }}">Add New Card</a>

                    </span>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4><b> Card Name:</b> {{ $card->title }}</h4><br>
                            <h4><b> Description:</b> {{ $card->description }}</h4><br>
                            <h4><b> Price of the Card ( BDT ) : </b> {{ $card->price }}</h4><br>
                            <h4><b> Card Status: </b> {{ $status[$card->status] }}</h4><br>
                        </div>
                        <div class="col-md-4">
                            {{ HTML::image($card->img_link, $card->title, ['class'=> 'img-responsive', 'width' => '230' , 'height' => '236']) }}
                        </div>
                    
                    </div>
                
                    <span class="pull-left">
                        <a class="btn btn-xs btn-success btn-edit" href="{{ URL::route('cards.edit', array('id' => $card->id)) }}">Edit This Card</a>

                    </span>
                    <br>
                    <span class="pull-right">
                        <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{{ $card->id }}">Delete This Card</a>

                    </span>
                </div>
            </section>
        </div>
    </div>


 


@stop


@section('style')
    {{ HTML::style('assets/data-tables/DT_bootstrap.css') }}

@stop


@section('script')
    {{ HTML::script('assets/data-tables/jquery.dataTables.js') }}
    {{ HTML::script('assets/data-tables/DT_bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
           
        });
    </script>

@stop


