@extends("base")

@section("title","creation utilisateur")

@section("content")

    <div class="card col-md-8">
        <div class="card-head">
            <div class="card-title">Creation Utilisateur</div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nom" value="{{old('name','nom')}}">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="{{old('email','mail')}}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <button class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection