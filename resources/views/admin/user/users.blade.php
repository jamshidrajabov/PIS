@extends('admin.app')
@section('title','Jami foydalanuvchilar')
@section('page','Jami foydalanuvchilar')
<script src="{{asset('admin/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>

@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
<div class="container mt-5">
   
    <!-- Jonli Filtr Formasi -->
    <form id="filterForm"  method="GET">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <label for="lavozim">Lavozim orqali filtr:</label>
                <select name="lavozim" id="lavozim" class="form-control">
                    <option value="">Hammasi</option>
                    <option value="Admin">Admin</option>
                    <option value="Doctor">Doctor</option>
                </select>
            </div>
        </div>
    </form>

    <!-- Jadval joylashgan qism -->
    <div id="usersTable">
        @include('admin.user.partialsusers_table', ['users' => $users])
    </div>
</div>
      </div>
    </div>
</section>

@endsection

<script>
    $(document).ready(function() {
        $('#lavozim').on('change', function() {
            var lavozim = $(this).val();
            $.ajax({
                url: "{{ route('admin.users') }}",
                type: "GET",
                data: { lavozim: lavozim },
                success: function(data) {
                    $('#usersTable').html(data); // Yangi ma'lumotlarni joylashtirishdan oldin mavjud bo'lganlarini o'chirish
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>

<style>
    .table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
    .table-hover tbody tr:hover {
        background-color: #e9ecef;
    }
    .shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .badge-pill {
        font-size: 0.9em;
    }
    .bg-primary {
        background-color: #007bff !important;
    }
</style>
