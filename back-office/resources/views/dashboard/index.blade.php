@extends("base")

@section("content")

    <div class="dashboard">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Nombre Utilisateur</h6>
                        <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{ $user_count }}</span></h2>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Nbre Utilisateur connecté</h6>
                        <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>{{ $user_connected }}</span></h2>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Nbre Utilisateur supprimé</h6>
                        <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>{{ $user_deleted }}</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection