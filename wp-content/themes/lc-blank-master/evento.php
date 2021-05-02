<?php

/**
 * Evento
 */

    class Evento
    {
        function __construct($id, $tipo, $tema, $titulo, $destaque, $descricao, $data, $hora, $local, $link, $documentos)
        {
            $this->id = $id;
            $this->tipo = $tipo;
            $this->tema = $tema;
            $this->titulo = $titulo;
            $this->destaque = $destaque;
            $this->descricao = $descricao;
            $this->data = $data;
            $this->hora = $hora;
            $this->local = $local;
            $this->link = $link;
            $this->documentos = $documentos;
        }
    }

    $exemplo = new Evento(0, "live", "descrição do tema", "Título curto da live nessa linha", "com Fulano de Tal", "Descrição longa com determinada quantidade de caracteres", "2021-07-19", "10:00:00", "Av. Paulista, 100", "http://www.google.com/", "[{nome: 'ATA / lista de presença...', link: 'http://link/...'}]");

    function getEventos(array $tipos = [])
    {
        global $wpdb;        
        $where = "1 = 1"; // Delimita busca
        if(sizeof($tipos) > 0) {
            for ($i=0; $i < sizeof($tipos); $i++) { 
                if($i === 0){
                    $where .= " AND `tipo` = '{$tipos[$i]}'";
                }
                else {
                    $where .= " OR `tipo` = '{$tipos[$i]}'";
                }
            }
        }

        $sql = "SELECT * FROM eventos_agenda WHERE {$where} ORDER BY data_evento, hora_evento;";
        $results = $wpdb->get_results($sql, OBJECT);
        foreach ($results as $key => $value) {
            $sql = "SELECT nome, link FROM documentos_evento WHERE `id_evento` = " . $value->id;
            $docs = $wpdb->get_results($sql, OBJECT);
            $results[$key]->documentos = $docs;
        }
        return $results;
    }

?>
