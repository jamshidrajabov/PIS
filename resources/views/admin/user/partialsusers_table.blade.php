<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-center shadow">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Foydalanuvchi nomi</th>
                <th scope="col">Elektron pochta</th>
                <th scope="col">Lavozim</th>
                <th scope="col">Jami qabullar</th>
                <th scope="col">Joriy qabullar</th>
                <th scope="col">Amallar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="font-weight-bold">{{ $user->name }}</td>
                    <td class="font-weight-bold">{{ $user->email }}</td>
                    <td>
                        <span class="badge badge-pill {{ $user->role_id == 1 ? 'btn btn-primary' : 'btn btn-warning' }}">
                            {{ $user->role_id == 1 ? 'Admin' : 'Doctor' }}
                        </span>
                    </td>
                    <td>{{ $user->periods_count }}</td>
                    <td>{{ $user->active_periods_count }}</td>
                    <td class="col-md-2 ">
                        <div class="button-container">
                            <a  class="btn btn-success" href="{{route('admin.addadmin',['id'=>$user->id])}}"><i class="fa fa-plus"></i> Admin</a>
                            <a  class="btn btn-warning" href="{{route('admin.minusadmin',['id'=>$user->id])}}"><i class="fa fa-minus"></i> Admin</a>
    
                        </div>
                        <div class="button-container-single">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Foydalanuvchini o\'chirishni xohlaysizmi?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> O'chirish</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
<style>
  .button-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px; /* Tugmalar orasidagi masofa */
}

.button-container .btn {
    flex: 1; /* Tugmalarni teng bo'lakka bo'lib beradi */
    margin-right: 10px; /* Oraliq masofa */
}

.button-container .btn:last-child {
    margin-right: 0; /* Oxirgi tugma o'ng tomondan bo'shliqga ega bo'lmasligi uchun */
}

.button-container-single .btn {
    width: 100%; /* Tugmani to'liq kenglikda qilish */
}

.button-container .btn-primary {
    background-color: #007bff;
    color: white;
}

.button-container .btn-warning {
    background-color: #ffc107;
    color: white;
}

.button-container-single .btn-danger {
    background-color: #dc3545;
    color: white;
}

    </style>