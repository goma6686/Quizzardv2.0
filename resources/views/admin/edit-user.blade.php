<x-app-layout>
<div class="tm-md-12 tm-sm-12">
    <h1 class="latest text-center mb-2">Edit User</h1>
    {{ Html::ul($errors->all()) }}
    <div class="max-w-5md sm:px-6 lg:px-8 p-5">
        <form enctype="multipart/form-data" method="POST" action="{{route('update-user', array($user->id))}}">
            @csrf
            <div class="form-group pt-4">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group pt-4">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            @if(auth()->check() && Auth::user()->is_admin)
                <div class="form-check pt-4">
                    <label for="is_active">Active?</label>
                    <input class="form-check-input" type="checkbox" @if ($user->is_active == 1) @checked(true) @endif value="{{$user->is_active}}" name="is_active">
                </div>
                <div class="form-check pt-4">
                    <label for="is_admin">Admin?</label>
                    <input class="form-check-input" type="checkbox" @if ($user->is_admin == 1) @checked(true) @endif value="{{$user->is_admin}}" name="is_admin">
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</x-app-layout>