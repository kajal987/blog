<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID#</th>
        <th>Name</th>
        <th>Email</th>
        <th>create at</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($userdetails as $key=>$user)
        <tr>
            <td> {{ ($key+1) }}</td>
            <td> {{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>

            <td>
                <a href="#"  class="userEdit">
                    <i class="fa fa-fw fa-edit"></i>
                </a>
                <a href="#" class="deleteuser" >
                    <i class="fa fa-fw fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
