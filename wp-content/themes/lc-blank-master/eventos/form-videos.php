<div id="videos">
    <h1>Vídeos</h1>
    <!-- Botões do Topo -->
    <div class="col-12 mt-5 mb-5" v-if="!novoVideo[0].aberto && !videoAtual.aberto && !destaque.aberto && !editarCat && !novaCategoria[0].aberto && ordenacaoHabilitada && !ordenacaoPendente">
        <div class="row">
            <div class="col-auto">
                <div class="mb-5"><button @click="abrirVideo('novo')" type="button" class="btn-lg btn-success">Novo Vídeo</button></div>
            </div>
            <div class="col-auto">
                <div class="mb-5"><button @click="abrirVideo('destaque')" type="button" class="btn-lg btn-primary">Destacar Vídeo</button></div>
            </div>
            <div class="col-auto">
                <div class="mb-5"><button @click="abrirVideo('cat')" type="button" class="btn-lg btn-primary">Editar Categorias</button></div>
            </div>
        </div>
    </div>

    <div class="row" v-for="video in novoVideo">
        <!-- Novo Vídeo -->
        <div class="col-12" v-if="novoVideo[0].aberto && !videoAtual.aberto && !destaque.aberto && !editarCat && !novaCategoria[0].aberto">
            <div class="row">
                <div class="col-6">
                    <div v-for="valor, prop in video">
                        <label v-if="prop != 'aberto' && prop != 'idVideo' && prop != 'ordem'" :for="'novo-video-' + prop">
                            {{videosLabels[prop]}}<b v-if="prop != 'imagem'" class='obrigatorio'>*</b>
                            <b v-if="prop == 'imagem'" style="font-weight: normal">(<a href="/wp-admin/media-new.php" target="_blank">Upload de imagem</a>)</b>
                        </label>
                        <input v-if="prop != 'categoria' && prop != 'aberto' && prop != 'idVideo' && prop != 'ordem'" type="text" class="form-control mb-2" :id="'novo-video-' + prop" v-model="video[prop]">
                        <select v-if="prop == 'categoria'" type="text" class="form-control mb-2" :id="'novo-video-' + prop" v-model="video[prop]">
                            <option disabled value="">Selecione...</option>
                            <option v-for="categoria in categorias" :value="categoria.id">{{ categoria.categoria }}</option>
                        </select>
                    </div>
                    <div class="mt-5 row justify-content-end">
                        <div class="col-auto"><button @click="addVideo()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Adicionar Vídeo</button></div>
                        <div class="col-auto"><button @click="fecharVideo('novo')" type="button" class="btn btn-secondary">Cancelar</button></div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-8">
                            <span v-if="thumbYT() || video.imagem.trim().length > 0">Preview da Imagem:</span>
                            <div class="d-flex align-items-center container-thumbnail">
                                <div class="d-flex align-items-center thumbnail">
                                    <img v-if="thumbYT(video.link)" :src="imagemVideo(video.link)">
                                    <img v-if="video.imagem.trim().length > 0" :src="video.imagem">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Categoria -->
    <div v-if="!novoVideo[0].aberto && !videoAtual.aberto && !destaque.aberto && editarCat && !novaCategoria[0].aberto" class="col-12">
        <div class="row mb-2" v-for="cat, index in categorias">
            <div class="col-4">
                <label v-if="index === 0" :for="`cat-${index}`">Categoria</label>
                <input class="form-control" type="text" :id="`cat-${index}`" v-model="cat.categoria">
            </div>
            <div class="ordem col-2">
                <label v-if="index === 0" :for="`ordem-${index}`">Ordem</label>
                <button class="btn btn-primary ordem" @click="mudarOrdemCat(cat, -1)">&lt;</button>
                <span v-html="cat.ordem"></span>
                <button class="btn btn-primary ordem" @click="mudarOrdemCat(cat, 1)">&gt;</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                <div class="row d-flex justify-content-end">
                    <div class="col-auto">
                        <button @click="atualizarCategorias" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">
                            Atualizar
                        </button>
                    </div>
                    <div class="col-auto">
                        <button @click="abrirVideo('novaCat')" class="btn btn-primary">
                            Nova categoria
                        </button>
                    </div>
                    <div class="col-auto">
                        <button @click="fecharVideo('cat')" class="btn btn-secondary">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nova Categoria -->
    <div v-if="novaCategoria[0].aberto && !novoVideo[0].aberto && !videoAtual.aberto && !destaque.aberto && !editarCat" class="col-12">
        <div class="row mb-2">
            <div class="col-4">
                <label :for="`cat-nova`">Categoria Nova (Atenção: após adicionada não será possível remover!)</label>
                <input class="form-control" type="text" :id="`cat-nova`" v-model="novaCategoria[0].categoria">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                <div class="row d-flex justify-content-end">
                    <div class="col-auto">
                        <button @click="addCategoria" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">
                            Adicionar Categoria
                        </button>
                    </div>
                    <div class="col-auto">
                        <button @click="fecharVideo('novaCat')" class="btn btn-secondary">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-8" v-if="ordenacaoPendente">
        <span>Alterando a ordem dos vídeos:</span>
        <div class="row">
            <div class="col-auto"><button @click="salvarOrdemVideos()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Salvar</button></div>
            <div class="col-auto"><button @click="fecharVideo('ordenacao')" type="button" class="btn btn-secondary">Cancelar</button></div>
        </div>
    </div>

    <!-- Destaque -->
    <div class="col-8" v-if="destaque.aberto && !novoVideo[0].aberto && !videoAtual.aberto && !editarCat && !novaCategoria[0].aberto">
        <select name="" id="" v-model='destaque.id'>
            <option value="" disabled>Selecione...</option>
            <option v-for="video in videos" :value='video.id'>{{ video.titulo }}</option>
        </select>
        <div class="mt-5 row justify-content-end">
            <div class="col-auto"><button @click="destacarVideo()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Destacar</button></div>
            <div class="col-auto"><button @click="fecharVideo('destaque')" type="button" class="btn btn-secondary">Cancelar</button></div>
        </div>
    </div>

    <!-- Vídeos -->
    <div v-show="!novoVideo[0].aberto && !destaque.aberto && !editarCat && !novaCategoria[0].aberto" class="row editar-video">
        <template v-for="video, index in videos">
            <div v-if="video.aberto" class="col-12 mt-5 mb-4"><span>Editar "{{ video.titulo }}"</span></div>
            <div class="col-4 d-flex align-items-center">
                <div v-if="ordenacaoHabilitada" class="player-seta" @click="mudarOrdemVideos(video, -1)"><button><img src="/assets/videos/seta 03.png" alt=""></button></div>
                <div class="d-flex align-items-center container-thumbnail">
                    <div class="d-flex align-items-center thumbnail" @click="abrirVideo(index)">
                        <img v-if="thumbYT(video.link, index)" :src="imagemVideo(video.link, index)">
                        <img v-if="video.imagem.trim().length > 0" :src="video.imagem">
                    </div>
                </div>
                <div v-if="ordenacaoHabilitada" @click="mudarOrdemVideos(video, 1)" class="player-seta"><button><img src="/assets/videos/seta 04.png" alt=""></button></div>
            </div>
            <div v-if="video.aberto" :id="'video-' + index" class="col-6">
                <template v-for="prop in videosCampos">
                    <div v-for="valor, key in video">
                        <template v-if="prop == key">
                            <label :for="'video-' + prop">
                                {{videosLabels[prop]}}<b v-if="prop != 'imagem'" class='obrigatorio'>*</b>
                                <b v-if="prop == 'imagem'" style="font-weight: normal">(<a href="/wp-admin/media-new.php" target="_blank">Upload de imagem</a>)</b>
                            </label>
                            <input v-if="prop != 'categoria'" type="text" class="form-control mb-2" :id="'video-' + prop" v-model="video[prop]">
                            <select v-if="prop == 'categoria'" type="text" class="form-control mb-2" :id="'video-' + prop" v-model="video['id_categoria']">
                                <option disabled value="">Selecione...</option>
                                <option v-for="categoria in categorias" :value="categoria.id">{{ categoria.categoria }}</option>
                            </select>
                        </template>
                    </div>
                </template>
                <div class="d-flex justify-content-end">
                    <button @click="atualizarVideo(index)" type="button" class="btn btn-success mb-5" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Atualizar</button>
                    <button @click="excluirVideo(index)" type="button" class="btn btn-danger mb-5 ml-4">Excluir</button>
                    <button @click="fecharVideo(index)" type="button" class="btn btn-secondary mb-5 ml-4">Cancelar</button>
                </div>
            </div>
            <div v-if="video.aberto" class="col-2"></div>
        </template>
    </div>
</div>
</div>