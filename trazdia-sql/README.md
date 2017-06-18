Modelo de dados inicial, para a primeira fase do projeto Trazdia e de produção do OFICIAL.NEWS,

![ [](https://yuml.me/b81162fa) ](https://yuml.me/b81162fa)

```
[Jurisdição|-id;name;lexname;abbrev]

[Autoridade|-id;name;lexname;abbrev]
[Editora|-cnpj;name;abbrev;info:JSON]
[Fascículo| -id; oficial_id; data; seq; oficial_url; info:JSON]
[Contrato|contrato_url;contrato_valor;contrato_fracao]

[Jurisdição]1---*[Autoridade]
[Jurisdição]<>---1..*[SubJurisdição]
[Jurisdição]^-[SubJurisdição]

[Autoridade]^-[Contratante]

[Periodico|-issn;name;abbrev;isDiario;info:JSON]
[DiarioOficial|-id;name;abbrev;info:JSON]

[Jurisdição]1---*[DiarioOficial]
[Contratante]1---1..*[Contrato]
[Editora]---1..*[Contrato]
[Periodico]++-1>[DiarioOficial]
[Periodico]^-[Específico]
[DiarioOficial]++-1..*>[Fascículo]
[Contrato]<>---1..*[Fascículo]
[Editora]<>---1..*[Periodico]
```

## SQL

Ver arquivos preparados em *steps*:

* [step1_lib](step1_lib.sql): atualiza a *library* de funções básicas (*snippets*) de apoio a triggers, etc.

* [step2_schema](step2_schema.sql): cria o esquema e suas tabelas. Cuidado: faz drop cascade do esquema inteiro.

* ...


