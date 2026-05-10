# Markdown Response pentru Agenți AI

Implementare a pachetului [`spatie/laravel-markdown-response`](https://spatie.be/docs/laravel-markdown-response/v1/basic-usage/serve-markdown-to-ai-agents) — servește versiunea markdown a paginilor publice pentru boții AI și pentru cereri explicite.

## De ce

Boții AI (ClaudeBot, PerplexityBot, etc.) și utilizatorii care cer markdown explicit (`Accept: text/markdown` sau sufix `.md`) primesc o reprezentare curată, fără HTML/CSS/JS, a paginilor. Beneficii:

- **Tokens mai puțini** — răspunsul markdown e ~5–10× mai mic decât HTML-ul echivalent.
- **Parsing mai bun** — agenții AI extrag structura (headings, listă, link-uri) fără ambiguitate.
- **Cache** — conversia se face o singură dată per URL și se ține în cache (default 1h).
- **Control prin `Content-Signal`** — semnalăm explicit ce pot face agenții cu conținutul (ai-train=disallow, ai-input=allow, search=allow).

## Pachet

- Nume: `spatie/laravel-markdown-response`
- Versiune instalată: `^1.2`
- Cerințe: PHP ^8.4, Laravel ^12 || ^13 (potrivit cu stack-ul actual)

## Fișiere modificate / adăugate

| Fișier | Schimbare |
|---|---|
| `composer.json` | adăugat `spatie/laravel-markdown-response` la `require` |
| `bootstrap/app.php` | înregistrat global `ProvideMarkdownResponse::class` în `withMiddleware` |
| `config/markdown-response.php` | publicat din pachet pentru customizare |

### `bootstrap/app.php` — extras relevant

```php
use Spatie\MarkdownResponse\Middleware\ProvideMarkdownResponse;

->withMiddleware(function (Middleware $middleware) {
    $middleware->append(ProvideMarkdownResponse::class);
})
```

## Cum se declanșează conversia (3 mecanisme)

Middleware-ul rulează pe toate request-urile dar acționează doar dacă **detectorul** consideră că request-ul vrea markdown:

1. **Sufix `.md` în URL** — `/despre.md`, `/blog/articol.md`. Sufixul e tăiat înainte de routing, deci ruta `/despre` rămâne cea care răspunde.
2. **Header `Accept: text/markdown`** — clientul cere explicit.
3. **User-Agent AI cunoscut** (case-insensitive, configurabil în `config/markdown-response.php`):
   - `ClaudeBot`
   - `Claude-Web`
   - `Anthropic`
   - `PerplexityBot`
   - `Bytespider`
   - `Google-Extended`

Dacă niciuna nu e satisfăcută, request-ul trece prin middleware fără modificare (HTML normal).

## Garanții și siguranță

Middleware-ul **nu** convertește un răspuns dacă:

- Status ≠ 200 (deci 404, 500, redirect-urile, login-ul Filament rămân HTML).
- `Content-Type` nu conține `text/html` — astfel ruta `/image-info/{publicId}` (răspunde JSON) și asset-urile Filament (CSS/JS) sunt intacte.
- Controllerul/Livewire are atributul `#[DoNotProvideMarkdown]`.
- Ruta are middleware-ul `DoNotProvideMarkdownResponse`.
- `MARKDOWN_RESPONSE_ENABLED=false` în `.env`.

## Headere returnate la răspuns markdown

```
Content-Type: text/markdown; charset=UTF-8
Vary: Accept
X-Robots-Tag: noindex
X-Markdown-Tokens: <număr estimat tokens>
Content-Signal: ai-train=disallow, ai-input=allow, search=allow
```

`X-Robots-Tag: noindex` previne ca Google să indexeze versiunea `.md` (ar fi conținut duplicat).

## Configurație importantă (`config/markdown-response.php`)

Câteva chei pe care le-ai schimba probabil:

| Cheie | Default | Notă |
|---|---|---|
| `enabled` | `true` (env: `MARKDOWN_RESPONSE_ENABLED`) | kill-switch global |
| `driver` | `league` (env: `MARKDOWN_RESPONSE_DRIVER`) | `league` (offline, `thephpleague/html-to-markdown`) sau `cloudflare` (Workers AI) |
| `detection.detect_via_user_agents` | listă boți | adaugă/scoate boți |
| `cache.enabled` | `true` (env: `MARKDOWN_RESPONSE_CACHE_ENABLED`) | dezactivează în dev dacă vrei |
| `cache.ttl` | `3600` (env: `MARKDOWN_RESPONSE_CACHE_TTL`) | secunde |
| `content_signals` | `ai-train=disallow, ai-input=allow, search=allow` | semnalele [contentstandards.org](https://contentstandards.org); set `[]` pentru a dezactiva headerul |

### Variabile `.env` (opțional — default-urile sunt OK)

```env
MARKDOWN_RESPONSE_ENABLED=true
MARKDOWN_RESPONSE_DRIVER=league
MARKDOWN_RESPONSE_CACHE_ENABLED=true
MARKDOWN_RESPONSE_CACHE_TTL=3600
```

## Rute afectate

Toate cele din `routes/web.php` care răspund cu HTML 200:

- `/` (Acasa)
- `/despre`
- `/skilluri`
- `/servicii`
- `/experienta`
- `/portofoliu`
- `/contact`
- `/blog`
- `/blog/{slug}`

Pentru fiecare există implicit o variantă markdown la `<URL>.md` (ex: `/blog/articol-x.md`) și aceeași URL cu header `Accept: text/markdown`.

## Verificare manuală

```bash
# header Accept
curl -H "Accept: text/markdown" https://instacapture.ro/despre

# sufix .md
curl https://instacapture.ro/despre.md

# user-agent bot
curl -H "User-Agent: ClaudeBot/1.0" https://instacapture.ro/despre
```

Răspunsul trebuie să aibă `Content-Type: text/markdown; charset=UTF-8` și body markdown curat.

Smoke test făcut la implementare pe `/despre` cu `Accept: text/markdown`:

```
STATUS: 200
CONTENT-TYPE: text/markdown; charset=UTF-8
X-MARKDOWN-TOKENS: 505
CONTENT-SIGNAL: ai-train=disallow, ai-input=allow, search=allow
```

## Cum excluzi o rută / pagină

### Pe Livewire component (sau controller)

```php
use Spatie\MarkdownResponse\Attributes\DoNotProvideMarkdown;

#[DoNotProvideMarkdown]
public function render() { /* ... */ }
```

### Pe rută

```php
use Spatie\MarkdownResponse\Middleware\DoNotProvideMarkdownResponse;

Route::livewire('/admin-only', SomeComponent::class)
    ->middleware(DoNotProvideMarkdownResponse::class);
```

### Forțezi conversia (chiar dacă nu e detectat)

```php
use Spatie\MarkdownResponse\Attributes\ProvideMarkdown;

#[ProvideMarkdown]
public function render() { /* ... */ }
```

## Cache — ce trebuie știut

- Cheile de cache se generează din URL + query string (cu `utm_*`, `gclid`, `fbclid` ignorate).
- TTL default 1h. La modificări de conținut, șterge cache-ul: `php artisan cache:clear`.
- Folosește store-ul default Laravel (configurabil prin `MARKDOWN_RESPONSE_CACHE_STORE`).

## Eventuri (pentru observabilitate viitoare)

Pachetul emite:

- `Spatie\MarkdownResponse\Events\ConvertingToMarkdownEvent`
- `Spatie\MarkdownResponse\Events\ConvertedToMarkdownEvent`
- `Spatie\MarkdownResponse\Events\MarkdownCacheHitEvent`

Le poți asculta dacă vrei să loghezi sau să măsori câte cereri AI primește site-ul.

## Referințe

- Docs oficiale: https://spatie.be/docs/laravel-markdown-response/v1
- Repo pachet: https://github.com/spatie/laravel-markdown-response
- Driver `league/html-to-markdown`: https://github.com/thephpleague/html-to-markdown
- Content Signals: https://contentstandards.org
