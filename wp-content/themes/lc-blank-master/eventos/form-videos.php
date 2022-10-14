<div>
    <span>Selecione a opção desejada:</span>
</div>

<ul class="nav nav-pills nav-justified mb-3 mt-5 row" id="pills-tab" role="tablist">
  <li class="nav-item col-3">
    <a class="nav-link" id="pills-aba-videos" data-toggle="pill" href="#abaVideos" role="tab" aria-controls="abaVideos" aria-selected="false">Vídeos</a>
  </li>
  <li class="nav-item col-3">
    <a class="nav-link" id="pills-aba-categorias" data-toggle="pill" href="#abaCategorias" role="tab" aria-controls="abaCategorias" aria-selected="false">Categorias</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade" id="abaVideos" aria-labelledby="pills-aba-videos">
        <div>
            <h1>Vídeos</h1>
        </div>
        <div class="row">
            <div class="item-evento col-5">
                <div class="row" v-for="prop in videosCampos" :id="prop">
                    <div class="col-12">
                        <label :for="`campo-${prop}`">{{videosLabels[prop]}}</label>
                        <input type="text" class="form-control mb-5" :name="`campo-${prop}`" :id="`campo-${prop}`">
                    </div>
                </div>
            </div>
            <div class="col-7">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <button @click="atualizaAgenda" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">
                    Atualizar
                </button>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="abaCategorias" aria-labelledby="pill-aba-categorias">
        <div>
            <h1>Categorias</h1>
        </div>
        <div class="row mb-2" v-for="cat, index in categorias">
            <div class="col-4">
                <label v-if="index === 0" :for="`cat-${index}`">Categoria</label>
                <input class="form-control" type="text" :id="`cat-${index}`" v-model="cat.categoria">
            </div>
            <div class="ordem col-2">
                <label v-if="index === 0" :for="`ordem-${index}`">Ordem</label>
                <button class="btn btn-primary ordem" @click="mudarOrdemCat(cat, -1)">&lt;</button>
                <span v-model="cat.ordem" v-html="cat.ordem"></span>
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



