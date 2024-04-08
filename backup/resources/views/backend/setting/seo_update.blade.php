@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update Seo Setting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Seo Setting</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <br>
        <div class="container">
            <div class="main-body">
                <div class="row mt-3">

                    <div class="row">
                        <div class="col-xl-10 mx-auto">

                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">


                                    <div class="card-title d-flex align-items-center">
                                        <div>
                                        </div>
                                        <h5 class="mb-0 text-primary">Update SEO</h5>
                                    </div>
                                    <hr>
                                    <form action="{{ route('seo.setting.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $seo->id }}">


                                        <label for="meta_title" class="form-label mt-2">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            value="{{ $seo->meta_title }}">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror




                                        <label for="meta_author" class="form-label mt-2">Meta Author</label>
                                        <input type="text" class="form-control" name="meta_author"
                                            value="{{ $seo->meta_author }}">
                                        @error('meta_author')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="meta_keyword" class="form-label mt-2">Meta Keyword</label>
                                        <textarea type="text" class="form-control" name="meta_keyword">{{ $seo->meta_keyword }}</textarea>
                                        @error('meta_keyword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                        <label for="meta_description" class="form-label mt-2">Meta Description</label>
                                        <textarea type="text" class="form-control" name="meta_description">{{ $seo->meta_description }}</textarea>


                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror



                                </div>



                                <div class="row py-4">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary py-2 p-3" value="Update SEO Setting">
                                    </div>
                                </div>
                                </form>


                            </div>
                        </div>

                    </div>
                </div>





            </div>
        </div>
    </div>
    </div>
@endsection
