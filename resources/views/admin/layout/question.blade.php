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
            @php
            $counter = 0;
            @endphp
            @foreach ($questions as $question)
            @php
            $counter++;
            @endphp
            <tr scope="row">
                <th>{{$counter}}</th>
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
                    <a href="#" class="btn btn-sm btn-dark " role="button" data-bs-toggle="modal" data-bs-target="#modal" data-bs-value="{{$question->id}}">Edit</a>
                </td>
                <td style="text-align: right;">
                    <a href="#" class="btn btn-sm btn-dark " role="button" data-bs-toggle="modal" data-bs-target="#modal" data-bs-value="{{$question->id}}">Edit</a>
                </td>
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
<!-- EDIT QUESTION MODAL -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Update Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="question_text" class="col-form-label">Question:</label>
              <input type="text" class="form-control" id="question_text" value="{{ $question->question_text }}">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Category:</label>
                <select class="form-control" name="category" type="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"  > {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="is_active">Active?</label>
                <input class="form-check-input" type="checkbox" @if ($question->is_active == 1) @checked(true) @endif value="{{$question->is_active}}" name="is_active">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-secondary text-dark">Change</button>
        </div>
      </div>
    </div>
</div>
<!--END OF EDIT QUESTION MODAL -->
<script>
    const exampleModal = document.getElementById('modal')
    exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-value')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
    })

</script>