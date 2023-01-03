@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Category" }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h2">Categories Management</h1>
                <div class="border-bottom mt-3"></div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5">
        
        {{-- action --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">{{ __('Add new') }}</a>
            </div>
        </div>

        {{-- table --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                @if (session('success'))
                    <div class="text-success mb-1 float-start">{{ session('success') }}</div>
                @endif
                <div class="float-end">
                    {{-- {{ $categories->total() }} categories --}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-categories">
                        <tr class="fw-bold text-center">
                            <td>Name</td>
                            <td>Description</td>
                            <td>Image</td>
                            <td>Action</td>
                        </tr>
                        @if ($categories != [])
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="img-wrapper">
                                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-100">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route("admin.categories.edit", $category->id) }}" class="text-decoration-none me-2">Edit</a>
                                        
                                        <form action="{{ route("admin.categories.destroy", $category->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a href="javascript:void(0)" class="text-decoration-none delete-record">Delete</a>    
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">No data</td>
                            </tr>
                        @endif
                        
                    </table>
                </div>
                <div class="pagination">
                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('script')
<script>
    $(function(){
        $('a.delete-record').on('click', function(){
            if(confirm('Delete it ?')){
                $(this).parents('form').submit();
            }
        });
    })
</script>
@endpush