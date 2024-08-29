@extends('admin.app')
@section('title','Bosh sahifa| admin')
@section('content')
@include('admin.linegraphPatient')
@include('admin.donutchartusers')
<section class="content">
        <div class="col-md-9">
            @include('admin.mycurrentpatients')
            @include('admin.mypatients')
            @include('admin.colleagues.colleagues')
        </div>
        <div class="col-md-3">
            @include('admin.topdrugs')
        </div>
       
</section>

@endsection
