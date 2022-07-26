<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <a class="navbar-brand" href="#">{{$current}}</a>
  
    <div class="navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
                <li @if ($current=="index") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="{{ route('index') }}">home</a>
                </li>
                <li @if ($current=="produtos") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="{{ route('produtos') }}">produtos</a>
                </li>
                <li @if ($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="{{ route('categorias') }}">categorias</a>
                </li>
                <li @if ($current=="novacategoria") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="{{ route('novacategoria') }}">nova categoria</a>
                </li>
                <li @if ($current=="cliente") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="{{ route('cliente') }}">cliente</a>
                </li>
        </ul>
    </div>
  </nav>