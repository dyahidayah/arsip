$(document).ready(function () {
    //grafik pwj
    var base = $('#base_url').data('id')
    var bulan = $('#select_bulan').val()
    var tahun = $('#select_tahun').val()

    //first load
    $.ajax({
        type: "post",
        url: base + "dashboard/grafikPWJ/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            
            var options = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                    {
                        name: "FRMSB ACT: ",
                        data: response['act_frmsb']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    // curve: 'straight',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#ffc107'],
                dataLabels: {
                    enabled: true,
                    // formatter: function (val, opt) {
                    //     return parseFloat(val).toFixed(3)
                    // },
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }
    });

    //grafik F1
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/F1/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            
            var optionsf1 = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                    {
                        name: "FRMSB ACT: ",
                        data: response['act_frmsb']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#ffc107'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    // logBase: 10,
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartf1"), optionsf1);
            chart.render();
        }
    });

    //grafik F2
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/F2/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            var optionsf2 = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#334756'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartf2"), optionsf2);
            chart.render();
        }
    });

    //grafik F3
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/F3/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            var optionsf3 = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#334756'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartf3"), optionsf3);
            chart.render();
        }
    });

    //grafik F4
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/F4/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            var optionsf4 = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#334756'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartf4"), optionsf4);
            chart.render();
        }
    });

    //grafik F5
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/F5/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            var optionsf5 = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#334756'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartf5"), optionsf5);
            chart.render();
        }
    });

    //grafik F6
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/F6/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            var optionsf6 = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#334756'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartf6"), optionsf6);
            chart.render();
        }
    });

    //grafik SF
    $.ajax({
        type: "get",
        url: base + "dashboard/grafikGedung/SF/" + bulan + '/' + tahun,
        dataType: "json",
        success: function (response) {
            var optionssf = {
                series: [{
                        name: "CTA ACT: ",
                        data: response['act_eff']
                    },
                    {
                        name: "CTA TGT: ",
                        data: response['target_eff']
                    },
                ],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: 'smooth',
                    dashArray: [0, 0, 0]
                },
                colors: ['#57CC99', '#3DB2FF', '#334756'],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    tooltipHoverFormatter: function (val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min:50,
                    max:90,
                    labels: {
                        show: true,
                        minWidth: 0,
                        maxWidth: 160,
                        style: {
                            colors: [],
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 500,
                            cssClass: 'apexcharts-yaxis-label',
                        },
                        formatter: (value) => {
                            return value
                        },
                    },
                },
                xaxis: {
                    categories: response['tanggal'],
                },
                tooltip: {
                    y: [{
                            formatter: function (value, series) {
                                return series.series[0][series.dataPointIndex] + " %"
                            }
                        },
                        {
                            formatter: function (value, series) {
                                return series.series[1][series.dataPointIndex] + " %"
                            }
                        },
                        // {
                        //     formatter: function (value, series) {
                        //         return parseFloat(series.series[2][series.dataPointIndex]).toFixed(3) + " pairs"
                        //     }
                        // }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartsf"), optionssf);
            chart.render();
        }
    });

    // change select
    $('#select_bulan').change(function (e) {
        let bulan = $(this).val()
        let tahun = $('#select_tahun').val()
        if (bulan != "" && tahun != "") {
            location.href = base + "dashboard/filter/" + bulan + "/" + tahun
        }
    });
    $('#select_tahun').change(function (e) {
        let tahun = $(this).val()
        let bulan = $('#select_bulan').val()
        if (bulan != "" && tahun != "") {
            location.href = base + "dashboard/filter/" + bulan + "/" + tahun
        }
    });
});

function inputBaseline(gedung) {
    let base = $('#base_url').data('id');
    let bulan = $('#select_bulan').val();
    let tahun = $('#select_tahun').val();
    $('#id_mtd').val("");
    $('#ie_target').val("");
    $('#mtd').val("");
    $('#text-id-data').text("-");
    $.ajax({
        type: "post",
        url: `${base}/admin/getBaseline`,
        data: {
            'gedung': gedung,
            'bulan': bulan,
            'tahun': tahun
        },
        dataType: "json",
        success: function (data) {
            $('#gedungBaseline').val(gedung);
            $('#bulanBaseline').val(bulan);
            $('#tahunBaseline').val(tahun);
            if (data) {
                $('#text-id-data').text(data.id_target);
                $('#id_mtd').val(data.id_target);
                $('#ie_target').val(data.ie_target);
                $('#mtd').val(data.mtd);
                $('#frmsb').val(data.frmsb);
            }
            $('#modalBaseline').modal('show');
        },
        error: function (err) {
            console.log(err);
        }
    });
}