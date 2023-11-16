@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                                    
                                <button type="button" class="btn btn-primary mb-3 btn-add ">Kembali</button>

                                    
                                </div>
                                

                                <div class="col-md-4 offset-md-4 text-end">
                                <button type="submit" class="btn btn-success mb-3 btn-add ">Publish</button>
                                </div>
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
                                    <span class="font-weight-bold">
                                        <input type="file" name="onboarding_image" id="onboarding_image"  class="form-control">
                                    </span>
                                </div>
                               
                                

                                <div>
                                    <table class="table text-center">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>Partisipan</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <tr>
                                                    <td>
                                                       
                                                        <button type="button"  data-id='{{$onboarding->id}}' class="btn btn-primary btn-add">Tambah Partisipan</button>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        testing
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>

                                

                                </div>
                                <div class="col-6">
                                
                               
                                <div class="col-md-15">
                                    <div class="mb-2">
                                        <label for="basicInput" class="form-label">Judul</label>
                                        <input type="text" placeholder="Judul" class="form-control" name="judul" value="{{$onboarding->judul}}">
                                    </div>
                                </div>

                                <div class="col-md-15">
                                    <div class="mb-4">
                                        <label for="basicInput" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" rows="6">{{$onboarding->description}}</textarea>
                                </div>
                                </div>

                                <div class="row g-2"> 
                                    <div class="col-md-6">
                                    <div class="mb-4" data-date-format="dd-mm-yyyy">
                                        <label for="datepicker" class="form-label">Start</label>
                                        <input class="form-control date" type="date" autocomplete="off" value="{{$onboarding->start}}">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-4" data-date-format="dd-mm-yyyy">
                                        <label for="datepicker" class="form-label">End</label>
                                        <input class="form-control date" type="date" autocomplete="off" value="{{$onboarding->end}}">
                                    </div>
                                    </div>
                                </div>

                                <div>
                                    <table class="table text-center">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>Cotent</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <tr>
                                                    <td>
                                                        
                                                        <button type="button" class="btn btn-primary btn-add2">Tambah Content</button>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        testing
                                                    </td>
                                                </tr>
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
    <div class="modal fade" id="modalAction" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    
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
    const modal = new bootstrap.Modal($('#modalAction'))

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
                            location.reload();
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

    $('.btn-add').on('click', function(){
        let data = $(this).data()
        let id = data.id

       

         $.ajax({
            method: 'get',
            url: `{{ url('ob_participant/') }}/${id}/edit`,
            success: function(res){
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
         })
    })

</script>

@endpush