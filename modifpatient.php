<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifpatient</title>
</head>
<body>
    
<!--<h1>modifier les informations</h1>-->
            <?php
            $c=null;$sexe; $nom=null;$pre=null;$datenais=null;$adr=null;$tel=null;$em=null; ;$dp=null;$drv=null;$np=null;
            if(isset($_GET['idpatient']))
            {
            $c=$_GET['idpatient'];
            echo $c;
            $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
            if($conn)
            {
            $req="select * from patient where idpatient = $c ";
            $res=$conn->query($req);
            if($res)
            {
                $pat=$res->fetch();
                $sexe=$pat['sexepatient'];
                $nom=$pat['nompatient'];
                $pre=$pat['prenompatient'];
                $datenais=$pat['datenaisspatient'];
                $adr=$pat['adressepatient'];
                $tel=$pat['telpatient'];
                $em=$pat['emailpatient'];
                $dp=$pat['dateenr'];
                $drv=$pat['daterv'];
                $np=$pat['nationalitepatient'];

            }
            }
        }
        

?>
<div class="container mt-5">
   <div class="card">
        <div class="card-header">
            <h3 class="text-center">modifier les informations</h3>
        </div>
        <div class="card-body">
        <div class="container">
<form action="traiter_modif.php" method="POST" >
            <input type="hidden" value= "<?php echo $c;?>" name="idpatient">
            
            <label for="sx">SEXE: </label><br><b>
            <div class="form-check">
            <label for="sx">feminin </label>
           <input class="form-check-label" type="radio" name="sexepatient" value="<?php echo" feminin";?>" checked > 
            <label for="sx">masculin </label>
           <input  class="form-check-label" type="radio" name="sexepatient" value="<?php echo" masculin";?>" checked ><br>
    </div>
            <label for="nom">Nom_Patient </label>
            <input class="form-control" type="text" name="nompatient" id="nom" value="<?php echo $nom;?>"><br><br>
            <label for="pr">Prenom_Patient </label>
            <input class="form-control" type="text" name="prenompatient" id="pr" value="<?php echo $pre;?>"><br><br>
            <label for="date"> DateNaiss_Patient</label>
            <input class="form-control"  type="date" name="datenaisspatient" id="datenaiss" value="<?php echo $datenais;?>"><br><br>
            <label for="ad">Adresse_Patient </label>
            <input class="form-control" type="text" name="adressepatient" id="ad" value="<?php echo $adr;?>"><br><br>
            <label for="tel">Tel_Patient </label>
            <input class="form-control" type="tel" name="telpatient" id="tel" value="<?php echo $tel;?>"><br><br>
            <label for="email"> Email_Patient</label>
            <input class="form-control" type="email" name="emailpatient" id="email" value="<?php echo $em;?>"><br><br>
            <label for="dateen"> DateEnregistrement_Patient</label>
            <inputclass="form-control"  type="date" name="dateenr" id="date" value="<?php echo $dp;?>"><br><br>
            <label for="daterv">DateRV_Patient</label>
            <input class="form-control"  type="date" name="daterv" id="daterv" value="<?php echo $drv;?>"><br><br>
            <label for="nat">nationalites</label>
            <select class="form-control"  name="nationalitepatient"id="nat" value="<?php echo $np;?>">
        <option value="<?php echo $np;?>" selected><?php echo $np;?>"</option>
            <option value="AFG">Afghane (Afghanistan)</option>
        <option value="ALB">Albanaise (Albanie)</option>
        <option value="DZA">Algérienne (Algérie)</option>
        <option value="DEU">Allemande (Allemagne)</option>
        <option value="USA">Americaine (États-Unis)</option>
        <option value="AND">Andorrane (Andorre)</option>
        <option value="AGO">Angolaise (Angola)</option>
        <option value="ATG">Antiguaise-et-Barbudienne (Antigua-et-Barbuda)</option>
        <option value="ARG">Argentine (Argentine)</option>
        <option value="ARM">Armenienne (Arménie)</option>
        <option value="AUS">Australienne (Australie)</option>
        <option value="AUT">Autrichienne (Autriche)</option>
        <option value="AZE">Azerbaïdjanaise (Azerbaïdjan)</option>
        <option value="BHS">Bahamienne (Bahamas)</option>
        <option value="BHR">Bahreinienne (Bahreïn)</option>
        <option value="BGD">Bangladaise (Bangladesh)</option>
        <option value="BRB">Barbadienne (Barbade)</option>
        <option value="BEL">Belge (Belgique)</option>
        <option value="BLZ">Belizienne (Belize)</option>
        <option value="BEN">Béninoise (Bénin)</option>
        <option value="BTN">Bhoutanaise (Bhoutan)</option>
        <option value="BLR">Biélorusse (Biélorussie)</option>
        <option value="MMR">Birmane (Birmanie)</option>
        <option value="GNB">Bissau-Guinéenne (Guinée-Bissau)</option>
        <option value="BOL">Bolivienne (Bolivie)</option>
        <option value="BIH">Bosnienne (Bosnie-Herzégovine)</option>
        <option value="BWA">Botswanaise (Botswana)</option>
        <option value="BRA">Brésilienne (Brésil)</option>
        <option value="GBR">Britannique (Royaume-Uni)</option>
        <option value="BRN">Brunéienne (Brunéi)</option>
        <option value="BGR">Bulgare (Bulgarie)</option>
        <option value="BFA">Burkinabée (Burkina)</option>
        <option value="BDI">Burundaise (Burundi)</option>
        <option value="KHM">Cambodgienne (Cambodge)</option>
        <option value="CMR">Camerounaise (Cameroun)</option>
        <option value="CAN">Canadienne (Canada)</option>
        <option value="CPV">Cap-verdienne (Cap-Vert)</option>
        <option value="CAF">Centrafricaine (Centrafrique)</option>
        <option value="CHL">Chilienne (Chili)</option>
        <option value="CHN">Chinoise (Chine)</option>
        <option value="CYP">Chypriote (Chypre)</option>
        <option value="COL">Colombienne (Colombie)</option>
        <option value="COM">Comorienne (Comores)</option>
        <option value="COG">Congolaise (Congo-Brazzaville)</option>
        <option value="COD">Congolaise (Congo-Kinshasa)</option>
        <option value="COK">Cookienne (Îles Cook)</option>
        <option value="CRI">Costaricaine (Costa Rica)</option>
        <option value="HRV">Croate (Croatie)</option>
        <option value="CUB">Cubaine (Cuba)</option>
        <option value="DNK">Danoise (Danemark)</option>
        <option value="DJI">Djiboutienne (Djibouti)</option>
        <option value="DOM">Dominicaine (République dominicaine)</option>
        <option value="DMA">Dominiquaise (Dominique)</option>
        <option value="EGY">Égyptienne (Égypte)</option>
        <option value="ARE">Émirienne (Émirats arabes unis)</option>
        <option value="GNQ">Équato-guineenne (Guinée équatoriale)</option>
        <option value="ECU">Équatorienne (Équateur)</option>
        <option value="ERI">Érythréenne (Érythrée)</option>
        <option value="ESP">Espagnole (Espagne)</option>
        <option value="TLS">Est-timoraise (Timor-Leste)</option>
        <option value="EST">Estonienne (Estonie)</option>
        <option value="ETH">Éthiopienne (Éthiopie)</option>
        <option value="FJI">Fidjienne (Fidji)</option>
        <option value="FIN">Finlandaise (Finlande)</option>
        <option value="FRA">Française (France)</option>
        <option value="GAB">Gabonaise (Gabon)</option>
        <option value="GMB">Gambienne (Gambie)</option>
        <option value="GEO">Georgienne (Géorgie)</option>
        <option value="GHA">Ghanéenne (Ghana)</option>
        <option value="GRD">Grenadienne (Grenade)</option>
        <option value="GTM">Guatémaltèque (Guatemala)</option>
        <option value="GIN">Guinéenne (Guinée)</option>
        <option value="GUY">Guyanienne (Guyana)</option>
        <option value="HTI">Haïtienne (Haïti)</option>
        <option value="GRC">Hellénique (Grèce)</option>
        <option value="HND">Hondurienne (Honduras)</option>
        <option value="HUN">Hongroise (Hongrie)</option>
        <option value="IND">Indienne (Inde)</option>
        <option value="IDN">Indonésienne (Indonésie)</option>
        <option value="IRQ">Irakienne (Iraq)</option>
        <option value="IRN">Iranienne (Iran)</option>
        <option value="IRL">Irlandaise (Irlande)</option>
        <option value="ISL">Islandaise (Islande)</option>
        <option value="ISR">Israélienne (Israël)</option>
        <option value="ITA">Italienne (Italie)</option>
        <option value="CIV">Ivoirienne (Côte d'Ivoire)</option>
        <option value="JAM">Jamaïcaine (Jamaïque)</option>
        <option value="JPN">Japonaise (Japon)</option>
        <option value="JOR">Jordanienne (Jordanie)</option>
        <option value="KAZ">Kazakhstanaise (Kazakhstan)</option>
        <option value="KEN">Kenyane (Kenya)</option>
        <option value="KGZ">Kirghize (Kirghizistan)</option>
        <option value="KIR">Kiribatienne (Kiribati)</option>
        <option value="KNA">Kittitienne et Névicienne (Saint-Christophe-et-Niévès)</option>
        <option value="KWT">Koweïtienne (Koweït)</option>
        <option value="LAO">Laotienne (Laos)</option>
        <option value="LSO">Lesothane (Lesotho)</option>
        <option value="LVA">Lettone (Lettonie)</option>
        <option value="LBN">Libanaise (Liban)</option>
        <option value="LBR">Libérienne (Libéria)</option>
        <option value="LBY">Libyenne (Libye)</option>
        <option value="LIE">Liechtensteinoise (Liechtenstein)</option>
        <option value="LTU">Lituanienne (Lituanie)</option>
        <option value="LUX">Luxembourgeoise (Luxembourg)</option>
        <option value="MKD">Macédonienne (Macédoine)</option>
        <option value="MYS">Malaisienne (Malaisie)</option>
        <option value="MWI">Malawienne (Malawi)</option>
        <option value="MDV">Maldivienne (Maldives)</option>
        <option value="MDG">Malgache (Madagascar)</option>
        <option value="MLI">Maliennes (Mali)</option>
        <option value="MLT">Maltaise (Malte)</option>
        <option value="MAR">Marocaine (Maroc)</option>
        <option value="MHL">Marshallaise (Îles Marshall)</option>
        <option value="MUS">Mauricienne (Maurice)</option>
        <option value="MRT">Mauritanienne (Mauritanie)</option>
        <option value="MEX">Mexicaine (Mexique)</option>
        <option value="FSM">Micronésienne (Micronésie)</option>
        <option value="MDA">Moldave (Moldovie)</option>
        <option value="MCO">Monegasque (Monaco)</option>
        <option value="MNG">Mongole (Mongolie)</option>
        <option value="MNE">Monténégrine (Monténégro)</option>
        <option value="MOZ">Mozambicaine (Mozambique)</option>
        <option value="NAM">Namibienne (Namibie)</option>
        <option value="NRU">Nauruane (Nauru)</option>
        <option value="NLD">Néerlandaise (Pays-Bas)</option>
        <option value="NZL">Néo-Zélandaise (Nouvelle-Zélande)</option>
        <option value="NPL">Népalaise (Népal)</option>
        <option value="NIC">Nicaraguayenne (Nicaragua)</option>
        <option value="NGA">Nigériane (Nigéria)</option>
        <option value="NER">Nigérienne (Niger)</option>
        <option value="NIU">Niuéenne (Niue)</option>
        <option value="PRK">Nord-coréenne (Corée du Nord)</option>
        <option value="NOR">Norvégienne (Norvège)</option>
        <option value="OMN">Omanaise (Oman)</option>
        <option value="UGA">Ougandaise (Ouganda)</option>
        <option value="UZB">Ouzbéke (Ouzbékistan)</option>
        <option value="PAK">Pakistanaise (Pakistan)</option>
        <option value="PLW">Palaosienne (Palaos)</option>
        <option value="PSE">Palestinienne (Palestine)</option>
        <option value="PAN">Panaméenne (Panama)</option>
        <option value="PNG">Papouane-Néo-Guinéenne (Papouasie-Nouvelle-Guinée)</option>
        <option value="PRY">Paraguayenne (Paraguay)</option>
        <option value="PER">Péruvienne (Pérou)</option>
        <option value="PHL">Philippine (Philippines)</option>
        <option value="POL">Polonaise (Pologne)</option>
        <option value="PRT">Portugaise (Portugal)</option>
        <option value="QAT">Qatarienne (Qatar)</option>
        <option value="ROU">Roumaine (Roumanie)</option>
        <option value="RUS">Russe (Russie)</option>
        <option value="RWA">Rwandaise (Rwanda)</option>
        <option value="LCA">Saint-Lucienne (Sainte-Lucie)</option>
        <option value="SMR">Saint-Marinaise (Saint-Marin)</option>
        <option value="VCT">Saint-Vincentaise et Grenadine (Saint-Vincent-et-les Grenadines)</option>
        <option value="SLB">Salomonaise (Îles Salomon)</option>
        <option value="SLV">Salvadorienne (Salvador)</option>
        <option value="WSM">Samoane (Samoa)</option>
        <option value="STP">Santoméenne (Sao Tomé-et-Principe)</option>
        <option value="SAU">Saoudienne (Arabie saoudite)</option>
        <option value="SEN">Sénégalaise (Sénégal)</option>
        <option value="SRB">Serbe (Serbie)</option>
        <option value="SYC">Seychelloise (Seychelles)</option>
        <option value="SLE">Sierra-Léonaise (Sierra Leone)</option>
        <option value="SGP">Singapourienne (Singapour)</option>
        <option value="SVK">Slovaque (Slovaquie)</option>
        <option value="SVN">Slovène (Slovénie)</option>
        <option value="SOM">Somalienne (Somalie)</option>
        <option value="SDN">Soudanaise (Soudan)</option>
        <option value="LKA">Sri-Lankaise (Sri Lanka)</option>
        <option value="ZAF">Sud-Africaine (Afrique du Sud)</option>
        <option value="KOR">Sud-Coréenne (Corée du Sud)</option>
        <option value="SSD">Sud-Soudanaise (Soudan du Sud)</option>
        <option value="SWE">Suédoise (Suède)</option>
        <option value="CHE">Suisse (Suisse)</option>
        <option value="SUR">Surinamaise (Suriname)</option>
        <option value="SWZ">Swazie (Swaziland)</option>
        <option value="SYR">Syrienne (Syrie)</option>
        <option value="TJK">Tadjike (Tadjikistan)</option>
        <option value="TZA">Tanzanienne (Tanzanie)</option>
        <option value="TCD">Tchadienne (Tchad)</option>
        <option value="CZE">Tchèque (Tchéquie)</option>
        <option value="THA">Thaïlandaise (Thaïlande)</option>
        <option value="TGO">Togolaise (Togo)</option>
        <option value="TON">Tonguienne (Tonga)</option>
        <option value="TTO">Trinidadienne (Trinité-et-Tobago)</option>
        <option value="TUN">Tunisienne (Tunisie)</option>
        <option value="TKM">Turkmène (Turkménistan)</option>
        <option value="TUR">Turque (Turquie)</option>
        <option value="TUV">Tuvaluane (Tuvalu)</option>
        <option value="UKR">Ukrainienne (Ukraine)</option>
        <option value="URY">Uruguayenne (Uruguay)</option>
        <option value="VUT">Vanuatuane (Vanuatu)</option>
        <option value="VAT">Vaticane (Vatican)</option>
        <option value="VEN">Vénézuélienne (Venezuela)</option>
        <option value="VNM">Vietnamienne (Viêt Nam)</option>
        <option value="YEM">Yéménite (Yémen)</option>
        <option value="ZMB">Zambienne (Zambie)</option>
        <option value="ZWE">Zimbabwéenne (Zimbabwe)</option>
</select>
<input type="submit" value="VALIDEZ">
    </form>
</div>
</div>
</div>
</div>
</body>
</html>