@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Hamkasblarim')
@section('page','Hamkasblarim')
@section('content')
<section class="content">
    <div class="row">
      <div class="bootstrap-table">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mening hamkasblarim</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Ism va Familiya</th>
                    <th>Elektron pochta</th>
                    <th >Qo'shilgan sana</th>
                    <th >Kasalxona nomi</th>
                  </tr>
                  @foreach ($colleagues as $colleague)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$colleague->name}}</td>
                    <td>{{$colleague->email}}</td>
                    <td>{{$colleague->created_at->format('d-m-Y')}}</td>
                    <td>{{$colleague->hospital->name}}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
             
            </div><!-- /.box-body -->
            <div style="padding-left: 30px">
              {{$colleagues->links()}}
          </div>
          </div><!-- /.box -->
        </div>
    </div>
    
      
    </div>
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