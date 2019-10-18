<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
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
            <td>
                <img src="{{ url('storage/users/'.$user->image) }} " style="height: 10%"  /></td>
            {{--            <td><img  src="{{ storage_path().'/app/uploads/IdvmIU8pOjgk5V1LFqufyjSPoElSuxvfEFA8cBVc.jpeg' }}" alt="" title="" /></td>--}}

            <td>{{ $user->created_at }}</td>

            <td>
                <a href="javascript:void(0);" data-user='{{ json_encode($user) }}' class="userEdit">
                    <i class="fa fa-fw fa-edit"></i>
                </a>
                <a href="javascript:void(0);" data-user='{{  json_encode($user) }}' class="deleteuser" >
                    <i class="fa fa-fw fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
