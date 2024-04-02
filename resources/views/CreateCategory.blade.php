@include('Header');
<img id="background" style="z-index: -9999" class="absolute left-[-20px] top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background_image" />
<div class="container">
    <h1>Create category</h1>
    <form class="form" method="POST" action="{{ route('categories.create') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <button class="form-btn" type="submit">Create</button>
    </form>
</div>
