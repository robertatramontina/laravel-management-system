
# Sistema de Gestão — Laravel

Aplicação web desenvolvida no âmbito da formação **Software Developer — CESAE Digital**, utilizando Laravel, PHP e MySQL.

O projeto permite gerir utilizadores, tarefas e prendas de Natal através de uma interface web.

## Tecnologias utilizadas

- PHP
- Laravel
- MySQL
- Blade Templates
- HTML5 e CSS3
- Bootstrap 5
- Git e GitHub

## Funcionalidades

### Gestão de utilizadores

- Registar novos utilizadores.
- Consultar a lista de utilizadores.
- Editar informações dos utilizadores.
- Eliminar utilizadores sem tarefas ou prendas associadas.
- Validar os dados introduzidos nos formulários.

### Gestão de tarefas

- Criar tarefas e associá-las a utilizadores.
- Consultar as tarefas registadas.
- Editar e eliminar tarefas.
- Registar o estado e a data prevista de conclusão.

### Gestão de prendas de Natal

- Registar prendas com nome, custo estimado e destinatário.
- Associar cada prenda a um utilizador existente.
- Registar o custo efetivo da prenda, quando disponível.
- Editar e eliminar prendas.
- Calcular automaticamente a diferença entre o custo estimado e o custo efetivo.
- Apresentar visualmente as diferenças de custos:
  - Verde: valor gasto inferior ao previsto.
  - Vermelho: valor gasto superior ao previsto.
- Validar os dados introduzidos nos formulários.

## Base de dados

A aplicação utiliza MySQL e possui três tabelas principais:

- `users` — dados dos utilizadores.
- `tasks` — tarefas associadas aos utilizadores.
- `gifts` — prendas associadas aos utilizadores.

As tabelas `tasks` e `gifts` possuem uma chave estrangeira (`user_id`) que referencia a tabela `users`.

A estrutura da base de dados é definida através das migrations do Laravel.

## Instalação local

### Requisitos

- PHP
- Composer
- MySQL

### Passos de instalação

**1. Clonar o repositório**

```bash
git clone URL_DO_REPOSITORIO
```

**2. Entrar na pasta do projeto**

```bash
cd NOME_DO_PROJETO
```

**3. Instalar as dependências**

```bash
composer install
```

**4. Criar o ficheiro de configuração**

```bash
cp .env.example .env
```

No Windows, também é possível copiar o ficheiro manualmente.

**5. Configurar a base de dados**

No ficheiro `.env`, configurar os dados de ligação ao MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_da_base_de_dados
DB_USERNAME=root
DB_PASSWORD=
```

**6. Gerar a chave da aplicação**

```bash
php artisan key:generate
```

**7. Executar as migrations**

```bash
php artisan migrate
```

**8. Iniciar o servidor**

```bash
php artisan serve
```

**9. Aceder à aplicação**

Abrir o navegador no endereço:

http://127.0.0.1:8000

## Conceitos aplicados

Durante o desenvolvimento deste projeto foram utilizados os seguintes conceitos:

- Arquitetura MVC (Model-View-Controller).
- Definição de rotas.
- Desenvolvimento de Controllers e Models.
- Operações CRUD (Create, Read, Update, Delete).
- Integração com bases de dados relacionais.
- Relacionamentos através de chaves estrangeiras.
- Validação de formulários.
- Templates Blade.
- Desenvolvimento de interfaces com Bootstrap.
- Controlo de versões com Git.

## Contexto académico

**Formação:** Software Developer  
**Entidade:** CESAE Digital  
**Ano:** 2026  
**Projeto:** Exercícios práticos de Laravel e tarefa de gestão de prendas de Natal.

## Observações

Este projeto foi desenvolvido para fins académicos e de aprendizagem.

A aplicação utiliza uma base de dados MySQL local. Os dados de exemplo não estão incluídos no repositório.

O ficheiro `.env` não é publicado por motivos de segurança.
