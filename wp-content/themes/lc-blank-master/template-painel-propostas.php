<?php
/*
Template Name: Painel de Propostas
*/

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        the_content();

        // OBTÉM LISTA DE REGISTROS CADASTRADOS
        $comandoquery = "SELECT 
                            a.id AS 'ID', 
                            a.data_envio AS 'Data', 
                            a.subprefeitura AS 'Subprefeitura', 
                            a.nome AS 'Nome', 
                            a.email AS 'E-mail', 
                            a.entidade AS 'Entidade', 
                            b.resposta_1 AS 'Resposta 1', 
                            a.proposta AS 'Proposta', 
                            c.resposta_2 AS 'Resposta 2', 
                        DATE_FORMAT(a.created_at, '%d/%m/%Y às %H:%i:%s') AS 'Recebido Em'
                        FROM `registros_propostas` AS a
                        INNER JOIN `propostas_alternativas_1` AS b ON a.resposta_1 = b.id 
                        INNER JOIN `propostas_alternativas_2` AS c ON a.resposta_2 = c.id
                        ORDER BY a.id ASC;";
        $registros = $wpdb->get_results($comandoquery);
        echo "<script>const registros=" . json_encode($registros) . "</script>";
        include_once 'modulo-vue.php';

        ?>

        <div id="apppainel">
            <div class="button">
                <a href="#" target="_self" @click="exportaArquivo('xlsx')">
                    <span>
                        BAIXAR XLSX
                    </span>
                </a>
            </div>
            <div class="button">
                <a href="#" target="_self" @click="exportaArquivo('csv')">
                    <span>
                        BAIXAR CSV
                    </span>
                </a>
            </div>
            <table id="tabelaPainel" class="tabela-painel">
                <tr>
                    <th v-for="coluna in colunas">{{coluna}}</th>
                </tr>
                <tr v-for="registro in registros">
                    <td v-for="coluna in colunas">
                        <span>{{ registro[coluna] }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <script src="<?= $jsPath ?>xlsx.full.min.js"></script>
        <script type="text/javascript">
            var app = new Vue({
                el: '#apppainel',
                data: {
                    registros: registros,
                    colunas: [],
                    nome_planilha: 'Propostas',
                    nome_arquivo: 'Propostas recebidas'
                },
                methods: {
                    exportaArquivo: function(tipo) {
                        if (typeof tipo === "string") {
                            var worksheet = XLSX.utils.json_to_sheet(this.registros);
                            var workbook = XLSX.utils.book_new();
                            XLSX.utils.book_append_sheet(workbook, worksheet, this.nome_planilha);
                            XLSX.writeFile(workbook, this.nome_arquivo + '.' + tipo);
                        }
                    }
                },
                created: function() {
                    // Esconde conteúdo quando JavaScript não estiver habilitado
                    var conteudo = document.getElementById("apppainel");
                    conteudo.style.display = "block";

                    for (let coluna in this.registros[0]) {
                        this.colunas.push(coluna)
                        for (let linha in this.registros) {
                            for (let col in this.registros[linha]) {
                                registros[linha][col] = registros[linha][col]?.replace(/\\\'/g, "\'")
                            }
                        }
                    }
                }
            });
        </script>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
