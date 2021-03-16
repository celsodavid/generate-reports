<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>E-mail VerifiedAt</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
