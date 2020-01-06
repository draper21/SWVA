$(document).ready(function() {
        
    //    $.ajax({
	//	url: "dropdown.php",
	//	method: "GET",
	//	dataType: 'HTML',
	//	success: function (data) {
    //  $('#dropdown').append(data);
	//	}
    //    });
    
        $('#results thead th').each( function () {
        var title = $(this).text();
        $(this).html( title );
        $(this).append( '<input type="text"/>' );
        //$(this).html( '<input type="text" placeholder="'+title+'" />' );
       
        });

        $('#loading-image').show();

        $.ajax({

				url: "manualsearchresults.php",
				method: "GET",
                //data: {'wildcard' : $('#wildcard').val()},
                //data: {dropdown1 : $(this).val().toLowerCase()},
				dataType: 'HTML',
				success: function (data) {
                  $('#myTable').empty().append(data);
                  var table = $('#results').DataTable({
                    "order": [],
                    "columnDefs": [ {
                    "targets": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
                    "orderable": false
                    } ]
                  });

                  $('#results').show();

                  table.columns().every( function () {
                    var that = this;
                    $( 'input', this.header() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                              }
                          });
                    });

                //search box uses regular expressions
                $('.dataTables_filter input').unbind().bind('keyup', function() {
                 var searchTerm = this.value.toLowerCase(),
                     regex = '\\b' + searchTerm + '\\b';
                 table.rows().search(regex, true, false).draw();
              })
				},
                complete: function(){
                 $('#loading-image').hide();
                }
        });
 
    });