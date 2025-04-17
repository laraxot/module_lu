---
title: Introduction
description: Introduzione al modulo LU.
extends: _layouts.documentation
section: content
---

# Introduction {#Introduction}

Modulo che si occupa della gestione degli utenti, login, logout, permessi.

## Distinzione tra User e Profile {#distinzione-tra-user-e-profile}

In ogni modulo principale, cioè quello indicato come main_module nel file xra.php di ogni configurazione progetto,
esiste un modello Profile.php, che si differenzia dal modello User.php.

Il modello User.php, che si trova dentro il modulo LU, gestisce login, logout, permessi.
La relativa tabella si trova dentro il database LU, distinto dal database che ospita tutte le tabelle necessarie per il progetto, tra cui la tabella dei profili.

Il modello Profile.php (uno per ogni modulo principale), gestisce ogni tipo di relazione, funzionalità che il profilo di ogni singolo progetto richiede.

Esempio, in un blog il profilo ha i suoi articoli, i suoi commenti ecc, mentre dentro un marketplace, a differenza del profilo di un blog, ha il suo carrello, i suoi acquisti ecc.