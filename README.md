# IUCN Red List Explorer

Documentazione in aggiornamento

Dashboard web per la visualizzazione delle specie a rischio estinzione, basata sulle API IUCN Red List v4.

## Stack tecnologico

- PHP 8.2 / Laravel 12
- MySQL
- Blade + Tailwind CSS

## Requisiti

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

## Installazione

1. Clona il repository

```bash
   git clone https://github.com/mattiadelmonaco/iucn-redlist-explorer
   cd iucn-redlist-explorer
```

2. Installa dipendenze PHP

```bash
   composer install
```

3. Installa dipendenze Node

```bash
   npm install
```

4. Configura l'ambiente

```bash
   cp .env.example .env
   php artisan key:generate
```

5. Crea il database

6. Configura database e IUCN API Key in `.env`

```env
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    IUCN_API_KEY=tua_api_key
```

7. Esegui le migrations

```bash
   php artisan migrate
```

8. Avvia il progetto (entrambi terminali aperti)

    Terminale 1:

```bash
   php artisan serve
```

Terminale 2:

```bash
   npm run dev
```

9. Apri il browser su `http://localhost:8000`

## Crediti

Dati forniti da [IUCN Red List API v4](https://api.iucnredlist.org/)
