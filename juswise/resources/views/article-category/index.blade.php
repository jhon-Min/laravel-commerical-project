@extends('layouts.app')

@section("title") Article Category Manager @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item active mb-3" aria-current="page">Article Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Article Category Lists
                    </h4>
                    <hr>
                    <form action="{{ route('article-category.store') }}" class="mb-4" method="POST">
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" class="form-control form-control-lg @error('title')
                                is-invalid
                            @enderror" placeholder="New Category" value="{{ old('title') }}" required>
                            <button class="btn btn-primary btn-lg ms-3">Add Category</button>
                        </div>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </form>

                    @include('article-category.list')

               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>
        const askArtiCateConfirm = (id) => {
            Swal.fire({
                title: `Are you sure?`,
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'This Category has been deleted.',
                    'success'
                    )
                    setTimeout(function(){
                       $('#form'+id).submit();
                    }, 1500)
                }
            })
        }

    </script>
@endsection


