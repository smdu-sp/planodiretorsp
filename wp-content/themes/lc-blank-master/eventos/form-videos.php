<div>
    <span>Selecione a opção desejada:</span>
</div>

<ul class="nav nav-tabs nav-justified mb-3 mt-5 row" id="tabs-tab" role="tablist">
  <li class="nav-item col-3">
    <a class="nav-link" id="tabs-aba-videos" data-toggle="tab" href="#abaVideos" role="tab" aria-controls="abaVideos" aria-selected="false">Vídeos</a>
  </li>
  <li class="nav-item col-3">
    <a class="nav-link" id="tabs-aba-categorias" data-toggle="tab" href="#abaCategorias" role="tab" aria-controls="abaCategorias" aria-selected="false">Categorias</a>
  </li>
</ul>

<div class="tab-content" id="tabs-tabContent">
    <div class="tab-pane fade" id="abaVideos" aria-labelledby="tabs-aba-videos">
        <div class="row" v-for="video in novoVideo">
            <div class="col-12 mt-5 mb-5" v-if="!novoVideo[0].aberto">
                <div class="mb-5"><button @click="abreVideo('novo')" type="button" class="btn-lg btn-success">Novo Vídeo</button></div>
                <div class="mb-5"><button @click="abreVideo('destaque')" type="button" class="btn-lg btn-primary">Destacar Vídeo</button></div>
            </div>
            <div class="col-12" v-if="novoVideo[0].aberto && !videoAtual.aberto && !destaque.aberto">
                <div class="row">
                    <div class="col-6">
                        <div v-for="valor, prop in video">
                            <label v-if="prop != 'aberto'" :for="'novo-video-' + prop">
                                {{videosLabels[prop]}}<b v-if="prop != 'imagem'" class='obrigatorio'>*</b>
                                <b v-if="prop == 'imagem'" style="font-weight: normal">(<a href="/wp-admin/media-new.php" target="_blank">Upload de imagem</a>)</b>
                            </label>
                            <input v-if="prop != 'categoria' && prop != 'aberto'" type="text" class="form-control mb-2" :id="'novo-video-' + prop" v-model="video[prop]">
                            <select v-if="prop == 'categoria'" type="text" class="form-control mb-2" :id="'novo-video-' + prop" v-model="video[prop]">
                                <option disabled value="">Selecione...</option>
                                <option v-for="categoria in categorias">{{ categoria.categoria }}</option>
                            </select>
                        </div>
                        <div class="mt-5 row justify-content-end">
                            <div class="col-auto"><button @click="addVideo()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Adicionar Vídeo</button></div>
                            <div class="col-auto"><button @click="fechaVideo('novo')" type="button" class="btn btn-secondary">Cancelar</button></div>
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
        <div class="col-12" v-if="destaque.aberto && !novoVideo[0].aberto && !videoAtual.aberto">
            <select name="" id="">
                <option value="" disabled>Selecione...</option>
                <option v-for="video in videos">{{ video.titulo }}</option>
            </select>
            <div class="mt-5 row justify-content-end">
                <div class="col-auto"><button @click="addVideo()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Destacar</button></div>
                <div class="col-auto"><button @click="fechaVideo('destaque')" type="button" class="btn btn-secondary">Cancelar</button></div>
            </div>
        </div>
        <div v-show="!novoVideo[0].aberto && !destaque.aberto" class="row editar-video">
            <template v-for="video, index in videos">
                <div v-if="video.aberto" class="col-12 mt-5 mb-4"><span>Editar "{{ video.titulo }}"</span></div>
                <div class="col-4 d-flex align-items-center">
                    <div v-if="ordenacaoHabilitada" class="player-seta" @click="mudarOrdemVideos(video, -1)"><button><img src="/assets/videos/seta 03.png" alt=""></button></div>
                    <div class="d-flex align-items-center container-thumbnail">
                        <div class="d-flex align-items-center thumbnail" @click="abreVideo(index)">
                            <img v-if="thumbYT(video.id_video, index, true)" :src="imagemVideo(video.id_video, index, true)">
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
                                <select v-if="prop == 'categoria'" type="text" class="form-control mb-2" :id="'video-' + prop" v-model="video[prop]">
                                    <option disabled value="">Selecione...</option>
                                    <option v-for="categoria in categorias">{{ categoria.categoria }}</option>
                                </select>
                            </template>
                        </div>
                    </template>
                    <div class="d-flex justify-content-end">
                        <button @click="atualizaVideo(index)" type="button" class="btn btn-success mb-5" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Atualizar</button>
                        <button @click="excluiVideo(index)" type="button" class="btn btn-danger mb-5 ml-4">Excluir</button>
                        <button @click="fechaVideo(index)" type="button" class="btn btn-secondary mb-5 ml-4">Cancelar</button>
                    </div>
                </div>
                <div v-if="video.aberto" class="col-2"></div>
            </template>
        </div>
    </div>
    
    <div class="tab-pane fade" id="abaCategorias" aria-labelledby="tab-aba-categorias">
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
            <div class="col">
                <button @click="addCategoria" class="btn btn-primary">
                    Nova categoria
                </button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <button @click="atualizarCategorias" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">
                    Atualizar
                </button>
            </div>
        </div>
    </div>
</div>



