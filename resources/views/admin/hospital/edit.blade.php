@extends('admin.app')
@section('title','Kasalxona tahrirlash')
@section('page','Kasalxona tahrirlash')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Kasalxona tahrirlash</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('hospital.update',['id'=>$hospital->id])}}">
                  @method('PUT')
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">Kasalxona nomi</label>
                      <input name="name" type="text" class="form-control" id="name" value="{{$hospital->name}}" required autocomplete="off">
                      @error('name')
                      <div style="color:red;">{{ $message }}</div>
                     @enderror
                    </div>
                    <div class="form-group">
                      <label for="address">Manzil</label>
                      <input name="address" type="text" class="form-control" id="address" value="{{$hospital->address}}" required autocomplete="off">
                      @error('address')
                      <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection