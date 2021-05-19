<!-- Documento -->
<div class="col-md-10">
  <div class="row">
    <h3><strong>{{documento.titulo}}</strong></h3>
  </div>
  <div class="row">
    <div class="col-9" style="padding-left: 0">
      <span>{{formataData(documento.data_evento)}}</span>
    </div>
    <!-- BOTÃO EDITAR DOCUMENTOS -->
    <div class="col-3" v-if="logado">
      <div class="row">
        <a :href="'/evento?id=' + documento.id">
          <div class="btn btn-primary">
            Editar documentos
          </div>
        </a>
      </div>
    </div>
  </div>
  <div v-if="documento.tema" class="row documento-info">
    <div class="col-1 p-0"><span>Tema:</span></div>
    <div class="col ml-2">
      <p>{{documento.tema}}</p>
    </div>
  </div>
  <div v-if="documento.destaque" class="row documento-info">
    <div class="col-1 p-0"><span>Fonte:</span></div>
    <div class="col ml-2">
      <p>{{documento.destaque}}</p>
    </div>
  </div>
  <div v-if="documento.descricao" class="row">
    <p>{{documento.descricao}}</p>
  </div>
  <div class="row documento-info" v-if="documento.documentos?.length > 0">
    <p>
      Consulte aqui | <span style="padding-right: 5px; font-size: 1em; font-weight: 400; line-height: 0" v-for="(doc, index) in documento.documentos"><a :href="doc.link">{{doc.nome}}</a>{{ index < documento.documentos.length - 1 ? '; ' : '' }}</span>
    </p>
  </div>
</div>
<!-- Fim documento -->