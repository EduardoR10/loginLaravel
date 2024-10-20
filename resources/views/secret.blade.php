<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                 Nombre de usuario: @auth {{ Auth::user()->name }} @endauth
            </a>
            <div class="col-md-3 text-end">
                <a href="{{ route('logout') }}">
                    <button type="button" class="btn btn-outline-primary me-2">Salir</button>
                </a>
            </div>
        </header>

        <article class="container">
            <h3>Tabla de mensajes</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mensajes as $mensaje)
                        <tr>
                            <td>{{ $mensaje->user->name }}</td>
                            <td>{{ decrypt($mensaje->mensaje) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">No se encontraron mensajes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <form method="POST" action="{{ route('mensajes.store') }}">
                @csrf
                <div class="mb-3">
                    <h3 for="mensaje" class="form-label">Nuevo mensaje</h3>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                    @error('mensaje')
						<div style="color: red;">{{ $message }}</div>
					@enderror
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </article>
    </div>
</body>
</html>
