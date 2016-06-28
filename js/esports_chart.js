/**
 * Created by stiwo on 28-Jun-16.
 */
var ctx = document.getElementById("esports").getContext("2d");
var data = {

    labels: ["2011", "2012", "2013", "2014", "2015"],
    datasets: [
        {
            label: "Spettatori Superbowl NFL",
            fillColor: "rgba(112,5,233,0.2)",
            strokeColor: "rgba(112,5,233,1)",
            pointColor: "rgba(112,5,233,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(112,5,233,1)",
            data: [111000000, 111300000, 108700000, 111500000, 112200000]
        },
        {
            label: "Spettatori Finale NBA (in meadia)",
            fillColor: "rgba(50,147,194,0.2)",
            strokeColor: "rgba(50,147,194,1)",
            pointColor: "rgba(50,147,194,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(50,147,194,1)",
            data: [17300000, 16900000, 17700000, 15500000, 19900000]
        },
        {
            label: "Spettatori Finale Campionato di LoL",
            fillColor: "rgba(253,169,0,0.2)",
            strokeColor: "rgba(253,169,0,1)",
            pointColor: "rgba(253,169,0,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(253,169,0,1)",
            data: [1600000, 8000000, 32000000, 27000000, 36000000]
        }
    ]
};
var esports = new Chart(ctx).Line(data);
/*
 items : [
 {
 selector : "#esportsChart",
 type : "line",
 data : {

 labels: ["2011", "2012", "2013", "2014", "2015"],
 datasets: [
 {
 label: "Spettatori Superbowl NFL",
 fillColor: "rgba(112,5,233,0.2)",
 strokeColor: "rgba(112,5,233,1)",
 pointColor: "rgba(112,5,233,1)",
 pointStrokeColor: "#fff",
 pointHighlightFill: "#fff",
 pointHighlightStroke: "rgba(112,5,233,1)",
 data: [111000000, 111300000, 108700000, 111500000, 112200000]
 },
 {
 label: "Spettatori Finale NBA (in meadia)",
 fillColor: "rgba(50,147,194,0.2)",
 strokeColor: "rgba(50,147,194,1)",
 pointColor: "rgba(50,147,194,1)",
 pointStrokeColor: "#fff",
 pointHighlightFill: "#fff",
 pointHighlightStroke: "rgba(50,147,194,1)",
 data: [17300000, 16900000, 17700000, 15500000, 19900000]
 },
 {
 label: "Spettatori Finale Campionato di LoL",
 fillColor: "rgba(253,169,0,0.2)",
 strokeColor: "rgba(253,169,0,1)",
 pointColor: "rgba(253,169,0,1)",
 pointStrokeColor: "#fff",
 pointHighlightFill: "#fff",
 pointHighlightStroke: "rgba(253,169,0,1)",
 data: [1600000, 8000000, 32000000, 27000000, 36000000]
 }
 ]
 },
 options : {
 responsive:true
 }
 }
 ]
 */