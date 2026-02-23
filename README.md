# IUCN Red List Explorer

Dashboard web per la visualizzazione delle specie a rischio estinzione, basata sulle API IUCN Red List v4.

## Funzionalità

### Base

- Homepage con liste di sistemi e paesi
- Liste valutazioni paginate per sistemi e paesi
- Dettaglio specie (taxon) con valutazioni storiche
- Sistema preferiti (aggiungi/rimuovi specie)
- Pagina preferiti con data di aggiunta
- Dettaglio valutazione completo con documentazione e azioni di conservazione
- Footer informativo con versioni API e statistiche
- Switch vista lista/card per le valutazioni

### Bonus

- Bandiere nazioni (flagcdn.com)
- Sistema di caching (dashboard 1h, elementi 5min, footer 1 giorno)
- Filtri (anno pubblicazione, possibile estinto, estinto in natura)

## Stack tecnologico

- PHP 8.2 / Laravel 12
- MySQL
- Blade + Tailwind CSS + JavaScript

## Requisiti

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- IUCN API Key (gratutita)

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

6. Configura database, IUCN API Key e CACHE_STORE in `.env`

```env
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

    IUCN_API_KEY=tua_api_key

    CACHE_STORE=file
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

## Testing cache

```bash
# Entra in Tinker
php artisan tinker

# Verifica cache
Cache::has('homepage_systems');      // true se in cache
Cache::get('footer_api_version');    // vedi contenuto

# Cancella cache
php artisan cache:clear
```

## Crediti

- Dati forniti da [IUCN Red List API v4](https://api.iucnredlist.org/)
- Bandiere da [FlagCDN](https://flagcdn.com/)
- Icone [Heroicons](https://heroicons.com/)
