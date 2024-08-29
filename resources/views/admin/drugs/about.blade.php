@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Dori haqida')
@section('page','Dori haqida')
@section('content')
<section class="content drug-description">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-sm-4">
                <img style="max-height: 200px; max-width: 200px" class="col-xs-12" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg" alt="">
            </div>
            <div class="col-xs-8">
                <h2 style="color: #301ad5" class="col-xs-12 ">{{$drug->name}}</h2>
                <b class="col-xs-6 responsive-font">Kategoriya:</b>
                <p class="col-xs-6 responsive-font">{{$drug->category->name}}</p>
                <b class="col-xs-6 responsive-font">Tavsiyalar soni:</b>
                <p class="col-xs-6 responsive-font">{{$count}}</p>
            </div>
        </div>
        <div class="col-xs-12">
            <h2 style="color: rgb(73, 73, 188)" class="col-md-12 responsive-font">O'xshash dorilar</h2>
            <div style="margin-bottom: 10px" class="carousel-container col-xs-12">
                <div class="carousel-wrapper" id="carouselWrapper">
                    @foreach ($similars as $similar)
                        <div class="carousel-item">
                            <a href="{{route('drug.about',['id'=>$similar->id])}}">
                                <img class="col-xs-12" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg" alt="">{{$similar->name}}
                            </a>
                        </div>
                    @endforeach
                    @foreach ($similars as $similar)
                        <div class="carousel-item">
                            <a href="{{route('drug.about',['id'=>$similar->id])}}">
                                <img class="col-xs-12" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg" alt="">{{$similar->name}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12">
                
                <h2 style="color: rgb(73, 73, 188); " class="responsive-font">Ma'lumot</h2>
                <a href="#">Noaniqlik haqida xabar berish</a>
            </div>
            <div class="col-md-12 ">
                {!! $drug->description !!}
            </div>
<style>
    .drug-description {
    font-size: 16px; /* Asosiy shrift o'lchami */
    line-height: 1.6; /* Chiziq balandligi */
    padding: 15px; /* Ichki bo'shliq */
    border: 1px solid #ddd; /* Chegara */
    border-radius: 5px; /* Burchaklarni yumshatish */
    background-color: #f9f9f9; /* Orqa fon rangi */
    text-align: justify; /* Yozuvni ikkala chekkadan tekislash */
}

/* Media Query: ekran kengligi 1200px dan kichik bo'lsa */
@media (max-width: 1200px) {
    .drug-description {
        font-size: 15px; /* O'rta kattalik */
    }
}

/* Media Query: ekran kengligi 992px dan kichik bo'lsa */
@media (max-width: 992px) {
    .drug-description {
        font-size: 14px; /* Kichik kattalik */
    }
}

/* Media Query: ekran kengligi 768px dan kichik bo'lsa */
@media (max-width: 768px) {
    .drug-description {
        font-size: 13px; /* Kichik kattalik */
    }
}

/* Media Query: ekran kengligi 576px dan kichik bo'lsa */
@media (max-width: 576px) {
    .drug-description {
        font-size: 12px; /* Eng kichik kattalik */
        padding: 10px; /* Ichki bo'shliqni kamaytirish */
    }
}
</style>         
            <div class="col-md-12">
                <h2 style="color: rgb(73, 73, 188); " class="responsive-font">Harf bo'yicha izlash</h2>
                <div class="alphabet-container col-md-12">
                    @foreach (range('A', 'Z') as $letter)
                        <form action="{{ route('drugs.index') }}" class="alphabet-form">
                            <input style="display: none" type="text" name="letter" value="{{ $letter }}" />
                            <button type="submit" class="alphabet-button">{{ $letter }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Responsive shrift o'lchamlari */
.responsive-font {
    font-size: 18px; /* Default font size */
}

/* Katta ekranlar uchun */
@media (min-width: 1200px) {
    .responsive-font {
        font-size: 22px; /* 1200px dan katta ekranlar uchun */
    }
}

/* O'rta ekranlar uchun */
@media (min-width: 992px) and (max-width: 1199px) {
    .responsive-font {
        font-size: 20px; /* 992px dan katta va 1199px dan kichik ekranlar uchun */
    }
}

/* Kichik ekranlar uchun */
@media (max-width: 991px) {
    .responsive-font {
        font-size: 18px; /* 991px dan kichik ekranlar uchun */
    }
}

/* Juda kichik ekranlar uchun */
@media (max-width: 768px) {
    .responsive-font {
        font-size: 16px; /* 768px dan kichik ekranlar uchun */
    }
}
</style>

@endsection

<style>
    .alphabet-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: flex-start;
        margin-top: 20px;
    }

    .alphabet-form {
        display: flex;
        margin: 0;
    }

    .alphabet-button {
        background-color: #4CAF50 !important;
        color: white !important;
        border: none;
        padding: 10px 15px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-flex !important;
        white-space: nowrap !important;
    }

    .alphabet-form {
        flex: 0 1 auto !important;
    }

    @media (max-width: 992px) {
        .alphabet-container {
            flex-wrap: wrap !important;
        }

        .alphabet-form {
            margin-bottom: 10px !important;
        }
    }

    .carousel-container {
        width: 80%;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel-wrapper {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item {
        min-width: 250px;
        margin: 0 10px;
        background-color: #f7f7f7;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .carousel-item a {
        display: block;
        padding: 20px;
        color: #333;
        text-decoration: none;
        font-size: 18px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        border-radius: 5px;
    }

    .carousel-item a:hover {
        background-color: #e0e0e0;
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .carousel-container {
            width: 100%;
            padding: 10px;
        }

        .carousel-item {
            min-width: 200px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrapper = document.getElementById('carouselWrapper');
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function updateCarousel() {
            currentIndex++;
            if (currentIndex >= items.length - 1) {
                currentIndex = 0;
                wrapper.style.transition = 'none';
                wrapper.style.transform = `translateX(0)`;
            } else {
                wrapper.style.transition = 'transform 0.5s ease-in-out';
                wrapper.style.transform = `translateX(-${currentIndex * (items[0].offsetWidth + 20)}px)`;
            }
        }

        setInterval(updateCarousel, 2000);
    });
</script>
