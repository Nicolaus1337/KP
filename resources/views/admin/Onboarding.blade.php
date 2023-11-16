@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="main-content">
    
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Onboarding</h4>
                    </div>
                    <div class="card-body">
                        @if (auth()->user()->can('create onboarding'))
                        <button type="button" class="btn btn-primary mb-3 btn-add ">Tambah Onboarding</button>
                        @endif
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
           
        </div>
    </div>
   
   

</div>
@endsection
@push('js')
<script src="{{ asset('')}}vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>


<script src="../vendor/sweetalert2/sweetalert2.all.min.js"></script>
        {{ $dataTable->scripts()}}
<script>
  
 

    $('.btn-add').on('click', function(){

        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: `{{ url('onboarding') }}`,
            success: function(res){
                window.LaravelDataTables["onboarding-table"].ajax.reload()
               
            }
         })
    })

    $('#onboarding-table').on('click','.action', function(){
         let data = $(this).data()
         let id = data.id
         let jenis = data.jenis

         
         
         if(jenis == 'edit'){ 
            $.ajax({
            method: 'get',
            url: `{{ url('onboarding/') }}/${id}/edit`,
            success: function(res){
                window.location.href = `{{ url('onboarding/') }}/${id}/edit`;
            }
         })
        }

        

       
         

        

         
     })

    

    
         
     
</script>
@endpush