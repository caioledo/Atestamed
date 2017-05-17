<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>AtestaMed</title>
	<link rel="stylesheet" href="css/normalize.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300,100' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/estilo.css" />
</head>

<body>
	<?php
	include("includes/header.inc.php");
	?>
	<div class="linha3">
		<section>
			<div class="tab">
				<div class="linha3">
					<div class="linha2">
						<div class="coluna col12">
							<ul class="title-margin">
								<h1 class="title">Dados do Paciente</h1>
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Nome</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="nome" id="nome" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Endereço</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="endr" id="endr" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Email</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="email" id="email" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Telefone</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="tel" id="tel" />
							</ul>
						</div>
					</div>


					<div class="linha2">
						<div class="coluna col12">
							<ul class="title-margin">
								<h1 class="title">Dados do Atestado</h1>
							</ul>
						</div>
					</div>


					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Data e horário da consulta/procedimento</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="data" id="data" placeholder="DD/MM/YYYY" />
							</ul>
							<ul class="input-text">
								<input type="text" name="hora_inicio" id="hora_inicio" placeholder="HH:MM"/>
								 a 
								<input type="text" name="hora_fim" id="hora_fim" placeholder="HH:MM" />
							</ul>
						</div>
					</div>


					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Período de afastamento</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="periodo_inicio" id="periodo_inicio" placeholder="DD/MM/YYYY" />
								 a 
								<input type="text" name="periodo_fim" id="periodo_fim" placeholder="DD/MM/YYYY" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">CID</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="cid" id="cid" />
							</ul>
						</div>
					</div>




					<div class="linha2">
						<div class="coluna col12">
							<ul class="title-margin">
								<h1 class="title">Dados do Médico</h1>
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Conselho</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<select name="conselho" id="conselho">
									<option selected="selected" value="1">CRM</a>
								</select>
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">UF</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="consuf" id="consuf" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Número de registro no conselho</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="consnum" id="consnum" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Especialidade</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="esp" id="esp" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Endereço</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="endr2" id="endr2" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Email</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="email2" id="email2" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col4">
							<ul class="main inline sem-marcador">
								<h1 class="info">Telefone</h1>
							</ul>
						</div>

						<div class="coluna col5">
							<ul class="input-text">
								<input type="text" name="tel2" id="tel2" />
							</ul>
						</div>
					</div>

					<div class="linha2">
						<div class="coluna col6">
							<ul class="button-margin-right">
								<input type="submit" class="botao" value="Gerar Atestado" />
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="footer">
		<div class="linha2">
			<footer>
				<div class="coluna col12">
					<span>&copy; 2017 - Cesupa</span>
				</div>
			</footer>
		</div>
	</div>
</body>
</html>
