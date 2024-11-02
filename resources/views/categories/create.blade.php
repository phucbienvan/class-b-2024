
<h1>Add New Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>

    <button type="submit">Thêm mới</button>
</form>

<style>
    form {
        max-width: 400px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }
    div {
        margin-bottom: 15px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    button {
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
</style>
