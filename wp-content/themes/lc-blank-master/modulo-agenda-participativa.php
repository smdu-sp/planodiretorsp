<?php
	global $wpdb;
    $agenda = $wpdb->get_results("SELECT * FROM agenda_participativa;")[0];
	$agenda->data_inicio = date('d/m', strtotime($agenda->data_inicio));
	if (is_null($agenda->data_termino) || $agenda->data_termino == '0000-00-00') {
		$agenda->data_termino = '';
	}
	if ($agenda->data_termino) {
		$agenda->data_termino = date('d/m', strtotime($agenda->data_termino));
	}
	if (is_null($agenda->horario) || $agenda->horario == '00:00:00') {
		$agenda->horario = '';
	}
	if ($agenda->horario) {
		$horario = strtotime($agenda->horario);
		if (date('i', $horario) == '00') {
			$agenda->horario = date('H\h', $horario);
		} else {
			$agenda->horario = date('H\hi', $horario);
		}
	}

    ob_start();
?>

<div id="agenda-participativa">
    <div class="container-triangulo">
        <div class="triangulo">
        </div>
    </div>
    <div class="balao">
        <div class="admin">
            <?php if (is_front_page() && is_user_logged_in()) { ?>
                <a href="/evento/?tipo=agenda" class="btn btn-primary">Editar</a><?php
            } ?>
        </div>
        <div class="container-balao">
            <div class="conteudo">
                <div class="titulo">
                    <h3>
                        <?= is_front_page() ? $agenda->titulo : '{{evento.titulo}}' ?>
                    </h3>
                </div>
                <div class="info">
                    <div class="data">
                        <img src="/assets/icone-data.png" aria-label="Data do evento">
                        <span>
                            <b>
                                <?= is_front_page() ? $agenda->data_inicio : '{{formataData(evento.data_inicio)}}'; ?>
                            </b><?php
                                if ($agenda->data_termino || !is_front_page()) { ?>
                                    <b class="quebra-linha"<?= !is_front_page() ? 'v-if="evento.data_termino && checkboxDataTermino && periodoValido"' : ''; ?>>
                                        a <?= is_front_page() ? $agenda->data_termino : '{{formataData(evento.data_termino)}}'; ?>
                                    </b><?php
                                }
                            ?>
                        </span>
                    </div>
                    <?php
                        if ($agenda->horario || !is_front_page()) { ?>
                            <div class="horario">
                                <img src="/assets/icone-horario.png" alt="Horário" aria-label="Horário">
                                <span>
                                    <?= is_front_page() ? $agenda->horario : '{{formataHorario(evento.horario)}}'; ?>
                                </span>
                            </div><?php
                        }
                        if ($agenda->local || !is_front_page()) { ?>
                            <div class="local">
                                <img src="/assets/icone-local.png" alt="Local" title="Local">
                                <span>
                                    <?= is_front_page() ? $agenda->local : '{{evento.local}}'; ?>
                                </span>
                            </div><?php
                        }
                    ?>
                </div>
            </div>
            <?php
                if (!is_front_page() || $agenda->link && validaUrl($agenda->link) && $agenda->link_texto) { ?>
                    <div class="button button-gt botao">
                        <div class="dslc-button">
                            <a <?= is_front_page() ? 'href="' . $agenda->link . '"' : ':href="evento.link"'; ?> target="_self" class="button button-gt">
                                <?= is_front_page() ? strtoupper($agenda->link_texto) : '{{evento.link_texto.toUpperCase()}}'; ?>
                            </a>
                        </div>
                    </div><?php
                }
            ?>
        </div>
    </div>
</div>
