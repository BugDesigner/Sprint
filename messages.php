<?php

$villes = array("Chongqing", "Shanghai", "Pékin", "Delhi", "Istanbul", "Kinshasa", "Lagos", "Karachi", "Canton", "Tokyo", "Chengdu", "Tianjin", "Dacca", "Moscou", "Bombay", "SãoPaulo", "Lahore", "Jakarta", "Bangkok", "Shenzhen", "Séoul", "LeCaire", "Mexico", "Luanda", "Londres", "Wuhan", "Lima", "Téhéran", "NewYork", "Bangalore", "Xi'an", "HôChiMinh-Ville", "Dongguan", "Shenyang", "Hanoï", "Nankin", "HongKong", "Bagdad", "Hyderabad", "Bogota", "RiodeJaneiro", "Abidjan", "Madras", "Singapour", "Riyad", "Johannesbourg", "Ankara", "Ahmedabad", "Saint-Pétersbourg", "Sydney", "Pune", "Santiago", "Nairobi", "Surate", "Calcutta", "Izmir", "Alexandrie", "DaresSalam", "Rangoun", "Machhad", "Amman", "Djeddah", "Kano", "LosAngeles", "Berlin", "Casablanca", "Ibadan", "Durban", "Addis-Abeba", "Madrid", "Faisalabad", "Alger", "Dubaï", "Brasilia", "BuenosAires", "Bursa", "Kiev", "Toronto", "Salvador", "Rome", "Chicago", "Osaka", "Fortaleza", "Taipei", "BeloHorizonte", "Damas", "Houston", "Nagoya", "Accra", "Guayaquil", "Medellín", "Sanaa", "Bassorah", "Paris", "Alep", "Khartoum", "Cali", "Ispahan", "Minsk", "Curitiba", "Caracas", "Vienne", "Bucarest", "Hambourg", "Gaziantep", "Varsovie", "KualaLumpur", "Manille", "Montréal", "Budapest", "Chiraz", "Tripoli", "LaMecque", "Barcelone", "Recife", "Phoenix", "Philadelphie", "Munich", "Adana", "Tabriz", "Goiânia", "Maracaibo", "Karadj", "Belém", "PortoAlegre", "AbouDabi", "Guadalajara", "Kharkiv", "SanDiego", "Milan", "Sofia", "Dallas", "Tijuana", "Prague", "Barranquilla", "Kazan", "Belgrade", "Campinas", "Samara", "Birmingham", "Monterrey", "NijniNovgorod", "Oufa", "Rostov-sur-le-Don", "Cologne", "Dakar", "SanJosé", "Volgograd");

$messages = array();

$messages['avion']['fr'][0] = "Depuis l'aéroport de ::vd::, prenez le vol ::id_loco:: pour ::va::";
$messages['avion']['en'][0] = "From airport's ::vd::, take the flight ::id_loco:: to ::va::";
$messages['avion']['fr'][1] = "Depuis ::vd::, prendre le vol ::id_loco:: pour ::va::";
$messages['avion']['en'][1] = "From ::vd::, take the flight ::id_loco:: to ::va::";

$messages['train']['fr'][0] = "Prendre le train ::id_loco:: ::lieu_loco_dep:: de ::vd:: ::lieu_loco_arr:: de ::va::.";

$messages['bus']['fr'][0] = "Prendre le bus de ::lieu_loco_dep:: de ::vd:: ::lieu_loco_arr:: de ::va::.";

$messages['helicoptere']['fr'][0] = "Prendre l'hélicoptère ::lieu_loco_dep:: de ::vd:: ::lieu_loco_arr:: de ::va::.";

$messages['fusee']['fr'][0] = "Prendre la fusée ::lieu_loco_dep:: de ::vd:: ::lieu_loco_arr:: de ::va::.";

$messages['velo electrique']['fr'][0] = "Prendre le vélo électrique ::lieu_loco_dep:: de ::vd:: ::lieu_loco_arr:: de ::va::.";

$messages['bateau']['fr'][0] = "Prendre le bâteau ::lieu_loco_dep:: de ::vd:: ::lieu_loco_arr:: de ::va::.";


$messages['Pas_d_attribution_de_siege']['fr'][0] = "Pas de siège attribué";
$messages['Pas_d_attribution_de_siege']['fr'][1] = "Pas d'attribution de siège";

$messages['Asseyez_vous_au_siege']['fr'][0] = "Asseyez-vous au siège ::id_place::";
$messages['Asseyez_vous_au_siege']['fr'][1] = "Siège n° ::id_place::";

$messages['depuis_avion']['fr'][0] = "depuis l'aéroport";
$messages['depuis_avion']['fr'][1] = "à partir de l'aéroport";

$messages['vers_avion']['fr'][0] = "vers l'aéroport";
$messages['vers_avion']['fr'][1] = "à l'aéroport";

$messages['depuis_train']['fr'][0] = "depuis la gare de train";
$messages['depuis_train']['fr'][1] = "à partir de la gare de train";

$messages['vers_train']['fr'][0] = "vers la gare de train";
$messages['vers_train']['fr'][1] = "à la gare de train";

$messages['depuis_bus']['fr'][0] = "depuis la gare de bus";
$messages['depuis_bus']['fr'][1] = "à partir de la gare de bus";

$messages['vers_bus']['fr'][0] = "vers la gare de bus";
$messages['vers_bus']['fr'][1] = "à la gare de bus";

$messages['depuis_velo electrique']['fr'][0] = "depuis la gare de bus";
$messages['depuis_velo electrique']['fr'][1] = "à partir de la gare de bus";

$messages['vers_velo electrique']['fr'][0] = "vers la gare de train";
$messages['vers_velo electrique']['fr'][1] = "à la gare de train";

$messages['depuis_helicoptere']['fr'][0] = "depuis l'héliport";
$messages['depuis_helicoptere']['fr'][1] = "à partir de l'héliport";

$messages['vers_helicoptere']['fr'][0] = "vers l'héliport'";
$messages['vers_helicoptere']['fr'][1] = "à l'héliport";

$messages['depuis_bateau']['fr'][0] = "depuis le port";
$messages['depuis_bateau']['fr'][1] = "à partir du port";

$messages['vers_bateau']['fr'][0] = "vers le port'";
$messages['vers_bateau']['fr'][1] = "au port";

$messages['depuis_fusee']['fr'][0] = "depuis l'astroport";
$messages['depuis_fusee']['fr'][1] = "à partir de l'astroport";

$messages['vers_fusee']['fr'][0] = "vers l'astroport'";
$messages['vers_fusee']['fr'][1] = "à l'astroport";

?>