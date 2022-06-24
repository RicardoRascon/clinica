var TableAdvanced = function () {

    var initTable_prods = function () {
        var table = $('#sample_prods');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [1, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "columnDefs": [
                {"targets": [ 2 ], "orderable": false},
                {"targets": [ 9 ], "visible": false},
            
                
             
          
                {"targets": [9], "orderable": false}
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {


            var aData = oTable.fnGetData(nTr);

            //alert (aData[8]);

            var sOut = '<table width="100%">';
            sOut += '<tr><td width="8%" style="font-weight:bold; text-align:right;  font-size: 15px;"><img src="php/img/sac_logo.png" alt="Logo Sustpes"  ></td><td width="85%">' + aData[9] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }


var initTable_auditoria = function () {

        var table_audit = $('#sample_auditoria');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var atable = table_audit.dataTable({
           "order": [

   
               
            ],
            
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
           
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        }); 
     
    }



var initTable_ind_ed = function () {

        var table = $('#sample_ind_ed');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var atable = table.dataTable({
           "order": [

   
               
            ],
            
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
           
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        }); 
     
    }



 var initTable_ED = function () {
 var table = $('#sample_ED');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
        
            "order": [
                [5, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "columnDefs": [
                {"targets": [ 5 ], "orderable": false}

              


                 
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {


            var aData = oTable.fnGetData(nTr);

            //alert (aData[8]);

            var sOut = '<table width="100%">';
            sOut += '<tr><td width="8%" style="font-weight:bold; text-align:right;  font-size: 15px;"><img src="php/img/sac_logo.png" alt="Logo Sustpes"  ></td><td width="85%">' + aData[8] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }

    var initTable_perfil = function () {
        var table = $('#sample_perfil');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            "bLengthChange": false,
            bFilter: false,
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 0 ], "visible": true},
                {"targets": [ 0 ], "visible": false},
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        
      
        
     
    }


    var initTable_debilidades = function () {
        var table = $('#sample_debilidades');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            "bLengthChange": false,
            bFilter: false,
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 0 ], "visible": true},
                {"targets": [ 0 ], "visible": false},
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        
      
        
     
    }

    var initTable_amenazas = function () {
        var table = $('#sample_amenazas');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            "bLengthChange": false,
            bFilter: false,
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 0 ], "visible": true},
                {"targets": [ 0 ], "visible": false},
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
     
    }


     var initTable_fortalezas = function () {
        var table = $('#sample_fortalezas');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            "bLengthChange": false,
            bFilter: false,
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 0 ], "visible": true},
                {"targets": [ 0 ], "visible": false},
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
     
    }


        var initTable_oportunidades = function () {
        var table = $('#sample_oportunidades');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            "bLengthChange": false,
            bFilter: false,
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 0 ], "visible": true},
                {"targets": [ 0 ], "visible": false},
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
     
    }





    var initTable_debes = function () {
        var table = $('#sample_debes');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default disabled",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [{"targets": [ 1 ], "orderable": true}
                
            ],

                  "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });


        
        
    }


          var initTable_prods3 = function () {
        var table = $('#sample_prods3');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
       
    }


  


          var initTable_smed = function () {
        var table = $('#sample_smed');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
           
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {


            var aData = oTable.fnGetData(nTr);

            //alert (aData[8]);

            var sOut = '<table width="100%">';
            sOut += '<tr><td width="8%" style="font-weight:bold; text-align:right;  font-size: 15px;"><img src="php/img/sac_logo.png" alt="Logo Sustpes"  ></td><td width="85%">' + aData[6] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }


       var initTable_prods4 = function () {
        var table = $('#sample_prods4');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [8, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "columnDefs": [
                {"targets": [0], "orderable": false},
                {"targets": [10], "visible": false},
                {"targets": [9], "orderable": false}
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {


            var aData = oTable.fnGetData(nTr);

            //alert (aData[8]);

            var sOut = '<table width="100%">';
            sOut += '<tr><td width="8%" style="font-weight:bold; text-align:right;  font-size: 15px;"><img src="php/img/sac_logo.png" alt="Logo Sustpes"  ></td><td width="85%">' + aData[10] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }






var initTable_reporte = function () {
        var table = $('#sample_reporte2');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [1, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
       
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {


            var aData = oTable.fnGetData(nTr);

            //alert (aData[8]);

            var sOut = '<table width="100%">';
            sOut += '<tr><td width="8%" style="font-weight:bold; text-align:right;  font-size: 15px;"><img src="php/img/sac_logo.png" alt="Logo Sustpes"  ></td><td width="85%">' + aData[8] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }




    var initTable_eventos = function () {
 var table = $('#sample_eventos');
     
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
        
            "order": [
                [5, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false}

              


                 
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {


            var aData = oTable.fnGetData(nTr);

            //alert (aData[8]);

            var sOut = '<table width="100%">';
            sOut += '<tr><td width="8%" style="font-weight:bold; text-align:right;  font-size: 15px;"><img src="php/img/sac_logo.png" alt="Logo Sustpes"  ></td><td width="85%">' + aData[8] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }



	
	var initTable_pkits = function () {
        var table = $('#sample_prods');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [1, 'asc']
            ],
            "bLengthChange": false,
            bFilter: false,
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 3 ], "visible": false},
                {"targets": [ 4 ], "visible": false},
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table width="100%">';
            sOut += '<tr><td width="15%" style="font-weight:bold; text-align:right;">Clave Prod:</td><td width="85%">' + aData[3] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Descripcion:</td><td>' + aData[4] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }

    var initTable_AddProd = function () {
        var table = $('#sample_AddProd');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "bLengthChange": false,
            bFilter: false,
            "pageLength": 4,
            //"dom": '<"top"i>rt<"bottom"flp><"clear">',
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                //{"targets": [ 9 ], "visible": false}
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    }

    var initTable_proveedores = function () {
        var table = $('#sample_proveedores');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [1, 'asc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }/*, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTR+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }*/]
            },
            
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                //{"targets": [ 7 ], "visible": false},
                {"targets": [ 8 ], "visible": false},
                {"targets": [ 9 ], "visible": false},
                {"targets": [ 10 ], "visible": false},
                {"targets": [ 11 ], "visible": false},
                {"targets": [ 12 ], "visible": false},
                {"targets": [ 13 ], "visible": false},
                {"targets": [ 14 ], "visible": false},
                {"targets": [ 15 ], "visible": false},
                {"targets": [ 16 ], "visible": false},
                {"targets": [ 17 ], "visible": false},
                {"targets": [ 18 ], "visible": false},
                {"targets": [ 19 ], "visible": false},
                {"targets": [ 20 ], "visible": false},
                {"targets": [ 21 ], "visible": false},
                {"targets": [ 22 ], "visible": false},
                {"targets": [ 23 ], "visible": false},
                {"targets": [ 7 ], "orderable": false}
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table width="100%">';
            sOut += '<tr><td width="15%" style="font-weight:bold; text-align:right;">Calle:</td><td width="85%">' + aData[8] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Colonia:</td><td>' + aData[9] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Ciudad:</td><td>' + aData[10] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Estado:</td><td>' + aData[11] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">CP:</td><td>' + aData[12] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">RFC:</td><td>' + aData[13] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Telefono 1:</td><td>' + aData[14] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Contacto 1:</td><td>' + aData[15] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Telefono 2:</td><td>' + aData[16] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Contacto 2:</td><td>' + aData[17] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Pais:</td><td>' + aData[18] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Email:</td><td>' + aData[19] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Usuario:</td><td>' + aData[20] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Fecha Alta:</td><td>' + aData[21] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Ultima Mod.:</td><td>' + aData[22] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Notas:</td><td>' + aData[23] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }

    var initTable_clientes = function () {
        var table = $('#sample_clientes');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            //"serverSide": true,
            //fixedHeader: true,
            "order": [
                [1, 'asc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }/*, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTR+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }*/]
            },
            
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 7 ], "visible": false},
                {"targets": [ 8 ], "visible": false},
                {"targets": [ 9 ], "visible": false},
                {"targets": [ 10 ], "visible": false},
                {"targets": [ 11 ], "visible": false},
                {"targets": [ 12 ], "visible": false},
                {"targets": [ 13 ], "visible": false},
                {"targets": [ 14 ], "visible": false},
                {"targets": [ 15 ], "visible": false},
                {"targets": [ 16 ], "visible": false},
                {"targets": [ 17 ], "visible": false},
                {"targets": [ 18 ], "visible": false},
                {"targets": [ 19 ], "visible": false},
                {"targets": [ 20 ], "visible": false},
                {"targets": [ 21 ], "visible": false},
                {"targets": [ 22 ], "visible": false},
                {"targets": [ 23 ], "visible": false},
                {"targets": [ 24 ], "visible": false},
                {"targets": [ 25 ], "visible": false},
                {"targets": [ 26 ], "visible": false},

                {"targets": [ 6 ], "orderable": false}
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table width="100%">';
            sOut += '<tr><td width="15%" style="font-weight:bold; text-align:right;">Calle:</td><td width="85%">' + aData[7] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Colonia:</td><td>' + aData[8] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Ciudad:</td><td>' + aData[9] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Estado:</td><td>' + aData[10] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Pais:</td><td>' + aData[11] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">CP:</td><td>' + aData[12] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">RFC:</td><td>' + aData[13] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Contacto 1:</td><td>' + aData[14] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Telefono 1:</td><td>' + aData[15] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Contacto 2:</td><td>' + aData[16] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Telefono 2:</td><td>' + aData[17] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Email:</td><td>' + aData[18] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Pagina:</td><td>' + aData[19] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">IV:</td><td>' + aData[20] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Clave Especialidad:</td><td>' + aData[21] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Nivel de Descuento:</td><td>' + aData[22] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Creado Por:</td><td>' + aData[23] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Fecha Alta:</td><td>' + aData[24] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Ultima Mod.:</td><td>' + aData[25] + '</td></tr>';
            sOut += '<tr><td style="font-weight:bold; text-align:right;">Notas:</td><td>' + aData[26] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
    }
	
	var initTable_obras = function () {
        var table = $('#sample_obras');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default disabled",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable2 = table.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 6 ], "orderable": false}
                
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });
        
    }

    var initTable_aplicaciones = function () {
        var table = $('#sample_aplicaciones');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default disabled",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable2 = table.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 4 ], "orderable": false}
                
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });
        
    }

    var initTable_lineas = function () {
        var table = $('#sample_lineas');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default disabled",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable2 = table.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 5 ], "orderable": false}
                
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });
        
    }



    var initTable1 = function () {
        var table = $('#sample_usuarios');
        var table2 = $('#sample_usuarios2');
        var table3 = $('#sample_usuarios3');
        var table4 = $('#sample_usuarios4');
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default disabled",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [{"targets": [ 8 ], "visible": true}
                
            ]
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });
var oTable = table2.dataTable({
            "order": [
                [1, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [{"targets": [ 3 ], "orderable": false}
                
            ]
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });


var oTable = table3.dataTable({
            "order": [
                [1, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [{"targets": [ 3 ], "orderable": false}
                
            ]
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });
var oTable = table4.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [{"targets": [ 0 ], "visible": true}
                
            ]
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });


        //$.fn.dataTable.FixedHeader( oTable)
        //$.fn.dataTable.FixedHeader( oTable );
        //new $.fn.dataTable.FixedHeader( oTable );
        /*new $.fn.dataTable.FixedHeader( oTable, {
            bottom: true
        } );*/
        
        
        
    }

    var initTable_kits = function () {
        var table = $('#sample_kits');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "order": [
                [1, 'asc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "columnDefs": [
                {"targets": [ 0 ], "orderable": false},
                {"targets": [ 5 ], "visible": false}
             
                
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"
            }
        });
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table width="100%" >';
            sOut += '<tr><td>' + aData[5] + '</td></tr>';
            sOut += '</table>';
            return sOut;
        }
    }
	
	var initTable_Historico = function () {
            var table = $('#sample_historico');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */
  $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default disabled",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable2 = table.dataTable({
            "order": [
                [0, 'desc']
            ],
            
            "lengthMenu": [
                [20, 35, 50, -1],
                [20, 35, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [
                {"targets": [ 6 ], "orderable": false}
                
            ],
            "language": {
                "lengthMenu": "_MENU_ registros por pagina"//,
                //"zeroRecords": "Nothing found - sorry",
                //"info": "Showing page _PAGE_ of _PAGES_",
                //"infoEmpty": "No records available",
                //"infoFiltered": "(filtered from _MAX_ total records)"
            }
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable

            
        });
        
    }
	
    return {
        //main function to initiate the module
        init: function (tabla) {
            if (!jQuery().dataTable) {
                return;
            }
            if(tabla == 'clientes'){
                initTable_clientes();
            }else if(tabla == 'AddProd'){
                initTable_AddProd();
            }else  if(tabla == 'AddKit'){
                initTable_kits();
            }else if(tabla == 'obras'){
                initTable_obras();
			}else if(tabla == 'historico'){
                initTable_Historico();
            }else if(tabla == 'aplicaciones'){
                initTable_aplicaciones();
            }else if(tabla == 'lineas'){
                initTable_lineas();
            }else if(tabla == 'productoskits'){
				initTable_pkits();
			}else if(tabla == 'proveedores'){
                initTable_proveedores();
            }else{
                initTable1();
                //initTable2();
                initTable_prods();
                initTable_debes();
                initTable_auditoria();
                //initTable_sample_ind_ed();
                initTable_ED();
                initTable_prods3();
                initTable_smed();
                initTable_prods4();
                initTable_eventos();
                initTable_reporte();
           
               // initTable_sample_prods2();
                //initTable_proveedores();
                //initTable_kits();
            }
            //new $.fn.dataTable.FixedHeader( TableAdvanced );
			
        }

    };

}();