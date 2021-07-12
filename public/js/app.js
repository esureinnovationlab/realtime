var chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};

function getGx() {
    var x;
    $.get("/readStream.php",function(data) {
            $('#x').val(data.x);
        });
    return $('#x').val();
}

function getGy() {
    var y;
    $.get("/readStream.php",function(data) {
        $('#y').val(data.y);
    });
    return $('#y').val();
}

function getGz() {
    var z;
    $.get("/readStream.php",function(data) {
        $('#z').val(data.z);
    });
    return $('#z').val();
}

var color = Chart.helpers.color;
var configX = {
    type: 'line',
    data: {
        datasets: [{
            label: 'gX',
            backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
            borderColor: chartColors.green,
            fill: false,
            lineTension: 0,
            borderDash: [8, 4],
            data: []
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Axis X acceleration'
        },
        scales: {
            xAxes: [{
                type: 'realtime'
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'value'
                }
            }]
        },
        tooltips: {
            mode: 'nearest',
            intersect: false
        },
        hover: {
            mode: 'nearest',
            intersect: false
        },
        plugins: {
            streaming: {
                duration: 20000,
                refresh: 1000,
                delay: 2000,
                onRefresh: function (chart) {
                    chart.config.data.datasets.forEach(function(dataset) {
                        dataset.data.push({
                            x: Date.now(),
                            y: getGx()
                        });
                    });
                }
            }
        }
    }
};

var configY = {
    type: 'line',
    data: {
        datasets: [{
            label: 'gY',
            backgroundColor: color(chartColors.green).alpha(0.5).rgbString(),
            borderColor: chartColors.blue,
            fill: false,
            lineTension: 0,
            borderDash: [8, 4],
            data: []
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Axis Y acceleration'
        },
        scales: {
            xAxes: [{
                type: 'realtime'
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'value'
                }
            }]
        },
        tooltips: {
            mode: 'nearest',
            intersect: false
        },
        hover: {
            mode: 'nearest',
            intersect: false
        },
        plugins: {
            streaming: {
                duration: 20000,
                refresh: 1000,
                delay: 2000,
                onRefresh: function (chart) {
                    chart.config.data.datasets.forEach(function(dataset) {
                        dataset.data.push({
                            x: Date.now(),
                            y: getGy()
                        });
                    });
                }
            }
        }
    }
};

var configZ = {
    type: 'line',
    data: {
        datasets: [{
            label: 'gZ',
            backgroundColor: color(chartColors.blue).alpha(0.5).rgbString(),
            borderColor: chartColors.red,
            fill: false,
            lineTension: 0,
            borderDash: [8, 4],
            data: []
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Axis Z acceleration'
        },
        scales: {
            xAxes: [{
                type: 'realtime'
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'value'
                }
            }]
        },
        tooltips: {
            mode: 'nearest',
            intersect: false
        },
        hover: {
            mode: 'nearest',
            intersect: false
        },
        plugins: {
            streaming: {
                duration: 20000,
                refresh: 1000,
                delay: 2000,
                onRefresh: function (chart) {
                    chart.config.data.datasets.forEach(function(dataset) {
                        dataset.data.push({
                            x: Date.now(),
                            y: getGz()
                        });
                    });
                }
            }
        }
    }
};

var ctxx = document.getElementById('realChartx').getContext('2d');
window.realChartx = new Chart(ctxx, configX);

var ctxy = document.getElementById('realCharty').getContext('2d');
window.realCharty = new Chart(ctxy, configY);

var ctxz = document.getElementById('realChartz').getContext('2d');
window.realChartz = new Chart(ctxz, configZ);


var configSummaryX = {
    type: 'line',
    data: {
        labels: times,
        datasets: [{
            label: 'gX',
            backgroundColor: window.chartColors.green,
            borderColor: window.chartColors.green,
            data: x,
            fill: false,
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'X axis accelerations'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Time'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'gX'
                }
            }]
        }
    }
};

var configSummaryY = {
    type: 'line',
    data: {
        labels: times,
        datasets: [{
            label: 'gy',
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            data: y,
            fill: false,
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Y axis accelerations'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Time'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'gY'
                }
            }]
        }
    }
};

var configSummaryZ = {
    type: 'line',
    data: {
        labels: times,
        datasets: [{
            label: 'gZ',
            backgroundColor: window.chartColors.red,
            borderColor: window.chartColors.red,
            data: z,
            fill: false,
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Z axis accelerations'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Time'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'gZ'
                }
            }]
        }
    }
};

window.onload = function() {
    var ctxx = document.getElementById('summaryChartx').getContext('2d');
    window.myLinex = new Chart(ctxx, configSummaryX);
    var ctxy = document.getElementById('summaryCharty').getContext('2d');
    window.myLiney = new Chart(ctxy, configSummaryY);
    var ctxz = document.getElementById('summaryChartz').getContext('2d');
    window.myLinez = new Chart(ctxz, configSummaryZ);
};

$(function() {
    setInterval(function(){
        $.get("/summary.php", function (data) {
            $('#minx').html(Number(data.minx).toFixed(3));
            $('#miny').html(Number(data.miny).toFixed(3));
            $('#minz').html(Number(data.minz).toFixed(3));
            $('#maxx').html(Number(data.maxx).toFixed(3));
            $('#maxy').html(Number(data.maxy).toFixed(3));
            $('#maxz').html(Number(data.maxz).toFixed(3));
            $('#avgx').html(Number(data.avgx).toFixed(3));
            $('#avgy').html(Number(data.avgy).toFixed(3));
            $('#avgz').html(Number(data.avgz).toFixed(3));
        });
    }, 1000);

    setInterval(
        function(){
            $.get("/data.php", function (data) {
                configSummaryX.data.datasets.forEach(function(dataset) {
                    dataset.data = data.x;
                });
                configX.data.labels = data.times;
                window.myLinex.update();

                configSummaryY.data.datasets.forEach(function(dataset) {
                    dataset.data = data.y;
                });

                configY.data.labels = data.times;
                window.myLiney.update();

                configSummaryZ.data.datasets.forEach(function(dataset) {
                    dataset.data = data.z;
                });
                configZ.data.labels = data.times;
                window.myLinez.update();
        })
        }
        ,5000);

});