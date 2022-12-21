---
title: Il Modulo LU
description: Introduzione al modulo LU.
extends: _layouts.documentation
section: content
---

# Introduzione al modulo LU {#Introduction}

Modulo che si occupa della gestione degli utenti, login, logout, permessi.

## Distinzione tra User e Profile {#distinzione-tra-user-e-profile}

In ogni modulo principale, cioè quello indicato come main_module nel file xra.php di ogni configurazione progetto,
esiste un modello Profile.php, che si differenzia dal modello User.php.

### il modello User

Il modello User.php, che si trova dentro il modulo LU, gestisce login, logout, permessi.
La relativa tabella si trova dentro il database LU, distinto dal database che ospita tutte le tabelle necessarie per il progetto, tra cui la tabella dei profili.

### il modello Profile

Il modello Profile.php (uno per ogni modulo principale), gestisce ogni tipo di relazione, funzionalità che il profilo di ogni singolo progetto richiede.

Esempio, in un blog il profilo ha i suoi articoli, i suoi commenti ecc, mentre dentro un marketplace, a differenza del profilo di un blog, ha il suo carrello, i suoi acquisti ecc.


### migrazioni

A differenza del modello user, che ha il suo file migration dentro l'apposita cartella nel modulo LU, il modello Profile ha il suo file migration dentro la cartella apposita del modulo principale del progetto.