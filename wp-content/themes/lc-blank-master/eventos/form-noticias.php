<div>
    <h1>Notícias</h1>
</div>
<div v-for="noticia, key in evento">
    <div class="row">
        <div :id="'noticia-' + key" class="col-6">
            <button type="button" class="btn btn-primary" v-if="!noticia.aberto" @click="abreNoticia(key)">
                Editar
            </button>
            <div v-if="noticia.aberto">
                <div v-for="valor, prop in noticia">
                    <label :for="prop + '-' + key">{{labelsNoticias[prop]}}</label>
                    <input class="ml-1" v-if="prop == 'pracegover'" type="checkbox" v-model="noticia['checkboxPraCegoVer']" @change="limpaCampo(prop, key)">
                    <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'titulo' || prop =='imagem' || prop == 'link'" type="text" v-model="noticia[prop]">
                    <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'pracegover'" type="text" v-model="noticia[prop]" :disabled="!noticia['checkboxPraCegoVer']">
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto"><button @click="excluiNoticia" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Excluir</button></div>
                    <div class="col-auto"><button @click="atualizaNoticia(key)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Atualizar</button></div>
                </div>
            </div>
        </div>
        <?php include get_stylesheet_directory_uri() . '/noticias/single.php' ?>
    </div>
</div>
