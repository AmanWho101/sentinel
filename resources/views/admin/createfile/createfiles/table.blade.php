<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="createfiles-table" width="100%">
    <thead>
     <tr>
        Name
        
     </tr>
    </thead>
    <tbody>
    <tr>@foreach($createfiles as $createfile)
        
            
            <td>
                
               
                
                    <div class="content" >
                       
                        <div class="row" >
                            <a   href="{{ route('admin.createfile.createfiles.show', collect($createfile)->first() ) }}">
     <img src="{{ asset('pdf2.png') }}" style="width: 100px; background-color: azure;"/> 
                           
    </div>
                            <div class="row" >
                                <label  style="text-align: right; " for="" >{{ $createfile->path }}</label>
                            </div>
                        </a>
                    </div>
          
              
            
                
            </td>
        
    @endforeach
    </tr>
    </tbody>
</table>
</div>
@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this Item? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                            </div>
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $('#createfiles-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#createfiles-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#createfiles-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                            $('.livicon').updateLivicon();
                     },500);
                  } );

                  $('#delete_confirm').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                       var $recipient = button.data('id');
                      var modal = $(this);
                      modal.find('.modal-footer a').prop("href",$recipient);
                  })

       </script>

@stop
