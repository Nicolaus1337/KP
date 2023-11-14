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
            
            <div class="row justify-content-center">
              <iframe  src="{{ asset('upload/' . $content->description) }}"  width="50%" height="600">
                      This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('upload/' . $content->description) }}">Download PDF</a>
              </iframe>
          </div>
          

        </div>
      </div>
    </div>




    </div>
    
</div>