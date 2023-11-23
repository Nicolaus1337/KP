@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="main-content">
<form id="formAction" action="{{ $onboarding->id ?  route('onboarding.update', $onboarding->id) : route('onboarding.store')}}" method="post" enctype="multipart/form-data">
@csrf
    @if ($onboarding->id)
    @method('put')
    @endif

                <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    
                                <a href="{{route('onboarding.index')}}"><button type="button" class="btn btn-primary mb-3 btn-add ">Kembali</button></a>

                                    
                                </div>
                                
                                @if($onboarding->status == 'draft')
                                
                                <div class="col-md-4 offset-md-4 text-end">
                                <button type="submit" class="btn btn-success mb-3 btn-add ">Publish</button>
                                </div>
                                @endif
                            </div>
                        </div>
               
               
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                     
                    
                        <div class="container-md text-center">
                        <div class="row g-2">
                                <div class="col-6">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-4">
                                   
                                    <img class="mb-2" style=" object-fit: contain;"  height="253" width="450" src="@if($onboarding->onboarding_image == null) {{ asset("storage/onboarding_image/logodasar.png") }}  @else {{ asset("storage/$onboarding->onboarding_image") }} @endif" id="image_preview_container">
                                    @if($onboarding->status == 'on going' )
                                    <span class="font-weight-bold">
                                        <input type="file" name="onboarding_image" id="onboarding_image"  class="form-control" disabled>
                                    </span>
                                    @else
                                    <span class="font-weight-bold">
                                        <input type="file" name="onboarding_image" id="onboarding_image"  class="form-control">
                                    </span>
                                    @endif
                                </div>
                               
                                

                                <div style="
                                                        height: 200px;
                                                        overflow: auto;">
                                    <table class="table text-center "id="table-participant">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th colspan="3">Partisipan</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-start"> 
                                                
                                            @if($onboarding->status == 'published')
                                                @foreach ($onboarding->participants as $participant)
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
                                                        <span class="badge bg-succes">{{ $participant->pivot->status }}</span>
                                                        @endif
                                                        
                                                        
                                                    </td>
                                                    <td>
                                                        <div class="progress" style="width: 100px;">
                                                            @if ($participant->pivot->status == 'not started')
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            @elseif ($participant->pivot->status == 'in process')
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            @elseif ($participant->pivot->status == 'done')
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            
                                                @else
                                                


                                                <tr class="text-center">
                                                    <td>
                                                    <button type="button" data-id='{{$onboarding->id}}' data-jenis="participant" class="btn btn-primary btn-sm action">Add Participant</button>

                                                    </td>
                                                </tr>
                                                @foreach ($onboarding->participants as $participant)
                                                <tr>
                                                <td>
                                                    
                                                    {{ $participant->name }}
                                                   
                                                    
                                                </td>
                                                <tr>

                                                @endforeach
                                                
                                            @endif
                                                

                                            </tbody>
                                    </table>
                                </div>

                                

                                </div>
                                <div class="col-6">
                                
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
                                <div style="
                                            height: 200px;
                                            overflow: auto;">
                                    <table class="table text-center">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>Contents</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-start"> 
                                                
                                            @if($onboarding->status == 'published')
                                            @foreach ($onboarding->contents as $content)
                                            <tr>
                                                <td>
                                                    
                                                    {{ $content->title }}
                                                    
                                                    
                                                </td>
                                                </tr>






                                                @endforeach
                                                @else
                                                @foreach ($contents as $content)
                                                <tr>
                                                <td>
                                                    <div  class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="content_id[]" value="{{ $content->id }}">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $content->title }}
                                                    </label>

                                                    </div>
                                                    
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
   
    </form>
    
</div>

<div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="largeModalLabel"
            aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    
                </div>
            </div>
@endsection
@push('js')
<script src="{{ asset('')}}vendor/jquery/jquery.min.js"></script>

<script src="{{ asset('')}}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('')}}vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="../vendor/sweetalert2/sweetalert2.all.min.js"></script>
        
<script>
    const modal = new bootstrap.Modal($('#modalAction'))
   





function store(){
        $('#formAction').on('submit',function(e){
            e.preventDefault()
            const _form = this
            const formData = new FormData(_form)

            const url = this.getAttribute('action')

            $.ajax({
                    method: 'POST',
                    url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res){
                      
                            modal.hide()
                        },
                        error: function(res){
                        let errors = res.responseJSON?.errors

                        $(_form).find('.text-danger.text-small').remove()
                        if(errors){
                            for(const [key,value] of Object.entries(errors)){
                                $(`[name='${key}']`).parent().append(`<span class="text-danger text-small">${value}</span>`)
                            }
                        }
                        console.log(errors);
                    }
                    })
        })
     }

$('#table-participant').on('click','.action', function(){
     let data = $(this).data()
     let id = data.id
     let jenis = data.jenis

     
  

    if(jenis == 'participant'){ 
        $.ajax({
        method: 'get',
        url: `{{ url('onboarding/') }}/${id}/addparticipant`,
        success: function(res){
            $('#modalAction').find('.modal-dialog').html(res)
            modal.show()
            store()
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