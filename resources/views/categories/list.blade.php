
<h1>Categories</h1>

<table>
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
    @foreach ($items as $category)
    <tr>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
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
</style>
