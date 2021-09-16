'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
  .controller('dashboardCtrl', ['$scope','chartFinanceService', 'dashboardService', 'pluginsService', function ($scope, chartFinanceService, dashboardService, pluginsService) {
      $scope.$on('$viewContentLoaded', function () {
          /**** USA Map ****/
         var map = AmCharts.makeChart("usa-map", {
            type: "map",
            theme: "dark",
            colorSteps: 10,
           
            dataProvider: {
                "map": "ecuadorLow",
                "areas": [{
                    "id": "EC-A",
                    "value": 5130632
                }, {
                    "id": "EC-B",
                    "value": 626932
                }, {
                    "id": "EC-C",
                    "value": 5130632
                }, {
                    "id": "EC-D",
                    "value": 2673400
                }, {
                    "id": "EC-F",
                    "value":  2673400
               }, {
                   "id": "EC-E",
                   "value": 2844658
               }, {
                   "id": "EC-G",
                   "value": 4301261
                }, {
                    "id": "EC-H",
                    "value": 3405565
                }, {
                    "id": "EC-I",
                    "value": 783600
                }, {
                    "id": "EC-J",
                    "value": 15982378
                }, {
                    "id": "EC-K",
                    "value": 8186453
                }, {
                    "id": "EC-L",
                    "value": 1211537
                }, {
                    "id": "EC-M",
                    "value": 1293953
                }, {
                   "id": "EC-N",
                   "value": 1293953
                }, {
                    "id": "EC-O",
                    "value": 6080485
                }, {
                    "id": "EC-P",
                    "value": 6080485
                }, {
                    "id": "EC-Q",
                    "value": 2926324
                }, {
                    "id": "EC-R",
                    "value": 2688418
                }, {
                    "id": "EC-S",
                    "value": 4041769
                }, {
                    "id": "EC-T",
                    "value": 4468976
                }, {
                    "id": "EC-U",
                    "value": 1274923
                }, {
                    "id": "EC-V",
                    "value": 5296486
                }, {
                    "id": "EC-X",
                    "value":  5296486
                }, {
                    "id": "EC-Y",
                    "value": 4919479
                }, {
                    "id": "EC-Z",
                    "value": 2844658
                
               }, {
                   "id": "EC-SE",
                   "value": 2844658
               
               }, {
                   "id": "EC-SD",
                   "value": 2844658
                   
               
               }
               ]
            },
            
            areasSettings: {
                "autoZoom": false,
                "selectable": true
            },
            zoomControl: {
                "homeButtonEnabled": true,
                "top": 30,
                "minZoomLevel": 0.5,
            },
            listeners: [{
                "event": "clickMapObject",
                "method": function(ev) {
                    console.log("something happened ", ev.mapObject.title)
                    //location.href = "#principal";
                    $('#cont1').load('./dashboard/principal.php', {var1:ev.mapObject.title});
                    
                }
              }]

        });
        console.log("dasd");
          chartFinanceService.init();
          dashboardService.init();
          pluginsService.init();
          dashboardService.setHeights()
          if ($('.widget-weather').length) {
              widgetWeather();
          }
          handleTodoList();
          function editableTable() {

            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }
                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<div class="text-right"><a class="edit btn btn-sm btn-success" href="">Save</a> <a class="delete btn btn-sm btn-danger" href=""><i class="icons-office-52"></i></a></div>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<div class="text-right"><a class="edit btn btn-sm btn-default" href=""><i class="icon-note"></i></a> <a class="delete btn btn-sm btn-danger" href=""><i class="icons-office-52"></i></a></div>', nRow, 4, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit btn btn-sm btn-default" href=""><i class="icon-note"></i></a>', nRow, 4, false);
                oTable.fnDraw();
            }

            var oTable = $('#table-editable').dataTable({
                "bDestroy": true,
                "aLengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"] // change per page values here
                ],
                "sDom": "<'row'<'col-md-6 filter-left'l><'col-md-3'f><'col-md-6'T>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "bPaginate ": true,
                "autoWidth": true,
                "searching": true,
                "select":true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                "oTableTools": {
                    "sSwfPath": "../../../assets/global/plugins/datatables/swf/copy_csv_xls_pdf.swf",
                    "aButtons": [
                        {
                            "sExtends": "pdf",
                            "mColumns": [0, 1, 2, 3],
                            "sPdfOrientation": "landscape"
                        },
                        {
                            "sExtends": "print",
                            "mColumns": [0, 1, 2, 3],
                            "sPdfOrientation": "landscape"
                        }, {
                            "sExtends": "xls",
                            "mColumns": [0, 1, 2, 3],
                            "sPdfOrientation": "landscape"
                        }, {
                            "sExtends": "csv",
                            "mColumns": [0, 1, 2, 3],
                            "sPdfOrientation": "landscape"
                        }
                    ]
                }
            });

            jQuery('#table-edit_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#table-edit_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#table-edit_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<p class="text-center"><a class="edit btn btn-dark" href=""><i class="fa fa-pencil-square-o"></i>Edit</a> <a class="delete btn btn-danger" href=""><i class="fa fa-times-circle"></i> Remove</a></p>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#table-editable a.delete').on('click', function (e) {
                e.preventDefault();
                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
                // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#table-editable a.cancel').on('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#table-editable a.edit').on('click', function (e) {
                e.preventDefault();
                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* This row is being edited and should be saved */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    // alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No row currently being edited */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });

            $('.dataTables_filter input').attr("placeholder", "Search a user...");

        };

        editableTable();  
      });
      
      $scope.$on('$destroy', function () {
        $ ('table').each(function () {
             if ($.fn.dataTable.isDataTable($(this))) {
               $(this).dataTable({
                   "bDestroy": true
               }).fnDestroy();
               $(this).DataTable().destroy;
             }
         });
     });
  }]);
