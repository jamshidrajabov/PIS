@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Tahrirlash')
@section('page','Tahrirlash')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Bemor qo'shish</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  
        <form role="form" method="POST" action="{{route('patient.update',['user_id'=>auth()->user()->id,'id'=>$patient->id])}}">
          @csrf
          @method('PUT')
          <div class="box-body">
            <div class="form-group col-md-6">
              <label for="first_name">Ismi</label>
              <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Ismni kiriting" required autocomplete="off" value="{{$patient->first_name}}">
            </div>
            <div class="form-group col-md-6">
              <label for="last_name">Familiyasi</label>
              <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Familiyani kiriting" required autocomplete="off" value="{{$patient->last_name}}">
            </div>
            <div class="form-group col-md-6">
              <label for="passport">Seriya va raqam</label>
              <input name="passport" type="text" class="form-control" id="passport" placeholder="KA1234567" required autocomplete="off" value="{{$patient->passport}}">
            </div>
            <div class="form-group col-md-6">
              <label>Tug'ilgan sana</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="birth" required placeholder="21.06.2002" autocomplete="off" value="{{$patient->birth}}" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
              </div>
            </div>
            <div class="form-group col-xs-12">
              <label for="phone">Telefon raqami</label>
              <input name="phone" type="text" class="form-control" id="phone" placeholder="+998*********" autocomplete="off" value="{{$patient->phone}}">
            </div>
            <div class="form-group col-xs-12">
              <label for="address">Manzili</label>
              <input name="address" type="text" class="form-control" id="address" placeholder="To'liq manzil...." autocomplete="off" value="{{$patient->address}}">
            </div>
            <div class="form-group col-xs-6">
              <label>Qon guruhi</label>
              <select class="form-control" name="blood_type" id="blood_type">
                <option selected>{{$patient->blood_type}}</option>
                <option>I</option>
                <option>II</option>
                <option>III</option>
                <option>IV</option>
                <option>V</option>
              </select>
            </div>
            <div class="form-group col-xs-6">
              <label>Jinsi</label>
              <select class="form-control" name="gender" id="gender">
                <option selected>{{$patient->gender}}</option>
                <option>Erkak</option>
                <option>Ayol</option>
              </select>
            </div>
            
            <div class="form-group col-xs-6">
              <label for="height">Bo'yi</label>
              <input name="height" type="text" class="form-control" id="height" placeholder="Bo'yi" required autocomplete="off" value="{{$patient->height}}">
            </div>
            <div class="form-group col-xs-6">
              <label for="weight">Vazni</label>
              <input name="weight" type="text" class="form-control" id="weight" placeholder="Vazni" required autocomplete="off" value="{{$patient->weight}}">
            </div>
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
          </div><!-- /.box-body -->
          
        </form>
      </div><!-- /.box -->
    </div>

   
  </div>    
@endsection