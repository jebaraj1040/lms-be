@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two"  style="float: left; width: 100%;">
                <img src="{{url('/')}}/assets/img/product.png"  style="margin-top: 15px;">       
                <div class="widget-heading" style="float: right; margin-bottom: 0; text-align: right;">
                    <h5 class=""><a href="{{route('admin.courses.index')}}">Course</a></h5>
                    <h1>{{$courses}}</h1>               
                </div>                       
            </div>
        </div>

        
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two"  style="float: left; width: 100%;">
                <img src="{{url('/')}}/assets/img/feedback.png" style="margin-top: 15px;">
                <div class="widget-heading" style="float: right; margin-bottom: 0; text-align: right;">
                    <h5 class=""><a href="{{route('admin.employees.index')}}">Employees</a></h5>
                    <h1>{{$employees}}</h1>   
                </div>                          
            </div>
        </div>
    </div>
</div>
@endsection
