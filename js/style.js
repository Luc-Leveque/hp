AmCharts.useUTC = true;
var chart = AmCharts.makeChart( "chartdiv", {
    "type": "gantt",
    "theme": "light",
    "marginRight": 40,
    "period": "hh",
    "dataDateFormat":"YYYY-MM-DD",
    "balloonDateFormat": "JJ:NN",
    "columnWidth": 0.25,
    "valueAxis": {
        "type": "date",
        "minimum": 7,
        "maximum": 31,
        "fontSize": 10,
        "titleFontSize":18
    },
  "balloon": {
    "adjustBorderColor": true,
    "borderThickness":2,
    "shadowAlpha":0,
    "color": "#353535",
    "cornerRadius": 3,
    "fillColor": "#FFFFFF"
  },
  "categoryAxis": {
    "fontSize": 10,
    "fillColor":"#ededed"
  },
    "brightnessStep": 10,
    "graph": {
        "fillAlphas": 1,
        "balloonText": "<b>[[task]]</b><br/>開始：[[open]]<br/>期限：[[value]]"
    },
    "rotate": true,
    "categoryField": "category",
    "segmentsField": "segments",
    "colorField": "color",
    "startDate": "2015-01-01",
    "startField": "start",
    "endField": "end",
    "durationField": "duration",
    "dataProvider": [ {
        "category": "プロジェクト名1",
        "segments": [ {
            "start": 7,
            "duration": 2,
            "color": "#55c4f5",
            "task": "タスク名 #1"
        }, {
            "duration": 2,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "duration": 2,
            "color": "#259e39",
            "task": "タスク名 #3"
        } ]
    }, {
        "category": "プロジェクト名2",
        "segments": [ {
            "start": 10,
            "duration": 2,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "duration": 1,
            "color": "#259e39",
            "task": "タスク名 #3"
        }, {
            "duration": 4,
            "color": "#55c4f5",
            "task": "タスク名 #1"
        } ]
    }, {
        "category": "プロジェクト名3",
        "segments": [ {
            "start": 12,
            "duration": 2,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "start": 16,
            "duration": 2,
            "color": "#FFE4C4",
            "task": "タスク名 #4"
        } ]
    }, {
        "category": "プロジェクト名4",
        "segments": [ {
            "start": 9,
            "duration": 6,
            "color": "#55c4f5",
            "task": "タスク名 #1"
        }, {
            "duration": 4,
            "color": "#fed230",
            "task": "タスク名 #2"
        } ]
    }, {
        "category": "プロジェクト名5",
        "segments": [ {
            "start": 8,
            "duration": 1,
            "color": "#259e39",
            "task": "タスク名 #3"
        }, {
            "duration": 4,
            "color": "#55c4f5",
            "task": "タスク名 #1"
        } ]
    }, {
        "category": "プロジェクト名6",
        "segments": [ {
            "start": 15,
            "duration": 3,
            "color": "#fed230",
            "task": "タスク名 #2"
        } ]
    }, {
        "category": "プロジェクト名7",
        "segments": [ {
            "start": 9,
            "duration": 2,
            "color": "#55c4f5",
            "task": "タスク名 #1"
        }, {
            "duration": 1,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "duration": 8,
            "color": "#259e39",
            "task": "タスク名 #3"
        } ]
    }, {
        "category": "プロジェクト名8",
        "segments": [ {
            "start": 9,
            "duration": 8,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "duration": 7,
            "color": "#259e39",
            "task": "タスク名 #3"
        } ]
    }, {
        "category": "プロジェクト名9",
        "segments": [ {
            "start": 11,
            "duration": 8,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "start": 16,
            "duration": 2,
            "color": "#FFE4C4",
            "task": "タスク名 #4"
        } ]
    }, {
        "category": "プロジェクト名10",
        "segments": [ {
            "start": 9,
            "duration": 4,
            "color": "#55c4f5",
            "task": "タスク名 #1"
        }, {
            "duration": 3,
            "color": "#fed230",
            "task": "タスク名 #2"
        }, {
            "duration": 5,
            "color": "#259e39",
            "task": "タスク名 #3"
        } ]
    } ],
    "valueScrollbar": {
        "autoGridCount":true
    },
    "chartCursor": {
        "cursorColor":"#55bb76",
        "valueBalloonsEnabled": false,
        "cursorAlpha": 0,
        "valueLineAlpha":0.5,
        "valueLineBalloonEnabled": true,
        "valueLineEnabled": true,
        "zoomable":false,
        "valueZoomable":true
    },
    "export": {
        "enabled": true
     }
} );