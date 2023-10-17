 @extends('admin.admin_master')
 @section('admin')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <div class="page-content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="card-title">Home Slide</h4>
                             <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="id" value="{{ $homeSlide->id }}">

                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Title:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="title"
                                             value="{{ $homeSlide->title }}" placeholder="Artisanal kale" id="title">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Short Title:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="short_title"
                                             value="{{ $homeSlide->short_title }}" placeholder="Artisanal kale"
                                             id="short_title">
                                     </div>
                                 </div>

                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Video Url:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="video_url"
                                             value="{{ $homeSlide->video_url }}" placeholder="Artisanal kale"
                                             id="video_url">
                                     </div>
                                 </div>

                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Home Slider:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="file" name="home_slide" id="image">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <div class="col-sm-10">
                                         <img id="showImage" class="rounded avatar-lg"
                                             src="{{ !empty($homeslide->home_slide) ? url($homeslide->home_slide) : url('upload/no_image.jpg') }}"
                                             alt="Card image cap">
                                     </div>
                                 </div>



                                 <!-- end row -->

                                 <!-- end row -->
                                 <input type="submit" class="btn btn-dark btn-rounded waves-effect waves-light"
                                     value="Update Slide">
                             </form>
                         </div>
                     </div>
                 </div> <!-- end col -->
             </div>



         </div>
     </div>

     <script>
         $(document).ready(function() {
             $('#image').change(function(e) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#showImage').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(e.target.files[0]);
             });
         });
     </script>
 @endsection
