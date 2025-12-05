@extends('admin.layouts.main')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6 d-flex justify-content-between"><h3 class="mb-0">{{$user->name}}</h3>
                    <h3><a href="{{ route("admin.user.edit", $user->id) }}" class="text-success">Изменить</a></h3>
                    <form action="{{ route("admin.user.delete", $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent"><h3 href="" class="text-danger" role="button">Удалить</h3></button>
                    </form>
                </div>
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
                <div class="row">
                    <div class="col-6">
                        <div class="col-12">
                        </div>
                        <div class="col-12">

                            <table class="table">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Имя</th>

                                </tr>
                                <tbody>
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
