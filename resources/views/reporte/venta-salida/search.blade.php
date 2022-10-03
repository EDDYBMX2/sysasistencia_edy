{!! Form::open(['url' => 'reporte/venta-salida', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}
<div class="row m-2">
    <div class="col-md-2 col-6 mb-2">
        <input type="date" class="form-control form-control-sm" name="searchText" value="{{$searchText}}">
    </div>
    <div class="col-md-2 col-6 mb-2">
        <input type="date" class="form-control form-control-sm" name="searchText2" value="{{$searchText2}}">
    </div>
    <div class="col-md-4 col-12 mb-2">
        <select class="form-control form-control-sm" name="searchText3">
            @foreach ($sucursal as $item)
                <option value="{{$item->id}}" {{$searchText3 == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    @if (auth()->user()->TipoUsuario == 'ADMINISTRADOR')
        <div class="col-md-3 col-12 mb-2">
            <input type="text" class="form-control form-control-sm" name="searchText4" value="{{ $searchText4 }}">
        </div>
    @endif
    <div class="col-md-1 col-12">
        <button type="submit" class="btn btn-default btn-sm">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
{{ Form::close() }}
