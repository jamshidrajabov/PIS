@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Mening bemorlarim')
@section('page','Bemorlarim')
@section('content')
<section class="content">
    <div class="row">
      <div class="bootstrap-custom ">
        <div class="col-md-9">
          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                      <div class="box-header">
                          <h3 class="box-title">Mening bemorlarim haqida umumiy ma'lumot</h3>
                          <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                      </div><!-- /.box-header -->
                      <div class="box-body ">
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ism va Familiya</th>
                                    <th>Pasport seriya va raqami</th>
                                    <th>Manzil</th>
                                    <th>Tug'ilgan kuni</th>
                                    <th>Telefon raqami</th>
                                    <th>Tahrirlash</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr>
                                    <td><a href="{{route('patient.about',['id' => $patient->id,'user_id'=>auth()->user()->id])}}">{{$patient->last_name.' '.$patient->first_name}}</a></td>
                                    <td>{{$patient->passport}}</td>
                                    <td>{{$patient->address}}</td>
                                    <td>{{$patient->birth}}</td>
                                    <td>{{$patient->phone}}</td>
                                    <td><a class="btn btn-block btn-primary" href="{{route('patient.edit',['id'=>$patient->id,'user_id'=>auth()->user()->id])}}"><i class="fa  fa-pencil"></i></a></td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                         
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.col -->
    </div>
    
      <div class="col-md-3">
        <!-- PRODUCT LIST -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Eng ko'p tavsiya etilganlar</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              @foreach ($drugs as $drug)
              <li class="item">
                <div class="product-img">
                  <img style="border-radius: 30%" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg" alt="Product Image"/>
                </div>
                <div class="product-info">
                  <a href="{{route('drug.about',['id'=>$drug->id])}}" class="product-title">{{$drug->name}} <span class="label label-warning pull-right">{{$drug->total}} marta</span></a>
                  <span class="product-description">
                    Ilk qo'llanilgan kun: {{$drug->created_at->format('d-m-Y')}}
                  </span>
                </div>
              </li><!-- /.item -->
              @endforeach
              
            </ul>
          </div><!-- /.box-body -->
          
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section>
  @endsection
  <style>
    /* Asosiy shrift o'lchamini sozlash */
.bootstrap-table {
  font-size: 16px; /* Odatiy shrift o'lchami */
}

/* Ekran kengligi 992px dan kichik bo'lganda shriftni kichraytirish */
@media (max-width: 992px) {
  .bootstrap-table {
      font-size: 14px;
  }
}

/* Ekran kengligi 768px dan kichik bo'lganda shriftni yanada kichraytirish */
@media (max-width: 768px) {
  .bootstrap-table {
      font-size: 12px;
  }
}

/* Ekran kengligi 576px dan kichik bo'lganda shriftni eng kichik holda saqlash */
@media (max-width: 576px) {
  .bootstrap-table {
      font-size: 10px;
  }
}

    /* Faqat shu qism uchun Bootstrap */
.bootstrap-table {
  @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
}

.bootstrap-table .table-responsive {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

   </style>
