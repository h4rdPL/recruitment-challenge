@include('Header')
<img style="z-index: -9999" id="background" class=" -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background_image" />
<div class="container">
    <h1>Edit category</h1>
    <form class="form" action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        <button class="edit-btn" type="submit">Update Category</button>
    </form>
</div>
