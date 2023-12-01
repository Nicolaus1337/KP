@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .content-row:hover {
        cursor: pointer;
        background-color: #f5f5f5; /* Change this to your desired hover background color */
    }
</style>
@endpush
@section('content')
<div class="main-content">
    
        
            
                
            <a href="{{ route('onboarding.show', $onboarding->id) }}"><button type="button" class="btn btn-primary mb-3 btn-add " style="margin-left: 8px;">Kembali</button></a>

                
            
            
        
        
    
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-10">
                <div class="card">
    @if($content->type == "text")
    
                    <div style="margin: 20px;">
                        {!! $content->description !!}
                    </div>
    @elseif($content->type == "pdf")
                <h2 style="margin-top: 20px;margin-bottom: 20px;" class="text-center">{{ $content->title }}</h2>
            
                    <div class="row justify-content-center">
                    <iframe  src="{{ asset('upload/' . $content->description) }}" height="700">
                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('upload/' . $content->description) }}">Download PDF</a>
                    </iframe>
                </div>
    @elseif($content->type == "video")
                <h2 style="margin-top: 20px;margin-bottom: 20px;" class="text-center">{{ $content->title }}</h2>

                <center>
                    <video width="640" height="360" controls>
                        <source src="{{ asset('upload/' . $content->description) }}" type="video/mp4">
                    </video>
                </center>

    @endif
                 </div>
            </div>

            <div class="col-md-2">
                <div class="card">
                <table class="table text-center" id="table-content">
                    <thead class="table-secondary">
                        <tr>
                            <th>Contents</th>
                        </tr>
                    </thead>
                    <tbody class="text-start">
                        @foreach ($onboarding->contents as $contentt)
                            <tr class="content-row" data-id2="{{ $contentt->id }}" data-id="{{ $onboarding->id }}">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="content_id[]" value="{{ $contentt->id }}" {{ in_array($contentt->id, $contentdone) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $contentt->title }}
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


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
   
<script>
    $('.content-row').on('click', function (){
         let data = $(this).data()
         let id = data.id
         let id2 = data.id2
         
            $.ajax({
            method: 'get',
            url: `{{ url('onboarding/${id}/contentsview/${id2}') }}`,
            success: function(res){
                window.location.href = `{{ url('onboarding/${id}/contentsview/${id2}') }}` ;


                
            }
         })
        

        

         
     })
</script>
@endpush