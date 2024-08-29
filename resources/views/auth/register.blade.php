@extends('admin.app')
@section('title','Ro\'yxatga olish')
@section('page','Ro\'yxatga olish')
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('admin/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css" />
  </head>
  @section('content')
<style>
  .hidden {
            display: none;
        }
</style>
    <div style="margin-top: 30px" class="register-box">
     

      <div class="register-box-body">
        <p class="login-box-msg">Ro'yxatga olish</p>
        <form method="POST" action="{{ route('register') }}" id="formm">
            @csrf
          <div class="form-group has-feedback">
            <input id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="off"  class="form-control" placeholder="To'liq nom"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="form-group has-feedback">
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="off" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div class="form-group has-feedback">
            <input id="password" type="password"
                                        name="password"
                                        required autocomplete="off" class="form-control" placeholder="Parol"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <div class="form-group has-feedback">
            <input id="password_confirmation" type="password"
                                        name="password_confirmation" required autocomplete="off"  class="form-control" placeholder="Parolni qayta kiritish"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
          <div class="form-group has-feedback">
            <label class="col-md-6">
              <input type="radio" name="hospitalChoice" value="existing" checked>
              Tanlash
          </label>
          <label class="col-md-6">
              <input type="radio" name="hospitalChoice" value="new">
              Kiritish
          </label>
            <select name="hospital1" id="hospitalSelect" class="form-control" >
                <option value="" disabled selected>Kasalxonani tanlang</option>
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                @endforeach
            </select>
            <input name="hospital2" type="text" id="hospitalInput" class="form-control hidden" placeholder="Agar mavjud bo'lmasa, kiriting" autocomplete="off">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select name="role" id="role" class="form-control" required>
                <option value="" disabled selected>Lavozimni tanlang</option>
              
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ro'yxatga olish</button>
            </div><!-- /.col -->
          </div>
        </form>        

        <div class="social-auth-links text-center">
          <p>- Yoki -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Facebook orqali kirish</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Google+ orqali kirish</a>
        </div>

      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    <script>
       document.querySelectorAll('input[name="hospitalChoice"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var hospitalSelect = document.getElementById('hospitalSelect');
            var hospitalInput = document.getElementById('hospitalInput');

            // Tanlangan radio tugmasining qiymatini tekshirish
            if (this.value === 'new') {
                // Yangi hospital tanlanganida, selectni yashirish va inputni ko'rsatish
                hospitalSelect.classList.add('hidden');
                hospitalInput.classList.remove('hidden');
            } else {
                // Mavjud hospital tanlanganida, selectni ko'rsatish va inputni yashirish
                hospitalSelect.classList.remove('hidden');
                hospitalInput.classList.add('hidden');
            }
        });
    });

    document.getElementById('hospitalSelect').addEventListener('change', function() {
        var selectedValue = this.value;
        var hospitalInput = document.getElementById('hospitalInput');

        // Agar tanlangan qiymat bo'sh bo'lsa, inputni tozalash
        if (!selectedValue) {
            hospitalInput.value = '';
            return;
        }

        // Tanlangan qiymat selectda mavjudmi?
        var optionExists = Array.from(this.options).some(option => option.value === selectedValue);

        if (!optionExists) {
            // Agar mavjud bo'lmasa, inputga kiritilgan qiymatni saqlang
            hospitalInput.value = selectedValue;
        } else {
            // Agar mavjud bo'lsa, inputni tozalang
            hospitalInput.value = '';
        }
    });
    
    
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
          
        </script>
    
    
@endsection
    <!-- jQuery 2.1.3 -->
    {{-- <script src="{{asset('admin/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script> --}}
    