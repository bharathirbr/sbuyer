/**
 * Site : http:www.smarttutorials.net
 * @author muni
 */
	      
 $(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('.check_all').prop("checked", false); 
	check();
});
var i=$('table tr').length;

$(".addmore").on('click',function(){
	count=$('table tr').length;
	
    var data="<tr><td><input type='checkbox' class='case'/></td>";
    	data+="<td><span id='snum"+i+"'>"+count+".</span></td>";
    	data+="<td><input class='form-control autocomplete_txt' type='text' data-type='countryname' id='countryname_"+i+"' name='countryname[]'/></td>";
    	data+="<td><input class='form-control autocomplete_txt' type='text' data-type='country_no' id='country_no_"+i+"' name='country_no[]'/></td>";
    	data+="<td><input class='form-control autocomplete_txt' type='text' data-type='phone_code' id='phone_code_"+i+"' name='phone_code[]'/></td>";
    	data+="<td><input class='form-control autocomplete_txt' type='text' data-type='country_code' id='country_code_"+i+"' name='country_code[]'/></td></tr>";
	$('table').append(data);
	row = i ;
	i++;
});
				
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}

function check(){
	obj=$('table tr').find('span');
	$.each( obj, function( key, value ) {
		id=value.id;
		$('#'+id).html(key+1);
	});
}



var multiple = ["AFGHANISTAN|4|93|AFG|","ALBANIA|8|355|ALB|","ALGERIA|12|213|DZA|","AMERICAN SAMOA|16|1684|ASM|","ANDORRA|20|376|AND|","ANGOLA|24|244|AGO|","ANGUILLA|660|1264|AIA|","ANTARCTICA||0||","ANTIGUA AND BARBUDA|28|1268|ATG|","ARGENTINA|32|54|ARG|","ARMENIA|51|374|ARM|","ARUBA|533|297|ABW|","AUSTRALIA|36|61|AUS|","AUSTRIA|40|43|AUT|","AZERBAIJAN|31|994|AZE|","BAHAMAS|44|1242|BHS|","BAHRAIN|48|973|BHR|","BANGLADESH|50|880|BGD|","BARBADOS|52|1246|BRB|","BELARUS|112|375|BLR|","BELGIUM|56|32|BEL|","BELIZE|84|501|BLZ|","BENIN|204|229|BEN|","BERMUDA|60|1441|BMU|","BHUTAN|64|975|BTN|","BOLIVIA|68|591|BOL|","BOSNIA AND HERZEGOVINA|70|387|BIH|","BOTSWANA|72|267|BWA|","BOUVET ISLAND||0||","BRAZIL|76|55|BRA|","BRITISH INDIAN OCEAN TERRITORY||246||","BRUNEI DARUSSALAM|96|673|BRN|","BULGARIA|100|359|BGR|","BURKINA FASO|854|226|BFA|","BURUNDI|108|257|BDI|","CAMBODIA|116|855|KHM|","CAMEROON|120|237|CMR|","CANADA|124|1|CAN|","CAPE VERDE|132|238|CPV|","CAYMAN ISLANDS|136|1345|CYM|","CENTRAL AFRICAN REPUBLIC|140|236|CAF|","CHAD|148|235|TCD|","CHILE|152|56|CHL|","CHINA|156|86|CHN|","CHRISTMAS ISLAND||61||","COCOS (KEELING) ISLANDS||672||","COLOMBIA|170|57|COL|","COMOROS|174|269|COM|","CONGO|178|242|COG|","CONGO, THE DEMOCRATIC REPUBLIC OF THE|180|242|COD|","COOK ISLANDS|184|682|COK|","COSTA RICA|188|506|CRI|","COTE D'IVOIRE|384|225|CIV|","CROATIA|191|385|HRV|","CUBA|192|53|CUB|","CYPRUS|196|357|CYP|","CZECH REPUBLIC|203|420|CZE|","DENMARK|208|45|DNK|","DJIBOUTI|262|253|DJI|","DOMINICA|212|1767|DMA|","DOMINICAN REPUBLIC|214|1809|DOM|","ECUADOR|218|593|ECU|","EGYPT|818|20|EGY|","EL SALVADOR|222|503|SLV|","EQUATORIAL GUINEA|226|240|GNQ|","ERITREA|232|291|ERI|","ESTONIA|233|372|EST|","ETHIOPIA|231|251|ETH|","FALKLAND ISLANDS (MALVINAS)|238|500|FLK|","FAROE ISLANDS|234|298|FRO|","FIJI|242|679|FJI|","FINLAND|246|358|FIN|","FRANCE|250|33|FRA|","FRENCH GUIANA|254|594|GUF|","FRENCH POLYNESIA|258|689|PYF|","FRENCH SOUTHERN TERRITORIES||0||","GABON|266|241|GAB|","GAMBIA|270|220|GMB|","GEORGIA|268|995|GEO|","GERMANY|276|49|DEU|","GHANA|288|233|GHA|","GIBRALTAR|292|350|GIB|","GREECE|300|30|GRC|","GREENLAND|304|299|GRL|","GRENADA|308|1473|GRD|","GUADELOUPE|312|590|GLP|","GUAM|316|1671|GUM|","GUATEMALA|320|502|GTM|","GUINEA|324|224|GIN|","GUINEA-BISSAU|624|245|GNB|","GUYANA|328|592|GUY|","HAITI|332|509|HTI|","HEARD ISLAND AND MCDONALD ISLANDS||0||","HOLY SEE (VATICAN CITY STATE)|336|39|VAT|","HONDURAS|340|504|HND|","HONG KONG|344|852|HKG|","HUNGARY|348|36|HUN|","ICELAND|352|354|ISL|","INDIA|356|91|IND|","INDONESIA|360|62|IDN|","IRAN, ISLAMIC REPUBLIC OF|364|98|IRN|","IRAQ|368|964|IRQ|","IRELAND|372|353|IRL|","ISRAEL|376|972|ISR|","ITALY|380|39|ITA|","JAMAICA|388|1876|JAM|","JAPAN|392|81|JPN|","JORDAN|400|962|JOR|","KAZAKHSTAN|398|7|KAZ|","KENYA|404|254|KEN|","KIRIBATI|296|686|KIR|","KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF|408|850|PRK|","KOREA, REPUBLIC OF|410|82|KOR|","KUWAIT|414|965|KWT|","KYRGYZSTAN|417|996|KGZ|","LAO PEOPLE'S DEMOCRATIC REPUBLIC|418|856|LAO|","LATVIA|428|371|LVA|","LEBANON|422|961|LBN|","LESOTHO|426|266|LSO|","LIBERIA|430|231|LBR|","LIBYAN ARAB JAMAHIRIYA|434|218|LBY|","LIECHTENSTEIN|438|423|LIE|","LITHUANIA|440|370|LTU|","LUXEMBOURG|442|352|LUX|","MACAO|446|853|MAC|","MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF|807|389|MKD|","MADAGASCAR|450|261|MDG|","MALAWI|454|265|MWI|","MALAYSIA|458|60|MYS|","MALDIVES|462|960|MDV|","MALI|466|223|MLI|","MALTA|470|356|MLT|","MARSHALL ISLANDS|584|692|MHL|","MARTINIQUE|474|596|MTQ|","MAURITANIA|478|222|MRT|","MAURITIUS|480|230|MUS|","MAYOTTE||269||","MEXICO|484|52|MEX|","MICRONESIA, FEDERATED STATES OF|583|691|FSM|","MOLDOVA, REPUBLIC OF|498|373|MDA|","MONACO|492|377|MCO|","MONGOLIA|496|976|MNG|","MONTSERRAT|500|1664|MSR|","MOROCCO|504|212|MAR|","MOZAMBIQUE|508|258|MOZ|","MYANMAR|104|95|MMR|","NAMIBIA|516|264|NAM|","NAURU|520|674|NRU|","NEPAL|524|977|NPL|","NETHERLANDS|528|31|NLD|","NETHERLANDS ANTILLES|530|599|ANT|","NEW CALEDONIA|540|687|NCL|","NEW ZEALAND|554|64|NZL|","NICARAGUA|558|505|NIC|","NIGER|562|227|NER|","NIGERIA|566|234|NGA|","NIUE|570|683|NIU|","NORFOLK ISLAND|574|672|NFK|","NORTHERN MARIANA ISLANDS|580|1670|MNP|","NORWAY|578|47|NOR|","OMAN|512|968|OMN|","PAKISTAN|586|92|PAK|","PALAU|585|680|PLW|","PALESTINIAN TERRITORY, OCCUPIED||970||","PANAMA|591|507|PAN|","PAPUA NEW GUINEA|598|675|PNG|","PARAGUAY|600|595|PRY|","PERU|604|51|PER|","PHILIPPINES|608|63|PHL|","PITCAIRN|612|0|PCN|","POLAND|616|48|POL|","PORTUGAL|620|351|PRT|","PUERTO RICO|630|1787|PRI|","QATAR|634|974|QAT|","REUNION|638|262|REU|","ROMANIA|642|40|ROM|","RUSSIAN FEDERATION|643|70|RUS|","RWANDA|646|250|RWA|","SAINT HELENA|654|290|SHN|","SAINT KITTS AND NEVIS|659|1869|KNA|","SAINT LUCIA|662|1758|LCA|","SAINT PIERRE AND MIQUELON|666|508|SPM|","SAINT VINCENT AND THE GRENADINES|670|1784|VCT|","SAMOA|882|684|WSM|","SAN MARINO|674|378|SMR|","SAO TOME AND PRINCIPE|678|239|STP|","SAUDI ARABIA|682|966|SAU|","SENEGAL|686|221|SEN|","SERBIA AND MONTENEGRO||381||","SEYCHELLES|690|248|SYC|","SIERRA LEONE|694|232|SLE|","SINGAPORE|702|65|SGP|","SLOVAKIA|703|421|SVK|","SLOVENIA|705|386|SVN|","SOLOMON ISLANDS|90|677|SLB|","SOMALIA|706|252|SOM|","SOUTH AFRICA|710|27|ZAF|","SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS||0||","SPAIN|724|34|ESP|","SRI LANKA|144|94|LKA|","SUDAN|736|249|SDN|","SURINAME|740|597|SUR|","SVALBARD AND JAN MAYEN|744|47|SJM|","SWAZILAND|748|268|SWZ|","SWEDEN|752|46|SWE|","SWITZERLAND|756|41|CHE|","SYRIAN ARAB REPUBLIC|760|963|SYR|","TAIWAN, PROVINCE OF CHINA|158|886|TWN|","TAJIKISTAN|762|992|TJK|","TANZANIA, UNITED REPUBLIC OF|834|255|TZA|","THAILAND|764|66|THA|","TIMOR-LESTE||670||","TOGO|768|228|TGO|","TOKELAU|772|690|TKL|","TONGA|776|676|TON|","TRINIDAD AND TOBAGO|780|1868|TTO|","TUNISIA|788|216|TUN|","TURKEY|792|90|TUR|","TURKMENISTAN|795|7370|TKM|","TURKS AND CAICOS ISLANDS|796|1649|TCA|","TUVALU|798|688|TUV|","UGANDA|800|256|UGA|","UKRAINE|804|380|UKR|","UNITED ARAB EMIRATES|784|971|ARE|","UNITED KINGDOM|826|44|GBR|","UNITED STATES|840|1|USA|","UNITED STATES MINOR OUTLYING ISLANDS||1||","URUGUAY|858|598|URY|","UZBEKISTAN|860|998|UZB|","VANUATU|548|678|VUT|","VENEZUELA|862|58|VEN|","VIET NAM|704|84|VNM|","VIRGIN ISLANDS, BRITISH|92|1284|VGB|","VIRGIN ISLANDS, U.S.|850|1340|VIR|","WALLIS AND FUTUNA|876|681|WLF|","WESTERN SAHARA|732|212|ESH|","YEMEN|887|967|YEM|","ZAMBIA|894|260|ZMB|","ZIMBABWE|716|263|ZWE|"];

//autocomplete script
 
	
	
	 $('.autocomplete_txt').autocomplete({
       minLength: 0,
       source: function( request, response ) {
           var array = $.map(multiple, function (item) {
               var code = item.split("|");
               return {
                
                   data : item
               }
           });
           //call the filter here
           response($.ui.autocomplete.filter(array, request.term));
       },
       focus: function() {
      	 // prevent value inserted on focus
      	 return false;
       },
       select: function( event, ui ) {
           var names = ui.item.data.split("|");						
   		 id_arr = $(this).attr('id');
   		 id = id_arr.split("_");
   		 elementId = id[id.length-1];
   	 
       }
   });
	 
	 $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
	 };
 