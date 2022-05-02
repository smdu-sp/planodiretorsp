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
        <div class="conteudo">
            <div class="titulo">
                <h3>
                    <?= $agenda->titulo ?>
                </h3>
            </div>
            <div class="info">
                <div class="data">
                    <span>
                        <b>
                            <?= $agenda->data_inicio; ?>
                        </b><?php
                            if ($agenda->data_termino) { ?>
                                <b class="quebra-linha">
                                     a <?= $agenda->data_termino; ?>
                                </b><?php
                            }					
                        ?>
                    </span>
                </div>
                <?php
                    if ($agenda->horario) { ?>
                        <div class="horario">
                            <span>
                                <?= $agenda->horario; ?>
                            </span>
                        </div><?php
                    }
                    if ($agenda->local) { ?>
                        <div class="local">
                            <span>
                                <?= $agenda->local; ?>
                            </span>
                        </div><?php
                    }
                ?>
            </div>
        </div>
        <?php
            if ($agenda->link && validaUrl($agenda->link) && $agenda->link_texto) { ?>
                <div class="button button-gt botao">
                    <div class="dslc-button">
                        <a href="<?= $agenda->link ?>" target="_self" class="button button-gt">
                            <?= strtoupper($agenda->link_texto); ?>
                        </a>
                    </div>
                </div><?php
            }
        ?>
    </div>
</div>
