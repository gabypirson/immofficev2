

var favoris = favoris || {
    tableObject : false
};


/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
favoris.bind = function(){
}

favoris.bindElementTable = function(){
    
    $('#annonces .add_favoris').click(function(e){
        e.preventDefault();
        var annonce_id = $(this).closest('ul').data('annonce_id');

        if(!$(this).hasClass('active')){
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
        
        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/updateFavoris",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                annonce_id : annonce_id
            },
            success: function(response){
               console.log('response',response);
            }
        });
        
    });

    $('#favoris_table td').click(function(e){
        //Set historic price and publication
      //  console.log('passe',$(this).closest('tr').next().find('span.historic_price').html() );
      //  $(this).closest('tr').find('span.historic_price').html('test');
        
   });
}



/* ----- Tables ----- */
/* ------------------- */
favoris.initTableDatatablesResponsive = function () {
    var table = $('#favoris_table');
    
    if(!favoris.tableObject){
        favoris.tableObject = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                
            },
            searching:true,
            /* for loadging server side. */
            "processing": true,
            "serverSide": true,
            "ajax": {
                url : base_url()+"index.php/favoris/getAllannoncesDataTable",
            },
            
            /* end param server side */

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'csv', className: 'btn purple btn-outline ' }
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            parseTime: false,
            fnDrawCallback : function(){
                favoris.bindElementTable();
            },

            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
    }

};


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
favoris.init = function(){
    favoris.initTableDatatablesResponsive();
    favoris.bind();
}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    favoris.init();

});

