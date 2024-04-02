@include('Header')
<img id="background" style="z-index: -9999" class="absolute left-[-20px] top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background_image" />
<div class="container">
    <h1>Create test</h1>
    <form class="form" method="POST" action="{{route('tests.store') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input placeholder="Test name..." type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea placeholder="Description..." id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="test_code">Test Code:</label>
            <input placeholder="142" type="number" id="test_code" name="test_code" required>
            @error('test_code')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="icd_code">ICD Code:</label>
            <input placeholder="A12" type="text" id="icd_code" name="icd_code" required>
            @error('icd_code')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="categories">Categories:</label>
            <select id="categories" name="categories[]" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button class="form-btn" type="submit" >Submit</button>
    </form>
</div>
