@extends('layouts.backend.app')

@section('title','Create Post')
@push('css')
 
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />   
@endpush
@section('content')
<div class="container-fluid">
    
    <!-- Vertical Layout -->

    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Add New Post
                    </h2>
                </div>
                <div class="body">
               
                        <label for="email_address">Post title</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="title" id="tag" class="form-control" placeholder="Tag Name">
                            </div>
                        </div>

                        <label for="image">Image</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image" id="tag" class="form-control" placeholder="Tag Name">
                            </div>
                        </div>
                        <label for="image">Image 2</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image2" id="tag" class="form-control" placeholder="Tag Name">
                            </div>
                        </div>
                        <label for="image">Image 2</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image3" id="tag" class="form-control" placeholder="Tag Name">
                            </div>
                        </div>
                        <label for="image">Status</label>
                        <div class="form-group">
                            <select name="status" id="" class="form-control">
                                <option value="true">Active</option>
                                <option value="false">DeActice</option>
                                </select>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Category and Tag
                    </h2>
                    
                </div>
                <div class="body">
               
                        <label for="email_address">Category Name</label>
                        <div class="form-group">
                            <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                <select name="categories[]" id="category" class="form-control show-tick"
                                data-live-search="true" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                <select name="tags[]" id="tag" class="form-control show-tick"
                                data-live-search="true" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                       
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Body
                    </h2>
                    
                </div>
                <div class="body">
                
                    <textarea id="tinymce" name="body"></textarea>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-primary m-t-15 waves-effect"><- Back</a>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Submit</button>
                    
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@push('js')
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>

<script>
    $(function () {
        //TinyMCE
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
    });
</script>
@endpush
    
@endsection