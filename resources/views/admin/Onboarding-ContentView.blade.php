@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            <a href="{{url()->previous()}}"><button type="button" class="btn btn-primary mb-3 btn-add ">Kembali</button></a>

                
            </div>
            
            
            
            <!-- <div class="col-md-4 offset-md-4 text-end">
            <a href=""><button type="button" class="btn btn-primary mb-3 btn-add ">Next</button></a>
            </div> -->
        
        </div>
    </div>
    @if($content->type == "text")
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">

                    <div>
                        {!! $content->description !!}
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    @elseif($content->type == "pdf")
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                <h1 class="text-center">{{ $content->title }}</h1>
            
                    <div class="row justify-content-center">
                    <iframe  src="{{ asset('upload/' . $content->description) }}"  width="50%" height="600">
                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('upload/' . $content->description) }}">Download PDF</a>
                    </iframe>
                </div>
                </div>
            </div>
           
        </div>
    </div>
    @elseif($content->type == "video")
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card text-center" >
                <h1 >{{ $content->title }}</h1>

                    <center>
                    <video width="640" height="360" controls>
                        <source src="{{ asset('upload/' . $content->description) }}" type="video/mp4">
                    </video>
                    </center>
                </div>
            </div>
           
        </div>
    </div>
    @endif
   
  

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