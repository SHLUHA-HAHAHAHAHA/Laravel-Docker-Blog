@extends('admin.layouts.main')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Редактирование Поста</h3></div>
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
                    <form action="{{route('admin.post.update', $post->id)}}" class="col-4" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="inputTitle" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" value="{{$post->title}}">
                            @error('title')
                            <div class="text-danger">Это поле не заполненно</div>
                            @enderror
                            <label for="inputContent" class="form-label">Контент поста</label>
                            <textarea name="content" class="form-control" id="inputContent">{{$post->content}}</textarea>
                            @error('content')
                            <div class="text-danger">Это поле не заполненно</div>
                            @enderror
                            <div class="w-25">
                                <img src="{{ url('storage/' . $post->main_img)  }}" class="w-100" alt="main_img">
                            </div>
                            <div class="input-group mt-3">
                                <input type="file" name="main_img" class="form-control" id="inputMainImg">
                                <label class="input-group-text" for="inputMainImg">Добавить главное изображение</label>
                            </div>
                            @error('main_img')
                            <div class="text-danger">Это поле не заполненно</div>

                            @enderror
                            <div class="w-25">
                                <img src="{{ url('storage/' . $post->preview_img) }}" class="w-100" alt="prewiev_img">
                            </div>
                            <div class="input-group mt-3">
                                <input type="file"  name="preview_img" class="form-control" id="inputPreview">
                                <label class="input-group-text" for="inputPreview">Добавить превью </label>
                            </div>
                            @error('preview_img')
                            <div class="text-danger">Это поле не заполненно</div>
                            @enderror
                            <div class="input-group mt-3">
                                <select class="form-select" id="selectCategory" name="category_id" required="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }} >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <label for="selectCategory">Выберите категорию</label>
                            </div>
                            @error('category_id')
                            <div class="text-danger">Это поле не заполненно</div>
                            @enderror
                            <div class="input-group mt-3">
                                <label for="selcetTags">Выберите тэги</label>
                                <select class="form-select" name="tag_ids[]" multiple aria-label="Multiple select example">
                                    @foreach($tags as $tag)
                                        <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
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
