<div class="table-responsive">
    <table class="table border-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Creator</th>
                <th scope="col">Is Active?</th>
                <th scope="col">Edit Q</th>
                <th scope="col">Edit A</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr scope="row">
                    <th>{{($loop->index)+1}}</th>
                    <td>
                        {{$question->question_text}}
                    </td>
                    <td>
                        {{$question->type}}
                    </td>
                    <td>
                        {{$question->category}}
                    </td>
                    <td>
                        {{$question->creator}}
                    </td>
                    <td>
                        @if ($question->is_active == 1) 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                            </svg>
                        @else 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                            </svg>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        <a href="#editQuestion{{$question->id}}" data-bs-toggle="modal" class="btn btn-sm btn-dark">Edit</a>
                    </td>
                    <td style="text-align: right;">
                        <a href="#editAnswer{{$question->id}}" data-bs-toggle="modal" class="btn btn-sm btn-dark ">Edit</a>
                    </td>
                    @include('admin.layout.edit-modal')
                    <td>
                        <form action="/question/delete/{{$question->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>