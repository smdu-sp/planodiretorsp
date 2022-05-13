<div>
    <h1>Agenda Participativa</h1>
</div>
<div class="row">
    <div class="item-evento col-5">
        <div class="row" v-for="(value, key) in evento" :id="key">
            <div class="col">
                <label :for="'campo-' + key">{{labelsAgenda[key]}}</label>
                <input class="ml-1" v-if="key == 'data_termino'" type="checkbox" v-model='checkboxDataTermino'>
                <input class="form-control mb-2" type="text" v-if="key != 'data_inicio' && key != 'data_termino' && key != 'horario'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
                <input class="form-control mb-2" type="date" v-if="key == 'data_inicio'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
                <input class="form-control mb-2" type="date" v-if="key == 'data_termino'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key" :disabled="!checkboxDataTermino" @change="checaPeriodo">
                <input class="form-control mb-2" type="time" v-if="key == 'horario'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
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
