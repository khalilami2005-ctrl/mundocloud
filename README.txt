--------------------------------------------------
Explication en français
--------------------------------------------------
MundoCloud est un site web pour gérer et visualiser des photos et vidéos de famille. Il permet de télécharger, visualiser et organiser des contenus multimédias facilement.

Fonctionnalités principales
---------------------------
- **Accueil** : Page d'accueil avec des liens rapides vers les sections Photos, Vidéos et Ajouter du contenu.
- **Galerie Photos** : Affiche toutes les images du dossier `immagini/`, classées par année. Un clic sur une photo ouvre une fenêtre modale pour l'agrandir.
- **Galerie Vidéos** : Affiche toutes les vidéos du dossier `video/` avec des miniatures générées automatiquement par le navigateur. Un clic sur une miniature ouvre une modale pour lire la vidéo.
- **Upload** : Permet de télécharger de nouvelles photos ou vidéos sur le site.

Comment fonctionne la génération des miniatures vidéo
-----------------------------------------------------
Les miniatures des vidéos sont générées directement par le navigateur de l'utilisateur : la vidéo est chargée de façon invisible, une image (généralement à la première seconde) est extraite et affichée comme aperçu. Cette méthode ne nécessite aucun logiciel supplémentaire côté serveur.

Remarque importante sur l'upload des photos
-------------------------------------------
Lorsque vous téléchargez une nouvelle photo via la page "Ajouter du contenu", le fichier est enregistré dans le dossier `uploads/pending/` et n'apparaît pas immédiatement dans la galerie. Pour rendre la photo visible dans la galerie, vous devez déplacer manuellement le fichier du dossier `uploads/pending/` vers le dossier `immagini/`.

Prérequis
---------
- Un serveur web avec support PHP.
- Les dossiers `immagini/`, `video/` et `uploads/` doivent être accessibles en écriture par le serveur pour permettre l'upload et l'affichage des fichiers.

Notes supplémentaires
---------------------
- Le site est conçu pour un usage privé/familial et n'implémente pas d'authentification ou de restrictions d'accès.
- Pour ajouter de nouvelles photos ou vidéos, utilisez la page "Ajouter du contenu".
- Pour personnaliser le style, modifiez le fichier `style.css`.

Pour toute question ou personnalisation, contactez le développeur.
README - MundoCloud
====================

Descrizione generale
--------------------
MundoCloud è un sito web per la gestione e la visualizzazione di foto e video di famiglia. Permette di caricare, visualizzare e organizzare i contenuti multimediali in modo semplice e intuitivo.

Funzionalità principali
-----------------------
- **Home**: Pagina di benvenuto con collegamenti rapidi alle sezioni Foto, Video e Aggiungi Contenuto.
- **Galleria Foto**: Visualizza tutte le immagini presenti nella cartella `immagini/`, suddivise per anno. Cliccando su una foto si apre una modale per la visualizzazione ingrandita.

		**Nota importante sull'upload e la revisione manuale:**
		Quando carichi una nuova foto tramite la pagina "Aggiungi Contenuto", il file viene salvato nella cartella `uploads/pending/` e non appare subito nella galleria. Per rendere visibile la foto nella galleria, devi spostare manualmente il file dalla cartella `uploads/pending/` alla cartella `immagini/`.
		Lo stesso vale per i video: per visualizzarli nella galleria, devono essere inseriti manualmente nella cartella `video/`.
		La revisione e l'organizzazione dei file è completamente manuale: assicurati di mettere ogni file nella cartella corretta per farlo apparire nel sito.
Explication importante sur l'upload et la révision manuelle
---------------------------------------------------------
Lorsque vous téléchargez une nouvelle photo via la page "Ajouter du contenu", le fichier est enregistré dans le dossier `uploads/pending/` et n'apparaît pas immédiatement dans la galerie. Pour qu'il soit visible, vous devez déplacer manuellement le fichier du dossier `uploads/pending/` vers le dossier `immagini/`.
Il en va de même pour les vidéos : pour qu'elles apparaissent dans la galerie, elles doivent être placées manuellement dans le dossier `video/`.
La révision et l'organisation des fichiers sont entièrement manuelles : assurez-vous de placer chaque fichier dans le bon dossier pour qu'il soit visible sur le site.
- **Galleria Video**: Visualizza tutti i video presenti nella cartella `video/` come miniature generate automaticamente dal browser. Cliccando su una miniatura si apre una modale per la riproduzione del video.
- **Upload**: Permette di caricare nuove foto o video sul sito.

Come funziona la generazione delle miniature video
--------------------------------------------------
Le miniature dei video vengono generate direttamente dal browser dell'utente: viene caricato il video in modo invisibile, viene estratto un frame (di solito al secondo 1) e viene mostrato come anteprima. Questo metodo non richiede software aggiuntivo sul server.

Requisiti
---------
- Un server web con supporto PHP.
- Le cartelle `immagini/`, `video/` e `uploads/` devono essere scrivibili dal server per permettere l'upload e la visualizzazione dei file.

Note aggiuntive
---------------
- Il sito è pensato per uso privato/familiare e non implementa autenticazione o restrizioni di accesso.
- Per aggiungere nuove foto o video, utilizzare la pagina "Aggiungi Contenuto".
- Se vuoi personalizzare la grafica, modifica il file `style.css`.