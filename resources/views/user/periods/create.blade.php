@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Kasallik varaqasi')
@section('page','Kasallik varaqa ochish')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Kasallik varaqasini ochish</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form action="{{route('period.store',['user_id'=>auth()->user()->id,'id'=>$patient->id])}}" method="POST" role="form">
                @csrf
                <div class="box-body">
                  <div class="form-group col-md-12">
                    <label for="name_disease">Kasallik nomi</label>
                    <input name="name_disease" type="text" class="form-control" id="name_disease" placeholder="Kasllik nomi" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="description">Kasalikka izoh</label>
                    <textarea  name="description" id="description" placeholder="Kasallikka izoh" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                  
                    <input value="Saqlash" type="submit" class="btn btn-primary "></input>
                   
                </div><!-- /.box-body -->
                
              </form>
            </div><!-- /.box -->
          </div>
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Eng ko'p kuzatilgan kasalliklar</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach ($periods as $period)
                <li class="item">
                  <div class="product-img">
                    <img style="border-radius: 30%" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg" alt="Product Image"/>
                  </div>
                  <div class="product-info">
                    <a href="" class="product-title">{{$period->name_disease}} <span class="label label-warning pull-right">{{$period->total}} marta</span></a>
                    <span class="product-description">
                      
                    </span>
                    
                  </div>
                </li><!-- /.item -->
                @endforeach
                
              </ul>
            </div><!-- /.box-body -->
            </div>
          </div>
      </div>
      
</section>
@endsection