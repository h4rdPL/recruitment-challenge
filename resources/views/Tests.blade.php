@include('Header')
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <img id="background" class=" -left-0 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <table class="w-full table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Test Code</th>
                    <th class="px-4 py-2">ICD code</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody id="testData">
                @foreach($tests as $test)
                    <tr>
                        <td class="border px-4 py-2">{{ $test->id }}</td>
                        <td class="border px-4 py-2">{{ $test->name }}</td>
                        <td class="border px-4 py-2">{{ $test->description }}</td>
                        <td class="border px-4 py-2">{{ $test->test_code }}</td>
                        <td class="border px-4 py-2">{{ $test->icd_code }}</td>
                        <td class="border px-4 py-2">
                            @php
                                $categoryNames = $test->categories->pluck('name')->implode(', ');
                            @endphp
                            {{ $categoryNames }}
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('tests.edit', $test->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Edit</a>
                            <form action="{{ route('tests.delete', $test->id) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white font-bold py-2 px-4 rounded inline-block">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="/tests/create" class="btn">Add test 🧪</a>
        <a href="/categories" class="btn">Categories list 📂</a>
    </div>
</div>
