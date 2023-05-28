Create DATABASE hmw1;
USE hmw1;

CREATE TABLE utente (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null
) Engine = InnoDB;

CREATE TABLE commento_onepiece(
id_commento integer auto_increment,
utente varchar(16),
commento varchar(500),
data date,
primary key (id_commento,utente,commento,data)
)Engine = InnoDB;

CREATE TABLE commento_naruto(
id_commento integer auto_increment,
utente varchar(50),
commento varchar(500),
data date,
primary key (id_commento,utente,commento,data)
)Engine = InnoDB;

CREATE TABLE commento_dragonball(
id_commento integer auto_increment,
utente varchar(50),
commento varchar(500),
data date,
primary key (id_commento,utente,commento,data)
)Engine = InnoDB;

CREATE TABLE commento_one_pounch_man(
id_commento integer auto_increment,
utente varchar(50),
commento varchar(500),
data date,
primary key (id_commento,utente,commento,data)
)Engine = InnoDB;

CREATE TABLE preferiti(
id_preferiti integer auto_increment primary key,
utente varchar(50),
commento varchar(500),
data date,
id_commento integer,
chat varchar(50)
)Engine = InnoDB;

insert into commento_onepiece(utente,commento,data) value ('Teach91','Quando ho letto questo capitolo per la prima volta, ho provato un senso di soddisfazione. 
																Il flashback tra l’ex ammiraglio Aokiji e Barbanera mi è piaciuto da impazzire, ho apprezzato 
																praticamente tutte le battute ed ho amato vedere questi personaggi bere e scherzare insieme.'
                                                                ,CURDATE());

insert into commento_onepiece(utente,commento,data) value ('Tosky','Se ripenso al primo capitolo, mi fa davvero strano. Quel personaggio piagnucolone e senza 
																spina dorsale è diventato uno degli uomini più coraggiosi e importanti del mondo di One Piece.
                                                                La crescita di Coby viene spesso sottovalutata, forse è quello che ha avuto un’evoluzione più 
                                                                repentina e importante. Sì, Luffy è divenuto imperatore, il nuovo Joy Boy.',CURDATE());
                                                                
insert into commento_onepiece(utente,commento,data) value ('Kiddo01','Il Luffy dell’inizio era già forte, già consapevole, già sognatore. In grado di battere senza
																ulteriore allenamento villain come Kuro, Buggy, Don Krieg e Arlong, tutti con una taglia sulla 
                                                                loro testa.',CURDATE());
                                                                
insert into commento_onepiece(utente,commento,data) value ('Sanj_GambaNera','C’è un mistero. La scorsa settimana non era stata annunciata la fine delle mini-avventure, quindi 
																			 questa cover a richiesta è arrivata un po’ a sorpresa. Dunque, secondo voi, nel 
                                                                             capitolo 1080 rivedremo Ceaser e Judge oppure possiamo ritenere conclusa la 
                                                                             storia del Germa66 e dei Neo Mads?',CURDATE());

insert into commento_naruto(utente,commento,data) value ('BIANCOGATTO','
La narrazione è davvero lenta per i primi cento episodi, snervante, però, con l\'aumentare degli episodi, la narrazione si fa sempre più veloce e movimentata. Il problema di questo anime che ha vari episodi che non mantengono la stessa qualità tecnica, ma è parecchio altalenante. Sia tecnicamente sia come interesse di trama, la serie si alterna tra buono e mediocre. Senza considerare poi che ci sono tantissimi episodi filler che non c\'entrano nulla con la trama principale e non fanno altro che diluire l\'anime, facendolo diventare troppo lungo e difficile da seguire, e a volte pure noioso, con situazioni che si ripetono varie volte sempre allo stesso modo e pezzi di storia esasperatamente e noiosamente lunghi causa filler.',CURDATE());
insert into commento_naruto(utente,commento,data) value ('GABBO2002','
La storia è bellissima, criticata da molti per l’eccessivo numero di episodi filler, i quali però analizzano il background di alcuni personaggi “secondari”; in più, in questi episodi non manca il divertimento.
Il personaggio principale, per quanto possa sembrare un semplice ragazzino stupido e imbranato, è fantastico, divertente e con dei caratteri tipici in cui è facile rispecchiarsi.
"Naruto Shippuden" è il coronamento di quello che è stato "Naruto", penso che l’autore abbia realizzato un capolavoro; veramente un top anime.',CURDATE());
insert into commento_naruto(utente,commento,data) value ('HAKMAXSALV92','Come nell\'arco precedente, la trama diventa sempre più intensa, profonda, cioè cupa, tortuosa, cruenta e piena di suspense e di colpi di scena, improvvisazione e contemporaneamente di paura, terrore, rimpianti, ansia, angoscia, che qui vengono magistralmente rappresentati e poi fuoriescono gradualmente e fanno da sfondo a verità ancora più sconvolgenti e terrificanti. La colonna sonora si fonde con questo, manifestandosi in una serie di sonorità ora soavi ora cupe, sinistre, che fanno da sfondo alle vicende che si vengono a creare. I personaggi sono maturati, ma gli ostacoli che devono affrontare sono tutt\'altro che semplici e/o facili.',CURDATE());
insert into commento_naruto(utente,commento,data) value ('KOTAIBUSHI','È passato un po\' di tempo dallo scontro con Sasuke, e Naruto torna al villaggio dopo l\'addestramento con il maestro Jiraya. La storia prosegue abbastanza fedelmente al manga, iniziano a farsi vedere tutti i componenti dell\'Organizzazione Alba, che piano piano verranno approfonditi davvero bene nei vari scontri che porteranno a sviluppi inaspettati che culmineranno nella quarta grande guerra ninja.
Proprio da questo punto inizia a mio parere il declino di questa serie, tra guerrieri immortali e risurrezioni a casaccio: parte una grande confusione, una mega rumble di azioni nonsense. Infatti, dopo un po\' ho interrotto la visione dell\'opera, per non rovinare tutto quello di buono che c\'era stato fino a prima.
Una nota sul finale che non ho mai visto, ma che grazie agli spoiler conosco: a mio avviso è davvero pessimo, non credo ci fosse una scelta peggiore di quella.',CURDATE());

insert into commento_dragonball(utente,commento,data) value ('HANAMICCÍ',' nella prima serie vengono introdotti tanti personaggi che ci sono anche attualmente in Dragon Ball super che non sono stati dimenticati (come Lunch), abbiamo Bulma che ormai è diventata un personaggio iconico della serie insieme al maestro Muten, Krillin, Yamcha e infine Tienshinhan, nella prima serie i personaggi sono scritti in maniera decente rispetto ad alcuni soprattutto antagonisti che appaiono da Z in poi.',CURDATE());
insert into commento_dragonball(utente,commento,data) value ('KOTAIBUSHI','per i combattimenti nulla da aggiungere qui, Dragon ball è un battle shonen puro dove il protagonista supererà grandi ostacoli per sconfiggere il cattivo della saga, insomma ha tanti aspetti positivi sui combattimenti, non viene dato solo spazio a Goku ma anche i suoi amici fanno la loro parte nel battere il cattivo (questo si accennerà meglio in Z)',CURDATE());
insert into commento_dragonball(utente,commento,data) value ('WINTERBIRD','Dragon ball è un anime iconico anche se può sembrare ripetitivo agli occhi della maggior parte delle persone, esso rimarrà sempre un anime ricco di momenti epici che non stancherà mai a noi amanti dei battle shonen. A livello affettivo penso sia l\'anime migliore per affezionarti ad un personaggio e avere Goku come fonte di ispirazione nella vita, insomma quest\'anime dalla prima serie fino allo stato attuale si può descrivere con una sola parola: capolavoro',CURDATE());
insert into commento_dragonball(utente,commento,data) value ('MEMENTO70','Vorrei partire dicendo che questa serie non mi è piaciuta molto, la trovo molto banale e ripetitiva, va avanti sempre con lo stesso schema dall\'inizio alla fine. Proprio per questo motivo dopo un po\' la serie inizia a diventare pesante e noiosa non dando mai l\'impressione di incertezza nello svolgimento della trama.
I personaggi sono pessimi. e scontati al di fuori dei combattimenti, ci sono tutti gli stereotipi del genere. I dialoghi li ho trovati di basso livello.
L\' unico punto positivo sono ovviamente i combattimenti, che anche se fatti male, tengono viva la storia dalle sabbie mobili.',CURDATE());

insert into commento_one_pounch_man(utente,commento,data) value ('FELPATO12','Bello, ma non bellissimo, con animazioni ‘fighe’ ma non spettacolari.
La trama è con un po’ di buchi, ma tutto sommato è carina. I personaggi sono carini ma visti e rivisti, con il classico personaggio che vuole salvare il mondo.
Riguardo il doppiaggio italiano, forse gli unici che secondo la mia opinione sono azzeccati sono Zenitsu, Inosuke e Tengen, perché Tanjiro ha la voce da adulto. Inoltre, mi chiedo come sia possibile che nei primi tredici episodi combattono i demoni deboli, e poi già arrivano quelli overpowered, ma va beh.
I combattimenti e le animazioni alla fin fine ci stanno, è divertente e non esageratamente stereotipato.',CURDATE());
insert into commento_one_pounch_man(utente,commento,data) value ('SEBY65','I personaggi: alcuni sono tratteggiati assai bene, mentre altri sono eccessivamente caricaturali. Tanjiro, il protagonista principale, mostra la tendenza a parlare e, soprattutto, pensare troppo, in situazioni dove la differenza tra la vita e la morte scorre nel lasso temporale di pochissimi secondi. Il parlato è troppo “alto”; dipenderà forse dall’adattamento alla lingua italiana, ma mi sembra che troppo spesso i dialoghi siano “urlati” anziché “pronunciati”.',CURDATE());
insert into commento_one_pounch_man(utente,commento,data) value ('GATTODELRAMEN','Le animazioni sono sufficienti e l’interazione con la CGI più che discreta.
Buona la colonna sonora, ma la sigla “metallara” non mi piace granché. I fondali talvolta sono molto, ma molto belli.
Il linguaggio è “adulto”: si impreca, si dicono parole grosse e il sangue scorre a fiumi. Chi è dalla parte dei buoni non è immortale, e di cacciatori di demoni ne muoiono parecchi, talvolta gettati allo sbaraglio contro i demoni.
Suggestivo il punto di vista dei demoni, non sempre necessariamente malvagi, consapevoli di vivere la loro dimensione da un punto di vista tragico. La maggior parte di loro è triste, e forse proprio tale dimensione spinge loro ad atti di vero e proprio sadismo. I demoni sono prigionieri di loro stessi, e quelli che desiderano cambiare stile di vita sono costretti a nascondersi dai loro stessi simili.
',CURDATE());
insert into commento_one_pounch_man(utente,commento,data) value ('FREYLA','Anime avvincente e accattivante, ha catturato fin da subito la mia attenzione sia per le sensazionali animazioni che per la ben definita caratterizzazione dei personaggi: partendo dal protagonista, Kamado Tanjiro, ragazzo poco più che adolescente, fino ad arrivare ai personaggi secondari, come ad esempio i pilastri, si può notare come ogni individuo presente nella serie abbia tratti caratteriali, indole e natura che lo contraddistinguono dagli altri, rendendolo unico nel suo genere.
Consigliato assolutamente a chi è entrato nel mondo degli anime da poco e vuole vedere una serie diversa dal solito.',CURDATE());