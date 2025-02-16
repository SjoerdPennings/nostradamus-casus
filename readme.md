# Casus: 't Klosterke

## Opzet

Deze repository beschrijft het beginpunt voor deze casus, inclusief de specificaties. Er wordt voor het testen gebruik gemaakt van de [Kahlan library](https://kahlan.github.io/docs/), met een net iets andere syntax dan phpunit, maar wanneer je kijkt naar de specs moet dit redelijk voor zich wijzen.

Wat je moet doen is het volgende:

1. Refactor het bestand `Klosterke.php` in herbruikbare classes.
2. Voeg een nieuw product categorie toe, "Kloosterbier". De specificaties staan als commentaar in het `KlosterkeSpec.php` bestand.

## Regels

Welkom bij Herberg `t Klosterke. Gevestigd in het oude klooster van Den Hout, zijn we een echt bruin cafe. Achter de tap staat Paul. We kopen en verkopen alleen de beste producten. Helaas wordt de kwaliteit van producten hoe dichter ze bij de uiterste verkoopdatum komen minder. 
We hebben hiervoor echter een systeem wat gemaakt is door onze voormalig medewerker Jeffrey, welke helaas niet meer voor ons werkzaam is. 

**Je opdracht voor vandaag is het toevoegen van een nieuwe functie in het systeem zodat we een nieuwe categorie met nieuwe producten kunnen gaan verkopen.**

Allereerst een overzicht van ons systeem:

- Alle items hebben een VerkopenVoor waarde welke het aantal dagen aftelt totdat we het item verkocht moeten hebben
- Alle items hebben een Kwaliteit waarde welke beschrijft wat de kwaliteit van een product is
- Aan het eind van de dag worden beide waardes met 1 verminderd

Klinkt simpel toch? Niet helemaal:

- Op het moment dat de verkoopdatum is gepasseerd, gaat het kwaliteit dubbel zo snel achteruit
- De kwaliteit van een item is echter nooit negatief
- De categorie "Rode Wijn" gaat echter vooruit in kwaliteit hoe langer een item ligt
- De kwaliteit van een product is nooit meer dan 50
- "BBQ", als historisch item, hoeft nooit verkocht te worden en gaat ook niet terug in kwaliteit
- Witte wijn items hebben een oplopende kwaliteit, net zoals rode wijn, en stijgen in kwaliteit wanneer de verkoopdatum dichterbij komt; de kwaliteit stijgt met 2 wanneer er 10 of minder dagen tot de verkoopdatum zijn en met 3 wanneer er 5 of minder dagen tot de verkoopdatum zijn. Wanneer de datum is gepasseerd valt de kwaliteit terug naar 0.

We hebben recent een contract afgesloten met een leverancier van kloosterbier en dat vereist een update aan ons systeem:

"Kloosterbier" items gaan in qualiteit dubbel zo hard achteruit als normale items

Voor de duidelijkheid, een item kan nooit meer dan 50 hebben als kwaliteit, maar "BBQ", als historisch item, heeft een kwaliteit van 80 en verandert nooit.

---

## Urenregistratie Sjoerd Pennings
14:10 - Repository clonen, en code/specs doorlezen.
14:15 - Refactor Klosterke.php naar 1 basisclass, en 4 classes voor de verschillende producten.
14:35 - Pas de specs aan zodat deze kloppen met de nieuwe classes.
14:40 - Implementeer de Kloosterbier class.
14:50 - Testen of de Kloosterbier class werkt.
14:55 - Urenregistratie invullen en uitleg schrijven.
15:00 - Opsplitsen KloosterkeSpec naar vijf spec-bestanden.
15:08 - Specs draaien...
15:08 - Klaar!

## Uitleg
- Alle gedeelde code die bij elk producttype is gebruikt staat nu in de abstract class ProductClass.php
  - Alle andere classes extenden deze class.
- Elk producttype heeft zijn eigen class, met zijn eigen regels.
  - HistorischProduct (voor BBQ en andere historische producten) verandert niets, en heeft dus geen inhoud.
  - Product (voor normale producten) heeft de standaard regels.
  - RodeWijn (voor rode wijn) heeft de standaard regels, maar de kwaliteit stijgt ipv daalt.
  - WitteWijn (voor witte wijn) heeft de standaard regels, maar de kwaliteit stijgt sneller naarmate de verkoopdatum dichterbij komt.
  - Kloosterbier (voor kloosterbier) heeft de standaard regels, maar de kwaliteit daalt dubbel zo snel.
- De classes zijn zo opgezet dat ze makkelijk uit te breiden zijn met nieuwe regels voor nieuwe producten.
  - Dit is te doen door een nieuwe class aan te maken die ProductClass extend, en de nieuwe regels te implementeren.
- KlosterkeSpec is ook opgedeeld in vijf verschillende specs, zodat de tests per producttype kunnen worden uitgevoerd.
  - Dit is gedaan om de tests overzichtelijk te houden.
