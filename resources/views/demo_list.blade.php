<h2>All Demo Requests</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Phone</th>
        <th>Plan</th>
    </tr>

    @foreach($demos as $d)
    <tr>
        <td>{{ $d->name }}</td>
        <td>{{ $d->email }}</td>
        <td>{{ $d->company }}</td>
        <td>{{ $d->phone }}</td>
        <td>{{ $d->plan }}</td>
    </tr>
    @endforeach
</table>