@extends('admin.layouts.main')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Редактирование пользователя</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <form action="{{route("admin.user.update", $user->id)}}" class="col-4" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="inputTitle" class="form-label">Имя пользователя</label>
                            <input type="text" name="name" class="form-control" id="inputTitle" value="{{$user->name}}">
                            @error('name')
                            <div class="text-danger">Это поле не заполненно</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputTitle" class="form-label">Эл. почта</label>
                            <input type="email" name="email" class="form-control" id="inputTitle" value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">Это поле не заполненно</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="selectCategory" class="form-label">Выберите роль</label>
                            <select class="form-select" id="selectCategory" name="role" required="">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{$id == $user->role ? 'selected' : ''}}
                                    >{{$role}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>

                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
@endsection
