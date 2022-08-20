<!-- Edit Modal -->
<div class="modal fade" id="edit{{$question->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form enctype="multipart/form-data" method="POST" action="{{route('question.update', $question->id)}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="question_text">Question Text</label>
                    <input type="text" id="question_text" name="question_text" value="{{ old('question_text', $question->question_text) }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" type="category_id" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if ($question->category_id == $category->id) selected @endif> {{$category->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="is_active">Active?</label>
                    <input class="form-check-input" type="checkbox" @if ($question->is_active == 1) @checked(true) @endif value="{{$question->is_active}}" name="is_active">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
      </div>
    </div>
  </div>