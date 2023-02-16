<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category
        </h2>
    </x-slot>
            <div class="py-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('success')}}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                    <div class="card-header">All Categories</div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Created_At</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @php($i=1) --}}
                                            @foreach ($Categories as $Category )
                                                <tr>
                                                        <th scope="row">{{$Categories->firstItem()+$loop->index}}</th>
                                                        <td>{{$Category->category_name}}</td>
                                                        <td>{{$Category->User->name}}</td>
                                                    @if ($Category->created_at == NULL)
                                                        {{-- <span class="text-primary">No Date Set</span> --}}
                                                    @else
                                                        <td>{{carbon\carbon::parse($Category->created_at)->diffForHumans()}}</td>
                                                        <td> <a href="{{url('category/edit/' . $Category->id)}}" class="btn btn-info">Edit</a>
                                                        <a href="{{url('softdelete/category/' . $Category->id)}}" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                                    @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$Categories->links()}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Add Category</div>
                                    <div class="card-body">
                                    <form action="{{route('store.category')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('category_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark">Submit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
</x-app-layout>
