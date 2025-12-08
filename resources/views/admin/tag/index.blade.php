@extends('admin.layouts.main')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Тэги</h3></div>
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
                    <div class="col-8">
                        <div class="col-12">
                            <a href="{{route('admin.tag.create')}}" class="btn btn-primary mb-2">Добавить</a>
                        </div>
                        <div class="col-12">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Название</th>
                                    <th colspan="3" scope="col" class="text-center">Действие</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    <th scope="row">{{$tag->id}}</th>
                                    <td>{{ $tag->title }}</td>
                                    <td><a href="{{ route("admin.tag.show", $tag->id) }}">Просмотреть</a> </td>
                                    <td><a href="{{ route("admin.tag.edit", $tag->id) }}" class="text-success">Изменить</a></td>
                                    <td>
                                        <form action="{{ route("admin.tag.delete", $tag->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent"><p href="" class="text-danger" role="button">Удалить</p></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
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
