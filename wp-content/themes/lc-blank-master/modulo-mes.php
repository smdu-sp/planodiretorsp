<!-- Evento -->
<div v-for="evento in mes.eventos" :key="evento.id" :class="evento.aberto ? 'row' : 'row fechado'">
    <div class="col-12">
        <div class="row" @click="abreEvento(evento)">
            <div class="col-auto" v-if="!evento.aberto">
                <span class="linha-evento" :style="'color: '+mes.cor">{{evento.tipo}}</span>
            </div>
            <div class="col" v-if="!evento.aberto">
                <div>
                    <h3>{{evento.titulo}}</h3>
                </div>
            </div>
            <div class="col" v-if="evento.aberto">
                <a v-if="logado" :href="'/evento?id=' + evento.id">
                    <div class="btn btn-primary mb-2">
                        Editar evento
                    </div>
                </a>
                <div class="row"  v-if="!evento.data_completa">
                    <div class="col-auto" v-if="evento.imagem" class="container-img">
                        <img :src="evento.imagem" :alt="evento.titulo">
                    </div>
                    <div class="col">
                        <div>
                            <span class="tipo-evento">{{evento.tipo}}</span>
                            <h3>{{evento.titulo}}</h3>
                        </div>
                        <div v-if="evento.descricao">
                            <p>{{evento.descricao}}</p>
                        </div>
                        <div class="tag-evento tag-data" :style="'background-color: '+mes.cor" v-if="!evento.data_termino">
                            <i class="bi bi-calendar3" style="color: white"></i>{{formataData(evento.data_evento)}}
                        </div>
                        <div class="tag-evento tag-data row" :style="'background-color: '+mes.cor" v-if="evento.data_termino">
                            <i class="bi bi-calendar3 col-auto px-0" style="color: white"></i><span class="col" v-html="formataData(evento.data_evento, evento.data_termino)"></span>
                        </div>
                        <div class="tag-evento tag-hora" v-if="evento.hora_evento && evento.hora_evento != '00:00:00'">
                            <i class="bi bi-clock" :style="'color: '+mes.cor"></i>{{formataHora(evento.hora_evento)}}
                        </div>
                        <div class="tag-evento tag-local" v-if="evento.local">
                            <i class="bi bi-geo-alt" :style="'color: '+mes.cor"></i>{{evento.local}}
                        </div>
                        <a :href="evento.link" target="_blank" v-if="evento.link">
                            <div class="tag-evento tag-link" :style="'color: '+mes.cor">
                                <i class="bi bi-hand-index" :style="'color: '+mes.cor"></i>
                                {{evento.descricao_link}}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button :aria-label="evento.aberto ? 'Fechar' : 'Abrir'" class="botao-colapso position-absolute" @click="toggleEvento(evento)" :style="'background-color: '+mes.cor">
            <div>{{evento.aberto ? "-" : "+"}}</div>
        </button>
    </div>
    <div class="col-12" v-if="evento.data_completa && evento.aberto">
        <div class="row">
            <div class="col-auto" v-if="evento.imagem || evento.descricao">
                <div class="container-img" v-if="evento.imagem">
                    <img :src="evento.imagem" :alt="evento.titulo">
                </div>
                <div v-if="evento.descricao">
                    <p>{{evento.descricao}}</p>
                </div>
            </div>
            <div class="col">
                <div>
                    <span class="tipo-evento">{{evento.tipo}}</span>
                    <h3>{{evento.titulo}}</h3>
                </div>
                <div class="row anteriores-linha">
                    <div class="col-1">
                        <span class="anteriores-descricao">tema: </span>
                    </div>
                    <div class="col">
                        <span class="anteriores-item">{{evento.tema}}</span>
                    </div>
                </div>
                <div class="row anteriores-linha">
                    <div class="col-1">
                        <span class="anteriores-descricao">data: </span>
                    </div>
                    <div class="col anteriores-item">{{evento.data_completa}}</div>
                </div>
                <div class="row anteriores-linha" v-if="evento.link">
                    <div class="col-1">
                        <span class="anteriores-descricao">link: </span>
                    </div>
                    <a :href="evento.link">
                        <div class="col anteriores-item" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{evento.link}}</div>
                    </a>
                </div>
                <div class="row anteriores-linha" v-if="evento.documentos?.length > 0">
                    <div class="col-3">
                        <span class="anteriores-descricao">documentos:</span>
                    </div>
                    <div class="col">
                        <p>
                            <span style="padding-right: 5px; font-size: 1.2em; line-height: 0" v-for="(doc, index) in evento.documentos"><a :href="doc.link">{{doc.nome}}</a>{{ index < evento.documentos.length - 1 ? '; ' : '' }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim evento -->
