@extends('layouts.app')

@section("title") Edit Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Lists</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-feather"></i>
                        Edit Article
                    </h4>
                    <hr>

                    <form action="{{ route('article.update', $article->id) }}" id="createArticle" method="POST">
                        @csrf
                        @method('put')
                    </form>
               </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="">Select Category</label>
                        <Select class="custom-select @error('category_id')
                            is-invalid
                        @enderror" form="createArticle" name="category" >
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                 <option value="{{ $category->id }}" {{ old('category', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </Select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                       <div class="form-group">
                           <label for="">Article Title</label>
                           <input type="text" class="form-control form-control-lg @error('title')
                               is-invalid
                           @enderror" form="createArticle" value="{{ old('title', $article->title) }}" name="title" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>

                       <div class="form-group">
                           <label for="">Article Description</label>
                           <textarea class="form-control form-control-lg @error('description')
                               is-invalid
                           @enderror" rows="13" form="createArticle" name="description" required>{{ old('description', $article->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                       <button class="btn btn-primary btn-block" form="createArticle">Update Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
