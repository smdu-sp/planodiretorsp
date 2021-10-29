<?php
/*
Template Name: Painel de Segunda Enquete
*/

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        the_content();

        // OBTÉM LISTA DE REGISTROS CADASTRADOS
        $registros = $wpdb->get_results('SELECT * FROM registros_enquete_2;');

        echo "<script>const registros=" . json_encode($registros) . ";</script>";
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
                        <a v-if="coluna.includes('url')" :href="prefixo+registro[coluna]" target="_blank">{{ registro[coluna] }}</a>
                        <span v-if="!coluna.includes('url')">{{ registro[coluna] }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <script src="../wp-content/themes/lc-blank-master/xlsx.full.min.js"></script>
        <script type="text/javascript">
            var app = new Vue({
                el: '#apppainel',
                data: {
                    registros: registros,
                    colunas: [],
                    nome_planilha: 'Resultados',
                    nome_arquivo: 'Resultados Segunda Enquete PDE'
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
