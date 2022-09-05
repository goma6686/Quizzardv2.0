<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 d-flex justify-content-center"> 
                    <h6>TYPE IN YOUR SEED:</h6>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-20 text-center">
                        <form method="POST" action="/seed">
                            @csrf
                            <input type="number" name="seed">
                            <input type="submit" class="btn btn-outline-dark" value="Play">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>