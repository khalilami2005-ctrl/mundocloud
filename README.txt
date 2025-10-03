README - MundoCloud
Descrizione generale

MundoCloud è un sito web per la gestione e la visualizzazione di foto e video di famiglia.
Permette di caricare, visualizzare e organizzare i contenuti multimediali in modo semplice e intuitivo.

Funzionalità principali

Home: Pagina di benvenuto con collegamenti rapidi alle sezioni Foto, Video e Aggiungi Contenuto.

Galleria Foto: Visualizza tutte le immagini presenti nella cartella immagini/, suddivise per anno. Cliccando su una foto si apre una modale per la visualizzazione ingrandita.

Galleria Video: Visualizza tutti i video presenti nella cartella video/ come miniature generate automaticamente dal browser. Cliccando su una miniatura si apre una modale per la riproduzione del video.

Upload: Permette di caricare nuove foto o video sul sito.

Come funziona la generazione delle miniature video

Le miniature dei video vengono generate direttamente dal browser dell’utente: il video viene caricato in modo invisibile, viene estratto un fotogramma (di solito al primo secondo) e mostrato come anteprima.
Questo metodo non richiede software aggiuntivo sul server.

Nota importante sull’upload e la revisione manuale

Quando carichi una nuova foto tramite la pagina "Aggiungi Contenuto", il file viene salvato nella cartella uploads/pending/ e non appare subito nella galleria.
Per renderla visibile devi spostare manualmente il file dalla cartella uploads/pending/ alla cartella immagini/.

Lo stesso vale per i video: per farli apparire nella galleria devono essere spostati manualmente nella cartella video/.
La revisione e l’organizzazione dei file è completamente manuale: assicurati di mettere ogni file nella cartella corretta per farlo apparire nel sito.

Cartelle richieste per la gestione manuale

Il sito utilizza cartelle specifiche per la gestione manuale dei file caricati. Assicurati che le seguenti cartelle esistano e siano scrivibili dal server web:

immagini/ — contiene le immagini finali che vengono visualizzate nella galleria.

uploads/pending/ — cartella temporanea dove vengono salvati i file appena caricati in attesa di revisione.

uploads/rifiutate/ — cartella dove spostare le immagini o i video rifiutati o non approvati.

video/ — contiene i file video che devono essere mostrati nella galleria.

Queste cartelle devono essere gestite manualmente: sposta i file da uploads/pending/ a immagini/ o video/ per renderli visibili, oppure in uploads/rifiutate/ per escluderli.

Requisiti

Un server web con supporto PHP.

Le cartelle immagini/, video/ e uploads/ devono essere scrivibili dal server per permettere l’upload e la visualizzazione dei file.

Note aggiuntive

Il sito è pensato per uso privato/familiare e non implementa autenticazione o restrizioni di accesso.

Per aggiungere nuove foto o video, utilizza la pagina "Aggiungi Contenuto".

Se vuoi personalizzare la grafica, modifica il file style.css.
