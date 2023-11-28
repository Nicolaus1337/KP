@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="main-content">


                
                                    
                                <a href="{{route('onboarding_user.index')}}"><button type="button" class="btn btn-primary mb-3 btn-add "  style="margin-left: 8px;">Kembali</button></a>

                                    
                                
               
               
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                     
                    
                        <div class="container-md text-start">
                        <div class="row g-5">
                                <div class="col-6">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-4">
                                   
                                    <img class="mb-2" style=" object-fit: contain;"  height="253" width="450" src="@if($onboarding->onboarding_image == null) {{ asset("storage/onboarding_image/logodasar.png") }}  @else {{ asset("storage/$onboarding->onboarding_image") }} @endif" id="image_preview_container">
                                    
                                </div>
                               
                                @if($onboarding->status == 'published')
                                <div class="col-md-15">
                                    <div class="mb-2">
                                        <label for="basicInput" class="form-label">Judul</label>
                                        <input type="text" placeholder="Judul" class="form-control" name="judul" value="{{$onboarding->judul}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-15">
                                    <div class="mb-4">
                                        <label for="basicInput" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="6" readonly>{{$onboarding->description}}</textarea>
                                </div>
                                </div>

                                <div class="row g-2"> 
                                    <div class="col-md-6">
                                    <div class="mb-4" data-date-format="dd-mm-yyyy">
                                        <label for="datepicker" class="form-label">Start</label>
                                        <input class="form-control date" type="date" id="start" name="start" autocomplete="off" value="{{$onboarding->start}}" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-4" data-date-format="dd-mm-yyyy">
                                        <label for="datepicker" class="form-label">End</label>
                                        <input class="form-control date" type="date" id="end" name="end" autocomplete="off" value="{{$onboarding->end}}" readonly>
                                    </div>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-15">
                                    <div class="mb-2">
                                        <label for="basicInput" class="form-label">Judul</label>
                                        <input type="text" placeholder="Judul" class="form-control" name="judul" value="{{$onboarding->judul}}">
                                    </div>
                                </div>

                                <div class="col-md-15">
                                    <div class="mb-4">
                                        <label for="basicInput" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="6">{{$onboarding->description}}</textarea>
                                </div>
                                </div>

                                <div class="row g-2"> 
                                    <div class="col-md-6">
                                    <div class="mb-4" data-date-format="dd-mm-yyyy">
                                        <label for="datepicker" class="form-label">Start</label>
                                        <input class="form-control date" type="date" id="start" name="start" autocomplete="off" value="{{$onboarding->start}}">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-4" data-date-format="dd-mm-yyyy">
                                        <label for="datepicker" class="form-label">End</label>
                                        <input class="form-control date" type="date" id="end" name="end" autocomplete="off" value="{{$onboarding->end}}">
                                    </div>
                                    </div>
                                </div>

                                @endif

                                

                                

                                </div>
                                <div class="col-6">
                                
                                <div style="
                                        height: 200px;
                                        overflow: auto;">
                                    <table class="table text-center">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th colspan="3">Other Participants</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-start"> 
                                                
                                            @if($onboarding->status == 'published')
                                                @foreach ($onboarding->participants as $participant)
                                                @if($participant->id != auth()->user()->id)
                                                <tr>
                                                    <td>
                                                        {{ $participant->name }}
                                                    </td>
                                                    <td style="padding-left: 35px;">
                                                        @if ($participant->pivot->status == 'not started')
                                                        <span class="badge bg-secondary">{{ $participant->pivot->status }}</span>
                                                        @elseif ($participant->pivot->status == 'in process')
                                                        <span class="badge bg-warning">{{ $participant->pivot->status }}</span>
                                                        @elseif ($participant->pivot->status == 'done')
                                                        <span class="badge bg-success">{{ $participant->pivot->status }}</span>
                                                        @endif
                                                        
                                                        
                                                    </td>
                                                    <td  style="padding-top: 12px;">
                                                        <div class="progress" style="width: 100px;">
                                                            @if ($participant->pivot->status == 'not started')
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="progress-label">0%</span>    
                                                                </div>
                                                            @elseif ($participant->pivot->status == 'in process')
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="progress-label">50%</span>    
                                                                </div>
                                                            @elseif ($participant->pivot->status == 'done')
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="progress-label">100%</span>    
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach


                                            
                                               

                                            @endif
                                                

                                            </tbody>
                                    </table>
                                </div>

                                <div style="padding-bottom: 20px;">
                                    <p>Your Progress, {{ auth()->user()->name}} !</p>
                                   
                                    @foreach ($onboarding->participants as $participant)
                                    @if($participant->id == auth()->user()->id)
                                    <div class="progress" style="width: 100%;height:30px;">
                                        @if ($participant->pivot->status == 'not started')
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-label">0%</span>    
                                            </div>
                                        @elseif ($participant->pivot->status == 'in process')
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-label">50%</span>    
                                            </div>
                                        @elseif ($participant->pivot->status == 'done')
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-label">100%</span>    
                                            </div>
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                
                                <div style="
                                            height: 200px;
                                            overflow: auto;">
                                    <table class="table text-center"  id="table-content">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th colspan="2">Contents</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-start"> 
                                                
                                            @if($onboarding->status == 'published')
                                            @foreach ($onboarding->contents as $content)
                                            <tr>
                                                <td>
                                                    
                                                    <div  class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="content_id[]" value="{{ $content->id }}"  {{ in_array($content->id, $contentdone) ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $content->title }}
                                                    </label>

                                                    </div>
                                                    
                                                </td>
                                                <td class="text-end">
                                                <button type="button" data-id2='{{$content->id}}' data-id='{{$onboarding->id}}' data-jenis="view" class="btn btn-primary btn-sm action">View Content</button>
                                                </td>
                                            </tr>

                                                @endforeach
                                                
                                            @endif
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
           
        </div>
    </div>
   
    
    <div class="modal top fade"
            id="modalAction2"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
            data-mdb-backdrop="true"
            data-mdb-keyboard="true">
        <div class="modal-dialog modal-lg" style="min-width:95%;">
            
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
    const modal2 = new bootstrap.Modal($('#modalAction2'))


    $('#table-content').on('click','.action', function(){
         let data = $(this).data()
         let id = data.id
         let id2 = data.id2
         let jenis = data.jenis

         if(jenis == 'delete'){
            Swal.fire({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"Yes, delete it!"
            }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                        method: 'DELETE',
                        url: `{{ url('guide/') }}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res){
                            location.reload();
                            modal.hide()
                            Swal.fire(
                                "Deleted!",
                                res.message,
                                res.status
                                )
                        }
                    })


                    
                }

                })
            return
        }
       
        if(jenis == 'view'){ 
            $.ajax({
            method: 'get',
            url: `{{ url('onboarding/${id}/contentsview/${id2}') }}`,
            success: function(res){
                window.location.href = `{{ url('onboarding/${id}/contentsview/${id2}') }}` ;


                
            }
         })
        }

        

         
     })

</script>




<script>
    
$(document).ready(function(){
 
 // image preview
 $("#onboarding_image").change(function(){
     let reader = new FileReader();

     reader.onload = (e) => {
         $("#image_preview_container").attr('src', e.target.result);
     }
     reader.readAsDataURL(this.files[0]);
 })

 
})
    
</script>

@endpush