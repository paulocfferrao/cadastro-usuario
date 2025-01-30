<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Exibir mensagem de sucesso -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Formulário de Cadastro -->
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h4>Registro de Usuário</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Nome -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- E-mail -->
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Senha -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Confirmação de Senha -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <!-- Botão -->
                            <button type="submit" class="btn btn-primary w-100">Registrar</button>
                        </form>
                    </div>
                </div>

                <!-- Lista de Usuários -->
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Usuários Cadastrados</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <!-- Formulário para excluir usuário -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>