@extends("base")

@section("content")

    @if(Session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between my-2">
       <a class="btn btn-primary" href="{{ route('user.create')}}">AJOUTER</a>
        <h1 class="text-2xl">Liste Utilisateur</h1>
    </div>

    <table class="table">
        <thead>
            <tr class=" text-gray-700 uppercase text-sm leading-normal border-b-2 border-black relative top-0">
                <th >Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $users)
            <tr>
                <td >{{ $users->id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('user.edit', ['user' => $users->id]) }}">Modifier</a> 
                    @auth
                        @if (\Illuminate\Support\Facades\Auth::user()->id!= $users->id)
                            <a class="btn btn-danger" href="{{ route('user.delete', ['user' => $users->id]) }}">Supprimer</a>                
                        @endif
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $user->links() }}
@endsection