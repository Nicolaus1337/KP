@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="https://unpkg.com/element-plus/dist/index.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="main-content">
    <div class="title">
        GUIDE
    </div>
    <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    @if (auth()->user()->can('create guide'))
                                    <button type="button" class="btn btn-primary mb-3 btn-add">Tambah Guide</button>
                                    @endif

                                    
                                </div>

                                <div class="col-md-4 offset-md-4">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="search" id="search" name="search">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
   
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                    
                        
                        
                    
                       

                        


                        

                        
                    

                        <div class="row row-cols-1 row-cols-md-3 g-4 allguide" id="guide-card">
                        @foreach($contents as $key => $konten)
                            <div class="col-md-4">
                                <div class="card mb-3" style="height: 330px;">
                                @if ($contentImages[$key] !== null)
                                    <img src="{{ asset($contentImages[$key]->image_path)  }}" style=" object-fit: contain; width: 100%;height: 200px;">
                                @endif

                                
                                    <div class="card-body">
                                        <div class="column">
                                        @foreach($konten->tag as $tags)
                                            @php
                                            $tagColors = [
                                                    'Petunjuk Umum' => 'warning',
                                                    'Departmen IT','Dept IT','Dept It' => 'success', 
                                                    
                                                ];
                                                $colorClass = $tagColors[$tags->name] ?? 'primary'; 
                                            @endphp
                                            <span class="badge bg-{{ $colorClass }}">{{ $tags->name }}</span>
                                        @endforeach
                                        </div>
                                      
                                        <h4 class="card-title">{{$konten->content_name}}</h4>
                                        
                                        
                                        <div class="column">
                                            
                                            <button type="button" data-id='{{$konten->content_id}}' data-jenis="view" class="btn btn-primary btn-sm action">Read More</button>
                                            @if (auth()->user()->can('delete guide'))
                                            <button type="button" data-id='{{$konten->content_id}}' data-jenis="delete" class="btn btn-danger btn-sm action">REMOVE</button>
                                            @endif
                                        </div>
                                             
                                    </div>
                                </div>
                            </div> 
                        @endforeach

                       
                        

                        </div>

                        <div class="row row-cols-1 row-cols-md-3 g-4 searchguide" id="Content">

                        </div>


                        



                    </div>
                </div>
            </div>
           
        </div>
    </div>

    
   
    <div class="modal fade" id="modalAction" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    
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
    
    <div class="modal fade" id="modalAction3" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                        
            </div>
    </div>

    <div class="modal fade" id="modalAction4" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                        
            </div>
    </div>

</div>
@endsection
@push('js')
<script src="{{ asset('')}}vendor/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/element-plus"></script>
<script src="https://unpkg.com/vue@next"></script>
<script src="../vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#search').on('keyup', function(){

        $value=$(this).val();
        if($value)
        {
            $('.allguide').hide();
            $('.searchguide').show();
        }

        else {
            $('.allguide').show();
            $('.searchguide').hide();
        }

        $.ajax({

            type:'get',
            url: `{{ url('search') }}`,
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#Content').html(data);
            }
        })
    })
</script>
       
<script>
    const modal = new bootstrap.Modal($('#modalAction'))
    const modal2 = new bootstrap.Modal($('#modalAction2'))
    const modal3 = new bootstrap.Modal($('#modalAction3'))
    const modal4 = new bootstrap.Modal($('#modalAction4'))

    $('.btn-add').on('click', function(){
        $.ajax({
            method: 'get',
            url: `{{ url('guide/create') }}`,
            success: function(res){
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                $("#tag").select2({
                dropdownParent: $('#modalAction'),
                tags: true,
                width: "100%"
                });
                
                store()
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
    
    $('#guide-card').on('click','.action', function(){
         let data = $(this).data()
         let id = data.id
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
            url: `{{ url('content/') }}/${id}`,
            success: function(res){
                window.location.href = "{{ url('content') }}/" + id ;

                
            }
         })
        }

        

         
     })

    
</script>


@endpush