<div class="table-responsive">
    <table class="table border-dark" id="atable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Answers</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Creator</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody  class="table-group-divider">
                @foreach ($approve as $a)
                    <tr scope="row">
                        <td>{{ ($loop->index)+1 }}</td>
                        <td style="width: 35%">
                            {{ $a->question_text }}
                        </td>
                        <td style="width: 35%">
                            <div class="d-grid gap-3">
                                @foreach($a->answers as $answ)
                                    @if($answ->is_correct)
                                        <div class="p-2 border border-success">
                                            {{ ($loop->index)+1 }} ) {{$answ->answer_text}}
                                        </div>
                                    @else
                                        <div class="p-2 border border-danger">
                                            {{ ($loop->index)+1 }} ) {{$answ->answer_text}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td>
                            {{ $a->type }}
                        </td>
                        <td>
                            {{ $a->category }}
                        </td>
                        <td>
                            {{ $a->creator }}
                        </td>
                        <td style="text-align: center;">
                            <form action="/approve/{{$a->id}}" method="POST">
                                @csrf
                                <button id="liveToastBtn" class="btn btn-sm btn-dark">Approve</button>
                            </form>
                        </td>
                        <td style="text-align: center;">
                            <form action="/question/delete/{{$a->id}}" method="POST">
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
<script>
    $(document).ready(function () {
        $('#atable').DataTable();
        responsive: true;
        {
        "searching": false
        } 
    });
</script>