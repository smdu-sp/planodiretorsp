<!-- Evento -->
<div v-for="evento in mes.eventos" :key="evento.id" :class="evento.aberto ? 'row' : 'row fechado'">
    <div class="col-12">
        <div class="row">
            <div class="col-2">
                <span class="linha-evento" :style="'color: '+mes.cor">{{evento.tipo}}</span>
            </div>
            <div class="col">
                <div>
                    <h3>{{evento.titulo}}</h3>
                </div>

                <div v-if="!evento.dataCompleta">
                    <div>
                        <img class="rounded" :src="evento.imagem" :alt="evento.titulo">
                    </div>
                    <div>
                        <p>{{evento.descricao}}</p>
                    </div>
                    <div class="tag-evento tag-data" :style="'background-color: '+mes.cor">
                        <i class="bi bi-calendar3" style="color: white"></i>{{formataData(evento.data_evento)}}
                    </div>
                    <div class="tag-evento tag-hora">
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
    <div>
        <div class="botao-colapso position-absolute" @click="toggleEvento(evento)" :style="'background-color: '+mes.cor">
            <div>{{evento.aberto ? "-" : "+"}}</div>
        </div>
    </div>
    <div class="col-12" v-if="evento.dataCompleta">
        <div class="row">
            <div class="col-2">
                <span>tema:</span>
            </div>
            <div class="col">
                <span>{{evento.tema}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <span>data:</span>
            </div>
            <div class="col">{{evento.dataCompleta}}</div>
        </div>
        <div class="row" v-if="evento.documentos?.length > 0">
            <div class="col-2">
                <span>documentos:</span>
            </div>
            <div class="col">
                <p>
                    <span style="padding-right: 5px;" v-for="(doc, index) in evento.documentos"><a :href="doc.link">{{doc.nome}}</a>{{ index < evento.documentos.length - 1 ? '; ' : '' }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Fim evento -->