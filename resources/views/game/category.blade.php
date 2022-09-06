<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 d-flex justify-content-center"> 
                    <h6>CHOOSE A CATEGORY YOU WOULD LIKE TO PLAY:</h6>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-20 text-center">
                        <label for="category">Category:</label>
                        <form method="POST" action="/categorygame">
                            @csrf
                            <select class="form-control" name="category" type="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"  > {{$category->name}} </option>
                                    @endforeach
                            </select>
                            <input type="submit" class="btn btn-outline-dark mt-2" value="Play">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>