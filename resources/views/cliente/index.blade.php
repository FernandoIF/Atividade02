<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" media="all" href="resources/css/estilo.css">
	<link href="{{ asset('css/estilo.css') }}" rel="stylesheet"> 

</head>
<body>

	<div class="container">
		<form method="POST" action="/cliente" class="formulario_cadastro">
			<h1>CADASTRO</h1>

			@csrf
			<input type="hidden" id="id" name="id" value="{{ $cliente->id }}">

			<div>
				<label for="nome" class="text">Nome</label>
				<input type="text" name="nome" value="{{ $cliente->nome }}">
			</div>
			<div>
				<label for="cpf" class="text">CPF</label>
				<input type="text" name="cpf" value="{{ $cliente->cpf }}">
			</div>
			<div>
				<label for="email" class="text">E-mail</label>
				<input type="email" name="email" value="{{ $cliente->email }}">
			</div>
			<div>
				<label for="telefone" class="text">Telefone</label>
				<input type="text" name="telefone" value="{{ $cliente->telefone }}">
			</div>
			<div>
				<label for="dataNascimento" class="text">Data de Nascimento</label>
				<input type="date" name="dataNascimento" value="{{ $cliente->dataNascimento }}">
			</div>
			<div class="btn">
				<button type="submit">Salvar</button>
				<a href="/cliente">Novo</a>
			</div>
		</form>

		<div class="tabela_clientes">
			<h1>PESSOAS</h1>

			<table border="1">
				<thead>
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>CPF</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clientes as $cliente)
						<tr>
							<td>{{ $cliente->nome }}</td>
							<td>{{ $cliente->email }}</td>
							<td>{{ $cliente->cpf }}</td>
							<td>
								<a href="/cliente/{{ $cliente->id }}/edit">Editar</a>
							</td>
							<td>
								<form action="/cliente/{{ $cliente->id }}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE" />
									<button type="submit">Excluir</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>