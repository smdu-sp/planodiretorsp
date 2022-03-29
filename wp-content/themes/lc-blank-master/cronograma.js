var app = new Vue({
  el: "#appcronograma",
  data: {
    anos: [
      2021,
      2022,
    ],
    meses: [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro",
    ],
    mesesAbrev: [
      "JAN",
      "FEV",
      "MAR",
      "ABR",
      "MAI",
      "JUN",
      "JUL",
      "AGO",
      "SET",
      "OUT",
      "NOV",
      "DEZ",
    ],
    processos: [
      {
        nome: "<p>Planejamento da revisão intermediária do PDE</p>",
        meses: [0, 1, 2],
        etapa: 0,
        ano: 2021,
      },
      {
        nome: "<p>Apresentação do cronograma revisão intermediária do PDE</p>",
        meses: [2],
        etapa: 0,
        ano: 2021,
      },
      {
        nome: "<p>Reunião e providências iniciais no âmbito do CMPU</p>",
        meses: [3],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "<p>Atualização dos dados de monitoramento do PDE (Planurb)</p>",
        meses: [0, 1, 2, 3],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "<p>Chamamento Público para divulgação e estímulo da participação de entidades da sociedade civil</p>",
        meses: [3, 4],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "<p>Operação da plataforma digital da revisão</p>",
        meses: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "<p>Realização dos estudos técnicos para apoio no diagnóstico e avaliação do PDE</p>",
        meses: [],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "<p>Recebimento da participação popular pela plataforma digital</p>",
        meses: [4, 5, 6, 7, 8, 9],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "<p>Elaboração de relatório de diagnóstico inicial do PDE - Planurb</p>",
        meses: [3, 4, 5, 6],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "<p>Reuniões com órgãos técnicos das secretarias municipais e do Comitê Intersecretarial para Revisão do PDE</p>",
        meses: [4, 5, 6, 7, 8, 9, 10, 11],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "<p>Reuniões com segmentos da sociedade civil cadastradas no chamamento público</p>",
        meses: [7, 8, 9],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "<p>Sistematização das contribuições recebidas via plataforma digital e no âmbito das reuniões temáticas com a sociedade civil</p>",
        meses: [9, 10, 11],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "<p>Reunião GT CMPU</p>Debate sobre a proposta de Cronorama da Participação Social - Etapa 1",
        meses: [2],
        etapa: 8,
        ano: 2022,
      },
      {
        nome: "<p>Extraordinária CMPU</p>Deliberação sobre o Cronograma da Etapa 1",
        meses: [2],
        etapa: 8,
        ano: 2022,
      },
      {
        nome: "<p>Reunião Virtual noturna <span>com os Representantes dos</span> 32 Conselhos Participativos Municipais</p>",
        meses: [3],
        etapa: 3,
        ano: 2022,
      },
      {
        nome: "<p>Abertura da 1ª Consulta Pública Participe+ <span>(41 dias)</span></p> Apresentação do Diagnóstico, Identificação dos Limites da Revisão e Temas Prioritários / Contribuições",
        meses: [3],
        etapa: 7,
        ano: 2022,
      },
      {
        nome: "<p>Reunião Ordinária do CMPU</p> Apresentação do Diagnóstico",
        meses: [3],
        etapa: 8,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Ordenamento Territorial: Instrumentos de Ordenamento e Reestruturação Urbana e do Direito de Construir",
        meses: [3],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Mobilidade Urbana: Objetivos Setoriais, Elementos Constituintes, Planos e Ações prioritárias",
        meses: [3],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Habitação Social e Política Fundiária:  Instrumentos da Função Social da Propriedade, de Regularização Fundiária e do Direito de Construir, áreas de risco",
        meses: [3],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>02 (duas) Oficinas presenciais + YouTube</p><ul><li>Perus, Pirituba/ Jaraguá, Freguesia/ Brasilândia, Casa Verde/ Cachoeirinha;</li><li>Santana/ Tucuruvi, Jaçanã/ Tremembé, Vila Maria/ Vila Guilherme;</ul></li>",
        meses: [3],
        etapa: 6,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Desenvolvimento Econômico Sustentável: Objetivos Setoriais, Elementos Constituintes, Planos e Ações Prioritárias nas Zonas Urbana e Rural",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Reunião Virtual vespertina</p> Segmento Empresarial",
        meses: [4],
        etapa: 5,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Meio Ambiente e Mudanças Climáticas: Instrumentos de Gestão Ambiental nas Zonas Urbana e Rural",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Reunião Virtual vespertina</p> Segmento Movimentos Polulares",
        meses: [4],
        etapa: 5,
        ano: 2022,
      },
      {
        nome: "<p>Reunião CIMPDE</p>",
        meses: [4],
        etapa: 8,
        ano: 2022,
      },
      {
        nome: "<p>02 (duas) Oficinas presenciais + YouTube</p><ul><li>Penha, Mooca, Aricanduva/ Formosa/ Carrão, Vila Prudente;K/li><li>Sapopemba, São Mateus, Itaquera, Cidade Tiradentes;</li></ul>",
        meses: [4],
        etapa: 6,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Desenvolvimento Econômico Sustentável: Objetivos Setoriais, Elementos Constituintes, Planos e Ações Prioritárias nas Zonas Urbana e Rural",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Reunião Virtual vespertina</p> Segmento Acadêmico / Entidades de Classes",
        meses: [4],
        etapa: 5,
        ano: 2022,
      },
      {
        nome: "<p>Audiência Temática virtual noturna</p> Desenvolvimento Social, Sistema de Equipamentos e Segurança Alimentar: Objetivos Setoriais, Elementos Constituintes, Planos e Ações Prioritárias",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>02 (duas) Oficinas presenciais + YouTube</p><ul><li>Lapa, Sé, Pinheiros, Butantã;</li><li>Vila Mariana, Ipiranga, Jabaquara, Santo Amaro;</li></ul>",
        meses: [4],
        etapa: 6,
        ano: 2022,
      },
      {
        nome: "<p>Audência Temática virtual noturna</p> Patrimônio e Políticas Culturais: Instrumentos de Proteção ao Patrimônio Cultural",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Audência Temática virtual noturna</p> Gestão Democrática e Sistema de Planejamento: Elementos do Sistema, Instâncias e Instrumentos de Participação Social, Fundurb e Monitoramento do PDE",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Audência Temática virtual noturna</p> Instrumentos de Política Urbana e Gestão Ambiental: Grupos de Instrumentos",
        meses: [4],
        etapa: 4,
        ano: 2022,
      },
      {
        nome: "<p>Reunião CIMPDE</p>",
        meses: [4],
        etapa: 8,
        ano: 2022,
      },
      {
        nome: "<p>02 (duas) Oficinas presenciais + YouTube</p><ul><li>Ermelino Matarazzo, São Miguel, Itaim Paulista, Guaianases;</li><li>Campo Limpo, M'Boi Mirim, Cidade Ademar, Capela do Socorro, Parelheiros;</li></ul>",
        meses: [4],
        etapa: 6,
        ano: 2022,
      },
      {
        nome: "<p>Encerramento da 1ª Consulta Pública Participe+</p>",
        meses: [4],
        etapa: 7,
        ano: 2022,
      },
    ],
    etapas: [
      {
        nome: "Planejamento",
        cor: "rosa",
        ano: 2021,
      },
      {
        nome: "Diagnóstico",
        cor: "laranja",
        ano: 2021,
      },
      {
        nome: "Participação Social",
        subtitulo: "Modelo Híbrido",
        cor: "salmao",
        ano: 2021,
      },
      {
        nome: "Agendas Gerais e Territoriais",
        cor: "azul-claro",
        ano: 2022,
      },
      {
        nome: "Agendas Temáticas",
        cor: "azul",
        ano: 2022,
      },
      {
        nome: "Agendas por Segmentos",
        cor: "vermelho",
        ano: 2022,
      },
      {
        nome: "Oficinas Territoriais",
        cor: "salmao",
        ano: 2022,
      },
      {
        nome: "Consulta Eletrônica",
        cor: "laranja",
        ano: 2022,
      },
      {
        nome: "Reuniões Colegiados",
        cor: "rosa",
        ano: 2022,
      },
    ],
  },
  created() {
    // Esconde conteúdo quando JavaScript não estiver habilitado
    var conteudo = document.getElementById("appcronograma");
    conteudo.style.display = "block";

    this.processos.forEach((obj, index) => {
      let mesesEvento = obj.meses;
      let duracao = mesesEvento.length;
      obj.numeroCelulas = 13 - duracao;
      obj.ordem = index + 1;
    });
  },
  methods: {
    calculaDuracao: function (ordem) {
      let nomeMeses = this.meses;
      let mesesEvento = this.processos[ordem - 1].meses;
      let duracao = mesesEvento.length;
      uniao = " à ";
      if (duracao == 2) uniao = " e ";
      return mesesEvento.length === 0
        ? "Não definido"
        : nomeMeses[mesesEvento[0]] +
            (duracao > 1 ? uniao + nomeMeses[mesesEvento[duracao - 1]] : "");
    },
  }
});
