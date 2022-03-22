'use strict';

angular.module('newApp')
  .controller('dynamicCtrl1', ['$scope', function ($scope) {

      $scope.$on('$viewContentLoaded', function () {

          function fnFormatDetails(oTable, nTr) {
              var aData = oTable.fnGetData(nTr);
              var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
              sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
              sOut += `<thead>
              <tr>
                   <th tabindex="0" rowspan="1" colspan="1" style="width: 279px;">
                       Rendering engine
                   </th>
                   <th tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                       Browser
                   </th>
                   <th tabindex="0" rowspan="1" colspan="1" style="width: 322px;">
                       Platform(s)
                   </th>
                   <th tabindex="0" rowspan="1" colspan="1" style="width: 241px;">
                       Engine version
                   </th>
                   <th tabindex="0" rowspan="1" colspan="1" style="width: 171px;">
                       CSS grade
                   </th>
               </tr>
           </thead>
           <tbody role="alert" aria-live="polite" aria-relevant="all">
               <tr class="gradeA odd">
                   <td class="center "></td>
                   <td class=" sorting_1">Gecko</td>
                   <td class=" ">Firefox 1.0</td>
                   <td class=" ">Win 98+ / OSX.2+</td>
                   <td class="center ">1.7</td>
                   <td class="center ">A</td>
               </tr>
               <tr class="gradeA even">
                   <td class="center "></td>
                   <td class=" sorting_1">Gecko</td>
                   <td class=" ">Firefox 3.0</td>
                   <td class=" ">Win 2k+ / OSX.3+</td>
                   <td class="center ">1.9</td>
                   <td class="center ">A</td>
               </tr>
               
           </tbody>`;

              sOut += '</table>';
             
              return sOut;
          }

          /*  Insert a 'details' column to the table  */
          var nCloneTh = document.createElement('th');
          var nCloneTd = document.createElement('td');
          nCloneTd.innerHTML = '<i class="fa fa-plus-square-o"></i>';
          nCloneTd.className = "center";

          $('#table2 thead tr').each(function () {
              this.insertBefore(nCloneTh, this.childNodes[0]);
          });

          $('#table2 tbody tr').each(function () {
              this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
          });

          /*  Initialse DataTables, with no sorting on the 'details' column  */
          var oTable = $('#table2').dataTable({
              destroy: true,
              "aoColumnDefs": [{
                  "bSortable": true,
                  "aTargets": [0]
              }],
              "aaSorting": [
                  [1, 'asc']
              ]
          });

          /*  Add event listener for opening and closing details  */
          $(document).on('click', '#table2 tbody td i', function () {
              var nTr = $(this).parents('tr')[0];
              if (oTable.fnIsOpen(nTr)) {
                  /* This row is already open - close it */
                  $(this).removeClass().addClass('fa fa-plus-square-o');
                  oTable.fnClose(nTr);
              } else {
                  /* Open this row */
                  $(this).removeClass().addClass('fa fa-minus-square-o');
                  oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
              }
          });
      });

      $scope.$on('$destroy', function () {
          $('table').each(function () {
              if ($.fn.dataTable.isDataTable($(this))) {
                  $(this).dataTable({
                      "bDestroy": true
                  }).fnDestroy();
              }
          });
      });

  }]);
