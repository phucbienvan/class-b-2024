<h1>Create category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
        @error('description')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">Add Category</button>
</form>

<style>
    form {
        max-width: 500px;
        margin: 20px auto;
    }
    div {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
    .error {
        color: red;
        font-size: 12px;
    }
</style>