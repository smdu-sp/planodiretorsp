<div>
    <h1>Editar Evento: {{evento.titulo}}</h1>
</div>
<div class="btn btn-danger" @click="confirmaExclusao" title="Excluir evento">Excluir evento</div>

<div v-if="tipoDeEvento">
    <p>{{tipoDeEvento}}</p>
</div>

<div class="item-evento row" v-for="(value, key) in evento" :id="key">
    <div class="col-9">
        <!-- NECESSÁRIO REFAZER ESTE TRECHO ATRIBUINDO :type="lista.tipo" E :class="lista.classe" -->
        <label :for="'campo-' + key" v-if="key != 'data_evento' && key != 'link'">{{ labelsEventos[key] }}</label>
        <label class="mt-5" :for="'campo-' + key" v-if="key == 'data_evento' || key == 'link'">{{ labelsEventos[key] }}</label>
        <input class="form-control" type="text" v-if="key != 'descricao' && key != 'hora_evento' && key != 'data_evento' && key != 'data_termino'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key">
        <textarea class="form-control" v-if="key == 'descricao'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key"></textarea>
        <input class="form-control" type="date" v-if="key == 'data_evento' || key == 'data_termino'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key">
        <input class="form-control" type="time" v-if="key == 'hora_evento'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key">
    </div>
</div>
<div class="evento-documentos">
    <h2>Lista de documentos</h2>
    <div class="row" v-for="(value, key) in listaDeDocumentos" :key="key">
        <div class="col-2">
            <label :for="'nome-documento-' + key">Nome do documento</label>
            <input class="form-control" type="text" :id="'nome-documento-' + key" v-model="value.nome" @change="atualizaDocumentos()">
        </div>
        <div class="col-4">
            <label :for="'url-documento-' + key">URL (link)</label>
            <input class="form-control" type="text" :id="'url-documento-' + key" v-model="value.link" @change="atualizaDocumentos()">
        </div>
        <div class="col-1 botao-remover">
            <div class="btn btn-danger" @click="removeDocumento(key)">
                Remover documento
            </div>
        </div>
    </div>
    <div @click="addDocumento" class="btn btn-primary">
        Adicionar documento
    </div>
</div>
