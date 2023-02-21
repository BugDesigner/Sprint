textes = Array();
textes['exp_prob'] = Array();
textes['exp_prob']['titre'] = Array();
textes['exp_prob']['resume'] = Array();

textes['exp_prob']['titre']['en'] = "Problem explanation";
textes['exp_prob']['resume']['en'] = "You are given a stack of boarding cards for various transportations that will take you from a point A to point B via several stops on the way.\n\
All of the boarding cards are out of order and you don't know where your journey starts, nor where it ends. Each boarding card contains information about seat assignment, and means of transportation (such as flight number, bus number etc).\n\
\n\
Write an API that lets you sort this kind of list and present back a description of how to complete your journey.\n\
\n\
For instance the API should be able to take an unordered set of boarding cards, provided in a format defined by you, and produce this list:\n\
\n\
    • Take train 78A from Madrid to Barcelona. Sit in seat 45B.\n\
    • Take the airport bus from Barcelona to Gerona Airport. No seat assignment.\n\
    • From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.\n\
    • From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.\n\
    • You have arrived at your final destination.\n\
\n\
The list should be defined in a format that's compatible with the input format. \n\
\n\
The API is to be an internal PHP API so it will only communicate with other parts of a PHP application, not server to server, nor server to client. \n\
Write or explain how to test your application.\n\
";

textes['exp_prob']['titre']['fr'] = "Explication du problème."
textes['exp_prob']['resume']['fr'] = "Vous recevez une pile de cartes d'embarquement pour divers transports qui vous mèneront d'un point A à un point B via plusieurs arrêts sur le chemin.\n\
Toutes les cartes d'embarquement sont en panne et vous ne savez pas où commence votre voyage, ni où il se termine. Chaque carte d'embarquement contient des informations sur l'attribution des sièges et les moyens de transport (tels que le numéro de vol, le numéro de bus, etc.).\n\
\n\
Rédigez une API qui vous permet de trier ce type de liste et de présenter en retour une description de la manière de terminer votre parcours.\n\
\n\
Par exemple, l'API devrait être capable de prendre un ensemble non ordonné de cartes d'embarquement, fournies dans un format défini par vous, et de produire cette liste :\n\
\n\
     • Prendre le train 78A de Madrid à Barcelone. Asseyez-vous au siège 45B.\n\
     • Prendre le bus de l'aéroport de Barcelone à l'aéroport de Gérone. Pas d'attribution de siège.\n\
     • Depuis l'aéroport de Gérone, prenez le vol SK455 pour Stockholm. Porte 45B, siège 3A. Dépôt de bagages au guichet 344.\n\
     • Depuis Stockholm, prendre le vol SK22 pour New York JFK. Porte 22, siège 7B. Les bagages seront automatiquement transférés de votre dernière étape.\n\
     • Vous êtes arrivé à votre destination finale.\n\
\n\
La liste doit être définie dans un format compatible avec le format d'entrée.\n\
\n\
L'API doit être une API PHP interne, elle ne communiquera donc qu'avec d'autres parties d'une application PHP, pas de serveur à serveur, ni de serveur à client.\n\
Écrivez ou expliquez comment tester votre application.\n\
";