@extends("auth.base_login")

@section("content")

    <div class="card col-md-6 login-form">
        <div class="card-body ">
            <h2 class="card-title"><center>Login</center></h2>
            <form action="{{ route('auth.login')}}" method="POST" class="vstack gap-3">
                
                @csrf
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error("email")
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe">
                    @error("password")
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    @if($errors->has('auth'))
                        <div class="alert alert-danger">
                            {{ $errors->first('auth') }}
                        </div>
                    @endif
                </div>
                <button class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>

@endsection