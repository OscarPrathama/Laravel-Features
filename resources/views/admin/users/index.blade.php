@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h2">Users Management</h1>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5">
        
        {{-- action --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ __('Add new') }}</a>
            </div>
        </div>

        {{-- table --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                @if (session('success'))
                    <div class="text-success mb-1 float-start">{{ session('success') }}</div>
                @endif
                <div class="float-end">
                    {{ $users->total() }} users
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr class="fw-bold text-center">
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Date of Birth</td>
                            <td>Notes</td>
                            <td>Action</td>
                        </tr>
                        @if ($users != [])
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin === 1 ? 'Admin' : 'User' }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->notes }}</td>
                                    <td>
                                        <a href="{{ route("admin.users.edit", ["id" => $user->id ]) }}" class="text-decoration-none me-2">Edit</a>
                                        
                                        <form action="{{ route("admin.users.delete", ['id' => $user->id ]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a href="javascript:void(0)" class="text-decoration-none delete-post">Delete</a>    
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('script')
    <script>
        $(function(){
            $('a.delete-post').on('click', function(){
                if(confirm('Delete it ?')){
                    $(this).parents('form').submit();
                }
            });
        })
    </script>
@endpush