<?php
/*
Template Name: Painel de registros da Enquete sobre o PDE
*/

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        the_content();

        // OBTÉM LISTA DE REGISTROS CADASTRADOS
        $registros = $wpdb->get_results('SELECT * FROM registros_enquete;');

        echo "<script>const registros=" . json_encode($registros) . ";</script>";

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
                <tr v-for="registro in registros">
                    <td v-for="coluna in colunas">
                        <a v-if="coluna.includes('url')" :href="prefixo+registro[coluna]" target="_blank">{{ registro[coluna] }}</a>
                        <span v-if="!coluna.includes('url')">{{ registro[coluna] }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <script type='text/javascript' src='../wp-content/themes/lc-blank-master/vue.min.js'></script>
        <script type="text/javascript">
            var app = new Vue({
                el: '#apppainel',
                data: {
                    registros: registros,
                    colunas: [],
                },
                methods: {
                    exportaCSV: function() {
                        /* Array das linhas da tabela */
                        var rows = [];
                        let firstRow = [];
                        for (coluna in this.colunas) {
                            firstRow.push('"' + this.colunas[coluna] + '"');
                        }
                        rows.push(firstRow);

                        for (linha in this.registros) {
                            let novaLinha = [];
                            for (coluna in this.registros[linha]) {
                                novaLinha.push('"' + this.registros[linha][coluna] + '"');
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
                        link.setAttribute("download", "Resultados Enquete PDE.csv");
                        document.body.appendChild(link);
                        link.click();
                    }
                },
                created: function() {
                    for (coluna in this.registros[0]) {
                        this.colunas.push(coluna);
                    }
                }
            });
        </script>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>