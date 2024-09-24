<x-mail::message>
# Nou mesaj de contact

Ați primit un nou mesaj prin formularul de contact al site-ului.

**Detalii expeditor:**
Nume: {{ $name }}
Email: {{ $email }}

**Mesaj:**
{{ $messageContent }}

<x-mail::button :url="config('app.url')">
Vizitați site-ul
</x-mail::button>

Mulțumim,<br>
{{ config('app.name') }}
</x-mail::message>