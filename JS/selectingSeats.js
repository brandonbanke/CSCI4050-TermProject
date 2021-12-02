// var limit = 3;
// $('input.seat').on('change', function(evt) {
//    if($(this).siblings('not(:checked)').length >= limit) {
//        this.checked = false;
//    }
// });

var adultCount = 0;
var childCount = 0;
var seniorCount = 0;
var ticketNumber = 0;

function addAdult(){
    adultCount++;
    div = document.getElementById('displayAdult');
    div.innerHTML = '<p class="text">'+adultCount+'</p>'
}
function subAdult(){
    if (adultCount != 0) {
        adultCount--;
    }
    div = document.getElementById('displayAdult');
    div.innerHTML = '<p class="text">'+adultCount+'</p>'
}
function addChild(){
    childCount++;
    div = document.getElementById('displayChild');
    div.innerHTML = '<p class="text">'+childCount+'</p>'
}
function subChild(){
    if (childCount != 0) {
        childCount--;
    }
    div = document.getElementById('displayChild');
    div.innerHTML = '<p class="text">'+childCount+'</p>'
}
function addSenior(){
    seniorCount++;
    div = document.getElementById('displaySenior');
    div.innerHTML = '<p class="text">'+seniorCount+'</p>'
}
function subSenior(){
    if (seniorCount != 0) {
        seniorCount--;
    }
    div = document.getElementById('displaySenior');
    div.innerHTML = '<p class="text">'+seniorCount+'</p>'
}

function ticketNum() {
    ticketNumber = adultCount + childCount + seniorCount;
    localStorage.setItem("ticketNumber",ticketNumber);
}

function getAdultCount() {
    sessionStorage.setItem("adultNumber",adultCount);
    var x = sessionStorage.getItem("adultNumber");
    document.getElementById("test").innerHTML = x;
}