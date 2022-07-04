<form enctype="multipart/form-data" method="POST" action="#">
    @csrf
<div class="form-group pt-4">
    <label>Question Text:</label>
    <input type="text" name="title" class="form-control" required="">
</div>
<div class="form-check pt-4">
    <label for="is_true">Is True?</label>
    <input class="form-check-input" type="checkbox" value="" name="is_true">
</div>
<div class="form-group pt-4">
    <div class="col-md-2">
    <label for="category">Category:</label>
    <select class="form-control" name="category" type="category" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" selected > {{$category->name}} </option>
            @endforeach
    </select>
    </div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-secondary text-dark">Submit</button>
</div>
</form>