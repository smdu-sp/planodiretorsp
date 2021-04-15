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

            if($tipo !== "ato" && $tipo !== "representantes"){
                $tipo = 'arquivo';
            }

            foreach ($entidades as $ent_key => $entidade) {                
                $url_tipo = "url_$tipo";
                if($entidade->id === $id){
                    $entidade->{$url_tipo} = $nome_arquivo;
                }
            }
        }
        
        echo "<script>const entidades=" . json_encode($entidades) . ";</script>";
        
        ?>
        
        <div id="apppainel">
            <table class="tabela-painel">
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
                            return this.prefixo+valor

                        return valor
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