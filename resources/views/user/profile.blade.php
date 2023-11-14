@extends('layouts.master')
@push('css')
<link href="{{ asset ('')}}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset ('')}}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />

@endpush
@section('content')


<div class="main-content">
    <div class="title">
        Profile
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="profile_setup_form" action="{{ route('profile.update',  Auth::user()->id ) }}" >
                    @csrf
                    @if (Auth::user()->id)
                        @method('put')
                    @endif
                        <div class="row">
                            <div class="col-md-4 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    @php($profile_image = auth()->user()->profile_image)
                                    <img class="rounded-circle mt-5" height="250" width="250" src="@if($profile_image == null) {{ asset("storage/profile_images/avatar.png") }}  @else {{ asset("storage/$profile_image") }} @endif" id="image_preview_container">
                                    <span class="font-weight-bold">
                                        <input type="file" name="profile_image" id="profile_image"  class="form-control">
                                    </span>
                                </div>

                                <div class="col-md-14">
                                <div class="mb-3">
                                    <label for="Textarea" class="form-label">About You</label>
                                    <textarea class="form-control" placeholder="About You" id="about_user" name="about_user" rows="3" style="height: 100px;">{{ auth()->user()->about_user }}</textarea>
                                </div>
                            </div>

                            
                            <div class="col-md-14">
                                <div class="mb-3">
                                    <label for="Textarea" class="form-label">Job Desc</label>
                                    <textarea class="form-control" placeholder="Job Desc" id="job_desc"  name="job_desc" rows="3" style="height: 100px;">{{ auth()->user()->job_desc }}</textarea>
                                </div>
                            </div>
                            </div>

                            

                            <div class="col-md-8 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-2">
                    
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="basicInput" class="form-label">Name</label>
                                                <input type="text" placeholder="Name" value="{{ auth()->user()->name }}" name="name" class="form-control" id="name"  readonly>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="basicInput" class="form-label">Nickname</label>
                                                <input type="text" placeholder="Nickname" value="{{ auth()->user()->nickname }}" name="nickname" class="form-control" id="nickname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="basicInput" class="form-label">NPK</label>
                                                <input type="text" placeholder="NPK" value="{{ auth()->user()->npk }}" name="npk" class="form-control" id="npk" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="basicInput" class="form-label">Unit Kerja</label>
                                                <input class="form-control" type="text" value="{{ auth()->user()->unit_kerja }}"  name="unit_kerja" id="unit_kerja" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                         <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Email</label>
                                                <input type="email" placeholder="Email" value="{{auth()->user()->email }}" name="email" class="form-control" id="email">
                                                
                                            </div>
                                        </div>             
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Whatsapp Number</label>
                                                <input type="text" placeholder="Whatsapp Number" value="{{auth()->user()->wa }}" name="wa" class="form-control" id="wa">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Birthday</label>
                                                <input type="text" placeholder="Birthday" value="{{auth()->user()->birth_date }}" name="birth_date" class="form-control" id="birth_date">
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Your Hobby</label>
                                                <input type="text" placeholder="Your Hobby" value="{{ auth()->user()->hobby }}" name="hobby" class="form-control" id="hobby">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Fav Food</label>
                                                <input type="text" placeholder="Fav food" value="{{ auth()->user()->food }}" name="food" class="form-control" id="food">
                                                
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Fav Drink</label>
                                                <input type="text" placeholder="Fav Drink" value="{{ auth()->user()->drink }}" name="drink" class="form-control" id="drink">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Fav Film</label>
                                                <input type="text" placeholder="Fav Film" value="{{ auth()->user()->film }}" name="film" class="form-control" id="film">
                                                
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Interest</label>
                                                <input type="text" placeholder="Interest" value="{{ auth()->user()->interest }}" name="interest" class="form-control" id="interest">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Strength</label>
                                                <input type="text" placeholder="Strength" value="{{ auth()->user()->str_weak }}" name="strength" class="form-control" id="strength">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Weakness</label>
                                                <input type="text" placeholder="Weakness" value="{{ auth()->user()->weakness }}" name="weakness" class="form-control" id="weakness">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Personality</label>
                                                <input type="text" placeholder="Personality" value="{{ auth()->user()->personality }}" name="personality" class="form-control" id="personality">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                
                                                <label for="basicInput" class="form-label">Communication Preferences</label>
                                                <input type="text" placeholder="Communication Preferences" value="{{ auth()->user()->job_desc }}" name="job_desc" class="form-control" id="job_desc">
                                                
                                            </div>
                                        </div>

                                    </div>


                                    
                                    <div class="mt-5"><button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                                </div>
                            </div>
                        </div>

    
                    </div>

                       </form>
                     
                    </div>
                </div>
            </div>
           
        </div>
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
    $(document).ready(function(){
 
 // image preview
 $("#profile_image").change(function(){
     let reader = new FileReader();

     reader.onload = (e) => {
         $("#image_preview_container").attr('src', e.target.result);
     }
     reader.readAsDataURL(this.files[0]);
 })

 $("#profile_setup_frm").submit(function(e){
     e.preventDefault();

     var formData = new FormData(this);

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $("#btn").attr("disabled", true);
     $("#btn").html("Updating...");
     $.ajax({
         type:"POST",
         url: this.action,
         data: formData,
         cache:false,
         contentType: false,
         processData: false,
         success: (response) => {
             if (response.code == 400) {
                 let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                 $("#res").html(error);
                 $("#btn").attr("disabled", false);
                 $("#btn").html("Save Profile");
             }else if(response.code == 200){
                 let success = '<span class="alert alert-success">'+response.msg+'</span>';
                 $("#res").html(success);
                 $("#btn").attr("disabled", false);
                 $("#btn").html("Save Profile");
             }
         }
     })
 })
})
</script>