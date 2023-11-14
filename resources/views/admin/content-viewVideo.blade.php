<div class="modal-content">
    <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">

    <div class="container p-4 ">
      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <div class="text-center">
            
            <hr>
          </div>

            <h3 class="text-center">{{ $content->title }}</h3>

            <center>
            <video width="640" height="360" controls>
                <source src="{{ asset('upload/' . $content->description) }}" type="video/mp4">
            </video>
            </center>

        </div>
      </div>
    </div>




    </div>
    
</div>