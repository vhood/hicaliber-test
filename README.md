# Laravel+Vue developer test

[![status](https://img.shields.io/github/actions/workflow/status/vhood/hicaliber-test/testing.yml)](https://github.com/vhood/hicaliber-test/actions/workflows/testing.yml)

## The task

You can read the task [here](/task.pdf).

## Solutions

### Environment

This projects is developed using [sail](https://laravel.com/docs/master/sail)
so all you need to setup this project is [Docker engine](https://docs.docker.com/engine/install/).

I set up github Ci/CD pipeline for each commit and only use the `main` branch for a simplicity.  
See the last section for more details on this testing pipeline.

### Backend

I chose [laravel-csv-seeder](https://github.com/jeroenzwart/laravel-csv-seeder) to populate the database.

Btw, database is PostgreSQL. It's default settings already in `.env.example` file, you don't need to setup database environments.

The backend architecture is based on Domain Driven Design.

#### No ActiveRecord

I'm not an ActiveRecord pattern hater, but I build this project without it.

The `App\Domain\Properties\Property` should be a "Root Entity" in real case, but here it's just a DTO.

#### API

I don't create an external API controller for filtering because I'm using a response from [Inertia](https://inertiajs.com/).

Inertia has it's own specification for responses.

### Frontend

The components are located in the `/resources/js/Pages` folder.

I use [Element Plus](https://element-plus.org) instead of [Element UI](https://element.eleme.io) because the second is deprecated.

I'm using [Inertia](https://inertiajs.com/) to communicate with the backend.

## Usage

> I using [make](https://www.gnu.org/software/make/) in commands below, but you can replace it with full commands from the `Makefile`

### Setup

Setup steps:

1. Clone the repository (for example: `git clone git@github.com:vhood/hicaliber-test.git`)
2. `make env` - duplicate `.env.example` as `.env`, no need to configure
3. Initialize the project: `make init`
4. Visit `http://localhost` (or your address from the `.env`)

### Testing

There are 3 commands for testing the project:

- `make editorconfig` - editorconfig compliance testing, the package is [here](https://github.com/editorconfig-checker/editorconfig-checker.php)
- `make phpstan` - static PHP code analysis, [special laravel setup](https://github.com/larastan/larastan)
- `make unit` - PHP unit tests

You can run all of them with one command `make test`.
