var app = new Vue({
  el: "#appcronograma",
  data: {
    anosCronograma: [],
    anosCalendario: [],
    mesesCronograma: [],
    mesesCalendario: [],
    mesesCores: [
      "rosa",
      "laranja",
      "azul",
      "vermelho",
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
    processosCalendario: [],
    processos: [
      {
        tipo: "cronograma",
        nome: "<p>Planejamento da revisão intermediária do PDE</p>",
        meses: [0, 1, 2],
        etapa: 0,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Apresentação do cronograma revisão intermediária do PDE</p>",
        meses: [2],
        etapa: 0,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Reunião e providências iniciais no âmbito do CMPU</p>",
        meses: [3],
        etapa: 2,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Atualização dos dados de monitoramento do PDE (Planurb)</p>",
        meses: [0, 1, 2, 3],
        etapa: 1,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Chamamento Público para divulgação e estímulo da participação de entidades da sociedade civil</p>",
        meses: [3, 4],
        etapa: 2,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Operação da plataforma digital da revisão</p>",
        meses: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        etapa: 2,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Realização dos estudos técnicos para apoio no diagnóstico e avaliação do PDE</p>",
        meses: [],
        etapa: 1,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Recebimento da participação popular pela plataforma digital</p>",
        meses: [4, 5, 6, 7, 8, 9],
        etapa: 2,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Elaboração de relatório de diagnóstico inicial do PDE - Planurb</p>",
        meses: [3, 4, 5, 6],
        etapa: 1,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Reuniões com órgãos técnicos das secretarias municipais e do Comitê Intersecretarial para Revisão do PDE</p>",
        meses: [4, 5, 6, 7, 8, 9, 10, 11],
        etapa: 1,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Reuniões com segmentos da sociedade civil cadastradas no chamamento público</p>",
        meses: [7, 8, 9],
        etapa: 2,
        ano: 2021,
      },
      {
        tipo: "cronograma",
        nome: "<p>Sistematização das contribuições recebidas via plataforma digital e no âmbito das reuniões temáticas com a sociedade civil</p>",
        meses: [9, 10, 11],
        etapa: 1,
        ano: 2021,
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [2],
        dia_semana: "SEG",
        dia: "14",
        nome: "Reunião GT CMPU",
        descricao: "Debate sobre a proposta de Cronograma da Participação Social - Etapa 1"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [2],
        dia_semana: "QUI",
        dia: "21",
        nome: "Reunião Extraordinária CMPU",
        descricao: "Deliberação sobre o Cronograma da Participação Social - Etapa 1"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [3],
        dia_semana: "QUA",
        dia: "6",
        nome: "Reunião Virtual noturna",
        descricao: "Com os representantes dos 32 Conselhos Participativos Municipais"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [3],
        dia_semana: "QUA",
        dia: "13",
        nome: "Divulgação do Diagnóstico"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [3],
        dia_semana: "QUI",
        dia: "14",
        nome: "Reunião Ordinária do CMPU",
        descricao: "Deliberação da adequação do Cronograma da Participação Social - Etapa 1"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [3],
        dia_semana: "QUA",
        dia: "20",
        nome: "Reunião Extraordinária do CMPU",
        descricao: "Apresentação do Diagnóstico"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [3],
        dia_semana: "SEG",
        dia: "25",
        nome: "Abertura da 1ª Consulta Pública Participe+ (41 dias)",
        descricao: "Abertura do Participe+ para contribuições"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [4],
        dia_semana: "SEG",
        dia: "2",
        nome: "Audiência Temática virtual noturna",
        descricao: "Mobilidade Urbana: Objetivos Setoriais, Elementos Constituintes, Planos e Ações prioritárias"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [4],
        dia_semana: "QUI",
        dia: "5",
        nome: "Audiência Temática virtual noturna",
        descricao: "Habitação Social e Política Fundiária: Instrumentos da Função Social da Propriedade, de Regularização Fundiária e do Direito de Construir, Áreas de risco"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [4],
        dia_semana: "SÁB",
        dia: "7",
        nome: "08 Oficinas presenciais",
        descricao: "Pirituba/Jaraguá, Perus, Freguesia do Ó/Brasilândia, Casa Verde/Cachoeirinha, Santana/Tucuruvi, Jaçanã/Tremembé, Vila Maria/Vila Guilherme e Lapa"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "SEG",
        dia: "4",
        nome: "Reabertura da 1ª Consulta Pública Participe+",
        descricao: "Abertura do Participe+ para contribuições"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "TER",
        dia: "5",
        nome: "Reunião do CMPU",
        descricao: "Apresentação do novo calendário para retomada da Participação Social - Etapa 1"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "TER",
        dia: "19",
        nome: "Audiência Temática virtual noturna",
        descricao: "Ordenamento Territorial: Instrumentos de Ordenamento e Reestruturação Urbana e do Direito de Construir"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "QUA",
        dia: "20",
        nome: "Reunião virtual vespertina",
        descricao: "Segmento Movimentos Populares"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "QUI",
        dia: "21",
        nome: "Audiência Temática virtual noturna",
        descricao: "Meio Ambiente e Mudanças Climáticas: Instrumentos de Gestão Ambiental nas Zonas Urbana e Rural"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "SÁB",
        dia: "23",
        nome: "08 Oficinas presenciais",
        descricao: "Parelheiros, Capela do Socorro, M'Boi Mirim, Campo Limpo, Santo Amaro, Cidade Ademar, Butantã e Pinheiros"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "SEG",
        dia: "25",
        nome: "Audiência Temática virtual noturna",
        descricao: "Desenvolvimento Social, Sistema de Equipamentos e Segurança Alimentar: Objetivos Setoriais, Elementos Constituintes, Planos e Ações Prioritárias"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "TER",
        dia: "26",
        nome: "Reunião virtual vespertina",
        descricao: "Segmento Acadêmico Entidades de Classe"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "QUA",
        dia: "27",
        nome: "Audiência Temática virtual noturna",
        descricao: "Desenvolvimento Econômico Sustentável: Objetivos Setoriais, Elementos Constituintes, Planos e Ações Prioritárias nas Zonas Urbana e Rural"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [6],
        dia_semana: "SÁB",
        dia: "30",
        nome: "08 Oficinas presenciais",
        descricao: "Ermelino Matarazzo, São Miguel Paulista, Itaim Paulista, Guaianazes, Cidade Tiradentes, Itaquera, São Mateus e Penha"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [7],
        dia_semana: "TER",
        dia: "2",
        nome: "Audiência Temática virtual noturna",
        descricao: "Patrimônio e Políticas Culturais: Instrumentos de Proteção ao Patrimônio Cultural"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [7],
        dia_semana: "QUA",
        dia: "3",
        nome: "Reunião Virtual vespertina",
        descricao: "Segmento Empresarial"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [7],
        dia_semana: "QUI",
        dia: "4",
        nome: "Audiência Temática virtual noturna",
        descricao: "Gestão Democrática e Sistema de Planejamento: Elementos do Sistema, Instâncias e Instrumentos de Participação Social, Fundurb e Monitoramento do PDE"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [7],
        dia_semana: "SÁB",
        dia: "6",
        nome: "08 Oficinas presenciais",
        descricao: "Sapopemba, Vila Prudente, Aricanduva/Formosa/Carrão, Móoca, Sé, Vila Mariana, Ipiranga e Jabaquara"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [7],
        dia_semana: "SEG",
        dia: "8",
        nome: "Audiência Temática virtual noturna",
        descricao: "Instrumentos de Política Urbana e Gestão Ambiental: Grupos de Instrumentos"
      },
      {
        tipo: "calendario",
        ano: 2022,
        meses: [7],
        dia_semana: "SEX",
        dia: "12",
        nome: "Encerramento da consulta pública no Participe+"
      }
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

    const processosCronograma = this.processos.filter(processo => {
      return processo.tipo == "cronograma";
    });
    const processosCalendario = this.processos.filter(processo => {
      return processo.tipo == "calendario";
    });
    processosCronograma.forEach(processo => {
      this.anosCronograma.push(processo.ano);
      processo.meses.forEach(mes => {
        this.mesesCronograma.push(mes);
      });
    });
    processosCalendario.forEach(processo => {
      this.anosCalendario.push(processo.ano);
      processo.meses.forEach(mes => {
        this.mesesCalendario.push(mes);
      });
    });
    this.anosCronograma = [...new Set(this.anosCronograma)];
    this.anosCalendario = [...new Set(this.anosCalendario)];
    this.mesesCronograma = [...new Set(this.mesesCronograma)];
    this.mesesCalendario = [...new Set(this.mesesCalendario)];
  },
  methods: {
    calculaDuracao: function(ordem) {
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
    populaCalendario: function(ano, mes) {
      let filtraProcessos = this.processos.filter(processo => {
        return processo.tipo == 'calendario' && processo.ano == ano && processo.meses[0] == mes;
      });
      return this.processosCalendario = filtraProcessos;
    },
  },
});
