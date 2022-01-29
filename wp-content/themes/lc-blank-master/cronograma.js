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
        nome: "Planejamento da revisão intermediária do PDE",
        meses: [0, 1, 2],
        etapa: 0,
        ano: 2021,
      },
      {
        nome: "Apresentação do cronograma revisão intermediária do PDE",
        meses: [2],
        etapa: 0,
        ano: 2021,
      },
      {
        nome: "Reunião e providências iniciais no âmbito do CMPU",
        meses: [3],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "Atualização dos dados de monitoramento do PDE (Planurb)",
        meses: [0, 1, 2, 3],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "Chamamento Público para divulgação e estímulo da participação de entidades da sociedade civil",
        meses: [3, 4],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "Operação da plataforma digital da revisão",
        meses: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "Realização dos estudos técnicos para apoio no diagnóstico e avaliação do PDE",
        meses: [],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "Recebimento da participação popular pela plataforma digital",
        meses: [4, 5, 6, 7, 8, 9],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "Elaboração de relatório de diagnóstico inicial do PDE - Planurb",
        meses: [3, 4, 5, 6],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "Reuniões com órgãos técnicos das secretarias municipais e do Comitê Intersecretarial para Revisão do PDE",
        meses: [4, 5, 6, 7, 8, 9, 10, 11],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "Reuniões com segmentos da sociedade civil cadastradas no chamamento público",
        meses: [7, 8, 9],
        etapa: 2,
        ano: 2021,
      },
      {
        nome: "Sistematização das contribuições recebidas via plataforma digital e no âmbito das reuniões temáticas com a sociedade civil",
        meses: [9, 10, 11],
        etapa: 1,
        ano: 2021,
      },
      {
        nome: "Realização de oficina live",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Apresentação dos resultados do diagnóstico técnico do PDE e do escopo da revisão",
        meses: [],
        etapa: 1,
        ano: 2022,
      },
      {
        nome: "Elaboração da primeira proposta  <strong>(P1)</strong> de revisão do PDE, baseada no diagnóstico técnico e nas contribuições. ",
        meses: [],
        etapa: 1,
        ano: 2022,
      },
      {
        nome: "Publicação da primeira proposta <strong>(P1)</strong> na plataforma digital e recebimento de contribuições ",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Apresentação da primeira proposta de revisão <strong>(P1)</strong> aos órgãos colegiados",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Realização de eventuais ajustes propostos pelos órgãos colegiados e formação da segunda versão <strong>(P2)</strong> de proposta de revisão",
        meses: [],
        etapa: 1,
        ano: 2022,
      },
      {
        nome: "Publicação da proposta de revisão na plataforma digital da revisão <strong>(P2)</strong> e recebimento das contribuições",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Realização de audiências públicas, regionais e temáticas, para apresentação da proposta de revisão <strong>(P2)</strong>",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Sistematização das contribuições recebidas via plataforma digital, oficinas e no âmbito das audiências públicas",
        meses: [],
        etapa: 1,
        ano: 2022,
      },
      {
        nome: "Elaboração da terceira proposta de revisão <strong>(P3)</strong>, consideradas as contribuições recebidas",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Apresentação da terceira proposta de revisão <strong>(P3)</strong> aos órgãos colegiados e publicação na plataforma digital",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Realização de eventuais ajustes propostos pelos órgãos colegiados à <strong>(P3)</strong> e formação da quarta versão  <strong>(P4)</strong> de proposta de revisão do PDE",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Publicação da quarta proposta <strong>(P4)</strong> de revisão na plataforma digital da revisão",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Realização da devolutiva das audiências públicas para apresentação da quarta versão <strong>(P4)</strong> da proposta de revisão",
        meses: [],
        etapa: 2,
        ano: 2022,
      },
      {
        nome: "Sistematização final das contribuições, finalização da instrução do respectivo processo administrativo de revisão",
        meses: [],
        etapa: 3,
        ano: 2022,
      },
      {
        nome: "<strong>Envio da minuta final a Câmara Municipal</strong>",
        meses: [],
        etapa: 3,
        ano: 2022,
      },
    ],
    etapas: [
      {
        nome: "Planejamento",
        cor: "rosa",
      },
      {
        nome: "Diagnóstico",
        cor: "laranja",
      },
      {
        nome: "Participação Social",
        subtitulo: "Modelo Híbrido",
        cor: "vermelho",
      },
      {
        nome: "Elaboração da Minuta Final de PL",
        cor: "azul",
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
