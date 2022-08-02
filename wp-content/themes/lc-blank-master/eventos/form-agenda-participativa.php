<div>
    <h1>Agenda Participativa</h1>
</div>
<div class="row">
    <div class="item-evento col-5">
        <div class="row" v-for="key in agendaCampos" :id="key">
            <div :class="(key == 'data_inicio' || key == 'horario') ? 'col-auto' : 'col-10'">
                <label :for="'campo-' + key">{{labelsAgenda[key]}}</label>
                <input class="ml-1" v-if="key == 'data_termino'" type="checkbox" v-model='checkboxDataTermino'>
                <textarea class="form-control mb-2" v-if="key == 'titulo'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key"></textarea>
                <input class="form-control mb-2" type="text" v-if="key != 'titulo' && key != 'data_inicio' && key != 'data_termino' && key != 'horario'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
                <input class="form-control mb-2" type="date" v-if="key == 'data_inicio'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
                <input class="form-control mb-2" type="date" v-if="key == 'data_termino'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key" :disabled="!checkboxDataTermino" @change="checaPeriodo">
                <input class="form-control mb-2" type="time" v-if="key == 'horario'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
            </div>
            <div class="col-2" v-if="key == 'titulo' || key == 'data_inicio' || key == 'horario' || key == 'local'">
                <label :for="'campo-tamanho-' + key" v-if="key != 'data_inicio'">{{labelsAgenda['tamanho_' + key]}}</label>
                <label :for="'campo-tamanho-data'" v-if="key == 'data_inicio'">{{labelsAgenda['tamanho_data']}}</label>
                <input class="form-control mb-2" type="number" min="10" max="64" v-model="evento['tamanho_' + key]" :id="'campo-tamanho-' + key" :key="'tamanho-' + key" :name="'tamanho-' + key" v-if="key != 'data_inicio'">
                <input class="form-control mb-2" type="number" min="10" max="64" v-model="evento['tamanho_data']" :id="'campo-tamanho-data'" :key="'tamanho-data'" :name="'tamanho-data'" v-if="key == 'data_inicio'">
            </div>
        </div>
    </div>
    <div class="col-7">
        <?= do_shortcode('[shortcodeAgendaParticipativa]'); ?>
    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <button @click="atualizaAgenda" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">
            Atualizar Agenda
        </button>
    </div>
</div>
