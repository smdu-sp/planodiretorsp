<?php
/*
Template Name: Painel de Cadastros Chamamento
*/

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        the_content();

        // OBTÉM LISTA DE ENTIDADES CADASTRADAS
        $entidades = $wpdb->get_results('SELECT * FROM entidades_chamamento;');

        // BUSCA ARQUIVOS NO DIRETORIO DE UPLOADS
        $dir = get_template_directory() . "/../../uploads/anexos-entidade/";
        $files = array_diff(scandir($dir), array('..', '.'));

        // ATRIBUI URL DOS ARQUIVOS ÀS ENTIDADES
        foreach ($files as $file_key => $nome_arquivo) {
            // IDENTIFICA id DO ARQUIVO x ENTIDADE
            $id = explode("_", $nome_arquivo)[0];
            $tipo = explode("_", $nome_arquivo)[1];

            if ($tipo !== "ato" && $tipo !== "representantes") {
                $tipo = 'arquivo';
            }

            foreach ($entidades as $ent_key => $entidade) {
                $url_tipo = "url_$tipo";
                if ($entidade->id === $id) {
                    $entidade->{$url_tipo} = $nome_arquivo;
                }
            }
        }

        echo "<script>const entidades=" . json_encode($entidades) . ";</script>";

        ?>

        <div id="apppainel">
            <div class="button">
                <a href="#" target="_self" @click="exportaCSV">
                    <span>
                        BAIXAR CSV
                    </span>
                </a>
            </div>
            <table id="tabelaPainel" class="tabela-painel">
                <tr>
                    <th v-for="coluna in colunas">{{coluna}}</th>
                </tr>
                <tr v-for="entidade in entidades">
                    <td v-for="coluna in colunas">
                        <a v-if="coluna.includes('url')" :href="prefixo+entidade[coluna]" target="_blank">{{ entidade[coluna] }}</a>
                        <span v-if="!coluna.includes('url')">{{ entidade[coluna] }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script type="text/javascript">
            var app = new Vue({
                el: '#apppainel',
                data: {
                    entidades: entidades,
                    colunas: [],
                    prefixo: "/wp-content/uploads/anexos-entidade/"
                },
                methods: {
                    trataUrl: function(nome, valor) {
                        if (nome.includes('url')) {
                            return this.prefixo + valor
                        }

                        return valor
                    },
                    exportaCSV: function() {
                        /* Array das linhas da tabela */
                        var rows = [];
                        let firstRow = [];
                        for (coluna in this.colunas) {
                            firstRow.push('"' + this.colunas[coluna] + '"');
                        }
                        rows.push(firstRow);

                        for (linha in this.entidades) {
                            let novaLinha = [];
                            for (coluna in this.entidades[linha]) {
                                if (coluna.includes('url')) {
                                    let url = "https://planodiretorsp.prefeitura.sp.gov.br/wp-content/uploads/anexos-entidade/" + this.entidades[linha][coluna];
                                    novaLinha.push('"' + url + '"');
                                } else {
                                    novaLinha.push('"' + this.entidades[linha][coluna] + '"');
                                }
                            }
                            rows.push(novaLinha);
                        }
                        console.log(rows);
                        csvContent = "data:text/csv;charset=utf-8,sep=;\r\n";
                        /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
                        rows.forEach(function(rowArray) {
                            row = rowArray.join(";");
                            csvContent += row + "\r\n";
                        });

                        /* create a hidden <a> DOM node and set its download attribute */
                        var encodedUri = encodeURI(csvContent);
                        var link = document.createElement("a");
                        link.setAttribute("href", encodedUri);
                        link.setAttribute("download", "Tabela Cadastros.csv");
                        document.body.appendChild(link);
                        link.click();
                    }
                },
                created: function() {
                    for (coluna in this.entidades[0]) {
                        this.colunas.push(coluna);
                    }
                    console.log("Colunas: ", this.colunas);
                }
            });
        </script>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>