<?php
/*
Template Name: Formulário Chamamento
*/
// require_once('homenagem.php');

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
		the_content();

		// Formulário para cadastro de homenagem
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$camposForm = [
				'nome_entidade',
				'tematicas_escolhidas',
				'atuacao_associados',
				'representante_nome',
				'representante_rg',
				'representante_cpf',
				'representante_email',
				'representante_telefone',
				'suplente_nome',
				'suplente_rg',
				'suplente_cpf',
				'suplente_email',
				'suplente_telefone',
				'entidade_email',
				'entidade_telefone',
				'entidade_endereco'
			];
			// $anexo_ato = $_FILES['anexo_ato_constitutivo'];
			// $anexo_representantes = $_FILES['anexo_representantes_legais'];

			$sqlData = [];

			foreach ($camposForm as $key => $coluna) {
				$sqlData[$coluna] = $_POST[$coluna];
			}

			// EXTCODE
			global $wpdb;
			$wpdb->show_errors();
			// $data = array('nome' => 'Fulano', 'email_homenageador' => 'fljr@gm.ail');
			// var_dump($data);
			// echo "<br>DATA ^^^... SQLDATA vvv<br><br>";
			// var_dump($sqlData);

			$wpdb->insert('entidades_chamamento', $sqlData);
			$idEntidade = $wpdb->insert_id;

			// ENVIO DE ANEXO
			$target_dir = get_template_directory() . "/../../uploads/anexos-entidade/";
			$target_file = $target_dir . $idEntidade . "_";
			$uploadOk = 1;

			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Desculpe, não foi possível enviar. Tente novamente. Se o erro persistir, por favor, envie um e-mail para smduaticsistemas@prefeitura.sp.gov.br e informe este erro.";
				$uploadOk = 0;
			}

			// Check file size
			if ($_FILES["anexo_ato_constitutivo"]["size"] > 9000000 || $_FILES["anexo_representantes_legais"]["size"] > 9000000) {
				echo "Desculpe, o arquivo é muito grande. Por favor, selecione outro arquivo.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Desculpe, ocorreu uma falha no envio. Tente novamente com outro arquivo.";
				// if everything is ok, try to upload file
			} else {
				// Envia arquivos para o servidor
				$target_file_ato = $target_file . 'ato_constitutivo_' . $_FILES['anexo_ato_constitutivo']['name'];
				$target_file_representantes = $target_file . 'representantes_' . $_FILES['anexo_representantes_legais']['name'];

				/*
				echo "<script>window.alert('Sua homenagem foi enviada com sucesso. Após breve análise, ela será inserida no nosso mural.');
				window.location.replace('https://aultimahomenagem.prefeitura.sp.gov.br');</script>";
				*/

				if (
					move_uploaded_file($_FILES["anexo_ato_constitutivo"]["tmp_name"], $target_file_ato) &&
					move_uploaded_file($_FILES["anexo_representantes_legais"]["tmp_name"], $target_file_representantes)
				) {
					// echo "The file " . basename($_FILES["anexo"]["name"]) . " has been uploaded.";
					echo "<div class='mensagem-sucesso'>Formulário enviado com sucesso!</div>";
					get_footer();
					return;
				} else {
					echo "Houve um erro ao enviar os dados do formulário. Verifique os campos e tente novamente.";
				}
			}
			// FIM ENVIO DE ANEXO
		}
		?>
		<br>
		<br>

		<div id="appchamamento">
			<form method="post" class="form-entidade" action="<?php echo get_permalink(); ?>" enctype="multipart/form-data">
				<div class="card-chamamento">
					<div class="card-header-chamamento">
						<h2>INFORMAÇÕES DA ENTIDADE</h2>
					</div>
					<div>
						<label for="nome_entidade">Nome da entidade</label>
						<div>
							<input type="text" id="nome_entidade" name="nome_entidade" required>
						</div>
						<!-- BOTOES TEMATICAS -->
						<span>Escolha as temáticas em que pretende participar das reuniões</span>
						<div>
							<div v-for="valor, tematica, index in tematicas" class="tematicas-button">
								<!-- tematica: chave (key) -->
								<label :for="'tematica_'+index" @click="escolheTematicas(tematica)" :class="valor ? 'botao-selecionado' : ''">
									<div>{{ tematica }}</div>
								</label>
								<div>
									<input style="display: none" v-model="tematicas[tematica]" type="checkbox" :id="'tematica_'+index" />
								</div>
							</div>
							<div style="display: none">
								<input type="text" id="tematicas_escolhidas" v-model="tematicas_escolhidas" name="tematicas_escolhidas" />
							</div>
							<!-- <div><input type="checkbox" id="tematicas" name="tematicas" value="Instrumentos de Política Urbana"></div> -->
						</div>
						<!-- BOTOES TEMATICAS -->
						<label for="atuacao_associados">Indicação do tempo de atuação e do número de associados</label>
						<div>
							<input type="text" id="atuacao_associados" name="atuacao_associados" required>
						</div>
					</div>
				</div>
				<div class="card-chamamento">
					<div class="card-header-chamamento">
						<h2>REPRESENTANTE</h2>
					</div>
					<div>
						<label for="representante_nome">Nome completo</label>
						<div>
							<input type="text" id="representante_nome" name="representante_nome" required>
						</div>
						<div class="campo-chamamento">
							<label for="representante_rg">RG</label>
							<div>
								<input type="text" id="representante_rg" name="representante_rg" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="representante_cpf">CPF</label>
							<div>
								<input type="text" id="representante_cpf" name="representante_cpf" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="representante_email">E-mail</label>
							<div>
								<input type="text" id="representante_email" name="representante_email" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="representante_telefone">Telefone</label>
							<div>
								<input type="text" id="representante_telefone" name="representante_telefone" required>
							</div>
						</div>
					</div>
				</div>
				<div class="card-chamamento">
					<div class="card-header-chamamento">
						<h2>SUPLENTE</h2>
					</div>
					<div>
						<label for="suplente_nome">Nome completo</label>
						<div>
							<input type="text" id="suplente_nome" name="suplente_nome" required>
						</div>
						<div class="campo-chamamento">
							<label for="suplente_rg">RG</label>
							<div>
								<input type="text" id="suplente_rg" name="suplente_rg" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="suplente_cpf">CPF</label>
							<div>
								<input type="text" id="suplente_cpf" name="suplente_cpf" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="suplente_email">E-mail</label>
							<div>
								<input type="text" id="suplente_email" name="suplente_email" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="suplente_telefone">Telefone</label>
							<div>
								<input type="text" id="suplente_telefone" name="suplente_telefone" required>
							</div>
						</div>
					</div>
				</div>
				<div class="card-chamamento">
					<div class="card-header-chamamento">
						<h2>CONTATOS DA ENTIDADE E REPRESENTANTE LEGAL</h2>
					</div>
					<div>
						<div class="campo-chamamento">
							<label for="entidade_email">E-mail</label>
							<div>
								<input type="text" id="entidade_email" name="entidade_email" required>
							</div>
						</div>
						<div class="campo-chamamento">
							<label for="entidade_telefone">Telefone</label>
							<div>
								<input type="text" id="entidade_telefone" name="entidade_telefone" required>
							</div>
						</div>
						<label for="entidade_endereco">Endereço</label>
						<div>
							<input type="text" id="entidade_endereco" name="entidade_endereco" required>
						</div>
					</div>
					<div>

						<br>
						<span>Arquivos</span>
						<br>
						<!-- ANEXOS: FORMATO PDF -->
						<!-- As entidades deverão apresentar cópia de ato de sua constituição, bem como de documento previsto em lei que indique os respectivos representantes legais (titular e suplente) por meio digital. -->
						<div>
							<label for="anexo_ato_constitutivo">Cópia de ato constitutivo</label><br>
							<input style="background-color: unset;" type="file" id="anexo_ato_constitutivo" name="anexo_ato_constitutivo" accept="application/pdf" required>
						</div>
						<div>
							<label for="anexo_representantes_legais">Cópia de documento que indique os representantes legais</label><br>
							<input style="background-color: unset;" type="file" id="anexo_representantes_legais" name="anexo_representantes_legais" accept="application/pdf" required>
						</div>
						<!-- ANEXOS -->
					</div>
					<!-- CAPTCHA -->
					
				</div>

				<center>
					<button class="button-chamamento" type="submit">ENVIAR</button>
				</center>

			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
		<script type="text/javascript">
			var app = new Vue({
				el: '#appchamamento',
				data: {
					tematicas: {
						"Instrumentos de Política Urbana": false,
						"Mobilidade Urbana": false,
						"Meio Ambiente": false,
						"Habitação": false,
						"Desenvolvimento Econômico e Social": false
					},
					tematicas_escolhidas: ""
				},
				methods: {
					escolheTematicas: function(tematica) {
						// Verifica os itens de temática selecionados
						this.tematicas_escolhidas = "";

						window.setTimeout(() => {
							for (tematica in this.tematicas) {
								if (this.tematicas[tematica]) {
									if (this.tematicas_escolhidas.length > 0) {
										this.tematicas_escolhidas += ", ";
									}
									this.tematicas_escolhidas += tematica
								}
							}
						}, 100);
					}
				}
			})
		</script>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>