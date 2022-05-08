<!DOCTYPE html>
<html>

@include('include.header')

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

	@include('include.top-navigation')
	@include('include.sidebar')
	
	      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
		
		@yield('content')
		
      </div><!-- /.content-wrapper -->
	
	@include('include.footer')
	
	
	<div class="control-sidebar-bg"></div>
	</div><!-- ./wrapper -->
	 <!-- jQuery 2.1.4 -->



	<script>


      $(function () {


        $('#example1').DataTable({
          
                        'language': {
                            "lengthMenu": " _MENU_ ",
                            emptyTable:"Aucune donnée disponible ",
                            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                            search : 'Recherche : ',
                            zeroRecords:    "Aucune donnée disponible",
                            searchPlaceholder: 'Recherche',
                            "paginate": {
                                "first":      "Premier",
                                "previous":   "précédent",
                                "next":       "suivant",
                                "last":       "Dernier"
                            },
                            "infoFiltered":   ""
                        }
        });
		
        $('#example2').DataTable({
          "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                        "scrollX": true,
                        'language': {
                            "lengthMenu": " _MENU_ ",
                            emptyTable:"Aucune donnée disponible ",
                            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                            search : 'Recherche : ',
                            zeroRecords:    "Aucune donnée disponible",
                            searchPlaceholder: 'Recherche',
                            "paginate": {
                                "first":      "Premier",
                                "previous":   "précédent",
                                "next":       "suivant",
                                "last":       "Dernier"
                            },
                            "infoFiltered":   ""
                        }
        });
      });
		  
	</script>
    <script>
        function reveal() {
            var pass = document.getElementById('pass');
            if (pass.getAttribute('type')=== 'password'){
                pass.setAttribute('type', 'text');
            }
            else {pass.setAttribute('type', 'password');}

        }
        function reveal2() {
            var pass = document.getElementById('pass');
            pass.setAttribute('type', 'password');
        }
    </script>

    <script>
        $(function() {
            $(".identifyingClass").click(function() {
                var my_id_value = $(this).data('id');
                $(".modal-footer #hiddenValue").val(my_id_value);
            })
        });
    </script>

</body>

</html>