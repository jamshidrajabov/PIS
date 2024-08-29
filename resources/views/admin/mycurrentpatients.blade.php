
      
        <div id="mycurrentpatients" class="row">
          <div class="bootstrap-table">
            
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Mening joriy bemorlarim haqida umumiy ma'lumot</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Ism va Familiya</th>
                      <th>Pasport seriya va raqami</th>
                      <th>Manzil</th>
                      <th>Tug'ilgan kuni</th>
                      <th>Telefon raqami</th>
                      <th class="col-md-1">Tahrirlash</th>
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
                    
                    
                  </tfoot>
                </table>
                @if ($patients->count()==0)
                <p style="text-align: center" class="center"> Sizda hozir bemorlar mavjud emas!!!</p>
            @endif
                </div>
                
               
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          
        </div>
        
          
        </div><!-- /.row -->

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
