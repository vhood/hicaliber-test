# Laravel+Vue developer test

[![status](https://img.shields.io/github/actions/workflow/status/vhood/hicaliber-test/testing.yml)](https://github.com/vhood/hicaliber-test/actions/workflows/testing.yml)

## The task

You can read the task [here](/task.pdf).

## Solutions

### Environment

This projects is developed using [sail](https://laravel.com/docs/master/sail)
so all you need to setup this project is [Docker engine](https://docs.docker.com/engine/install/).

I set up github Ci/CD pipeline for each commit and only use the `main` branch for a simplicity.  
See below for more details on this testing pipeline.

### Backend

I chose [laravel-csv-seeder](https://github.com/jeroenzwart/laravel-csv-seeder) to populate the database.

Btw, database is PostgreSQL. It's default settings already in `.env.example` file, you don't need to setup database environments.

The backend architecture is based on Domain Driven Design.

### Frontend

TODO

## Usage

> I using [make](https://www.gnu.org/software/make/) in commands below, but you can replace it with full commands from the `Makefile`

### Setup

Setup steps:

1. Clone the repository (for example: `git clone git@github.com:vhood/hicaliber-test.git`)
2. Create a `.env` file and copy the contents of the `.env.example` file there
3. Run docker containers `make up`
4. Generate a project key `make key`

### Testing

There are 3 commands for testing the project:

- `make editorconfig` - editorconfig compliance testing, the package is [here](https://github.com/editorconfig-checker/editorconfig-checker.php)
- `make phpstan` - static PHP code analysis, [special laravel setup](https://github.com/larastan/larastan)
- `make unit` - PHP unit tests

You can run all of them with one command `make test`.
