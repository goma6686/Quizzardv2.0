<x-app-layout>
    <div class="container">
            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Score</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                            <tr >
                                <td>{{ ($loop->index)+1 }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->xp}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
    </div>
</x-app-layout>