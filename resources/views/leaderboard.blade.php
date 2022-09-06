<x-app-layout>
    <div class="container">
        <div class="py-2 d-flex justify-content-center"> 
            <h6>TOP 10:</h6>
        </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="p-5 border border-secondary">
                        <table class="table table-light table-bordered border-dark table-striped table-responsive-sm">
                            <thead>
                            <tr>
                                <th style="width:6%">Rank</th>
                                <th style="width:6%"></th>
                                <th>Name</th>
                                <th style="width:6%">Score</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                            <tr >
                                <td>{{ ($loop->index)+1 }}</td>
                                <td><img class="rounded" src="{{ $user->profile_pic }}" alt="pic" width="45" height="40"></td>
                                <td> <a href="/user/{{$user->id}}" class="btn" role="button"> {{$user->name}}</a></td>
                                <td>{{$user->xp}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>  
    </div>
</x-app-layout>