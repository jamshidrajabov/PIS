@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Bemor haqida...')
@section('page','Bemor haqida')
@section('content')
@if (session('message'))
  <script>
      alert("{{ session('message') }}");
  </script>
@endif
<div class="col-md-12">
  @if (session('success'))
  <div class="col-xs-12 btn-primary box btn-block" style="color: white; padding: 10px">
      {{ session('success') }}
  </div>
  @endif
  
  @if (session('error'))
  <div class="col-xs-12 btn-danger box btn-block" style="color: white; padding: 10px">
      {{ session('error') }}
  </div>
  @endif
</div>

<div class="col-md-6">
  @php
    $latestPeriod = $patient->periods()->latest()->first();
  @endphp
  @if ($latestPeriod)
    @if ($latestPeriod->date_end == null)
      @if (auth()->user()->id == $latestPeriod->user_id)
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <p class="box-title font-k">Bemorga tashxis yozish</p>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <form action="{{route('diagnosis.store',['user_id'=>auth()->user()->id,'id'=>$latestPeriod->id])}}" method="POST" role="form">
                  @csrf
                  <div class="form-group col-md-12 font-k">
                    <label for="description" class="font-k">Kasalikka izoh</label>
                    <textarea name="description" id="description" placeholder="Kasallikka izoh" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" class="font-k"></textarea>
                  </div>
                  <input value="Izohni saqlash" type="submit" class="btn btn-primary font-k"></input>
                </form>
              </div><!-- /.box-body -->
            </div>
          </div>
        </div>
      @else
        <div class="btn btn-block btn-warning box font-k">Bu bemor hozir kasalxonada</div>
      @endif
    @else
      <a class="btn btn-block btn-warning box col-md-12 font-k" href="{{route('period.create',['user_id'=>auth()->user()->id,'id'=>$patient->id])}}">Kasallik varaqasi qo'shish</a>  
    @endif
  @else
    <a class="btn btn-block btn-warning box col-md-12 font-k" href="{{route('period.create',['user_id'=>auth()->user()->id,'id'=>$patient->id])}}">Kasallik varaqasi qo'shish</a>  
  @endif

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <p class="box-title font-k">Umumiy ma'lumot</p>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped font-k">
            <tr>
              <th class="font-k">ID</th>
              <td class="font-k">{{$patient->id}}</td>
            </tr>
            <tr>
              <th class="font-k">Ism</th>
              <td class="font-k">{{$patient->first_name}}</td>
            </tr>
            <tr>
              <th class="font-k">Familiya</th>
              <td class="font-k">{{$patient->last_name}}</td>
            </tr>
            <tr>
              <th class="font-k">Pasport seriya va raqami</th>
              <td class="font-k">{{$patient->passport}}</td>
            </tr>
            <tr>
              <th class="font-k">Tug'ilgan sana (yil, oy, kun)</th>
              <td class="font-k">{{$patient->birth}}</td>
            </tr>
            <tr>
              <th class="font-k">Telefon raqami</th>
              <td class="font-k">{{$patient->phone}}</td>
            </tr>
            <tr>
              <th class="font-k">Yashash manzili</th>
              <td class="font-k">{{$patient->address}}</td>
            </tr>
            <tr>
              <th class="font-k">Jinsi</th>
              <td class="font-k">{{$patient->gender}}</td>
            </tr>
            <tr>
              <th class="font-k">Bo'yi</th>
              <td class="font-k">{{$patient->height}} sm</td>
            </tr>
            <tr>
              <th class="font-k">Vazni</th>
              <td class="font-k">{{$patient->weight}} kg</td>
            </tr>
            <tr>
              <th class="font-k">Amallar</th>
              <td><a class="btn btn-block btn-primary font-k" href="{{route('patient.edit',['id'=>$patient->id,'user_id'=>auth()->user()->id])}}">Tahrirlash</a></td>
            </tr>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.col -->

<div class="col-md-6 font-k">

  
    @foreach ($periods as $period)
    <div class="row">
      <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <p class="box-title font-k">Kasallik varaqasi</p>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th class="font-k">Kasalxona nomi</th>
                        <td class="font-k">{{$period->user->hospital->name}}</td>
                    </tr>
                    <tr>
                        <th class="font-k">Mas'ul shifokor</th>
                        <td class="font-k">{{$period->user->name}}</td>
                    </tr>
                    <tr>
                        <th class="font-k">Kasallik nomi</th>
                        <td class="font-k">{{$period->name_disease}}</td>
                    </tr>
                    <tr>
                        <th class="font-k">Bemor ahvoli haqida to'liq ma'lumot</th>
                        <td class="font-k">
                            <div class="col-md-12 font-k">
                                {{$period->description}}
                            </div>
                            <div class="col-xs-12 font-k">
                                <small class="text-muted pull-right">{{$period->created_at->format('d.m.Y')}}</small>
                            </div>
                            <div class="col-xs-12 font-k">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$period->created_at->format('H:i')}}</small>
                            </div>
                            @foreach ($period->diagnoses as $diagnosis )
                            <div class="col-xs-12 font-k">
                                <hr>
                            </div>
                            <div class="col-md-12 font-k">
                                {{$diagnosis->description}}
                            </div>
                            <div class="col-xs-12 font-k">
                                <small class="text-muted pull-right">{{$diagnosis->created_at->format('d-m-Y')}}</small>
                            </div>
                            <div class="col-xs-12 font-k">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$diagnosis->created_at->format('H:i')}}</small>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="font-k">Qon guruhi</th>
                        <td class="font-k">{{$patient->blood_type}}</td>
                    </tr>
                    <tr>
                        <th class="font-k">Shifoxonaga kelgan kun</th>
                        <td class="font-k">{{$period->date_start}}</td>
                    </tr>
                    <tr>
                        <th class="font-k">Bemorga berilgan dorilar</th>
                        <td class="font-k">
                            @foreach ($period->drugs as $drug)
                            <div style="background-color: rgb(225, 212, 237); border-radius:10px; padding:10px 10px 20px 10px; margin:5px" class="col-md-12 font-k">
                                <a style="width: 100%; margin-bottom:10px !important; " class="btn btn-warning" href="javascript:void(0)" onclick="openModal('modal{{$drug->pivot->id}}')">{{ $drug->name }}</a>
                                <div class="col-md-12 font-k">
                                  <small class="text-muted pull-left">{{$drug->pivot->created_at->format('d.m.Y')}}</small>
                                  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>{{$drug->pivot->created_at->format('H:i')}}</small>
                              </div>
                              
                              
                            </div>
                            <div id="modal{{$drug->pivot->id}}" class="modal">
                                <div class="modal-content">
                                    <span class="close" onclick="closeModal('modal{{$drug->pivot->id}}')">&times;</span>
                                    <p class="pteg font-k">{{ $drug->pivot->message }}</p>
                                </div>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    @if ($period->date_end==null and auth()->user()->id==$period->user_id)
                    <tr>
                        <th class="font-k">Dori yozish</th>
                        <td class="font-k">
                          <script>
                            function addInput() {
                                var container = document.getElementById("inputContainer");
                        
                                var input = document.createElement("input");
                                input.type = "text";
                                input.name = "inputs[]";
                                input.placeholder = "Dori nomini kiriting:";
                                input.className = "form-control mb-2 col-md-12";
                                input.style.margin = "10px 0 10px 0";
                                input.style.width = "100%";
                                input.autocomplete = "off";  // autocomplete o'chirilmoqda
                        
                                var suggestionBox = document.createElement("div");
                                suggestionBox.className = "suggestion-box";
                                suggestionBox.style.position = "relative";
                        
                                var textarea = document.createElement("textarea");
                                textarea.name = "messages[]";
                                textarea.placeholder = "Iste'mol miqdori, mahali:";
                                textarea.className = "form-control mb-2 col-md-12";
                                textarea.style.margin = "0 0 10px 0";
                        
                                container.appendChild(input);
                                container.appendChild(suggestionBox);
                                container.appendChild(textarea);
                        
                                let timer;
                                input.addEventListener('input', function() {
                                    clearTimeout(timer);
                                    var query = this.value;
                        
                                    if (query.length > 0) {
                                        timer = setTimeout(function() {
                                            fetch(`/search-drug?query=${query}`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    suggestionBox.innerHTML = '';
                                                    let suggestions = data.slice(0, 5); // Faqat 5 ta natija olish
                        
                                                    suggestions.forEach((drug, index) => {
                                                        var suggestion = document.createElement('div');
                                                        suggestion.textContent = drug.name;
                                                        suggestion.className = 'suggestion-item';
                        
                                                        suggestion.addEventListener('click', function() {
                                                            input.value = drug.name;
                                                            suggestionBox.innerHTML = '';
                                                        });
                        
                                                        suggestionBox.appendChild(suggestion);
                        
                                                        // Natijalar orasida chiziq qo'shish
                                                        if (index < suggestions.length - 1) {
                                                            var divider = document.createElement('hr');
                                                            divider.className = 'suggestion-divider';
                                                            suggestionBox.appendChild(divider);
                                                        }
                                                    });
                                                    suggestionBox.style.display = 'block';
                                                });
                                        }, 300); // 300ms kechikish
                                    } else {
                                        suggestionBox.innerHTML = '';
                                        suggestionBox.style.display = 'none';
                                    }
                                });
                        
                                document.addEventListener('click', function(e) {
                                    if (!container.contains(e.target)) {
                                        suggestionBox.style.display = 'none';
                                    }
                                });
                            }
                        </script>
                      
                      
                        

                        
                            
                      <form action="{{ route('dynamic-input.store',[
                        'user_id'=>auth()->user()->id,
                        'id'=>$patient->id
                      ]) }}" method="POST">
                        @csrf
                        <div id="inputContainer">
                          <input style="margin: 0 0 10px 0" class="form-control mb-2" type="text" name="inputs[]" placeholder="Dori nomini kiriting:" autocomplete="off">
                          @error('inputs')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror

                          <textarea style="margin: 0 0 10px 0" class="form-control mb-2" name="messages[]" placeholder="Iste'mol miqdori, mahali:"></textarea>
                      </div>
                      
                        
                        <br>
                        <button class="btn btn-block btn-primary" type="button" onclick="addInput()">Dori qo'shish</button>
                        <button class="btn btn-block btn-primary" type="submit">Saqlash</button>
                      </form>
                      
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th class="font-k" >Shifoxonadan ketgan kun</th>
                        <td class="font-k">
                            @if ($period->date_end==null )
                              @if (auth()->user()->id==$period->user_id)
                                <a class="btn btn-block btn-danger" href="{{route('patient.left',['id'=>$period->id,'user_id'=>auth()->user()->id])}}">Ruxsat berish</a>
                              @else
                                <div class="btn btn-danger">
                                  Hozir bu bemor shifoxonada.
                                </div>
                              @endif
                            @else
                            {{$period->date_end}}
                            @endif
                        </td>
                    </tr>
                    
                </table>
                
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    
    </div><!-- /.row -->
    @endforeach
    <div class="font-k">
      {{ $periods->onEachSide(1)->links() }}
    </div>
   
    

</div><!-- /.col -->
@endsection
<style>
 .suggestion-box {
    border: 1px solid #ddd;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    max-height: 200px;
    overflow-y: auto;
    margin-top: -10px;
    display: none;
    width: 100%; /* Input maydoni o'lchamini saqlab qolish */
}

.suggestion-item {
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.suggestion-item:hover {
    background-color: #f0f0f0;
}

.suggestion-divider {
    margin: 0;
    border: 0;
    border-top: 1px solid #ddd;
}

.form-control {
    width: 100%; /* Input kengligi aniq belgilanadi */
    box-sizing: border-box; /* Bu input kengligining kengayishini oldini oladi */
    margin: 0 0 10px 0;
}



.modal {
    display: none; /* Modalni dastlab yashirish */
    position: fixed; /* Ekranda joylashuvi */
    z-index: 1; /* Yuqoriga joylashtirish */
    left: 0;
    top: 0;
    width: 100%; /* To'liq kenglik */
    height: 100%; /* To'liq balandlik */
    overflow: auto; /* Scroll bar */
    background-color: rgba(0, 0, 0, 0.8); /* Orqa fon rang */
}

.modal-content {
    background: #ffffff; /* Oq fon */
    margin: auto; /* Ekrandan markazlashtirish */
    padding: 20px;
    border-radius: 12px; /* Burchaklarni yumshatish */
    width: 400px; /* Kenglik */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2); /* Soyali effekt */
    border: 2px solid #4CAF50; /* Chiroyli borderni qo'shish */
    animation: slideIn 0.5s; /* Modal kirish animatsiyasi */
}

/* Modal kirish animatsiyasi */
@keyframes slideIn {
    from {
        transform: translateY(-30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.close {
    color: #333; /* Yopish tugmasi rangi */
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #4CAF50; /* Yopish tugmasi hover rangi */
}

.pteg {
    color: #333; /* Matn rangi */
    font-size: 16px; /* Matn o'lchami */
    line-height: 1.5; /* Matnning balandligi */
}


</style>
<script>
 function openModal(modalId) {
    // Modal oynani ID orqali topib, ko'rinishini faollashtiradi
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    // Modal oynani ID orqali topib, ko'rinishini yopadi
    document.getElementById(modalId).style.display = "none";
}
window.onclick = function(event) {
    const modals = document.getElementsByClassName("modal");
    for (let i = 0; i < modals.length; i++) {
        if (event.target === modals[i]) {
            closeModal(modals[i].id);
        }
    }
}
</script>
<style>
  .font-k {
    font-size: 16px; /* Odatiy shrift o'lchami */
}

/* Ekran kengligi 1200px dan katta bo'lganda */
@media (min-width: 1200px) {
    .font-k {
        font-size: 20px;
    }
}

/* Ekran kengligi 992px dan katta bo'lganda */
@media (min-width: 992px) and (max-width: 1199px) {
    .font-k {
        font-size: 18px;
    }
}

/* Ekran kengligi 768px dan katta bo'lganda */
@media (min-width: 768px) and (max-width: 991px) {
    .font-k {
        font-size: 16px;
    }
}

/* Ekran kengligi 576px dan katta bo'lganda */
@media (min-width: 576px) and (max-width: 767px) {
    .font-k {
        font-size: 14px;
    }
}

/* Ekran kengligi 576px dan kichik bo'lganda */
@media (max-width: 575px) {
    .font-k {
        font-size: 12px;
    }
}

</style>
<style>
  .suggestion-box {
    border: 1px solid #ddd;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    max-height: 200px;
    overflow-y: auto;
    display: none;
    width: 100%; /* Input maydoni o'lchamini saqlab qolish */
}

.suggestion-item {
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.suggestion-item:hover {
    background-color: #f0f0f0;
}

.suggestion-divider {
    margin: 0;
    border: 0;
    border-top: 1px solid #ddd;
}

.form-control {
    position: relative;
    z-index: 1;
}

</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var container = document.getElementById("inputContainer");
      var input = container.querySelector("input[name='inputs[]']");
      var textarea = container.querySelector("textarea[name='messages[]']");

      var suggestionBox = document.createElement("div");
      suggestionBox.className = "suggestion-box";
      suggestionBox.style.position = "relative";
      container.insertBefore(suggestionBox, textarea);

      let timer;
      input.addEventListener('input', function() {
          clearTimeout(timer);
          var query = this.value;

          if (query.length > 0) {
              timer = setTimeout(function() {
                  fetch(`/search-drug?query=${query}`)
                      .then(response => response.json())
                      .then(data => {
                          suggestionBox.innerHTML = '';
                          let suggestions = data.slice(0, 5); // Faqat 5 ta natija olish

                          suggestions.forEach((drug, index) => {
                              var suggestion = document.createElement('div');
                              suggestion.textContent = drug.name;
                              suggestion.className = 'suggestion-item';

                              suggestion.addEventListener('click', function() {
                                  input.value = drug.name;
                                  suggestionBox.innerHTML = '';
                              });

                              suggestionBox.appendChild(suggestion);

                              // Natijalar orasida chiziq qo'shish
                              if (index < suggestions.length - 1) {
                                  var divider = document.createElement('hr');
                                  divider.className = 'suggestion-divider';
                                  suggestionBox.appendChild(divider);
                              }
                          });
                          suggestionBox.style.display = 'block';
                      });
              }, 300); // 300ms kechikish
          } else {
              suggestionBox.innerHTML = '';
              suggestionBox.style.display = 'none';
          }
      });

      document.addEventListener('click', function(e) {
          if (!container.contains(e.target)) {
              suggestionBox.style.display = 'none';
          }
      });
  });
</script>
<script>
  function openModal(modalId) {
      // Modal oynani ID orqali topib, ko'rinishini faollashtiradi
      document.getElementById(modalId).style.display = "block";
  }

  function closeModal(modalId) {
      // Modal oynani ID orqali topib, ko'rinishini yopadi
      document.getElementById(modalId).style.display = "none";
  }

  window.onclick = function(event) {
      const modals = document.getElementsByClassName("modal");
      for (let i = 0; i < modals.length; i++) {
          if (event.target === modals[i]) {
              closeModal(modals[i].id);
          }
      }
  }
</script>


