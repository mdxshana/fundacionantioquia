@foreach($users as $user)
    <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
        <div class="thumbnail">
            <img src="/img/{{$user->avatar}}" alt="...">
            <div class="caption">
                <h4>{{$user->nombre." ".$user->apellido}}</h4>
                <p><i class="fa fa-mobile fa-2x" aria-hidden="true"></i> {{$user->telefono}}</p>

                <button class=" btn btn-circle btn-gradient btn-primary editarUser" value="primary" data-id="{{$user->id}}" data-nombre="{{$user->nombre}}" data-apellido="{{$user->apellido}}" data-telefono="{{$user->telefono}}" data-email="{{$user->email}}">
                    <span class="fa fa-pencil-square-o"></span>
                </button>
                <button class=" btn btn-circle btn-gradient btn-danger pull-right removeUser" value="primary">
                    <span class="fa fa-trash"></span>
                </button>
            </div>
        </div>
    </div>
@endforeach