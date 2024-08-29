@extends('admin.app')
@section('title','Jami kasalxonalar')
@section('page','Jami kasalxonalar')

@section('content')
<section class="content">
    <div class="row">
        <div  class="col-md-6 ">
            <a style="padding: 9px 15px;margin:5px;
            font-size: 16px; width:100%" class="col-md-12 btn btn-success" href="{{route('hospital.create')}}">
                <i class="fa fa-plus"></i> Kasalxona qo'shish
            </a>
            
        </div>
        <div class="col-md-6 ">
            <select style="width: 100%" id="filterSelect" class="form-select  custom-select col-md-12">
                <option style="width: 100%" value="all" {{ $filter == 'all' ? 'selected' : '' }}>Hammasi</option>
                <option style="width: 100%" value="new" {{ $filter == 'new' ? 'selected' : '' }}>Yangilari</option>
            </select>
        </div>
        <div class="col-md-12">
            <div class="custom-accordion">
                @foreach($hospitals as $hospital)
                    <div class="accordion-item">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h5>{{ $hospital->name }}</h5>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Ishchilar soni:</span>
                                      <span class="info-box-number">{{$hospital->users->count()}}</span>
                                    </div><!-- /.info-box-content -->
                                  </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="fa  fa-wheelchair"></i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Bemorlar soni:</span>
                                      <span class="info-box-number">{{$hospital->periods->count()}}</span>
                                    </div><!-- /.info-box-content -->
                                  </div><!-- /.info-box -->
                                </div><!-- /.col -->
                    
                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>
                              </div><!-- /.row -->
                              <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <strong>Manzil: </strong> {{$hospital->address}}
                                </div>
                               
                                <div class="col-md-3 center">
                                    <a class="btn btn-info" href="{{route('hospital.edit',['id'=>$hospital->id])}}"><i class="fa  fa-pencil"></i> Tahrirlash</a>
                                </div>
                              </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $hospitals->links() }}
        
            <!-- Custom CSS -->
            <style>
                /* Umumiy uslub */
.custom-select {
    display: inline-block;
   
    margin:5px;
    padding: 10px 15px;
    font-size: 14px;
    line-height: 1.5;
    color: #151414;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Hover holati */
.custom-select:hover {
    border-color: #007bff;
}

/* Focus holati */
.custom-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

/* Disabled holati */
.custom-select:disabled {
    background-color: #e9ecef;
    color: #6c757d;
}

                .custom-accordion {
                    max-width: 100%;
                    margin: 20px auto;
                    border: 1px solid #ddd;
                    border-radius: 10px; /* Kattaroq border-radius */
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Chiroyli shadow */
                    overflow: hidden; /* Shaklni chiroyli saqlash */
                }
        
                .accordion-item {
                    border-bottom: 1px solid #ddd;
                }
        
                .accordion-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 20px;
                    cursor: pointer;
                    background: linear-gradient(135deg, #4e73df, #1cc88a); /* Yangilangan gradient background */
                    transition: background 0.4s, color 0.4;
                    font-size: 68px;
                    color: #f4cfcf; /* Oq rangda shrift */
                    font-weight: bold;
                }
        
                .accordion-header:hover {
                    background: linear-gradient(135deg, #3b5998, #0d9488); /* Hover uchun kontrastli fon */
                }
        
                .accordion-body {
                    display: none;
                    padding: 20px;
                    background: #ffffff; /* Oq fon */
                    font-size: 16px;
                    line-height: 1.6;
                    color: #333; /* Matn uchun to'qroq rang */
                    border-top: 1px solid #eee; /* Birlashtiruvchi border */
                    box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.1); /* Ichki shadow */
                }
        
                .accordion-header.active .toggle-icon {
                    transform: rotate(45deg);
                }
        
                .toggle-icon {
                    font-weight: bold;
                    font-size: 24px;
                    transition: transform 0.3s;
                }
            </style>
        
            <!-- Custom JavaScript -->
            <script>
                function toggleAccordion(header) {
                    const body = header.nextElementSibling;
                    const isActive = header.classList.contains('active');
        
                    // Barcha accordion itemlarini yopish
                    document.querySelectorAll('.custom-accordion .accordion-header').forEach(item => {
                        item.classList.remove('active');
                        item.nextElementSibling.style.display = 'none';
                    });
        
                    // Agar joriy accordion item yopiq bo'lsa, uni ochamiz
                    if (!isActive) {
                        header.classList.add('active');
                        body.style.display = 'block';
                    }
                }




                document.addEventListener('DOMContentLoaded', function() {
    const filterSelect = document.getElementById('filterSelect');

    filterSelect.addEventListener('change', function() {
        const selectedFilter = this.value;
        window.location.href = '?filter=' + selectedFilter;
    });
});
            </script>
        
        </div>
    </div>
</section>
@endsection
