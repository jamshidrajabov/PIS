@extends('admin.app')
@section('title','Bemor qo\'shish')
@section('page','Bemor qo\'shish')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- form start -->
          <div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                  <h3 class="box-title">Bemorlar</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="{{route('admin.patient.create')}}" method="get" class="mb-2">
                    <div class="input-group">
                      {{-- <input type="text" id="search" name="q" class="form-control" placeholder="Qidirish..."/> --}}
                      <input type="text" id="search" class="form-control" placeholder="Bemorni qidiring..." autocomplete="off">
                      <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
                  <br>
                  
                  <table class="table">
                    <thead>
                        <tr>
                            <th>Ism Familiya</th>
                            <th>Pasport</th>
                        </tr>
                    </thead>
                    <tbody id="search-results">
                        @foreach ($patients as $patient)
                            <tr>
                                <td><a href="{{ route('patient.about', ['id' => $patient->id, 'user_id' => auth()->user()->id]) }}">{{ $patient->last_name }} {{ $patient->first_name }}</a></td>
                                <td><a href="{{ route('patient.about', ['id' => $patient->id, 'user_id' => auth()->user()->id]) }}">{{ $patient->passport }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <!-- Pagination tugmalari -->
                {{-- <div id="pagination-links">
                    {{ $patients->links() }}
                </div> --}}
                <script type="text/javascript">
                
                  $(document).ready(function() {
                      $('#search').on('keyup', function() {
                          var query = $(this).val();
                          fetchPatients(1, query); // 1-sahifadan qidirishni boshlash
              
                          // Sahifalarni AJAX orqali yuklash
                          $(document).on('click', '.pagination a', function(event) {
                              event.preventDefault();
                              var page = $(this).attr('href').split('page=')[1];
                              fetchPatients(page, query);
                          });
                      });
              
                      function fetchPatients(page, query) {
                          $.ajax({
                              url: "{{ route('patients.search') }}?page=" + page,
                              type: "GET",
                              data: {'query': query},
                              success: function(data) {
                                  $('#search-results').html('');
                                  $('#pagination-links').html(data.links);  // Pagination tugmalarini yangilash
                                  if (data.data.length > 0) {
                                      $.each(data.data, function(index, patient) {
                                          $('#search-results').append(`
                                              <tr>
                                                  <td><a href="{{ route('patient.about', ['id' => '__id__', 'user_id' => auth()->user()->id]) }}">${patient.last_name} ${patient.first_name}</a></td>
                                                  <td><a href="{{ route('patient.about', ['id' => '__id__', 'user_id' => auth()->user()->id]) }}">${patient.passport}</a></td>
                                              </tr>
                                          `.replace(/__id__/g, patient.id));
                                      });
                                  } else {
                                      $('#search-results').append('<tr><td colspan="2" class="list-group-item">Hech qanday patient topilmadi.</td></tr>');
                                  }
                              }
                          });
                      }
                  });
              </script>
              <style>
                 .flatpickr-calendar {
            font-size: 14px; /* Kalendarning matn o'lchami */
        }

        .flatpickr-day {
            padding: 5px; /* Kunlar orasidagi bo'shliq */
        }

        .flatpickr-month {
            padding: 5px; /* Oy nomlari orasidagi bo'shliq */
        }
              </style>
                  {{-- {{ $patients->links() }} --}}
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        
      </div>
      <!-- left column -->
      <div class="col-md-6">
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
          <form role="form" method="POST" action="{{route('patient.store',['user_id'=>auth()->user()->id])}}">
            @csrf
            <div class="box-body">
              <div class="form-group col-md-6">
                <label for="first_name">Ismi</label>
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Ismni kiriting" required autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="last_name">Familiyasi</label>
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Familiyani kiriting" required autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="passport">Seriya va raqam</label>
                <input name="passport" type="text" class="form-control" id="passport" placeholder="KA1234567" required autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label>Tug'ilgan sana</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input id="birth" name="birth" required placeholder="2002-06-21"  type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
              </div>
              <div class="form-group col-xs-12">
                <label for="phone">Telefon raqami</label>
                <input name="phone" type="text" class="form-control" id="phone" placeholder="+998*********" autocomplete="off">
              </div>
              <div class="form-group col-xs-12">
                <label for="address">Manzili</label>
                <input name="address" type="text" class="form-control" id="address" placeholder="To'liq manzil...." autocomplete="off">
              </div>
              <div class="form-group col-xs-6">
                <label>Qon guruhi</label>
                <select class="form-control" name="blood_type" id="blood_type">
                  <option selected></option>
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
                  <option selected></option>
                  <option>Erkak</option>
                  <option>Ayol</option>
                </select>
              </div>
              
              <div class="form-group col-xs-6">
                <label for="height">Bo'yi</label>
                <input name="height" type="text" class="form-control" id="height" placeholder="Bo'yi" required autocomplete="off">
              </div>
              <div class="form-group col-xs-6">
                <label for="weight">Vazni</label>
                <input name="weight" type="text" class="form-control" id="weight" placeholder="Vazni" required autocomplete="off">
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Saqlash">
              </div>
            </div><!-- /.box-body -->
            
          </form>
          <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
          <script>
            flatpickr("#birth", {
        dateFormat: "Y-m-d", // Sana formatini o'rnatish
        locale: {
            firstDayOfWeek: 1, // Haftaning birinchi kunini dushanba qilamiz
            weekdays: {
                shorthand: ["D", "S", "Ch", "Pa", "J", "Jm", "Sh"], // Hafta kunlari
                longhand: ["Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma", "Shanba", "Yakshanba"], // Hafta kunlari
            },
            months: {
                shorthand: ["Yan", "Fev", "Mar", "Apr", "May", "Iyun", "Iyul", "Avg", "Sen", "Okt", "Noy", "Dek"], // Oylik qisqartmalar
                longhand: ["Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust", "Sentabr", "Oktyabr", "Noyabr", "Dekabr"], // Oylik to'liq nomlari
            },
        }
    });
        </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
        </div><!-- /.box -->
      </div>
  
     
    </div>
  </section>
  @endsection