/**
 * ログのグラフ表示(chart.js使ってます)
 * @param {array} label - キー
 * @param {array} value - 値
 */

export function texchart(label=null, value=null, datalabel=null) {

  const ctx = document.getElementById("myChart");
  const setdata = {
    labels: label || ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [{
      label: datalabel || "閲覧履歴",
      borderColor: "rgba(75,192,192,1)",
      pointBorderColor: "rgba(75,192,192,1)",
      data: value || [1, 1, 1, 1, 1, 1, 1],
    }]
  }
  const options = {
    scales: {
      yAxes: [{ticks: {beginAtZero:true}}]
    },
     animation : true,
  }
  let myChart = new Chart(ctx, {
    type: 'line',
    data: setdata,
    options: options,
    animationSteps: 1000,
  });

  console.log("texchart");
}