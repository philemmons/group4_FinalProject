//https://api.themoviedb.org/3/person/{person_id}?api_key=<<api_key>>&language=en-US
//data.popularity

//var rating = 0;//numerical
var rating ="";//literal
var person = "";
var count = 0;
var ratingSum = 0;

//var myAPI = process.env.SOME_VAR;
//could store these in a database and call the db.....
var a = "540de08";
var b = "8224c98";
var c = "930553e";
var d = "46419db";
var last = "f3fb";
var myAPI = a+b+c+d+last;


$('span').each(function () {
    person = $(this).text();
    if( person !== ''){
         getData(person);
         count++;
    }
})  

function getData(person){
    $.ajax({
        type: "GET",
        url: "https://api.themoviedb.org/3/search/person",
        //    url: "https://api.themoviedb.org/3/search/person?api_key=540de088224c98930553e46419dbf3fb&query='George Lucas",
        async: false,
        dataType: "json",//or jsonp
        data: { "api_key" : myAPI ,
                //"api_key" : "540de088224c98930553e46419dbf3fb",
                "query": person,
        },
        success: function(data, status) {
            //alert('success');
            if(!data)
                //rating += 0;
                rating += 0 + '<br>';
            else
                //rating += data.results[0].popularity;
                rating += data.results[0].popularity +'<br>';
                ratingSum += data.results[0].popularity
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert('status: ' + status);
        }
    }); //AJAX
}
//what is popularity out of --> for now saying out of 45
//insert into id="percentage"
//(sum) / (45* count) * 100
//document.getElementById('percentage').innerHTML += (rating/count) *1.25;/// SEMICOLON HELL!!!!
alert(rating);
alert(ratingSum);
document.getElementById('individRating').innerHTML = rating;/// SEMICOLON HELL!!!!
document.getElementById('overall').innerHTML = ((ratingSum/(45*count))*100);
