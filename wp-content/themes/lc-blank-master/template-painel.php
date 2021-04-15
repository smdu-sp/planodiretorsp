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
                    prefixo: "/planodiretorsp/wp-content/uploads/anexos-entidade/"
                },
                methods: {
                    trataUrl: function(nome, valor) {
                        if (nome.includes('url'))
                            return this.prefixo + valor

                        return valor
                    },
                    exportaCSV: function() {
                        /* Get the HTML data using Element by Id */
                        var tabela = document.getElementById('tabelaPainel');
                        var numeroColunas = document.getElementById('tabelaPainel').rows[0].cells.length - 1;

                        // console.log(numeroColunas);

                        /* Array das linhas da tabela */
                        var rows = [];

                        // Itera as linhas da tabela
                        for (var i = 0, row; row = tabela.rows[i]; i++) {
                            //rows would be accessed using the "row" variable assigned in the for loop
                            //Get each cell value/column from the row
                            column1 = row.cells[0].innerText;
                            column2 = row.cells[1].innerText;
                            column3 = row.cells[2].innerText;
                            column4 = row.cells[3].innerText;
                            column5 = row.cells[4].innerText;
                            column6 = row.cells[5].innerText;
                            column7 = row.cells[6].innerText;
                            column8 = row.cells[7].innerText;
                            column9 = row.cells[8].innerText;
                            column10 = row.cells[9].innerText;
                            column11 = row.cells[10].innerText;
                            column12 = row.cells[11].innerText;
                            column13 = row.cells[12].innerText;
                            column14 = row.cells[13].innerText;
                            column15 = row.cells[14].innerText;
                            column16 = row.cells[15].innerText;
                            column17 = row.cells[16].innerText;
                            column18 = row.cells[17].innerText;
                            column19 = row.cells[18].innerText;
                            column20 = row.cells[19].innerText;

                            /* add a new records in the array */
                            rows.push(
                                [
                                    column1,
                                    column2,
                                    column3,
                                    column4,
                                    column5,
                                    column6,
                                    column7,
                                    column8,
                                    column9,
                                    column10,
                                    column11,
                                    column12,
                                    column13,
                                    column14,
                                    column15,
                                    column16,
                                    column17,
                                    column18,
                                    column19,
                                    column20
                                ]

                            );

                        }
                        csvContent = "data:text/csv;charset=utf-8,sep=\t\r\n";
                        /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
                        rows.forEach(function(rowArray) {
                            row = rowArray.join("\t");
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