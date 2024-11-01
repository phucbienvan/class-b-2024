
<h1>Categories</h1>
<a href="{{ route('categories.create') }}"><button class="btn-primary">Create Category</button></a>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (session('error'))
    <p>{{ session('error') }}</p>
@endif

<table>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Action</th>

    </tr>
    @foreach ($items as $category)
    <tr>
      <td>
        <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}
        </a>
      </td>
      <td>{{ $category->description }}</td>
      <td>
        <a href="{{ route('categories.edit', $category->id) }}">
          Edit
        </a>
      </td>

    </tr>
    @endforeach
  </table>

  <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .btn-primary {
        width: 100px;
        padding: 4px;
        background-color: #3f51b5;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        margin-bottom: 20px;
    }

    .btn-primary:hover {
        background-color: #1b30a3;
    }
</style>
