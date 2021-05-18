<!-- VÍDEOS -->
<div class="col-6">
    <!-- VIDEO EMBED -->
    <iframe width="500" height="280" :src="video.link.replace('watch?v=', 'embed/').replace('youtu.be/', 'youtube.com/embed/')" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
</div>
<div class="col ficha-tecnica">
    <!-- FICHA DO VÍDEO -->
    <div class="row">
        <h2>{{video.titulo}}</h2>
    </div>
    <div class="row">
        <a v-if="logado" :href="'/evento?id=' + video.id">
            <div class="btn btn-primary">
                Editar evento
            </div>
        </a>
    </div>
    <div class="row">
        <span>{{formataData(video.data_evento)}}</span>
    </div>
    <div class="row video-info">
        <div class="col-1 p-0"><span>Evento:</span></div>
        <div class="col">
            <p>{{video.titulo}}</p>
        </div>
    </div>
    <div v-if="video.tema" class="row video-info">
        <div class="col-1 p-0"><span>Tema:</span></div>
        <div class="col">
            <p>{{video.tema}}</p>
        </div>
    </div>
    <div v-if="video.destaque" class="row video-info">
        <div class="col-1 p-0"><span>Fonte:</span></div>
        <div class="col">
            <p>{{video.destaque}}</p>
        </div>
    </div>
    <div class="row video-separador">
        ***
    </div>
    <div class="row">
        <p>Link do vídeo original: <a :href="video.link" target="_blank">{{video.link}}</a></p>
    </div>
    <div v-if="video.descricao" class="row">
        <p>{{video.descricao}}</p>
    </div>
    <div class="row">
        <span class="hashtag">#TransparênciaPDE</span>
    </div>
</div>