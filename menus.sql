create table menus
(
   id                   BIGINT not null auto_increment,
   descricao            varchar(70) not null,
   route                varchar(70),
   pai_id               BIGINT,
   ordem_menu           numeric,
   menu_adm             boolean not null default 1,
   menu_adm_im          boolean not null default 1,
   ativo                boolean not null default 1,
   tipo                 smallint not null comment '0 = Base
            1 = Janela
            2 = Relatorio',
   created_at           datetime,
   updated_at           datetime,
   primary key (id)
);


alter table menus add constraint FK_reference_177 foreign key (pai_id)
      references menus (id);