@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="main-content">
<a href="{{url()->previous()}}"><button type="button" class="btn btn-primary mb-3 btn-add ">Kembali</button></a>

    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                @if($content->type == "text")
                
                    <div style="margin: 20px;">
                        {!! $content->description !!}
                    </div>
                @elseif($content->type == "pdf")
                <h2 style="margin-top: 20px;margin-bottom: 20px;" class="text-center">{{ $content->title }}</h2>
            
                    <div class="row justify-content-center">
                    <iframe  src="{{ asset('upload/' . $content->description) }}"  height="700">
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
   

@endpush