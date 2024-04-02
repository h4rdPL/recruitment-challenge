@include('Header')
<body>
<img style="z-index: -9999" id="background" class=" -lefNt-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background_image" />
<div class="container">
    <h1>Edit test</h1>
    <form class="form" method="POST" action="{{ route('tests.update', $test->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $test->name }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $test->description }}</textarea>
        </div>
        <div>N
            <label for="test_code">Test Code:</label>
            <input type="number" id="test_code" name="test_code" value="{{ $test->test_code }}" required>
        </div>
        <div>
            <label for="icd_code">ICD Code:</label>
            <input type="text" id="icd_code" name="icd_code" value="{{ $test->icd_code }}" required>
        </div>

        <div>
            <label for="categories">Categories:</label>
            <select id="categories" name="categories[]" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $test->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="edit-btn">Update</button>
    </form>
</div>
