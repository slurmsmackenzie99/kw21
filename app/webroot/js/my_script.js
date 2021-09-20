let doWyslaniaNumerKsiegi = {region:'',
    numer:'',
    numerKontrolny:''};

let doWyslaniaUdzial = {numerUdzialu:'', 
    wielkoscUdzialu:'', 
    rodzajWspolnosci:''};

let doWyslaniaSamorzad = {listaWskazan:'', 
    nazwa:'', 
    siedziba:'', 
    regon:'', 
    nazwaUprawnionego:'',
    siedzibaUprawnionego:'', 
    regonUprawnionego:''};

let doWyslaniaOsoba = {listaWskazan:'', 
    imiePierwsze:'', 
    imieDrugie:'', 
    nazwisko:'', 
    drugiCzlonNazwisko:'',
    imieOjca:'', 
    imieMatki:'',  
    pesel:''};

let doWyslaniaFirma = {listaWskazan:'', 
    nazwa:'', 
    siedziba:'', 
    regon:'', 
    stanPrzejsciowy:'',
    KRS:''};

let doWyslaniaSkarbPanstwa = {listaWskazan:'', 
    nazwa:'', 
    siedziba:'', 
    regon:'', 
    stanPrzejsciowy:'',
    KRS:''};

let all_total = {
    params:[],
    '2.2.1':[],
    '2.2.2':[],
    '2.2.3':[],
    '2.2.4':[],
    '2.2.5':[]};

var pathname = window.location.pathname;
var serializedData;
var dataString = JSON.stringify(all_total); //convert all_total into JSON data, save it into dataString
var idRecord;
var storage;
var global;
var foo;

//Pierwsza strona Ksiąg Wieczystych
if(pathname === "/eukw_prz/KsiegiWieczyste/wyszukiwanieKW"){
    //idRecord setcookie, unset cookie at the end when send
    getInfo();

    sleep(2000)
    .then(() => {
        if(document.getElementById('przyciskWydrukZupelny')){
            clickButton("przyciskWydrukZupelny");
        }
      })
}
console.log("Im here");
//scrap all the info and send it
if(pathname === "/eukw_prz/KsiegiWieczyste/pokazWydruk"){
    if($("table:contains('DZIAŁ II - WŁASNOŚĆ')").length == 0){
        $('input[value="Dział II"]').click();
    }else{
                    getNumerKsiegi();
                    getUdzial();
                    getOsobaFizyczna();
                    getFirma();
                    getSkarbPanstwa();
                    
                    serializedData = all_total;
                    idRecord = JSON.stringify(idRecord);
                    foo = localStorage.getItem('getrecord_id');
                    sendit();
    }
       
}

function getInfo(){

    var apiPath = 'https://kw21.g12.pw/getrecords/api';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', apiPath, true); //initializes newly-created request

    xhr.onerror = function(){
        alert('Problem with the server.');
        exit; ExtensionScriptApis();
    }

    //called whenever the readyState attribute changes
    xhr.onreadystatechange = function() {

        if (this.readyState !== 4) return; // not 4 === DONE
        if (this.status !== 200) return; // not "OK"
        if (xhr.readyState == 4) {
            varxhrjson = JSON.parse(xhr.responseText);

            temp = varxhrjson[0];
            first = true;
            varxhrjson.forEach((element) => {
              if (first && element["done"] == "0") {
                temp = element;
                first = false;
              }
            });

            if (first) {
                return; //purpose?
            }

            idRecord = temp["id"];
            localStorage.setItem("getrecord_id", idRecord);

            number = temp["number"];
            
            document.getElementById('kodWydzialuInput').value = temp["region"];
            listKod = document.getElementById('kodWydzialu').value = temp["region"];
            document.getElementById('kodWydzialuInput').value = temp["region"];
            document.getElementById('kodWydzialuInput').blur();
            document.getElementById('numerKsiegiWieczystej').value = temp["number"];
            document.getElementById('cyfraKontrolna').value = temp["control_number"];
            clickButton("wyszukaj");
        }
    };
    xhr.send();   
}

function sendit(){
    var sendit_var = {serializedData: serializedData,
            idrecord: foo};
    $.ajax({
        headers:{"Content-Type": "text/plain"},
        url: 'https://kw21.g12.pw/getrecords/receiver',
        // data: sendit_var,
       data: JSON.stringify(sendit_var),
        method: 'POST'
    }).done(function(data) {
        if (console && console.log) {
        }
    });
}

function getNumerKsiegi(){
    var numerKW = $('#numerKw').attr('value'); //string
    var kodEci = $('#kodEci').attr('value'); //string
    var cyfraK = $('#cyfraKontrolna').attr('value'); //string

    let all = {...doWyslaniaNumerKsiegi};
    all["region"] = kodEci;
    all["numer"] = numerKW;
    all["numerKontrolny"] = cyfraK;

    console.log(all);
    all_total.params = all;

    console.log(all_total);    
}

function getSkarbPanstwa(){
    var rows = $("table:contains('2.2.2')").find('tr').slice(4);

    //create empty Object to hold all the Firma data
    let all = [];

    //check if the record isn't empty
    if(rows.length>2){
        //display rows to see which ones are selected
        console.log(rows);
        console.log("SKARB PANSTWA");

        //get one skarb row
        rowCut = rows.length/6;
        //length is 6
        for (let i = 0; i < rowCut; i++) {
            oneCompanyRows = rows.slice(i*6,i*6+6);

            //empty temporary object to fill with skarb panstwa info
            temp_arr = [];

            //iterate over on onePersonRows and input info into it
            $.each(oneCompanyRows, function(index, value){
                if(index==0){
                    temp_arr.push(value.cells[5].innerText)
                }else{
                    temp_arr.push(value.cells[4].innerText);
                }        
            })

            //object to store company's info 
            let oneCompany = {...doWyslaniaFirma};

            var j = 0;
            for (const key in oneCompany) {
                oneCompany[key] = temp_arr[j++];
            }
            all.push(oneCompany)
        }
        //display all the Firma data as key=>value
        console.log(all);
        all_total['2.2.2'] = all;

        console.log(all_total);

    }else{
        console.log("Brak wpisu na Skarb Państwa");
    }
}

function getUdzial(){
    var rows = $("table:contains('2.2.1')").find('tr').slice(6);

    //create empty Object to hold all the Udzial data
    let all = [];

    //check if the record isn't empty
    if(rows.length>2){
        //display rows to see which ones are selected
        console.log(rows);
        console.log("UDZIAŁ");

        //get one person row
        rowCut = rows.length/3;
        
        for (let i = 0; i < rowCut; i++) {
            oneUdzialRows = rows.slice(i*3,i*3+3);

            //empty temporary object to fill with Udzial info
            temp_arr = [];

            //iterate over on oneUdzialRows and input info into it
            $.each(oneUdzialRows, function(index, value){
                if(index==0){
                    temp_arr.push(value.cells[5].innerText)
                }else{
                    temp_arr.push(value.cells[4].innerText);
                }        
            })

            //object to store company's info 
            //it was already declared
            let oneUdzial = {...doWyslaniaUdzial};

            var j = 0;
            for (const key in oneUdzial) {
                oneUdzial[key] = temp_arr[j++];
            }
            all.push(oneUdzial)
        }
        //display all the Firma data as key=>value
        console.log(all);
        all_total['2.2.1'] = all;

        console.log(all_total);

    }else{
        console.log("Brak wpisu na udzial");
    }
}

function getFirma(){
    var rows = $("table:contains('2.2.4')").find('tr').slice(4);

    //create empty Object to hold all the Firma data
    let all = [];

    //check if the record isn't empty
    if(rows.length>2){
        //display rows to see which ones are selected
        console.log(rows);
        console.log("FIRMA");

        //get one person row
        rowCut = rows.length/6;
        //length is 6
        for (let i = 0; i < rowCut; i++) {
            oneCompanyRows = rows.slice(i*6,i*6+6);

            //empty temporary object to fill with company's info
            temp_arr = [];

            //iterate over on oneCompanyRows and input info into it
            $.each(oneCompanyRows, function(index, value){
                if(index==0){
                    temp_arr.push(value.cells[5].innerText)
                }else{
                    temp_arr.push(value.cells[4].innerText);
                }        
            })

            //object to store company's info 
            let oneCompany = {...doWyslaniaFirma};

            var j = 0;
            for (const key in oneCompany) {
                oneCompany[key] = temp_arr[j++];
            }
            all.push(oneCompany)
        }
        //display all the Firma data as key=>value
        console.log(all);
        all_total['2.2.4'] = all;

        console.log(all_total);

    }else{
        console.log("Brak wpisu na firme");
    }
}

function getOsobaFizyczna(){
    var rows = $("table:contains('2.2.5')").find('tr').slice(4);

    //create empty Object to hold all the Osoba fizyczna data
    let all = [];

    if(rows.length>2){
        //display rows to see which ones are selected
        console.log(rows);
        console.log("OSOBA FIZYCZNA");

        //get one person row
        rowCut = rows.length/8;
        for (let i = 0; i < rowCut; i++) {
            onePersonRows = rows.slice(i*8,i*8+8);

            //empty temporary object to fill with persons' info
            temp_arr = [];

            //iterate over on onePersonRows and input info into it
            $.each(onePersonRows, function(index, value){
                if(index==0){
                    temp_arr.push(value.cells[5].innerText)
                }else{
                    temp_arr.push(value.cells[4].innerText);
                }        
            })

            //object to store person's info 
            let onePerson = {...doWyslaniaOsoba};

            var j = 0;
            for (const key in onePerson) {
                onePerson[key] = temp_arr[j++];
            }
            all.push(onePerson)
        }
        //display all the Osoba fizyczna data as key=>value
        console.log(all);
        all_total['2.2.5'] = all;

        console.log(all_total);

    }else{
        console.log("Brak wpisu na osobę fizyczną");
    }
}

chrome.runtime.onMessage.addListener((msg, sender, response) => {
    // First, validate the message's structure.
    if ((msg.from === 'popup') && (msg.subject === 'DOMInfo')) {

      //this is my info
      var domInfo = {info:dataString};
  
      // Directly respond to the sender (popup), 
      // through the specified callback.
      response(domInfo);
    }
  });

function clickButton(name) {
    document.getElementById(name).click();
}

function wait(ms) {
    var start = new Date().getTime();
    var end = start;
    while (end < start + ms) {
      end = new Date().getTime();
    }
}
  
function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}

//sprawdza czy można ze strony pobrać region, numer, numer kontrolny
function check(){
    if(jQuery.isEmptyObject(all_total['2'])){
        console.log("Object empty. Don't send");
    } else if(jQuery.isEmptyObject(all_total['2']) === false){
        console.log("Object not empty. Send");
        scan();
    }
}