@extends('layouts.backend.app')

@section('title','Create Post')
@push('css')
 
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />   
@endpush
@section('content')
<div class="container-fluid">
    
    <!-- Vertical Layout -->
    <a href="{{ route('admin.post.index') }}" class="btn btn-primary m-t-15 waves-effect"><- Back</a>
    @if ($post->status == true)
    <form action="{{ route('admin.post.inactive',$post->id) }}" id="approve-form" 
        method="POST">
        @csrf
        @method('PUT')
        <button class="btn btn-danger pull-right">
            <i class="material-icons">done</i> InActice ?
        </button>

    </form>
        @else
        <form action="{{ route('admin.post.active',$post->id) }}" id="approve-form" 
             method="POST">
            @csrf
            @method('PUT')
            <button class="btn btn-success pull-right" >
                <i class="material-icons">done</i> active ?
            </button>
    
        </form>
        
    @endif
<br><br>

    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       {{$post->title}}
                        on {{$post->created_at->toFormattedDateString()}}
                    </small>
                    </h2>
                </div>
                <div class="body">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Category
                    </h2>
                    
                </div>
                <div class="body">
                    @foreach ($post->categories as $Category)
                        {{ $Category->name }}
                    @endforeach
                    
                </div>
            </div>

            <div class="card">
                    <div class="header">
                        <h2>
                            Tag
                        </h2>
                        
                    </div>
                    <div class="body">
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                        
                    </div>
                </div>

                <div class="card">
                        <div class="header">
                            <h2>
                                Image
                            </h2>
                            
                        </div>
                        <div class="body">
                        {{-- <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt=""> --}}
                        <img class="img-responsive thumbnail" src="{{ asset('storage/post/'.$post->image) }}" alt="">
                            
                        </div>
                    </div>

                    @if ($post->image2)
                    <div class="card">
                        <div class="header">
                            <h2>
                                Image
                            </h2>
                            
                        </div>
                        <div class="body">
                        {{-- <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt=""> --}}
                        <img class="img-responsive thumbnail" src="{{ asset('storage/post/'.$post->image2) }}" alt="">
                            
                        </div>
                    </div>
                    @endif

                    @if ($post->image3)
                    <div class="card">
                        <div class="header">
                            <h2>
                                Image
                            </h2>
                            
                        </div>
                        <div class="body">
                        {{-- <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt=""> --}}
                        <img class="img-responsive thumbnail" src="{{ asset('storage/post/'.$post->image3) }}" alt="">
                            
                        </div>
                    </div>
                    @endif
        </div>
    </div>


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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

    function approvePost(id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.value) {
           event.preventDefault();
           document.getElementById('approve-form').submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'post are not approve :)',
            'error'
            )
        }
        })
    }
   

</script>
@endpush
    
@endsection