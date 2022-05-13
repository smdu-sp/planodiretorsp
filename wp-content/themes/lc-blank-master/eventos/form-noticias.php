<div>
    <h1>Notícias</h1>
</div>

<div class="row" v-for="noticia in novaNoticia">
    <div class="col-12 mb-5" v-if="!novaNoticia.aberto">
        <div class="mb-5"><button @click="abreNoticia()" type="button" class="btn btn-success">Nova Notícia</button></div>
    </div>
    <div class="col-12" v-if="novaNoticia.aberto">
        <div class="row">
            <div class="col-6">
                <div v-for="valor, prop in noticia">
                    <label v-if="prop != 'checkboxPraCegoVer' && prop != 'aberto'" :for="'nova-noticia-' + prop">
                        {{labelsNoticias[prop]}}<b v-if="prop != 'pracegover'" class='obrigatorio'>*</b>
                        <b v-if="prop == 'imagem'" style="font-weight: normal">(<a href="/wp-admin/media-new.php" target="_blank">Upload de imagem</a>)</b>
                    </label>
                    <input class="ml-1" v-if="prop == 'pracegover'" type="checkbox" v-model="noticia.checkboxPraCegoVer" @change="limpaCampo(prop)">
                    <input v-if="prop != 'checkboxPraCegoVer' && prop != 'aberto' && prop != 'pracegover'" type="text" class="form-control mb-2" :id="'nova-noticia-' + prop" v-model="noticia[prop]">
                    <input v-if="prop == 'pracegover'" type="text" class="form-control mb-2" :id="'nova-noticia-' + prop" v-model="noticia[prop]" :disabled="!noticia['checkboxPraCegoVer']">
                </div>
                <div class="mt-5 row justify-content-end">
                    <div class="col-auto"><button @click="addNoticia()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Adicionar Notícia</button></div>
                </div>
            </div>
            <?php include get_stylesheet_directory() . '/noticias/single.php' ?>
        </div>
    </div>
</div>

<div v-for="noticia, key in evento">
    <div class="row flex-row-reverse">
        <div :id="'noticia-' + key" class="col-6">
            <button type="button" class="btn btn-primary" v-if="!noticia.aberto" @click="abreNoticia(key)">
                Editar
            </button>
            <div v-if="noticia.aberto">
                <div v-for="valor, prop in noticia">
                    <label :for="prop + '-' + key">{{labelsNoticias[prop]}}</label>
                    <input class="ml-1" v-if="prop == 'pracegover'" type="checkbox" v-model="noticia.checkboxPraCegoVer" @change="limpaCampo(prop, key)">
                    <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'titulo' || prop =='imagem' || prop == 'link'" type="text" v-model="noticia[prop]">
                    <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'pracegover'" type="text" v-model="noticia[prop]" :disabled="!noticia['checkboxPraCegoVer']">
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto"><button @click="excluiNoticia(key)" type="button" class="btn btn-danger">Excluir</button></div>
                    <div class="col-auto"><button @click="atualizaNoticia(key)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Atualizar</button></div>
                </div>
            </div>
        </div>
        <?php include get_stylesheet_directory() . '/noticias/single.php' ?>
    </div>
</div>
